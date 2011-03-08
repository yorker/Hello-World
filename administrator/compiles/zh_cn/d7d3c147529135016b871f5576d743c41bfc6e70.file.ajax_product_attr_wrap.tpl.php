<?php /* Smarty version Smarty-3.0.7, created on 2011-02-27 20:17:02
         compiled from "D:\www\v30\administrator\views\product/ajax_product_attr_wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:314314d6a40be1017e8-88081697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7d3c147529135016b871f5576d743c41bfc6e70' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\product/ajax_product_attr_wrap.tpl',
      1 => 1298809014,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '314314d6a40be1017e8-88081697',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_modifier_pcat')) include 'D:\www\v30\administrator\plugins\modifier.pcat.php';
if (!is_callable('smarty_function_radio')) include 'D:\www\v30\administrator\plugins\function.radio.php';
if (!is_callable('smarty_function_checkbox')) include 'D:\www\v30\administrator\plugins\function.checkbox.php';
?><div class="adminform">
	<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
		<?php if ($_smarty_tpl->getVariable('itm')->value['attr_type']=='text'){?>
			<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('itm')->value['attr_name'],'id'=>("id_attr_").($_smarty_tpl->getVariable('itm')->value['attr_id']),'name'=>("attr_").($_smarty_tpl->getVariable('itm')->value['attr_id']),'value'=>$_smarty_tpl->getVariable('itm')->value['attr_value'],'cachedata'=>"1"),$_smarty_tpl);?>

		<?php }elseif($_smarty_tpl->getVariable('itm')->value['attr_type']=='radio'){?>
			<?php echo smarty_function_radio(array('label'=>$_smarty_tpl->getVariable('itm')->value['attr_name'],'name'=>smarty_modifier_pcat($_smarty_tpl->getVariable('itm')->value['attr_id'],"attr_"),'value'=>$_smarty_tpl->getVariable('itm')->value['attr_option_array'],'checked'=>$_smarty_tpl->getVariable('itm')->value['attr_value']),$_smarty_tpl);?>

		<?php }elseif($_smarty_tpl->getVariable('itm')->value['attr_type']=='checkbox'){?>
			<?php echo smarty_function_checkbox(array('label'=>$_smarty_tpl->getVariable('itm')->value['attr_name'],'name'=>smarty_modifier_pcat($_smarty_tpl->getVariable('itm')->value['attr_id'],"attr_"),'value'=>$_smarty_tpl->getVariable('itm')->value['attr_option_array'],'checked'=>$_smarty_tpl->getVariable('itm')->value['attr_value']),$_smarty_tpl);?>

		<?php }?>
	<?php }} ?>
</div>