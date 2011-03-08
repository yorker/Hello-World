<?php /* Smarty version 2.6.26, created on 2011-02-20 15:43:16
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substr', 'index.html', 98, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
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
				<form action="search.php" method="post" onsubmit="return checkf(this)">
				<div class="fl"><input type="text" name="keyword" value="<?php echo $this->_tpl_vars['lang']['please_enter_retrieve_cond']; ?>
" class="search_init" id="search_key" onkeyup="show_down_menu(this, 'article', 'title', 'menudown', 'search_key')" onfocus="start_to_search(this)" autocomplete="off"/>&nbsp;&nbsp;</div>
				<div class="fl"><input type="image" src="images/search.gif" /></div>	
				</form>
			</div>
			<div id="menudown" style="display:none"></div>
			<div class="blank">&nbsp;</div>
			<div class="category">
				<ul class="clearfix">
					<?php $_from = $this->_tpl_vars['user_cats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itm']):
?>
						<li><a href="<?php echo $this->_tpl_vars['itm']['caturl']; ?>
"><?php echo $this->_tpl_vars['itm']['cat_name']; ?>
</a></li>
					<?php endforeach; endif; unset($_from); ?>							
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
			<h2><?php echo $this->_tpl_vars['lang']['latest_article']; ?>
 <span>Latest Article</span></h2>
			<div class="body">
				<ul class="list">
					<?php $_from = $this->_tpl_vars['latest_art']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itm']):
?>
						<li><a href="<?php echo $this->_tpl_vars['itm']['arturl']; ?>
" title="<?php echo $this->_tpl_vars['itm']['title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['itm']['title'])) ? $this->_run_mod_handler('substr', true, $_tmp, 18, false) : smarty_modifier_substr($_tmp, 18, false)); ?>
</a></li>	
					<?php endforeach; endif; unset($_from); ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="blank">&nbsp;</div>
<div class="wrap_2 clearfix">
	<div class="column_left">
		<div class="recommend_article clearfix">
			<h2><?php echo $this->_tpl_vars['lang']['recommend_article']; ?>
</h2>
			<h3><a href="<?php echo $this->_tpl_vars['all_article_url']; ?>
"><?php echo $this->_tpl_vars['lang']['all_article']; ?>
 &gt;&gt;</a></h3>
			<div class="body">
				<ul>
					<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itm']):
?>
						<li><a href="<?php echo $this->_tpl_vars['itm']['cat_url']; ?>
">[<?php echo $this->_tpl_vars['itm']['cat_name']; ?>
]</a>&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['itm']['url']; ?>
"<?php if ($this->_tpl_vars['itm']['open_type'] == 1): ?> target="_blank"<?php endif; ?>><?php echo $this->_tpl_vars['itm']['title']; ?>
</a></li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="column_right">
		<div class="module">
			<h2><?php echo $this->_tpl_vars['lang']['util_address']; ?>
 <span>Utility Links</span></h2>
			<div class="body">
				<ul class="list">
					<?php $_from = $this->_tpl_vars['utility_link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itm']):
?>
						<li style="background:url(images/dot_2.jpg) no-repeat scroll 2px 50%; padding-left:23px"><a href="<?php echo $this->_tpl_vars['itm']['caturl']; ?>
"><?php echo $this->_tpl_vars['itm']['cat_name']; ?>
</a></li>
					<?php endforeach; endif; unset($_from); ?>
				</li>
			</div>
		</div>
		<div class="blank">&nbsp;</div>
		<div class="module">
			<h2><?php echo $this->_tpl_vars['lang']['download_nav']; ?>
 <span>Download Navigation</span></h2>
			<div class="body">
				<ul class="list">
					<?php $_from = $this->_tpl_vars['download_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itm']):
?>
						<li><a href="<?php echo $this->_tpl_vars['itm']['caturl']; ?>
"><?php echo $this->_tpl_vars['itm']['name']; ?>
</a></li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
			</div>
		</div>
		<div class="blank">&nbsp;</div>
		<div class="module">
			<h2><?php echo $this->_tpl_vars['lang']['my_link']; ?>
 <span>My Links</span></h2>
			<div class="body">
				<ul class="list">
					<?php $_from = $this->_tpl_vars['my_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itm']):
?>
						<li style="background:url(images/dot_3.gif) no-repeat scroll 2px 50%; padding-left:23px"><a href="<?php echo $this->_tpl_vars['itm']['link']; ?>
" target="_blank"><?php echo $this->_tpl_vars['itm']['name']; ?>
</a></li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="blank">&nbsp;</div>
<div class="index_ablum">
	<h2><?php echo $this->_tpl_vars['lang']['ablum']; ?>
</h2>
	<div class="body">
		<div id="flow_ablum">
			<table cellspacing="0" cellpadding="0" border="0">
				<tr>
					<?php $_from = $this->_tpl_vars['ablums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itm']):
?>
						<td><a href="<?php echo $this->_tpl_vars['itm']['url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['upload_url']; ?>
<?php echo $this->_tpl_vars['itm']['cover_img']; ?>
" border="0"/></a></td>
					<?php endforeach; endif; unset($_from); ?>
				</tr>
			</table>
		</div>
	</div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>