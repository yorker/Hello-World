<?php
interface ArcBase {
	public function getCategories($pid=0);	//只获得下一级的分类列表
	public function getArticlesByCat($catid, $fields='', $allsub=false);	//通过分类获取文章
	public function getCatIds($catid=0);		//获取一个分类下的所有子分类和当前分类ID集
	public function getArticle($aid, $page=1);		//获取一篇文章信息

    public function getCatUrl($catid);
    public function getArtUrl($caticle_id);

	public function getArtPos($aid);
	public function getCatPos($cid);

	public function getNext($id);
	public function getPrev($id);
}
class Article implements ArcBase {
	private $db;
	private $tarc;		//article
	private $tcat;		//article_cat

	public function __construct() {
		$this->db = &MySql::getInstance();
		$this->tarc = $this->db->table('article');
		$this->tcat = $this->db->table('article_cat');
	}

	/**
	 * 获取指定的下一级分类
	 * @param integer $pid 所挂接的父分类ID
	 * @return array, or false if empty
	 */
	public function getCategories($pid=0, $fields='') {
		$pid = is_numeric($pid) && $pid > 0 ? (int)$pid : 0;
        if(empty($fields)) {
        	$fields = '*';
        }
		$res = $this->db->getAll("SELECT " . $fields . " FROM " . $this->tcat . " WHERE parent_id=" . $pid . " ORDER BY ordering ASC, cat_id DESC");
		if(!empty($res)) {
            foreach($res as &$val) {
                if(isset($val['cat_id']) && $val['cat_id'] > 0) {
                	$val['caturl'] = $this->getCatUrl($val['cat_id']);
                }
            }
			return $res;
		}
		return false;
	}

	/**
	 * 获取分类下面的文章
	 * @param integer $catid
	 * @allsub integer $allsub 是否获取所有子分类的文章，默认仅针对该分类下的文章
	 */
	public function getArticlesByCat($catid, $fields='', $allsub=false, $limit="") {
		$sql = "SELECT ";
		if(empty($fields)) {
			$sql .= "* ";
		} else {
			$sql .= $fields . " ";
		}
		$sql .= "FROM " . $this->tarc . " WHERE is_deleted=0 AND published=1 ";
		if($allsub) {
            $ids = $this->getCatIds($catid);
            $catid = implode(',', $ids);
		}
		$sql .= "AND cat_id IN (" . $catid . ") ";
		$sql .= "ORDER BY article_id DESC ";
        if(!empty($limit) && (is_numeric($limit) || strpos($limit, ',') !== false)) {
        	$sql .= "LIMIT " . $limit;
        }

        $rearr = array();
        $this->db->query($sql);
        while($row = $this->db->loadAssoc()) {
            if(isset($row['article_id']) && $row['article_id'] > 0) {
                $row['arturl'] = $this->getArtUrl($row['article_id']);
            }
			if(isset($row['title']) && !empty($row['title'])) {
				$row['title'] = htmlspecialchars($row['title']);
			}
            $rearr[] = $row;

        }
        return $rearr;
	}

    public function getCatIds($catid=0) {
        $rearr = array();
    	if($catid == 0) {
    		//返回所有的ID
            $this->db->query("SELECT cat_id FROM " . $this->tcat);
            while($row = $this->db->loadAssoc()) {
            	$rearr[] = $row['id'];
            }
    	} else {
            $this->_getCatId($rearr, $catid);
    	}
        return $rearr;
    }
    private function _getCatId(&$load, $catid) {
        $load[] = $catid;
        $subcats = $this->db->getAll("SELECT cat_id FROM " . $this->tcat . " WHERE parent_id=" . (int)$catid);
        if(!empty($subcats)) {
            foreach($subcats as $val) {
            	$this->_getCatId($load, $val['cat_id']);
            }
        } else {
        	return;
        }
    }

	public function getArtPos($aid) {
		$this->db->query("SELECT cat_id, title FROM " . $this->tarc . " WHERE article_id=" . (int)$aid);
		$arc = $this->db->loadAssoc();
		if(empty($arc)) {
			return false;
		} else {
			$cat_id = $arc['cat_id'];
			$title = htmlspecialchars($arc['title']);
			$load = array();
			$this->_getAllParentCat($load, $cat_id);
			$pos = array();
			while(!empty($load)) {
				$pos[] = array_pop($load);
			}
			$pos[] = $title;
			return $pos;
		}
	}
	public function getCatPos($cid) {
		$load = array();
		$this->_getAllParentCat($load, $cid);
		$pos = array();
		while(!empty($load)) {
			$pos[] = array_pop($load);
		}
		return $pos;

	}
	private function _getAllParentCat(&$load, $cat_id) {
		$this->db->query("SELECT cat_id, parent_id, cat_name FROM " . $this->tcat . " WHERE cat_id=" . (int)$cat_id);
		$cat = $this->db->loadAssoc();
		if(!empty($cat)) {
			$load[] = '<a href="' . $this->getCatUrl($cat['cat_id']) . '">' . $cat['cat_name'] . '</a>';
			$this->_getAllParentCat($load, $cat['parent_id']);
		} else {
			return;
		}
	}

	public function getArticle($aid, $page=1) {
		$sep = '#p#BreakPage#e#';
		$sql = "SELECT * FROM " . $this->tarc . " WHERE article_id=" . (int)$aid . " AND is_deleted=0";
		$this->db->query($sql);
		$info = $this->db->loadAssoc();
		if(empty($info)) {
			return false;
		}
		$info['title'] = htmlspecialchars($info['title']);
		$page = !empty($page) ? intval($page) : 1;
		if(strpos($info['content'], $sep) !== false) {
			$body = explode($sep, $info['content']);
			$total_record = count($body);
			$page = $page>$total_record ? $total_record : $page;
			$info['content'] = $body[$page-1];
			$info['page'] = $page;
			$info['total'] = $total_record;
		}
		return $info;
	}

	public function getNext($id) {
		$cat_id = $this->db->getOne("SELECT cat_id FROM " . $this->tarc . " WHERE article_id=" . (int)$id);
		$this->db->query("SELECT article_id, title FROM " . $this->tarc . " WHERE published=1 AND is_deleted=0 AND article_id>" . (int)$id . " AND cat_id=" . (int)$cat_id . " ORDER BY article_id ASC");
		$next = $this->db->loadAssoc();
		if(!empty($next)) {
			$next['url'] = $this->getArtUrl($next['article_id']);
			$next['title'] = htmlspecialchars($next['title']);
		} else {
			return '';
		}
		return $next;
	}
	public function getPrev($id) {
		$cat_id = $this->db->getOne("SELECT cat_id FROM " . $this->tarc . " WHERE article_id=" . (int)$id);
		$this->db->query("SELECT article_id, title FROM " . $this->tarc . " WHERE published=1 AND is_deleted=0 AND  article_id<" . (int)$id . " AND cat_id=" . (int)$cat_id . " ORDER BY article_id DESC");
		$prev = $this->db->loadAssoc();
		if(!empty($prev)) {
			$prev['url'] = $this->getArtUrl($prev['article_id']);
			$prev['title'] = htmlspecialchars($prev['title']);
		} else {
			return '';
		}
		return $prev;
	}

    public function getCatUrl($catid) {
        return App::url('Index/artcat/' . $catid);
    }

    public function getArtUrl($article_id) {
        return App::url('Index/article/' . $article_id);
    }
}