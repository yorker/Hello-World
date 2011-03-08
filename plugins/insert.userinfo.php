<?php
function smarty_insert_userinfo($param, &$smarty) {
	global $sess, $_LANG;
	
	if($sess->check('user.alias')) {
		$alias = $sess->get('user.alias');		
		if(!empty($append)) {
			$append .= ' | <a href="logout.php">' . $_LANG['logout'] . '</a>';
		} else {
			$append .= ' <a href="logout.php">' . $_LANG['logout'] . '</a>';
		}
	} else {
		$alias = $GLOBALS['_LANG']['visiter'];
		if(!empty($append)) {
			$append .= ' | <a href="logout.php">' . $_LANG['logout'] . '</a>';
		} else {
			$append .= ' <a href="logout.php">' . $_LANG['logout'] . '</a>';
		}
	}
	if($sess->check('user.user_id')) {
		$user = $sess->get('user');
	} else {
		$user = '';
	}	
	$smarty->assign('user', $user);
	$revalue = $smarty->fetch('elements/userinfo.html');
	return $revalue;
}
