<?php
/*
 * Created on Feburary 18, 2011
 * Author By Yorker
 **/
class CommonController extends AppController {
	/**
	 * 公共分类，对一些小分类提供集成分类，以类型type标识区分，比如下载分类、图集分类等
	 */
	public function listNormalCategory() {
		global $_LANG;
		$type = isset($_GET['type']) && is_numeric($_GET['type']) ? (int)$_GET['type'] : exit('Invalid Request: Missing Parameter...');
		$head = array();
		if($type == 1) {
			//下载分类
			$title = $_LANG['download_cat'];
			$head = array('link'=>$_LANG['add_download_cat'], 'href'=>'common/writeNormalCategory?type=1');
		    $cnt_table = 'download';

		} elseif($type == 2) {
			//图集分类
			$title = $_LANG['c_picture_cat_manage'];
			$head = array('link'=>$_LANG['add_c_picture_cat'], 'href'=>'common/writeNormalCategory?type=2');
		    $cnt_table = 'picture_collect';

		}

		$list = $this->db->getAll("SELECT dc.*, COUNT(d.id) AS num FROM " . $this->db->table('normal_category') . " AS dc LEFT JOIN " . $this->db->table($cnt_table) . " AS d ON dc.cat_id=d.cat_id WHERE dc.type=" . $type . " GROUP BY dc.cat_id ORDER BY ordering ASC, create_datetime DESC");

		$this->set(compact('list', 'type'));
        $this->setHInfo($title, $head['link'], $head['href']);
		$this->display();
	}


	public function writeNormalCategory() {
		global $_LANG;
		if(!empty($_POST)) {
			Common::checkArray($_POST, 'wrt_name', 'wrt_ordering', 'wrt_published', 'wrt_type');
			$_POST['wrt_create_datetime'] = date('Y-m-d H:i:s');
			$this->db->autoWrite($_POST, 'normal_category') and exit("ok");
		}

		$head = array();
		if(isset($_GET['type']) && is_numeric($_GET['type'])) {
			$type = (int)$_GET['type'];
			switch($type) {
				case 1:
					//下载分类
					$title = isset($_GET['id']) && !empty($_GET['id']) ? $_LANG['edit_download_cat'] : $_LANG['add_download_cat'];
					$head = array('link'=>$_LANG['download_cat'], 'href'=>'common/listNormalCategory?type=1');
					break;
				case 2:
					//图集分类
					$title = isset($_GET['id']) && !empty($_GET['id']) ? $_LANG['edit_c_picture_cat'] : $_LANG['add_c_picture_cat'];
					$head = array('link'=>$_LANG['c_picture_cat_manage'], 'href'=>'common/listNormalCategory?type=2');
					break;

				default:
					exit('Invalid Request...');

			}


			if(isset($_GET['id']) && !empty($_GET['id'])) {
				$id = (int)$_GET['id'];
				$edit = $this->db->getRowById('normal_category', $id);
				$this->set(compact('edit'));
			}

			$this->tpl->assign('published', $this->getAlter());
			$this->set(compact('type'));
            $this->setHInfo($title, $head['link'], $head['href']);
			$this->display();

		} else {
			exit("Missing the 'type' parameter!");
		}
	}
}

