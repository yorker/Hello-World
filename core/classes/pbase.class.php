<?php
/**
 * Create On February 3, 2011
 * Author by Yorker
 */
class Pbase {	
	function getCurrentPage($setSessionPre='', $clearSession=false) {
		if($clearSession) {
			unset($_SESSION[$setSessionPre.'_page']);
		}
		if(isset($_GET['page']) && is_numeric($_GET['page'])) {
			$page = $_GET['page'];
		} elseif(isset($_POST['page']) && is_numeric($_POST['page'])) {
			$page = $_POST['page'];
		}elseif(isset($_SESSION[$setSessionPre.'_page']) && $_SESSION[$setSessionPre.'_page'] > 1) {
			$page = $_SESSION[$setSessionPre.'_page'];
		} else {
			$page = 1;
		}

		if(!isset($_SESSION)) {
			session_start();
		}

		$_SESSION[$setSessionPre.'_page'] = $page;

		return $page;
	}

	function unsetPageSession($setSessionPre='') {
		if(isset($_SESSION[$setSessionPre.'_page'])) {
			unset($_SESSION[$setSessionPre.'_page']);
		}
	}
}