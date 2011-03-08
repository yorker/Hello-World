<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 14:04:13
         compiled from "D:\www\v30\administrator\views\product/write_product_cat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190944d65f4dd75a026-22487606%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72045045651fe8cabf5b5bc2c3264192a3aa1b07' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\product/write_product_cat.tpl',
      1 => 1298093234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190944d65f4dd75a026-22487606',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_select')) include 'D:\www\v30\administrator\plugins\function.select.php';
if (!is_callable('smarty_function_radio')) include 'D:\www\v30\administrator\plugins\function.radio.php';
if (!is_callable('smarty_function_textarea')) include 'D:\www\v30\administrator\plugins\function.textarea.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
?><form action="<?php echo smarty_function_app_url(array('url'=>'product/writeProductCat'),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php if ($_smarty_tpl->getVariable('edit')->value['cat_id']>0){?><?php echo smarty_function_app_url(array('url'=>'product/listProductCat'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_app_url(array('url'=>'product/writeProductCat'),$_smarty_tpl);?>
<?php }?>')">
<div class="adminform">
	<div class="f_title"><?php echo $_smarty_tpl->getVariable('head_top')->value['title'];?>
</div>

	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['title'],'name'=>"wrt_cat_name",'value'=>$_smarty_tpl->getVariable('edit')->value['cat_name'],'required'=>"true"),$_smarty_tpl);?>

	
	<?php echo smarty_function_select(array('label'=>$_smarty_tpl->getVariable('lang')->value['parent_cat'],'name'=>"wrt_parent_id",'value'=>$_smarty_tpl->getVariable('parents')->value,'selected'=>$_smarty_tpl->getVariable('edit')->value['parent_id'],'required'=>"true"),$_smarty_tpl);?>

		
	<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['ordering'],'name'=>"wrt_ordering",'value'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['ordering'])===null||$tmp==='' ? '50' : $tmp),'required'=>"true",'datatype'=>"NUMERIC",'size'=>"s"),$_smarty_tpl);?>

	
	<?php echo smarty_function_select(array('label'=>$_smarty_tpl->getVariable('lang')->value['published'],'name'=>"wrt_published",'value'=>$_smarty_tpl->getVariable('alternative')->value,'selected'=>$_smarty_tpl->getVariable('edit')->value['published']),$_smarty_tpl);?>

	
	<?php if ($_smarty_tpl->getVariable('edit')->value['cat_id']>0){?>
		<?php echo smarty_function_radio(array('label'=>$_smarty_tpl->getVariable('lang')->value['terminal'],'name'=>"wrt_is_terminal",'value'=>$_smarty_tpl->getVariable('alternative')->value,'attrs'=>"disabled=true",'checked'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['is_terminal'])===null||$tmp==='' ? 1 : $tmp)),$_smarty_tpl);?>

	<?php }else{ ?>
		<?php echo smarty_function_radio(array('label'=>$_smarty_tpl->getVariable('lang')->value['terminal'],'name'=>"wrt_is_terminal",'note'=>$_smarty_tpl->getVariable('lang')->value['choose_product_terminal_tip'],'value'=>$_smarty_tpl->getVariable('alternative')->value,'checked'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['is_terminal'])===null||$tmp==='' ? 1 : $tmp)),$_smarty_tpl);?>

	<?php }?>
	
	<?php echo smarty_function_textarea(array('label'=>$_smarty_tpl->getVariable('lang')->value['description'],'name'=>"wrt_description",'value'=>$_smarty_tpl->getVariable('edit')->value['description'],'width'=>"500px",'height'=>"100px"),$_smarty_tpl);?>

	<?php if ($_smarty_tpl->getVariable('edit')->value['cat_id']>0){?>
		<input type="hidden" name="wrt_id" value="<?php echo $_smarty_tpl->getVariable('edit')->value['cat_id'];?>
"/>
	<?php }?>
	<?php echo smarty_function_submit(array('name'=>"submit",'value'=>$_smarty_tpl->getVariable('lang')->value['submit'],'back_url'=>smarty_modifier_app_url('product/listProductCat')),$_smarty_tpl);?>

</div>
</form>