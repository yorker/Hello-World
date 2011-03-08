<?php
/**
 * Create On Feburary 12, 2011
 * Author By Yorker
 */

class SystemController extends AppController {

    public function index() {
        global $_LANG;
        require_once(ADMIN_PATH . "includes/top_menu.php");//菜单

        $this->assign('copyright', sprintf($_LANG['copyright'], date('Y')));
        $this->assign('admin_url', ADMIN_URL);
        if(isset($top_menu) && !empty($top_menu)) {
        	$this->set(compact('top_menu'));
        }
        $this->setLayout('index');
        $this->display();
    }

	public function sysMenu() {
        global $_LANG;
        require_once(ADMIN_PATH . "includes/top_menu.php");//菜单
        if(isset($top_menu) && !empty($top_menu)) {
        	$this->set(compact('top_menu'));
        }
        $this->clearLayout();
        $this->display();
    }

    public function sysLogin() {
        global $_LANG;
		$adm = &App::factory('Admin');
        if(isset($_COOKIE['remember_login_admin']) && !empty($_COOKIE['remember_login_admin']) && isset($_COOKIE['remember_login_password']) && !empty($_COOKIE['remember_login_password'])) {
            if($adm->adminLogin($_COOKIE['remember_login_admin'], $_COOKIE['remember_login_password'])) {
                Common::redirect(App::url('system'));
            }
        }

        $open_back_login_captcha = Common::getConfigValue('open_back_login_captcha');
        $this->set(compact('open_back_login_captcha'));

        if(!empty($_POST)) {
            Common::checkArray($_POST, 'username', 'password');
            if($open_back_login_captcha == 0 || Common::vcode($_POST['enc_vcode'], $_POST['vcode'])) {
                //验证码正确
                if($adm->adminLogin($_POST['username'], $_POST['password'])) {
                    //设置cookie
                    if(isset($_POST['remember']) && $_POST['remember'] == 1) {
                        setcookie('remember_login_admin', $_POST['username'], time()+3600*24*7);
                        setcookie('remember_login_password', $_POST['password'], time()+3600*24*7);
                    } else {
                        setcookie('remember_login_admin', '');
                        setcookie('remember_login_password', '');
                    }

                    Common::redirect(App::url('system'));
                } else {
                    $error = $_LANG['please_enter_correct_username_and_password'];
                }
            } else {
                $this->assign('username', $_POST['username']);
                $error = $_LANG['should_right'] . $_LANG['captcha'];
            }
            if(isset($error) && !empty($error)) {
                $this->assign('error', $error);
            }
        }

        $this->assign('copyright', sprintf($_LANG['copyright'], date('Y')));
        $this->assign('admin_url', ADMIN_URL);
        $this->setLayout('login');
        $this->display();
    }

    public function sysLogout() {
    	session_destroy();
        setcookie('remember_login_password', '');
        Common::redirect(App::url('system/sysLogin'));
    }

