<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 16:44:36
         compiled from "D:\www\v30\administrator\views\system/sys_view_ip_log_loading.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17914d661a745b27b9-54870681%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57716952e49a8901d2397ab0db829e5df8c087e3' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\system/sys_view_ip_log_loading.tpl',
      1 => 1297753509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17914d661a745b27b9-54870681',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>
	<table class="adminlist" cellspacing="1">
	<thead>
		<tr>
			<th width="55"><?php echo $_smarty_tpl->getVariable('lang')->value['id'];?>
</th>
			<th><?php echo $_smarty_tpl->getVariable('lang')->value['ip'];?>
</th>
			<th><?php echo $_smarty_tpl->getVariable('lang')->value['access_count'];?>
</th>
			<th><?php echo $_smarty_tpl->getVariable('lang')->value['belong_area'];?>
</th>
			<th><?php echo $_smarty_tpl->getVariable('lang')->value['create_time'];?>
</th>
			<th><?php echo $_smarty_tpl->getVariable('lang')->value['update_time'];?>
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
			<td align="center"><?php echo (($tmp = @$_smarty_tpl->getVariable('itm')->value['ip'])===null||$tmp==='' ? '&nbsp;' : $tmp);?>
</td>
			<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['num'];?>
</td>
			<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['area'];?>
</td>
			<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['create_datetime'];?>
</td>
			<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['update_datetime'];?>
</td>
		</tr>
		<?php }} ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="2"><a href="<?php echo smarty_function_app_url(array('url'=>'system/sysViewLog?action=clean_ip_log'),$_smarty_tpl);?>
" onclick="ajaxGet(this.href, '<?php echo smarty_function_app_url(array('url'=>'system/sysViewLog'),$_smarty_tpl);?>
', '<?php echo $_smarty_tpl->getVariable('lang')->value['operation_success'];?>
');return(false)"><?php echo $_smarty_tpl->getVariable('lang')->value['clean_log'];?>
</a></td>
			<td colspan="4" align="right"><?php echo $_smarty_tpl->getVariable('pages')->value;?>
</td>
		</tr>
	</tfoot>
	</table>
<?php }else{ ?>
	<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div>
<?php }?>