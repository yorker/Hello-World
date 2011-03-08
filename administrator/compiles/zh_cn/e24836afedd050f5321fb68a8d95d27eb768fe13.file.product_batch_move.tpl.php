<?php /* Smarty version Smarty-3.0.7, created on 2011-02-27 17:31:44
         compiled from "D:\www\v30\administrator\views\product/product_batch_move.tpl" */ ?>
<?php /*%%SmartyHeaderCode:259064d6a1a003a4e87-44307333%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e24836afedd050f5321fb68a8d95d27eb768fe13' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\product/product_batch_move.tpl',
      1 => 1297841593,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '259064d6a1a003a4e87-44307333',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
?><script type="text/javascript">
function doMoveSubmit(fobj, reurl) {
	if(empty(fobj.cat_id.value)) {
		alert('<?php echo $_smarty_tpl->getVariable('lang')->value['not_empty'];?>
<?php echo $_smarty_tpl->getVariable('lang')->value['category'];?>
');
		return false;
	}
	var data = 'cat_id='+fobj.cat_id.value;
	
	var checked = $(".chkflag:checked");
	var len = checked.length;
	if(len == 0) {
		alert('<?php echo $_smarty_tpl->getVariable('lang')->value['please_choose_the_operation_option'];?>
');
		return false;
	}
	var tmp = '';
	for(var i = 0; i < len; i++) {
		if(tmp) {
			tmp += '_' + checked.eq(i).val();
		} else {
			tmp += checked.eq(i).val();
		}
	}
	data += '&ids=' + tmp;	
	$.ajax({
		type: 'post',
		url: fobj.action,
		data: data,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok') {
				loadPage(reurl,1);
				showMsgByDiv('<?php echo $_smarty_tpl->getVariable('lang')->value['operation_success'];?>
');
			} else {
				showMsgByDiv(msg);
			}			
		}
	});
	closeAjaxWin();
	return false;
}
</script>
<form action="<?php echo smarty_function_app_url(array('url'=>'product/listProduct?act=batch_move&do=move'),$_smarty_tpl);?>
" method="post" onsubmit="return doMoveSubmit(this, '<?php echo smarty_function_app_url(array('url'=>'product/listProduct'),$_smarty_tpl);?>
')">
	<div class="adminform">
		<div class="f_title"><?php echo $_smarty_tpl->getVariable('lang')->value['move_to'];?>
</div>
		<div class="line clearfix">
			<div class="f1"><?php echo $_smarty_tpl->getVariable('lang')->value['category'];?>
</div>
			<div class="f2">
				<select name="cat_id">
					<?php echo $_smarty_tpl->getVariable('catopt')->value;?>

				</select>
			</div>
		</div>
		<?php echo smarty_function_submit(array('value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

	</div>
</form>