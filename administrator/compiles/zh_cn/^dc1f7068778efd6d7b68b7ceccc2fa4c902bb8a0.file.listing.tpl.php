<?php /* Smarty version Smarty-3.0.7, created on 2011-03-02 10:23:14
         compiled from "D:\www\v30\administrator\views\friend_link/listing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140664d6daa12627673-29940824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc1f7068778efd6d7b68b7ceccc2fa4c902bb8a0' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\friend_link/listing.tpl',
      1 => 1298527345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140664d6daa12627673-29940824',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_admin_edit')) include 'D:\www\v30\administrator\plugins\function.admin_edit.php';
if (!is_callable('smarty_function_admin_delete')) include 'D:\www\v30\administrator\plugins\function.admin_delete.php';
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>
<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="30"><input type="checkbox" onclick="checkAll(this, 'chkflag')" title="<?php echo $_smarty_tpl->getVariable('lang')->value['check_all_none'];?>
"/></th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['name'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['link'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['logo_img'];?>
</th>		
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['ordering'];?>
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
	<tr class="row<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['iteration']%2;?>
">
		<td align="center"><input type="checkbox" name="cid" value="<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
" class="chkflag"/></td>
		<td><a href="<?php echo $_smarty_tpl->getVariable('itm')->value['link'];?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('itm')->value['name'];?>
</a></td>
		<td><div class="dyna_edit" onclick="loadEdit(this, 'friend_link', 'link', '<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
')"><?php echo $_smarty_tpl->getVariable('itm')->value['link'];?>
</div></td>
		<td align="center"><?php if (!empty($_smarty_tpl->getVariable('itm',null,true,false)->value['logo'])){?><a href="javascript:void(0)" onmouseover="showImg('<?php echo @UPLOAD_URL;?>
<?php echo $_smarty_tpl->getVariable('itm')->value['logo'];?>
')" onmouseout="nd()"><img src="images/picflag.gif" border="0"/></a><?php }else{ ?><?php echo $_smarty_tpl->getVariable('lang')->value['none'];?>
<?php }?></td>
		<td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'friend_link', 'ordering', '<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
', 1)"><?php echo $_smarty_tpl->getVariable('itm')->value['ordering'];?>
</div></td>		
		<td align="center">
			<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url("friendlink/write"),'id'=>$_smarty_tpl->getVariable('itm')->value['id']),$_smarty_tpl);?>

			<?php echo smarty_function_admin_delete(array('t'=>"friend_link",'image'=>"logo",'id'=>$_smarty_tpl->getVariable('itm')->value['id'],'url'=>smarty_modifier_app_url("friendlink/listing")),$_smarty_tpl);?>

		</td>
	</tr>
	<?php }} ?>
</tbody>
<tfoot>
	<tr>
		<td colspan="8">
			<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['batch_delete'];?>
" class="btn" onclick="batchDeleteByCheckbox('friend_link', 'chkflag', '<?php echo smarty_function_app_url(array('url'=>'friendlink/listing'),$_smarty_tpl);?>
', false, 'logo')"/>
		</td>
	</tr>
</tfoot>
</table>

<?php }else{ ?>
<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div>
<?php }?>