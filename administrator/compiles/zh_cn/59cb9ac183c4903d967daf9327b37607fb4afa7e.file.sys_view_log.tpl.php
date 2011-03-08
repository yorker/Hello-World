<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 21:54:44
         compiled from "D:\www\v30\administrator\views\system/sys_view_log.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87074d6663246d4fb0-33829508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59cb9ac183c4903d967daf9327b37607fb4afa7e' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\system/sys_view_log.tpl',
      1 => 1298555660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87074d6663246d4fb0-33829508',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
?><div class="op_bar">
	<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['backend_log'];?>
" class="btn" onclick="pagination('<?php echo smarty_function_app_url(array('url'=>'system/sysViewLogPage?show=backend'),$_smarty_tpl);?>
')"/>&nbsp;
	<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['frontend_log'];?>
" class="btn" onclick="pagination('<?php echo smarty_function_app_url(array('url'=>'system/sysViewLogPage?show=frontend'),$_smarty_tpl);?>
')"/>&nbsp;
	<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['ip_log'];?>
" class="btn" onclick="pagination('<?php echo smarty_function_app_url(array('url'=>'system/sysViewIpLogPage'),$_smarty_tpl);?>
')"/>&nbsp;	
</div>

<div id="pagination_show"></div>