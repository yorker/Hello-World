<?php
/*
 * Created on 2010-6-25
 * Author by Yorker
 * Call: {text type="password" label="标题" name="topic" value="" required="true" size="s" style="ime-mode:disabled" attr="" note="提示语言" unique="数据表名" cachedata="1"}
 *
 */

function smarty_function_text($param, &$smarty) {
    //name
    if(isset($param['name']) && !empty($param['name'])) {
    	$name = $param['name'];
    } else {
    	trigger_error("text: missing 'name' parameter");
    }
    //lable
    if(isset($param['label']) && !empty($param['label'])) {
        $label = $param['label'];
    } else {
    	trigger_error("text: missing 'label' parameter");
    }

    if(isset($param['type']) && $param['type'] == 'password') {
        $input = '<input type="password" name="' . $name . '" ';
    } else {
        $input = '<input type="text" name="' . $name . '" ';
    }

    //value
    if(isset($param['value']) && !empty($param['value'])) {
        $input .= 'value="' . $param['value'] . '" ';
    } else {
    	$input .= 'value="" ';
    }

    //id
    if(isset($param['id']) && !empty($param['id'])) {
        $input .= 'id="' . $param['id'] . '" ';

    }

    //size
    if(isset($param['size'])) {
        $param['size'] = strtolower($param['size']);
        if(strtolower($param['size']) == 's') {
        	$input .= 'size="8" ';
        } elseif(strtolower($param['size']) == 'm') {
        	$input .= 'size="28" ';
        } elseif(strtolower($param['size']) == 'l') {
        	$input .= 'size="70" ';
        }
    } else {
    	$input .= 'size="28" ';
    }

    //style
    $style = '';
    if(isset($param['style']) && !empty($param['style'])) {
        $style = $param['style'];
    }
    if(isset($param['type']) && $param['type'] == 'password') {
    	$style = $style == '' ? 'ime-mode:disabled' : $style . '; ime-mode:disabled';
    }
    if($style) {
    	$input .= 'style="' . $style . '" ';
    }

    //required
    if(isset($param['required']) && strtolower($param['required']) == 'true') {
        $input .= 'required="true" ';
        $msg = $GLOBALS['_LANG']['not_empty'] . $label;
    }

    //datatype
    if(isset($param['datatype']) && !empty($param['datatype'])) {
        $input .= 'datatype="' . $param['datatype'] . '" ';
        $msg = $GLOBALS['_LANG']['should_right'] . $label;
    }

    if(isset($msg)) {
        $input .= 'msg="' . $msg . '" ';
    }
    $unique = isset($param['unique']) && !empty($param['unique']) ? $param['unique'] : '';
    $cnf_id = isset($param['cnf_id']) && !empty($param['cnf_id']) ? $param['cnf_id'] : '';

    if(isset($msg) || $unique || $cnf_id) {
        $input .= 'onblur="checkSingle(this, \'' . $unique . '\', \'' . $cnf_id . '\')" ';
    }


    //attr
    if(isset($param['attr']) && !empty($param['attr'])) {
        $input .= $param['attr'] . ' ';
    }
    $input .= ' autocomplete="off"/>';

    if(isset($param['cachedata'])) {
        $identify = isset($param['id']) && !empty($param['id']) ? $param['id'] : $param['name'];
        $req_cache = 'ajax/cachedata?type=' . $identify . '&targetid=' . $identify . '&height=300&width=350';
        $req_cache = App::url($req_cache);
        $input .= '&nbsp;<a href="javascript:void(0)" onclick="openAjaxWin(\'' . $req_cache . '\', 350, 300)">' . $GLOBALS['_LANG']['choose'] . '</a>';
    }


    $output = form_common_struct($input, $param);

    return $output;
}

?>
