<?php
/**
 * 友情链接组件
 * Create On Feburary 16, 2011
 * Author By Yorker
 */

class FriendLinkController extends AppController {

	public function write() {
		global $_LANG;
		if(!empty($_POST)) {
			Common::checkArray($_POST, 'wrt_name', 'wrt_link', 'wrt_ordering');

			$_POST['wrt_link'] = trim($_POST['wrt_link']);
			if(strpos($_POST['wrt_link'], 'http://') !== 0) {
				$_POST['wrt_link'] = 'http://' . $_POST['wrt_link'];
			}

			$this->db->autoWrite($_POST, 'friend_link');

			exit('ok');
		}

		if(isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$edit = $this->db->getRowById('friend_link', $id);
			if(!empty($edit)) {
				$title = $_LANG['edit_friend_link'];
				$this->tpl->assignByRef('edit', $edit);
			}
		} else {
			$title = $_LANG['add_friend_link'];
		}
		$head_top = array('link'=>$_LANG['list_friend_link'], 'href'=>'friendlink/listing');
		$this->setHInfo($title, $head_top['link'], $head_top['href']);
		$this->display();
	}

	public function listing() {
		global $_LANG;
		$like = set_or_get_search(App::url('friendlink/listing'), $_LANG['name'], 'name', '', $this->tpl, false, 'friend_link');
		$list = $this->db->getAll("SELECT * FROM #@__friend_link WHERE " . $like . " ORDER BY ordering ASC");
		$this->set(compact('list'));
        $this->setHInfo($_LANG['friend_link'], $_LANG['add_friend_link'], 'friendlink/write');
		$this->display();
	}

}