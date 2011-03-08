<?php
/**
 * Ajax Handle File, this file will process some common functionality operation.
 * Create On Feburary 16, 2011
 * Author By Yorker
 */
class AjaxController extends AppController {
    public function update() {
    	$table = Common::getParam('table');
        $field = Common::getParam('field');
        $value = Common::getParam('value');
        $id = Common::getParam('id');

        $table = $this->db->table($table);
        if(is_array($id) && !empty($id)) {
            $key = $this->db->getTableKey($table);
            $this->db->query("UPDATE " . $table . " SET " . $field . "='" . $value . "' WHERE " . $key . " IN(" . implode(',', $id) . ")") or exit($this->db->errorMsg());
        } else {
            $this->db->updateById($table, array($field=>$value), $id) or exit($this->db->errorMsg());
        }
        exit('ok');
    }

    public function isExist() {
    	$table = Common::getParam('table');
        $field = Common::getParam('field');
        $value = Common::getParam('value');
        if($this->db->isExist($table, array($field=>$value))) {
            exit('ok');
        } else {
            exit('no');
        }
    }

    public function gettags() {
    	$sub = Common::getParameter('sub');
        $msg = Common::getParameter('msg');
        $sub .= $msg;
        $sub = Common::substr(strip_tags($sub), 500);
        $util = new util();
        $res = $util->getTags($sub);
        exit($res);
    }

	/**
	 * 单记录删除处理方法，配合JS中的function deleteById函数使用，如果该函数没有指定req_url参数
	 */
	public function delete() {
		$t = Common::getParam('table');
		$id = Common::getParam('id');
		$table = $this->db->table($t);

		//这里支持传入多个image字段，按照sql的写法用,分隔
		if(isset($_REQUEST['image']) && !empty($_REQUEST['image'])) {
			$field = $_REQUEST['image'];
			$key = $this->db->getTableKey($table);
			$images = $this->db->getRow("SELECT " . $field . " FROM " . $table . " WHERE " . $key . "=" . (int)$id);
			if(!empty($images)) {
				foreach($images as $image) {
					if(!empty($image)) {
						@unlink(UPLOAD_PATH . $image);
						@unlink(UPLOAD_PATH . Common::addPostfix($image, '_thumb'));
					}
				}
			}
		}
		$this->db->deleteById($table, $id);
		exit('ok');
	}

	/**
	 * 批量删除处理方法，配合JS中的function batchDeleteByCheckbox函数使用，如果该函数没有指定req_url参数
	 */
	public function batchDelete() {
		$t = Common::getParam('table');
		$table = $this->db->table($t);
		$ids = Common::getParam('ids');

		$key = $this->db->getTableKey($table);
		$ins = implode(',', $ids);

		if(isset($_REQUEST['image']) && !empty($_REQUEST['image'])) {
			//删除相关图片
			$field = $_REQUEST['image'];
			$key = $this->db->getTableKey($table);
			$images = $this->db->getAll("SELECT " . $field . " FROM " . $table . " WHERE " . $key . " IN (" . $ins . ")");

			foreach($images as $val) {
				if(!empty($val)) {
					foreach($val as $valItem) {
						if(!empty($valItem)) {
							@unlink(UPLOAD_PATH . $valItem);
							@unlink(UPLOAD_PATH . Common::addPostfix($valItem, '_thumb'));
						}
					}
				}
			}
		}

		$this->db->query("DELETE FROM " . $table . " WHERE " . $key . " IN (" . $ins . ")");
		exit('ok');
	}

	public function searchkey() {
		$keyword = Common::getParam('keyword');
		$table = Common::getParam('t');
		$field = Common::getParam('f');
		$condition = '';
		if(isset($_REQUEST['cond_str']) && !empty($_REQUEST['cond_str'])) {
			$tmp_array = explode('-', $_REQUEST['cond_str']);
			foreach($tmp_array as $val) {
				list($cond_field, $cond_value) = explode('/', $val);
				$condition .= " AND " . $cond_field . "='" . $cond_value . "'";
			}
		}

		$sql = "SELECT " . $field . " FROM " . $this->db->table($table) . " WHERE " . $field . " LIKE '%" . Common::sql_like_quote($keyword) . "%'" . $condition;

		$result['content'] = $this->db->getAll($sql);
		if(!empty($result)) {
			$result['error'] = 0;
		} else {
			$result['error'] = 1;
		}
		exit(json_encode($result));
	}

