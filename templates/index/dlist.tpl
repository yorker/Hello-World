<{$top_position}>
<{include file="inner.left.html"}>

<div class="cat_article">
	<h2><{$cat_name}></h2>
	<{if !empty($downloads)}>
	<ul>
		<{foreach from=$downloads item="itm"}>
			<li class="clearfix">
				<div class="fl">
					<a href="<{$itm.caturl}>"><span>[</span><{$itm.cat_name}><span>]</span></a>&nbsp;<{$itm.name}>&nbsp;&nbsp;[<{$itm.filesize}>]
				</div>
				<div class="fr">
					<a href="<{app_url url='Index/dlist?action=download&did='|cat:$itm.id}>" target="_blank"><{$lang.download}></a>&nbsp;&nbsp;
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