<?php
/*
 * Created on February 15, 2011
 * Author by Yorker
 * Call: {app_url url="url"}
 *
 */

function smarty_function_app_url($param, &$smarty) {
    //name
    if(isset($param['url']) && !empty($param['url'])) {
    	$url = $param['url'];
    } else {
    	$smarty->trigger_error("app_url: missing 'url' parameter");
    }  

    return App::url($url);
}

?>
