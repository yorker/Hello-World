<?php
/*
 * Created on Feburary 21, 2011
 * Author By Yorker
 **/

class ArticleExtension extends Extension {
	public function __construct() {
		parent::__construct();
	}

	//获得文章分类树
	public function getArticleCatTree($cat_id = 0, $is_terminal='') {
        $load = null;
        $this->_getArticleCatTree($load, $cat_id, $is_terminal);
        return $load;
	}
    private function _getArticleCatTree(&$load, $cat_id=0, $is_terminal='') {
    	$sql = "SELECT cat_id, cat_name FROM #@__article_cat WHERE parent_id=" . (int)$cat_id;
    	if($is_terminal !== '') {
			$sql .= " AND is_terminal=" . (int)$is_terminal;
    	}
    	$sql .= " ORDER BY ordering ASC, cat_id ASC";

        $load = $this->db->getAll($sql);
        //self::debug($load);
        if(empty($load)) {
            return;
        } else {
            foreach($load as &$l) {
                $l['sub'] = array();
                $this->_getArticleCatTree($l['sub'], $l['cat_id'], $is_terminal);
            }
        }
    }

	//格式化文章分类树
    public function formatArticleCat(&$load, $cat_id = 0, $indent = 0, $is_terminal='') {
        $tree = $this->getArticleCatTree($cat_id, $is_terminal);
        $this->_formatArticleCat($load, $tree, $indent);
    }
    private function _formatArticleCat(&$load, &$tree, $indent) {
    	foreach($tree as $v) {
            $load[$v['cat_id']] = str_repeat('&nbsp; ', $indent*3) . $v['cat_name'];
            if(!empty($v['sub'])) {
                $this->_formatArticleCat($load, $v['sub'], $indent+1);
            }
        }
    }

	//获得文章分类id，以及子分类id
    public function getArticleCatChildren($cat_id) {
        $cats = array();
        if($cat_id > 0) {
        	$cats[] = $cat_id;
            $this->_getArtCatChildren($cats, $cat_id);
            return $cats;
        } else {
        	return false;
        }
    }
    private function _getArtCatChildren(&$load, $cat_id) {
        $res = $this->db->getAll("SELECT cat_id FROM #@__article_cat WHERE parent_id=" . (int)$cat_id);
        if(!empty($res)) {
        	foreach($res as $val) {
        		$load[] = $val['cat_id'];
                $this->_getArtCatChildren($load, $val['cat_id']);
        	}
        } else {
        	return;
        }
    }
}