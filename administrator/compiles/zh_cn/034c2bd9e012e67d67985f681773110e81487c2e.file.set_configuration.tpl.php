<?php /* Smarty version Smarty-3.0.7, created on 2011-02-25 14:04:29
         compiled from "D:\www\v30\administrator\views\system/set_configuration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142944d67466d0ca922-99727669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '034c2bd9e012e67d67985f681773110e81487c2e' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\system/set_configuration.tpl',
      1 => 1298091693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142944d67466d0ca922-99727669',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_radio')) include 'D:\www\v30\administrator\plugins\function.radio.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
?><div class="tab_list">	
	<div class="tabs">
		<?php  $_smarty_tpl->tpl_vars["category"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categories')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cname"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["category"]->key => $_smarty_tpl->tpl_vars["category"]->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cname"]['iteration']++;
?>
			<label class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['cname']['iteration']==$_smarty_tpl->getVariable('num')->value){?>tab_current<?php }?>" onclick="tab(this, 'tab_current')"><?php echo $_smarty_tpl->getVariable('category')->value['name'];?>
</label>
		<?php }} ?>		
	</div>	
	<ul>
		<?php  $_smarty_tpl->tpl_vars["category"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categories')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cname"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["category"]->key => $_smarty_tpl->tpl_vars["category"]->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cname"]['iteration']++;
?>
			<li style="display:<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['cname']['iteration']==$_smarty_tpl->getVariable('num')->value){?>block<?php }else{ ?>none<?php }?>">
				<form action="<?php echo smarty_function_app_url(array('url'=>'system/setConfiguration'),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php echo smarty_function_app_url(array('url'=>('system/setConfiguration?num=').($_smarty_tpl->getVariable('smarty')->value['foreach']['cname']['iteration'])),$_smarty_tpl);?>
')">
					<div class="adminform">
					<div class="f_title"><?php echo $_smarty_tpl->getVariable('category')->value['name'];?>
</div>
					<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('category')->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
						<?php if ($_smarty_tpl->getVariable('itm')->value['type']=='bool'){?>
							<?php echo smarty_function_radio(array('label'=>$_smarty_tpl->getVariable('itm')->value['conf_name'],'name'=>($_smarty_tpl->getVariable('itm')->value['conf_key']).('_cflag'),'value'=>$_smarty_tpl->getVariable('itm')->value['value'],'checked'=>$_smarty_tpl->getVariable('itm')->value['conf_value'],'note'=>$_smarty_tpl->getVariable('itm')->value['description']),$_smarty_tpl);?>

						<?php }elseif($_smarty_tpl->getVariable('itm')->value['type']=='digit'){?>
							<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('itm')->value['conf_name'],'name'=>($_smarty_tpl->getVariable('itm')->value['conf_key']).('_cflag'),'value'=>$_smarty_tpl->getVariable('itm')->value['conf_value'],'size'=>"S",'note'=>$_smarty_tpl->getVariable('itm')->value['description']),$_smarty_tpl);?>

						<?php }else{ ?>
							<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('itm')->value['conf_name'],'name'=>($_smarty_tpl->getVariable('itm')->value['conf_key']).('_cflag'),'value'=>$_smarty_tpl->getVariable('itm')->value['conf_value'],'size'=>"M",'note'=>$_smarty_tpl->getVariable('itm')->value['description']),$_smarty_tpl);?>

						<?php }?>
					<?php }} ?>					
					<?php echo smarty_function_submit(array('value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

					</div>
				</form>
			</li>
		<?php }} ?>		
	</ul>
	<div class="sys_conf_update_cache_file"><input type="button" class="btn" value="<?php echo $_smarty_tpl->getVariable('lang')->value['update_cache_file'];?>
" onclick="update_sys_config_cache_file(this, '<?php echo smarty_function_app_url(array('url'=>'system/ajaxUpdateCacheFile'),$_smarty_tpl);?>
')"/></div>
</div>