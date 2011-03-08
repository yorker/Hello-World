<?php
/*
 * Created on 2010-6-27
 * Author by Yorker
 * Call: <{checkbox label="兴趣" name="favorite" value=$favorites note="请选择您的兴趣爱好"}>
 */

function smarty_function_checkbox($param, &$smarty) {
    //name
    if(isset($param['name']) && !empty($param['name'])) {
        $name = $param['name'];
    } else {
        $smarty->trigger_error("checkbox: missing 'name' parameter");
    }
    //lable
    if(isset($param['label']) && !empty($param['label'])) {
        $label = $param['label'];
    } else {
        $smarty->trigger_error("checkbox: missing 'label' parameter");
    }

    if(isset($param['value']) && !empty($param['value'])) {
        if(is_array($param['value'])) {
        	$value = $param['value'];
        } else {
        	$value = array($param['value']);
        }
    } else {
    	$smarty->trigger_error("checkbox: missing correct 'value' parameter");
    }

    if(isset($param['checked']) && !empty($param['checked'])) {
    	if(!is_array($param['checked'])) {
    		$checked = array($param['checked']);
    	} else {
    		$checked = $param['checked'];
    	}
    } else {
    	$checked = array();
    }

    $input = '';
    foreach($value as $k => $v) {
        if(in_array($k, $checked)) {
            $input .= $v . ' <input type="checkbox" name="' . $name . '" value="' . $k . '" checked/>&nbsp;&nbsp;&nbsp;&nbsp;';
        } else {
        	$input .= $v . ' <input type="checkbox" name="' . $name . '" value="' . $k . '"/>&nbsp;&nbsp;&nbsp;&nbsp;';
        }

    }

    $output = form_common_struct($input, $param);

    return $output;

}
?>
