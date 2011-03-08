<?php /* Smarty version Smarty-3.0.7, created on 2011-02-26 21:30:41
         compiled from "D:\www\v30\administrator\views\system/configuration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:216794d6900815e0b35-99874076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bab91207ae6537a184ecdb6c53c90be8ba42dc3' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\system/configuration.tpl',
      1 => 1298727039,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '216794d6900815e0b35-99874076',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_textarea')) include 'D:\www\v30\administrator\plugins\function.textarea.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
if (!is_callable('smarty_modifier_pcat')) include 'D:\www\v30\administrator\plugins\modifier.pcat.php';
if (!is_callable('smarty_function_load_page')) include 'D:\www\v30\administrator\plugins\function.load_page.php';
if (!is_callable('smarty_function_admin_edit')) include 'D:\www\v30\administrator\plugins\function.admin_edit.php';
if (!is_callable('smarty_function_admin_delete')) include 'D:\www\v30\administrator\plugins\function.admin_delete.php';
if (!is_callable('smarty_function_select')) include 'D:\www\v30\administrator\plugins\function.select.php';
if (!is_callable('smarty_function_radio')) include 'D:\www\v30\administrator\plugins\function.radio.php';
?><?php if ($_smarty_tpl->getVariable('action')->value=='load_page'){?>
<script type="text/javascript">
	$(document).ready(function(){
		pagination('<?php echo $_smarty_tpl->getVariable('page_url')->value;?>
');
	});
</script>
<div id="pagination_show"></div>

<!--添加/编辑配置分类 begin-->
<?php }elseif($_smarty_tpl->getVariable('action')->value=='write_cat'){?>	
	<form action="<?php echo smarty_function_app_url(array('url'=>'system/configuration?act=write_cat'),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php echo smarty_function_app_url(array('url'=>'system/configuration?act=cat_list'),$_smarty_tpl);?>
')">
		<div class="adminform">
			<div class="f_title"><?php echo $_smarty_tpl->getVariable('head_top')->value['title'];?>
</div>
			<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['name'],'value'=>$_smarty_tpl->getVariable('config_cat')->value['name'],'name'=>"name",'required'=>"true"),$_smarty_tpl);?>

			<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['ordering'],'value'=>(($tmp = @$_smarty_tpl->getVariable('config_cat')->value['ordering'])===null||$tmp==='' ? 50 : $tmp),'name'=>"ordering",'datatype'=>"NUMERIC",'required'=>"true",'size'=>"s"),$_smarty_tpl);?>

			<?php echo smarty_function_textarea(array('label'=>$_smarty_tpl->getVariable('lang')->value['description'],'name'=>"description",'id'=>"description",'value'=>$_smarty_tpl->getVariable('config_cat')->value['description'],'width'=>"580px",'height'=>"100px"),$_smarty_tpl);?>

			<?php if ($_smarty_tpl->getVariable('config_cat')->value['id']>''){?><input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('config_cat')->value['id'];?>
"/><?php }?>
			<?php echo smarty_function_submit(array('name'=>"submit",'value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

		</div>
	</form>

	
<!--配置分类列表 begin-->	
<?php }elseif($_smarty_tpl->getVariable('action')->value=='cat_list'){?>
<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="30"><input type="checkbox" onclick="checkAll(this, 'checkname')" title="<?php echo $_smarty_tpl->getVariable('lang')->value['check_all_none'];?>
"/></th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['name'];?>
</th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['description'];?>
</th>
		<th width="100"><?php echo $_smarty_tpl->getVariable('lang')->value['ordering'];?>
</th>
		<th width="150"><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
</th>
	</tr>
</thead>
<tbody>
	<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cat_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']++;
?>
	<tr class="row<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['iteration']%2;?>
">
		<td align="center"><input type="checkbox" name="cid" value="<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
" class="checkname"/></td>
		<td><?php echo smarty_function_load_page(array('link'=>$_smarty_tpl->getVariable('itm')->value['name'],'href'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('itm')->value['id'],'system/configuration?act=config_list&cat_id='))),$_smarty_tpl);?>
</a></td>
		<td><span class="gray"><?php echo $_smarty_tpl->getVariable('itm')->value['description'];?>
</span></td>
		<td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'sys_config_cat', 'ordering', '<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
', '1', 's')"><?php echo $_smarty_tpl->getVariable('itm')->value['ordering'];?>
</div></td>
		<td align="center">
			<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url("system/configuration?act=write_cat"),'id'=>$_smarty_tpl->getVariable('itm')->value['id']),$_smarty_tpl);?>

			<?php echo smarty_function_admin_delete(array('t'=>"sys_config_cat",'id'=>$_smarty_tpl->getVariable('itm')->value['id'],'url'=>smarty_modifier_app_url("system/configuration?act=cat_list")),$_smarty_tpl);?>

		</td>
	</tr>
	<?php }} ?>
</tbody>
<tfoot>
	<tr>
		<td colspan="5">
			<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['batch_delete'];?>
" class="btn" onclick="batchDeleteByCheckbox('sys_config_cat', 'checkname', '<?php echo smarty_function_app_url(array('url'=>'system/configuration?act=cat_list'),$_smarty_tpl);?>
')"/>
		</td>
	</tr>
</tfoot>
</table>

<!--配置列表 begin-->
<?php }elseif($_smarty_tpl->getVariable('action')->value=='config_list'){?>
<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="30"><input type="checkbox" onclick="checkAll(this, 'checkname')" title="<?php echo $_smarty_tpl->getVariable('lang')->value['check_all_none'];?>
"/></th>
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['name'];?>
</th>
		<th>Key</th>
		<th>Value</th>		
		<th><?php echo $_smarty_tpl->getVariable('lang')->value['belong_cat'];?>
</th>
		<th width="60"><?php echo $_smarty_tpl->getVariable('lang')->value['ordering'];?>
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
" class="checkname"/></td>
		<td><div class="dyna_edit" onclick="loadEdit(this, 'sys_config', 'conf_name', '<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
')"><?php echo $_smarty_tpl->getVariable('itm')->value['conf_name'];?>
</div></td>
		<td><?php echo $_smarty_tpl->getVariable('itm')->value['conf_key'];?>
</td>
		<td><?php echo (($tmp = @$_smarty_tpl->getVariable('itm')->value['conf_value'])===null||$tmp==='' ? '&nbsp;' : $tmp);?>
</td>		
		<td align="center"><?php echo $_smarty_tpl->getVariable('itm')->value['cat_name'];?>
</td>
		<td  align="center"><div class="dyna_edit" onclick="loadEdit(this, 'sys_config', 'ordering', '<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
', 'int', 's')"><?php echo $_smarty_tpl->getVariable('itm')->value['ordering'];?>
</div></td>
		<td align="center">
			<?php if ($_smarty_tpl->getVariable('cat_id')->value>0){?>
				<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('cat_id')->value,"system/configuration?act=write_config&cat_id=")),'id'=>$_smarty_tpl->getVariable('itm')->value['id']),$_smarty_tpl);?>

				<?php echo smarty_function_admin_delete(array('t'=>"sys_config",'id'=>$_smarty_tpl->getVariable('itm')->value['id'],'url'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('cat_id')->value,"system/configuration?act=config_list&cat_id="))),$_smarty_tpl);?>

			<?php }else{ ?>
				<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url("system/configuration?act=write_config"),'id'=>$_smarty_tpl->getVariable('itm')->value['id']),$_smarty_tpl);?>

				<?php echo smarty_function_admin_delete(array('t'=>"sys_config",'id'=>$_smarty_tpl->getVariable('itm')->value['id'],'url'=>smarty_modifier_app_url("system/configuration?act=config_list")),$_smarty_tpl);?>

			<?php }?>
		</td>
	</tr>
	<?php }} ?>
</tbody>
<tfoot>
	<tr>
		<td colspan="8">
			<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['batch_delete'];?>
" class="btn" onclick="batchDeleteByCheckbox('sys_config', 'checkname', '<?php echo smarty_function_app_url(array('url'=>'system/configuration?act=config_list'),$_smarty_tpl);?>
')"/>
		</td>
	</tr>
</tfoot>
</table>

<!--添加/编辑配置项 begin-->
<?php }elseif($_smarty_tpl->getVariable('action')->value=='write_config'){?>
	<form action="<?php echo smarty_function_app_url(array('url'=>'system/configuration?act=write_config'),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php echo smarty_modifier_app_url($_smarty_tpl->getVariable('reurl')->value);?>
')">
		<div class="adminform">
			<div class="f_title"><?php echo $_smarty_tpl->getVariable('head_top')->value['title'];?>
</div>
			<?php echo smarty_function_select(array('label'=>$_smarty_tpl->getVariable('lang')->value['belong_cat'],'name'=>"cat_id",'value'=>$_smarty_tpl->getVariable('cats')->value,'required'=>"true",'selected'=>(($tmp = @$_smarty_tpl->getVariable('edited')->value['cat_id'])===null||$tmp==='' ? $_smarty_tpl->getVariable('cat_id')->value : $tmp)),$_smarty_tpl);?>

			
			<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['name'],'value'=>$_smarty_tpl->getVariable('edited')->value['conf_name'],'name'=>"conf_name",'required'=>"true"),$_smarty_tpl);?>

			
			<?php echo smarty_function_text(array('label'=>"Key",'value'=>$_smarty_tpl->getVariable('edited')->value['conf_key'],'unique'=>"config",'name'=>"conf_key",'required'=>"true"),$_smarty_tpl);?>

			
			<?php echo smarty_function_text(array('label'=>"Value",'value'=>$_smarty_tpl->getVariable('edited')->value['conf_value'],'name'=>"conf_value"),$_smarty_tpl);?>

			
			<?php echo smarty_function_radio(array('label'=>$_smarty_tpl->getVariable('lang')->value['type'],'value'=>$_smarty_tpl->getVariable('type')->value,'name'=>"type",'checked'=>(($tmp = @$_smarty_tpl->getVariable('edited')->value['type'])===null||$tmp==='' ? "bool" : $tmp),'required'=>"true"),$_smarty_tpl);?>

			
			<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['unit'],'value'=>$_smarty_tpl->getVariable('edited')->value['unit'],'name'=>"unit",'size'=>"s"),$_smarty_tpl);?>
			
			
			<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['ordering'],'value'=>(($tmp = @$_smarty_tpl->getVariable('edited')->value['ordering'])===null||$tmp==='' ? 50 : $tmp),'name'=>"ordering",'datatype'=>"NUMERIC",'required'=>"true",'size'=>"s"),$_smarty_tpl);?>

			<?php echo smarty_function_textarea(array('label'=>$_smarty_tpl->getVariable('lang')->value['description'],'name'=>"description",'id'=>"description",'value'=>$_smarty_tpl->getVariable('edited')->value['description'],'width'=>"580px",'height'=>"100px"),$_smarty_tpl);?>

			<?php if ($_smarty_tpl->getVariable('edited')->value['id']>''){?><input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('edited')->value['id'];?>
"/><?php }?>
			<?php echo smarty_function_submit(array('name'=>"submit",'value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

		</div>
	</form>

<?php }elseif($_smarty_tpl->getVariable('action')->value=='international'){?>
	<?php if (!empty($_smarty_tpl->getVariable('files',null,true,false)->value)){?>
	<table class="adminlist" cellspacing="1">
		<thead>
			<tr>
				<th><?php echo $_smarty_tpl->getVariable('lang')->value['file'];?>
</th>
				<th width="100"><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
</th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('files')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
			<tr class="row0">
				<td><?php echo $_smarty_tpl->getVariable('itm')->value;?>
</td>
				<td align="center"><a href="<?php echo smarty_function_app_url(array('url'=>('system/configuration?act=international&type=en_us&file=').($_smarty_tpl->getVariable('itm')->value)),$_smarty_tpl);?>
" onclick="loadPage(this, 1);return(false)">en_us</a></td>
			</tr>
			<?php }} ?>
		</tbody>
	</table>
	<?php }elseif(!empty($_smarty_tpl->getVariable('slang',null,true,false)->value)){?>
		<form action="<?php echo smarty_function_app_url(array('url'=>'system/handleInternational'),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php echo smarty_function_app_url(array('url'=>"system/configuration?act=international"),$_smarty_tpl);?>
')">
		<div class="adminform">
			<div class="f_title"><?php echo $_smarty_tpl->getVariable('lang')->value['international'];?>
&nbsp;&nbsp;&nbsp;&nbsp;(TO <span class="red"><?php echo $_smarty_tpl->getVariable('type')->value;?>
/<?php echo $_smarty_tpl->getVariable('file')->value;?>
</span>)</div>
			<?php  $_smarty_tpl->tpl_vars["val"] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars["k"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('slang')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["val"]->key => $_smarty_tpl->tpl_vars["val"]->value){
 $_smarty_tpl->tpl_vars["k"]->value = $_smarty_tpl->tpl_vars["val"]->key;
?>
			<div class="international">
				<div class="k"><?php echo $_smarty_tpl->getVariable('k')->value;?>
</div>				
				<div class="v">
				<textarea name="<?php echo $_smarty_tpl->getVariable('k')->value;?>
" required="true" msg="<?php echo $_smarty_tpl->getVariable('k')->value;?>
<?php echo $_smarty_tpl->getVariable('lang')->value['data_require'];?>
" onfocus="international_focus(this, 'international')"><?php echo $_smarty_tpl->getVariable('val')->value;?>
</textarea>
				</div>
			</div>
			<?php }} ?>
			<div class="inter_submit">
				<input type="hidden" name="type" value="<?php echo $_smarty_tpl->getVariable('type')->value;?>
"/>
				<input type="hidden" name="file" value="<?php echo $_smarty_tpl->getVariable('file')->value;?>
"/>
				<input type="submit" name="" value="<?php echo $_smarty_tpl->getVariable('lang')->value['submit'];?>
" class="btn"/>
			</div>
			
		</div>
		</form>
	<?php }?>
<?php }?>