	/**
	 * Save temporary data
	 */
	public function cachedata() {
		Common::checkArray($_REQUEST, 'type', 'targetid');
		$type = $_GET['type'];
		$targetid = $_GET['targetid'];

		$filename = md5($type) . '.txt';
        Common::mkdir(DATA_CACHE);
		if(file_exists(DATA_CACHE . $filename)) {
			$arr = unserialize(Common::readFile(DATA_CACHE . $filename));
			$data = $data1 = '';
			if(is_array($arr) && !empty($arr)) {
				foreach($arr as $v) {
					$data .= $this->add_func($v, $targetid);
					$data1 .= $v . ',';
				}

				$this->set(compact('data', 'data1'));
			}
		}

		$this->set(compact('type', 'targetid'));
        $this->clearLayout();
		$this->display();
	}
	public function saveCacheData() {
		Common::checkArray($_POST, 'type', 'targetid');
		$type = $_POST['type'];
		$targetid = $_POST['targetid'];
		$values = '';
		if(isset($_POST['values']) && !empty($_POST['values'])) {
			$val = $_POST['values'];
		} else {
			exit($_LANG['data_require']);
		}

		$tmparr = explode(',', $val);
		$data = array();
		foreach($tmparr as &$v) {
			$v = trim($v);
			if(!empty($v)) {
				$values .= $this->add_func($v, $targetid);
				$data[] = $v;
			}
		}
		unset($tmparr);

		$filename = md5($type) . '.txt';
		Common::writeFile(DATA_CACHE . $filename, serialize($data));
		exit($values);
	}

    //动态简单添加类别begin
    public function simpleAddItem() {
    	if(!empty($_POST)) {
            Common::checkArray($_POST, 'field', 'table');
            $table = Common::getParameter('table');
            $field = Common::getParameter('field');
            Common::checkArray($_POST, 'wrt_'.$field);
            if($this->db->isExist($table, array($field=>$_POST['wrt_' . $field]))) {
                exit($GLOBALS['_LANG']['the_name_has_exist']);
            }

            $last_id = $this->db->autoWrite($_POST, $table);
            exit("ok-" . $last_id);
        }

        $select_id = Common::getParameter('select_id');
        $table = Common::getParameter('t');
        $field = Common::getParameter('f');
        $title = Common::getParameter('title');
        if($select_id && $table && $field) {
            $this->set(compact('table', 'field', 'title', 'select_id'));
        } else {
        	die("The parameter 'select_id', 't' or 'f' lost!");
        }
        $this->clearLayout();
        $this->display();
    }

    public function ajaxGetCurOption() {
        global $_LANG;
        $table = Common::getParam('t');
        $field = Common::getParam('f');
        $key = $this->db->getTableKey($table);
        $id = Common::getParameter('id');

        $this->db->query("SELECT " . $key . ", " . $field . " FROM " . $this->db->table($table));

        $options = '<option value="0">' . $_LANG['please_choose'] . '</option>';

        while($row = $this->db->loadAssoc()) {
            if($id == $row[$key]) {
                $options .= '<option value="' . $row[$key] . '" selected="">' . $row[$field] . '</option>';
            } else {
                $options .= '<option value="' . $row[$key] . '">' . $row[$field] . '</option>';
            }
        }
        exit($options);

     }

    //动态简单添加类别end

    public function deleteOldImage() {
    	if(isset($_POST['pic_path']) && !empty($_POST['pic_path'])) {
            $path = UPLOAD_PATH .$_POST['pic_path'];
            $thumb_path = UPLOAD_PATH . Common::addPostfix($_POST['pic_path'], '_thumb');
            Common::unlink($path);
            Common::unlink($thumb_path);
            exit("ok");
        } else {
            exit("Missing 'pic_path' parameter!");
        }
    }

    public function calProjectSize() {
    	exit(Common::getSize(ROOT_PATH));
    }

	private function add_func($item, $targetid) {
		$item = trim($item);
		if(!empty($item)) {
			$item = '<a href="javascript:void(0)" onclick="choose(this, \'' . $targetid . '\')">' . $item . '</a> | ';
		} else {
			$item = '';
		}
		return $item;
	}
}


