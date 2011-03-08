<?php /* Smarty version Smarty-3.0.7, created on 2011-02-26 12:54:42
         compiled from "D:\www\v30\administrator\views\article/write_batch_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127464d6887925cb053-85687346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a61ffeb61925990a28788536b2cf9092d6764cff' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\article/write_batch_category.tpl',
      1 => 1298097871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127464d6887925cb053-85687346',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_select')) include 'D:\www\v30\administrator\plugins\function.select.php';
if (!is_callable('smarty_function_radio')) include 'D:\www\v30\administrator\plugins\function.radio.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
?><script type="text/javascript">
//ajax
function batch_add_product(fobj, url) {
	 if(!checkForm(fobj)) {
		 return false;
	 }
	 datas = getDatas(fobj);

	 $.ajax({
		type: 'post',
		url: fobj.action,
		data: datas,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok') {
				showMsgByDiv(lang_op_success);
				if(url) {
					loadPage(url);
				}
				closeAjaxWin();
			} else {				
				showMsgByDiv(msg, 1);				
			}
		}
	 });
	 return false;
}
</script>
<form action="<?php echo smarty_function_app_url(array('url'=>'article/writeBatchCategory?do=add'),$_smarty_tpl);?>
" method="post" onsubmit="return batch_add_product(this, '<?php echo smarty_function_app_url(array('url'=>'article/listCategory'),$_smarty_tpl);?>
')">
	<div class="adminform">
		<div class="f_title"><?php echo $_smarty_tpl->getVariable('lang')->value['batch_add_cat'];?>
</div>
		
		<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['name'],'name'=>"wrt_cat_name",'value'=>'','required'=>"true",'size'=>"m",'note'=>$_smarty_tpl->getVariable('lang')->value['please_use_end_separate']),$_smarty_tpl);?>

		
		<?php echo smarty_function_select(array('label'=>$_smarty_tpl->getVariable('lang')->value['parent_cat'],'name'=>"wrt_parent_id",'value'=>$_smarty_tpl->getVariable('format_article')->value,'required'=>"true"),$_smarty_tpl);?>

		
		<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['ordering'],'name'=>"wrt_ordering",'value'=>"50",'required'=>"true",'size'=>"s"),$_smarty_tpl);?>

		
		<?php echo smarty_function_radio(array('label'=>$_smarty_tpl->getVariable('lang')->value['terminal'],'name'=>"wrt_is_terminal",'value'=>$_smarty_tpl->getVariable('alternative')->value,'checked'=>1),$_smarty_tpl);?>

		
		<?php echo smarty_function_submit(array('value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

	</div>
</form>