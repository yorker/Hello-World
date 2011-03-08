<?php
/*
 * Created on 2010-6-27
 * Author by Yorker
 */

function smarty_function_gettags($param, &$smarty) {
	//subid
	if(isset($param['subid']) && !empty($param['subid'])) {
		$subid = $param['subid'];
	} else {
		$smarty->trigger_error("gettags: missing 'subid' parameter");
	}
	//msgid
	if(isset($param['msgid']) && !empty($param['msgid'])) {
		$msgid = $param['msgid'];
	} else {
		$smarty->trigger_error("gettags: missing 'msgid' parameter");
	}
    //name
    if(isset($param['name']) && !empty($param['name'])) {
        $name = $param['name'];
    } else {
        $smarty->trigger_error("gettags: missing 'name' parameter");
    }
    //lable
    if(isset($param['label']) && !empty($param['label'])) {
        $label = $param['label'];
    } else {
        $smarty->trigger_error("gettags: missing 'label' parameter");
    }

    $input = '<input type="text" name="' . $name . '" ';

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
            $input .= 'size="70" ';
        }
    } else {
        $input .= 'size="70" ';
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
        $msg = $GLOBALS['_LANG']['not_empty'] . $label;
        $input .= 'required="true" msg="' . $msg . '" ';
    }

    //attr
    if(isset($param['attr']) && !empty($param['attr'])) {
        $input .= $param['attr'] . ' ';
    }
    $input .= ' id="mytags"/>';

    if(isset($param['required']) && strtolower($param['required']) == 'true') {
        $input .= '&nbsp;<span class="red">&nbsp;*&nbsp;</span>';
    }

	$button = '&nbsp;&nbsp;<input type="button" class="btn" id="gettagbutton" value="' . $GLOBALS['_LANG']['available_tag'] . '" onclick="gettags(this,\'mytags\', \'' . $subid . '\', \'' . $msgid . '\')"/>';
	$output = '';
    $output .= '<div class="line clearfix"><div class="f1">' . $param['label'] . '</div><div class="f2">' . $input . $button;
    $note = '<div class="note">' . $GLOBALS['_LANG']['tag_please_separate_with_space'] . '</div>';
    $output .= $note . '</div></div>';

    return $output;
}
?>
