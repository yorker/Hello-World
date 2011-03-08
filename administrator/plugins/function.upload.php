<?php
/*
 * Created on 2010-6-27
 * Author by Yorker
 */

function smarty_function_upload($param, &$smarty) {
    //name
    if(isset($param['name']) && !empty($param['name'])) {
        $name = $param['name'];
    } else {
        $smarty->trigger_error("upload: missing 'name' parameter");
    }
    //lable
    if(isset($param['label']) && !empty($param['label'])) {
        $label = $param['label'];
    } else {
        $smarty->trigger_error("upload: missing 'label' parameter");
    }

    $input = '<input type="text" name="' . $name . '" ';

    //value
    if(isset($param['value']) && !empty($param['value'])) {
        $input .= 'value="' . $param['value'] . '" ';
        $size_arr = getimagesize(UPLOAD_PATH . $param['value']);
        if($size_arr !== false) {
            $imgw = $size_arr[0]>250 ? 250 : $size_arr[0];
            $wh = ' width="' . $imgw . '" ';
        } else {
        	$wh = '';
        }
        $preview = '<div><img ' . $wh . ' src="' . UPLOAD_URL . $param['value'] .  '" border="0"/></div>';
    } else {
        $input .= 'value="" ';
        $preview = '';
    }

    //size
    if(isset($param['size'])) {
        $param['size'] = strtolower($param['size']);
        if($param['size'] == 's') {
            $input .= 'size="8" ';
        } elseif($param['size'] == 'm') {
            $input .= 'size="28" ';
        } elseif($param['size'] == 'l') {
            $input .= 'size="80" ';
        }
    } else {
        $input .= 'size="28" ';
    }

    //style
    $style = '';
    if(isset($param['style']) && !empty($param['style'])) {
        $style = $param['style'];
    }
    if($style) {
        $input .= 'style="' . $style . '" ';
    }

    //required
    if(isset($param['required']) && strtolower($param['required']) == 'true') {
        $msg = $GLOBALS['_LANG']['please_upload_image'];
        $input .= 'required="true" msg="' . $msg . '" ';
    }

    //attr
    if(isset($param['attr']) && !empty($param['attr'])) {
        $input .= $param['attr'] . ' ';
    }
    $input .= ' readonly="true" id="imgload"/>';

    if(isset($param['required']) && strtolower($param['required']) == 'true') {
        $input .= '<span class="red">&nbsp;*&nbsp;</span>';
    }

    if(isset($param['thumb_width']) && is_numeric($param['thumb_width']) && isset($param['thumb_height']) && is_numeric($param['thumb_height'])) {
        $thumb = '&thumb_width=' . $param['thumb_width'] . '&thumb_height=' . $param['thumb_height'];
    } else {
    	$thumb = '';
    }

    $input .= '&nbsp;&nbsp;<a href="' . ADMIN_URL . 'includes/sys_upload.php?load=imgload' . $thumb . '&KeepThis=true&TB_iframe=true&height=200&width=400&modal=true" title="' . $label . '" class="thickbox"><img src="' . ADMIN_IMG . 'folderup_16.png" border="0"/></a>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="del_old_pic(\'imgload\', \'preview\')"><img src="' . ADMIN_IMG . 'icon_drop.gif" border="0"/></a>';

    $output = '<script type="text/javascript" src="' . ROOT_URL . 'js/thickbox.js"></script>';
    $output .= '<div class="line clearfix"><div class="f1">' . $param['label'] . '</div><div class="f2" style="width:60%">' . $input;
    if(isset($param['note']) && !empty($param['note'])) {
        $note = '<div class="note">' . $param['note'] . '</div>';
    } else {
    	$note = '';
    }
    $output .= '<div id="preview">' . $note . $preview . '</div></div></div>';

    return $output;
}
?>
