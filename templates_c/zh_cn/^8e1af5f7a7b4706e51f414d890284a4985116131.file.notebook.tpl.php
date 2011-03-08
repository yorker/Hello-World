<?php /* Smarty version Smarty-3.0.7, created on 2011-03-02 09:45:40
         compiled from "templates\index/notebook.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45584d6da144d46428-99921493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e1af5f7a7b4706e51f414d890284a4985116131' => 
    array (
      0 => 'templates\\index/notebook.tpl',
      1 => 1299030330,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45584d6da144d46428-99921493',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
?><?php echo $_smarty_tpl->getVariable('top_position')->value;?>

<?php $_template = new Smarty_Internal_Template("inner.left.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<script type="text/javascript" src="<?php echo @ROOT_URL;?>
kindeditor/kindeditor.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	notebook_load_submit_area();
	pagination("<?php echo smarty_function_app_url(array('url'=>'Index/notebookPage'),$_smarty_tpl);?>
");
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
