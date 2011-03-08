<?php

$top_menu = array();

$menuIndex = 0;

//开始页
$top_menu[$menuIndex]['name'] = $_LANG['page_start'];
$top_menu[$menuIndex]['url'] = App::url('system/sysStart');
$top_menu[$menuIndex]['rank'] = 1;
$menuIndex++;

//内容管理
$top_menu[$menuIndex]['name'] = $_LANG['content_manage'];
$top_menu[$menuIndex]['url'] = '';
$top_menu[$menuIndex]['rank'] = 1;
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['article_manage'], 'url'=>App::url('article/listArticle'));
$top_menu[$menuIndex]['sub'][] =array('name'=>$_LANG['article_cat_manage'], 'url'=>App::url('article/listCategory'));

$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['c_picture_manage'], 'url'=>App::url('picture/listPicture'));
$top_menu[$menuIndex]['sub'][] =array('name'=>$_LANG['c_picture_cat_manage'], 'url'=>App::url('common/listNormalCategory?type=2'));

$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['download_management'], 'url'=>App::url('download/listDownload'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['download_cat_management'], 'url'=>App::url('common/listNormalCategory?type=1'));

$menuIndex++;


//产品管理
$top_menu[$menuIndex]['name'] = $_LANG['product_management'];
$top_menu[$menuIndex]['url'] = '';
$top_menu[$menuIndex]['rank'] = 1;
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['product_list'], 'url'=>App::url('product/listProduct'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['add_product'], 'url'=>App::url('product/writeProduct'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['product_cat_list'], 'url'=>App::url('product/listProductCat'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['product_brand'], 'url'=>App::url('product/listBrand'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['product_model'], 'url'=>App::url('product/model?act=list_model'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['trash'], 'url'=>App::url('product/listProductTrash'));

$menuIndex++;


//组件管理
$top_menu[$menuIndex]['name'] = $_LANG['component_management'];
$top_menu[$menuIndex]['url'] = '';
$top_menu[$menuIndex]['rank'] = 1;
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['friend_link_management'], 'url'=>App::url('friendlink/listing'));


$menuIndex++;

//广告管理
$top_menu[$menuIndex]['name'] = $_LANG['ads_management'];
$top_menu[$menuIndex]['url'] = '';
$top_menu[$menuIndex]['rank'] = 1;
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['flash_ads_management'], 'url'=>App::url('advertisement/listFlashAds'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['adv_position'], 'url'=>App::url('advertisement/listAdvPosition'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['adv_list'], 'url'=>App::url('advertisement/listAdv'));


$menuIndex++;

//管理员
$top_menu[$menuIndex]['name'] = $_LANG['admin'];
$top_menu[$menuIndex]['url'] = '';
$top_menu[$menuIndex]['rank'] = 1;
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['admin_list'], 'url'=>App::url('system/sysAdminList'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['modify_password'], 'url'=>App::url('system/sysAdminModifyPassword'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['notepad'], 'url'=>App::url('system/sysNotepad'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['data_backup'], 'url'=>App::url('system/sysBackup'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['view_log'], 'url'=>App::url('system/sysViewLog'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['flow_statistics'], 'url'=>App::url('system/sysFlowStatistics'));
$menuIndex++;


//开发组
$top_menu[$menuIndex]['name'] = $_LANG['develop_group'];
$top_menu[$menuIndex]['url'] = '';
$top_menu[$menuIndex]['rank'] = 3;  //超级管理员可用
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['config_manage'], 'url'=>App::url('system/configuration?act=config_list'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['config_add_param'], 'url'=>App::url('system/configuration?act=write_config'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['config_cat_manage'], 'url'=>App::url('system/configuration?act=cat_list'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['config_add_cat'], 'url'=>App::url('system/configuration?act=write_cat'));
$top_menu[$menuIndex]['sub'][] = array('name'=>$_LANG['international'], 'url'=>App::url('system/configuration?act=international'));

$menuIndex++;


/*
$top_menu[] = array(
            'name'=>'个人中心',
            'url'=>'',
            'sub'=>array(
                    array('name'=>'首页', 'url'=>''),
                    array('name'=>'意见箱', 'url'=>''),
                    array('name'=>'数据导出', 'url'=>''),
                    array('name'=>'密码修改', 'url'=>'')
                )
           );

$top_menu[] = array(
            'name'=>'个人中心',
            'url'=>'',
            'sub'=>array(
                    array('name'=>'首页',
                        'url'=>'',
                        'sub'=>array(
                            array('name'=>'按收录时间', 'url'=>''),
                            array('name'=>'按收录时间', 'url'=>''),
                            array('name'=>'按收录时间', 'url'=>'')
                        )
                    ),
                    array('name'=>'意见箱', 'url'=>''),
                    array('name'=>'数据导出', 'url'=>''),
                    array('name'=>'密码修改', 'url'=>'')
                )
           );
*/
?>