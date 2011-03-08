<?php
/*
 * Created on 2010-8-9
 * Author by Yorker
 * call {admin_trash t='数据表' f="字段" id="ID" url="重载URL"}
 *
 * 该函数可以适用于产品模块
 */

function smarty_function_admin_trash($param, &$smarty) {
    if(isset($param['url']) && !empty($param['url'])) {
        $url = $param['url'];
    } else {
        $smarty->trigger_error('admin_trash: missing "url" parameter');
    }
    if(isset($param['id']) && !empty($param['id'])) {
        $id = $param['id'];
    } else {
        $smarty->trigger_error('admin_trash: missing "id" parameter');
    }
    if(isset($param['t']) && !empty($param['t'])) {
    	$table = $param['t'];
    } else {
        $smarty->trigger_error('admin_trash: missing "t" parameter');
    }
    if(isset($param['f']) && !empty($param['f'])) {
        $field = $param['f'];
    } else {
        $smarty->trigger_error('admin_trash: missing "f" parameter');
    }
    if(isset($param['v'])) {
        $value = $param['v'];
        if(intval($value) == 1) {
            //放入回收站
            $a_title = $GLOBALS['_LANG']['put_trash'];
            $img_url = 'icon_trash.gif';
        } else {
        	//还原
            $a_title = $GLOBALS['_LANG']['restore'];
            $img_url = 'icon_restore.gif';
        }
    } else {
        $smarty->trigger_error('admin_trash: missing "v" parameter');
    }

    if(isset($param['is_page']) && $param['is_page']) {
        $output = '<a href="javascript:void(0)" onclick="uFieldById(\'' . $table . '\', \'' . $field . '\', \'' . $value . '\', \'' . $id . '\');pagination(\'' . $url . '\')" title="' . $a_title . '"><img src="images/' . $img_url . '" border="0"/></a>';
    } else {
    	$output = '<a href="javascript:void(0)" onclick="uFieldById(\'' . $table . '\', \'' . $field . '\', \'' . $value . '\', \'' . $id . '\', \'' . $url . '\');return(false)" title="' . $GLOBALS['_LANG']['trash'] . '"><img src="images/' . $img_url . '" border="0"/></a>';
    }
    return $output;

}


?>
