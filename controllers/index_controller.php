<?php
/**
 * Create On March 1, 2011
 * Author Yorker
 */

class IndexController extends AppController {
	public function index() {
		global $arc, $_LANG;

        if(!$this->isCached()) {
			//友情链接
			$sql = "SELECT name, link FROM #@__friend_link ORDER BY ordering ASC";
			$links = $this->db->getAll($sql);
			$this->tpl->assignByRef('my_links', $links);

			//推荐文章
			$sql = "SELECT Article.article_id, Article.cat_id, Article.title, Article.open_type, Article.is_commended, Article.update_time, Category.cat_name FROM #@__article AS Article INNER JOIN #@__article_cat AS Category ON Category.cat_id=Article.cat_id WHERE Article.published=1 AND Article.is_commended=1 ORDER BY Article.ordering ASC, Article.create_time DESC";
			$list = $this->db->getAll($sql);
			foreach($list as &$l) {
				$l['url'] = $arc->getArtUrl($l['article_id']);
				$l['cat_url'] = $arc->getCatUrl($l['cat_id']);
				$l['update_time'] = date('Y-m-d H:i', $l['update_time']);
			}
			$this->set(compact('list'));
			$this->tpl->assign('all_article_url', $arc->getCatUrl(19));

			//相册
			$sql = "SELECT id, title, cover_img FROM #@__picture_collect WHERE published=1 ORDER BY ordering ASC, create_datetime DESC";
			$ablums = $this->db->getAll($sql);
			foreach($ablums as &$ablum) {
				$ablum['url'] = App::url('Index/ablum/' . $ablum['id']);
			}
			$this->tpl->assignByRef('ablums', $ablums);

			$this->tpl->assign('utility_link', $arc->getCategories(21));
			$this->tpl->assign('latest_art', $arc->getArticlesByCat(19, 'article_id, title', true, 9));
			$this->tpl->assign('page_title', $_LANG['index']);
		}
		$this->display();
	}

    public function article($id) {

        global $_LANG;
        $id = intval($id);
        if(!$id) {
            Common::setRedirect($_LANG['invalid_request'], 'index.php', true);
        }

        //统计点击次数
        $this->db->query("UPDATE #@__article SET click_count=click_count+1 WHERE article_id=" . $id);

        $page = NPage::getCurrentPage('_article', true);
        $cache_id = 'article_' . $id . '_page_' . $page;
        if(!$this->isCached('', $cache_id)) {
            $arc = new Article();
            $nav = $arc->getArtPos($id);
            $page_title = '';
            if(!empty($nav)) {
                $len = count($nav);
                for($i = $len-1; $i >= 0; $i--) {
                    $page_title .= $page_title ? '-'.$nav[$i] : $nav[$i];
                }
            }
            $page_title = strip_tags($page_title);
            $position = create_position($nav);

            $article = $arc->getArticle($id, $page);
            if(empty($article)) {
                Common::setRedirect($_LANG['you_request_data_not_exist'], App::url('index'), true);
            }
            if(isset($article['link']) && !empty($article['link'])) {
                $link = trim($article['link']);
                if(strpos($link, 'http://')!==0) {
                    $link = 'http://' . $link;
                }
                header('Location:' . $link);
                exit;
            }
            if(isset($article['total']) && isset($article['page'])) {
                $pages = NPage::page($article['total'], $article['page'], $arc->getArtUrl($id), 1);
            } else {
                $pages = '';
            }

            $prev = $arc->getPrev($id);
            $next = $arc->getNext($id);

            $this->tpl->assign('top_position', $position);
            $this->tpl->assignByRef('art', $article);
            $this->tpl->assign('pages', $pages);
            $this->tpl->assign('prev', $prev);
            $this->tpl->assign('next', $next);
            $this->tpl->assign('seo_description', htmlspecialchars($article['description']));
            $this->tpl->assign('seo_keywords', $article['keywords']);
            $this->tpl->assign('page_title', $page_title);
        }
        $this->display('', $cache_id);
    }

