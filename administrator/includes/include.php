<?php
!defined('ADMIN_EXEC') && define('ADMIN_EXEC', true);
require_once(dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'init.php');

require_once(CORE_PATH . "languages/zh_cn/common.lang.php");
require_once(ADMIN_PATH . "includes/functions.php");

$tpl->template_dir = ADMIN_PATH . 'views';
$tpl->compile_dir = ADMIN_PATH . 'compiles/zh_cn';
$tpl->plugins_dir[] = ADMIN_PATH . 'plugins';
$tpl->caching = Smarty::CACHING_OFF;

//获取当前的URI
$here = Common::getCurUrl();

//记录日志
if($cfg['enable_log'] == 1) {
    Common::writeLog(true);
}

$tpl->assign('here', $here);
$tpl->assignByRef('lang', $_LANG);
