<?php

/**
 * 表单通用结构
 * Create on April 21, 2010
 * Author: Yorker
 */

function form_common_struct($input, &$param) {
    $output = '';
	$output .= '<div class="line clearfix"><div class="f1">' . $param['label'] . '</div><div class="f2">' . $input;
    if(isset($param['required']) && strtolower($param['required']) == 'true') {
        $output .= '<span class="red">&nbsp;*&nbsp;</span>';
    }
    if(isset($param['note']) && !empty($param['note'])) {
        $output .= '<div class="note">' . $param['note'] . '</div>';
    }
    $output .= '</div><div class="f3"><label class="tip"></label></div></div>';
    return $output;
}


function set_or_get_search($base_url, $label, $field, $alias='', &$smarty, $is_page = true, $table='', $condition=array()) {
    $search = array();
    $search['base_url'] = $base_url;
    $search['label'] = $label;
    $search['field'] = $field;
	$search['table'] = $table;
    if(isset($_GET[$field]) && !empty($_GET[$field])) {
    	$search['value'] = $_GET[$field];
    }
    $search['is_page'] = $is_page;
	$cond_str = '';
	if(!empty($condition)) {
		$tmp = array();
		foreach($condition as $key=>$val) {
			$tmp[] = $key . '/' . $val;
			if($alias) {
				$cond_str .= "AND " . $alias . "." . $key . "='" . $val . "' ";
			} else {
				$cond_str .= "AND " . $key . "='" . $val . "' ";
			}
		}
		$search['cond_str'] = implode('-', $tmp);
	} else {
		$search['cond_str'] = '';
	}


	$smarty->assign('search', $search);

    if(isset($_GET[$field]) && !empty($_GET[$field])) {
        if($alias) {
            return $alias . "." . $field . " LIKE '%" . $_GET[$field] . "%' " . $cond_str;
        } else {
        	return $field . " LIKE '%" . $_GET[$field] . "%' " . $cond_str;
        }
    }
    return ' 1=1 ';
}

function set_category($base_url, $field, $values, $selected='', &$smarty, $is_page = true) {
    $choose_category = array();
    $choose_category['base_url'] = $base_url;
    $choose_category['field'] = $field;
    $choose_category['values'] = $values;
    $choose_category['selected'] = $selected;
    if(isset($_GET[$field]) && !empty($_GET[$field])) {
    	$choose_category['selected'] = $_GET[$field];
    } else {
    	$choose_category['selected'] = $selected;
    }
    $choose_category['is_page'] = $is_page;
    $smarty->assignByRef('choose_category', $choose_category);
}

/**
 * 显示信息函数
 */
function show_message($title, $msg, $link = '', $href = '') {
	if($link && $href) {
		$go = '<a href="' . $href . '" onclick="loadPage(this.href, 1);return(false)">' . $link . '</a>';
	} else {
		$go = '';
	}
	$cnt = '<div class="prompt_info"><div class="tit">' . $title . '</div><div class="msg">' . $msg . '&nbsp;&nbsp;' . $go . '</div></div>';

	echo $cnt;
	exit;
}
?>