<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 21:54:56
         compiled from "D:\www\v30\administrator\views\system/sys_view_log_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55044d666330c59857-36391902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c79ae18e1f613190f97782e71028de496baf661' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\system/sys_view_log_page.tpl',
      1 => 1297753603,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55044d666330c59857-36391902',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\www\v30\core\Engine\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>
<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="55"><?php echo $_smarty_tpl->getVariable('lang')->value['id'];?>
</th>
		<th width="38"><?php echo $_smarty_tpl->getVariable('lang')->value['source'];?>
</th>			
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['request_file'];?>
</th>						
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['username'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['ip'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['create_time'];?>
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
		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['log_id'];?>
</td>
		<td align="center"><?php if ($_smarty_tpl->getVariable('itm')->value['is_backend']==1){?><a href="javascript:void(0)" title="<?php echo $_smarty_tpl->getVariable('lang')->value['backend_log'];?>
">B</a><?php }else{ ?><a href="javascript:void(0)" title="<?php echo $_smarty_tpl->getVariable('lang')->value['frontend_log'];?>
">F</a><?php }?></td>
		<td>[<?php echo $_smarty_tpl->getVariable('itm')->value['method'];?>
] <?php echo $_smarty_tpl->getVariable('itm')->value['query_filter'];?>
</td>			
		<td align="center"><?php echo (($tmp = @$_smarty_tpl->getVariable('itm')->value['uname'])===null||$tmp==='' ? 'visitor' : $tmp);?>
</td>
		<td align="center">[<?php echo $_smarty_tpl->getVariable('itm')->value['area'];?>
] <?php echo $_smarty_tpl->getVariable('itm')->value['ip'];?>
</td>
		<td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('itm')->value['create_datetime'],'%Y-%m-%d %H:%M');?>
</td>
	</tr>
	<?php }} ?>
</tbody>
<tfoot>
	<tr>
		<td colspan="2"><a href="<?php echo smarty_function_app_url(array('url'=>('system/sysViewLog?action=clean_log&type=').($_smarty_tpl->getVariable('type')->value)),$_smarty_tpl);?>
" onclick="ajaxGet(this.href, '<?php echo smarty_function_app_url(array('url'=>'system/sysViewLog'),$_smarty_tpl);?>
', '<?php echo $_smarty_tpl->getVariable('lang')->value['operation_success'];?>
');return(false)"><?php echo $_smarty_tpl->getVariable('lang')->value['clean_log'];?>
</a></td>
		<td colspan="5" align="right"><?php echo $_smarty_tpl->getVariable('pages')->value;?>
</td>
	</tr>
</tfoot>
</table>
<?php }else{ ?>
	<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div>
<?php }?>