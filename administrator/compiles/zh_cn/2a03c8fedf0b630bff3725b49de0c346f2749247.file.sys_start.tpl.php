<?php /* Smarty version Smarty-3.0.7, created on 2011-02-26 13:35:55
         compiled from "D:\www\v30\administrator\views\system/sys_start.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143034d68913b5ac0e8-16468182%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a03c8fedf0b630bff3725b49de0c346f2749247' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\system/sys_start.tpl',
      1 => 1298114075,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143034d68913b5ac0e8-16468182',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_load_page')) include 'D:\www\v30\administrator\plugins\function.load_page.php';
?><div class="startpage">
	<div class="module">
		<h2><?php echo $_smarty_tpl->getVariable('lang')->value['shortcut'];?>
</h2>
		<div class="body">
			<ul class="shortcut clearfix">
				<li><?php echo smarty_function_load_page(array('link'=>$_smarty_tpl->getVariable('lang')->value['article_manage'],'href'=>smarty_modifier_app_url("article/listArticle")),$_smarty_tpl);?>
</li>
				<li><?php echo smarty_function_load_page(array('link'=>$_smarty_tpl->getVariable('lang')->value['product_management'],'href'=>smarty_modifier_app_url("product/listProduct")),$_smarty_tpl);?>
</li>
				<li><?php echo smarty_function_load_page(array('link'=>$_smarty_tpl->getVariable('lang')->value['c_picture_manage'],'href'=>smarty_modifier_app_url("picture/listPicture")),$_smarty_tpl);?>
</li>
				<li><?php echo smarty_function_load_page(array('link'=>$_smarty_tpl->getVariable('lang')->value['download_management'],'href'=>smarty_modifier_app_url("download/listDownload")),$_smarty_tpl);?>
</li>
				<li><?php echo smarty_function_load_page(array('href'=>smarty_modifier_app_url("system/setConfiguration"),'link'=>$_smarty_tpl->getVariable('lang')->value['sys_config']),$_smarty_tpl);?>
</li>
			</ul>
		</div>
	</div>
	<div class="blank">&nbsp;</div>
	<div class="blank">&nbsp;</div>
	<div class="module">
		<h2><?php echo $_smarty_tpl->getVariable('lang')->value['system_check'];?>
</h2>
		<div class="body">
			<table class="system_check" cellspacing="0" cellpadding="0" border="0">
				<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sysinfo')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
				<tr>
					<td width="45%"><?php echo $_smarty_tpl->getVariable('itm')->value['key'];?>
</td>					
					<td><?php echo $_smarty_tpl->getVariable('itm')->value['value'];?>
</td>
				</tr>
				<?php }} ?>
				<tr>
					<td><a href="javascript:void(0)" onclick="cal_project_size('cal_result')"><?php echo $_smarty_tpl->getVariable('lang')->value['cal_project_size'];?>
</a></td>
					<td id="cal_result">-</td>
				</tr>
			</table>
		</div>
	</div>
</div>