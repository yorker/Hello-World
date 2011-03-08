<?php
/*
 * Created on 2010-7-2
 * Author by Yorker
 */

function smarty_function_admin_delete($param, &$smarty) {
    if(isset($param['t']) && !empty($param['t'])) {
        $table = $param['t'];
    } else {
    	$smarty->trigger_error('admin_delete: missing "t" parameter');
    }
    if(isset($param['id']) && !empty($param['id'])) {
        $id = $param['id'];
    } else {
        $smarty->trigger_error('admin_delete: missing "id" parameter');
    }
    if(isset($param['url']) && !empty($param['url'])) {
        $url = $param['url'];
    } elseif(isset($param['href']) && !empty($param['href'])) {
        $url = $param['href'];
    } else {
        $smarty->trigger_error('admin_delete: missing "url" parameter');
    }
    if(isset($param['menu']) && !empty($param['menu'])) {
        $menu = 1;
    } else {
        $menu = 0;
    }
    if(isset($param['image']) && !empty($param['image'])) {
    	$image = $param['image'];
    } else {
    	$image = '';
    }
	if(isset($param['req_url']) && !empty($param['req_url'])) {
		$req_url = $param['req_url'];
	} else {
		$req_url = '';
	}


    $output = '<a href="javascript:void(0)" onclick="if(confirm(\'' . $GLOBALS['_LANG']['confirm_delete'] . '\')){deleteById(\'' . $table . '\', \'' . $id . '\', \'' . $url . '\', ' . $menu . ', \'' . $image . '\', \'' . $req_url . '\');}" title="' . $GLOBALS['_LANG']['delete'] . '"><img src="images/icon_drop.gif" border="0"/></a>';
    return $output;

}

?>
