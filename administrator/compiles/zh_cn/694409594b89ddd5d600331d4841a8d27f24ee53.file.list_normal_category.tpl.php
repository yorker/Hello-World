<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 13:55:52
         compiled from "D:\www\v30\administrator\views\common/list_normal_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29474d65f2e898b0f9-39809708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '694409594b89ddd5d600331d4841a8d27f24ee53' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\common/list_normal_category.tpl',
      1 => 1298097692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29474d65f2e898b0f9-39809708',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_pcat')) include 'D:\www\v30\administrator\plugins\modifier.pcat.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_load_page')) include 'D:\www\v30\administrator\plugins\function.load_page.php';
if (!is_callable('smarty_function_admin_switcher')) include 'D:\www\v30\administrator\plugins\function.admin_switcher.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\www\v30\core\Engine\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_admin_edit')) include 'D:\www\v30\administrator\plugins\function.admin_edit.php';
if (!is_callable('smarty_function_admin_delete')) include 'D:\www\v30\administrator\plugins\function.admin_delete.php';
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>
<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['id'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['name'];?>
</th>
		<th width=""><?php echo $_smarty_tpl->getVariable('lang')->value['description'];?>
</th>
		<th width="50"><?php echo $_smarty_tpl->getVariable('lang')->value['ordering'];?>
</th>
		<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['published'];?>
</th>
		<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['amount'];?>
</th>
		<th width="85"><?php echo $_smarty_tpl->getVariable('lang')->value['create_time'];?>
</th>
		<th width="80"><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
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
		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['cat_id'];?>
</td>
		<td>
			<?php if ($_smarty_tpl->getVariable('type')->value==1){?>
				<?php echo smarty_function_load_page(array('link'=>$_smarty_tpl->getVariable('itm')->value['name'],'href'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('itm')->value['cat_id'],'download/listDownload?cat_id='))),$_smarty_tpl);?>

			<?php }elseif($_smarty_tpl->getVariable('type')->value==2){?>
				<?php echo smarty_function_load_page(array('link'=>$_smarty_tpl->getVariable('itm')->value['name'],'href'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('itm')->value['cat_id'],'picture/listPicture&cat_id='))),$_smarty_tpl);?>

			<?php }?>
		</td>
		<td><?php echo (($tmp = @$_smarty_tpl->getVariable('itm')->value['description'])===null||$tmp==='' ? '&nbsp;' : $tmp);?>
</td>
		<td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'normal_category', 'ordering', '<?php echo $_smarty_tpl->getVariable('itm')->value['cat_id'];?>
', '1')"><?php echo $_smarty_tpl->getVariable('itm')->value['ordering'];?>
</div></td>
		<td align="center"><?php echo smarty_function_admin_switcher(array('t'=>'normal_category','f'=>'published','value'=>$_smarty_tpl->getVariable('itm')->value['published'],'id'=>$_smarty_tpl->getVariable('itm')->value['cat_id']),$_smarty_tpl);?>
</td>
		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['num'];?>
</td>
		<td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('itm')->value['create_datetime'],'%Y-%m-%d');?>
</td>
		<td align="center">
			<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('type')->value,'common/writeNormalCategory?type=')),'id'=>$_smarty_tpl->getVariable('itm')->value['cat_id']),$_smarty_tpl);?>
 
			<?php if ($_smarty_tpl->getVariable('itm')->value['num']==0){?><?php echo smarty_function_admin_delete(array('t'=>'normal_category','id'=>$_smarty_tpl->getVariable('itm')->value['cat_id'],'url'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('type')->value,'common/listNormalCategory?type='))),$_smarty_tpl);?>
<?php }?>
		</td>
	</tr>
	<?php }} ?>
</tbody>
</table>
<?php }else{ ?>
	<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div>
<?php }?>