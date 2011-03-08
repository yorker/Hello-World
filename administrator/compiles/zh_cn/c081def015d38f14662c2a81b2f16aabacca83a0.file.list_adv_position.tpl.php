<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 16:44:06
         compiled from "D:\www\v30\administrator\views\advertisement/list_adv_position.tpl" */ ?>
<?php /*%%SmartyHeaderCode:239014d661a56c6e4a8-34889659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c081def015d38f14662c2a81b2f16aabacca83a0' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\advertisement/list_adv_position.tpl',
      1 => 1298098852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '239014d661a56c6e4a8-34889659',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_pcat')) include 'D:\www\v30\administrator\plugins\modifier.pcat.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_load_page')) include 'D:\www\v30\administrator\plugins\function.load_page.php';
if (!is_callable('smarty_function_admin_edit')) include 'D:\www\v30\administrator\plugins\function.admin_edit.php';
if (!is_callable('smarty_function_admin_delete')) include 'D:\www\v30\administrator\plugins\function.admin_delete.php';
?><table cellspacing="1" class="adminlist">
<thead>
	<tr>
		<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['id'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['name'];?>
</th>
		<th width="50"><?php echo $_smarty_tpl->getVariable('lang')->value['width'];?>
</th>
		<th width="50"><?php echo $_smarty_tpl->getVariable('lang')->value['height'];?>
</th>
		<th width="60"><?php echo $_smarty_tpl->getVariable('lang')->value['ads_number'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['description'];?>
</th>
		<th width="60"><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
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
		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['pos_id'];?>
</td>
		<td><?php if ($_smarty_tpl->getVariable('itm')->value['ads_num']>0){?><?php echo smarty_function_load_page(array('link'=>$_smarty_tpl->getVariable('itm')->value['pos_name'],'href'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('itm')->value['pos_id'],"advertisement/listAdv?pos_id="))),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('itm')->value['pos_name'];?>
<?php }?></td>
		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['img_width'];?>
px</td>
		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['img_height'];?>
px</td>
		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['ads_num'];?>
</td>
		<td><?php echo (($tmp = @$_smarty_tpl->getVariable('itm')->value['description'])===null||$tmp==='' ? '&nbsp;' : $tmp);?>
</td>
		<td align="center">
			<?php echo smarty_function_admin_edit(array('id'=>$_smarty_tpl->getVariable('itm')->value['pos_id'],'href'=>smarty_modifier_app_url("advertisement/writeAdvPosition")),$_smarty_tpl);?>

			<?php if ($_smarty_tpl->getVariable('itm')->value['ads_num']==0){?>
				<?php echo smarty_function_admin_delete(array('id'=>$_smarty_tpl->getVariable('itm')->value['pos_id'],'url'=>smarty_modifier_app_url("advertisement/listAdvPosition"),'t'=>"ad_position"),$_smarty_tpl);?>

			<?php }?>
		</td>
	</tr>
	<?php }} ?>
</tbody>
</table>