    public function artcat($id) {
        global $_LANG;
    	$id = intval($id);
        if(!$id) {
            Common::setRedirect($_LANG['invalid_request'], App::url('Index'), true);
        }
        $arc = & new Article();
        $ids = $arc->getCatIds($id);

        $position = create_position($arc->getCatPos($id));
        $page = NPage::getCurrentPage('_artcat', true);
        $limit = 11;
        $total = $this->db->getOne("SELECT COUNT(*) AS cnt FROM #@__article AS a INNER JOIN #@__article_cat AS c ON a.cat_id=c.cat_id WHERE a.published=1 AND a.cat_id IN (" . implode(',', $ids) . ")");
        $pages = NPage::page($total, $page, $arc->getCatUrl($id), $limit);

        $sql = "SELECT c.cat_name, c.cat_id, a.article_id, a.title, a.create_time, a.update_time, a.open_type FROM #@__article AS a INNER JOIN #@__article_cat AS c ON a.cat_id=c.cat_id WHERE a.published=1 AND a.cat_id IN (" . implode(',', $ids) . ") ORDER BY a.ordering ASC, update_time DESC LIMIT " . ($page-1)*$limit . ", " . $limit;
        $this->db->query($sql);
        $articles = array();
        while($row = $this->db->loadAssoc()) {
            $row['caturl'] = $arc->getCatUrl($row['cat_id']);
            $row['arturl'] = $arc->getArtUrl($row['article_id']);
            $articles[] = $row;
        }

        $cat_name = $this->db->getOne("SELECT cat_name FROM #@__article_cat WHERE cat_id=" . (int)$id);

        $this->tpl->assign('articles', $articles);
        $this->tpl->assign('top_position', $position);
        $this->tpl->assign('page_title', $cat_name);
        $this->tpl->assign('cat_name', $cat_name);
        $this->tpl->assign('pages', $pages);

        $this->display('', 'artcat_' . $id . '_page_' . $page);
    }

    public function ablumlist($cat_id = 0) {
        global $_LANG;
    	$cat_id = intval($cat_id);
        $page = NPage::getCurrentPage('ablumlist');
        $cache_id = 'ablum_list_' . $page . '_' . $cat_id;
        if(!$this->isCached('', $cache_id)) {
            $limit = 18;
            $wheresql = "WHERE c.cat_id=p.cat_id AND c.type=2";
            $page_title = $_LANG['ablum_list'];
            $parr[] = '<a href="' . App::url('Index/ablumlist') . '">' . $_LANG['ablum_list'] . '</a>';
            if($cat_id) {
                $cat_name = $this->db->getOne("SELECT name FROM #@__normal_category WHERE type=2 AND cat_id=" . $cat_id);
                if(!empty($cat_name)) {
                    $page_title = $cat_name . '-' . $page_title;
                    $parr[] = $cat_name;
                } else {
                    Common::setRedirect($_LANG['you_request_data_not_exist'], App::url('Index'), true);
                }
                $wheresql .= " AND p.cat_id=" . (int)$cat_id;
            }

            $total = $this->db->getOne("SELECT COUNT(*) AS cnt FROM #@__picture_collect AS p , #@__normal_category AS c " . $wheresql);

            if($cat_id) {
                $baseurl = App::url('Index/ablumlist/' . $cat_id);
            } else {
            	$baseurl = App::url('Index/ablumlist');
            }
            $pages = NPage::page($total, $page, $baseurl, $limit);

            $sql = "SELECT p.*, c.name FROM #@__picture_collect AS p , #@__normal_category AS c " . $wheresql . " ORDER BY p.ordering ASC, p.id DESC";
            $list = $this->db->getAll($sql);

            foreach($list as &$val) {
                $val['ablumurl'] = App::url('Index/ablum/' . $val['id']);
                $val['caturl'] = App::url('Index/ablumlist/' . $val['cat_id']);
                $val['cover_img'] = Common::addPostfix($val['cover_img'], '_thumb');
                $val['pic_num'] = $this->db->getOne("SELECT COUNT(*) AS cnt FROM #@__picture_gallery WHERE cid=" . (int)$val['id']);
            }

            $cats = $this->db->getAll("SELECT cat_id, name FROM #@__normal_category WHERE type=2 ORDER BY cat_id ASC");
            foreach($cats as &$c) {
                $c['caturl'] = App::url('Index/ablumlist/' . $c['cat_id']);
            }

            $this->tpl->assign('page_title', $page_title);
            $this->tpl->assign('top_position', create_position($parr));
            $this->tpl->assign('pages', $pages);
            $this->tpl->assign('list', $list);
            $this->tpl->assign('cats', $cats);
            $this->tpl->assign('cat_id', $cat_id);
        }
        $this->display('', $cache_id);
    }

