<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 14:03:03
         compiled from "D:\www\v30\administrator\views\advertisement/list_flash_ads.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178414d65f4979c2a72-17897561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa4c53a62bcb14d56bd88930bc9eae29304d7ded' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\advertisement/list_flash_ads.tpl',
      1 => 1298527345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178414d65f4979c2a72-17897561',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_admin_edit')) include 'D:\www\v30\administrator\plugins\function.admin_edit.php';
if (!is_callable('smarty_function_admin_delete')) include 'D:\www\v30\administrator\plugins\function.admin_delete.php';
if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>
<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="30"><input type="checkbox" onclick="checkAll(this, 'chkflag');" title="check_all_none"/></th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['flash_ads_image'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['title'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['link'];?>
</th>		
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
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
		<td><a href="javascript:void(0)" onmouseover="showImg('<?php echo @UPLOAD_URL;?>
<?php echo $_smarty_tpl->getVariable('itm')->value['image'];?>
', 150)" onmouseout="nd()"><?php echo $_smarty_tpl->getVariable('itm')->value['image'];?>
</a></td>
		<td><?php echo (($tmp = @$_smarty_tpl->getVariable('itm')->value['title'])===null||$tmp==='' ? '' : $tmp);?>
</td>
		<td><?php echo $_smarty_tpl->getVariable('itm')->value['link'];?>
</td>
		<td align="center">
			<?php echo smarty_function_admin_edit(array('href'=>"advertisement/writeFlashAds",'id'=>$_smarty_tpl->getVariable('itm')->value['id']),$_smarty_tpl);?>

			<?php echo smarty_function_admin_delete(array('t'=>'flash_ads','id'=>$_smarty_tpl->getVariable('itm')->value['id'],'url'=>"advertisement/listFlashAds",'image'=>"image"),$_smarty_tpl);?>

		</td>
	</tr>
	<?php }} ?>
</tbody>

<tfoot>
	<tr>
		<td colspan="5">
			<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['batch_delete'];?>
" class="btn" onclick="batchDeleteByCheckbox('flash_ads', 'chkflag', '<?php echo smarty_function_app_url(array('url'=>'advertisement/listFlashAds'),$_smarty_tpl);?>
', '', 'image');"/>
		</td>
	</tr>
</tfoot>

</table>
<?php }else{ ?>
<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div>
<?php }?>