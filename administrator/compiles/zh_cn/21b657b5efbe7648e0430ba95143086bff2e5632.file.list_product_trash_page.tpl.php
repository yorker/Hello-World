<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 21:46:30
         compiled from "D:\www\v30\administrator\views\product/list_product_trash_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108584d66613650fd27-97108883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21b657b5efbe7648e0430ba95143086bff2e5632' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\product/list_product_trash_page.tpl',
      1 => 1298527345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108584d66613650fd27-97108883',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_admin_switcher')) include 'D:\www\v30\administrator\plugins\function.admin_switcher.php';
if (!is_callable('smarty_function_admin_trash')) include 'D:\www\v30\administrator\plugins\function.admin_trash.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_admin_delete')) include 'D:\www\v30\administrator\plugins\function.admin_delete.php';
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>	<table class="adminlist" cellspacing="1">	<thead>		<tr>			<th width="30"><input type="checkbox" onclick="checkAll(this, 'chkflag')" title="<?php echo $_smarty_tpl->getVariable('lang')->value['check_all_none'];?>
"/></th>			<th><?php echo $_smarty_tpl->getVariable('lang')->value['name'];?>
</th>			<th width="120"><?php echo $_smarty_tpl->getVariable('lang')->value['belong_cat'];?>
</th>			<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['is_best'];?>
</th>			<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['is_new'];?>
</th>			<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['is_hot'];?>
</th>			<th width="60"><?php echo $_smarty_tpl->getVariable('lang')->value['ordering'];?>
</th>			<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['published'];?>
</th>			<th width="100"><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
</th>		</tr>	</thead>	<tbody>		<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']++;
?>		<tr class="row<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['iteration']%2;?>
">			<td align="center"><input type="checkbox" name="cid" class="chkflag" value="<?php echo $_smarty_tpl->getVariable('itm')->value['product_id'];?>
"/></td>			<td>				<?php echo $_smarty_tpl->getVariable('itm')->value['product_name'];?>
				<?php if ($_smarty_tpl->getVariable('itm')->value['product_thumb']>''){?><img title="" src="images/picflag.gif" border="0" onmouseover="showImg('<?php echo @UPLOAD_URL;?>
<?php echo $_smarty_tpl->getVariable('itm')->value['product_thumb'];?>
')" onmouseout="nd()"/><?php }?>			</td>			<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['cat_name'];?>
</td>			<td align="center"><?php echo smarty_function_admin_switcher(array('t'=>"products",'f'=>"is_best",'value'=>$_smarty_tpl->getVariable('itm')->value['is_best'],'id'=>$_smarty_tpl->getVariable('itm')->value['product_id']),$_smarty_tpl);?>
</td>			<td align="center"><?php echo smarty_function_admin_switcher(array('t'=>"products",'f'=>"is_new",'value'=>$_smarty_tpl->getVariable('itm')->value['is_new'],'id'=>$_smarty_tpl->getVariable('itm')->value['product_id']),$_smarty_tpl);?>
</td>			<td align="center"><?php echo smarty_function_admin_switcher(array('t'=>"products",'f'=>"is_hot",'value'=>$_smarty_tpl->getVariable('itm')->value['is_hot'],'id'=>$_smarty_tpl->getVariable('itm')->value['product_id']),$_smarty_tpl);?>
</td>			<td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'products', 'ordering', '<?php echo $_smarty_tpl->getVariable('itm')->value['product_id'];?>
', 1, 's')"><?php echo $_smarty_tpl->getVariable('itm')->value['ordering'];?>
</div></td>			<td align="center"><?php echo smarty_function_admin_switcher(array('t'=>"products",'f'=>"published",'value'=>$_smarty_tpl->getVariable('itm')->value['published'],'id'=>$_smarty_tpl->getVariable('itm')->value['product_id']),$_smarty_tpl);?>
</td>			<td align="center">				<?php echo smarty_function_admin_trash(array('t'=>"products",'f'=>"is_deleted",'v'=>"0",'id'=>$_smarty_tpl->getVariable('itm')->value['product_id'],'url'=>$_smarty_tpl->getVariable('here')->value,'is_page'=>'1'),$_smarty_tpl);?>
				<?php echo smarty_function_admin_delete(array('t'=>"products",'id'=>$_smarty_tpl->getVariable('itm')->value['product_id'],'url'=>smarty_modifier_app_url("product/listProductTrash"),'image'=>"product_img"),$_smarty_tpl);?>
			</td>		</tr>		<?php }} ?>	</tbody>	<tfoot>		<tr>			<td colspan="9">				<div class="clearfix">					<div class="fl">						<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['delete'];?>
" class="btn" onclick="batchDeleteByCheckbox('products', 'chkflag', '<?php echo smarty_function_app_url(array('url'=>'product/listProductTrash'),$_smarty_tpl);?>
', '', 'product_img')"/>&nbsp;						<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['restore'];?>
" class="btn" onclick="batchUpdateByCheckbox('products', 'is_deleted', '0', 'chkflag', '<?php echo smarty_function_app_url(array('url'=>'product/listProductTrash'),$_smarty_tpl);?>
');"/>					</div>					<div class="fr"><?php echo $_smarty_tpl->getVariable('pages')->value;?>
</div>				</div>			</td>		</tr>	</tfoot>	</table><?php }else{ ?>	<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div><?php }?>