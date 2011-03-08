<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 14:01:07
         compiled from "D:\www\v30\administrator\views\advertisement/list_adv.tpl" */ ?>
<?php /*%%SmartyHeaderCode:319774d65f4233a03c6-38647367%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22352f4ec55c94503e340f772594fa688e73a856' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\advertisement/list_adv.tpl',
      1 => 1298527258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '319774d65f4233a03c6-38647367',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_pcat')) include 'D:\www\v30\administrator\plugins\modifier.pcat.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_admin_edit')) include 'D:\www\v30\administrator\plugins\function.admin_edit.php';
if (!is_callable('smarty_function_admin_delete')) include 'D:\www\v30\administrator\plugins\function.admin_delete.php';
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>
<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="35"><?php echo $_smarty_tpl->getVariable('lang')->value['id'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['title'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['adv_position'];?>
</th>		
		<th width="90"><?php echo $_smarty_tpl->getVariable('lang')->value['start_time'];?>
</th>
		<th width="90"><?php echo $_smarty_tpl->getVariable('lang')->value['end_time'];?>
</th>
		<th width="75"><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
</th>
	</tr>
</thead>
<tbody>
	<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
	<tr class="row<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['iteraction']%2;?>
">
		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
</td>
		<td><a href="javascript:void(0)" onmouseover="showImg('<?php echo @UPLOAD_URL;?>
<?php echo $_smarty_tpl->getVariable('itm')->value['image'];?>
', '222')" onmouseout="nd()"><?php echo $_smarty_tpl->getVariable('itm')->value['title'];?>
</a></td>
		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['position'];?>
</td>
		<td align="center"><?php echo (($tmp = @$_smarty_tpl->getVariable('itm')->value['start_time'])===null||$tmp==='' ? -1 : $tmp);?>
</td>
		<td align="center"><?php echo (($tmp = @$_smarty_tpl->getVariable('itm')->value['end_time'])===null||$tmp==='' ? -1 : $tmp);?>
</td>
		<td align="center">
			<?php if ($_smarty_tpl->getVariable('pos_id')->value>''){?>
				<?php echo smarty_function_admin_edit(array('id'=>$_smarty_tpl->getVariable('itm')->value['id'],'href'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('pos_id')->value,"advertisement/writeAdv?pos_id="))),$_smarty_tpl);?>

			<?php }else{ ?>
				<?php echo smarty_function_admin_edit(array('id'=>$_smarty_tpl->getVariable('itm')->value['id'],'href'=>smarty_modifier_app_url("advertisement/writeAdv")),$_smarty_tpl);?>

			<?php }?>
			<?php echo smarty_function_admin_delete(array('id'=>$_smarty_tpl->getVariable('itm')->value['id'],'t'=>"ads",'href'=>smarty_modifier_app_url("advertisement/listAdv"),'image'=>"image"),$_smarty_tpl);?>

		</td>
	</tr>
	<?php }} ?>
</tbody>
</table>
<?php }else{ ?>
	<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div>
<?php }?>