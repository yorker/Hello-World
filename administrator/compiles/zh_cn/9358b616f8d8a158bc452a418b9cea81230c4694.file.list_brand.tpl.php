<?php /* Smarty version Smarty-3.0.7, created on 2011-02-26 22:10:57
         compiled from "D:\www\v30\administrator\views\product/list_brand.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173594d6909f1843ff3-30826695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9358b616f8d8a158bc452a418b9cea81230c4694' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\product/list_brand.tpl',
      1 => 1298729446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173594d6909f1843ff3-30826695',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_admin_edit')) include 'D:\www\v30\administrator\plugins\function.admin_edit.php';
if (!is_callable('smarty_function_admin_delete')) include 'D:\www\v30\administrator\plugins\function.admin_delete.php';
?><table class="adminlist" cellspacing="1">
    <thead>
        <tr>
            <th width="40"><input type="checkbox" onclick="checkAll(this, 'chkflag')"/></th>
            <th><?php echo $_smarty_tpl->getVariable('lang')->value['name'];?>
</th>            
            <th><?php echo $_smarty_tpl->getVariable('lang')->value['website'];?>
</th>
            <th><?php echo $_smarty_tpl->getVariable('lang')->value['description'];?>
</th>
            <th width="60"><?php echo $_smarty_tpl->getVariable('lang')->value['ordering'];?>
</th>
            <th width="80"><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
</th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['itm'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['itm']->iteration=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['itm']->key => $_smarty_tpl->tpl_vars['itm']->value){
 $_smarty_tpl->tpl_vars['itm']->iteration++;
?>
        <tr class="row<?php echo $_smarty_tpl->tpl_vars['itm']->iteration%2;?>
">
            <td align="center"><input type="checkbox" name="id" value="<?php echo $_smarty_tpl->tpl_vars['itm']->value['brand_id'];?>
" class="chkflag"/></td>
            <td><?php echo $_smarty_tpl->tpl_vars['itm']->value['brand_name'];?>
<?php if ($_smarty_tpl->tpl_vars['itm']->value['logo']){?> <img src="images/picflag.gif" border="0" onmouseover="showImg('<?php echo @UPLOAD_URL;?>
<?php echo $_smarty_tpl->tpl_vars['itm']->value['logo'];?>
')" onmouseout="nd();"/><?php }?></td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['itm']->value['website'])===null||$tmp==='' ? '--' : $tmp);?>
</td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['itm']->value['description'])===null||$tmp==='' ? '-' : $tmp);?>
</td>
            <td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'product_brand', 'ordering', '<?php echo $_smarty_tpl->tpl_vars['itm']->value['brand_id'];?>
', 1, 's')"><?php echo $_smarty_tpl->tpl_vars['itm']->value['ordering'];?>
</div></td>
            <td align="center">
                <?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url("product/writeBrand"),'id'=>$_smarty_tpl->tpl_vars['itm']->value['brand_id']),$_smarty_tpl);?>

                <?php echo smarty_function_admin_delete(array('t'=>"product_brand",'id'=>$_smarty_tpl->tpl_vars['itm']->value['brand_id'],'url'=>"product/listBrand",'image'=>"logo"),$_smarty_tpl);?>

            </td>
        </tr>
        <?php }} ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6"><input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['batch_delete'];?>
" class="btn" onclick="batchDeleteByCheckbox('product_brand', 'chkflag', '<?php echo smarty_function_app_url(array('url'=>'product/listBrand'),$_smarty_tpl);?>
', '', 'logo')"/></td>
        </tr>
    </tfoot>
</table>