<?php
function smarty_block_sql($params, $content, &$smarty, &$repeat) {
	if(!$content) {
		return;
	}
	if(isset($params['sql']) && !empty($params['sql'])) {
		$sql = $params['sql'];
	} else {
		$smarty->trigger_error("Miss parameter 'sql' ");
	}

	$tagParse = new TagParse($content);
	
	$res = $GLOBALS['db']->query($sql);
	while($row = $GLOBALS['db']->loadAssoc()) {
		$tagParse->assign($row);
	}

	return $tagParse->getResult();	
}