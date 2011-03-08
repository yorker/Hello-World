<?php
/*
 * Product component
 * Created on Feburary 21, 2011
 * Author By Yorker
 **/
class ProductExtension extends Extension {
	//获得产品分类树
    public function getProductCatTree($cat_id = 0, $is_terminal='') {
        $load = null;
        $this->_getProductCatTree($load, $cat_id, $is_terminal);
        return $load;
    }
    private function _getProductCatTree(&$load, $cat_id=0, $is_terminal) {
        global $db;
		if($is_terminal !== '') {
			$condition = " AND is_terminal=" . (int)$is_terminal;
		} else {
			$condition = "";
		}
		$sql = "SELECT cat_id, cat_name FROM #@__product_cat WHERE parent_id=" . (int)$cat_id . $condition . " ORDER BY ordering";

        $load = $this->db->getAll($sql);

        if(empty($load)) {
            return;
        } else {
            foreach($load as &$l) {
                $l['sub'] = array();
                $this->_getProductCatTree($l['sub'], $l['cat_id'], $is_terminal);
            }
        }
    }

	//格式化产品分类树
    public function formatProductCat(&$load, $cat_id = 0, $indent = 0, $is_terminal='') {
        $tree = $this->getProductCatTree($cat_id, $is_terminal);
        $this->_formatProductCat($load, $tree, $indent);
    }
    private function _formatProductCat(&$load, &$tree, $indent) {
        foreach($tree as $v) {
            $load[$v['cat_id']] = str_repeat('&nbsp; ', $indent*3) . $v['cat_name'];
            if(!empty($v['sub'])) {
                $this->_formatProductCat($load, $v['sub'], $indent+1);
            }
        }
    }

	//获得产品分类id及当前子id
    public function getProductCatChildren($cat_id) {
        $cats = array();
        if($cat_id > 0) {
            $cats[] = $cat_id;
            $this->_getProCatChildren($cats, $cat_id);
            return $cats;
        } else {
            return false;
        }
    }

    //获得产品分类列表结构
    public function getProductCatStruct($cats, $selected = '') {
        $catopt = '';
        if(empty($cats) || !is_array($cats)) {
            return;
        }
        foreach($cats as $k=>$v) {
            if($k) {
                $is_terminal = $this->db->getOne("SELECT is_terminal FROM #@__product_cat WHERE cat_id=" . (int)$k);
                if($is_terminal) {
                    if($selected == $k) {
                        $catopt .= '<option value="' . $k . '" selected>' . $v . '</option>';
                    } else {
                        $catopt .= '<option value="' . $k . '">' . $v . '</option>';
                    }
                } else {
                    $catopt .= '<optgroup label="' . $v . '"></optgroup>';
                }
            } else {
                $catopt .= '<option value="' . $k . '">' . $v . '</option>';
            }
        }
        return $catopt;
    }

    private function _getProCatChildren(&$load, $cat_id) {
        global $db;
        $res = $db->getAll("SELECT cat_id FROM " . $db->table('product_cat') . " WHERE parent_id=" . (int)$cat_id);
        if(!empty($res)) {
            foreach($res as $val) {
                $load[] = $val['cat_id'];
                $this->_getProCatChildren($load, $val['cat_id']);
            }
        } else {
            return;
        }
    }
}