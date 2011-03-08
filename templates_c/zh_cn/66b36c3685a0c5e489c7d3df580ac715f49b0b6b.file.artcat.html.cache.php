<?php /* Smarty version Smarty-3.0.7, created on 2011-02-22 21:36:21
         compiled from "templates\artcat.html" */ ?>
<?php /*%%SmartyHeaderCode:33904d63bbd50f7314-87733923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66b36c3685a0c5e489c7d3df580ac715f49b0b6b' => 
    array (
      0 => 'templates\\artcat.html',
      1 => 1295786792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33904d63bbd50f7314-87733923',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\www\v40\core\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php echo $_smarty_tpl->getVariable('top_position')->value;?>

<?php $_template = new Smarty_Internal_Template("inner.left.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div class="cat_article">
	<h2><?php echo $_smarty_tpl->getVariable('cat_name')->value;?>
</h2>
	<?php if (!empty($_smarty_tpl->getVariable('articles',null,true,false)->value)){?>
		<ul>
			<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('articles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
				<li class="clearfix">
					<div class="fl">
						<a href="<?php echo $_smarty_tpl->getVariable('itm')->value['caturl'];?>
"><span>[</span><?php echo $_smarty_tpl->getVariable('itm')->value['cat_name'];?>
<span>]</span></a>&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('itm')->value['arturl'];?>
" title="<?php echo $_smarty_tpl->getVariable('itm')->value['title'];?>
"<?php if ($_smarty_tpl->getVariable('itm')->value['open_type']==1){?> target="_blank"<?php }?>><?php echo $_smarty_tpl->getVariable('itm')->value['title'];?>
</a>
					</div>
					<div class="fr">
						<?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('itm')->value['create_time'],'%Y-%m-%d');?>

					</div>
				</li>
			<?php }} ?>
		</ul>
		<?php echo $_smarty_tpl->getVariable('pages')->value;?>

	<?php }else{ ?>
		<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div>
	<?php }?>
</div>
	
<?php $_template = new Smarty_Internal_Template("inner.right.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>