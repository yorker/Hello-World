<?php
/*
 * Created on 2010-7-2
 * Author by Yorker
 */

function smarty_function_admin_view($param, &$smarty) {
    if(isset($param['href']) && !empty($param['href'])) {
        $href = $param['href'];
    } else {
    	$smarty->trigger_error('admin_edit: missing "href" parameter');
    }
    $output = '<a href="' . $href . '" onclick="loadPage(this.href);return(false)" title="' . $GLOBALS['_LANG']['view'] . '"><img src="images/icon_view.gif" border="0"/></a>';
    return $output;

}

?>
