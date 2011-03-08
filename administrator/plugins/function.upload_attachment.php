<?php
/*
 * Created on 2010-9-4
 * Author by Yorker
 */

function smarty_function_upload_attachment($param, &$smarty) {
    //name
    if(isset($param['name']) && !empty($param['name'])) {
        $name = $param['name'];
    } else {
        $smarty->trigger_error("upload_attachment: missing 'name' parameter");
    }
    //lable
    if(isset($param['label']) && !empty($param['label'])) {
        $label = $param['label'];
    } else {
        $smarty->trigger_error("upload_attachment: missing 'label' parameter");
    }

    if(isset($param['attach_type']) && !empty($param['attach_type'])) {
        $attach_type = $param['attach_type'];
    } else {
    	$attach_type = '';
    }

    $input = '<input type="hidden" name="attach_type" value="' . $attach_type . '" id="attach_type"/>';
    $input .= '<input type="text" name="' . $name . '" ';

    //value
    if(isset($param['value']) && !empty($param['value'])) {
        $input .= 'value="' . $param['value'] . '" ';
    } else {
        $input .= 'value="" ';

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
        $msg = $GLOBALS['_LANG']['please_upload_attachment'];
        $input .= 'required="true" msg="' . $msg . '" ';
    }

    //attr
    if(isset($param['attr']) && !empty($param['attr'])) {
        $input .= $param['attr'] . ' ';
    }
    $input .= ' id="attachid"/>';

    if(isset($param['required']) && strtolower($param['required']) == 'true') {
        $input .= '<span class="red">&nbsp;*&nbsp;</span>';
    }

    if(isset($param['note']) && !empty($param['note'])) {
        $note = '<div class="note">' . $param['note'] . '</div>';
    } else {
        $note = '';
    }

    $input .= '&nbsp;&nbsp;<a href="' . ADMIN_URL . 'includes/upload_attachment.php?load=attachid&KeepThis=true&TB_iframe=true&height=200&width=400&modal=true" title="' . $label . '" class="thickbox"><img src="' . ADMIN_IMG . 'folderup_16.png" border="0"/></a>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="del_old_pic(\'attachid\', \'preview\')"><img src="' . ADMIN_IMG . 'icon_drop.gif" border="0"/></a>';

    $output = '<script type="text/javascript" src="' . ROOT_URL . 'js/thickbox.js"></script>';
    $output .= '<div class="line clearfix"><div class="f1">' . $param['label'] . '</div><div class="f2" style="width:60%">' . $input;

    $output .= '<div id="preview">' . $note . '</div></div></div>';

    return $output;
}
?>
