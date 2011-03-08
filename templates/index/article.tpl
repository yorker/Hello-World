<{$top_position}>

<div class="art_detail_wrap">
	<h2><{$art.title}></h2>
	<table class="info" cellspacing="0" cellpadding="0">
		<tr>
			<td><{$lang.update_time}>: <{$art.update_time|date_format:'%Y-%m-%d'|default:$art.create_time|date_format:'%Y-%m-%d'}></td>
			<td align="center"><{$lang.source}>: <{$art.source|default:$lang.unknown}></td>
			<td align="center"><{$lang.click_count}>: <{$art.click_count}></td>
			<td align="center"><{$lang.author_or_translator}>: <{$art.author}></td>
		</tr>
	</table>
	<div class="blank">&nbsp;</div>
	<div class="art_description"><{$art.description}></div>
	<div class="art_body"><{$art.content}></div>
	<{$pages}>
	
	<div class="art_relative clearfix">
		<div class="prev"><{if $prev>''}><a href="<{$prev.url}>" title="<{$prev.title}>"><{$lang.prev}></a><{/if}></div>
		<div class="next"><{if $next>''}><a href="<{$next.url}>" title="<{$next.title}>"><{$lang.next}></a><{/if}></div>
	</div>
</div>