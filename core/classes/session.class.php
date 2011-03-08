<?php
/*
 * @Created on Jul 18, 2009
 * @Author by Yorker
 */
class Session {
	function __construct() {
		if(!isset($_SESSION)) {
			session_start();
		}

		if(defined('SESSION_EXPIRY') && intval(SESSION_EXPIRY) > 0) {
			ini_set('session.gc_maxlifetime', SESSION_EXPIRY);
			ini_set('session.gc_probability', 1);
			ini_set('session.gc_divisor', 1);
		}
	}

	function set($key, $value) {
		$this->__checkKey($key);
		$karr = explode('.', $key);
		$_list = &$_SESSION;
		$index = count($karr) - 1;

		foreach($karr as $i => $k) {
			$k = is_numeric($k) ? intval($k) : $k;
			if($index == $i) {
				$_list[$k] = $value;
			} else {
				if(!isset($_list[$k])) {
					$_list[$k] = array();
				}
				$_list = &$_list[$k];
			}
		}
	}

	function get($key) {
		if($this->check($key)) {
			$karr = explode('.', $key);
			$index = count($karr) - 1;
			$_list = &$_SESSION;

			foreach($karr as $i => $k) {
				if($index == $i && isset($_list[$k])) {
					return $_list[$k];
				}
				$_list = &$_list[$k];
			}
		} else {
			return '';
		}
	}

	function del($key) {
		if($this->check($key)) {
			$karr = explode('.', $key);
			$index = count($karr) - 1;

			$_list = &$_SESSION;

			foreach($karr as $i => $k) {
				if($index == $i && isset($_list[$k])) {
					unset($_list[$k]);
				}
				$_list = &$_list[$k];
			}
		}
	}

	function getId() {
		return session_id();
	}

	function destroy() {
		session_unset();
		session_destroy();
	}

	function clean() {
		session_unset();
	}

	function check($key) {
		$this->__checkKey($key);
		$karr = explode('.', $key);
		$_list = &$_SESSION;
		$index = count($karr) - 1;

		foreach($karr as $i => $k) {
			if($index == $i && isset($_list[$k])) {
				return true;
			}
			$_list = &$_list[$k];
		}
		return false;
	}

	private function __checkKey($key) {
		if(is_string($key) && preg_match('/^[0-9a-zA-Z\._-]*$/', $key))
			return true;
		else
			exit('Invalide key: ' . $key);
	}
}

?>