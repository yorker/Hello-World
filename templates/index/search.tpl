<{$top_position}>
<{include file="inner.left.html"}>
<div class="search">
	<form action="<{app_url url='Index/search'}>" method="post" onsubmit="return checkf(this)">
	<div class="fl"><input type="text" name="keyword" value="<{$keyword}>" id="search_key" onkeyup="show_down_menu(this, 'article', 'title', 'menudown', 'search_key')" autocomplete="off"/>&nbsp;&nbsp;</div>
	<div class="fl"><input type="image" src="images/search.gif" /></div>	
	</form>
</div>
<div id="menudown" style="display:none"></div>
<div class="blank">&nbsp;</div>
<div class="cat_article">
	<h2><span class="red"><{$keyword}></span> <{$lang.search_result}></h2>
	<{if !empty($articles)}>
	<ul>
		<{foreach from=$articles item="itm"}>
			<li class="clearfix">
				<div class="fl">
					<a href="<{$itm.caturl}>"><span>[</span><{$itm.cat_name}><span>]</span></a>&nbsp;<a href="<{$itm.arturl}>" title="<{$itm.title}>"><{$itm.title}></a>
				</div>
				<div class="fr">
					<{$itm.update_time|date_format:'%Y-%m-%d %H:%M:%S'|default:$itm.create_time|date_format:'%Y-%m-%d %H:%M:%S'}>
				</div>
			</li>
		<{/foreach}>
	</ul>
	<{$pages}>
	<{else}>
		<div class="no_data"><{$lang.no_data}></div>
	<{/if}>
</div>
	
<{include file="inner.right.html"}>