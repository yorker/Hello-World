<?php /* Smarty version Smarty-3.0.7, created on 2011-03-01 23:33:55
         compiled from "templates\layout/tb_default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19234d6d11e363a641-82068468%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59d8b388ce2c7558672ff6f4b916f70e55df647a' => 
    array (
      0 => 'templates\\layout/tb_default.tpl',
      1 => 1298993592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19234d6d11e363a641-82068468',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo @ROOT_URL;?>
" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/common.css" rel="stylesheet" type="text/css"/>
<link href="css/tb_style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/base.js"></script>
<script type="text/javascript" src="js/site.js"></script>

<title><?php echo $_smarty_tpl->getVariable('page_title')->value;?>
</title>
</head>
<body>
<div id="container">
	<div id="header">
		>> <?php echo $_smarty_tpl->getVariable('page_title')->value;?>

	</div>
	<div id="content">
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('main_tpl_identified')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
	<div id="footer">
	</div>
</div>
</body>
</html>