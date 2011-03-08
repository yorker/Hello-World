<?php /* Smarty version Smarty-3.0.7, created on 2011-02-28 09:02:43
         compiled from "D:\www\v30\administrator\views\product/ajax_cat_batch_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114544d6af433eda2c3-40672349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b39cd0dbb742d9847b4010c1c1272bf7a9d6e02' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\product/ajax_cat_batch_add.tpl',
      1 => 1298854825,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114544d6af433eda2c3-40672349',
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
//ajax提交数据请求

function batch_add_product(fobj, url) {
	 if(!checkForm(fobj)) {
		 return false;
	 }
	 var datas = getDatas(fobj);

	 $.ajax({
		type: 'post',
		url: fobj.action,
		data: datas,
		success: function(msg) {
			msg = $.trim(msg);
			if(/ok-/.test(msg)) {
				showMsgByDiv(lang_op_success);
				if(url) {
					loadPage(url);
				} else {
					//认为是商品添加页发起的请求
					var arr = msg.split('-');
					$.ajax({
						type: 'get',
						url: 'dispatcher.php?disp=product/ajaxGetProductCatStruct&id='+arr[1],
						success: function(cnt) {
							$("#cat_id").html(cnt);
						}
					});
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
<form action="<?php echo smarty_function_app_url(array('url'=>'product/ajaxCatBatchAdd?do=add'),$_smarty_tpl);?>
" method="post" onsubmit="return batch_add_product(this, '<?php if (!$_smarty_tpl->getVariable('is_dynamic')->value){?><?php echo smarty_function_app_url(array('url'=>'product/listProductCat'),$_smarty_tpl);?>
<?php }?>')">
	<div class="adminform">
		<div class="f_title"><?php echo $_smarty_tpl->getVariable('lang')->value['batch_add_cat'];?>
</div>
		
		<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['name'],'name'=>"wrt_cat_name",'value'=>'','required'=>"true",'size'=>"m",'note'=>$_smarty_tpl->getVariable('lang')->value['please_use_end_separate']),$_smarty_tpl);?>

		
		<?php echo smarty_function_select(array('label'=>$_smarty_tpl->getVariable('lang')->value['parent_cat'],'name'=>"wrt_parent_id",'value'=>$_smarty_tpl->getVariable('format_product')->value,'required'=>"true"),$_smarty_tpl);?>

		
		<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['ordering'],'name'=>"wrt_ordering",'value'=>"50",'required'=>"true",'size'=>"s"),$_smarty_tpl);?>

		
		<?php echo smarty_function_select(array('label'=>$_smarty_tpl->getVariable('lang')->value['published'],'name'=>"wrt_published",'value'=>$_smarty_tpl->getVariable('alternative')->value,'required'=>"true"),$_smarty_tpl);?>

		
		<?php echo smarty_function_radio(array('label'=>$_smarty_tpl->getVariable('lang')->value['terminal'],'name'=>"wrt_is_terminal",'value'=>$_smarty_tpl->getVariable('alternative')->value,'checked'=>1),$_smarty_tpl);?>

		
		<?php echo smarty_function_submit(array('value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

	</div>
</form>