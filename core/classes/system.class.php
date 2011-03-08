<?php
/**
 * Created On December 15, 2010
 * Author By Yorker
 */
class System extends Base {
	/**
     * 获取配置信息
     */
    static function getConfigValue() {
        global $db;
        $args = func_get_args();
        $len = func_num_args();
        if($len == 1) {
            $key = $args[0];
            return $db->getOne("SELECT conf_value FROM " . $db->table('sys_config') . " WHERE conf_key='" . $key . "'");
        } elseif($len > 1) {
            $revalue = array();
            $ins = "(";
            foreach($args as $arg) {
                $ins .= "'" . $arg . "',";
            }
            $ins = substr($ins, 0, -1) . ")";
            $res = $db->getAll("SELECT conf_key, conf_value FROM " . $db->table('sys_config') . " WHERE conf_key IN " . $ins);
            foreach($res as $val) {
                $revalue[$val['conf_key']] = $val['conf_value'];
            }
            return $revalue;
        }
        return false;
    }

    static function writeLog($is_backend = true) {
		global $db, $user, $sess;
		$admin = $sess->get('admin');
		if($is_backend) {
			$uid = isset($admin['admin_id']) && !empty($admin['admin_id']) ? $admin['admin_id'] : 0;
		} else {
			$uid = isset($user['user_id']) && !empty($user['user_id']) ? $user['user_id'] : 0;
		}
		$query = $_SERVER['QUERY_STRING'];
		$is_backend = $is_backend ? 1 : 0;
		$db->insert('sys_log', array('uid'=>$uid, 'filename'=>$_SERVER['REQUEST_URI'], 'method'=>$_SERVER['REQUEST_METHOD'], 'query'=>$query, 'ip'=>$_SERVER['REMOTE_ADDR'], 'create_datetime'=>date('Y-m-d H:i:s'), 'is_backend'=>$is_backend)) or exit($db->errorMsg());
    }

    //调整kindeditor编辑器上传的图片地址
    static function justifyImage(&$text) {
		//$pattern = '/(<img(?:.+?)src\s*=\s*")(?:.*?)(kindeditor\/[^>]*)/i';
		$pattern = '/src\s*=\s*\\\?"([^"]*)"[^>]*/i';
		preg_match_all($pattern, $text, $matches);

		$needle = 'kindeditor/';
		if(isset($matches[1]) && !empty($matches[1])) {
			foreach($matches[1] as $val) {
				if(strpos($val, $needle) !== false) {
					$text = str_replace($val, Common::stripTail(ROOT_URL) . '/' . strstr($val, $needle), $text);
				}
			}
		}

		return $text;
    }

    /**
     * @获取文本中的本地图片，返回一个包含图片的数组
     * @使用该函数时，检索出的图片必须是kindeditor/attached/目录下的图片文件
     * @return array
     */
    static function getTextImage(&$text) {
        $pattern = '/src\s*=\s*\\\?"([^"]*)"[^>]*/i';
        preg_match_all($pattern, $text, $matches);

        $revalue = array();
        if(isset($matches[1]) && !empty($matches[1])) {
            foreach($matches[1] as &$val) {
                if(strpos($val, 'kindeditor/attached/') !== false) {
                    $revalue[] = str_replace("\\", "", basename($val));
                }
            }
        }
        return $revalue;
    }

    /**
     * @保存数据时处理编辑器中的附件数据(图片)
     * @param integer $type 1:针对文章，2：针对产品描述
     */
    static function textAttachment(&$text, $aid, $type) {
        global $db;
        if($aid && $type) {
            $ftmp = $db->getAll("SELECT filename FROM " . $db->table('attachment') . " WHERE aid=" . (int)$aid . " AND type=" . (int)$type);

            //原有附件
            $oldfiles = array();
            if(!empty($ftmp)) {
                foreach($ftmp as $f) {
                    $oldfiles[] = $f['filename'];
                }
            }
            unset($ftmp);

            $fnames = self::getTextImage($text);
            if(!empty($fnames)) {
                foreach($fnames as $filename) {
                    if(!in_array($filename, $oldfiles)) {
                        //原附件集中不存在，记录+
                        $db->insert('attachment', array('aid'=>$aid, 'type'=>$type, 'filename'=>$filename));
                    }
                }
            }

            //清理垃圾数据
            $clear_files = array_diff($oldfiles, $fnames);
            if(!empty($clear_files)) {
                foreach($clear_files as $f) {
                    @unlink(ATTACHED_PATH . $f);
                    $db->query("DELETE FROM " . $db->table('attachment') . " WHERE filename='" . $f . "'");
                }
            }
            return true;
        } else {
            trigger_error('Function Common::textAttachment missing "\$aid" or "\$type" parameter.');
            return false;
        }
    }

    /**
     * @删除编辑器中的附件数据（图片）
     */
     static function clearTextAttachment($aid, $type) {
         global $db;
         $arr_id = array();
         if(!is_array($aid)) {
             $arr_id[] = $aid;
         } else {
             $arr_id = $aid;
         }
         if(!empty($arr_id)) {
             $ins = "(" . implode(',', $arr_id) . ")";
             $files = $db->getAll("SELECT filename FROM " . $db->table('attachment') . " WHERE aid IN " . $ins . " AND type=" . (int)$type);
             if(!empty($files)) {
                 foreach($files as $f) {
                     @unlink(ATTACHED_PATH . $f['filename']);
                 }
                 $db->query("DELETE FROM " . $db->table('attachment') . " WHERE aid IN " . $ins . " AND type=" . (int)$type);
             }
             return true;
         } else {
             return null;
         }
     }

     /**
      * @对写入标签TAG信息的处理，主要处理#@__tags和#@__tag_relate两个数据表
      * @param String $oldtags 旧有标签
      * @param String $newtags 新要写入的标签
      * @param integer $itemid 条目ID
      * @param integer $type 类型，条目ID的取向由类型决定, 1:文章，2：产品
      * @return Boolen
      */
    static function handleTags($oldtags, $newtags, $itemid, $type) {
        global $db;

        $old_arr = !empty($oldtags) ? explode(' ', $oldtags) : array();
        $new_arr = !empty($newtags) ? explode(' ', $newtags) : array();
        $dels = array_diff($old_arr, $new_arr);
        $news = array_diff($new_arr, $old_arr);

        foreach($dels as $tagname) {
            $tagid = $db->getOne("SELECT id FROM " . $db->table('tags') . " WHERE type=" . (int)$type . " AND tagname='" . $tagname . "'");
            $db->query("UPDATE " . $db->table('tags') . " SET relate_num=relate_num-1 WHERE id=" . (int)$tagid);
            $db->query("DELETE FROM " . $db->table('tag_relate') . " WHERE itemid=" . (int)$itemid . " AND type=" . (int)$type . " AND tagid=" . (int)$tagid);
        }
        foreach($news as $tagname) {
            $tagid = $db->getOne("SELECT id FROM " . $db->table('tags') . " WHERE type=" . (int)$type . " AND tagname='" . $tagname . "'");
            if($tagid) {
                //该标签已经存在于库中
                $db->query("UPDATE " . $db->table('tags') . " SET relate_num=relate_num+1 WHERE id=" . (int)$tagid);
            } else {
                $db->insert('tags', array('type'=>$type, 'tagname'=>$tagname, 'create_datetime'=>date('Y-m-d H:i:s')));
                $tagid = $db->insertId();
            }
            $db->insert('tag_relate', array('itemid'=>$itemid, 'type'=>$type, 'tagid'=>$tagid, 'tagname'=>$tagname));
        }
        return true;
     }
}