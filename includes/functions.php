<?php
/**
 * Usually used in frontend, some common function
 * Create on: 15, November 2010	
 */

function create_position($pos) {
	if(empty($pos)) {
		return '';
	} else {
		if(is_array($pos)) {
			$tmp = '';
			$len = count($pos);
			for($i = 0; $i < $len; $i++) {
				if($i+1 == $len) {
					$tmp .= '<li>&gt;&gt;</li><li class="last">' . $pos[$i] . '</li>';
				} else {
					$tmp .= '<li>&gt;&gt;</li><li>' . $pos[$i] . '</li>';
				}
			}
		} else {
			$tmp = '<li>&gt;&gt;</li><li>' . $pos . '</li>';
		}
		$reval = '<div id="nav_position"><ul class="clearfix"><li><a href="index.html">首页</a></li>' . $tmp . '</lu></div>';
		return $reval;
	}
}

function getUrl($str, $kv=array()) {
	global $cfg;
	if(isset($cfg['open_rewrite']) && $cfg['open_rewrite'] == 1) {
		if(!empty($kv)) {
			foreach($kv as $k=>$v) {
				$str .= '-' . $k . '-' . $v;
			}

		}
		return $str . '.html';
	} else {		
		$param = '';
		if(!empty($kv)) {			
			foreach($kv as $k=>$v) {
				$param .= empty($param) ? '?'.$k.'='.$v : '&'.$k.'='.$v;
			}
		}
		return $str . '.php' . $param;
	}
}

function log_ip() {
	global $util, $db;
	//记录访问信息
	$rip = $_SERVER['REMOTE_ADDR'];
	$area = $util->ip2area($rip, DATA_PATH . 'iptable/tinyipdata.dat');
	$row = $db->getRow("SELECT update_datetime, id FROM " . $db->table('sys_access_ip') . " WHERE ip='" . $rip . "' AND create_datetime>'" . date('Y-m-d') . "'");
	if(!empty($row)) {
		if(time() - strtotime($row['update_datetime']) > 120) {
			$db->query("UPDATE " . $db->table('sys_access_ip') . " SET num=num+1, update_datetime='" . date('Y-m-d H:i:s') . "' WHERE id='" . (int)$row['id'] . "'");
		}
	} else {
		$db->insert("sys_access_ip", array('ip'=>$rip, 'num'=>1, 'area'=>$area, 'create_datetime'=>date('Y-m-d H:i:s'), 'update_datetime'=>date('Y-m-d H:i:s')));
	}
}

function log_statistics() {
	global $util, $db;
	$rip = $_SERVER['REMOTE_ADDR'];
	$today = strtotime(date('Y-m-d'));
	$now = time();
	$user_id = isset($user['user_id']) && is_numeric($user['user_id']) ? (int)$user['user_id'] : 0;
	
	$old = $db->getRow("SELECT id, create_time FROM " . $db->table('sys_access_statistics') . " WHERE ip='" . $rip . "' AND create_time>=" . (int)$today);
	if(!empty($old)) {
		if($now - intval($old['create_time']) > 120) {
			$db->query("UPDATE " . $db->table('sys_access_statistics') . " SET num=num+1, create_time=" . (int)$now . " WHERE id=" . (int)$old['id']);
		}
	} else {
		$db->insert('sys_access_statistics', array('ip'=>$rip, 'num'=>1, 'create_time'=>$now, 'user_id'=>$user_id));
	}
	return true;
}

//用户登录验证，成功则返回用户信息，失败则返回false
function sys_login($username, $password) {
	global $db;
	$user = $db->getRow("SELECT * FROM " . $db->table('users') . " WHERE username='" . $username . "' AND password='" . Common::encrypt($password) . "' AND is_available=1");
	if(!empty($user)) {
		$db->query("UPDATE " . $db->table('users') . " SET update_time=" . time() . ", ip='" . $_SERVER['REMOTE_ADDR'] . "', visit_count=visit_count+1 WHERE user_id=" . (int)$user['user_id']);
		return $user;
	} else {
		return false;
	}

}