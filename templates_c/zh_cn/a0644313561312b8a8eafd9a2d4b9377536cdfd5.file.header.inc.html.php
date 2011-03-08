<?php /* Smarty version Smarty-3.0.7, created on 2011-02-22 21:36:27
         compiled from "templates\header.inc.html" */ ?>
<?php /*%%SmartyHeaderCode:64314d63bbdb326555-03019902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0644313561312b8a8eafd9a2d4b9377536cdfd5' => 
    array (
      0 => 'templates\\header.inc.html',
      1 => 1298380182,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64314d63bbdb326555-03019902',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_insert_userinfo')) include 'D:/www/v40/plugins\insert.userinfo.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="<?php echo (($tmp = @$_smarty_tpl->getVariable('seo_description')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('lang')->value['site_description'] : $tmp);?>
" name="description" />
<meta content="<?php echo (($tmp = @$_smarty_tpl->getVariable('seo_keywords')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('lang')->value['site_keyword'] : $tmp);?>
" name="keywords"/>
<meta content="<?php echo $_smarty_tpl->getVariable('lang')->value['site_name'];?>
" name="author"/>
<meta content="<?php echo $_smarty_tpl->getVariable('lang')->value['copyright'];?>
" name="copyright"/>
<meta name="robots" content="index,follow"/>
<link href="css/common.css" rel="stylesheet" type="text/css"/>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="css/thickbox.css" type="text/css" rel="stylesheet"/>
<link href="css/pagination.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/config.js"></script>
<script type="text/javascript" src="js/base.js"></script>
<script type="text/javascript" src="js/site.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>

<title><?php echo $_smarty_tpl->getVariable('page_title')->value;?>
<?php echo $_smarty_tpl->getVariable('lang')->value['page_title_postfix'];?>
</title>
</head>
<body>
<div id="container">
    <div id="header"><div class="level1"><div class="level2">		
		<div class="head clearfix">
			<div class="fl">&nbsp;</div>
			<div class="fr">
				<div class="cnt">一个人的悲剧不在于他输了，而是他差点就成功了。</div>
				<div class="author">-- 肯尼斯·克里斯汀</div>
			</div>
		</div>
		<div class="menu clearfix">
			<ul class="clearfix">
				<li class="start">&nbsp;</li>
				<li><a href="<?php echo $_smarty_tpl->getVariable('nav_index_link')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['index'];?>
</a></li>
				<li><a href="<?php echo $_smarty_tpl->getVariable('nav_art_link')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['article'];?>
</a></li>	
				<li><a href="<?php echo $_smarty_tpl->getVariable('nav_ablumlist_link')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['ablum'];?>
</a></li>	
				<li><a href="<?php echo $_smarty_tpl->getVariable('nav_download_link')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['download'];?>
</a></li>
				<li><a href="<?php echo $_smarty_tpl->getVariable('nav_notebook_link')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['leaveword'];?>
</a></li>
				<li>&nbsp;</li>
			</ul>
			<div class="userinfo clearfix">
				<?php echo smarty_insert_userinfo(array(),$_smarty_tpl);?>

			</div>
		</div>
    </div></div></div>
    
    <div id="content">