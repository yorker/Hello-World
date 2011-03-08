<{if !empty($list)}>
<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="55"><{$lang.id}></th>
		<th width="38"><{$lang.source}></th>			
		<th><{$lang.request_file}></th>						
		<th><{$lang.username}></th>
		<th><{$lang.ip}></th>
		<th><{$lang.create_time}></th>
	</tr>
</thead>
<tbody>
	<{foreach from=$list item="itm" name="fname"}>
	<tr class="row<{$smarty.foreach.fname.iteration%2}>">
		<td align="center"><{$itm.log_id}></td>
		<td align="center"><{if $itm.is_backend == 1}><a href="javascript:void(0)" title="<{$lang.backend_log}>">B</a><{else}><a href="javascript:void(0)" title="<{$lang.frontend_log}>">F</a><{/if}></td>
		<td>[<{$itm.method}>] <{$itm.query_filter}></td>			
		<td align="center"><{$itm.uname|default:'visitor'}></td>
		<td align="center">[<{$itm.area}>] <{$itm.ip}></td>
		<td align="center"><{$itm.create_datetime|date_format:'%Y-%m-%d %H:%M'}></td>
	</tr>
	<{/foreach}>
</tbody>
<tfoot>
	<tr>
		<td colspan="2"><a href="<{app_url url='system/sysViewLog?action=clean_log&type='|cat:$type}>" onclick="ajaxGet(this.href, '<{app_url url='system/sysViewLog'}>', '<{$lang.operation_success}>');return(false)"><{$lang.clean_log}></a></td>
		<td colspan="5" align="right"><{$pages}></td>
	</tr>
</tfoot>
</table>
<{else}>
	<div class="no_data"><{$lang.no_data}></div>
<{/if}>