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