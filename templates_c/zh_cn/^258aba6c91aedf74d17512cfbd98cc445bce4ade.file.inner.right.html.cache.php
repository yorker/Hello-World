<?php /* Smarty version Smarty-3.0.7, created on 2011-03-02 08:55:58
         compiled from "templates\inner.right.html" */ ?>
<?php /*%%SmartyHeaderCode:31654d6d959ecbd706-13771864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '258aba6c91aedf74d17512cfbd98cc445bce4ade' => 
    array (
      0 => 'templates\\inner.right.html',
      1 => 1290498558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31654d6d959ecbd706-13771864',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	</div>
	<div class="fr_wrap">
		<div class="fr_inner_wrap">
			<div class="module">
				<h2><?php echo $_smarty_tpl->getVariable('lang')->value['art_category'];?>
 <span>Categories</span></h2>
				<div class="body">
					<ul class="list">
						<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('user_cats')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
							<li><a href="<?php echo $_smarty_tpl->getVariable('itm')->value['caturl'];?>
"><?php echo $_smarty_tpl->getVariable('itm')->value['cat_name'];?>
</a></li>
						<?php }} ?>
					</ul>
				</div>
			</div>
			<div class="blank">&nbsp;</div>
			<div class="module">
				<h2><?php echo $_smarty_tpl->getVariable('lang')->value['download_nav'];?>
 <span>Download Navigation</span></h2>
				<div class="body">
					<ul class="list">
						<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('download_cat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
							<li><a href="<?php echo $_smarty_tpl->getVariable('itm')->value['caturl'];?>
"><?php echo $_smarty_tpl->getVariable('itm')->value['name'];?>
</a></li>
						<?php }} ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>