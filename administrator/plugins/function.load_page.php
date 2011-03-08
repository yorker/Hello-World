<?php
/*
 * Created on 2010-6-25
 * Author by Yorker
 */

function smarty_function_load_page($param, &$smarty) {
    if(!isset($param['link']) || empty($param['link'])) {
        $smarty->trigger_error('load_page: missing \'link\' parameter');
        return;
    }
    if(isset($param['class']) && !empty($param['class'])) {
    	$class = 'class="' . $param['class'] . '"';
    } else {
    	$class = '';
    }
	if(!isset($param['href']) || empty($param['href'])) {
		return '<a href="javascript:void(0)" ' . $class . '>' . $param['link'] . '</a>';
	}

	$string = '<a href="' . $param['href'] . '" onclick="loadPage(this.href, 1);return(false)" ' . $class . '>' . $param['link'] . '</a>';

	return $string;
}