<?php
/*
 * Created on Feburary 17, 2011
 * Author By Yorker
 */

class ArticleController extends AppController {
	public function listArticle() {
		global $_LANG;
		//设置关键字查找
		set_or_get_search(App::url('article/listArticlePage'), $_LANG['title'], 'title', 'a', $this->tpl, true, 'article');

		//设置分类选项
		$datas[''] = $_LANG['all'];
		$this->ext->formatArticleCat($datas, 0, 0);
		set_category(App::url('article/listArticlePage'), 'cat_id', $datas, '', $this->tpl, true);

        $h_href = 'article/writeArticle';
		if(isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
			$cat_id = $_GET['cat_id'];
            $h_href .= '?cat_id=' . $cat_id;
			$this->tpl->assign('init_url', App::url('article/listArticlePage?cat_id=' . $cat_id));
		    $this->tpl->assign('cat_id', $cat_id);
		} else {
			$this->tpl->assign('init_url', App::url('article/listArticlePage'));
		}
        $this->setHInfo($_LANG['article_list'], $_LANG['add_article'], $h_href);
		$this->display();
	}

	public function listArticlePage() {
		global $_LANG;
		$like = set_or_get_search(App::url('article/listArticlePage'), $_LANG['title'], 'title', 'a', $this->tpl, true);

		if(isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
			$cat_id = (int)$_GET['cat_id'];
            $this->tpl->assign('cat_id', $cat_id);
			$cats = $this->ext->getArticleCatChildren($cat_id);
			$where = ' AND c.cat_id IN (' . implode(',', $cats) . ') ';
		} else {
			$where = '';
		}

		$total = $this->db->getOne("SELECT COUNT(*) AS cnt FROM #@__article AS a INNER JOIN #@__article_cat AS c ON c.cat_id=a.cat_id WHERE " . $like . $where);

		$page = Pagination::getCurrentPage('article_list');

		$pages = Pagination::page($total, $page, App::url('article/listArticlePage'), PAGE_SIZE);

		$list = $this->db->getAll("SELECT a.article_id, a.cat_id, a.title, a.click_count, c.cat_name, a.cover_img, a.published, a.create_time, a.link, a.ordering, a.is_hot, a.is_top, a.is_commended FROM #@__article AS a INNER JOIN #@__article_cat AS c ON c.cat_id=a.cat_id WHERE " . $like . $where . " ORDER BY a.ordering ASC, a.create_time DESC LIMIT " . ($page-1)*PAGE_SIZE . ", " . PAGE_SIZE);
		foreach($list as &$val) {
			$tmp = '';
			if($val['is_top'] == 1) {
				$tmp .= empty($tmp) ? $_LANG['set_top'] : ', '.$_LANG['set_top'];
			}
			if($val['is_hot'] == 1) {
				$tmp .= empty($tmp) ? $_LANG['set_hot'] : ', '.$_LANG['set_hot'];
			}
			if($val['is_commended'] == 1) {
				$tmp .= empty($tmp) ? $_LANG['set_commend'] : ', '.$_LANG['set_commend'];
			}
			$val['mix_options']	= $tmp;
			unset($tmp);
		}

		$this->tpl->assign('upload_url', UPLOAD_URL);
		$this->set(compact('pages', 'list'));
        $this->clearLayout();
		$this->display();
	}

