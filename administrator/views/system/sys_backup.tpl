<script type="text/javascript">
function data_backup(obj) {
	ajaxGet('<{app_url url='system/sysDataBackup'}>', '<{app_url url='system/sysBackup'}>', '<{$lang.operation_success}>');
	obj.value = '<{$lang.please_waiting}>';
	obj.disabled = '1';
}
</script>

<div class="sub_title"><{$lang.already_backup_file_list}></div>

<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="15"><input type="checkbox" name="ck" value="" onclick="checkAll(this, 'chkflag')"/></th>
		<th><{$lang.file}></th>
		<th><{$lang.filesize}></th>
		<th><{$lang.create_time}></th>
		<th width="100"><{$lang.operation}></th>
	</tr>
</thead>

<tbody>
	<{if !empty($list)}>
		<{foreach from=$list item="itm" name="fname"}>
			<tr class="row<{$smarty.foreach.fname.iteration%2}>">
				<td align="center"><input type="checkbox" name="cid" value="<{$itm.time}>" class="chkflag"/></td>
				<td align="center">
					<{$itm.name}>
					<{if $smarty.foreach.fname.first}> 
						&nbsp;<span class="red">(The Lastest)</span>
					<{/if}>
				</td>
				<td align="center"><{$itm.filesize}></td>
				<td align="center"><{$itm.datetime}></td>
				<td align="center"><a href="<{app_url url='system/sysBackup?action=download&id='|cat:$itm.time}>"><{$lang.download}></a></td>
			</tr>			
		<{/foreach}>
	<{else}>
		<tr class="row0">
			<td align="center" colspan="5"><{$lang.no_data}></td>
		</tr>
	<{/if}>
</tbody>

<tfoot>
	<tr>
		<td colspan="2">
			<input type="button" name="del" value="<{$lang.delete}>" onclick="del_data_backup('chkflag', '<{app_url url='system/sysBackup'}>')" class="btn"/>
		</td>
		<td align="right" colspan="3">
			<input type="button" name="button" value="<{$lang.data_backup}>" class="btn" onclick="data_backup(this)"/>
		</td>
	</tr>
</tfoot>

</table>