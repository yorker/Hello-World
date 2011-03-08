<?php
/*
 * Created on 2010-7-2
 * Author by Yorker
 * Call: <{admin_switcher t="article" f="published" value=$itm.published id=$itm.article_id}>
 */

function smarty_function_admin_switcher($param, &$smarty) {
    if(isset($param['t']) && !empty($param['t'])) {
        $table = $param['t'];
    } else {
    	$smarty->trigger_error('admin_switcher: missing "t" parameter');
    }
    if(isset($param['f']) && !empty($param['f'])) {
        $field = $param['f'];
    } else {
        $smarty->trigger_error('admin_switcher: missing "f" parameter');
    }
    if(isset($param['id']) && !empty($param['id'])) {
        $id = $param['id'];
    } else {
        $smarty->trigger_error('admin_switcher: missing "id" parameter');
    }
    if(isset($param['value']) && (is_numeric($param['value']) || !empty($param['value']))) {
        $value = $param['value'];
    } else {
        $smarty->trigger_error('admin_switcher: missing "value" parameter');
    }

    if($value) {
    	$src="images/yes.gif";
    } else {
    	$src="images/no.gif";
    }

    $output = '<img onclick="switcher(this, \'' . $table . '\', \'' . $field . '\', \'' . $id . '\', event)" src="' . $src . '" style="cursor:pointer" border="0" title="' . $GLOBALS['_LANG']['status_switch'] . '"/>';

    return $output;

}

?>
