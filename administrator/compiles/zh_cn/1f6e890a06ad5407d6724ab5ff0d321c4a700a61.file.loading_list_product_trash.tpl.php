<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 16:43:41
         compiled from "D:\www\v30\administrator\views\product/loading_list_product_trash.tpl" */ ?>
<?php /*%%SmartyHeaderCode:233484d661a3d7b3fb9-15353941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f6e890a06ad5407d6724ab5ff0d321c4a700a61' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\product/loading_list_product_trash.tpl',
      1 => 1298527345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '233484d661a3d7b3fb9-15353941',
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
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>
"/></th>
</th>
</th>
</th>
</th>
</th>
</th>
</th>
</th>
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']++;
?>
">
"/></td>

<?php echo $_smarty_tpl->getVariable('itm')->value['product_thumb'];?>
')" onmouseout="nd()"/><?php }?>
</td>
</td>
</td>
</td>
', 1, 's')"><?php echo $_smarty_tpl->getVariable('itm')->value['ordering'];?>
</div></td>
</td>


" class="btn" onclick="batchDeleteByCheckbox('products', 'chkflag', '<?php echo smarty_function_app_url(array('url'=>'product/listProductTrash'),$_smarty_tpl);?>
', '', 'product_img')"/>&nbsp;
" class="btn" onclick="batchUpdateByCheckbox('products', 'is_deleted', '0', 'chkflag', '<?php echo smarty_function_app_url(array('url'=>'product/listProductTrash'),$_smarty_tpl);?>
');"/>
</div>
</div>