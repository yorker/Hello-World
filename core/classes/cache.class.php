<?php
/*
 * @Created on Jul 18, 2010
 * @Author by Yorker
 */
$curpath = dirname(__FILE__);
include_once($curpath . DS . 'base.class.php');

class Cache extends Base {

	//写入系统配置缓存数据
    function writeSysConfigCache() {
     	global $db;
     	$filename = DATA_PATH . 'inc_sys_config.php';
		$content = array();
		$db->query("SELECT conf_key, conf_value FROM " . $db->table('sys_config') . " ORDER BY cat_id ASC");
		while($row = $db->loadAssoc()) {
			$content[$row['conf_key']] = $row['conf_value'];
		}
		$content = "<?php \r\n\$cfg=" . var_export($content, true) . ";";
		self::writeFile($filename, $content);
     }

     //载入系统配置缓存数据
     function readSysConfigCache() {
     	global $cfg;
     	$filename = DATA_PATH . 'inc_sys_config.php';
     	if(file_exists($filename)) {
     		include_once($filename);
     	} else {
     		self::writeSysConfigCache();
     		include_once($filename);
     	}
     }
}

?>