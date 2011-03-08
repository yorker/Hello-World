<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 15:06:06
         compiled from "D:\www\v30\administrator\views\article/write_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193654d66035ea008b8-75080581%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34ca5d8214d99ee813e2cd6ee7f49dbfe86d864a' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\article/write_category.tpl',
      1 => 1298097861,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193654d66035ea008b8-75080581',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_select')) include 'D:\www\v30\administrator\plugins\function.select.php';
if (!is_callable('smarty_function_radio')) include 'D:\www\v30\administrator\plugins\function.radio.php';
if (!is_callable('smarty_function_textarea')) include 'D:\www\v30\administrator\plugins\function.textarea.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
?><form action="<?php echo smarty_function_app_url(array('url'=>'article/writeCategory'),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php if ($_smarty_tpl->getVariable('edit')->value['cat_id']>0){?><?php echo smarty_function_app_url(array('url'=>'article/listCategory'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_app_url(array('url'=>'article/writeCategory'),$_smarty_tpl);?>
<?php }?>')">
<div class="adminform">
	<div class="f_title"><?php echo $_smarty_tpl->getVariable('head_top')->value['title'];?>
</div>
	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['name'],'name'=>"wrt_cat_name",'value'=>$_smarty_tpl->getVariable('edit')->value['cat_name'],'required'=>"true"),$_smarty_tpl);?>

	<?php echo smarty_function_select(array('label'=>$_smarty_tpl->getVariable('lang')->value['parent_cat'],'name'=>"wrt_parent_id",'value'=>$_smarty_tpl->getVariable('art_cat')->value,'selected'=>$_smarty_tpl->getVariable('edit')->value['parent_id']),$_smarty_tpl);?>

	<?php if ($_smarty_tpl->getVariable('edit')->value['cat_id']>0){?>
		<?php echo smarty_function_radio(array('label'=>$_smarty_tpl->getVariable('lang')->value['terminal'],'name'=>"wrt_is_terminal",'value'=>$_smarty_tpl->getVariable('is_terminal')->value,'checked'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['is_terminal'])===null||$tmp==='' ? 1 : $tmp),'note'=>$_smarty_tpl->getVariable('lang')->value['is_only_published_by_terminal'],'attrs'=>"disabled=1"),$_smarty_tpl);?>

	<?php }else{ ?>
		<?php echo smarty_function_radio(array('label'=>$_smarty_tpl->getVariable('lang')->value['terminal'],'name'=>"wrt_is_terminal",'value'=>$_smarty_tpl->getVariable('is_terminal')->value,'checked'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['is_terminal'])===null||$tmp==='' ? 1 : $tmp),'note'=>$_smarty_tpl->getVariable('lang')->value['is_only_published_by_terminal']),$_smarty_tpl);?>

	<?php }?>
	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['ordering'],'name'=>"wrt_ordering",'value'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['ordering'])===null||$tmp==='' ? '50' : $tmp),'required'=>"true",'datatype'=>"NUMERIC",'size'=>"s"),$_smarty_tpl);?>

	<?php echo smarty_function_textarea(array('label'=>$_smarty_tpl->getVariable('lang')->value['description'],'name'=>"wrt_cat_desc",'value'=>$_smarty_tpl->getVariable('edit')->value['cat_desc'],'width'=>"400px",'height'=>"120px"),$_smarty_tpl);?>

	<?php if ($_smarty_tpl->getVariable('edit')->value['cat_id']>0){?><input type="hidden" name="wrt_id" value="<?php echo $_smarty_tpl->getVariable('edit')->value['cat_id'];?>
"/><?php }?>
	<?php echo smarty_function_submit(array('name'=>"submit",'value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

</div>
</form>