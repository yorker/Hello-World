<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 14:05:06
         compiled from "D:\www\v30\administrator\views\picture/ajax_loading_picture.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166554d65f5128da707-43959913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f16106299c7172f5f5916dba933ac53ad6c7eb76' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\picture/ajax_loading_picture.tpl',
      1 => 1298527345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166554d65f5128da707-43959913',
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
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?><table class="adminlist" cellspacing="1">	<thead>		<tr>			<th width="20"><input type="checkbox" onclick="checkAll(this, 'chkflag')"/></th>			<th width="25"><?php echo $_smarty_tpl->getVariable('lang')->value['id'];?>
</th>			<th width="122"><?php echo $_smarty_tpl->getVariable('lang')->value['cover_img'];?>
</th>			<th><?php echo $_smarty_tpl->getVariable('lang')->value['title'];?>
</th>			<th width="122"><?php echo $_smarty_tpl->getVariable('lang')->value['create_time'];?>
</th>			<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['amount'];?>
</th>			<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['published'];?>
</th>			<th width="70"><?php echo $_smarty_tpl->getVariable('lang')->value['ordering'];?>
</th>			<th width="80"><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
</th>		</tr>	</thead>	<tbody>		<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>		<tr class="row<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['iteraction']%2;?>
">			<td align="center"><input type="checkbox" name="cid" value="<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
" class="chkflag"/></td>			<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
</td>			<td align="center"><img src="<?php echo @UPLOAD_URL;?>
<?php echo $_smarty_tpl->getVariable('itm')->value['cover_img_thumb'];?>
" border="0"/></td>			<td><?php echo $_smarty_tpl->getVariable('itm')->value['title'];?>
</td>			<td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('itm')->value['create_datetime'],'%Y-%m-%d');?>
</td>			<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['gallery_num'];?>
</td>			<td align="center"><?php echo smarty_function_admin_switcher(array('t'=>"picture_collect",'f'=>"published",'value'=>$_smarty_tpl->getVariable('itm')->value['published'],'id'=>$_smarty_tpl->getVariable('itm')->value['id']),$_smarty_tpl);?>
</td>			<td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'picture_collect', 'ordering', '<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
', '1')"><?php echo $_smarty_tpl->getVariable('itm')->value['ordering'];?>
</div></td>			<td align="center">				<?php if ($_smarty_tpl->getVariable('cat_id')->value>0){?>					<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('cat_id')->value,"picture/writePicture?cat_id=")),'id'=>$_smarty_tpl->getVariable('itm')->value['id']),$_smarty_tpl);?>
				<?php }else{ ?>					<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url("picture/writePicture"),'id'=>$_smarty_tpl->getVariable('itm')->value['id']),$_smarty_tpl);?>
				<?php }?>&nbsp;				<a href="javascript:void(0)" onclick="delete_pic_gallery('<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
', '<?php if ($_smarty_tpl->getVariable('cat_id')->value>0){?><?php echo smarty_function_app_url(array('url'=>('picture/listPicture?cat_id=').($_smarty_tpl->getVariable('cat_id')->value)),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_app_url(array('url'=>'picture/listPicture'),$_smarty_tpl);?>
<?php }?>')"><img src="images/icon_drop.gif" border="0"/></a>			</td>		</tr>		<?php }} ?>	</tbody>	<tfoot>		<tr>			<td colspan="9">				<div class="clearfix">					<div class="fl"><input type="button" name="batch_delete_picture" value="<?php echo $_smarty_tpl->getVariable('lang')->value['batch_delete'];?>
" onclick="delete_pic_gallery('chkflag', '<?php if ($_smarty_tpl->getVariable('cat_id')->value>0){?><?php echo smarty_function_app_url(array('url'=>('picture/listPicture?cat_id=').($_smarty_tpl->getVariable('cat_id')->value)),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_app_url(array('url'=>'picture/listPicture'),$_smarty_tpl);?>
<?php }?>')" class="btn"/></div>					<div class="fr"><?php echo $_smarty_tpl->getVariable('pages')->value;?>
</div>				</div>			</td>		</tr>	</tfoot></table><?php }else{ ?>	<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div><?php }?>