<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 17:08:02
         compiled from "D:\www\v30\administrator\views\picture/list_picture_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:265694d661ff27b8562-87529817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f935251f28e5f84e4d8acd8c78524df9d4312c73' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\picture/list_picture_page.tpl',
      1 => 1298527345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265694d661ff27b8562-87529817',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\www\v30\core\Engine\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_admin_switcher')) include 'D:\www\v30\administrator\plugins\function.admin_switcher.php';
if (!is_callable('smarty_modifier_pcat')) include 'D:\www\v30\administrator\plugins\modifier.pcat.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_admin_edit')) include 'D:\www\v30\administrator\plugins\function.admin_edit.php';
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
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
">
" class="chkflag"/></td>
</td>
<?php echo $_smarty_tpl->getVariable('itm')->value['cover_img_thumb'];?>
" border="0"/></td>
</td>
</td>
</td>
</td>
', '1')"><?php echo $_smarty_tpl->getVariable('itm')->value['ordering'];?>
</div></td>


', '<?php if ($_smarty_tpl->getVariable('cat_id')->value>0){?><?php echo smarty_function_app_url(array('url'=>('picture/listPicture?cat_id=').($_smarty_tpl->getVariable('cat_id')->value)),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_app_url(array('url'=>'picture/listPicture'),$_smarty_tpl);?>
<?php }?>')"><img src="images/icon_drop.gif" border="0"/></a>
" onclick="delete_pic_gallery('chkflag', '<?php if ($_smarty_tpl->getVariable('cat_id')->value>0){?><?php echo smarty_function_app_url(array('url'=>('picture/listPicture?cat_id=').($_smarty_tpl->getVariable('cat_id')->value)),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_app_url(array('url'=>'picture/listPicture'),$_smarty_tpl);?>
<?php }?>')" class="btn"/></div>
</div>
</div>