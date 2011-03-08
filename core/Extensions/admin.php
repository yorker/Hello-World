<?php
/**
 * Admin Component Class
 * Create On Feburary 20, 2011
 * Author By Yorker
 */
class AdminExtension extends Extension {
	public function __construct() {
		parent::__construct();
	}
	public function adminLogin($admin_name, $password) {
		$admin = $this->db->getRow("SELECT * FROM " . $this->db->table('sys_admin') . " WHERE admin_name='" . $admin_name . "' AND password='" . Common::encrypt($password) . "'");
		if(!empty($admin)) {
			if($admin['is_available'] == 0) {
				setcookie('remember_login_admin', '');
				setcookie('remember_login_password', '');
				Common::error($GLOBALS['_LANG']['admin_account_forbidden_tip'], 1908);
			}
			if(!isset($_SESSION)) {
				session_start();
			}
			//更新相关信息
			$admin_id = (int)$admin['admin_id'];
			$this->db->updateById('sys_admin', array('ip'=>$_SERVER['REMOTE_ADDR'], 'update_time'=>time()), $admin_id);
			$_SESSION['admin'] = $this->getAdmin($admin_id);

			//确保登录后跳转到开始页
			setcookie('url', App::url('system/sysStart'));
			return true;
		} else {
			return false;
		}
	}

	function isAdminLogin() {
		if(isset($_SESSION['admin']) && count($_SESSION['admin'])>0) {
			return true;
		} else {
			Common::redirect(App::url('system/sysLogin'));
		}
	}

	function getAdmin($admin_id = 0) {
		if($admin_id) {
			return $this->db->getRowById('sys_admin', $admin_id);
		} else {
			if(isset($_SESSION['admin']) && count($_SESSION['admin'])>0) {
				$admin = $_SESSION['admin'];
				return $admin;
			} else {
				Common::redirect(App::url('system/sysLogin'));
			}
		}
	}

}