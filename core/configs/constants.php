<?php
/**
 * 系统配置
 */
!defined('CHARSET') && define('CHARSET', 'utf-8');
!defined('SESSION_EXPIRY') && define('SESSION_EXPIRY', 1440);
//后台分页时每页显示的记录数
!defined('PAGE_SIZE') && define('PAGE_SIZE', 8);

!defined('DS') && define('DS', DIRECTORY_SEPARATOR);

//网站根路径
!defined('ROOT_PATH') && define('ROOT_PATH', preg_replace('/core(.*)/i', '',__FILE__));

//网站根URL地址
!defined('ROOT_URL') && define('ROOT_URL', str_replace(str_replace('\\', '/', preg_replace('/[\/|\\\]{1,2}$/', '', $_SERVER['DOCUMENT_ROOT'])), 'http://' . $_SERVER['HTTP_HOST'], str_replace('\\', '/', ROOT_PATH)));


!defined('CORE_PATH') && define('CORE_PATH', ROOT_PATH . 'core' . DS);
!defined('VENDORS_PATH') && define('VENDORS_PATH', ROOT_PATH . 'vendors' . DS);
!defined('LANG_PATH') && define('LANG_PATH', CORE_PATH . 'languages' . DS);
!defined('CONFIG_PATH') && define('CONFIG_PATH', CORE_PATH . 'configs' . DS);
!defined('CLASSES_PATH') && define('CLASSES_PATH', CORE_PATH . 'classes' . DS);
!defined('EXTENSION_PATH') && define('EXTENSION_PATH', CORE_PATH . 'Extensions' . DS);

//上传目录的路径和URL
!defined('UPLOAD_PATH') && define('UPLOAD_PATH', str_replace('\\', '/', ROOT_PATH) . 'upload/');
!defined('UPLOAD_URL') && define('UPLOAD_URL', ROOT_URL . 'upload/');

//数据存放目录的路径
!defined('DATA_PATH') && define('DATA_PATH', ROOT_PATH . 'data' . DS);
!defined('DATA_CACHE') && define('DATA_CACHE', DATA_PATH . 'cachedata' . DS);

//编辑器附件路径
!defined('ATTACHED_PATH') && define('ATTACHED_PATH', ROOT_PATH . 'kindeditor' . DS . 'attached' . DS);


/**
 * 前台相关路径
 */
!defined('FINC') && define('FINC', ROOT_PATH . 'includes' . DS);	//前台includes目录的路径
!defined('SITE_CONTROLLER_PATH') && define('SITE_CONTROLLER_PATH', ROOT_PATH . 'controllers' . DS);

/**
 * 后台相关路径
 */

//Administrator目录下URL和路径
!defined('ADMIN_URL') && define('ADMIN_URL', ROOT_URL . 'administrator/');
!defined('ADMIN_PATH') && define('ADMIN_PATH', ROOT_PATH . 'administrator' . DS);


!defined('ADMIN_CONTROLLER_PATH') && define('ADMIN_CONTROLLER_PATH', ADMIN_PATH . 'controllers' . DS);
!defined('ADMIN_IMG') && define('ADMIN_IMG', ADMIN_URL . 'images/');