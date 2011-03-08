<?php
/**
 * Product Controller Clsas
 * Create On Feburary 16, 2011
 * Author By Yorker
 */
class ProductController extends AppController {
	public function listProduct() {
		global $_LANG;
		$title = $_LANG['product_list'];
		//OP: 处理商品批量移动
		if(isset($_GET['act']) && $_GET['act'] == 'batch_move') {
			if(isset($_GET['do']) && $_GET['do'] == 'move') {
				Common::checkArray($_POST, 'ids', 'cat_id');
				$ids = str_replace('_', ',', trim($_POST['ids']));
				$cat_id = (int)$_POST['cat_id'];
				$this->db->query("UPDATE #@__products SET cat_id=" . $cat_id . " WHERE product_id IN (" . $ids . ")");
				exit("ok");
			} else {
				$cats[] = $_LANG['please_choose'];
				$this->ext->formatProductCat($cats, 0, 0);
				$catopt = '';
				foreach($cats as $k=>$v) {
					if(!empty($k)) {
						$is_terminal = $this->db->getOne("SELECT is_terminal FROM #@__product_cat WHERE cat_id=" . (int)$k);
						if($is_terminal) {
							$catopt .= '<option value="' . $k . '">' . $v . '</option>';
						} else {
							$catopt .= '<optgroup label="' . $v . '"></optgroup>';
						}
					} else {
						$catopt .= '<option value="">' . $v . '</option>';
					}
				}
				$this->tpl->assignByRef('catopt', $catopt);
				exit($this->tpl->fetch('product/product_batch_move.tpl'));
			}
		}


		//设置URL
		$init_url = null;
		if(isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
			$init_url = 'product/listProductPage?cat_id=' . (int)$_GET['cat_id'];
			$cat_id = (int)$_GET['cat_id'];
		} else {
			$init_url = 'product/listProductPage';
			$cat_id = '';
		}

		//设置搜索
		set_or_get_search(App::url('product/listProductPage'), $_LANG['title'], 'product_name', 'Product', $this->tpl, true, 'products', array('is_deleted'=>0));

		//设置分类查找
		$cats[''] = $_LANG['please_choose'];
		$this->ext->formatProductCat($cats);

		set_category(App::url('product/listProductPage'), 'cat_id', $cats, $cat_id, $this->tpl, true);

		$top_head['link'] = $_LANG['add_product'];
		$top_head['href'] = empty($cat_id) ? 'product/writeProduct' : 'product/writeProduct?cat_id=' . $cat_id;

		$this->tpl->assign('init_url', App::url($init_url));
		$this->tpl->assign('cat_id', $cat_id);
        $this->setHInfo($title, $top_head['link'], $top_head['href']);
		$this->display();
	}

	//商品删除操作
	public function procDeleteProduct() {
		if(isset($_POST['id'])) {
			$ids = $_POST['id'];
		} elseif(isset($_POST['ids'])) {
			$ids = $_POST['ids'];
		} else {
			exit('This is an illegal request!');
		}
		if($this->_deleteProduct($ids)) {
			exit('ok');
		} else {
			exit('Delete Error!');
		}
	}

	public function listProductTrash() {
		global $_LANG;
		$title = $_LANG['trash'];

		//设置URL
		$init_url = null;
		if(isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
			$init_url = 'product/listProductTrashPage?cat_id=' . (int)$_GET['cat_id'];
			$cat_id = (int)$_GET['cat_id'];
		} else {
			$init_url = 'product/listProductTrashPage';
			$cat_id = '';
		}

		//设置搜索
		set_or_get_search(App::url('product/listProductTrashPage'), $_LANG['title'], 'product_name', 'Product', $this->tpl, true, 'products', array('is_deleted'=>1));

		//设置分类查找
		$cats[''] = $_LANG['please_choose'];
		$this->ext->formatProductCat($cats);

		set_category(App::url('product/listProductTrashPage'), 'cat_id', $cats, $cat_id, $this->tpl, true);


		$this->tpl->assign('init_url', App::url($init_url));
		$this->set(compact('title'));
        $this->setHInfo($title);

		$this->display();
	}

