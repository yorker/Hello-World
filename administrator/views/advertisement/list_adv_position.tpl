<table cellspacing="1" class="adminlist">
<thead>
	<tr>
		<th width="30"><{$lang.id}></th>
		<th><{$lang.name}></th>
		<th width="50"><{$lang.width}></th>
		<th width="50"><{$lang.height}></th>
		<th width="60"><{$lang.ads_number}></th>
		<th><{$lang.description}></th>
		<th width="60"><{$lang.operation}></th>
	</tr>
</thead>
<tbody>
	<{foreach from=$list item="itm" name="fname"}>
	<tr class="row<{$smarty.foreach.fname.iteraction%2}>">
		<td align="center"><{$itm.pos_id}></td>
		<td><{if $itm.ads_num>0}><{load_page link=$itm.pos_name href=$itm.pos_id|pcat:"advertisement/listAdv?pos_id="|app_url}><{else}><{$itm.pos_name}><{/if}></td>
		<td align="center"><{$itm.img_width}>px</td>
		<td align="center"><{$itm.img_height}>px</td>
		<td align="center"><{$itm.ads_num}></td>
		<td><{$itm.description|default:'&nbsp;'}></td>
		<td align="center">
			<{admin_edit id=$itm.pos_id href="advertisement/writeAdvPosition"|app_url}>
			<{if $itm.ads_num == 0}>
				<{admin_delete id=$itm.pos_id url="advertisement/listAdvPosition"|app_url t="ad_position"}>
			<{/if}>
		</td>
	</tr>
	<{/foreach}>
</tbody>
</table>