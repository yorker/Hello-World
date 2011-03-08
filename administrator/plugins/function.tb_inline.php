<?php
/*
 * Created on 2010-9-4
 * Author by Yorker
 */

function smarty_function_tb_inline($param, &$smarty) {
    if(isset($param['label']) && !empty($param['label'])) {
        $label = $param['label'];
    } else {
    	$smarty->trigger_error('tb_inline: missing "label" parameter');
    }
    if(isset($param['title']) && !empty($param['title'])) {
        $title = '<p style="font-weight:bold;border-bottom:1px solid #777777">' . $param['title'] . '</p>';
    } else {
    	$title = '';
    }

    if(isset($param['detail']) && !empty($param['detail'])) {
        $detail = $param['detail'];
    } else {
    	$smarty->trigger_error('tb_inline: missing "detail" parameter');
    }

    $w = isset($param['width']) && is_numeric($param['width']) ? $param['width'] : 380;
    $h = isset($param['height']) && is_numeric($param['height']) ? $param['height'] : 185;

    $inlineId = 'inline_id_' . rand(1, 99999);

    $output = '';
    if(!isset($GLOBALS['include_tb']) || !$GLOBALS['include_tb']) {
        $output .= '<script type="text/javascript" src="' . ROOT_URL . 'js/thickbox.js"></script>';
        $GLOBALS['include_tb'] = true;
    }

    $output .= '<a href="#TB_inline?height=' . $h . '&width=' . $w . '&inlineId=' . $inlineId . '" class="thickbox" title="' . $label . '">' . $label . '</a><div id="' . $inlineId . '" style="display:none">' . $title . '<p>' . $detail . '</p></div>';

    return $output;
}
?>