	public function listProductTrashPage() {
		global $_LANG;
		$like = set_or_get_search(App::url('product/listProductTrashPage'), $_LANG['title'], 'product_name', 'Product', $this->tpl, true, 'products', array('is_deleted'=>1));

		if(isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
			$cat_id = (int)$_GET['cat_id'];
			$cats = $this->ext->getProductCatChildren($cat_id);
			$where = ' AND c.cat_id IN (' . implode(',', $cats) . ') ';
		} else {
			$where = '';
		}


		//总记录条数
		$total = $this->db->getOne("SELECT COUNT(*) AS cnt FROM #@__products AS Product INNER JOIN #@__product_cat AS c ON Product.cat_id=c.cat_id WHERE is_deleted=1 AND " . $like . $where);
		$page = Pagination::getCurrentPage('product_list');

		$pages = Pagination::page($total, $page, $GLOBALS['here'], PAGE_SIZE);

		$list = $this->db->getAll("SELECT Product.*, c.cat_name FROM #@__products AS Product INNER JOIN #@__product_cat AS c ON Product.cat_id=c.cat_id WHERE is_deleted=1 AND " . $like . $where . " ORDER BY Product.ordering ASC, Product.create_datetime DESC LIMIT " . ($page-1)*PAGE_SIZE . ", " . PAGE_SIZE);
		$this->set(compact('list', 'pages'));
		$this->tpl->assign('upload_url', UPLOAD_URL);
        $this->clearLayout();
		$this->display();
	}

	public function listProductPage() {
		$like = set_or_get_search(App::url('product/listProductPage'), $GLOBALS['_LANG']['title'], 'product_name', 'Product', $this->tpl, true, 'products', array('is_deleted'=>0));

		if(isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
			$cat_id = (int)$_GET['cat_id'];
			$cats = $this->ext->getProductCatChildren($cat_id);
			$where = ' AND c.cat_id IN (' . implode(',', $cats) . ') ';
		} else {
			$where = '';
            $cat_id = '';
		}


		//总记录条数
		$total = $this->db->getOne("SELECT COUNT(*) AS cnt FROM #@__products AS Product INNER JOIN #@__product_cat AS c ON Product.cat_id=c.cat_id WHERE is_deleted=0 AND " . $like . $where);
		$page = Pagination::getCurrentPage('product_list');

		$pages = Pagination::page($total, $page, $GLOBALS['here'], PAGE_SIZE);

		$list = $this->db->getAll("SELECT Product.*, c.cat_name, COUNT(pg.product_id) AS gallery_num FROM #@__products AS Product INNER JOIN #@__product_cat AS c ON Product.cat_id=c.cat_id LEFT JOIN #@__product_gallery AS pg ON Product.product_id=pg.product_id WHERE is_deleted=0 AND " . $like . $where . " GROUP BY Product.product_id ORDER BY Product.ordering ASC, Product.create_datetime DESC LIMIT " . ($page-1)*PAGE_SIZE . ", " . PAGE_SIZE);

		//Common::debug($list);

		$this->set(compact('list', 'pages'));
        $this->clearLayout();
        $this->set(compact('cat_id'));
		$this->display();
	}

	public function ajaxDelGalleryItem() {
		//OP: 删除产品相册项
		$gallery_id = Common::getParam('gallery_id');
		$gallery = $this->db->getRow("SELECT * FROM #@__product_gallery WHERE id=" . (int)$gallery_id);
		if(!empty($gallery)) {
			@unlink(UPLOAD_PATH . $gallery['image']);
			@unlink(UPLOAD_PATH . $gallery['image_thumb']);
			$this->db->deleteById('product_gallery', $gallery_id);
			exit("ok");
		}
		exit("Not found such a record!");
	}

