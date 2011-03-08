<?php /* Smarty version Smarty-3.0.7, created on 2011-03-01 21:52:48
         compiled from "templates\dlist.html" */ ?>
<?php /*%%SmartyHeaderCode:270964d6cfa305f37b8-48883062%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bfee6bc7eb6f75df12a7a2f1fe078221bb98345' => 
    array (
      0 => 'templates\\dlist.html',
      1 => 1290498480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '270964d6cfa305f37b8-48883062',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php echo $_smarty_tpl->getVariable('top_position')->value;?>

<?php $_template = new Smarty_Internal_Template("inner.left.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div class="cat_article">
	<h2><?php echo $_smarty_tpl->getVariable('cat_name')->value;?>
</h2>
	<?php if (!empty($_smarty_tpl->getVariable('downloads',null,true,false)->value)){?>
	<ul>
		<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('downloads')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
			<li class="clearfix">
				<div class="fl">
					<a href="<?php echo $_smarty_tpl->getVariable('itm')->value['caturl'];?>
"><span>[</span><?php echo $_smarty_tpl->getVariable('itm')->value['cat_name'];?>
<span>]</span></a>&nbsp;<?php echo $_smarty_tpl->getVariable('itm')->value['name'];?>
&nbsp;&nbsp;[<?php echo $_smarty_tpl->getVariable('itm')->value['filesize'];?>
]
				</div>
				<div class="fr">
					<a href="dlist.php?action=download&did=<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('lang')->value['download'];?>
</a>&nbsp;&nbsp;
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
	
<?php $_template = new Smarty_Internal_Template("inner.right.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>