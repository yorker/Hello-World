<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 16:44:55
         compiled from "D:\www\v30\administrator\views\system/sys_flow_statistics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:233174d661a87211f92-94009911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9acd99997c9756439ae56d074b7fce62cc72aa6' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\system/sys_flow_statistics.tpl',
      1 => 1298092145,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '233174d661a87211f92-94009911',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
?><script type="text/javascript">
var sp_width;
$(document).ready(function() {
	sp_width = $("#show_plchart").width() - 5;
	$("#plchart_img").attr("src", "<?php echo smarty_function_app_url(array('url'=>'system/sysGetFlowStatistics?w='),$_smarty_tpl);?>
"+sp_width);
});
function getChart(date) {
	if(date != null && date != '') {
		$("#plchart_img").attr("src", "<?php echo smarty_function_app_url(array('url'=>'system/sysGetFlowStatistics?w='),$_smarty_tpl);?>
" + sp_width + "&month=" + date + "&_t="+Math.random());
	}
}
</script>
<?php if (!empty($_smarty_tpl->getVariable('date_list',null,true,false)->value)){?>
	<div class="flow_statistics_op_bar">		
		<select name="month" onchange="getChart(this.value)">
			<option value=""><?php echo $_smarty_tpl->getVariable('lang')->value['please_choose'];?>
</option>
			<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('date_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
				<option value="<?php echo $_smarty_tpl->getVariable('itm')->value;?>
"><?php echo $_smarty_tpl->getVariable('itm')->value;?>
</option>
			<?php }} ?>
		</select>		
	</div>
<?php }?>
<div id="show_plchart"><img id="plchart_img" src="images/loading.gif"/></div>