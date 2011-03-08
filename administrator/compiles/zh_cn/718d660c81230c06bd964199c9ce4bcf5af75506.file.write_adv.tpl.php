<?php /* Smarty version Smarty-3.0.7, created on 2011-02-28 15:41:35
         compiled from "D:\www\v30\administrator\views\advertisement/write_adv.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3254d6b51afd8aa18-93625788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '718d660c81230c06bd964199c9ce4bcf5af75506' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\advertisement/write_adv.tpl',
      1 => 1298099070,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3254d6b51afd8aa18-93625788',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_select')) include 'D:\www\v30\administrator\plugins\function.select.php';
if (!is_callable('smarty_function_upload')) include 'D:\www\v30\administrator\plugins\function.upload.php';
if (!is_callable('smarty_function_radio')) include 'D:\www\v30\administrator\plugins\function.radio.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
?><script type="text/javascript">
$(document).ready(function() {
	$("#start_time").calendar();
	$("#end_time").calendar();
});
</script>
<form action="<?php echo smarty_function_app_url(array('url'=>'advertisement/writeAdv'),$_smarty_tpl);?>
" onsubmit="return ajaxDoSubmit(this, '<?php echo $_smarty_tpl->getVariable('op_reurl')->value;?>
')">
<div class="adminform">
	<div class="f_title"><?php echo $_smarty_tpl->getVariable('head_top')->value['title'];?>
</div>
	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['title'],'name'=>"wrt_title",'value'=>$_smarty_tpl->getVariable('edit')->value['title'],'required'=>"true",'size'=>"l"),$_smarty_tpl);?>

	
	<?php echo smarty_function_select(array('label'=>$_smarty_tpl->getVariable('lang')->value['adv_position'],'name'=>"wrt_pos_id",'value'=>$_smarty_tpl->getVariable('cats')->value,'selected'=>$_smarty_tpl->getVariable('edit')->value['pos_id'],'required'=>"true"),$_smarty_tpl);?>

	
	<?php echo smarty_function_upload(array('label'=>$_smarty_tpl->getVariable('lang')->value['upload'],'name'=>"wrt_image",'value'=>$_smarty_tpl->getVariable('edit')->value['image'],'required'=>"true"),$_smarty_tpl);?>

	
	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['link'],'name'=>"wrt_link",'value'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['image'])===null||$tmp==='' ? 'http://' : $tmp),'size'=>"l"),$_smarty_tpl);?>

	
	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['start_time'],'name'=>"wrt_start_time",'value'=>$_smarty_tpl->getVariable('edit')->value['start_time'],'id'=>"start_time"),$_smarty_tpl);?>

	
	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['end_time'],'name'=>"wrt_end_time",'value'=>$_smarty_tpl->getVariable('edit')->value['end_time'],'id'=>"end_time"),$_smarty_tpl);?>

	
	<?php echo smarty_function_select(array('label'=>$_smarty_tpl->getVariable('lang')->value['open_type'],'name'=>"wrt_open_type",'value'=>$_smarty_tpl->getVariable('open_types')->value,'selected'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['open_type'])===null||$tmp==='' ? '1' : $tmp)),$_smarty_tpl);?>

	
	<?php echo smarty_function_radio(array('label'=>$_smarty_tpl->getVariable('lang')->value['published'],'name'=>"wrt_published",'value'=>$_smarty_tpl->getVariable('published')->value,'checked'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['published'])===null||$tmp==='' ? 1 : $tmp)),$_smarty_tpl);?>

	
	<?php if ($_smarty_tpl->getVariable('edit')->value['id']>0){?>
		<input type="hidden" name="wrt_id" value="<?php echo $_smarty_tpl->getVariable('edit')->value['id'];?>
"/>
	<?php }?>
	
	<?php echo smarty_function_submit(array('name'=>"submit",'value'=>$_smarty_tpl->getVariable('lang')->value['submit'],'back_url'=>smarty_modifier_app_url('advertisement/list_adv')),$_smarty_tpl);?>

</div>
</form>