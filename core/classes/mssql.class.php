<?php
final class MsSql implements BaseDb {
	private $link = null;
	private $res = null;
	private $prefix = null;
	private $db = null;

	function __construct() {
		$config = new DbConfig();
		$this->prefix = $config->prefix;
		$this->db = $config->dbName;
		if(!$this->link) {
			$this->link = mssql_pconnect($config->server, $config->username, $config->password) or exit("Could not connnect database: " . mssql_get_last_message());
			mssql_select_db($config->dbName) or exit("Select database failed: " . mssql_get_last_message());
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
		$this->res = mssql_query($sql, $this->link);

        if(!$this->res) {
            $error = array();
            $error['message'] = 'mssql Query Error';
            $error['sql'] = $sql;
            $error['err'] = $this->errorMsg();
            $this->printError($error);
        }
		return $this->res;
	}

    public function loadAssoc($res=null) {
		if(is_null($res)) {
			$res = $this->res;
		}
		return mssql_fetch_assoc($res);
	}

	public function loadAssocList($res=null) {
		if(is_null($res)) {
			$res = $this->res;
		}
		$list = array();
		while($row = mssql_fetch_assoc($res)) {
			$list[] = $row;
		}
		return $list;
	}

	public function loadResult($res=null) {
		if(is_null($res)) {
			$res = $this->res;
		}
		$result = mssql_fetch_row($res);
        if(!empty($result)) {
            return $result[0];
        } else {
            return false;
        }

	}

	public function getAffectedRows() {
		return mssql_rows_affected($this->link);
	}

	public function getNumRows() {
		if(is_resource($this->res)) {
			return mssql_num_rows($this->res);
		}
		return false;
	}

	public function insertId() {
        $this->query("SELECT @@IDENTITY");
		return $this->loadResult();
	}

	public function errorMsg() {
		return mssql_get_last_message();
	}

	public function freeResult($res = null) {
		if($res) {
			return mssql_free_result($res);
		} else {
			return mssql_free_result($this->res);
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
        $sql = "UPDATE $table SET ";
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
        $sql = "SELECT top 1 * FROM " . $table . " WHERE " . $key . "=" . (int)$id;
        $res = $this->query($sql);
        return $this->loadAssoc($res);
    }

    public function getRow($sql) {
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
		$sql = preg_replace('/^select/i', 'SELECT top ' . intval($start+$num), $sql);
		$this->query($sql);
		$i = 0;
		while($i < $start) {
			$this->loadAssoc();
			$i++;
		}
        $revalue = array();
		while($row = $this->loadAssoc()) {
			$revalue[] = $row;
		}
		mssql_free_result($this->res);
		return $revalue;
    }

    //通过ID来获取字段的值
    public function getFieldById() {
		$num = func_num_args();
		$args = func_get_args();
		if($num < 3) {
			error_reporting('ERROR: You must provide more than two parameter in function "getFieldById"');
		} elseif(!is_numeric($args['1'])) {
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
     * private method
     */
	private function _getTableKey($table) {
        $table = $this->table($table);
		$sql = "sp_pkeys " . $table;
		$res = mssql_query($sql);
        $row = mssql_fetch_assoc($res);
        if(!empty($row) && !empty($row['COLUMN_NAME'])) {
            return $row['COLUMN_NAME'];
        }
		return null;
	}
    private function printError($msg) {
        echo '<h3>mssql Error Report: </h3>';
        if(is_array($msg)) {
        	print_r($msg);
        } else {
            echo $msg;
        }
        exit;
    }

	function __destruct() {

	}
}
