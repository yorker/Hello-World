<?php /* Smarty version Smarty-3.0.7, created on 2011-03-01 21:46:50
         compiled from "templates\index/artcat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65594d6cf8cae35484-69496520%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84da53e20311fb4cf1885800d9e8d73e1c7c6be8' => 
    array (
      0 => 'templates\\index/artcat.tpl',
      1 => 1298986941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65594d6cf8cae35484-69496520',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\www\v30\core\Engine\plugins\modifier.date_format.php';
?><?php echo $_smarty_tpl->getVariable('top_position')->value;?>

<?php $_template = new Smarty_Internal_Template("inner.left.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
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
	
<?php $_template = new Smarty_Internal_Template("inner.right.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
