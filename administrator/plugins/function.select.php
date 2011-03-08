<?php
/*
 * Created on 2010-6-26
 * Author by Yorker
 * Call: <{select label="分类" name="category" value=$options selected="value值" required="true" note="注解"}>
 */

function smarty_function_select($param, &$smarty) {
    //name
    if(isset($param['name']) && !empty($param['name'])) {
        $name = $param['name'];
    } else {
        $smarty->trigger_error("select: missing 'name' parameter");
    }
    //lable
    if(isset($param['label']) && !empty($param['label'])) {
        $label = $param['label'];
    } else {
        $smarty->trigger_error("select: missing 'label' parameter");
    }

    $input = '<select name="' . $name . '" onchange="checkSingle(this)" ';

    //style
    if(isset($param['style']) && !empty($param['style'])) {
        $input .= 'style="' . $param['style'] . '" ';
    }

    //required
    if(isset($param['required']) && strtolower($param['required']) == 'true') {
        $msg = $GLOBALS['_LANG']['not_empty'] . $label;
        $input .= 'required="true" msg="' . $msg . '" ';
    }

    //id
    if(isset($param['id']) && !empty($param['id'])) {
        $input .= 'id="' . $param['id'] . '" ';
    }

    //attr
    if(isset($param['attr']) && !empty($param['attr'])) {
        $input .= $param['attr'] . ' ';
    }
    $input .= '>';

    $options = '';

    if(isset($param['value']) && is_array($param['value']) && !empty($param['value'])) {
        $value = $param['value'];
    } else {
    	$value = array();
    }
    foreach($value as $k => $v) {
        if(isset($param['selected']) && $param['selected'] == $k) {
            $options .= '<option value="' . $k . '" selected>' . $v . '</option>';
        } else {
        	$options .= '<option value="' . $k . '">' . $v . '</option>';
        }
    }
    $input .= $options . '</select>';

    $output = form_common_struct($input, $param);

    return $output;

}

?>
