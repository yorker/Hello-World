<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 16:44:15
         compiled from "D:\www\v30\administrator\views\system/sys_notepad_loading.tpl" */ ?>
<?php /*%%SmartyHeaderCode:303684d661a5f202263-64819633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bfbf5551b03d30d9484b20eed71d823f74fff871' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\system/sys_notepad_loading.tpl',
      1 => 1298344348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '303684d661a5f202263-64819633',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
"/></td>
')"><span id="ntit_<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
"><?php echo $_smarty_tpl->getVariable('itm')->value['title'];?>
</span> <?php if ($_smarty_tpl->getVariable('itm')->value['is_urgency']>0){?><img src="images/star.jpg" border="0" title="<?php echo $_smarty_tpl->getVariable('lang')->value['urgency'];?>
"/><?php }?></a>
')"><?php echo $_smarty_tpl->getVariable('lang')->value['view'];?>
</a>&nbsp;
')) {editNotepad('<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
', '<?php echo $_smarty_tpl->getVariable('itm')->value['is_urgency'];?>
', KE)} else {return false;}"><?php echo $_smarty_tpl->getVariable('lang')->value['edit'];?>
</a>&nbsp;
')) deleteById('admin_notepad', '<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
', '<?php echo smarty_function_app_url(array('url'=>'system/sysNotepad'),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->getVariable('lang')->value['delete'];?>
</a>
" style="display:none" class="note_content">
"><?php echo $_smarty_tpl->getVariable('itm')->value['content'];?>
</div>
 <?php echo $_smarty_tpl->getVariable('itm')->value['update_datetime'];?>
</p>
"/></td>				
" onclick="batchDeleteByCheckbox('admin_notepad', 'chkflag', '<?php echo smarty_function_app_url(array('url'=>'system/sysNotepad'),$_smarty_tpl);?>
')"/></div>
</div>
</div>