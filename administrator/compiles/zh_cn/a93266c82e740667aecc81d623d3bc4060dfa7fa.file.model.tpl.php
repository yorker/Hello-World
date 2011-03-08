<?php /* Smarty version Smarty-3.0.7, created on 2011-02-28 10:11:30
         compiled from "D:\www\v30\administrator\views\product/model.tpl" */ ?>
<?php /*%%SmartyHeaderCode:300494d6b04529d2529-14489927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a93266c82e740667aecc81d623d3bc4060dfa7fa' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\product/model.tpl',
      1 => 1298859080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '300494d6b04529d2529-14489927',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_select')) include 'D:\www\v30\administrator\plugins\function.select.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
if (!is_callable('smarty_function_admin_switcher')) include 'D:\www\v30\administrator\plugins\function.admin_switcher.php';
if (!is_callable('smarty_function_admin_edit')) include 'D:\www\v30\administrator\plugins\function.admin_edit.php';
if (!is_callable('smarty_function_admin_delete')) include 'D:\www\v30\administrator\plugins\function.admin_delete.php';
if (!is_callable('smarty_modifier_pcat')) include 'D:\www\v30\administrator\plugins\modifier.pcat.php';
if (!is_callable('smarty_function_radio')) include 'D:\www\v30\administrator\plugins\function.radio.php';
if (!is_callable('smarty_modifier_escape')) include 'D:\www\v30\core\Engine\plugins\modifier.escape.php';
?><?php if ($_smarty_tpl->getVariable('action')->value=='write_model'){?>
	<form action="<?php echo smarty_function_app_url(array('url'=>'product/model?act=write_model'),$_smarty_tpl);?>
" onsubmit="return ajaxDoSubmit(this, '<?php echo smarty_function_app_url(array('url'=>'product/model?act=list_model'),$_smarty_tpl);?>
')" method="post">
	<div class="adminform">
		<div class="f_title"><?php echo $_smarty_tpl->getVariable('head_top')->value['title'];?>
</div>
		<?php echo smarty_function_text(array('name'=>"wrt_mod_name",'required'=>"true",'label'=>$_smarty_tpl->getVariable('lang')->value['name'],'value'=>$_smarty_tpl->getVariable('edit')->value['mod_name'],'attr'=>"autocomplete=off"),$_smarty_tpl);?>

		<?php echo smarty_function_select(array('name'=>"wrt_available",'value'=>$_smarty_tpl->getVariable('available')->value,'selected'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['available'])===null||$tmp==='' ? '1' : $tmp),'label'=>$_smarty_tpl->getVariable('lang')->value['available']),$_smarty_tpl);?>

		<?php if ($_smarty_tpl->getVariable('edit')->value['mod_id']>0){?><input type="hidden" name="wrt_id" value="<?php echo $_smarty_tpl->getVariable('edit')->value['mod_id'];?>
"/><?php }?>
		<?php echo smarty_function_submit(array('value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

	</div>
	</form>

<?php }elseif($_smarty_tpl->getVariable('action')->value=='list_model'){?>
	<div class="comment">
		<span class="blue"><?php echo $_smarty_tpl->getVariable('lang')->value['importance_tip'];?>
</span><?php echo $_smarty_tpl->getVariable('lang')->value['delete_model_tip'];?>

	</div>
	<table class="adminlist" cellspacing="1">
	<thead>
		<tr>
			<th width="55"><input type="checkbox" onclick="checkAll(this, 'chkclass')" /></th>
			<th><?php echo $_smarty_tpl->getVariable('lang')->value['name'];?>
</th>
			<th width="100"><?php echo $_smarty_tpl->getVariable('lang')->value['attr_num'];?>
</th>
			<th width="60"><?php echo $_smarty_tpl->getVariable('lang')->value['available'];?>
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
			<td align="center"><input type="checkbox" name="cids" value="<?php echo $_smarty_tpl->getVariable('itm')->value['mod_id'];?>
" class="chkclass"/></td>
			<td>
				<div class="clearfix">
					<div class="fl"><a href="<?php echo smarty_function_app_url(array('url'=>('product/model?act=list_attr&mod_id=').($_smarty_tpl->getVariable('itm')->value['mod_id'])),$_smarty_tpl);?>
" onclick="loadPage(this.href, 1);return false;"><?php echo $_smarty_tpl->getVariable('itm')->value['mod_name'];?>
</a></div>
					<div class="fr"><a href="<?php echo smarty_function_app_url(array('url'=>('product/model?act=list_attr&mod_id=').($_smarty_tpl->getVariable('itm')->value['mod_id'])),$_smarty_tpl);?>
" onclick="loadPage(this.href, 1);return false;">[<?php echo $_smarty_tpl->getVariable('lang')->value['attr_list'];?>
]</a></div>
				</div>
			</td>
			<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['attr_num'];?>
</td>
			<td align="center"><?php echo smarty_function_admin_switcher(array('t'=>"product_model",'f'=>"available",'value'=>$_smarty_tpl->getVariable('itm')->value['available'],'id'=>$_smarty_tpl->getVariable('itm')->value['mod_id']),$_smarty_tpl);?>
</td>
			<td align="center">
				<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url("product/model?act=write_model"),'id'=>$_smarty_tpl->getVariable('itm')->value['mod_id']),$_smarty_tpl);?>

				<?php echo smarty_function_admin_delete(array('t'=>"product_model",'id'=>$_smarty_tpl->getVariable('itm')->value['mod_id'],'url'=>smarty_modifier_app_url("product/model?act=list_model"),'req_url'=>smarty_modifier_app_url("product/ajaxDeleteModel")),$_smarty_tpl);?>

			</td>
		</tr>
		<?php }} ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="5"><input type="button" class="btn" value="<?php echo $_smarty_tpl->getVariable('lang')->value['batch_delete'];?>
" onclick="batchDeleteByCheckbox('product_model','chkclass', '<?php echo smarty_function_app_url(array('url'=>'product/model?act=list_model'),$_smarty_tpl);?>
', '', '', '<?php echo smarty_function_app_url(array('url'=>'product/ajaxDeleteModel'),$_smarty_tpl);?>
')"/></td>
		</tr>
	</tfoot>
	</table>
	
<?php }elseif($_smarty_tpl->getVariable('action')->value=='list_attr'){?>
	<div class="op_bar clearfix">
		<div class="fr"><a href="javascript:openAjaxWin('<?php echo smarty_function_app_url(array('url'=>'product/ajaxManageAttributeLabel'),$_smarty_tpl);?>
', 500, 300)"><?php echo $_smarty_tpl->getVariable('lang')->value['manage_attribute_label'];?>
</a></div>
	</div>
	<?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>		
		<table class="adminlist" cellspacing="1">
		<thead>
			<tr>
				<th width="55"><input type="checkbox" onclick="checkAll(this, 'chkclass')"/></th>
				<th><?php echo $_smarty_tpl->getVariable('lang')->value['name'];?>
</th>
				<th width="70"><?php echo $_smarty_tpl->getVariable('lang')->value['type'];?>
</th>
				<th><?php echo $_smarty_tpl->getVariable('lang')->value['option_value'];?>
</th>
				<th><?php echo $_smarty_tpl->getVariable('lang')->value['belong_label'];?>
</th>
				<th width="55"><?php echo $_smarty_tpl->getVariable('lang')->value['available'];?>
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
				<td align="center"><input type="checkbox" name="cids" value="<?php echo $_smarty_tpl->getVariable('itm')->value['attr_id'];?>
" class="chkclass"/></td>
				<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['attr_name'];?>
</td>
				<td align="center"><?php if ($_smarty_tpl->getVariable('itm')->value['attr_type']=='text'){?><?php echo $_smarty_tpl->getVariable('lang')->value['text'];?>
<?php }elseif($_smarty_tpl->getVariable('itm')->value['attr_type']=='radio'){?><?php echo $_smarty_tpl->getVariable('lang')->value['radio'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('lang')->value['checkbox'];?>
<?php }?></td>
				<td align="center"><?php if ($_smarty_tpl->getVariable('itm')->value['attr_type']!='text'){?><?php echo (($tmp = @$_smarty_tpl->getVariable('itm')->value['attr_option'])===null||$tmp==='' ? '--' : $tmp);?>
<?php }else{ ?>--<?php }?></td>
				<td align="center"><?php echo (($tmp = @$_smarty_tpl->getVariable('itm')->value['label_name'])===null||$tmp==='' ? '-' : $tmp);?>
</td>
				<td align="center"><?php echo smarty_function_admin_switcher(array('t'=>"product_attribute",'f'=>"available",'id'=>$_smarty_tpl->getVariable('itm')->value['attr_id'],'value'=>$_smarty_tpl->getVariable('itm')->value['available']),$_smarty_tpl);?>
</td>
				<td align="center">
					<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('itm')->value['mod_id'],"product/model?act=write_attr&mod_id=")),'id'=>$_smarty_tpl->getVariable('itm')->value['attr_id']),$_smarty_tpl);?>
&nbsp;
					<?php echo smarty_function_admin_delete(array('url'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('itm')->value['mod_id'],"product/model?act=list_attr&mod_id=")),'t'=>"product_attribute",'id'=>$_smarty_tpl->getVariable('itm')->value['attr_id'],'req_url'=>smarty_modifier_app_url("product/ajaxDeleteModelAttr")),$_smarty_tpl);?>

				</td>
			</tr>
			<?php }} ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="7">
					<input value="<?php echo $_smarty_tpl->getVariable('lang')->value['batch_delete'];?>
" type="button" class="btn" onclick="batchDeleteByCheckbox('-', 'chkclass', '<?php echo smarty_function_app_url(array('url'=>('product/model?act=list_attr&mod_id=').($_smarty_tpl->getVariable('itm')->value['mod_id'])),$_smarty_tpl);?>
', 0, '', '<?php echo smarty_function_app_url(array('url'=>'product/ajaxDeleteModelAttr'),$_smarty_tpl);?>
')"/>&nbsp;&nbsp;
					<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['product_model'];?>
" class="btn" onclick="loadPage('<?php echo smarty_function_app_url(array('url'=>'product/model?act=list_model'),$_smarty_tpl);?>
');return false;"/>
				</td>
			</tr>
		</tfoot>
		</table>		
	<?php }else{ ?>
		<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div>
	<?php }?>
	
<?php }elseif($_smarty_tpl->getVariable('action')->value=='write_attr'){?>
	<?php if ($_smarty_tpl->getVariable('edit')->value['attr_id']>0){?>
		<form action="<?php echo smarty_function_app_url(array('url'=>('product/model?act=write_attr&mod_id=').($_smarty_tpl->getVariable('mod_id')->value)),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php echo smarty_function_app_url(array('url'=>('product/model?act=list_attr&mod_id=').($_smarty_tpl->getVariable('mod_id')->value)),$_smarty_tpl);?>
')">
	<div class="adminform">
	<?php }else{ ?>
		<form action="<?php echo smarty_function_app_url(array('url'=>('product/model?act=write_attr&mod_id=').($_smarty_tpl->getVariable('mod_id')->value)),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php echo smarty_function_app_url(array('url'=>('product/model?act=write_attr&mod_id=').($_smarty_tpl->getVariable('mod_id')->value)),$_smarty_tpl);?>
')">
	<div class="adminform">
	<?php }?>
	
		<div class="f_title"><?php echo $_smarty_tpl->getVariable('head_top')->value['title'];?>
</div>
		<?php echo smarty_function_text(array('name'=>"wrt_attr_name",'value'=>$_smarty_tpl->getVariable('edit')->value['attr_name'],'required'=>"true",'label'=>$_smarty_tpl->getVariable('lang')->value['name']),$_smarty_tpl);?>

		<?php echo smarty_function_radio(array('name'=>"wrt_attr_type",'value'=>$_smarty_tpl->getVariable('attr_types')->value,'label'=>$_smarty_tpl->getVariable('lang')->value['type'],'checked'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['attr_type'])===null||$tmp==='' ? 'text' : $tmp)),$_smarty_tpl);?>

		<div class="line clearfix">
			<div class="f1"><?php echo $_smarty_tpl->getVariable('lang')->value['belong_label'];?>
</div>
			<div class="f2">
				<select name="wrt_label_id" id="label_id">
					<option value="0"><?php echo $_smarty_tpl->getVariable('lang')->value['please_choose'];?>
</option>
					<?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('labels')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['label']->value['label_id'];?>
"<?php if ($_smarty_tpl->tpl_vars['label']->value['label_id']==$_smarty_tpl->getVariable('edit')->value['label_id']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['label']->value['label_name'];?>
</option>
					<?php }} ?>
				</select>&nbsp;
				<a href="javascript:void(0)" onclick="openAjaxWin('<?php echo smarty_function_app_url(array('url'=>smarty_modifier_pcat(smarty_modifier_escape($_smarty_tpl->getVariable('lang')->value['belong_label'],'url'),'ajax/simpleAddItem?select_id=label_id&t=product_attribute_label&f=label_name&title=')),$_smarty_tpl);?>
', 500, 300)"><?php echo $_smarty_tpl->getVariable('lang')->value['add'];?>
</a>
			</div>
		</div>
		<?php echo smarty_function_text(array('name'=>"wrt_attr_option",'value'=>$_smarty_tpl->getVariable('edit')->value['attr_option'],'label'=>$_smarty_tpl->getVariable('lang')->value['option_value'],'size'=>"l",'note'=>$_smarty_tpl->getVariable('lang')->value['please_separate_by_comma']),$_smarty_tpl);?>

		<?php echo smarty_function_select(array('name'=>"wrt_available",'value'=>$_smarty_tpl->getVariable('available')->value,'label'=>$_smarty_tpl->getVariable('lang')->value['available'],'selected'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['available'])===null||$tmp==='' ? "1" : $tmp)),$_smarty_tpl);?>

		<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['comment'],'name'=>"wrt_comment",'value'=>$_smarty_tpl->getVariable('edit')->value['comment']),$_smarty_tpl);?>

		<input type="hidden" name="wrt_mod_id" value="<?php echo $_smarty_tpl->getVariable('mod_id')->value;?>
"/>
		<?php if ($_smarty_tpl->getVariable('edit')->value['attr_id']>0){?><input type="hidden" name="wrt_id" value="<?php echo $_smarty_tpl->getVariable('edit')->value['attr_id'];?>
"/><?php }?>
		<?php echo smarty_function_submit(array('value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

	</div>
	</form>
<?php }?>