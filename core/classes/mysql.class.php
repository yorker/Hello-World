<?php
final class MySql implements BaseDb {
	private $link = null;
	private $res = null;
	private $prefix = null;
	private $db = null;

	private function __construct() {
		$config = new Config();
		$this->prefix = $config->prefix;
		$this->db = $config->dbName;
		if(!$this->link) {
			$this->link = mysql_pconnect($config->server, $config->username, $config->password) or exit("Could not connnect database: " . mysql_error());
			mysql_select_db($config->dbName) or exit("Select database failed: " . mysql_error());
			mysql_query("SET NAMES '" . $config->encoding . "'") or exit("Set character set failed: " . mysql_error());
		}
	}

	static public function &getInstance() {
		static $instance;
		if(!$instance) {
			$classname = __CLASS__;
			$instance = new $classname();
		}
		return $instance;
	}

	public function query($sql) {
		$sql = str_replace('#@__', $this->prefix, $sql);
		$this->res = mysql_query($sql, $this->link);

        if(!$this->res) {
            $error = array();
            $error['message'] = 'MySQL Query Error';
            $error['sql'] = $sql;
            $error['err'] = $this->errorMsg();
            $error['errno'] = mysql_errno($this->link);
            $this->printError($error);
        }
		return $this->res;
	}

    public function loadAssoc($res=null) {
		if(is_null($res)) {
			$res = $this->res;
		}
		return mysql_fetch_assoc($res);
	}

	public function loadAssocList($res=null) {
		if(is_null($res)) {
			$res = $this->res;
		}
		$list = array();
		while($row = mysql_fetch_assoc($res)) {
			$list[] = $row;
		}
		return $list;
	}

	public function loadResult($res=null) {
		if(is_null($res)) {
			$res = $this->res;
		}
		$result = mysql_fetch_row($res);
        if(!empty($result)) {
            return $result[0];
        } else {
            return false;
        }

	}

	public function getAffectedRows() {
		return mysql_affected_rows($this->link);
	}

	public function getNumRows() {
		if(is_resource($this->res)) {
			return mysql_num_rows($this->res);
		}
		return false;
	}

	public function insertId() {
		return mysql_insert_id($this->link);
	}

	public function errorMsg() {
		return mysql_error();
	}

	public function freeResult($res = null) {
		if($res) {
			return mysql_free_result($res);
		} else {
			return mysql_free_result($this->res);
		}
	}



    /**
     * extension method
     */
    public function getTableKey($table) {
        $table = $this->table($table);
        return $this->_getTableKey($table);
    }
    public function table($table) {
        $table = trim($table);
        if($this->prefix && strpos($table, $this->prefix) !== 0) {
            return $this->prefix . $table;
        }
        return $table;
    }

