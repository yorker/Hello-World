<?php
class Download {
	private $db;
	private $tdown;		//download
	private $tcat;			//normal_category
	private $ctype;		//article_cat

	public function __construct() {
		$this->db = MySql::getInstance();
		$this->tdown = $this->db->table('download');
		$this->tcat = $this->db->table('normal_category');
		$this->ctype = 1;	//type=1 表示下载分类
	}

	public function getListByCat($cat_id, $fields='', $limit='') {
		if(empty($fields)) {
			$fields = "*";
		}
		$sql = "SELECT " . $fields . " FROM " . $this->tdown . " WHERE cat_id=" . (int)$cat_id . " ORDER BY ordering ASC, create_date DESC";
		if(!empty($limit)) {
			$sql .= " LIMIT " . $limit;
		}
		return $this->db->getAll($sql);
	}

	public function getCatById($cid) {
		$sql = "SELECT * FROM " . $this->tcat . " WHERE cat_id=" . (int)$cid . " AND type=" . $this->ctype . " AND published=1";
		$this->db->query($sql);
		return $this->db->loadAssoc();
	}

	public function getIds() {
		$sql = "SELECT cat_id FROM " . $this->tcat . " WHERE type=" . $this->ctype . " AND published=1";
		$this->db->query($sql);
		$reval = array();
		while($row = $this->db->loadAssoc()) {
			$reval[] = $row['cat_id'];
		}
		if(!empty($reval)) {
			return implode(',', $reval);
		} else {
			return false;
		}

	}

	public function getCategories($fields='', $limit='') {
		if(empty($fields)) {
			$fields = "*";
		}
		$sql = "SELECT " . $fields . " FROM " . $this->tcat . " WHERE type=" . $this->ctype . " ORDER BY ordering ASC";
		if(!empty($limit)) {
			$sql .= " LIMIT " . $limit;
		}
		$this->db->query($sql);
		$rearr = array();
		while($row = $this->db->loadAssoc()) {
			if(isset($row['cat_id']) && !empty($row['cat_id'])) {
				$row['caturl'] = $this->getCatUrl($row['cat_id']);
			}
			$rearr[] = $row;
		}
		return $rearr;
	}

	public function getCatUrl($id='') {
        if($id) {
        	return App::url('Index/dlist/' . $id);
        }
        return App::url('Index/dlist');
	}
}