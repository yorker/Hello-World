<?php /* Smarty version Smarty-3.0.7, created on 2011-03-02 10:23:17
         compiled from "D:\www\v30\administrator\views\product/list_product_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132484d6daa155042c6-24290314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df42b01f7af5fd4889de9b37df5b5982d33f02d6' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\product/list_product_page.tpl',
      1 => 1298807764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132484d6daa155042c6-24290314',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_admin_switcher')) include 'D:\www\v30\administrator\plugins\function.admin_switcher.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_admin_edit')) include 'D:\www\v30\administrator\plugins\function.admin_edit.php';
if (!is_callable('smarty_function_admin_trash')) include 'D:\www\v30\administrator\plugins\function.admin_trash.php';
if (!is_callable('smarty_function_admin_delete')) include 'D:\www\v30\administrator\plugins\function.admin_delete.php';
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?><table class="adminlist" cellspacing="1">	<thead>		<tr>			<th width="30"><input type="checkbox" onclick="checkAll(this, 'chkflag')" title="<?php echo $_smarty_tpl->getVariable('lang')->value['check_all_none'];?>
"/></th>			<th><?php echo $_smarty_tpl->getVariable('lang')->value['name'];?>
</th>                    <th><?php echo $_smarty_tpl->getVariable('lang')->value['basic_info'];?>
</th>          <th width="80"><?php echo $_smarty_tpl->getVariable('lang')->value['price'];?>
</th>			<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['is_best'];?>
</th>			<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['is_new'];?>
</th>			<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['is_hot'];?>
</th>			<th width="60"><?php echo $_smarty_tpl->getVariable('lang')->value['ordering'];?>
</th>			<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['published'];?>
</th>          <th width="60"><?php echo $_smarty_tpl->getVariable('lang')->value['product_number'];?>
</th>			<th width="80"><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
</th>		</tr>	</thead>	<tbody>		<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']++;
?>		<tr class="row<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['iteration']%2;?>
">			<td align="center"><input type="checkbox" name="cid" class="chkflag" value="<?php echo $_smarty_tpl->getVariable('itm')->value['product_id'];?>
"/></td>			<td>				<div class="dyna_edit" onclick="loadEdit(this, 'products', 'product_name', '<?php echo $_smarty_tpl->getVariable('itm')->value['product_id'];?>
', 0)"><?php echo $_smarty_tpl->getVariable('itm')->value['product_name'];?>
</div>			</td>			<td align="center">            <?php if ($_smarty_tpl->getVariable('itm')->value['product_sn']>''){?>                <a href="javascript:void(0)" onmouseover="hint('<?php echo $_smarty_tpl->getVariable('lang')->value['product_sn'];?>
')" onmouseout="nd()"><?php echo $_smarty_tpl->getVariable('itm')->value['product_sn'];?>
</a>/            <?php }?>            <?php if ($_smarty_tpl->getVariable('itm')->value['product_thumb']>''){?><a href="javascript:void(0)" onmouseover="showImg('<?php echo @UPLOAD_URL;?>
<?php echo $_smarty_tpl->getVariable('itm')->value['product_thumb'];?>
')" onmouseout="nd()"><?php echo $_smarty_tpl->getVariable('lang')->value['image'];?>
</a>/<?php }?>            <a href="javascript:void(0)" onmouseover="hint('<?php echo $_smarty_tpl->getVariable('lang')->value['gallery_num'];?>
')" onmouseout="nd()"><?php echo $_smarty_tpl->getVariable('itm')->value['gallery_num'];?>
</a> /            <a href="javascript:void(0)" onmouseover="hint('<?php echo $_smarty_tpl->getVariable('lang')->value['belong_cat'];?>
')" onmouseout="nd()"><?php echo $_smarty_tpl->getVariable('itm')->value['cat_name'];?>
</a>          </td>          <td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'products', 'price', '<?php echo $_smarty_tpl->getVariable('itm')->value['product_id'];?>
', 1)"><?php echo $_smarty_tpl->getVariable('itm')->value['price'];?>
</div></td>			<td align="center"><?php echo smarty_function_admin_switcher(array('t'=>"products",'f'=>"is_best",'value'=>$_smarty_tpl->getVariable('itm')->value['is_best'],'id'=>$_smarty_tpl->getVariable('itm')->value['product_id']),$_smarty_tpl);?>
</td>			<td align="center"><?php echo smarty_function_admin_switcher(array('t'=>"products",'f'=>"is_new",'value'=>$_smarty_tpl->getVariable('itm')->value['is_new'],'id'=>$_smarty_tpl->getVariable('itm')->value['product_id']),$_smarty_tpl);?>
</td>			<td align="center"><?php echo smarty_function_admin_switcher(array('t'=>"products",'f'=>"is_hot",'value'=>$_smarty_tpl->getVariable('itm')->value['is_hot'],'id'=>$_smarty_tpl->getVariable('itm')->value['product_id']),$_smarty_tpl);?>
</td>			<td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'products', 'ordering', '<?php echo $_smarty_tpl->getVariable('itm')->value['product_id'];?>
', 1, 's')"><?php echo $_smarty_tpl->getVariable('itm')->value['ordering'];?>
</div></td>			<td align="center"><?php echo smarty_function_admin_switcher(array('t'=>"products",'f'=>"published",'value'=>$_smarty_tpl->getVariable('itm')->value['published'],'id'=>$_smarty_tpl->getVariable('itm')->value['product_id']),$_smarty_tpl);?>
</td>          <td align="center">            <div class="dyna_edit" onclick="loadEdit(this, 'products', 'product_number', '<?php echo $_smarty_tpl->getVariable('itm')->value['product_id'];?>
', 1)"><?php echo $_smarty_tpl->getVariable('itm')->value['product_number'];?>
</div>          </td>			<td align="center">				<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url(("product/writeProduct?cat_id=").($_smarty_tpl->getVariable('cat_id')->value)),'id'=>$_smarty_tpl->getVariable('itm')->value['product_id']),$_smarty_tpl);?>
				<?php echo smarty_function_admin_trash(array('t'=>"products",'f'=>"is_deleted",'v'=>"1",'id'=>$_smarty_tpl->getVariable('itm')->value['product_id'],'url'=>$_smarty_tpl->getVariable('here')->value,'is_page'=>'1'),$_smarty_tpl);?>
				<?php echo smarty_function_admin_delete(array('t'=>"products",'id'=>$_smarty_tpl->getVariable('itm')->value['product_id'],'url'=>"product/listProduct",'image'=>"product_img",'req_url'=>smarty_modifier_app_url("product/procDeleteProduct")),$_smarty_tpl);?>
			</td>		</tr>		<?php }} ?>	</tbody>	<tfoot>		<tr>			<td colspan="11">				<div class="clearfix">					<div class="fl">						<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['delete'];?>
" class="btn" onclick="batchDeleteByCheckbox('products', 'chkflag', '<?php echo smarty_function_app_url(array('url'=>'product/listProduct'),$_smarty_tpl);?>
', '', 'product_img', '<?php echo smarty_function_app_url(array('url'=>'product/procDeleteProduct'),$_smarty_tpl);?>
')"/>&nbsp;						<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['trash'];?>
" class="btn" onclick="batchUpdateByCheckbox('products', 'is_deleted', '1', 'chkflag', '<?php echo smarty_function_app_url(array('url'=>'product/listProduct'),$_smarty_tpl);?>
')"/>						&nbsp;						<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['move_to'];?>
" class="btn" onclick="if($('.chkflag:checked').length>0) openAjaxWin('<?php echo smarty_function_app_url(array('url'=>'product/listProduct?act=batch_move'),$_smarty_tpl);?>
', 300, 180); else alert('<?php echo $_smarty_tpl->getVariable('lang')->value['please_choose_the_operation_option'];?>
');"/>					</div>					<div class="fr"><?php echo $_smarty_tpl->getVariable('pages')->value;?>
</div>				</div>			</td>		</tr>	</tfoot>	</table><?php }else{ ?>	<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div><?php }?>