<?php
/*
 * Created on Feburary 18, 2011
 * Author By Yorker
 **/
class DownloadController extends AppController {
	public function listDownload() {
		global $_LANG;
		set_or_get_search(App::url('download/listDownloadPage'), $_LANG['title'], 'name', 'd', $this->tpl, true, 'download');

		$this->db->query("SELECT * FROM #@__normal_category WHERE type=1 ORDER BY ordering ASC");
		$values = array(''=>$_LANG['please_choose']);
		while($row = $this->db->loadAssoc()) {
			$values[$row['cat_id']] = $row['name'];
		}

		set_category(App::url('download/listDownloadPage'), 'cat_id', $values, '', $this->tpl, true);

		$url = 'download/listDownloadPage';
		if(isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
			$url .= '?cat_id=' . $_GET['cat_id'];
		    $this->tpl->assign('cat_id', $_GET['cat_id']);
		}
        $url = App::url($url);
		$this->set(compact('url'));
        $this->setHInfo($_LANG['download_list'], $_LANG['add_download_item'], 'download/writeDownload' . (isset($_GET['cat_id']) && !empty($_GET['cat_id']) ? 'cat_id=' . $_GET['cat_id'] : ''));
		$this->display();
	}

	public function listDownloadPage() {
		$where = set_or_get_search(App::url('download/listDownloadPage'), $GLOBALS['_LANG']['name'], 'name', 'd', $this->tpl, true);

		if(isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])) {
			$where .= " AND d.cat_id=" . (int)$_GET['cat_id'] . " ";
			$cat_id = (int)$_GET['cat_id'];
		} else {
			$cat_id = '';
		}

		$page = Pagination::getCurrentPage('_list_download');
		$total = $this->db->getOne("SELECT COUNT(*) AS cnt FROM #@__download AS d INNER JOIN #@__normal_category AS dc ON (d.cat_id=dc.cat_id AND dc.type=1) WHERE " . $where);
		$pages = Pagination::page($total, $page, App::url('download/listDownloadPage'), PAGE_SIZE);

		$list = $this->db->getLimit("SELECT d.*, dc.name AS cat_name FROM " . $this->db->table('download') . " AS d INNER JOIN " . $this->db->table('normal_category') . " AS dc ON (d.cat_id=dc.cat_id AND dc.type=1) WHERE " . $where . " ORDER BY d.ordering ASC", ($page-1)*PAGE_SIZE, PAGE_SIZE);

		foreach($list as &$val) {
			$val['filesize'] = Common::cvtByte(filesize(UPLOAD_PATH . $val['path']));
		}

		$this->set(compact('list', 'pages', 'cat_id'));
        $this->clearLayout();
		$this->display();
	}

	//处理下载
	public function getDownload() {
		Common::checkArray($_GET, 'id');
		$id = intval($_GET['id']);
		$row = $this->db->getRow("SELECT id, name, path FROM " . $this->db->table('download') . " WHERE id=" . $id);
		Common::download(UPLOAD_PATH . $row['path']);
		exit;
	}

	public function writeDownload() {
		global $_LANG;
		$reurl = '';
		$admin = $this->sess->get('admin');
		//提取分类
		$this->db->query("SELECT cat_id, name FROM #@__normal_category WHERE type=1 ORDER BY ordering ASC");
		$cats = array(''=>$_LANG['please_choose']);
		while($row = $this->db->loadAssoc()) {
			$cats[$row['cat_id']] = $row['name'];
		}
		if(count($cats) == 1) {
			show_message($_LANG['prompt_info'], $_LANG['add_download_list_before_create_category'], $_LANG['add_download_cat'], App::url('common/writeNormalCategory?type=1'));
		}

		$title = $_LANG['add_download_item'];


		if(!empty($_POST)) {
			Common::checkArray($_POST, 'wrt_cat_id', 'wrt_name', 'wrt_path', 'wrt_ordering', 'wrt_published');
			if(empty($_POST['wrt_create_date'])) {
				$_POST['wrt_create_date'] = date('Y-m-d');
			}
			$_POST['wrt_attach_type'] = $_POST['attach_type'];
			$_POST['wrt_admin_id'] = $admin['admin_id'];
		    if($file_type = strrchr($_POST['wrt_path'], '.')) {
		        $_POST['wrt_file_type'] = $file_type;
		    }

			//如果是修改数据，获取旧文件的数据
			if(isset($_POST['wrt_id']) && !empty($_POST['wrt_id'])) {
				$id = (int)$_POST['wrt_id'];
				$old_path = $this->db->getOne("SELECT path FROM #@__download WHERE id=" . $id);
			}

			if($this->db->autoWrite($_POST, 'download')) {
				if(isset($old_path) && !empty($old_path) && $_POST['wrt_path'] != $old_path) {
					Common::unlink(UPLOAD_PATH . $old_path);
				}
				exit("ok");
			}
		}

		if(isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$edit = $this->db->getRowById('download', $id);
			$reurl = 'download/listDownload';
			$title = $_LANG['edit_download_item'];
			$this->set(compact('edit'));
		} else {
			$reurl = 'download/writeDownload';
		}

        $h_href = 'download/listDownload';
		if(isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
			$reurl .= '?cat_id=' . $_GET['cat_id'];
            $h_href .= '?cat_id=' . $_GET['cat_id'];
		    $this->tpl->assign('cat_id', $_GET['cat_id']);
		}

		$this->set(compact('cats', 'reurl'));
		$this->tpl->assign('published', $this->getAlter());
        $this->setHInfo($title, $_LANG['download_list'], $h_href);
		$this->display();
	}
}