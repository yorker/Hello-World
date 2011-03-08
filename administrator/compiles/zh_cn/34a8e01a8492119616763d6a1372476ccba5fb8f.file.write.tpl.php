<?php /* Smarty version Smarty-3.0.7, created on 2011-02-25 13:44:57
         compiled from "D:\www\v30\administrator\views\friend_link/write.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146004d6741d93ee1c1-15509635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34a8e01a8492119616763d6a1372476ccba5fb8f' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\friend_link/write.tpl',
      1 => 1298095473,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146004d6741d93ee1c1-15509635',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_upload')) include 'D:\www\v30\administrator\plugins\function.upload.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
?><form action="<?php echo smarty_function_app_url(array('url'=>'friendlink/write'),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php if ($_smarty_tpl->getVariable('edit')->value['id']>0){?><?php echo smarty_function_app_url(array('url'=>'friendlink/listing'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_app_url(array('url'=>'friendlink/write'),$_smarty_tpl);?>
<?php }?>')">
<div class="adminform">
	<div class="f_title"><?php echo $_smarty_tpl->getVariable('head_top')->value['title'];?>
</div>

	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['name'],'name'=>"wrt_name",'value'=>$_smarty_tpl->getVariable('edit')->value['name'],'required'=>"true"),$_smarty_tpl);?>

	
	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['link'],'name'=>"wrt_link",'value'=>$_smarty_tpl->getVariable('edit')->value['link'],'required'=>"true",'size'=>"l"),$_smarty_tpl);?>

	
	<?php echo smarty_function_upload(array('label'=>$_smarty_tpl->getVariable('lang')->value['logo_img'],'name'=>"wrt_logo",'value'=>$_smarty_tpl->getVariable('edit')->value['logo'],'note'=>$_smarty_tpl->getVariable('lang')->value['if_has_logo_img_please_upload']),$_smarty_tpl);?>

	
	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['ordering'],'name'=>"wrt_ordering",'value'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['ordering'])===null||$tmp==='' ? '50' : $tmp),'size'=>"s",'required'=>"true",'datatype'=>"NUMERIC"),$_smarty_tpl);?>

	<?php if ($_smarty_tpl->getVariable('edit')->value['id']>0){?><input type="hidden" name="wrt_id" value="<?php echo $_smarty_tpl->getVariable('edit')->value['id'];?>
"/><?php }?>
	<?php echo smarty_function_submit(array('value'=>$_smarty_tpl->getVariable('lang')->value['submit'],'name'=>"submit",'back_url'=>'friendlink/listing'),$_smarty_tpl);?>

	
</div>
</form>