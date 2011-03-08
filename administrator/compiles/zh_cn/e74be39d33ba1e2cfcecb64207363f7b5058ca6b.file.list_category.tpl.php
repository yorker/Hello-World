<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 14:37:48
         compiled from "D:\www\v30\administrator\views\article/list_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:252104d65fcbcdb5d85-48097303%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e74be39d33ba1e2cfcecb64207363f7b5058ca6b' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\article/list_category.tpl',
      1 => 1298098211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '252104d65fcbcdb5d85-48097303',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_modifier_pcat')) include 'D:\www\v30\administrator\plugins\modifier.pcat.php';
if (!is_callable('smarty_function_load_page')) include 'D:\www\v30\administrator\plugins\function.load_page.php';
if (!is_callable('smarty_function_admin_view')) include 'D:\www\v30\administrator\plugins\function.admin_view.php';
if (!is_callable('smarty_function_admin_edit')) include 'D:\www\v30\administrator\plugins\function.admin_edit.php';
if (!is_callable('smarty_function_admin_delete')) include 'D:\www\v30\administrator\plugins\function.admin_delete.php';
?><script type="text/javascript">
function fold_and_unfold(aobj) {
	var e_fold_all = '<?php echo $_smarty_tpl->getVariable('lang')->value['fold_all'];?>
';
	var e_unfold_all = '<?php echo $_smarty_tpl->getVariable('lang')->value['unfold_all'];?>
';
	if(aobj.className == 'flag_fold') {
		fold_all(0);
		aobj.className = '';
		aobj.innerHTML = e_fold_all;
	} else {
		fold_all(1);
		aobj.className = 'flag_fold';
		aobj.innerHTML = e_unfold_all;
	}
}
</script>
<div class="op_bar clearfix">
	<div class="fl">
		<a href="javascript:void(0)" onclick="fold_and_unfold(this)" class="flag_fold"><?php echo $_smarty_tpl->getVariable('lang')->value['unfold_all'];?>
</a>
	</div>
	<div class="fr"><a href="javascript:void(0)" onclick="openAjaxWin('<?php echo smarty_function_app_url(array('url'=>'article/writeBatchCategory'),$_smarty_tpl);?>
', 550, 330)"><?php echo $_smarty_tpl->getVariable('lang')->value['batch_add_cat'];?>
</a></div>
</div>

<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['id'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['name'];?>
</th>
		<th width="100"><?php echo $_smarty_tpl->getVariable('lang')->value['art_number'];?>
</th>
		<th width="100"><?php echo $_smarty_tpl->getVariable('lang')->value['ordering'];?>
</th>
		<th width="150"><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
</th>		
	</tr>	
</thead>
<tbody>
	<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["lname"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["lname"]['iteration']++;
?>
	<tr class="<?php if ($_smarty_tpl->getVariable('itm')->value['is_terminal']==0){?>row2<?php }else{ ?>row<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['lname']['iteration']%2;?>
<?php }?> parent_<?php echo $_smarty_tpl->getVariable('itm')->value['parent_id'];?>
">
		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['cat_id'];?>
</td>
		<td<?php if ($_smarty_tpl->getVariable('itm')->value['is_terminal']==0){?> class="red"<?php }?>>
			<?php echo smarty_function_load_page(array('link'=>$_smarty_tpl->getVariable('itm')->value['cat_name'],'href'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('itm')->value['cat_id'],'article/listArticle?cat_id='))),$_smarty_tpl);?>

			&nbsp;
			<?php if ($_smarty_tpl->getVariable('itm')->value['is_terminal']==0){?><img src="images/jian.gif" title="<?php echo $_smarty_tpl->getVariable('lang')->value['fold'];?>
/<?php echo $_smarty_tpl->getVariable('lang')->value['unfold'];?>
" border="0" onclick="cat_switch(this, '<?php echo $_smarty_tpl->getVariable('itm')->value['plist'];?>
', '<?php echo $_smarty_tpl->getVariable('itm')->value['cat_id'];?>
')"/><?php }?>
		</td>
		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['art_num'];?>
</td>
		<td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'article_cat', 'ordering', '<?php echo $_smarty_tpl->getVariable('itm')->value['cat_id'];?>
', 1, 's')"><?php echo $_smarty_tpl->getVariable('itm')->value['ordering'];?>
</div></td>
		<td align="center">
			<?php echo smarty_function_admin_view(array('href'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('itm')->value['cat_id'],'article/listArticle?cat_id='))),$_smarty_tpl);?>

			<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url("article/writeCategory"),'id'=>$_smarty_tpl->getVariable('itm')->value['cat_id']),$_smarty_tpl);?>

			<?php if ($_smarty_tpl->getVariable('itm')->value['art_num']==0){?><?php echo smarty_function_admin_delete(array('t'=>"article_cat",'url'=>smarty_modifier_app_url("article/listCategory"),'id'=>$_smarty_tpl->getVariable('itm')->value['cat_id']),$_smarty_tpl);?>
<?php }?>
		</td>
	</tr>
	<?php }} else { ?>
	<tr>
		<td colspan="4" align="center"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</td>
	</tr>
	<?php } ?>
</tbody>
</table>