<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 17:09:39
         compiled from "D:\www\v30\administrator\views\download/write_download.tpl" */ ?>
<?php /*%%SmartyHeaderCode:322764d6620535c26b7-42350117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7a3238d9a373459a34cdb877cfa33a68a3143ed' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\download/write_download.tpl',
      1 => 1298134487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322764d6620535c26b7-42350117',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_select')) include 'D:\www\v30\administrator\plugins\function.select.php';
if (!is_callable('smarty_function_upload_attachment')) include 'D:\www\v30\administrator\plugins\function.upload_attachment.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\www\v30\core\Engine\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_radio')) include 'D:\www\v30\administrator\plugins\function.radio.php';
if (!is_callable('smarty_function_textarea')) include 'D:\www\v30\administrator\plugins\function.textarea.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
?><script type="text/javascript">
$(document).ready(function() {
	$("#create_time").calendar();
});
</script>

<form action="<?php echo smarty_function_app_url(array('url'=>'download/writeDownload'),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php echo $_smarty_tpl->getVariable('reurl')->value;?>
')">
<div class="adminform">
	<div class="f_title"><?php echo $_smarty_tpl->getVariable('head_top')->value['title'];?>
</div>
	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['name'],'name'=>"wrt_name",'value'=>$_smarty_tpl->getVariable('edit')->value['name'],'required'=>"true"),$_smarty_tpl);?>

	<?php echo smarty_function_select(array('label'=>$_smarty_tpl->getVariable('lang')->value['category'],'name'=>"wrt_cat_id",'value'=>$_smarty_tpl->getVariable('cats')->value,'selected'=>(($tmp = @(($tmp = @$_smarty_tpl->getVariable('edit')->value['cat_id'])===null||$tmp==='' ? $_smarty_tpl->getVariable('cat_id')->value : $tmp))===null||$tmp==='' ? '' : $tmp),'required'=>"true",'id'=>"cat_id"),$_smarty_tpl);?>

	<?php echo smarty_function_upload_attachment(array('label'=>$_smarty_tpl->getVariable('lang')->value['upload_attachment'],'name'=>"wrt_path",'value'=>$_smarty_tpl->getVariable('edit')->value['path'],'attach_type'=>$_smarty_tpl->getVariable('edit')->value['attach_type'],'note'=>$_smarty_tpl->getVariable('lang')->value['please_upload_attachment'],'required'=>"true"),$_smarty_tpl);?>

	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['ordering'],'name'=>"wrt_ordering",'value'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['ordering'])===null||$tmp==='' ? '50' : $tmp),'required'=>"true",'datatype'=>"NUMERIC",'size'=>"s"),$_smarty_tpl);?>

	
	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['create_time'],'name'=>"wrt_create_date",'value'=>smarty_modifier_date_format((($tmp = @$_smarty_tpl->getVariable('edit')->value['create_date'])===null||$tmp==='' ? time() : $tmp),'%Y-%m-%d'),'id'=>"create_time"),$_smarty_tpl);?>

	<?php echo smarty_function_radio(array('label'=>$_smarty_tpl->getVariable('lang')->value['published'],'name'=>"wrt_published",'value'=>$_smarty_tpl->getVariable('published')->value,'checked'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['published'])===null||$tmp==='' ? '1' : $tmp)),$_smarty_tpl);?>

	<?php echo smarty_function_textarea(array('label'=>$_smarty_tpl->getVariable('lang')->value['description'],'name'=>"wrt_description",'value'=>$_smarty_tpl->getVariable('edit')->value['description'],'width'=>"500px",'height'=>"150px"),$_smarty_tpl);?>

	
	<?php if ($_smarty_tpl->getVariable('edit')->value['id']>0){?><input type="hidden" name="wrt_id" value="<?php echo $_smarty_tpl->getVariable('edit')->value['id'];?>
"/><?php }?>
	<?php echo smarty_function_submit(array('name'=>"submit",'value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

</div>
</form>