    public function ablum($id = 0) {
        global $_LANG;
    	$id = intval($id);
        $cache_id = 'ablum_' . $id;
        if(!$this->isCached('', $cache_id)) {
            $ablum = $this->db->getRow("SELECT p.*, c.name AS cat_name FROM #@__picture_collect AS p INNER JOIN #@__normal_category AS c ON p.cat_id=c.cat_id WHERE c.type=2 AND p.id=" . $id . " LIMIT 1");

            if(empty($ablum)) {
                Common::setRedirect($_LANG['you_request_data_not_exist'], App::url('Index'), true);
            }
            $page_title = $ablum['title'] . '-' . $_LANG['ablum'];
            $parr = array();
            $parr[] = '<a href="' . App::url('Index/ablumlist') . '">' . $_LANG['ablum_list'] . '</a>';
            $parr[] = '<a href="' . App::url('Index/ablumlist/' . $ablum['cat_id']) . '">' . $ablum['cat_name'] . '</a>';
            $parr[] = $ablum['title'];

            $gallery = $this->db->getAll("SELECT * FROM #@__picture_gallery WHERE cid=" . (int)$id . " ORDER BY id ASC");

            $ablum['gallery'] = $gallery;


            $this->tpl->assign('page_title', $page_title);
            $this->tpl->assign('ablum_title', $ablum['title']);
            $this->tpl->assign('top_position', create_position($parr));
            $this->tpl->assign('ablum', $ablum);
        }
        $this->display('', $cache_id);
    }

    public function dlist($id = 0) {
        global $_LANG;
    	$id = intval($id);

        if(isset($_GET['action']) && $_GET['action'] == 'download') {
            //处理下载
            if(isset($_GET['did'])) {
                $did = intval($_GET['did']);
                $rec = $this->db->getRowById($this->db->table('download'), $did);
                $util = new Util();
                if($util->isCn($rec['name'])) {
                    $rename = $util->pinyin($rec['name']);
                } else {
                    $rename = $rec['name'];
                }
                if(empty($rename)) {
                    $rename = $rec['name'];
                }
                //统计下载次数
                $this->db->query("UPDATE #@__download SET download_num=download_num+1 WHERE id=" . $did);

                Common::download(UPLOAD_PATH . $rec['path'], $rename);
                exit;
            } else {
                Common::setRedirect($_LANG['invalid_request'], App::url('Index'), true);
            }
        }

        $page = NPage::getCurrentPage('dlist');
        $cache_id = 'download_' . $id . '_page_' . $page;
        if(!$this->isCached('', $cache_id)) {
            $download = & new Download();
            if($id) {
                $download_cat = $download->getCatById($id);
                if(empty($download_cat)) {
                    Common::setRedirect($_LANG['you_request_data_not_exist'], App::url('Index'), true);
                }
                $parr = array('<a href="' . $download->getCatUrl() . '">' . $_LANG['download'] . '</a>', '<a href="' . $download->getCatUrl($id) . '">' . $download_cat['name'] . '</a>');
                $cat_name = $download_cat['name'];
                $page_title = $cat_name . '-' . $_LANG['download'];
                $ids = $id;
            } else {
                $parr = array('<a href="' . $download->getCatUrl() . '">' . $_LANG['download'] . '</a>');
                $cat_name = $_LANG['all_download'];
                $page_title = $_LANG['download'];
                $ids = $download->getIds();
            }

            $position = create_position($parr);
            $limit = 11;

            $where = "WHERE d.cat_id IN (" . $ids . ") AND d.published=1 AND c.published=1";
            $order = "ORDER BY d.ordering ASC, d.create_date DESC";
            $total = $this->db->getOne("SELECT COUNT(*) AS cnt FROM #@__normal_category AS c INNER JOIN #@__download AS d ON c.cat_id=d.cat_id " . $where);

            $pages = NPage::page($total, $page, $download->getCatUrl($id), $limit);

            $downloads = $this->db->getAll("SELECT c.name AS cat_name, c.cat_id, d.id, d.name, d.file_type, d.create_date, d.path FROM #@__normal_category AS c INNER JOIN #@__download AS d ON c.cat_id=d.cat_id " . $where . " " . $order);
            foreach($downloads as &$d) {
                $d['caturl'] = $download->getCatUrl($d['cat_id']);
                $d['filesize'] = Common::cvtByte(filesize(UPLOAD_PATH . $d['path']));
            }

            $this->tpl->assign('cat_name', $cat_name);
            $this->tpl->assign('page_title', $page_title);
            $this->tpl->assign('top_position', $position);
            $this->tpl->assign('pages', $pages);
            $this->tpl->assign('downloads', $downloads);
            $this->tpl->assign('goid', $id);
        }
        $this->display('', $cache_id);
    }