    public function sysStart() {
        global $_LANG;
		$admin = $this->sess->get('admin');
        /**
         *系统检测信息
         */
        $sysinfo = array();

        //系统
        $sysinfo[] = array('key'=>$_LANG['system'], 'value'=>PHP_OS . '&nbsp;&nbsp;' . $_SERVER['SERVER_SOFTWARE']);

        //管理级别
        $admin_rank = $admin['admin_rank'] == 1 ? $_LANG['general_admin'] : ($admin['admin_rank'] == 2 ? $_LANG['advance_admin'] : $_LANG['super_admin']);
        $sysinfo[] = array('key'=>$_LANG['admin_rank'], 'value'=>'<span style="text-decoration:underline">' . $admin_rank . '</span>');

        //文件上传大小
        $sysinfo[] = array('key'=>$_LANG['upload_maxfile'], 'value'=>ini_get('upload_max_filesize'));

        //系统函数检测
        $flag = true;
        $functions = array('mb_convert_encoding', 'iconv', 'mysql_query', 'imagecreatetruecolor');
        foreach($functions as $func) {
            if(!function_exists($func)) {
                App::log('Function "' .$func . '" is not unavailable!');
                $flag = false;
            }
        }
        if($flag) {
            $result = '<span class="green">OK</span>';
        } else {
            $result = '<span class="red">Bad</span>';
        }
        $sysinfo[] = array('key'=>$_LANG['function_check'], 'value'=>$result);

        //文件权限检测
        $dirs = array();
        $dirs[] = ROOT_PATH . 'cache';
        $dirs[] = ROOT_PATH . 'data';
        $dirs[] = ROOT_PATH . 'kindeditor/attached';
        $dirs[] = ROOT_PATH . 'templates_c';
        $dirs[] = ROOT_PATH . 'upload';
        $dirs[] = CORE_PATH . 'languages';
        $dirs[] = ADMIN_PATH . 'cache';
        $dirs[] = ADMIN_PATH . 'compiles';
        $result = '<span class="green">OK</span>';
        foreach($dirs as $dir) {
            if(!is_writable($dir)) {
                $result = '<span class="red">Bad (No Privilege: ' . $dir . ')</span>';
            }
        }
        $sysinfo[] = array('key'=>$_LANG['file_privilege_check'], 'value'=>$result);

        //Magic_Quotes_Gpc
        $sysinfo[] = array('key'=>'Magic_Quotes_Gpc', 'value'=>get_magic_quotes_gpc() ? 'On' : 'Off');

        $this->set(compact('sysinfo'));
        $this->setHInfo($_LANG['page_start']);
        $this->display();
    }

