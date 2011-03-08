<?php /* Smarty version Smarty-3.0.7, created on 2011-02-22 21:36:27
         compiled from "templates\notebook.html" */ ?>
<?php /*%%SmartyHeaderCode:12144d63bbdb1bf549-50683708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '057d1f7f309a0a941f7bf653fda6529db8673480' => 
    array (
      0 => 'templates\\notebook.html',
      1 => 1292996430,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12144d63bbdb1bf549-50683708',
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
<script type="text/javascript" src="kindeditor/kindeditor.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	notebook_load_submit_area();
	pagination('loading.php?action=notebook_load_content');
});
</script>
<div class="notebook">
	<h2><?php echo $_smarty_tpl->getVariable('lang')->value['notebook'];?>
</h2>
	<div class="blank">&nbsp;</div>
	
	<div id="pagination_show"></div>		
	
	<div class="blank">&nbsp;</div>
	<div class="blank">&nbsp;</div>
	
	<div id="submit_area_id"><img border="0" src="images/loading.gif"/></div>
	
	<div class="blank">&nbsp;</div>
	<div class="blank">&nbsp;</div>
	<?php if (empty($_smarty_tpl->getVariable('user',null,true,false)->value['user_id'])){?>
		<div class="tip_login">
			<?php echo $_smarty_tpl->getVariable('lang')->value['notebook_please_login'];?>
&nbsp;
			<a href="tb_login.php?width=400&height=280&KeepThis=true&TB_iframe=true&modal=true" class="thickbox"><span style="color:#00EE00"><?php echo $_smarty_tpl->getVariable('lang')->value['login'];?>
</span></a>--<a href="tb_register.php?width=400&height=350&KeepThis=true&TB_iframe=true&modal=true" class="thickbox"><?php echo $_smarty_tpl->getVariable('lang')->value['quick_register'];?>
</a>
		</div>
	<?php }?>
</div>

<?php $_template = new Smarty_Internal_Template("inner.right.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
