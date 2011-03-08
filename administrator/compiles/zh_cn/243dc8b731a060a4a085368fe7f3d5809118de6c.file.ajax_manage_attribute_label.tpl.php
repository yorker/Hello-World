<?php /* Smarty version Smarty-3.0.7, created on 2011-02-28 11:18:00
         compiled from "D:\www\v30\administrator\views\product/ajax_manage_attribute_label.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177554d6b13e83a5df1-96766440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '243dc8b731a060a4a085368fe7f3d5809118de6c' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\product/ajax_manage_attribute_label.tpl',
      1 => 1298862733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177554d6b13e83a5df1-96766440',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
?><style type="text/css">
p.manage_label {
	line-height:25px;
}
p.manage_label label * {
	vertical-align:middle;
}
</style>

<script type="text/javascript">
function delete_label(fobj) {
	if(checkCheckbox(fobj.label_ids)) {
		if(!confirm('<?php echo $_smarty_tpl->getVariable('lang')->value['confirm_delete'];?>
')) {
			return false;
		}
		var datas = getDatas(fobj);
		$.ajax({
			type: 'post',
			url: fobj.action,
			data: datas,
			success: function(msg){
				msg = $.trim(msg);
				if(msg == 'ok') {
					showMsgByDiv('<?php echo $_smarty_tpl->getVariable('lang')->value['operation_success'];?>
');
					closeAjaxWin();
				} else {
					showMsgByDiv(msg, 1);
				}
			}
		});
	} else {
		alert('<?php echo $_smarty_tpl->getVariable('lang')->value['please_choose_the_op_item'];?>
');
	}	
	return false;
}
</script>

<form action="<?php echo smarty_function_app_url(array('url'=>'product/ajaxManageAttributeLabel?do=del'),$_smarty_tpl);?>
" method="post" onsubmit="return delete_label(this)">
	<p class="manage_label">
	<?php  $_smarty_tpl->tpl_vars['itm'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itm']->key => $_smarty_tpl->tpl_vars['itm']->value){
?>
		<label><input type="checkbox" name="label_ids" value="<?php echo $_smarty_tpl->tpl_vars['itm']->value['label_id'];?>
"/><span><?php echo $_smarty_tpl->tpl_vars['itm']->value['label_name'];?>
</span></label> &nbsp; &nbsp;
	<?php }} ?>
	</p>
	<div class="blank">&nbsp;</div>
	<p><input type="submit" name="" value="<?php echo $_smarty_tpl->getVariable('lang')->value['delete'];?>
" class="btn"/></p>
</form>