    public function isExist($table, $kv) {
        $table = $this->table($table);
        $sql = "SELECT COUNT(*) AS cnt FROM " . $table . " WHERE 1=1";
        foreach($kv as $k => $v) {
            $sql .= " AND " . $k . "='" . $v . "'";
        }
        $query = $this->query($sql);
        if($this->loadResult($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function count($table, $where='') {
        $table = $this->table($table);
        if($where) {
            $sql = "SELECT COUNT(*) AS cnt FROM " . $table . " WHERE 1 AND " . $where;
        } else {
            $sql = "SELECT COUNT(*) AS cnt FROM " . $table;
        }
        $this->query($sql);
        $res = $this->loadAssoc();
        return $res['cnt'];

    }

    public function deleteById($table, $id) {
        $table = $this->table($table);
        $key = $this->_getTableKey($table);
        $sql = "DELETE FROM " . $table . " WHERE " . $key . "=" . (int)$id;
        return $this->query($sql);
    }

    public function updateById($table, $kv, $id) {
        $table = $this->table($table);
        $key = $this->_getTableKey($table);
        $sql = "UPDATE " . $table . " SET ";
        foreach($kv as $k=>$v) {
            $sql .= $k . "='" . $v . "', ";
        }
        $sql = substr($sql, 0, -2);
        $sql .= " WHERE " . $key . "=" . (int)$id;

        if($this->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function insert($table, $kv) {
        $table = $this->table($table);
        if(is_array($kv)) {
            $sql = "INSERT INTO " . $table;
            $fields = "";
            $values = "";
            foreach($kv as $k=>$v) {
                $fields .= $k . ", ";
                $values .= "'" . $v . "', ";
            }
            $fields = substr($fields, 0, -2);
            $values = substr($values, 0, -2);
            $sql .= "(" . $fields . ") VALUES(" . $values . ")";
            return $this->query($sql);
        }
        return null;
    }

    public function getRowById($table, $id) {
        $table = $this->table($table);
        $key = $this->_getTableKey($table);
        $sql = "SELECT * FROM " . $table . " WHERE " . $key . "=" . (int)$id . " LIMIT 1";
        $res = $this->query($sql);
        return $this->loadAssoc($res);
    }

    public function getRow($sql) {
        if(!preg_match('/\blimit\b/i', $sql)) {
            $sql .= " LIMIT 0,1";
        }
    	$this->query($sql);
        return $this->loadAssoc();
    }

    public function getOne($sql) {
        $this->query($sql);
        return $this->loadResult();
    }

    public function getAll($sql) {
        $this->query($sql);
        return $this->loadAssocList();
    }

    public function getLimit($sql, $start, $num) {
        $sql = $sql . " LIMIT " . $start . "," . $num;
        $this->query($sql);
        return $this->loadAssocList();
    }

	//通过ID来获取字段的值
    public function getFieldById() {
		$num = func_num_args();
		$args = func_get_args();
		if($num < 3) {
			error_reporting('ERROR: You must provide more than two parameter in function "getFieldById"');
		} elseif(!is_numeric($args[1])) {
			error_reporting('ERROR: You must provide ID in second parameter');
		}
		$table = $this->table($args[0]);
		$id = (int)$args[1];
		$key = $this->_getTableKey($table);
		$fields = '';
		for($i = 2; $i < $num; $i++) {
			$fields .= empty($fields) ? $args[$i] : ','.$args[$i];
		}
		if(empty($fields)) {
			error_reporting('ERROR: you must provide the fields you want to query.');
		}
		$sql = "SELECT " . $fields . " FROM " . $table . " WHERE " . $key . "=" . $id;
		$this->query($sql);
		return $this->loadAssoc();
    }

	/**
	 * 自动分析将表单数据写入数据库中，待写入的表单数据的键前要加wrt_前缀
	 */
	function autoWrite($datas, $table) {
		$table = $this->table($table);
		$this->query("DESC " . $table);
		$fields = array();
		while($line = $this->loadAssoc()) {
			if($line['Key'] != 'PRI') {
				$fields[] = $line['Field'];
			}
		}

		//过滤待写入的数据
		$param = array();
		$id = 0;
		foreach($datas as $key => $value) {
			if(strpos($key, 'wrt_') === 0) {
				$f = substr($key, 4);
				if($f == 'id') {
					$id = $value;
				} elseif (in_array($f, $fields)) {
					$param[$f] = $value;
				}
			}
		}

		//写入数据
		if(!empty($param)) {
			if($id) {
				//更新数据
				if($this->updateById($table, $param, $id)) {
					return $id;
				}
			} else {
				//插入数据
				if($this->insert($table, $param)) {
					return $this->insertId();
				}
			}
		}
		return false;
	}


    /**
     * private method
     */
	private function _getTableKey($table) {
        $table = $this->table($table);
		$sql = "DESC " . $table;
		$res = mysql_query($sql);
		while($row = mysql_fetch_assoc($res)) {
			if($row['Key'] == 'PRI') {
				return $row['Field'];
			}
		}
		return null;
	}
    private function printError($msg) {
        echo '<h3>MySQL Error Report: </h3>';
        if(is_array($msg)) {
        	print_r($msg);
        } else {
            echo $msg;
        }
        exit;
    }

	function __destruct() {}
}
