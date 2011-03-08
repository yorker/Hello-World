<?php /* Smarty version Smarty-3.0.7, created on 2011-02-26 13:35:54
         compiled from "D:\www\v30\administrator\views\elements/top_menu.html" */ ?>
<?php /*%%SmartyHeaderCode:105454d68913a90f732-91850678%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6c1a789f0d39cddd26f555b3b629d325e24b88b' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\elements/top_menu.html',
      1 => 1298375080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105454d68913a90f732-91850678',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_page')) include 'D:\www\v30\administrator\plugins\function.load_page.php';
?><?php if (!empty($_smarty_tpl->getVariable('top_menu',null,true,false)->value)){?>
<ul id="topmenu">
	<?php  $_smarty_tpl->tpl_vars["top"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('top_menu')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["top"]->key => $_smarty_tpl->tpl_vars["top"]->value){
?>
		<?php if ($_smarty_tpl->getVariable('admin')->value['admin_rank']>=$_smarty_tpl->getVariable('top')->value['rank']){?>
			<li class="node">
				<?php echo smarty_function_load_page(array('href'=>$_smarty_tpl->getVariable('top')->value['url'],'link'=>$_smarty_tpl->getVariable('top')->value['name']),$_smarty_tpl);?>

				<?php if (!empty($_smarty_tpl->getVariable('top',null,true,false)->value['sub'])){?>
					<ul>
						<?php  $_smarty_tpl->tpl_vars["sub1"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('top')->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["sub1"]->key => $_smarty_tpl->tpl_vars["sub1"]->value){
?>
							<?php if ($_smarty_tpl->getVariable('admin')->value['admin_rank']>=$_smarty_tpl->getVariable('sub1')->value['rank']){?>
								<?php if (!empty($_smarty_tpl->getVariable('sub1',null,true,false)->value['sub'])){?>
									<li class="subnode">								
										<?php echo smarty_function_load_page(array('href'=>$_smarty_tpl->getVariable('sub1')->value['url'],'link'=>$_smarty_tpl->getVariable('sub1')->value['name'],'class'=>"arrow"),$_smarty_tpl);?>

										<ul>
											<?php  $_smarty_tpl->tpl_vars["sub2"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sub1')->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["sub2"]->key => $_smarty_tpl->tpl_vars["sub2"]->value){
?>
												<?php if ($_smarty_tpl->getVariable('admin')->value['admin_rank']>=$_smarty_tpl->getVariable('sub2')->value['rank']){?><li><?php echo smarty_function_load_page(array('href'=>$_smarty_tpl->getVariable('sub2')->value['url'],'link'=>$_smarty_tpl->getVariable('sub2')->value['name']),$_smarty_tpl);?>
</li><?php }?>
											<?php }} ?>
										</ul>								
									</li>
								<?php }else{ ?>
									<li><?php echo smarty_function_load_page(array('href'=>$_smarty_tpl->getVariable('sub1')->value['url'],'link'=>$_smarty_tpl->getVariable('sub1')->value['name']),$_smarty_tpl);?>
</li>
								<?php }?>
							<?php }?>
						<?php }} ?>					
					</ul>
				<?php }?>
			</li>
		<?php }?>
	<?php }} ?>
</ul>
<?php }?>