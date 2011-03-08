<?php

$tpl->assign('nav_index_link', App::url('Index'));
$tpl->assign('nav_art_link', $arc->getCatUrl(19));
$tpl->assign('nav_download_link', App::url('Index/dlist'));
$tpl->assign('nav_ablumlist_link', App::url('Index/ablumlist'));
$tpl->assign('nav_notebook_link', App::url('Index/notebook'));
$tpl->assign('user_cats', $arc->getCategories(19));

$tpl->assign('download_cat', $download->getCategories('cat_id, name'));