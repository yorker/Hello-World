<?php /* Smarty version Smarty-3.0.7, created on 2011-02-27 21:02:44
         compiled from "D:\www\v30\administrator\views\common/write_normal_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102694d6a4b74dd41c5-89169307%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e47adf906bff8c4b48aa40bb1ba887343207745' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\common/write_normal_category.tpl',
      1 => 1298097616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102694d6a4b74dd41c5-89169307',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_textarea')) include 'D:\www\v30\administrator\plugins\function.textarea.php';
if (!is_callable('smarty_function_radio')) include 'D:\www\v30\administrator\plugins\function.radio.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
?><form action="<?php echo smarty_function_app_url(array('url'=>('common/writeNormalCategory?type=').($_smarty_tpl->getVariable('type')->value)),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php if ($_smarty_tpl->getVariable('edit')->value['cat_id']>0){?><?php echo smarty_function_app_url(array('url'=>('common/listNormalCategory?type=').($_smarty_tpl->getVariable('type')->value)),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_app_url(array('url'=>('common/writeNormalCategory?type=').($_smarty_tpl->getVariable('type')->value)),$_smarty_tpl);?>
<?php }?>')">
<div class="adminform">
	<div class="f_title"><?php echo $_smarty_tpl->getVariable('head_top')->value['title'];?>
</div>
	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['name'],'name'=>"wrt_name",'value'=>$_smarty_tpl->getVariable('edit')->value['name'],'required'=>"true"),$_smarty_tpl);?>

	<?php echo smarty_function_textarea(array('label'=>$_smarty_tpl->getVariable('lang')->value['description'],'name'=>"wrt_description",'value'=>$_smarty_tpl->getVariable('edit')->value['description'],'width'=>"380px",'height'=>"100px"),$_smarty_tpl);?>

	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['ordering'],'name'=>"wrt_ordering",'value'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['ordering'])===null||$tmp==='' ? '50' : $tmp),'required'=>"true",'datatype'=>"NUMERIC",'size'=>"s"),$_smarty_tpl);?>

	<?php echo smarty_function_radio(array('label'=>$_smarty_tpl->getVariable('lang')->value['published'],'name'=>"wrt_published",'value'=>$_smarty_tpl->getVariable('published')->value,'checked'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['published'])===null||$tmp==='' ? '1' : $tmp)),$_smarty_tpl);?>

	<input type="hidden" name="wrt_type" value="<?php echo $_smarty_tpl->getVariable('type')->value;?>
"/>
	<?php if ($_smarty_tpl->getVariable('edit')->value['cat_id']>0){?><input type="hidden" name="wrt_id" value="<?php echo $_smarty_tpl->getVariable('edit')->value['cat_id'];?>
"/><?php }?>
	<?php echo smarty_function_submit(array('name'=>"submit",'value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

</div>
</form>