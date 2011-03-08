<?php
/*
 * Created on Feburary 18, 2011
 * Author By Yorker
 **/
class PictureController extends AppController {
	public function listPicture() {
		global $_LANG;
		$title = $_LANG['c_picture_manage'];
	    if(isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
	        $href = 'picture/writePicture?cat_id=' . $_GET['cat_id'];
	    } else {
	        $href = 'picture/writePicture';
	    }
		$head = array('link'=>$_LANG['add_c_picture'], 'href'=>$href);

	    set_or_get_search(App::url('picture/listPicturePage'), $_LANG['title'], 'title', 'p', $this->tpl, true, 'picture_collect');

	    if(isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
	        $cat_id = $_GET['cat_id'];
	        $pageurl = 'picture/listPicturePage?cat_id='.$cat_id;
	    } else {
	        $cat_id = '';
	        $pageurl = 'picture/listPicturePage';
	    }

	    $cats = array(''=>$_LANG['please_choose']);
	    $this->db->query("SELECT cat_id, name FROM #@__normal_category WHERE type=2");
	    while($row = $this->db->loadAssoc()) {
	        $cats[$row['cat_id']] = $row['name'];
	    }
	    set_category(App::url('picture/listPicturePage'), 'cat_id', $cats, $cat_id, $this->tpl, true);


	    $this->tpl->assign('pageurl', App::url($pageurl));
        $this->setHInfo($title, $head['link'], $head['href']);
	    $this->display();
	}

