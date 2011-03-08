<{$top_position}>
<{if !empty($cats)}>
	<div class="ablum_cat">
		<{foreach from=$cats item="itm" name="fname"}>
			<label><a href="<{$itm.caturl}>"<{if $itm.cat_id==$cat_id}> class="bold"<{/if}>><{$itm.name}></a></label>
			<{if !$smarty.foreach.fname.last}>
				<label>|</label>
			<{/if}>
		<{/foreach}>		
	</div>
<{/if}>
<div class="ablum_list">
	<{if !empty($list)}>
	<ul class="clearfix">
		<{foreach from=$list item="itm"}>
		<li>
			<div class="img"><a href="<{$itm.ablumurl}>"><img src="<{$upload_url}><{$itm.cover_img}>" border="0"/></a></div>
			<div class="item"><center><strong><a href="<{$itm.ablumurl}>"><{$itm.title}></a>[<{$itm.pic_num}>]</strong></center></div>
			<div class="item"><{$lang.category}>:<a href="<{$itm.caturl}>"><{$itm.name}></a></div>
		</li>
		<{/foreach}>
	</ul>
	<{$pages}>
	<{else}>
		<div class="no_data"><{$lang.no_data}></div>
	<{/if}>
</div>