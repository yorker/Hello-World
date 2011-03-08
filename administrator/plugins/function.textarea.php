<?php
/*
 * Created on 2010-6-30
 * Author by Yorker
 * Call: <{textarea label="注备" name="desc" required="true" width="700px" height="350px"}>
        <{textarea label="内容" id="content" name="content" required="true" width="700px" height="350px"}>
 */

function smarty_function_textarea($param, &$smarty) {
    //name
    if(isset($param['name']) && !empty($param['name'])) {
        $name = $param['name'];
    } else {
        $smarty->trigger_error("text: missing 'name' parameter");
    }
    //lable
    if(isset($param['label']) && !empty($param['label'])) {
        $label = $param['label'];
    } else {
        $smarty->trigger_error("text: missing 'label' parameter");
    }

    $style = '';
    if(isset($param['width']) && !empty($param['width'])) {
        $style .= 'width:' . $param['width'] . ';';
    } else {
    	$style .= 'width:700px;';
    }
    if(isset($param['height']) && !empty($param['height'])) {
        $style .= 'height:' . $param['height'] . ';';
    } else {
    	$style .= 'height:350px;';
    }

    if(isset($param['id']) && !empty($param['id'])) {
    	$id = $param['id'];
    } else {
    	$id = '';
    }

    //value
    if(isset($param['value']) && !empty($param['value'])) {
        $value = $param['value'];
    } else {
        $value = '';
    }

    $input = '<textarea style="' . $style . '" name="' . $name . '" id="' . $id . '" ';

    //required
    if(isset($param['required']) && strtolower($param['required']) == 'true') {
        $msg = $GLOBALS['_LANG']['not_empty'] . $label;
        $input .= 'required="true" msg="' . $msg . '" ';
    }

    $input .= '>' . $value . '</textarea>';

    $output = form_common_struct($input, $param);

    return $output;

}
?>
