<?php
/*
 * Created on 2010-6-26
 * Author by Yorker
 */

function smarty_function_submit($param, &$smarty) {
    $input = '<input type="submit" ';
    if(isset($param['name']) && !empty($param['name'])) {
    	$name = $param['name'];
    } else {
    	$name = 'submit';
    }
    $input .= 'name="' . $name . '" ';

    if(isset($param['value']) && !empty($param['value'])) {
        $value = $param['value'];
    } else {
    	$value = 'Submit';
    }

    $input .= 'value="' . $value . '" ';

    $input .= ' class="btn" />';

	if(isset($param['back_url']) && !empty($param['back_url'])) {
		$back_url = $param['back_url'];
		$reset = '<input type="button" name="back" value="' . $GLOBALS['_LANG']['back'] . '" class="btn" onclick="loadPage(\'' . $back_url . '\', 1)"/>';
	} else {
		$reset = '<input type="reset" name="reset" value="' . $GLOBALS['_LANG']['reset'] . '" class="btn"/>';
	}

   

    $output = '<div class="line clearfix"><div class="f1">&nbsp;</div><div class="f2">' . $input . '&nbsp;&nbsp;&nbsp;&nbsp;' . $reset . '</div></div>';

    return $output;


}
?>
