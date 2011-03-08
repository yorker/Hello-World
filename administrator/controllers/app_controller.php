<?php
/**
 * 定义在一个应用程序中可以在所有控制器类中共用的属性的方法
 * Create On Feburary 12, 2011
 * Author By Yorker
 */
class AppController extends Controller {
	protected $layout = 'ajax_default';

    /**
     * 执行action之前的逻辑处理
     */
	public function beforeFilter() {
        $adm = &App::factory('Admin');

        //验证用户是否已经登录
		if($this->action != 'sysLogin') {
            if($adm->isAdminLogin()) {
                $admin = $adm->getAdmin();
                $this->set(compact('admin'));
            }
        }
	}

    protected function setHInfo($title='', $link='', $href='') {
        if(!$href && strpos($href, 'dispatcher.php?disp=') === false) {
        	$href = App::url($href);
        }
        $head_top = array('title'=>$title, 'link'=>$link, 'href'=>$href);
        $this->set(compact('head_top'));
    }

    /**
     * 记录修改时，检测是否存在图片的修改，如果存在，以前的旧图片需要删除掉
     * @param string $table database table
     * @param string $field field
     * @param int $id
     * @param string $checked 新提交上来的修改图片，需要与所定位的图片进行对比，以确定原图片是否需要删除
     */
    protected function checkOldImage($table, $field, $id, $new_image) {
        $key = $this->db->getTableKey($table);
        $old_image = $this->db->getOne("SELECT " . $field . " FROM " . $this->db->table($table) . " WHERE " . $key . "=" . (int)$id);
        if($old_image && $old_image != $new_image) {
        	Common::unlink(UPLOAD_PATH . $old_image);
            Common::unlink(UPLOAD_PATH . Common::addPostfix($old_image, '_thumb'));
            Common::unlink(UPLOAD_PATH . Common::addPostfix($old_image, '_small'));
        }
    }

    protected function getAlter() {
    	return array('1'=>$GLOBALS['_LANG']['yes'], '0'=>$GLOBALS['_LANG']['no']);
    }
}