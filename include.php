<?php
!defined('SITE_EXEC') && define('SITE_EXEC', true);

require_once('core/init.php');

//动态载入类
function frontend_autoload($classname) {
    $pathname = FINC . strtolower($classname) . '.class.php';
    if(file_exists($pathname)) {
    	require_once($pathname);
    }
}
spl_autoload_register('frontend_autoload');

$set_local = isset($_SESSION['set_local']) && in_array($_SESSION['set_local'], $config->locals) ? $_SESSION['set_local'] : 'zh_cn';
require_once(CORE_PATH . "languages/" . $set_local . "/site.lang.php");

require_once(FINC . "functions.php");

//实例化相关对象
$util = new Util();

$tpl->template_dir = 'templates';
$tpl->compile_dir = 'templates_c/'.$set_local;
$tpl->cache_dir = 'cache/'.$set_local;
$tpl->plugins_dir[] = ROOT_PATH . 'plugins';
$tpl->plugins_dir[] = ADMIN_PATH . 'plugins';

if(intval($cfg['open_cache']) == 1) {
	$tpl->caching = Smarty::CACHING_LIFETIME_CURRENT;
} else {
	$tpl->caching = Smarty::CACHING_OFF;
}
if(intval($cfg['cache_lifetime']) > 0) {
	$tpl->cache_lifetime = $cfg['cache_lifetime'];
}


if(!file_exists($tpl->compile_dir)) {
	mkdir($tpl->compile_dir, 0777, true) or exit('You have no privilege to create directory: ' . $tpl->compile_dir);
}
if(!file_exists($tpl->cache_dir)) {
	mkdir($tpl->cache_dir, 0777, true) or exit('You have no privilege to create directory: ' . $tpl->cache_dir);
}

if($cfg['open_ip_acess_log'] == 1) {
	log_ip();
}

//统计网站的访问情况
log_statistics();

//记录日志
if($cfg['enable_log'] == 1) {
    Common::writeLog(false);
}

$arc = new Article();
$download = new Download();

require_once(FINC . "common.module.php");

if($sess->check('user.user_id')) {
	$tpl->assign('user', $sess->get('user'));
}

//获取当前的URI
$here = Common::getCurUrl();

//记住上次的URL
if($sess->check('record_url.current')) {
	$last_url = $sess->get('record_url.current');
	if(strpos($last_url, 'loading.php') === false) {
		$sess->set('record_url.last', $last_url);
	}
}
$sess->set('record_url.current', $here);
if($sess->check('record_url.last')) {
	$last_url = $sess->get('record_url.last');
	$tpl->assign('last_url', $last_url);
}
$tpl->assign('here', $here);
$tpl->assignByRef('lang', $_LANG);
$tpl->assign('upload_url', UPLOAD_URL);