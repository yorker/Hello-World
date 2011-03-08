<?php
/**
 * Create On February 16, 2011
 * Author By Yorker
 */

class AdvertisementController extends AppController {
	public function listFlashAds() {
		$list = $this->db->getAll("SELECT * FROM #@__flash_ads ORDER BY ordering ASC");
		$this->set(compact('list'));
        $this->setHInfo($GLOBALS['_LANG']['flash_ads_management'], $GLOBALS['_LANG']['add_flash_ads'], 'advertisement/writeFlashAds');
		$this->display();
	}

	public function writeFlashAds() {
        global $_LANG;
		if(!empty($_POST)) {
			Common::checkArray($_POST, 'wrt_image', 'wrt_link', 'wrt_ordering');
			$_POST['wrt_link'] = trim($_POST['wrt_link']);
			if(strpos($_POST['wrt_link'], 'http://') !== 0) {
				$_POST['wrt_link'] = 'http://' . $_POST['wrt_link'];
			}
			$_POST['wrt_create_datetime'] = date('Y-m-d H:i:s');

			$this->db->autoWrite($_POST, 'flash_ads');
			exit('ok');
		}
		$flash_size = explode('*', Common::getConfigValue('flash_size'));
        $title = $_LANG['add_flash_ads'];
		if(isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$edit = $this->db->getRowById('flash_ads', $id);
            $title = $_LANG['edit_flash_ads'];
			$this->set(compact('edit'));
		}
		$this->tpl->assign('flash_size_note', $GLOBALS['cfg']['flash_size']);
		$this->tpl->assign('flash_size', $flash_size);
        $this->setHInfo($title, $_LANG['list_flash_ads'], 'advertisement/listFlashAds');
		$this->display();
	}

	public function listAdvPosition() {
		global $_LANG;
		//广告位置列表
		$title = $_LANG['adv_position'];
		$head_top = array('link'=>$_LANG['add_position'], 'href'=>'advertisement/writeAdvPosition');
		$list = $this->db->getAll("SELECT Pos.*, COUNT(Ads.pos_id) AS ads_num FROM #@__ad_position AS Pos LEFT JOIN #@__ads AS Ads ON Pos.pos_id=Ads.pos_id GROUP BY Pos.pos_id ORDER BY Pos.pos_id");

		$this->set(compact('list'));
        $this->setHInfo($title, $head_top['link'], $head_top['href']);
		$this->display();
	}

	public function writeAdvPosition() {
		global $_LANG;
		//添加/编辑广告位置
		$title = $_LANG['add_position'];
		$head_top = array('link'=>$_LANG['adv_position'], 'href'=>'advertisement/listAdvPosition');

		if(!empty($_POST)) {
			Common::checkArray($_POST, 'wrt_pos_name', 'wrt_img_width', 'wrt_img_height');
			$this->db->autoWrite($_POST, 'ad_position');

			exit("ok");
		}

		if(isset($_GET['id']) && !empty($_GET['id'])) {
			$edit = $this->db->getRowById('ad_position', (int)$_GET['id']);
			$title = $_LANG['edit_position'];
			$this->set(compact('edit'));
		}
		$this->setHInfo($title, $head_top['link'], $head_top['href']);
		$this->display();
	}

	public function listAdv() {
		global $_LANG;
		//广告列表
		$title = $_LANG['adv_list'];
		$head_top = array('link'=>$_LANG['add_adv'], 'href'=>'advertisement/writeAdv');
		if(isset($_GET['pos_id']) && !empty($_GET['pos_id'])) {
			$pos_id = (int)$_GET['pos_id'];
			$where = "Ads.pos_id=" . $pos_id;
		} else {
			$pos_id = '';
			$where = "1=1";
		}

		$list = array();
		$values = array(''=>$_LANG['please_choose']);
		$this->db->query("SELECT Ads.*, Pos.img_width, Pos.img_height, Pos.pos_name FROM #@__ads AS Ads LEFT JOIN #@__ad_position AS Pos ON Ads.pos_id=Pos.pos_id WHERE " . $where . " ORDER BY id");
		while($row = $this->db->loadAssoc()) {
			$row['position'] = $row['pos_name'] . '(' . $_LANG['width'] . ':' . $row['img_width'] . 'px * ' . $_LANG['height'] . ':' . $row['img_height'] . 'px)';
			$list[] = $row;

		}

		$this->db->query("SELECT pos_id, img_width, img_height, pos_name FROM #@__ad_position ORDER BY pos_id");
		while($row = $this->db->loadAssoc()) {
			$values[$row['pos_id']] = $row['pos_name'] . '(' . $_LANG['width'] . ':' . $row['img_width'] . 'px * ' . $_LANG['height'] . ':' . $row['img_height'] . 'px)';
		}

		set_category(App::url('advertisement/listAdv'), 'pos_id', $values, $pos_id, $this->tpl, false);
		$this->set(compact('pos_id', 'list'));
        $this->setHInfo($title, $head_top['link'], $head_top['href']);
		$this->display();
	}

	public function writeAdv() {
		global $_LANG;
		//添加/编辑广告
		$title = $_LANG['add_adv'];
		$head_top = array('link'=>$_LANG['adv_list'], 'href'=>'advertisement/listAdv');

		if(!empty($_POST)) {
			Common::checkArray($_POST, 'wrt_title', 'wrt_pos_id', 'wrt_image');
			if(empty($_POST['wrt_start_time'])) {
				$_POST['wrt_start_time'] = '0000-00-00';
			}
			if(empty($_POST['wrt_end_time'])) {
				$_POST['wrt_end_time'] = '0000-00-00';
			}
			$this->db->autoWrite($_POST, 'ads');
			exit("ok");
		}

		if(isset($_GET['id']) && !empty($_GET['id'])) {
			$edit = $this->db->getRowById('ads', (int)$_GET['id']);
			$title = $_LANG['edit_adv'];
			$op_reurl = 'advertisement/listAdv';
			$this->set(compact('edit'));
		} else {
			$op_reurl = 'advertisement/writeAdv';
		}


		$this->db->query("SELECT pos_id, pos_name, img_width, img_height FROM #@__ad_position ORDER BY pos_id");
		$cats = array(''=>$_LANG['please_choose']);
		while($row = $this->db->loadAssoc()) {
			$cats[$row['pos_id']] = $row['pos_name'] . '(' . $_LANG['width'] . ':' . $row['img_width'] . 'px * ' . $_LANG['height'] . ':' . $row['img_height'] . 'px)';
		}

		if(isset($_GET['pos_id']) && !empty($_GET['pos_id'])) {
			$op_reurl .= '&pos_id=' . $_GET['pos_id'];
			$this->tpl->assign('pos_id', (int)$_GET['pos_id']);
		}
		$this->set(compact('cats', 'op_reurl'));
        $this->setHInfo($title, $head_top['link'], $head_top['href']);
		$this->tpl->assign('published', array('1'=>$_LANG['yes'], '0'=>$_LANG['no']));
		$this->tpl->assign('open_types', array('0'=>$_LANG['open_type_self'], '1'=>$_LANG['open_type_new']));
		$this->display();

	}
}