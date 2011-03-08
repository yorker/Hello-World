<?php
/**
 * 控制器基础类，定义最基本的控制器属性和方法
 *
 * Create On Feburary 12, 2011
 * Author By Yorker
 */

class Controller {
	protected $tplExtName = '.tpl';
	protected $name = null;
    protected $layoutDir = 'layout';
    protected $layout = null;  //使用布局

	protected $action = null;

	protected $db;
	protected $sess;
	protected $tpl;

	protected $ext = null;	//extension class reference.

	public function __construct() {
		//实例化
		$this->db = &$GLOBALS['db'];
		$this->sess = &$GLOBALS['sess'];
		$this->tpl = &$GLOBALS['tpl'];

		//设定Controller的名称
		if($this->name === null) {
			$r = null;
			if(!preg_match('/(\w*)Controller/i', get_class($this), $r)) {
				die('Your Controller Name is invalide!');
			}
			$this->name = $r[1];

			//如果存在相应的扩展，则实例化扩展类
			$this->ext = &App::factory($this->name, 'extension');
		}
	}

    //设定当前将要使用的Action，一般是在调用特定action之前调用该方法
    public function setAction($action) {
        $this->action = $action;
    }

	public function beforeFilter() {
		return;
	}

	public function afterFilter() {
		return;
	}

	/**
	 * 设置需要呈递到模板中的值，形式
	 * $this->set(compact('key1', 'key2', 'key3'));
	 *
	 * Note:
	 */
	public function set(&$one) {
		if(is_array($one)) {
			foreach($one as $key=>&$val) {
				$this->tpl->assignByRef($key, $val);
			}
		}
	}

    public function assign($key, $value) {
    	$this->tpl->assign($key, $value);
    }

    //Set the layout that will be used in the template.
    protected function setLayout($layout) {
    	$this->layout = $layout;
    }

    /**
     * Clear layout, meaning that will not use any layout in the template.
     */
    protected function clearLayout() {
    	$this->layout = null;
    }

	public function display($template = '', $cache_id = '', $compile_id = '') {
		$main_tpl = $this->__getTemplatePath($template);
        if($this->layout) {
        	$this->tpl->assign('main_tpl_identified', $main_tpl);
            if($this->tpl->caching) {
                $cache_id .= $main_tpl;
            }
            $this->tpl->display($this->__getLayoutPath(), $cache_id, $compile_id);
        } else {
        	$this->tpl->display($main_tpl, $cache_id, $compile_id);
        }
	}


	public function isCached($template=null, $cache_id=null, $compile_id=null) {
		$main_tpl = $this->__getTemplatePath($template);
        if($this->layout) {
            if($this->tpl->caching) {
            	$cache_id .= $main_tpl;
                return $this->tpl->isCached($this->__getLayoutPath(), $cache_id, $compile_id);
            }
            return false;
        } else {
        	return $this->tpl->isCached($main_tpl, $cache_id, $compile_id);
        }
	}

    private function __getLayoutPath() {
        if($this->layout) {
            return $this->layoutDir . '/' . $this->layout . $this->tplExtName;
        }
        trigger_error('Layout is not set in controller ' . get_class($this));
    }

    private function __getTemplatePath($tpl = '') {
        $main_tpl = '';
        $ctrl_name = App::camelCaseToFilename($this->name);
        if($tpl) {
            $main_tpl = $ctrl_name . '/' . $tpl . $this->tplExtName;
        } elseif($this->action) {
            $view = App::camelCaseToFilename($this->action);
            $main_tpl = $ctrl_name . '/' . $view . $this->tplExtName;
        } else {
            die('Template Not Found');
        }

        return $main_tpl;
    }


	public function __destruct() {
	}
}