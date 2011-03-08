<?php
if (__FILE__ == '') {
    die('Fatal error code: 0');
}

require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "core" . DIRECTORY_SEPARATOR . "configs" . DIRECTORY_SEPARATOR . "constants.php");

//动态载入类
function class_autoload($classname) {
	/*加载通用class */

	//查找核心classes目录中的类
	$class_in_classes = CLASSES_PATH . strtolower($classname) . '.class.php';
	//查找核心classes目录中的接口
	$interface_in_classes = CLASSES_PATH . strtolower($classname) . '.interface.php';
	//查找核心configs目录
	$class_in_configs = CONFIG_PATH . strtolower($classname) . '.class.php';

	if(file_exists($class_in_classes)) {
		require_once($class_in_classes);
	} elseif(file_exists($interface_in_classes)) {
		require_once($interface_in_classes);
	} elseif(file_exists($class_in_configs)) {
		require_once($class_in_configs);
	}

	/*加载模块组件*/
	if(strpos($classname, 'Extension')>0) {
		$filename = str_replace('Extension', '', $classname);

		$filename = App::camelCaseToFilename($filename) . '.php';
		$filename = EXTENSION_PATH . $filename;
		$basefile = EXTENSION_PATH . 'extension.php';
		if(file_exists($filename) && file_exists($basefile)) {
			require_once($basefile);
			require_once($filename);
		}
	}
}

spl_autoload_register('class_autoload');

//初始化设置
@ini_set('memory_limit', '64M');
@ini_set('session.cache_expire', 180);
@ini_set('session.use_trans_sid', 0);
@ini_set('session.use_cookies', 1);
@ini_set('session.auto_start', 0);

//设置session超时
@ini_set('session.gc_maxlifetime', SESSION_EXPIRY); //设置SESSION超时
@ini_set('session.gc_probability', 1);
@ini_set('session.gc_divisor', 1);

$db = &MySql::getInstance();
$sess = &new Session();

$cache = &new Cache();
//载入系统配置数据
$cache->readSysConfigCache();

//设置时区
if($cfg['timezone']) {
    date_default_timezone_set($cfg['timezone']);
}

if(isset($cfg['is_debug']) && $cfg['is_debug'] == 1) {
    @ini_set('display_errors', 1);
    error_reporting(E_ALL);
} else {
    @ini_set('display_errors', 0);
    error_reporting(0);
}

require_once(CORE_PATH . "Engine/Smarty.class.php");
$tpl = new Smarty();
$tpl->error_reporting = E_ALL & ~E_NOTICE;
$tpl->left_delimiter = '<{';
$tpl->right_delimiter = '}>';
$tpl->force_compile = false;


header('Content-Type: text/html; charset=' . CHARSET);

Common::parseJson($_POST);
Common::parseJson($_COOKIE);

//预处理提交数据
if(!get_magic_quotes_gpc()) {
	Common::addslashes($_POST);
	Common::addslashes($_COOKIE);
}