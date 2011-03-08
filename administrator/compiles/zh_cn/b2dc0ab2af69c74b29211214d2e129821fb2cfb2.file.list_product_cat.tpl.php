<?php /* Smarty version Smarty-3.0.7, created on 2011-02-26 13:23:57
         compiled from "D:\www\v30\administrator\views\product/list_product_cat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:239454d688e6d2ef9c7-80324400%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2dc0ab2af69c74b29211214d2e129821fb2cfb2' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\product/list_product_cat.tpl',
      1 => 1298697829,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '239454d688e6d2ef9c7-80324400',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_modifier_pcat')) include 'D:\www\v30\administrator\plugins\modifier.pcat.php';
if (!is_callable('smarty_function_load_page')) include 'D:\www\v30\administrator\plugins\function.load_page.php';
if (!is_callable('smarty_function_admin_switcher')) include 'D:\www\v30\administrator\plugins\function.admin_switcher.php';
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
	<div class="fr"><a href="javascript:void(0)" onclick="openAjaxWin('<?php echo smarty_function_app_url(array('url'=>'product/ajaxCatBatchAdd'),$_smarty_tpl);?>
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
		<th width="100"><?php echo $_smarty_tpl->getVariable('lang')->value['product_number'];?>
</th>
		<th width="100"><?php echo $_smarty_tpl->getVariable('lang')->value['ordering'];?>
</th>
		<th width="80"><?php echo $_smarty_tpl->getVariable('lang')->value['published'];?>
</th>
		<th width="100"><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
</th>
	</tr>
</thead>
<tbody>
	<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']++;
?>
	<tr class="<?php if ($_smarty_tpl->getVariable('itm')->value['is_terminal']==0){?>row2<?php }else{ ?>row<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['iteration']%2;?>
<?php }?> parent_<?php echo $_smarty_tpl->getVariable('itm')->value['parent_id'];?>
">
		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['cat_id'];?>
</td>		
		<td<?php if ($_smarty_tpl->getVariable('itm')->value['is_terminal']==0){?> class="red"<?php }?>>			
			<?php if ($_smarty_tpl->getVariable('itm')->value['product_num']>0){?>
				<?php echo smarty_function_load_page(array('link'=>$_smarty_tpl->getVariable('itm')->value['cat_name'],'href'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('itm')->value['cat_id'],'product/listProduct?cat_id='))),$_smarty_tpl);?>

			<?php }else{ ?>
				<?php echo $_smarty_tpl->getVariable('itm')->value['cat_name'];?>

			<?php }?>
			&nbsp;
			<?php if ($_smarty_tpl->getVariable('itm')->value['is_terminal']==0){?><img src="images/jian.gif" border="0" onclick="cat_switch(this, '<?php echo $_smarty_tpl->getVariable('itm')->value['plist'];?>
', '<?php echo $_smarty_tpl->getVariable('itm')->value['cat_id'];?>
')"/><?php }?>			
		</td>
		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['product_num'];?>
</td>
		<td align="center">
			<div class="dyna_edit" onclick="loadEdit(this, 'product_cat', 'ordering', '<?php echo $_smarty_tpl->getVariable('itm')->value['cat_id'];?>
', '1', 's')"><?php echo $_smarty_tpl->getVariable('itm')->value['ordering'];?>
</div>
		</td>
		<td align="center">
			<?php echo smarty_function_admin_switcher(array('t'=>"product_cat",'f'=>"published",'id'=>$_smarty_tpl->getVariable('itm')->value['cat_id'],'value'=>$_smarty_tpl->getVariable('itm')->value['published']),$_smarty_tpl);?>

		</td>
		
		<td align="center">
			<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url("product/writeProductCat"),'id'=>$_smarty_tpl->getVariable('itm')->value['cat_id']),$_smarty_tpl);?>

			<?php if ($_smarty_tpl->getVariable('itm')->value['product_num']==0&&!$_smarty_tpl->getVariable('itm')->value['has_child_cat']){?><?php echo smarty_function_admin_delete(array('t'=>"product_cat",'id'=>$_smarty_tpl->getVariable('itm')->value['cat_id'],'url'=>"product/listProductCat"),$_smarty_tpl);?>
<?php }?>
		</td>
	</tr>
	<?php }} ?>
</tbody>
</table>