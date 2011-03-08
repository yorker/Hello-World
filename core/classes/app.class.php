<?php
/**
 * App类，主要用于controller和action相关
 * Create On Feburary 12, 2011
 * Author By Yorker
 */
class App {
	static function url($url) {
        $url = trim($url);
		if(strpos($url, '/') === 0) {
			$url = substr($url, 1);
		}

        $config = new Config();
        if(!$config->backend_rewrite) {
        	/*
             * 不启用url rewrite时，所有的链接需要直接处理到dispacher.php文件中
             * 此时可以将管理根目录下的.htaccess文件重命名，使之无效
             * */
            $url = 'dispatcher.php?disp=' . str_replace('?', '&', $url);
        }

        return $url;
	}

    /**
     * Component factory
     * @param string $classname Class name of component
     * @param boolen $is_backend
     * @return the object of component specified
     */
    static function &factory($classname, $type='extension') {
    	$obj = null;
    	if($type == 'extension') {
    		$filename = EXTENSION_PATH . self::camelCaseToFilename($classname) . '.php';
    		if(file_exists($filename)) {
    			if(strpos($classname, 'Extension') === false) {
    				$classname = $classname . 'Extension';
    			}
    			$obj = &new $classname();
    			return $obj;
    		}
    	}
    	return $obj;
    }

	/**
	 * Make CamelCase into underline style
	 */
    static function camelCaseToFilename($classname) {
    	$filename = preg_replace('/([A-Z])/', '_$1', $classname);
		$filename = strtolower(preg_replace('/^_/', '', $filename));
		return $filename;
    }

    /**
     * Write log information into log file.
     * @param string $msg
     * @param string $type
     * @return null
     */
    static function log($msg, $type='error') {
        if($type == 'error') {
            $fp = fopen(DATA_PATH . 'error.log', 'a');
        } else {
            $fp = fopen(DATA_PATH . 'notice.log', 'a');
        }
        if($fp) {
            $message = '[' . date('M, d Y H:i:s') . '] [' . $type . '] ' . $msg . "\n";
            fwrite($fp, $message);
            fclose($fp);
        } else {
            trigger_error('Write log file error, maybe you have no privilege to write log file.');
        }

    }
}