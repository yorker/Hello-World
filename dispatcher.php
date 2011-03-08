<?php
include_once('include.php');

if(isset($_GET['disp']) && !empty($_GET['disp'])) {
	//分离controller和action信息
	$dispatcher = explode('/', $_GET['disp']);
	if(!isset($dispatcher[0]) || empty($dispatcher[0])) {
		die('Fata Error: Controller is not defined!');
	}
	if(!isset($dispatcher[1]) || empty($dispatcher[1])) {
		$dispatcher[1] = 'index';
	}
	$controller = $dispatcher[0];
	$action = $dispatcher[1];

	require_once(SITE_CONTROLLER_PATH . 'app_controller.php');

	$ctrl_filename = SITE_CONTROLLER_PATH . App::camelCaseToFilename($controller) . '_controller.php';
	if(!file_exists($ctrl_filename)) {
		Common::error('The Controller you specified was not found!', 1981);
	}
	require_once($ctrl_filename);

	$ctrlClass = $controller . 'Controller';

	//实例化controller
	$ctrl = new $ctrlClass();

	//设置action的名称，视图要由action名称来定位
	$ctrl->setAction($action);

	//执行Action前过滤器函数
	$ctrl->beforeFilter();

	//处理并执行action，action方法参数化
	$len = count($dispatcher);
	$params = array();
	for($i = 2; $i < $len; $i++) {
		if(isset($dispatcher[$i]) && !empty($dispatcher[$i])) {
			$params[] = $dispatcher[$i];
		}
	}
	$plen = count($params);

	if($plen>0) {
		switch($plen) {
			case 1:
				$ctrl->$action($params[0]);
				break;
			case 2:
				$ctrl->$action($params[0], $params[1]);
				break;
			case 3:
				$ctrl->$action($params[0], $params[1], $params[2]);
				break;
			case 4:
				$ctrl->$action($params[0], $params[1], $params[2], $params[3]);
				break;
			case 5:
				$ctrl->$action($params[0], $params[1], $params[2], $params[3], $params[4]);
				break;
			default:
				die('The action parameters you passed is too long!');
		}
	} else {
		$ctrl->$action();
	}

	//执行Action后过滤器函数
	$ctrl->afterFilter();
	exit;
}
die('Error Occurred: The page you request is not found!');