    public function notebook() {
        global $_LANG, $sess;
    	$this->tpl->caching = 0;

        if(isset($_POST['submit']) && !empty($_POST['submit'])) {
            //写入评论逻辑
            Common::checkArray($_POST, 'message', 'vcode');
            if(isset($_POST['enc_vcode']) && Common::vcode($_POST['enc_vcode'], $_POST['vcode'])) {
                if($sess->check('user.user_id')) {
                    $user_id = $sess->get('user.user_id');
                } else {
                    $user_id = 0;
                }
                $nickname = isset($_POST['nickname']) ? $_POST['nickname'] : '';
                $parent_id = isset($_POST['parent_id']) && is_numeric($_POST['parent_id']) && $_POST['parent_id'] > 0 ? (int)$_POST['parent_id'] : 0;

                $this->db->insert('comments', array('type'=>'notebook', 'message'=>$_POST['message'], 'user_id'=>$user_id, 'nickname'=>$nickname, 'create_time'=>time(), 'ip'=>$_SERVER['REMOTE_ADDR'], 'parent_id'=>$parent_id));
                exit("ok");
            } else {
                exit($_LANG['validate_code_error']);
            }
        }

        $this->tpl->assign('page_title', $_LANG['notebook']);
        $this->tpl->assign('top_position', create_position(array($_LANG['notebook'])));
        $this->display('');
    }

