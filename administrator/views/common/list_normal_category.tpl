<{if !empty($list)}>
<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="30"><{$lang.id}></th>
		<th><{$lang.name}></th>
		<th width=""><{$lang.description}></th>
		<th width="50"><{$lang.ordering}></th>
		<th width="30"><{$lang.published}></th>
		<th width="30"><{$lang.amount}></th>
		<th width="85"><{$lang.create_time}></th>
		<th width="80"><{$lang.operation}></th>
	</tr>
</thead>
<tbody>
	<{foreach from=$list item="itm" name="fname"}>
	<tr class="row<{$smarty.foreach.fname.iteration%2}>">
		<td align="center"><{$itm.cat_id}></td>
		<td>
			<{if $type==1}>
				<{load_page link=$itm.name href=$itm.cat_id|pcat:'download/listDownload?cat_id='|app_url}>
			<{elseif $type==2}>
				<{load_page link=$itm.name href=$itm.cat_id|pcat:'picture/listPicture&cat_id='|app_url}>
			<{/if}>
		</td>
		<td><{$itm.description|default:'&nbsp;'}></td>
		<td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'normal_category', 'ordering', '<{$itm.cat_id}>', '1')"><{$itm.ordering}></div></td>
		<td align="center"><{admin_switcher t='normal_category' f='published' value=$itm.published id=$itm.cat_id}></td>
		<td align="center"><{$itm.num}></td>
		<td align="center"><{$itm.create_datetime|date_format:'%Y-%m-%d'}></td>
		<td align="center">
			<{admin_edit href=$type|pcat:'common/writeNormalCategory?type='|app_url id=$itm.cat_id}> 
			<{if $itm.num == 0}><{admin_delete t='normal_category' id=$itm.cat_id url=$type|pcat:'common/listNormalCategory?type='|app_url}><{/if}>
		</td>
	</tr>
	<{/foreach}>
</tbody>
</table>
<{else}>
	<div class="no_data"><{$lang.no_data}></div>
<{/if}>