	//OP: AJAX载入额外属性列表
	public function ajaxGetAttributeWrap() {
		$mod_id = (int)$_GET['dest_model_id'];
		$product_id = (int)Common::getParam('product_id');

		$list = $this->db->getAll("SELECT ProductAttribute.attr_id, ProductAttribute.mod_id, ProductAttribute.attr_name, ProductAttribute.attr_type, ProductAttribute.attr_option FROM #@__product_attribute AS ProductAttribute INNER JOIN #@__product_model AS ProductModel ON ProductModel.mod_id=ProductAttribute.mod_id WHERE ProductAttribute.mod_id=" . $mod_id . " AND ProductAttribute.available=1 AND ProductModel.available=1");
		if(!empty($list)) {
			foreach($list as &$l) {
				if($l['attr_type'] != 'text') {
					//将可选值转换为数组格式
					$tmp = explode(',', $l['attr_option']);
					if(is_array($tmp)) {
						foreach($tmp as $op) {
							$op = trim($op);
							$l['attr_option_array'][$op] = $op;
						}
					}
				}

				if($product_id) {
					//指定了product_id(编辑状态)，则放入以前设置过的值
					$l['attr_value'] = $this->db->getOne("SELECT attr_value FROM #@__product_attribute_relate WHERE product_id=" . $product_id . " AND attr_id=" . (int)$l['attr_id']);
					if(strpos($l['attr_value'], ',') !== false) {
						$l['attr_value'] = explode(',', $l['attr_value']);
						foreach($l['attr_value'] as &$v) {
							$v = trim($v);
						}
					}
				}
			}
			$this->set(compact('list'));

			echo $this->tpl->fetch('product/ajax_product_attr_wrap.tpl');
		}
		exit;
	}

    public function ajaxGetProductCatStruct() {
        global $_LANG;
        $cats[''] = $_LANG['please_choose'];
        $this->ext->formatProductCat($cats);
        $id = Common::getParameter('id');
    	$catopt = $this->ext->getProductCatStruct($cats, $id);
        exit($catopt);
    }

    //管理属性标签--删除
	public function ajaxManageAttributeLabel() {
		if(isset($_GET['do']) && $_GET['do'] == 'del') {
			Common::checkArray($_POST, 'label_ids');
			$ids = array();
			if(is_array($_POST['label_ids'])) {
				$ids = $_POST['label_ids'];
			} else {
				$ids[] = $_POST['label_ids'];
			}
			foreach($ids as $label_id) {
				$this->db->deleteById('product_attribute_label', $label_id);
				$this->db->query("UPDATE #@__product_attribute SET label_id=0 WHERE label_id=" . (int)$label_id);
			}
			exit("ok");
		}
		$list = $this->db->getAll("SELECT label_id, label_name FROM #@__product_attribute_label");
		$this->set(compact('list'));
		$this->clearLayout();
		$this->display();
	}

