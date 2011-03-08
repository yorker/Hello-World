<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 21:50:05
         compiled from "D:\www\v30\administrator\views\system/sys_notepad_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141304d66620d47b875-20716500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '763c4f585fc9ad215c414a66c65f6e2f3c180712' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\system/sys_notepad_page.tpl',
      1 => 1298344348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141304d66620d47b875-20716500',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>	<table class="notepad_list" cellspacing="0">		<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>		<tr class="ho" valign="top">			<td width="40" align="center"><input type="checkbox" class="chkflag" name="cid" value="<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
"/></td>			<td>				<div class="clearfix">					<div class="fl">						<a href="javascript:void(0)" onclick="view_note('shownote_<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
')"><span id="ntit_<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
"><?php echo $_smarty_tpl->getVariable('itm')->value['title'];?>
</span> <?php if ($_smarty_tpl->getVariable('itm')->value['is_urgency']>0){?><img src="images/star.jpg" border="0" title="<?php echo $_smarty_tpl->getVariable('lang')->value['urgency'];?>
"/><?php }?></a>					</div>					<div class="fr">						<a href="javascript:void(0)" onclick="view_note('shownote_<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
')"><?php echo $_smarty_tpl->getVariable('lang')->value['view'];?>
</a>&nbsp;						<a href="system#nform" onclick="if(confirm('<?php echo $_smarty_tpl->getVariable('lang')->value['confirm_edit'];?>
')) {editNotepad('<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
', '<?php echo $_smarty_tpl->getVariable('itm')->value['is_urgency'];?>
', KE)} else {return false;}"><?php echo $_smarty_tpl->getVariable('lang')->value['edit'];?>
</a>&nbsp;						<a href="javascript:void(0)" onclick="if(confirm('<?php echo $_smarty_tpl->getVariable('lang')->value['confirm_delete'];?>
')) deleteById('admin_notepad', '<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
', '<?php echo smarty_function_app_url(array('url'=>'system/sysNotepad'),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->getVariable('lang')->value['delete'];?>
</a>					</div>				</div>				<div id="shownote_<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
" style="display:none" class="note_content">					<div id="ncont_<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
"><?php echo $_smarty_tpl->getVariable('itm')->value['content'];?>
</div>					<p class="last_update"><?php echo $_smarty_tpl->getVariable('lang')->value['last_update'];?>
 <?php echo $_smarty_tpl->getVariable('itm')->value['update_datetime'];?>
</p>				</div>			</td>		</tr>		<?php }} ?>		<tr>			<td align="center"><input type="checkbox" onclick="checkAll(this, 'chkflag')" title="<?php echo $_smarty_tpl->getVariable('lang')->value['check_all_none'];?>
"/></td>							<td colspan="3" align="right">				<div class="clearfix">					<div class="fl"><input type="button" class="btn" value="<?php echo $_smarty_tpl->getVariable('lang')->value['delete'];?>
" onclick="batchDeleteByCheckbox('admin_notepad', 'chkflag', '<?php echo smarty_function_app_url(array('url'=>'system/sysNotepad'),$_smarty_tpl);?>
')"/></div>					<div class="fr"><?php echo $_smarty_tpl->getVariable('pages')->value;?>
</div>				</div>								</td>		</tr>	</table><?php }else{ ?>	<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div><?php }?>