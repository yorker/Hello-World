<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 16:44:31
         compiled from "D:\www\v30\administrator\views\system/sys_backup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:292734d661a6f0077e2-70907433%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9f3e39ad481b94e55705f3f4c879eeded3c2be5' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\system/sys_backup.tpl',
      1 => 1298092075,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '292734d661a6f0077e2-70907433',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
?><script type="text/javascript">
function data_backup(obj) {
	ajaxGet('<?php echo smarty_function_app_url(array('url'=>'system/sysDataBackup'),$_smarty_tpl);?>
', '<?php echo smarty_function_app_url(array('url'=>'system/sysBackup'),$_smarty_tpl);?>
', '<?php echo $_smarty_tpl->getVariable('lang')->value['operation_success'];?>
');
	obj.value = '<?php echo $_smarty_tpl->getVariable('lang')->value['please_waiting'];?>
';
	obj.disabled = '1';
}
</script>

<div class="sub_title"><?php echo $_smarty_tpl->getVariable('lang')->value['already_backup_file_list'];?>
</div>

<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="15"><input type="checkbox" name="ck" value="" onclick="checkAll(this, 'chkflag')"/></th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['file'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['filesize'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['create_time'];?>
</th>
		<th width="100"><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
</th>
	</tr>
</thead>

<tbody>
	<?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>
		<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["itm"]->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
 $_smarty_tpl->tpl_vars["itm"]->index++;
 $_smarty_tpl->tpl_vars["itm"]->first = $_smarty_tpl->tpl_vars["itm"]->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['first'] = $_smarty_tpl->tpl_vars["itm"]->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']++;
?>
			<tr class="row<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['iteration']%2;?>
">
				<td align="center"><input type="checkbox" name="cid" value="<?php echo $_smarty_tpl->getVariable('itm')->value['time'];?>
" class="chkflag"/></td>
				<td align="center">
					<?php echo $_smarty_tpl->getVariable('itm')->value['name'];?>

					<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['first']){?> 
						&nbsp;<span class="red">(The Lastest)</span>
					<?php }?>
				</td>
				<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['filesize'];?>
</td>
				<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['datetime'];?>
</td>
				<td align="center"><a href="<?php echo smarty_function_app_url(array('url'=>('system/sysBackup?action=download&id=').($_smarty_tpl->getVariable('itm')->value['time'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['download'];?>
</a></td>
			</tr>			
		<?php }} ?>
	<?php }else{ ?>
		<tr class="row0">
			<td align="center" colspan="5"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</td>
		</tr>
	<?php }?>
</tbody>

<tfoot>
	<tr>
		<td colspan="2">
			<input type="button" name="del" value="<?php echo $_smarty_tpl->getVariable('lang')->value['delete'];?>
" onclick="del_data_backup('chkflag', '<?php echo smarty_function_app_url(array('url'=>'system/sysBackup'),$_smarty_tpl);?>
')" class="btn"/>
		</td>
		<td align="right" colspan="3">
			<input type="button" name="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['data_backup'];?>
" class="btn" onclick="data_backup(this)"/>
		</td>
	</tr>
</tfoot>

</table>