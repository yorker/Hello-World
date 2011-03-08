<?php
/*
 * Created on 2010-6-25
 * Author by Yorker
 * Call: {text type="password" label="标题" name="topic" value="" required="true" size="s" style="ime-mode:disabled" attr="" note="提示语言" unique="数据表名"}
 *
 */

function smarty_function_label($param, &$smarty) {
    //name
    if(isset($param['value']) && !empty($param['value'])) {
    	$value = $param['value'];
    } else {
    	$smarty->trigger_error("label: missing 'value' parameter");
    }
    //lable
    if(isset($param['label']) && !empty($param['label'])) {
        $label = $param['label'];
    } else {
    	$smarty->trigger_error("label: missing 'label' parameter");
    }

    $input = $value;


    $output = form_common_struct($input, $param);

    return $output;
}

?>