	public function writeProduct() {
		global $_LANG;
		$title = $_LANG['add_product'];

		if(!empty($_POST)) {
			Common::checkArray($_POST, 'wrt_product_name', 'wrt_cat_id');
			$_POST['wrt_product_thumb'] = Common::addPostfix($_POST['wrt_product_img'], '_thumb');
			$_POST['wrt_product_number'] = (int)$_POST['wrt_product_number'];
			$_POST['wrt_product_weight'] = round((float)$_POST['wrt_product_weight'], 2);
			$_POST['wrt_price'] = round((float)$_POST['wrt_price'], 2);
			$_POST['wrt_is_hot'] = $_POST['wrt_is_hot'] == 1 ? 1 : 0;
			$_POST['wrt_is_new'] = $_POST['wrt_is_new'] == 1 ? 1 : 0;
			$_POST['wrt_is_best'] = $_POST['wrt_is_best'] == 1 ? 1 : 0;

			if(isset($_POST['wrt_id']) && is_numeric($_POST['wrt_id'])) {
				$_POST['wrt_update_datetime'] = date('Y-m-d H:i:s');
				//查检是否需要删除原有的图片
				$orginal_image = $this->db->getOne("SELECT product_img FROM #@__products WHERE product_id=" . (int)$_POST['wrt_id']);
			} else {
				$_POST['wrt_create_datetime'] = $_POST['wrt_update_datetime'] = date('Y-m-d H:i:s');
			}

			$last_id = $this->db->autoWrite($_POST, 'products');

		    //处理产品介绍中的图片附件
			if($last_id) {
				Common::textAttachment($_POST['wrt_description'], $last_id, 2);
			}

            //生成商品货号，如果没有提供
            $product_sn = trim($_POST['wrt_product_sn']);
            if(empty($product_sn)) {
                $config = new Config();
                $product_sn = $config->sn_prefix . (1000000+intval($last_id));
                $this->db->updateById('products', array('product_sn'=>$product_sn), $last_id);
            }

			//处理产品相册，挂接
			foreach($_POST as $key=>$value) {
				if(strpos($key, 'gallery_') === 0) {
					list($g, $gid) = explode('_', $key);
					if(isset($gid) && is_numeric($gid)) {
						$this->db->updateById('product_gallery', array('product_id'=>$last_id, 'comment'=>$value), $gid) or exit('Handle picture collect failed: ' . $this->db->errorMsg());
					}
				}
			}

			//是否有封面图片更新，如果有，删除原图
			if(isset($orginal_image) && !empty($orginal_image) && $orginal_image != $_POST['wrt_product_img']) {
				Common::unlink(UPLOAD_PATH . $orginal_image);
				$orginal_thumb = Common::addPostfix($orginal_image, '_thumb');
				Common::unlink(UPLOAD_PATH . $orginal_thumb);
			}

			//处理所挂接的额外属性
			$this->db->query("DELETE FROM #@__product_attribute_relate WHERE product_id=" . $last_id);
			foreach($_POST as $p=>&$v) {
				if(strpos($p, 'attr_') === 0) {
					list($g, $attr_id) = explode('_', $p);
					if(isset($attr_id) && is_numeric($attr_id)) {
						if(is_array($v)) {
							$attr_value = implode(',',$v);
						} else {
							$attr_value = $v;
						}
						$this->db->insert('product_attribute_relate', array('product_id'=>$last_id, 'attr_id'=>(int)$attr_id, 'attr_value'=>$attr_value));
					}
				}
			}
			exit('ok');
		}

        $reurl = 'product/writeProduct';
		if(isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$edit = $this->db->getRowById('products', $id);
			$title = $_LANG['edit_product'];

			//提取相册数据
			$gallery = $this->db->getAll("SELECT * FROM #@__product_gallery WHERE product_id=" . $id);
			$edit['gallery'] = $gallery;

			//确定商品附加属性所属的商品模型，根据模型始终一致性，只需要确定任意一个属性所属模型即可
			$mod_id = $this->db->getOne("SELECT pa.mod_id FROM #@__product_attribute_relate AS pea INNER JOIN #@__product_attribute AS pa ON pea.attr_id=pa.attr_id WHERE pea.product_id=" . $id);
			if(!empty($mod_id)) {
				$edit['mod_id'] = $mod_id;
			}

            $reurl = 'product/listProduct';

			$this->set(compact('edit'));
		}

        $top_head['link'] = $_LANG['product_list'];
        if(isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])) {
            $cat_id = (int)$_GET['cat_id'];
            $reurl .= '?cat_id=' . $cat_id;
            $top_head['href'] = 'product/listProduct?cat_id=' . $cat_id;
        } else {
            $cat_id = '';
            $top_head['href'] = 'product/listProduct';
        }
        $reurl = App::url($reurl);
        $this->set(compact('reurl'));

        //品牌
        $this->db->query("SELECT brand_id, brand_name FROM #@__product_brand ORDER BY ordering ASC, brand_id ASC");
        $brands = array();
        $brands[0] = $_LANG['please_choose'];
        while($row = $this->db->loadAssoc()) {
        	$brands[$row['brand_id']] = $row['brand_name'];
        }
        $this->set(compact('brands'));

		//附加属性选项
		$models = $this->db->getAll("SELECT mod_id, mod_name FROM #@__product_model WHERE available=1");
		$this->set(compact('models'));

		//所属分类
		$cats[''] = $_LANG['please_choose'];
		$this->ext->formatProductCat($cats);
        if(isset($edit['cat_id']) && !empty($edit['cat_id'])) {
            $selected = $edit['cat_id'];
        } elseif($cat_id) {
            $selected = $cat_id;
        } else {
        	$selected = '';
        }
        $catopt = $this->ext->getProductCatStruct($cats, $selected);

		$this->set(compact('catopt'));

		//封面缩略图
		$thumb = Common::getConfigValue('product_thumb');
		$thumb_arr = explode('*', $thumb);

		$recommend = array('is_best'=>$_LANG['is_best'], 'is_hot'=>$_LANG['is_hot'], 'is_new'=>$_LANG['is_new']);

		$published = array('1'=>$_LANG['yes'], '0'=>$_LANG['no']);

		$this->tpl->assign('thumb_arr', $thumb_arr);
		$this->tpl->assign('recommend', $recommend);
		$this->tpl->assign('published', $published);
		$this->tpl->assign('upload_url', UPLOAD_URL);
		$this->tpl->assign('cfg_currency_flag', Common::getConfigValue('currency_flag'));


		$this->tpl->assign('cat_id', $cat_id);
		$this->tpl->assign('top_head', $top_head);
		$this->tpl->assign('sessionid', session_id());
        $this->setHInfo($title, $top_head['link'], $top_head['href']);
		$this->display();
	}

    //OP：处理商品批量添加
    public function ajaxCatBatchAdd() {
        global $_LANG;
        if(isset($_REQUEST['do']) && $_REQUEST['do'] == 'add') {
            Common::checkArray($_POST, 'wrt_cat_name', 'wrt_parent_id', 'wrt_ordering', 'wrt_published', 'wrt_is_terminal');
            $data = array();
            $data['wrt_parent_id'] = $_POST['wrt_parent_id'];
            $data['wrt_ordering'] = $_POST['wrt_ordering'];
            $data['wrt_published'] = $_POST['wrt_published'];
            $data['wrt_is_terminal'] = $_POST['wrt_is_terminal'];

            $cat_names = explode('#', $_POST['wrt_cat_name']);
            foreach($cat_names as $cat_name) {
                $data['wrt_cat_name'] = trim($cat_name);
                $last_id = $this->db->autoWrite($data, 'product_cat');
            }
            exit('ok-' . $last_id);

        } else {
            $format_product[0] = $_LANG['top_cat'];
            $this->ext->formatProductCat($format_product, 0, 0, 0);
            $this->tpl->assign('format_product', $format_product);
            $this->tpl->assign('alternative', $this->getAlter());

            //标识是否在添加商品页面中发起的请求
            $this->tpl->assign('is_dynamic', Common::getParameter('is_dynamic'));
            exit($this->tpl->fetch('product/ajax_cat_batch_add.tpl'));
        }
    }

	public function listProductCat() {
        global $_LANG;
		$data = null;
		$this->ext->formatProductCat($data);

		$list = array();
		foreach($data as $k=>$v) {
			$tmp = $this->db->getRowById('product_cat', $k);
			$tmp['cat_name'] = $v;
			$cat_ids = $this->ext->getProductCatChildren($tmp['cat_id']);
			$tmp['product_num'] = $this->db->getOne("SELECT COUNT(*) AS cnt FROM #@__products WHERE cat_id IN(" . implode(',', $cat_ids) . ")");
            $tmp['has_child_cat'] = $this->db->getOne("SELECT COUNT(*) AS cnt FROM #@__product_cat WHERE parent_id=" . (int)$k);

			$this->db->query("SELECT DISTINCT parent_id FROM #@__product_cat WHERE cat_id IN (" . implode(',', $cat_ids) . ")");
			$plist = '';
			while($row = $this->db->loadAssoc()) {
				if($row['parent_id'] != 0 && $row['parent_id'] != $tmp['parent_id']) {
					$plist .= $row['parent_id'] . '-';
				}
			}
			if($plist) {
				$plist = substr($plist, 0, -1);
			}
			$tmp['plist'] = $plist;

			$list[] = $tmp;
		}

		$this->set(compact('list'));
        $this->setHInfo($_LANG['product_cat_list'], $_LANG['add_product_cat'], 'product/writeProductCat');
		$this->display();
	}

	public function writeProductCat() {
        global $_LANG;
		if(!empty($_POST)) {
			Common::checkArray($_POST, 'wrt_cat_name', 'wrt_ordering');
			$this->db->autoWrite($_POST, 'product_cat');
			exit('ok');
		}

		$title = $_LANG['add_product_cat'];

		if(isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$edit = $this->db->getRowById('product_cat', $id);
			$title = $_LANG['edit_product_cat'];
			$this->tpl->assign('edit', $edit);
		}

		$format_product[0] = $_LANG['top_cat'];
		$this->ext->formatProductCat($format_product, 0, 0, 0);

		$this->tpl->assign('parents', $format_product);
		$this->tpl->assign('alternative', $this->getAlter());
        $this->setHInfo($title, $_LANG['product_cat_list'], 'product/listProductCat');
		$this->display();
	}

	public function model() {
        global $_LANG;
		$action = Common::getParam('act');
		$title = '';
		$head = array();
		if($action == 'write_model') {
			$title = $_LANG['add_product_model'];
			$head = array('link'=>$_LANG['product_model_list'], 'href'=>'product/model?act=list_model');

			//处理添加或者修改商品模型
			if(!empty($_POST)) {
				Common::checkArray($_POST, 'wrt_mod_name');
				$this->db->autoWrite($_POST, 'product_model');
				exit("ok");
			}


			if(isset($_GET['id']) && is_numeric($_GET['id'])) {
				//取出数据用以编辑
				$edit = $this->db->getRowById('product_model', (int)$_GET['id']);
				$title = $_LANG['edit_product_model'];
				$this->set(compact('edit'));
			}

			$this->tpl->assign('available', $this->getAlter());

		} elseif($action == 'list_model') {
			$title = $_LANG['product_model_list'];
			$head = array('link'=>$_LANG['add_product_model'], 'href'=>'product/model?act=write_model');

			$list = $this->db->getAll("SELECT * FROM #@__product_model ORDER BY mod_id ASC");
			foreach($list as &$l) {
				$l['attr_num'] = $this->db->getOne("SELECT COUNT(*) FROM #@__product_attribute WHERE mod_id=" . (int)$l['mod_id']);
			}
			$this->set(compact('list'));

		} elseif($action == 'list_attr') {
			$mod_id = Common::getParam('mod_id');
            $mod_name = $this->db->getOne("SELECT mod_name FROM #@__product_model WHERE mod_id=" . $mod_id);
			$title = $_LANG['attr_list'] . ' - ' . $mod_name;
			$head = array('link'=>$_LANG['add_attr'], 'href'=>'product/model?act=write_attr&mod_id=' . $mod_id);

			$list = $this->db->getAll("SELECT * FROM #@__product_attribute AS Attribute LEFT JOIN #@__product_attribute_label AS AttributeLabel ON Attribute.label_id=AttributeLabel.label_id WHERE mod_id=" . (int)$mod_id);

			$this->set(compact('list'));

		} elseif($action == 'write_attr') {
			$mod_id = Common::getParam('mod_id');
			$mod_name = $this->db->getOne("SELECT mod_name FROM #@__product_model WHERE mod_id=" . (int)$mod_id);
			$title = $_LANG['add_attr'] . ' -- ' . $mod_name;
			$head = array('link'=>$_LANG['attr_list'], 'href'=>'product/model?act=list_attr&mod_id=' . $mod_id);

			if(!empty($_POST)) {
				//处理添加或编辑属性
				Common::checkArray($_POST, 'wrt_attr_name', 'wrt_mod_id');
				$this->db->autoWrite($_POST, 'product_attribute');
				exit("ok");
			}

			if(isset($_GET['id']) && is_numeric($_GET['id'])) {
				//取出属性进行编辑
				$this->tpl->assign('edit', $this->db->getRowById('product_attribute', (int)$_GET['id']));
			}

			//取出可供选择的标签
			$labels = $this->db->getAll("SELECT label_id, label_name FROM #@__product_attribute_label");

			$this->set(compact('mod_id', 'labels'));
			$this->tpl->assign('attr_types', array('text'=>$_LANG['text'], 'radio'=>$_LANG['radio'], 'checkbox'=>$_LANG['checkbox']));
			$this->tpl->assign('available', $this->getAlter());
		}

		$this->tpl->assign('action', $action);
        $this->setHInfo($title, $head['link'], $head['href']);
		$this->display();
	}

	//删除模型处理方法
	public function ajaxDeleteModel() {
		$ids = array();
		if(isset($_POST['id'])) {
			$ids[] = $_POST['id'];
		} elseif(isset($_POST['ids'])) {
			if(is_array($_POST['ids'])) {
				$ids = $_POST['ids'];
			} else {
				$ids[] = $_POST['ids'];
			}
		}
		$ids = implode(',', $ids);
		$sql = "DELETE Model, Attr, Ext FROM #@__product_model AS Model LEFT JOIN #@__product_attribute AS Attr ON Model.mod_id=Attr.mod_id LEFT JOIN #@__product_attribute_relate AS Ext ON Attr.attr_id=Ext.attr_id WHERE Model.mod_id IN (" . $ids . ")";

		$this->db->query($sql) or $this->db->printError($this->db->errorMsg());
		exit("ok");
	}

	//删除模型中的属性(单个)
	public function ajaxDeleteModelAttr() {
		$ids = array();
		if(isset($_POST['id'])) {
			$ids[] = $_POST['id'];
		} elseif(isset($_POST['ids'])) {
			if(is_array($_POST['ids'])) {
				$ids = $_POST['ids'];
			} else {
				$ids[] = $_POST['ids'];
			}
		}

		if(!empty($ids)) {
			$ids = implode(',', $ids);
			$sql = "DELETE Attr, Ext FROM #@__product_attribute AS Attr LEFT JOIN #@__product_attribute_relate AS Ext ON Attr.attr_id=Ext.attr_id WHERE Attr.attr_id IN (" . $ids . ")";
			$this->db->query($sql) or exit($this->db->errorMsg());
			exit("ok");
		} else {
			exit("The request is illegal.");
		}
	}

	/**
	 * Private
	 */

	 private function _deleteProduct($ids) {
        $id_arr = array();
        if(!is_array($ids)) {
        	$id_arr[] = $ids;
        } else {
        	$id_arr = $ids;
        }
        $id_ins = implode(',', $id_arr);

        //delete attachment data in description
        Common::clearTextAttachment($ids, 2);

        //delete gallery data
        $gallery = $this->db->getAll("SELECT * FROM #@__product_gallery WHERE product_id IN(" . $id_ins . ")");
        if(!empty($gallery)) {
        	foreach($gallery as $value) {
        		@unlink(UPLOAD_PATH . $value['image']);
                @unlink(UPLOAD_PATH . $value['image_thumb']);
        	}
        }
        $this->db->query("DELETE FROM #@__product_gallery WHERE product_id IN(" . $id_ins . ")");

        //delete product data
        $products = $this->db->getAll("SELECT product_thumb, product_img FROM #@__products WHERE product_id IN(" . $id_ins . ")");
        if(!empty($products)) {
        	foreach($products as $value) {
        		@unlink(UPLOAD_PATH . $value['product_thumb']);
                @unlink(UPLOAD_PATH . $value['product_img']);
        	}
        }
        $this->db->query("DELETE FROM #@__products WHERE product_id IN(" . $id_ins . ")");
        return true;
    }


    /*
     * 商品品牌 begin
     */
     public function listBrand() {
        global $_LANG;

        $like = set_or_get_search(App::url('product/listBrand'), $_LANG['name'], 'brand_name', '', $this->tpl, false, 'product_brand');

        $list = $this->db->getAll("SELECT * FROM #@__product_brand WHERE " . $like . " ORDER BY ordering ASC, brand_id ASC");
        $this->set(compact('list'));
        $this->setHInfo($_LANG['brand_list'], $_LANG['add_brand'], App::url('product/writeBrand'));
     	$this->display();
     }

     public function writeBrand() {
     	global $_LANG;
        $title = $_LANG['add_brand'];
        $reload = App::url('product/writeBrand');

        if(!empty($_POST)) {
            Common::checkArray($_POST, 'wrt_brand_name');

            $wrt_id = Common::getParameter('wrt_id');
            $logo = Common::getParameter('logo');
            if($wrt_id) {
            	$this->checkOldImage('product_brand', 'logo', $wrt_id, $logo);
            } else {
            	if($this->db->isExist('product_brand', array('brand_name'=>$_POST['wrt_brand_name']))) {
                    exit($_LANG['the_brand_has_exist']);
                }
            }

            $this->db->autoWrite($_POST, 'product_brand');
            exit("ok");
        }

        if(isset($_GET['id']) && is_numeric($_GET['id'])) {
            $brand_id = intval($_GET['id']);
            $edit = $this->db->getRowById('product_brand', $brand_id);
            $reload = App::url('product/listBrand');
        	$this->set(compact('edit'));
        }

        $this->setHInfo($title, $_LANG['brand_list'], App::url('product/listBrand'));
        $this->tpl->assign('is_available', $this->getAlter());
        $this->set(compact('reload'));
        $this->display();
     }

     /*
      * 商品品牌end
      */
}


