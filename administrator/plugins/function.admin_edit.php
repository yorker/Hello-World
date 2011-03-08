<?php
/*
 * Created on 2010-7-2
 * Author by Yorker
 */

function smarty_function_admin_edit($param, &$smarty) {
    if(isset($param['href']) && !empty($param['href'])) {
        $href = $param['href'];
    } else {
    	$smarty->trigger_error('admin_edit: missing "href" parameter');
    }
    if(isset($param['id']) && !empty($param['id'])) {
        $id = $param['id'];
    } else {
        $smarty->trigger_error('admin_edit: missing "id" parameter');
    }
    if(strpos($href, '?')>0) {
    	$href .= '&id=' . $id;
    } else {
    	$href .= '?id=' . $id;
    }
    $output = '<a href="' . $href . '" onclick="loadPage(this.href);return(false)" title="' . $GLOBALS['_LANG']['edit'] . '"><img src="images/icon_edit.gif" border="0"/></a>';
    return $output;

}

?>
