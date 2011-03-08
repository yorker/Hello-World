<{$top_position}>
<{include file="inner.left.html"}>

<div class="cat_article">
	<h2><{$cat_name}></h2>
	<{if !empty($articles)}>
		<ul>
			<{foreach from=$articles item="itm"}>
				<li class="clearfix">
					<div class="fl">
						<a href="<{$itm.caturl}>"><span>[</span><{$itm.cat_name}><span>]</span></a>&nbsp;<a href="<{$itm.arturl}>" title="<{$itm.title}>"<{if $itm.open_type==1}> target="_blank"<{/if}>><{$itm.title}></a>
					</div>
					<div class="fr">
						<{$itm.create_time|date_format:'%Y-%m-%d'}>
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