	public function listPicturePage() {
		global $_LANG;
		$where = set_or_get_search(App::url('picture/listPicturePage'), $_LANG['title'], 'title', 'p', $this->tpl, true);
        if(isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])) {
            $cat_id = (int)$_GET['cat_id'];
            $this->tpl->assign('cat_id', $cat_id);
            $where .= " AND p.cat_id=" . $cat_id . " ";
        }
        $page = Pagination::getCurrentPage('_list_pictures');
        $total = $this->db->getOne("SELECT COUNT(*) AS cnt FROM #@__picture_collect AS p INNER JOIN #@__normal_category AS c ON p.cat_id=c.cat_id WHERE " . $where);

        $pages = Pagination::page($total, $page, App::url('picture/listPicturePage'), PAGE_SIZE);

        $list = $this->db->getLimit("SELECT p.*, c.name AS cat_name FROM #@__picture_collect AS p INNER JOIN #@__normal_category AS c ON p.cat_id=c.cat_id WHERE " . $where . " ORDER BY p.ordering ASC", ($page-1)*PAGE_SIZE, PAGE_SIZE);
        foreach($list as &$l) {
            $l['gallery_num'] = $this->db->getOne("SELECT COUNT(*) AS cnt FROM #@__picture_gallery WHERE cid=" . (int)$l['id']);
            $l['cover_img_thumb'] = Common::addPostfix($l['cover_img'], '_thumb');
        }

        $this->set(compact('list', 'pages'));
        $this->clearLayout();
        $this->display();
	}

	public function deletePicGallery() {
		$cid = Common::getParam('cid');
		$cid = explode('-', $cid);
		foreach($cid as $id) {
			$res = $this->db->getFieldById('picture_collect', $id, 'cover_img');
			$cover_img = $res['cover_img'];
			$cover_img_thumb = Common::addPostfix($cover_img, '_thumb');
			Common::unlink(UPLOAD_PATH . $cover_img);
			Common::unlink(UPLOAD_PATH . $cover_img_thumb);
			$this->db->query("DELETE FROM #@__picture_collect WHERE id=" . (int)$id) or exit($this->db->errorMsg());
			unset($res);
			$res = $this->db->query("SELECT image, image_thumb, image_small FROM #@__picture_gallery WHERE cid=" . (int)$id);
			while($row = $this->db->loadAssoc($res)) {
				Common::unlink(UPLOAD_PATH . $row['image']);
				Common::unlink(UPLOAD_PATH . $row['image_thumb']);
				Common::unlink(UPLOAD_PATH . $row['image_small']);
			}
			$this->db->query("DELETE FROM #@__picture_gallery WHERE cid=" . (int)$id) or exit($this->db->errorMsg());

		}
		exit("ok");
	}

	public function writePicture() {
		global $_LANG;
		$title = $_LANG['add_c_picture'];
		$head = array('link'=>$_LANG['c_picture_manage'], 'href'=>'picture/listPicture');

	    if(!empty($_POST)) {
			Common::checkArray($_POST, 'wrt_title', 'wrt_cat_id', 'wrt_cover_img', 'wrt_ordering');

			if(isset($_POST['wrt_id']) && is_numeric($_POST['wrt_id'])) {
				$_POST['wrt_update_datetime'] = date('Y-m-d H:i:s');
	            $res = $this->db->getFieldById('picture_collect', (int)$_POST['wrt_id'], 'cover_img');
	            $cover_img = $res['cover_img'];

			} else {
				$_POST['wrt_create_datetime'] = $_POST['wrt_update_datetime'] = date('Y-m-d H:i:s');
			}
			$last_id = $this->db->autoWrite($_POST, 'picture_collect');

	        //检查是否有封面图片更新
	        if(isset($cover_img) && !empty($cover_img) && !empty($_POST['wrt_cover_img']) && $_POST['wrt_cover_img'] != $cover_img) {
	            Common::unlink(UPLOAD_PATH . $cover_img);
	            $cover_img_thumb = Common::addPostfix($cover_img, '_thumb');
	            Common::unlink(UPLOAD_PATH . $cover_img_thumb);
	        }

			//处理图集，挂接
			foreach($_POST as $key=>$value) {
				if(strpos($key, 'gallery_') === 0) {
					list($g, $id) = explode('_', $key);
					if(isset($id) && is_numeric($id)) {
						$this->db->updateById('picture_gallery', array('cid'=>$last_id, 'comment'=>$value), $id) or exit('Handle picture collect failed: ' . $this->db->errorMsg());
					}
				}
			}
			exit("ok");
		}

	    //分类数据
	    $reurl = 'picture/writePicture';
		$cats = array(''=>$_LANG['please_choose']);
		$this->db->query("SELECT cat_id, name FROM #@__normal_category WHERE type=2 ORDER BY ordering");
		while($row = $this->db->loadAssoc()) {
			$cats[$row['cat_id']] = $row['name'];
		}
		if(isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
			$reurl .= '?cat_id=' . $_GET['cat_id'];
	        $this->tpl->assign('cat_id', $_GET['cat_id']);
	    }

	    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
	        $id = (int)$_GET['id'];
	        $edit = $this->db->getRowById('picture_collect', $id);
	        $edit['gallery'] = $this->db->getAll("SELECT * FROM #@__picture_gallery WHERE cid=" . (int)$edit['id']);
	        $reurl = 'picture/listPicture?cat_id=' . $edit['cat_id'];
            $title = $_LANG['edit_c_picture'];
	        $this->set(compact('edit'));
	    }

	    $reurl = App::url($reurl);

		$this->tpl->assign('cats', $cats);
		$this->tpl->assign('published', array('1'=>$_LANG['yes'], '0'=>$_LANG['no']));
		$this->tpl->assign('sessionid', session_id());
		$this->set(compact('reurl'));
        $this->setHInfo($title, $head['link'], $head['href']);
		$this->display();
	}

	public function cancelGallery() {
		$id = Common::getParam('id');
		$row = $this->db->getRowById('picture_gallery', $id);
		if(!empty($row)) {
			Common::unlink(UPLOAD_PATH . $row['image']);
			Common::unlink(UPLOAD_PATH . $row['image_thumb']);
			Common::unlink(UPLOAD_PATH . $row['image_small']);
			$this->db->deleteById('picture_gallery', $id);
			exit("ok");
		} else {
			exit('The object you want to operate is empty!');
		}
	}
}



