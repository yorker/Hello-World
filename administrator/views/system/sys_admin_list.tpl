<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="30"><input type="checkbox" onclick="checkAll(this, 'chkflag')" title="<{$lang.check_all_none}>"/></th>
		<th><{$lang.username}></th>
		<th><{$lang.type}></th>
		<th><{$lang.email}></th>		
		<th><{$lang.available}></th>		
		<th width="100"><{$lang.operation}></th>
	</tr>
</thead>
<tbody>
	<{foreach from=$list item="itm" name="fname"}>
	<tr class="row<{$smarty.foreach.fname.iteration%2}>">
		<td align="center">
			<{if $itm.admin_rank < $admin.admin_rank}>
				<input type="checkbox" name="cid" value="<{$itm.admin_id}>" class="chkflag"/>
			<{else}>
				<label title="<{$lang.no_privilege}>">-</label>
			<{/if}>
		</td>
		<td><{$itm.admin_name}></td>
		<td align="center"><{if $itm.admin_rank == 1}><span class="grey"><{$lang.general_admin}></span><{elseif $itm.admin_rank == 2}><{$lang.advance_admin}><{else}><strong><{$lang.super_admin}></strong><{/if}></td>
		<td><{$itm.email}></td>
		<td align="center">
			<{if $itm.admin_rank < $admin.admin_rank}>
				<{admin_switcher t="sys_admin" f='is_available' id=$itm.admin_id value=$itm.is_available}></td>
			<{else}>
				<label title="<{$lang.no_privilege}>">---</label>
			<{/if}>
		<td align="center">
			<{if $itm.admin_rank < $admin.admin_rank}>
				<{admin_edit href="system/sysWriteAdmin"|app_url id=$itm.admin_id}>
				<{admin_delete t="sys_admin" id=$itm.admin_id url=$here}>
			<{else}>
				<label title="<{$lang.no_privilege}>">---</label>
			<{/if}>
		</td>
	</tr>
	<{/foreach}>
</tbody>
<tfoot>
	<tr>
		<td colspan="8">
			<input type="button" value="<{$lang.batch_delete}>" class="btn" onclick="batchDeleteByCheckbox('sys_admin', 'chkflag', '<{$here}>')"/>
		</td>
	</tr>
</tfoot>
</table>