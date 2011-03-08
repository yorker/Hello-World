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
				<form action="<{app_url url='Index/search'}>" method="post" onsubmit="return checkf(this)">
				<div class="fl"><input type="text" name="keyword" value="<{$lang.please_enter_retrieve_cond}>" class="search_init" id="search_key" onkeyup="show_down_menu(this, 'article', 'title', 'menudown', 'search_key')" onfocus="start_to_search(this)" autocomplete="off"/>&nbsp;&nbsp;</div>
				<div class="fl"><input type="image" src="images/search.gif" /></div>	
				</form>
			</div>
			<div id="menudown" style="display:none"></div>
			<div class="blank">&nbsp;</div>
			<div class="category">
				<ul class="clearfix">
					<{foreach from=$user_cats item="itm"}>
						<li><a href="<{$itm.caturl}>"><{$itm.cat_name}></a></li>
					<{/foreach}>							
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
			<h2><{$lang.latest_article}> <span>Latest Article</span></h2>
			<div class="body">
				<ul class="list">
					<{foreach from=$latest_art item="itm"}>
						<li><a href="<{$itm.arturl}>" title="<{$itm.title}>"><{$itm.title|substr:18:false}></a></li>	
					<{/foreach}>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="blank">&nbsp;</div>
<div class="wrap_2 clearfix">
	<div class="column_left">
		<div class="recommend_article clearfix">
			<h2><{$lang.recommend_article}></h2>
			<h3><a href="<{$all_article_url}>"><{$lang.all_article}> &gt;&gt;</a></h3>
			<div class="body">
				<ul>
					<{foreach from=$list item="itm"}>
						<li><a href="<{$itm.cat_url}>">[<{$itm.cat_name}>]</a>&nbsp;&nbsp;<a href="<{$itm.url}>"<{if $itm.open_type==1}> target="_blank"<{/if}>><{$itm.title}></a></li>
					<{/foreach}>
				</ul>
			</div>
		</div>
	</div>
	<div class="column_right">
		<div class="module">
			<h2><{$lang.util_address}> <span>Utility Links</span></h2>
			<div class="body">
				<ul class="list">
					<{foreach from=$utility_link item="itm"}>
						<li style="background:url(images/dot_2.jpg) no-repeat scroll 2px 50%; padding-left:23px"><a href="<{$itm.caturl}>"><{$itm.cat_name}></a></li>
					<{/foreach}>
				</li>
			</div>
		</div>
		<div class="blank">&nbsp;</div>
		<div class="module">
			<h2><{$lang.download_nav}> <span>Download Navigation</span></h2>
			<div class="body">
				<ul class="list">
					<{foreach from=$download_cat item="itm"}>
						<li><a href="<{$itm.caturl}>"><{$itm.name}></a></li>
					<{/foreach}>
				</ul>
			</div>
		</div>
		<div class="blank">&nbsp;</div>
		<div class="module">
			<h2><{$lang.my_link}> <span>My Links</span></h2>
			<div class="body">
				<ul class="list">
					<{foreach from=$my_links item="itm"}>
						<li style="background:url(images/dot_3.gif) no-repeat scroll 2px 50%; padding-left:23px"><a href="<{$itm.link}>" target="_blank"><{$itm.name}></a></li>
					<{/foreach}>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="blank">&nbsp;</div>
<div class="index_ablum">
	<h2><{$lang.ablum}></h2>
	<div class="body">
		<div id="flow_ablum">
			<table cellspacing="0" cellpadding="0" border="0">
				<tr>
					<{foreach from=$ablums item="itm"}>
						<td><a href="<{$itm.url}>" target="_blank"><img src="<{$upload_url}><{$itm.cover_img}>" border="0"/></a></td>
					<{/foreach}>
				</tr>
			</table>
		</div>
	</div>
</div>