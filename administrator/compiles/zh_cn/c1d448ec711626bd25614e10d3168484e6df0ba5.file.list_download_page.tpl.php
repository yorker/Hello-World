<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 17:09:36
         compiled from "D:\www\v30\administrator\views\download/list_download_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209904d6620507c6ff0-52789228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1d448ec711626bd25614e10d3168484e6df0ba5' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\download/list_download_page.tpl',
      1 => 1298043339,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209904d6620507c6ff0-52789228',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_tb_inline')) include 'D:\www\v30\administrator\plugins\function.tb_inline.php';
if (!is_callable('smarty_function_admin_switcher')) include 'D:\www\v30\administrator\plugins\function.admin_switcher.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_admin_edit')) include 'D:\www\v30\administrator\plugins\function.admin_edit.php';
if (!is_callable('smarty_function_admin_delete')) include 'D:\www\v30\administrator\plugins\function.admin_delete.php';
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>
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
" class="chkflag"/></td>
')"><?php echo $_smarty_tpl->getVariable('itm')->value['name'];?>
</div>
</td>			
</td>
</td>

', '1')"><?php echo $_smarty_tpl->getVariable('itm')->value['ordering'];?>
</div></td>
</td>


" href="<?php echo smarty_function_app_url(array('url'=>('download/getDownload?id=').($_smarty_tpl->getVariable('itm')->value['id'])),$_smarty_tpl);?>
" target="_blank"><img src="images/icon_download.jpg" border="0"/></a>
" class="btn" onclick="batchDeleteByCheckbox('download', 'chkflag', '<?php echo smarty_function_app_url(array('url'=>('download/listDownload?cat_id=').($_smarty_tpl->getVariable('cat_id')->value)),$_smarty_tpl);?>
', '', 'path')"/>
</div>
</div>