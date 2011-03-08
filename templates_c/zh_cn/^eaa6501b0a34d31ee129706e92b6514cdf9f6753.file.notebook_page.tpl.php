<?php /* Smarty version Smarty-3.0.7, created on 2011-03-01 22:45:24
         compiled from "templates\index/notebook_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:236074d6d06848b51e0-84167024%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eaa6501b0a34d31ee129706e92b6514cdf9f6753' => 
    array (
      0 => 'templates\\index/notebook_page.tpl',
      1 => 1298990655,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '236074d6d06848b51e0-84167024',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\www\v30\core\Engine\plugins\modifier.date_format.php';
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>
	<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
	<div class="com_block">
		<div class="head"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('itm')->value['create_time'],'%Y/%m/%d %H:%M');?>
  <span id="hh_<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
"><?php echo $_smarty_tpl->getVariable('itm')->value['say'];?>
</span></div>
		<?php if (!empty($_smarty_tpl->getVariable('itm',null,true,false)->value['parent'])){?>
			<div class="blank">&nbsp;</div>
			<div class="reference">
				<div class="tit"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('itm')->value['parent']['create_time'],'%Y/%m/%d %H:%M');?>
  <?php echo $_smarty_tpl->getVariable('itm')->value['parent']['say'];?>
</div>
				<?php echo $_smarty_tpl->getVariable('itm')->value['parent']['message'];?>

			</div>
		<?php }?>
		<div class="message"><?php echo $_smarty_tpl->getVariable('itm')->value['message'];?>
</div>
		<div class="reply"><a href="#reply" onclick="notebook_reply(<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
)"><?php echo $_smarty_tpl->getVariable('lang')->value['reply'];?>
</a></div>
	</div>	
	<?php }} ?>
	<div style="padding:12px 0px; text-align:center"><?php echo $_smarty_tpl->getVariable('pages')->value;?>
</div>
<?php }else{ ?>
	<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div>
<?php }?>