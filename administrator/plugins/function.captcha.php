<?php
/*
 * Created on 2010-6-26
 * Author by Yorker
 */
function smarty_function_captcha($param, &$smarty) {

    $input = '<input type="text" size="5" name="vcode" value="" required="true" msg="' . $GLOBALS['_LANG']['not_empty'] . $GLOBALS['_LANG']['captcha'] . '"/>';

    $output = '<div class="line clearfix"><div class="f1">' . $GLOBALS['_LANG']['captcha'] . '</div><div class="f2">' . $input . '</div><div class="f3"><span class="red">&nbsp;*&nbsp;</span> <img src="' . ROOT_URL . 'validate.php" class="captcha_img" onclick="re_captcha(this)" title="' . $GLOBALS['_LANG']['change_one_captcha'] . '" /></div></div>';
    return $output;
}
?>
