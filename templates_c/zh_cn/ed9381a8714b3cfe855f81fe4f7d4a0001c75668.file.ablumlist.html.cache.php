<?php /* Smarty version Smarty-3.0.7, created on 2011-02-22 21:36:15
         compiled from "templates\ablumlist.html" */ ?>
<?php /*%%SmartyHeaderCode:92024d63bbcfad18c9-92075548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed9381a8714b3cfe855f81fe4f7d4a0001c75668' => 
    array (
      0 => 'templates\\ablumlist.html',
      1 => 1290497850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92024d63bbcfad18c9-92075548',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php echo $_smarty_tpl->getVariable('top_position')->value;?>

<?php if (!empty($_smarty_tpl->getVariable('cats',null,true,false)->value)){?>
	<div class="ablum_cat">
		<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cats')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["itm"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["itm"]->iteration=0;
if ($_smarty_tpl->tpl_vars["itm"]->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
 $_smarty_tpl->tpl_vars["itm"]->iteration++;
 $_smarty_tpl->tpl_vars["itm"]->last = $_smarty_tpl->tpl_vars["itm"]->iteration === $_smarty_tpl->tpl_vars["itm"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['last'] = $_smarty_tpl->tpl_vars["itm"]->last;
?>
			<label><a href="<?php echo $_smarty_tpl->getVariable('itm')->value['caturl'];?>
"<?php if ($_smarty_tpl->getVariable('itm')->value['cat_id']==$_smarty_tpl->getVariable('cat_id')->value){?> class="bold"<?php }?>><?php echo $_smarty_tpl->getVariable('itm')->value['name'];?>
</a></label>
			<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['last']){?>
				<label>|</label>
			<?php }?>
		<?php }} ?>		
	</div>
<?php }?>
<div class="ablum_list">
	<?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>
	<ul class="clearfix">
		<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
		<li>
			<div class="img"><a href="<?php echo $_smarty_tpl->getVariable('itm')->value['ablumurl'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('upload_url')->value;?>
<?php echo $_smarty_tpl->getVariable('itm')->value['cover_img'];?>
" border="0"/></a></div>
			<div class="item"><center><strong><a href="<?php echo $_smarty_tpl->getVariable('itm')->value['ablumurl'];?>
"><?php echo $_smarty_tpl->getVariable('itm')->value['title'];?>
</a>[<?php echo $_smarty_tpl->getVariable('itm')->value['pic_num'];?>
]</strong></center></div>
			<div class="item"><?php echo $_smarty_tpl->getVariable('lang')->value['category'];?>
:<a href="<?php echo $_smarty_tpl->getVariable('itm')->value['caturl'];?>
"><?php echo $_smarty_tpl->getVariable('itm')->value['name'];?>
</a></div>
		</li>
		<?php }} ?>
	</ul>
	<?php echo $_smarty_tpl->getVariable('pages')->value;?>

	<?php }else{ ?>
		<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div>
	<?php }?>
</div>
<?php $_template = new Smarty_Internal_Template("footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>