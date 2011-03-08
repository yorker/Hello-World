<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 15:51:31
         compiled from "D:\www\v30\administrator\views\system/sys_admin_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:326384d660e03285f48-60245692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e97289f76f32bf81626a775c990eecf15b220bbe' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\system/sys_admin_list.tpl',
      1 => 1298091933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '326384d660e03285f48-60245692',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_admin_switcher')) include 'D:\www\v30\administrator\plugins\function.admin_switcher.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_admin_edit')) include 'D:\www\v30\administrator\plugins\function.admin_edit.php';
if (!is_callable('smarty_function_admin_delete')) include 'D:\www\v30\administrator\plugins\function.admin_delete.php';
?><table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="30"><input type="checkbox" onclick="checkAll(this, 'chkflag')" title="<?php echo $_smarty_tpl->getVariable('lang')->value['check_all_none'];?>
"/></th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['username'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['type'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['email'];?>
</th>		
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['available'];?>
</th>		
		<th width="100"><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
</th>
	</tr>
</thead>
<tbody>
	<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']++;
?>
	<tr class="row<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['iteration']%2;?>
">
		<td align="center">
			<?php if ($_smarty_tpl->getVariable('itm')->value['admin_rank']<$_smarty_tpl->getVariable('admin')->value['admin_rank']){?>
				<input type="checkbox" name="cid" value="<?php echo $_smarty_tpl->getVariable('itm')->value['admin_id'];?>
" class="chkflag"/>
			<?php }else{ ?>
				<label title="<?php echo $_smarty_tpl->getVariable('lang')->value['no_privilege'];?>
">-</label>
			<?php }?>
		</td>
		<td><?php echo $_smarty_tpl->getVariable('itm')->value['admin_name'];?>
</td>
		<td align="center"><?php if ($_smarty_tpl->getVariable('itm')->value['admin_rank']==1){?><span class="grey"><?php echo $_smarty_tpl->getVariable('lang')->value['general_admin'];?>
</span><?php }elseif($_smarty_tpl->getVariable('itm')->value['admin_rank']==2){?><?php echo $_smarty_tpl->getVariable('lang')->value['advance_admin'];?>
<?php }else{ ?><strong><?php echo $_smarty_tpl->getVariable('lang')->value['super_admin'];?>
</strong><?php }?></td>
		<td><?php echo $_smarty_tpl->getVariable('itm')->value['email'];?>
</td>
		<td align="center">
			<?php if ($_smarty_tpl->getVariable('itm')->value['admin_rank']<$_smarty_tpl->getVariable('admin')->value['admin_rank']){?>
				<?php echo smarty_function_admin_switcher(array('t'=>"sys_admin",'f'=>'is_available','id'=>$_smarty_tpl->getVariable('itm')->value['admin_id'],'value'=>$_smarty_tpl->getVariable('itm')->value['is_available']),$_smarty_tpl);?>
</td>
			<?php }else{ ?>
				<label title="<?php echo $_smarty_tpl->getVariable('lang')->value['no_privilege'];?>
">---</label>
			<?php }?>
		<td align="center">
			<?php if ($_smarty_tpl->getVariable('itm')->value['admin_rank']<$_smarty_tpl->getVariable('admin')->value['admin_rank']){?>
				<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url("system/sysWriteAdmin"),'id'=>$_smarty_tpl->getVariable('itm')->value['admin_id']),$_smarty_tpl);?>

				<?php echo smarty_function_admin_delete(array('t'=>"sys_admin",'id'=>$_smarty_tpl->getVariable('itm')->value['admin_id'],'url'=>$_smarty_tpl->getVariable('here')->value),$_smarty_tpl);?>

			<?php }else{ ?>
				<label title="<?php echo $_smarty_tpl->getVariable('lang')->value['no_privilege'];?>
">---</label>
			<?php }?>
		</td>
	</tr>
	<?php }} ?>
</tbody>
<tfoot>
	<tr>
		<td colspan="8">
			<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['batch_delete'];?>
" class="btn" onclick="batchDeleteByCheckbox('sys_admin', 'chkflag', '<?php echo $_smarty_tpl->getVariable('here')->value;?>
')"/>
		</td>
	</tr>
</tfoot>
</table>