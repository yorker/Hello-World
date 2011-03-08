<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 14:04:57
         compiled from "D:\www\v30\administrator\views\download/ajax_loading_download.tpl" */ ?>
<?php /*%%SmartyHeaderCode:88164d65f5093477f3-12156670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b0538f80b25a70ecfdc66ac3b4f255459e4175a' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\download/ajax_loading_download.tpl',
      1 => 1298043339,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88164d65f5093477f3-12156670',
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
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?><table class="adminlist" cellspacing="1"><thead>	<tr>		<th width="30"><input type="checkbox" onclick="checkAll(this, 'chkflag')"/></th>		<th><?php echo $_smarty_tpl->getVariable('lang')->value['name'];?>
</th>		<th><?php echo $_smarty_tpl->getVariable('lang')->value['category'];?>
</th>					<th><?php echo $_smarty_tpl->getVariable('lang')->value['filesize'];?>
</th>		<th><?php echo $_smarty_tpl->getVariable('lang')->value['type'];?>
</th>		<th width="50"><?php echo $_smarty_tpl->getVariable('lang')->value['detail'];?>
</th>		<th width="50"><?php echo $_smarty_tpl->getVariable('lang')->value['ordering'];?>
</th>		<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['published'];?>
</th>		<th width="80"><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
</th>	</tr></thead><tbody>	<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']++;
?>	<tr class="row<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['iteration']%2;?>
">		<td align="center"><input type="checkbox" name="cid" value="<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
" class="chkflag"/></td>		<td>			<div class="dyna_edit" onclick="loadEdit(this, 'download', 'name', '<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
')"><?php echo $_smarty_tpl->getVariable('itm')->value['name'];?>
</div>		</td>		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['cat_name'];?>
</td>					<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['filesize'];?>
</td>		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['file_type'];?>
</td>		<td align="center">			<?php if ($_smarty_tpl->getVariable('itm')->value['description']){?>				<?php echo smarty_function_tb_inline(array('label'=>$_smarty_tpl->getVariable('lang')->value['view'],'detail'=>$_smarty_tpl->getVariable('itm')->value['description'],'title'=>$_smarty_tpl->getVariable('itm')->value['name']),$_smarty_tpl);?>
			<?php }else{ ?>				--			<?php }?>		</td>					<td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'download', 'ordering', '<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
', '1')"><?php echo $_smarty_tpl->getVariable('itm')->value['ordering'];?>
</div></td>		<td align="center"><?php echo smarty_function_admin_switcher(array('t'=>'download','f'=>'published','id'=>$_smarty_tpl->getVariable('itm')->value['id'],'value'=>$_smarty_tpl->getVariable('itm')->value['published']),$_smarty_tpl);?>
</td>		<td align="center">			<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url('download/writeDownload'),'id'=>$_smarty_tpl->getVariable('itm')->value['id']),$_smarty_tpl);?>
			<?php echo smarty_function_admin_delete(array('t'=>'download','id'=>$_smarty_tpl->getVariable('itm')->value['id'],'image'=>'path','url'=>smarty_modifier_app_url(('download/listDownload?cat_id=').($_smarty_tpl->getVariable('cat_id')->value))),$_smarty_tpl);?>
			<a title="<?php echo $_smarty_tpl->getVariable('lang')->value['download'];?>
" href="<?php echo smarty_function_app_url(array('url'=>('download/getDownload?id=').($_smarty_tpl->getVariable('itm')->value['id'])),$_smarty_tpl);?>
" target="_blank"><img src="images/icon_download.jpg" border="0"/></a>		</td>	</tr>	<?php }} ?></tbody><tfoot>	<tr>		<td colspan="9">			<div class="clearfix">				<div class="fl">					<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['delete'];?>
" class="btn" onclick="batchDeleteByCheckbox('download', 'chkflag', '<?php echo smarty_function_app_url(array('url'=>('download/listDownload?cat_id=').($_smarty_tpl->getVariable('cat_id')->value)),$_smarty_tpl);?>
', '', 'path')"/>				</div>				<div class="fr"><?php echo $_smarty_tpl->getVariable('pages')->value;?>
</div>			</div>		</td>	</tr></tfoot></table><?php }else{ ?>	<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div><?php }?>