	public function writeArticle() {
		global $_LANG;
		if(!empty($_POST)) {
			Common::checkArray($_POST, 'wrt_title', 'wrt_cat_id');
			$_POST['wrt_tags'] = trim($_POST['wrt_tags']);
			if(empty($_POST['wrt_keywords']) && !empty($_POST['wrt_tags'])) {
				//自动生成关键字
				$_POST['wrt_keywords'] = str_replace(' ', ',', $_POST['wrt_tags']);
				unset($arrtmp);
			}
			if(empty($_POST['wrt_description']) && !empty($_POST['wrt_content'])) {
				//自动生成描述性文字
				$_POST['wrt_description'] = Common::substr(strip_tags($_POST['wrt_content']), 250, false);
			}

			if(isset($_POST['wrt_id']) && is_numeric($_POST['wrt_id'])) {
				$_POST['wrt_update_time'] = time();
				if(isset($_POST['wrt_cover_img']) && !empty($_POST['wrt_cover_img'])) {
					$cover_img = $this->db->getOne("SELECT cover_img FROM #@__article WHERE article_id=" . (int)$_POST['wrt_id']);
					if($cover_img != $_POST['wrt_cover_img']) {
						Common::unlink(UPLOAD_PATH . $cover_img);
						Common::unlink(UPLOAD_PATH . Common::addPostfix($cover_img, '_thumb'));
					}
				}
		        //预先提取出原有的标签集
		        $oldtags = $this->db->getOne("SELECT tags FROM #@__article WHERE article_id=" . (int)$_POST['wrt_id']);
			} else {
				$_POST['wrt_create_time'] = $_POST['wrt_update_time'] = time();
		        $oldtags = '';
			}
			$_POST['wrt_admin_id'] = $this->sess->get('admin.admin_id');
			$_POST['wrt_admin_name'] = $this->sess->get('admin.admin_name');
			$_POST['wrt_is_top'] = isset($_POST['wrt_is_top']) && !empty($_POST['wrt_is_top']) ? 1 : 0;
			$_POST['wrt_is_hot'] = isset($_POST['wrt_is_hot']) && !empty($_POST['wrt_is_hot']) ? 1 : 0;
			$_POST['wrt_is_commended'] = isset($_POST['wrt_is_commended']) && !empty($_POST['wrt_is_commended']) ? 1 : 0;

			$last_id = $this->db->autoWrite($_POST, 'article');
		    if($last_id) {
		        Common::textAttachment($_POST['wrt_content'], $last_id, 1);
		    }

		    Common::handleTags($oldtags, $_POST['wrt_tags'], $last_id, 1);
		    exit('ok');
		}


		//页面标题
		$pageTitle = $_LANG['add_article'];

		if(isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$edit = $this->db->getRowByid('article', $id);
			Common::justifyImage($edit['content']);
			$this->tpl->assign('edit', $edit);
			$pageTitle = $_LANG['edit_article'];
		}

		//封面图片的缩略图大小
		$thumb = Common::getConfigValue('article_cover_thumb');
		$thumb = explode('*', $thumb);

		//是否有分类参数
        $h_href = 'article/listArticle';
		if(isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])) {
			$cat_id = $_GET['cat_id'];
            $h_href .= '?cat_id=' . $cat_id;
		    $this->tpl->assign('cat_id', $cat_id);
		} else {
			$cat_id = null;
		}

		//调入文章分类树信息
		$art_cat[''] = $_LANG['please_choose'];
		$this->ext->formatArticleCat($art_cat, 0, 1);

		$catopt = '';
		foreach($art_cat as $k=>$v) {
			if(intval($k) > 0) {
				$cnt = $this->db->getOne("SELECT COUNT(*) AS cnt FROM #@__article_cat WHERE cat_id=" . (int)$k . " AND is_terminal=1");
				if($cnt) {
					if((isset($edit['cat_id']) && $k == $edit['cat_id']) || $k == $cat_id) {
						$catopt .= '<option value="' . $k . '" selected>' . $v . '</option>';
					} else {
						$catopt .= '<option value="' . $k . '">' . $v . '</option>';
					}
				} else {
					$catopt .= '<optgroup label="' . $v . '"></optgroup>';
				}
			} else {
				$catopt .= '<option value="' . $k . '">' . $v . '</option>';
			}
		}


		$this->tpl->assignByRef('catopt', $catopt);
		$this->tpl->assign('thumb', $thumb);

		//构建打开类型数据选项
		$this->tpl->assign('link_open_type', array('0'=>$_LANG['open_type_self'], '1'=>$_LANG['open_type_new']));

		//是否发布选项
		$this->tpl->assign('published', array('1'=>$_LANG['yes'], '0'=>$_LANG['no']));

		$this->setHInfo($pageTitle, $_LANG['article_list'], $h_href);
		$this->display();
	}

	public function listCategory() {
        global $_LANG;
		$datas = null;
		$this->ext->formatArticleCat($datas, 0, 0);

		$list = array();

		foreach($datas as $key => $value) {
			$tmp = $this->db->getRowById('article_cat', $key);
			$tmp['cat_name'] = $value;
			//Evaluate the number of articles under category
			$cat_ids = $this->ext->getArticleCatChildren($tmp['cat_id']);
			$tmp['art_num'] = $this->db->getOne("SELECT COUNT(*) AS cnt FROM #@__article WHERE cat_id IN(" . implode(',', $cat_ids) . ")");

			$this->db->query("SELECT DISTINCT parent_id FROM #@__article_cat WHERE cat_id IN (" . implode(',', $cat_ids) . ")");
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

		unset($datas);

		$this->set(compact('list'));
        $this->setHInfo($_LANG['article_cat_list'], $_LANG['add_article_cat'], 'article/writeCategory');

		$this->display();
	}

	public function writeBatchCategory() {
		global $_LANG;
		if(isset($_REQUEST['do']) && $_REQUEST['do'] == 'add') {
			//OP：处理文章分类批量添加
			Common::checkArray($_POST, 'wrt_cat_name', 'wrt_parent_id', 'wrt_ordering', 'wrt_is_terminal');
			$data = array();
			$data['wrt_parent_id'] = $_POST['wrt_parent_id'];
			$data['wrt_ordering'] = $_POST['wrt_ordering'];
			$data['wrt_is_terminal'] = $_POST['wrt_is_terminal'];

			$cat_names = explode('#', $_POST['wrt_cat_name']);
			foreach($cat_names as $cat_name) {
				$data['wrt_cat_name'] = trim($cat_name);
				$this->db->autoWrite($data, 'article_cat');
			}
			exit('ok');

		} else {
			$format_article[0] = $_LANG['top_cat'];
			$this->ext->formatArticleCat($format_article, 0, 0, 0);

			$this->tpl->assign('format_article', $format_article);
			$this->tpl->assign('alternative', $this->getAlter());
			exit($this->tpl->fetch('article/write_batch_category.tpl'));
		}

	}

	public function writeCategory() {
		global $_LANG;
		if(!empty($_POST)) {
			Common::checkArray($_POST, 'wrt_cat_name', 'wrt_ordering', 'wrt_parent_id');
			if($this->db->autoWrite($_POST, 'article_cat')) {
				exit('ok');
			}
		}


		$art_cat = array();
		$art_cat['0'] = $_LANG['top_cat'];
		$this->ext->formatArticleCat($art_cat, 0, 1, 0);

		if(isset($_GET['id']) && !empty($_GET['id'])) {
			$data = $this->db->getRowById('article_cat', (int)$_GET['id']);
			$title = $_LANG['edit_cat'];
			$this->tpl->assign('edit', $data);
		} else {
			$title = $_LANG['add_article_cat'];
		}

		$this->set(compact('art_cat'));
		$this->tpl->assign('is_terminal', $this->getAlter());
        $this->setHInfo($title, $_LANG['article_cat_list'], 'article/listCategory');
		$this->display();
	}

	public function procDeleteArticle() {
		$ids = array();

		/**
		 * 获取$ids集的处理。这样处理是因为请求可能来自两个JS函数deleteById和batchDeleteByCheckbox
		 */
		if(isset($_POST['id'])) {
			$ids[] = $_POST['id'];
		} elseif($_POST['ids']) {
			if(is_array($_POST['ids'])) {
				$ids = $_POST['ids'];
			} else {
				$ids[] = $_POST['ids'];
			}
		}
		$this->_deleteArticle($ids);
		exit("ok");
	}

	//delete article one or more
	private function _deleteArticle($ids) {
		$id_arr = array();
		if(is_array($ids)) {
			$id_arr = $ids;
		} else {
			$id_arr[] = $ids;
		}

		//delete image from text attachment
		Common::clearTextAttachment($id_arr, 1);

		//delete tags about this's file
		foreach($id_arr as $id) {
            $oldtags = $this->db->getOne("SELECT tags FROM #@__article WHERE article_id=" . (int)$id);
            Common::handleTags($oldtags, '', $id, 1);

            $cover_img = $this->db->getOne("SELECT cover_img FROM #@__article WHERE article_id=" . (int)$id);
            if($cover_img) {
            	Common::unlink(UPLOAD_PATH . $cover_img);
            	Common::unlink(UPLOAD_PATH . Common::addPostfix($cover_img, '_thumb'));
            }
            $this->db->deleteById('article', $id);
		}
	}
}




