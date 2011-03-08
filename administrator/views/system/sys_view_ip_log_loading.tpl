<{if !empty($list)}>
	<table class="adminlist" cellspacing="1">
	<thead>
		<tr>
			<th width="55"><{$lang.id}></th>
			<th><{$lang.ip}></th>
			<th><{$lang.access_count}></th>
			<th><{$lang.belong_area}></th>
			<th><{$lang.create_time}></th>
			<th><{$lang.update_time}></th>
		</tr>
	</thead>
	<tbody>
		<{foreach from=$list item="itm" name="fname"}>
		<tr class="row<{$smarty.foreach.fname.iteraction%2}>">
			<td align="center"><{$itm.id}></td>
			<td align="center"><{$itm.ip|default:'&nbsp;'}></td>
			<td align="center"><{$itm.num}></td>
			<td align="center"><{$itm.area}></td>
			<td align="center"><{$itm.create_datetime}></td>
			<td align="center"><{$itm.update_datetime}></td>
		</tr>
		<{/foreach}>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="2"><a href="<{app_url url='system/sysViewLog?action=clean_ip_log'}>" onclick="ajaxGet(this.href, '<{app_url url='system/sysViewLog'}>', '<{$lang.operation_success}>');return(false)"><{$lang.clean_log}></a></td>
			<td colspan="4" align="right"><{$pages}></td>
		</tr>
	</tfoot>
	</table>
<{else}>
	<div class="no_data"><{$lang.no_data}></div>
<{/if}>