    public function notebookPage() {
        global $_LANG;
        $this->tpl->caching = 0;
        $this->clearLayout();
        $limit = 9;
        $total = $this->db->count('comments', "type='notebook'");
        if($total > 0) {
            if(isset($_GET['page']) && !empty($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = ceil($total / $limit);
            }
            $pages = Pagination::page($total, $page, App::url('Index/notebookPage'), $limit);

            $sql = "SELECT * FROM #@__comments WHERE type='notebook' ORDER BY id ASC";
            $list = $this->db->getLimit($sql, ($page-1)*$limit, $limit);
            $util = new Util();
            foreach($list as &$l) {
                if(!empty($l['ip'])) {
                    $area = $util->ip2area($l['ip'], 'data/iptable/tinyipdata.dat');
                    $area = trim(str_replace('-', '', $area));
                } else {
                    $area = '';
                }
                $l['say'] = sprintf($_LANG['from_area_nickname_say'], $area, $l['nickname']);
                Common::justifyImage($l['message']);
                if($l['parent_id']>0) {
                    $l['parent'] = $this->db->getRow("SELECT * FROM #@__comments WHERE id=" . (int)$l['parent_id']);
                    if(!empty($l['parent']['ip'])) {
                        $area1 = $util->ip2area($l['parent']['ip'], 'data/iptable/tinyipdata.dat');
                        $area1 = trim(str_replace('-', '', $area1));
                    } else {
                        $area1 = '';
                    }
                    $l['parent']['say'] = sprintf($_LANG['from_area_nickname_say'], $area1, $l['parent']['nickname']);
                    $l['parent']['message'] = Common::justifyImage($l['parent']['message']);
                }
            }

            $this->set(compact('list', 'pages'));
        }
        $this->display();
    }

    public function notebookReportArea() {
        $this->clearLayout();
        $this->tpl->caching = 0;
        $this->display();
    }

    public function search() {
        global $_LANG;
        $arc = & new Article();
    	$this->tpl->caching = 0;
        if(isset($_POST['keyword']) && !empty($_POST['keyword'])) {
            $keyword = trim($_POST['keyword']);
        } elseif(isset($_GET['keyword']) && !empty($_GET['keyword'])) {
            $keyword = trim($_GET['keyword']);
            $keyword = urldecode($keyword);
        } else {
            Common::setRedirect($_LANG['invalid_request'], App::url('Index'), true);
        }

        $fw = "FROM #@__article AS Article INNER JOIN #@__article_cat AS ArticleCat ON Article.cat_id=ArticleCat.cat_id WHERE Article.title LIKE '%" . Common::sql_like_quote($keyword) . "%' AND published=1 AND is_deleted=0";

        $page = isset($_GET['page']) && is_numeric($_GET['page']) && intval($_GET['page'])>0 ? intval($_GET['page']) : 1;
        $total = $this->db->getOne("SELECT COUNT(*) AS cnt " . $fw);
        $limit = 11;

        $pages = NPage::page($total, $page, App::url('Index/search?=keyword=' . urlencode($keyword)), $limit);

        $sql = "SELECT Article.article_id, Article.title, Article.update_time, Article.create_time, ArticleCat.cat_id, ArticleCat.cat_name " . $fw . " ORDER BY Article.ordering ASC, Article.create_time DESC LIMIT " . ($page-1)*$limit . ", " . $limit;

        $articles = $this->db->getAll($sql);

        foreach($articles as &$a) {
            $a['caturl'] = $arc->getCatUrl($a['cat_id']);
            $a['arturl'] = $arc->getArtUrl($a['article_id']);
        }

        $top_position = create_position(array($_LANG['search_result']));
        $this->tpl->assign('page_title', $_LANG['search_result']);
        $this->tpl->assign('top_position', $top_position);
        $this->tpl->assignByRef('articles', $articles);
        $this->tpl->assign('pages', $pages);
        $this->tpl->assign('keyword', $keyword);

        $this->display();
    }

    public function ajaxSearchArtKey() {
    	$keyword = Common::getParam('keyword');
        $table = Common::getParam('t');
        $field = Common::getParam('f');
        $condition = "AND 1=1";
        if($table == 'article') {
            $condition .= " AND published=1 AND is_deleted=0";
        }
        $result['content'] = $this->db->getAll("SELECT " . $field . " FROM " . $this->db->table($table) . " WHERE " . $field . " LIKE '%" . $keyword . "%' " . $condition);
        if(!empty($result)) {
            $result['error'] = 0;
        } else {
            $result['error'] = 1;
        }
        exit(json_encode($result));
    }

    public function tbRegister() {
        global $_LANG, $sess;
        $this->setLayout('tb_default');
    	$this->tpl->caching = false;
        $page_title = $_LANG['quick_register'];

        if(!empty($_POST)) {
            //验证码
            Common::checkArray($_POST, 'password', 'confirm_password', 'username', 'vcode');
            if(isset($_POST['enc_vcode']) && Common::vcode($_POST['enc_vcode'], $_POST['vcode'])) {
                $username = $_POST['username'];
                if($this->db->isExist('users', array('username'=>$username))) {
                    $error = $_LANG['username_exists'];
                    $_POST['username'] = '';
                } elseif ($_POST['password'] != $_POST['confirm_password']) {
                    $error = $_LANG['password_not_identity'];
                } else {
                    $this->db->insert('users', array('username'=>$username, 'password'=>Common::encrypt($_POST['password']), 'alias'=>$username, 'create_time'=>time(), 'update_time'=>time(), 'ip'=>$_SERVER['REMOTE_ADDR']));
                    $register_success = 1;
                    $page_title = $_LANG['register_success'];

                    //自动登录
                    $sess->set('user', sys_login($username, $_POST['password']));
                    $user = $sess->get('user');
                }
            } else {
                $error = $_LANG['validate_code_error'];
            }

            if(isset($error)) {
                $this->tpl->assign('_post', $_POST);
                $this->tpl->assign('error', $error);
            } elseif(isset($register_success)) {
                $this->tpl->assign('register_success', $register_success);
            }
        }

        $this->tpl->assign('page_title', $page_title);
        $this->display();
    }

    public function ajaxCheckUsername() {
    	$username = Common::getParam('username');
        if($this->db->isExist('users', array('username'=>$username))) {
            exit('bad');
        } else {
            exit("ok");
        }
    }

    public function tbLogin() {
        global $_LANG, $sess;
        $this->setLayout('tb_default');
    	$this->tpl->caching = false;
        $page_title = $_LANG['login'];

        if(!empty($_POST)) {
            //验证码
            Common::checkArray($_POST, 'password', 'username', 'vcode');
            if(isset($_POST['enc_vcode']) && Common::vcode($_POST['enc_vcode'], $_POST['vcode'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                if($this->db->isExist('users', array('username'=>$username, 'password'=>Common::encrypt($password)))) {
                    //验证成功
                    $user = sys_login($username, $_POST['password']);
                    $sess->set('user', $user);
                    $login_success = 1;
                    $page_title = $_LANG['login_success'];
                } else {
                    //验证失败
                    $error = $_LANG['login_fail'];
                }
            } else {
                $error = $_LANG['validate_code_error'];
            }

            if(isset($error)) {
                $this->tpl->assign('error', $error);
            } elseif(isset($login_success)) {
                $this->tpl->assign('login_success', $login_success);
            }
        }

        $this->tpl->assign('page_title', $page_title);
        $this->display();
    }

    public function logout() {
        global $_LANG;
    	unset($_SESSION['user']);

        if(isset($last_url) && !empty($last_url)) {
            $gourl = $last_url;
        } else {
            $gourl = App::url('Index');
        }

        Common::setRedirect($_LANG['logout_success'], $gourl);
    }

}