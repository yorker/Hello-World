<?php /* Smarty version 2.6.26, created on 2011-02-21 20:45:54
         compiled from header.inc.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'header.inc.html', 5, false),array('insert', 'userinfo', 'header.inc.html', 43, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="<?php echo ((is_array($_tmp=@$this->_tpl_vars['seo_description'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['lang']['site_description']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['lang']['site_description'])); ?>
" name="description" />
<meta content="<?php echo ((is_array($_tmp=@$this->_tpl_vars['seo_keywords'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['lang']['site_keyword']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['lang']['site_keyword'])); ?>
" name="keywords"/>
<meta content="<?php echo $this->_tpl_vars['lang']['site_name']; ?>
" name="author"/>
<meta content="<?php echo $this->_tpl_vars['lang']['copyright']; ?>
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

<title><?php echo $this->_tpl_vars['page_title']; ?>
<?php echo $this->_tpl_vars['lang']['page_title_postfix']; ?>
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
				<li><a href="<?php echo $this->_tpl_vars['nav_index_link']; ?>
"><?php echo $this->_tpl_vars['lang']['index']; ?>
</a></li>
				<li><a href="<?php echo $this->_tpl_vars['nav_art_link']; ?>
"><?php echo $this->_tpl_vars['lang']['article']; ?>
</a></li>	
				<li><a href="<?php echo $this->_tpl_vars['nav_ablumlist_link']; ?>
"><?php echo $this->_tpl_vars['lang']['ablum']; ?>
</a></li>	
				<li><a href="<?php echo $this->_tpl_vars['nav_download_link']; ?>
"><?php echo $this->_tpl_vars['lang']['download']; ?>
</a></li>
				<li><a href="<?php echo $this->_tpl_vars['nav_notebook_link']; ?>
"><?php echo $this->_tpl_vars['lang']['leaveword']; ?>
</a></li>
				<li>&nbsp;</li>
			</ul>
			<div class="userinfo clearfix">
				<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'userinfo')), $this); ?>

			</div>
		</div>
    </div></div></div>
    
    <div id="content">