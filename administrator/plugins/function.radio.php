<?php
/*
 * Created on 2010-6-27
 * Author by Yorker
 * Call: <{radio label="性别" name="sex" value=$sex checked=}>
 */

function smarty_function_radio($param, &$smarty) {
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

    if(isset($param['attrs']) && !empty($param['attrs'])) {
		$attrs = $param['attrs'];
    } else {
    	$attrs = '';
    }

    $input = '';
    foreach($value as $k => $v) {
        if(isset($param['checked']) && $param['checked'] == $k) {
            $input .= $v . ' <input type="radio" name="' . $name . '" value="' . $k . '" checked ' . $attrs . '/>&nbsp;&nbsp;&nbsp;&nbsp;';
        } else {
            $input .= $v . ' <input type="radio" name="' . $name . '" value="' . $k . '" ' . $attrs . '/>&nbsp;&nbsp;&nbsp;&nbsp;';
        }
    }

    $output = form_common_struct($input, $param);

    return $output;

}

?>
