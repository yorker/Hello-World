<?php /* Smarty version Smarty-3.0.7, created on 2011-03-02 08:55:50
         compiled from "templates\index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125874d6d9596c8f3f1-56444058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80d621af12555aad4a71575737fd6462de587e83' => 
    array (
      0 => 'templates\\index/index.tpl',
      1 => 1298992367,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125874d6d9596c8f3f1-56444058',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_modifier_substr')) include 'D:\www\v30\plugins\modifier.substr.php';
?><script type="text/javascript">
$(document).ready(function() {
	var divid = 'flow_ablum';
	var timer = setInterval("flow_forward('" + divid + "')", 50);
	$("#" + divid).mouseover(function() {
		clearInterval(timer);
	});
	$("#" + divid).mouseout(function() {
		timer = setInterval("flow_forward('" + divid + "')", 50);
	});
});
//DIV滚动
var i = 0;
var left;
function flow_forward(divid) {
	var divobj = $("#"+divid);
	left = divobj.scrollLeft();
	if(left == 1) {
		flow_forward_add_cell(divid, i);
		i++;
	}	
	if(left > 0 && left%90 == 0) {		
		flow_forward_add_cell(divid, i);
		i++;
		flow_forward_delete_cell(divid);
		i--;
	}
	divobj.scrollLeft(left+1);
}

//删除第一个单元格
function flow_forward_delete_cell(divid) {
	var tableObj = document.getElementById(divid).getElementsByTagName("table")[0];
	var rowObj = tableObj.rows[0];
	if(rowObj.cells.length > 0) {
		var cellObj = rowObj.cells[0];
		var dist = $(cellObj).width();
		rowObj.deleteCell(0);
		$("#"+divid).scrollLeft(left-dist);
		left = left-dist;
	}
}

//复制第index个单元格到当列的最后
function flow_forward_add_cell(divid, index) {
	var tableObj = document.getElementById(divid).getElementsByTagName("table")[0];
	var rowObj = tableObj.rows[0];
	var tmpContent = rowObj.cells[index].innerHTML;
	var currentLength = rowObj.cells.length;
	rowObj.insertCell(currentLength);
	rowObj.cells[currentLength].innerHTML = tmpContent;
}
</script>
<div class="wrap_1 clearfix">
	<div class="column_1">
		<div class="i_wrap">			
			<div class="search">
				<form action="<?php echo smarty_function_app_url(array('url'=>'Index/search'),$_smarty_tpl);?>
" method="post" onsubmit="return checkf(this)">
				<div class="fl"><input type="text" name="keyword" value="<?php echo $_smarty_tpl->getVariable('lang')->value['please_enter_retrieve_cond'];?>
" class="search_init" id="search_key" onkeyup="show_down_menu(this, 'article', 'title', 'menudown', 'search_key')" onfocus="start_to_search(this)" autocomplete="off"/>&nbsp;&nbsp;</div>
				<div class="fl"><input type="image" src="images/search.gif" /></div>	
				</form>
			</div>
			<div id="menudown" style="display:none"></div>
			<div class="blank">&nbsp;</div>
			<div class="category">
				<ul class="clearfix">
					<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('user_cats')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
						<li><a href="<?php echo $_smarty_tpl->getVariable('itm')->value['caturl'];?>
"><?php echo $_smarty_tpl->getVariable('itm')->value['cat_name'];?>
</a></li>
					<?php }} ?>							
				</ul>
			</div>
		</div>
	</div>
	<div class="column_2">
		<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><a href="http://php.net/" target="_blank"><img src="images/licon_1.gif"/></a></td>
			<td rowspan="2"><a href="http://cakephp.org" target="_blank"><img src="images/licon_2.gif"/></a></td>
		</tr>
		<tr>
			<td><a href="http://www.ubuntu.com/" target="_blank"><img src="images/licon_3.gif"/></a></td>					
		</tr>
		<tr>
			<td colspan="2"><a href="http://www.joomla.org/" target="_blank"><img src="images/licon_4.gif"/></a></td>					
		</tr>
		<tr>
			<td colspan="2"><a href="http://www.smarty.net/" target="_blank"><img src="images/licon_5.gif"/></a></td>
		</tr>
		</table>
	</div>
	<div class="column_3">
		<div class="module">
			<h2><?php echo $_smarty_tpl->getVariable('lang')->value['latest_article'];?>
 <span>Latest Article</span></h2>
			<div class="body">
				<ul class="list">
					<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('latest_art')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
						<li><a href="<?php echo $_smarty_tpl->getVariable('itm')->value['arturl'];?>
" title="<?php echo $_smarty_tpl->getVariable('itm')->value['title'];?>
"><?php echo smarty_modifier_substr($_smarty_tpl->getVariable('itm')->value['title'],18,false);?>
</a></li>	
					<?php }} ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="blank">&nbsp;</div>
<div class="wrap_2 clearfix">
	<div class="column_left">
		<div class="recommend_article clearfix">
			<h2><?php echo $_smarty_tpl->getVariable('lang')->value['recommend_article'];?>
</h2>
			<h3><a href="<?php echo $_smarty_tpl->getVariable('all_article_url')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['all_article'];?>
 &gt;&gt;</a></h3>
			<div class="body">
				<ul>
					<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
						<li><a href="<?php echo $_smarty_tpl->getVariable('itm')->value['cat_url'];?>
">[<?php echo $_smarty_tpl->getVariable('itm')->value['cat_name'];?>
]</a>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('itm')->value['url'];?>
"<?php if ($_smarty_tpl->getVariable('itm')->value['open_type']==1){?> target="_blank"<?php }?>><?php echo $_smarty_tpl->getVariable('itm')->value['title'];?>
</a></li>
					<?php }} ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="column_right">
		<div class="module">
			<h2><?php echo $_smarty_tpl->getVariable('lang')->value['util_address'];?>
 <span>Utility Links</span></h2>
			<div class="body">
				<ul class="list">
					<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('utility_link')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
						<li style="background:url(images/dot_2.jpg) no-repeat scroll 2px 50%; padding-left:23px"><a href="<?php echo $_smarty_tpl->getVariable('itm')->value['caturl'];?>
"><?php echo $_smarty_tpl->getVariable('itm')->value['cat_name'];?>
</a></li>
					<?php }} ?>
				</li>
			</div>
		</div>
		<div class="blank">&nbsp;</div>
		<div class="module">
			<h2><?php echo $_smarty_tpl->getVariable('lang')->value['download_nav'];?>
 <span>Download Navigation</span></h2>
			<div class="body">
				<ul class="list">
					<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('download_cat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
						<li><a href="<?php echo $_smarty_tpl->getVariable('itm')->value['caturl'];?>
"><?php echo $_smarty_tpl->getVariable('itm')->value['name'];?>
</a></li>
					<?php }} ?>
				</ul>
			</div>
		</div>
		<div class="blank">&nbsp;</div>
		<div class="module">
			<h2><?php echo $_smarty_tpl->getVariable('lang')->value['my_link'];?>
 <span>My Links</span></h2>
			<div class="body">
				<ul class="list">
					<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('my_links')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
						<li style="background:url(images/dot_3.gif) no-repeat scroll 2px 50%; padding-left:23px"><a href="<?php echo $_smarty_tpl->getVariable('itm')->value['link'];?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('itm')->value['name'];?>
</a></li>
					<?php }} ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="blank">&nbsp;</div>
<div class="index_ablum">
	<h2><?php echo $_smarty_tpl->getVariable('lang')->value['ablum'];?>
</h2>
	<div class="body">
		<div id="flow_ablum">
			<table cellspacing="0" cellpadding="0" border="0">
				<tr>
					<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ablums')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
						<td><a href="<?php echo $_smarty_tpl->getVariable('itm')->value['url'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('upload_url')->value;?>
<?php echo $_smarty_tpl->getVariable('itm')->value['cover_img'];?>
" border="0"/></a></td>
					<?php }} ?>
				</tr>
			</table>
		</div>
	</div>
</div>