	public function configuration() {
		global $_LANG;
		$action = isset($_REQUEST['act']) && !empty($_REQUEST['act']) ? $_REQUEST['act'] : 'config_list';

		if(isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
			$cat_id =(int)$_GET['cat_id'];
			$this->tpl->assign('cat_id', $cat_id);
		}

		// 添加/编辑配置分类
		if($action == 'write_cat') {
			$pageTitle = $_LANG['config_add_cat'];
			if(!empty($_POST)) {
				Common::checkArray($_POST, 'name');

				if(isset($_POST['id']) && !empty($_POST['id'])) {
					$id = (int)$_POST['id'];
					$this->db->updateById($this->db->table('sys_config_cat'), array('name'=>$_POST['name'], 'ordering'=>$_POST['ordering'], 'description'=>$_POST['description']), $id) or Common::error('write failed', 1002);
				} else {
					$this->db->insert($db->table('sys_config_cat'), array('name'=>$_POST['name'], 'ordering'=>$_POST['ordering'], 'description'=>$_POST['description'])) or Common::error('write failed', 1001);
				}
				exit('ok');
			}

			if(isset($_GET['id']) && is_numeric($_GET['id'])) {
				$config_cat = $this->db->getRowById($this->db->table('sys_config_cat'), (int)$_GET['id']);
				$pageTitle = $_LANG['config_edit_cat'];
				$this->set(compact('config_cat'));
			}

            $this->setHInfo($pageTitle, $_LANG['config_cat_manage'], 'system/configuration?act=cat_list');

		}

		//分类列表
		elseif($action == 'cat_list') {
			$pageTitle = $_LANG['config_cat_manage'];
			$cat_list = $this->db->getAll("SELECT * FROM " . $this->db->table('sys_config_cat') . " ORDER BY ordering ASC");

			$this->setHInfo($pageTitle, $_LANG['config_add_cat'], 'system/configuration?act=write_cat');
			$this->tpl->assignByRef('cat_list', $cat_list);
		}

		//配置列表
		elseif($action == 'config_list') {
			$pageTitle = $_LANG['config_manage'];

			//设置关键字查找
			$like = set_or_get_search(App::url('system/configuration?act=config_list'), $_LANG['name'], 'conf_name', 'Config', $this->tpl, false, 'sys_config');

			$cats = $this->db->getAll("SELECT id, name FROM " . $this->db->table('sys_config_cat') . " ORDER BY ordering ASC");
			$datas[''] = $_LANG['all'];
			foreach($cats as $val) {
				$datas[$val['id']] = $val['name'];
			}

			$cat_id = isset($_GET['cat_id']) && !empty($_GET['cat_id']) ? $_GET['cat_id'] : '';

			set_category(App::url('system/configuration?act=config_list'), 'cat_id', $datas, $cat_id, $this->tpl, false);

			if($cat_id) {
				$where = ' AND ConfigCat.id=' . (int)$cat_id . ' ';
			} else {
				$where = '';
			}

			$list = $this->db->getAll("SELECT Config.*, ConfigCat.name AS cat_name FROM " . $this->db->table('sys_config') . " AS Config INNER JOIN " . $this->db->table('sys_config_cat') . " AS ConfigCat ON Config.cat_id=ConfigCat.id WHERE " . $like . $where . " ORDER BY Config.ordering ASC, Config.id ASC");

			if(isset($cat_id) && !empty($cat_id)) {
				$href = App::url('system/configuration?act=write_config&cat_id='.$cat_id);
			} else {
				$href = App::url('system/configuration?act=write_config');
			}
			$this->setHInfo($pageTitle, $_LANG['config_add_param'], $href);
			$this->set(compact('list'));

		}

		elseif($action == 'write_config') {
			//处理数据更新
			if(!empty($_POST)) {
				Common::checkArray($_POST, 'cat_id', 'conf_name', 'conf_key', 'type');
				$param = array();
				$param['cat_id'] = $_POST['cat_id'];
				$param['conf_name'] = $_POST['conf_name'];
				$param['conf_key'] = $_POST['conf_key'];
				$param['conf_value'] = $_POST['conf_value'];
				$param['type'] = $_POST['type'];
				$param['description'] = $_POST['description'];
				$param['ordering'] = $_POST['ordering'];
				$param['unit'] = $_POST['unit'];

				if(isset($_POST['id']) && !empty($_POST['id'])) {
					$id = (int)$_POST['id'];
					$this->db->updateById('sys_config', $param, $id) or Common::error($this->db->errorMsg(), 1002);
				} else {
					$this->db->insert('sys_config', $param) or Common::error($db->errorMsg(), 1003);
				}
				$cache = &new Cache();
				$cache->writeSysConfigCache();
				exit('ok');

			}


			//配置的分类
			$res = $this->db->getAll("SELECT id, name FROM " . $this->db->table('sys_config_cat') . " ORDER BY ordering ASC, id ASC");
			$cats = array(''=>$_LANG['please_choose']);
			foreach($res as $val) {
				$cats[$val['id']] = $val['name'];
			}

			if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
				$pageTitle = $_LANG['config_edit'];
				$edited = $this->db->getRowById('sys_config', (int)$_GET['id']);
				$this->tpl->assign('edited', $edited);

                $reurl = 'system/configuration?act=config_list';
			} else {
				$pageTitle = $_LANG['config_add_param'];

                $reurl = 'system/configuration?act=write_config';
			}

			if(isset($cat_id) && !empty($cat_id)) {
				$href = App::url('system/configuration?act=config_list&cat_id=' . $cat_id);
                $reurl .= '&cat_id=' . $cat_id;
			} else {
				$href = App::url('system/configuration?act=config_list');
			}

			$this->tpl->assign('type', array('bool'=>$_LANG['boolen'], 'digit'=>$_LANG['digit_type'], 'char'=>$_LANG['char_type']));
            $this->setHInfo($pageTitle, $_LANG['config_manage'], $href);
			$this->set(compact('cats', 'reurl'));

        //国际化语言
		} elseif($action == 'international') {
			$pageTitle = $_LANG['international'];
			$zh_path = LANG_PATH . 'zh_cn';

			if(isset($_REQUEST['file']) && !empty($_REQUEST['file']) && isset($_REQUEST['type']) && !empty($_REQUEST['type'])) {
				$sfile = $zh_path . '/' . $_REQUEST['file'];
				if(!file_exists($sfile)) {
					exit('Invalid Request!');
				}
				$targetpath = LANG_PATH . $_REQUEST['type'];
				if(!file_exists($targetpath)) {
					mkdir($targetpath, 0777) or exit('You have no privilege to create directory: ' . $targetpath);
				}
				$tfile = $targetpath . '/' . $_REQUEST['file'];
				$slang = $this->_getLanguage($sfile);
				if(empty($slang)) {
					exit('The file you chosen is empty!');
				}
				$tlang = $this->_getLanguage($tfile);
				if(!empty($tlang)) {
					foreach($tlang as $k=>$v) {
						if(array_key_exists($k, $slang)) {
							$slang[$k] = $v;
						}
					}
				}
				$this->tpl->assignByRef('slang', $slang);
				$this->tpl->assign('type', $_REQUEST['type']);
				$this->tpl->assign('file', $_REQUEST['file']);

			} else {
				$d = dir($zh_path);
				$files = array();
				while(($entry = $d->read()) !== false) {
					if($entry != '.' && $entry != '..') {
						$files[] = $entry;
					}
				}
				$d->close();
				$this->tpl->assign('files', $files);
			}

            $this->setHInfo($pageTitle);
		}

