<?php /* Smarty version Smarty-3.0.7, created on 2011-03-01 23:07:39
         compiled from "templates\search.html" */ ?>
<?php /*%%SmartyHeaderCode:274944d6d0bbbd8bfe8-81426364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bd2ce3355da12f98a93e245700a2e77c75156b8' => 
    array (
      0 => 'templates\\search.html',
      1 => 1290497708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '274944d6d0bbbd8bfe8-81426364',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\www\v30\core\Engine\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php echo $_smarty_tpl->getVariable('top_position')->value;?>

<?php $_template = new Smarty_Internal_Template("inner.left.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="search">
	<form action="search.php" method="post" onsubmit="return checkf(this)">
	<div class="fl"><input type="text" name="keyword" value="<?php echo $_smarty_tpl->getVariable('keyword')->value;?>
" id="search_key" onkeyup="show_down_menu(this, 'article', 'title', 'menudown', 'search_key')" autocomplete="off"/>&nbsp;&nbsp;</div>
	<div class="fl"><input type="image" src="images/search.gif" /></div>	
	</form>
</div>
<div id="menudown" style="display:none"></div>
<div class="blank">&nbsp;</div>
<div class="cat_article">
	<h2><span class="red"><?php echo $_smarty_tpl->getVariable('keyword')->value;?>
</span> <?php echo $_smarty_tpl->getVariable('lang')->value['search_result'];?>
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
"><?php echo $_smarty_tpl->getVariable('itm')->value['title'];?>
</a>
				</div>
				<div class="fr">
					<?php echo smarty_modifier_date_format((($tmp = @smarty_modifier_date_format($_smarty_tpl->getVariable('itm')->value['update_time'],'%Y-%m-%d %H:%M:%S'))===null||$tmp==='' ? $_smarty_tpl->getVariable('itm')->value['create_time'] : $tmp),'%Y-%m-%d %H:%M:%S');?>

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