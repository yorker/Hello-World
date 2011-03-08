<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 16:44:13
         compiled from "D:\www\v30\administrator\views\system/sys_admin_modify_password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181304d661a5d22f4c9-39115478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0e7fe851765ac995ac96d8be2650246281af99a' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\system/sys_admin_modify_password.tpl',
      1 => 1298092008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181304d661a5d22f4c9-39115478',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
?><form action="<?php echo smarty_function_app_url(array('url'=>'system/sysAdminModifyPassword'),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php echo smarty_function_app_url(array('url'=>'system/sysStart'),$_smarty_tpl);?>
')">
<div class="adminform">
	<div class="f_title"><?php echo $_smarty_tpl->getVariable('lang')->value['modify_password'];?>
</div>
	
	<?php echo smarty_function_text(array('type'=>"password",'name'=>"old_password",'value'=>'','label'=>$_smarty_tpl->getVariable('lang')->value['old_password']),$_smarty_tpl);?>

	
	<?php echo smarty_function_text(array('type'=>"password",'name'=>"new_password",'value'=>'','label'=>$_smarty_tpl->getVariable('lang')->value['new_password']),$_smarty_tpl);?>

	
	<?php echo smarty_function_text(array('type'=>"password",'name'=>"confirm_password",'value'=>'','label'=>$_smarty_tpl->getVariable('lang')->value['confirm_password']),$_smarty_tpl);?>

	
	<?php echo smarty_function_submit(array('name'=>"submit",'value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

</div>
</form>