		$this->tpl->assign('action', $action);
		$this->display();
	}

    //处理国际化语言
    public function handleInternational() {
        Common::checkArray($_POST, 'type', 'file');
        $tmp = "<?php\r\n";
        foreach($_POST as $k=>$v) {
            if($k == 'type') {
                $type = $_POST['type'];
            } elseif($k == 'file') {
                $file = $_POST['file'];
            } else {
                $tmp .= "\$_LANG['".$k."']='".$v."';\r\n";
            }
        }
        $tmp .= "?>";
        $path = LANG_PATH . $type . '/' . $file;

        if(file_put_contents($path, $tmp)) {
            exit("ok");
        } else {
            exit("Write file failed.");
        }
    }

    public function setConfiguration() {
        global $_LANG;
        if(!empty($_POST)) {
            foreach($_POST as $key => $value) {
                if(preg_match('/_cflag$/', $key)) {
                    $key = trim(str_replace('_cflag', '', $key));
                    $this->db->query("UPDATE #@__sys_config SET conf_value='" . $value . "' WHERE conf_key='" . $key . "'");
                }
            }
            $cache = new Cache();
            $cache->writeSysConfigCache();
            exit('ok');
        }

        $categories = $this->db->getAll("SELECT id, name FROM #@__sys_config_cat ORDER BY ordering ASC");
        foreach($categories as &$val) {
            $tmp = $this->db->getAll("SELECT * FROM #@__sys_config WHERE cat_id=" . (int)$val['id'] . " ORDER BY ordering ASC");
            foreach($tmp as &$t) {
                if($t['type'] == 'bool') {
                    $t['value'] = array('0'=>$_LANG['no'], '1'=>$_LANG['yes']);
                }
            }
            $val['sub'] = $tmp;
        }

        //Common::debug($categories);
        $this->tpl->assignByRef('categories', $categories);
        $this->tpl->assign('num', Common::getParameter('num', 1));
        $this->setHInfo($_LANG['sys_config']);
        $this->display();
    }

    public function sysAdminList() {
        global $_LANG;
        $admin = $this->sess->get('admin');

        $list = $this->db->getAll("SELECT * FROM #@__sys_admin ORDER BY admin_rank DESC, admin_id ASC");

        if($admin['admin_rank']>1) {
            $this->setHInfo($_LANG['admin_list'], $_LANG['add_admin'], 'system/sysWriteAdmin');
        } else {
        	$this->setHInfo($_LANG['admin_list']);
        }

        $this->set(compact('list'));
        $this->display();
    }

    public function sysWriteAdmin() {
        global $_LANG;
        $admin = $this->sess->get('admin');
        if($admin['admin_rank'] < 2) {
            die($_LANG['no_privilege']);
        }

        if(!empty($_POST)) {
            Common::checkArray($_POST, 'wrt_email', 'wrt_admin_rank');

            if(isset($_POST['wrt_id']) && is_numeric($_POST['wrt_id'])) {
                $_POST['wrt_update_time'] = time();
                if(!empty($_POST['wrt_password'])) {
                    if($_POST['wrt_password'] != $_POST['confirm_password']) {
                        exit($_LANG['confirm_password_error']);
                    }
                    $_POST['wrt_password'] = Common::encrypt($_POST['wrt_password']);
                } else {
                    //过滤掉密码写入项
                    $tmp = array();
                    foreach($_POST as $key=>$value) {
                        if($key != 'wrt_password') {
                            $tmp[$key] = $value;
                        }
                    }
                    $_POST = $tmp;
                }
            } else {
                Common::checkArray($_POST, 'wrt_admin_name', 'wrt_password', 'confirm_password');
                if($this->db->isExist('sys_admin', array('admin_name'=>$_POST['wrt_admin_name']))) {
                    exit($_LANG['username_has_exist']);
                }
                //数据写入处理
                $_POST['wrt_create_time'] = time();
                if($_POST['wrt_password'] != $_POST['confirm_password']) {
                    exit($_LANG['confirm_password_error']);
                }
                $_POST['wrt_ip'] = $_SERVER['REMOTE_ADDR'];
                $_POST['wrt_password'] = Common::encrypt($_POST['wrt_password']);
            }


            $this->db->autoWrite($_POST, 'sys_admin');

            exit('ok');
        }


        //页面标题
        $pageTitle = $_LANG['add_admin'];

        if(isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = (int)$_GET['id'];
            $edit = $this->db->getRowByid('sys_admin', $id);
            $this->set(compact('edit'));
            $pageTitle = $_LANG['edit_admin'];
        }

        $tmp_rank = array('1'=>$_LANG['general_admin'], '2'=>$_LANG['advance_admin'], '3'=>$_LANG['super_admin']);

        $admin_rank = array();
        foreach($tmp_rank as $key=>$value) {
            if($admin['admin_rank']>$key) {
                $admin_rank[$key] = $value;
            }
        }

        $this->set(compact('admin_rank'));
        $this->setHInfo($pageTitle, $_LANG['admin_list'], 'system/sysAdminList');

        $this->tpl->assign('is_available', $this->getAlter());

        $this->display();
    }

    public function sysAdminModifyPassword() {
        global $_LANG;
        if(!empty($_POST)) {
            $error = '';
            if(isset($_POST['old_password']) && !empty($_POST['old_password'])) {
                $old_pwd = $_POST['old_password'];
            } else {
                $error .= '<p>' . $_LANG['not_empty'] . $_LANG['old_password'] . '</p>';
            }
            if(isset($_POST['new_password']) && !empty($_POST['new_password'])) {
                $new_pwd = $_POST['new_password'];
                if(strlen($new_pwd) < 6) {
                    $error .= '<p>' . sprintf($_LANG['can_not_less_than'], $_LANG['new_password'], '6') . '</p>';
                }
            } else {
                $error .= '<p>' . $_LANG['not_empty'] . $_LANG['new_password'] . '</p>';
            }
            if(isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) {
                $cnf_pwd = $_POST['confirm_password'];
                if($new_pwd != $cnf_pwd) {
                    $error .= '<p>' . $_LANG['confirm_password_error'] . '</p>';
                }
            } else {
                $error .= '<p>' . $_LANG['not_empty'] . $_LANG['confirm_password'] . '</p>';
            }
            if(!empty($error)) {
                exit($error);
            }

            if(!$this->db->isExist('sys_admin', array('password'=>Common::encrypt($old_pwd), 'admin_name'=>$this->sess->get('admin.admin_name')))) {
                exit($_LANG['old_password_error']);
            }
            $admin_id = (int)$this->sess->get('admin.admin_id');
            $this->db->updateById('sys_admin', array('password'=>Common::encrypt($new_pwd)), $admin_id);
            exit('ok');
        }
        $this->setHInfo($_LANG['modify_password']);
        $this->display();
    }

    public function sysNotepad() {
        global $_LANG;
        if(!empty($_POST)) {
            $pure_content = str_replace('&nbsp;', '', strip_tags($_POST['content']));
            $pure_content = trim($pure_content);
            if(empty($pure_content)) {
                exit($_LANG['not_empty'] . $_LANG['content']);
            }
            if(!isset($_POST['title']) || empty($_POST['title'])) {
                $_POST['title'] = Common::substr($pure_content, 40, false);
            }

            if(isset($_POST['id']) && $_POST['id'] > 0) {
                $this->db->updateById('admin_notepad', array('title'=>$_POST['title'], 'content'=>$_POST['content'], 'is_urgency'=>$_POST['is_urgency'], 'update_datetime'=>date('Y-m-d H:i:s')), (int)$_POST['id']) or exit($this->db->errorMsg());
                exit('ok_u');
            } else {
                $this->db->insert('admin_notepad', array('title'=>$_POST['title'], 'content'=>$_POST['content'], 'admin_id'=>$_SESSION['admin']['admin_id'], 'is_urgency'=>$_POST['is_urgency'], 'create_datetime'=>date('Y-m-d H:i:s'), 'update_datetime'=>date('Y-m-d H:i:s'))) or exit($this->db->errorMsg());
                exit('ok_i');
            }
        }

        $title = $_LANG['notepad'];
        $is_urgency = array('1'=>$_LANG['urgency']);

        set_or_get_search('system/sysNotepadPage', $_LANG['title'], 'title', '', $this->tpl, true, 'admin_notepad');
        $this->setHInfo($title);
        $this->set(compact('is_urgency'));
        $this->display();
    }
    public function sysNotepadPage() {
        global $_LANG;
        $like = set_or_get_search('system/sysNotepadPage', $_LANG['title'], 'title', '', $this->tpl, true, 'admin_notepad');
        $where = $like . ' AND ' . 'admin_id=' . $_SESSION['admin']['admin_id'];


        $page = Pagination::getCurrentPage('notepad');
        $total = $this->db->getOne("SELECT COUNT(*) AS cnt FROM #@__admin_notepad WHERE " . $where);

        $pages = Pagination::page($total, $page, App::url('system/sysNotepadPage'), PAGE_SIZE);

        $list = $this->db->getAll("SELECT * FROM #@__admin_notepad WHERE " . $where . " ORDER BY create_datetime DESC LIMIT " . ($page-1)*PAGE_SIZE . ", " . PAGE_SIZE);

        $this->set(compact('list', 'pages'));
        $this->clearLayout();
        $this->display();
    }

    public function sysBackup() {
        if(isset($_POST['delids'])) {
            $ids = $_POST['delids'];
            $dir = DATA_PATH . 'databackup/';
            if(is_array($ids)) {
                foreach($ids as $id) {
                    unlink($dir . $id . '.sql');
                }
            }
            exit("ok");
        } elseif (isset($_GET['action']) && $_GET['action'] == 'download' && isset($_GET['id'])) {
            $dir = DATA_PATH . 'databackup/';
            Common::download($dir . $_GET['id'] . '.sql', date('Y-m-d-Hi', $_GET['id']));
            exit;
        }

        $dir = DATA_PATH . 'databackup';
        if(file_exists($dir)) {
            $d = dir($dir);
            $tmp = array();
            while($entry = $d->read()) {
                if($entry != '.' && $entry != '..') {
                    $tmp[] = $entry;
                }
            }
            if(!empty($tmp)) {
                rsort($tmp);
                $list = array();
                foreach($tmp as $value) {
                    $t = array();
                    $t['name'] = $value;
                    $t['time'] = intval(substr($value, 0, -4));
                    $t['datetime'] = date('Y-m-d H:i:s', $t['time']);
                    $t['filesize'] = Common::cvt(filesize($dir . '/' . $value));
                    $list[] = $t;
                }
                $this->set(compact('list'));
            }
        }

        $this->setHInfo($GLOBALS['_LANG']['data_backup']);
        $this->display();
    }

    public function sysDataBackup() {
    	//构建文件名
        $dir = DATA_PATH . 'databackup';
        if(!file_exists($dir)) {
            mkdir($dir, 0755, true) or exit('You have no privilege to write the directory "' . $dir . '"');
        }
        $filename = $dir . '/' . time() . '.sql';

        //确定导出数据
        $dbConfig = new Config();
        $tables = '';

        $this->db->query("show tables");
        while($t = $this->db->loadAssoc()) {
            $table = $t['Tables_in_'.$dbConfig->dbName];
            if(preg_match('/^' . $dbConfig->prefix . '/', $table)) {
                $tables .= " " . $table;
            }
        }
        $tables = trim($tables);
        if(!empty($tables)) {
            exec("mysqldump -u " . $dbConfig->username . " -p" . $dbConfig->password . " --database " . $dbConfig->dbName . " --tables " . $tables . " > " . $filename);
            exit("ok");
        } else {
            exit($GLOBALS['_LANG']['database_table_not_exist']);
        }
    }

    public function sysViewLog() {
        $action = isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : '';

        if($action == 'clean_ip_log') {
            $this->db->query("DELETE FROM #@__sys_access_ip");
            exit("ok");
        } elseif($action == 'clean_log') {
            if(!isset($_GET['type']) || empty($_GET['type'])) {
                exit("Invalid Request!!!");
            }
            if($_GET['type'] == 'backend') {
                $this->db->query("DELETE FROM #@__sys_log WHERE is_backend=1");
            } else {
                $this->db->query("DELETE FROM #@__sys_log WHERE is_backend=0");
            }
            exit("ok");
        }
        $this->setHInfo($GLOBALS['_LANG']['view_log']);
        $this->display();
    }

    public function sysViewLogPage() {
        if(isset($_GET['show'])) {
            $limit = 15;
            if($_GET['show'] == 'backend') {
                //显示后端日志
                $page = Pagination::getCurrentPage('view_log_backend');
                $total = $this->db->count('sys_log', 'is_backend=1');
                $pages = Pagination::page($total, $page, App::url('system/sysViewLogPage?show=backend'), $limit);
                $list = $this->db->getLimit("SELECT Log.*, Admin.admin_name AS uname FROM #@__sys_log AS Log LEFT JOIN #@__sys_admin AS Admin ON Log.uid=Admin.admin_id WHERE Log.is_backend=1 ORDER BY Log.create_datetime DESC", ($page-1)*$limit, $limit);
                $type = 'backend';
            } else {
                //显示前端日志
                $page = Pagination::getCurrentPage('view_log_frontend');
                $total = $this->db->count('sys_log', 'is_backend=0');
                $pages = Pagination::page($total, $page, App::url('system/sysViewLogPage?show=frontend'), 50);
                $list = $this->db->getLimit("SELECT Log.*, User.username AS uname FROM #@__sys_log AS Log LEFT JOIN #@__users AS User ON Log.uid=User.user_id WHERE Log.is_backend=0 ORDER BY Log.create_datetime DESC", ($page-1)*$limit, $limit);
                $type = 'frontend';
            }
        } else {
            exit;
        }

        $util = new Util();
        foreach($list as &$l) {
            $l['query_filter'] = preg_replace(array('/\_t=[\d\.]*&/', '/\_t=[\d\.]*$/'), '', $l['filename']);
            $l['area'] = $util->ip2area($l['ip'], DATA_PATH . 'iptable/tinyipdata.dat');
        }

        $this->set(compact('list', 'type', 'pages'));
        $this->clearLayout();
        $this->display();
    }

    public function sysViewIpLogPage() {
        $limit = 15;
        $total = $this->db->count("sys_access_ip");
        $page = Pagination::getCurrentPage('_view_ip_log');
        $pages = Pagination::page($total, $page, App::url('system/sysViewIpLogPage'), $limit);
        $list = $this->db->getLimit("SELECT * FROM #@__sys_access_ip ORDER BY update_datetime DESC", ($page-1)*$limit, $limit);

        $this->set(compact('list', 'pages'));
        $this->clearLayout();
        $this->display();
    }


    public function sysFlowStatistics() {
        $min = $this->db->getOne("SELECT create_time FROM #@__sys_access_statistics ORDER BY create_time ASC LIMIT 1");
        $max = $this->db->getOne("SELECT create_time FROM #@__sys_access_statistics ORDER BY create_time DESC LIMIT 1");

        if(!empty($min)) {
            $min = date('Y-m', $min);
            $max = date('Y-m', $max);

            $date_list = array();
            $date_list[] = $tmp = $min;
            while($tmp != $max) {
                $date_list[] = $tmp = date('Y-m', strtotime('+1 month', strtotime($tmp)));
            }
            $this->set(compact('date_list'));
        }
        $this->setHInfo($GLOBALS['_LANG']['flow_statistics']);
        $this->display();
    }

    public function sysGetFlowStatistics() {
    	include_once(VENDORS_PATH . 'plchart/class.plchart.php');

        $width = isset($_GET['w']) && !empty($_GET['w']) ? (int)$_GET['w'] : 500;

        //获取月份的起点
        $cur_month = isset($_GET['month']) && !empty($_GET['month']) ? trim($_GET['month']) : date('Y-m');
        //获取月份的终点
        $next_month = date('Y-m', strtotime('+1 month', strtotime($cur_month)));

        $y = array();
        for($j = 0; $j <= 230; $j+= 10) {
            $y[] = $j;
        }
        $y[] = 1000;
        if($cur_month == date('Y-m')) {
            $day = date('d');
            $day = intval($day) == 1 ? 2 : $day;
        } else {
            $day = date('t', strtotime($cur_month));
        }
        $x = array();
        $data = array();
        for($i = 1; $i <= $day; $i++) {
            $x[] = $i;
            $data[] = 0;
        }

        //取出指定月中的所有记录
        $this->db->query("SELECT * FROM #@__sys_access_statistics WHERE create_time>" . strtotime($cur_month) . " AND create_time<" . strtotime($next_month));
        while($row = $this->db->loadAssoc()) {
            $index = intval(date('j', $row['create_time'])) - 1;
            $data[$index] += intval($row['num']);
        }

        $chart = new plchart($data, 'line_single', $width, 460);
        $chart->set_color();
        $chart->set_title('Website Flow Statistics [ ' . $cur_month . ' ]');
        $chart->set_scale($y, $x);
        $chart->set_desc();
        $chart->set_graph(10, 30, $width-70, 410, 0);
        $chart->output();
    }

    public function ajaxClearCache() {
    	$dirs[] = ADMIN_PATH . 'compiles';
        $dirs[] = ADMIN_PATH . 'temp';
        $dirs[] = ADMIN_PATH . 'cache';
        $dirs[] = ROOT_PATH . 'cache';
        $dirs[] = ROOT_PATH . 'templates_c';
        foreach($dirs as $dir) {
            if(file_exists($dir)) {
                Common::clearDir($dir);
            }
        }
        exit('ok');
    }

    public function ajaxUpdateCacheFile() {
    	$cache = new Cache();
        $cache->writeSysConfigCache();
        exit("ok");
    }



    /**
     * Private methods area
     */
	private function _getLanguage($filename) {
		if(file_exists($filename)) {
			require($filename);
			if(!empty($_LANG)) {
				return $_LANG;
			}
		}
		return false;
	}
}