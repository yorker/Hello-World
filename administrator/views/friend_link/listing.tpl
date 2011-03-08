<{if !empty($list)}>
<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="30"><input type="checkbox" onclick="checkAll(this, 'chkflag')" title="<{$lang.check_all_none}>"/></th>
		<th><{$lang.name}></th>
		<th><{$lang.link}></th>
		<th><{$lang.logo_img}></th>		
		<th><{$lang.ordering}></th>		
		<th width="100"><{$lang.operation}></th>
	</tr>
</thead>
<tbody>
	<{foreach from=$list item="itm" name="fname"}>
	<tr class="row<{$smarty.foreach.fname.iteration%2}>">
		<td align="center"><input type="checkbox" name="cid" value="<{$itm.id}>" class="chkflag"/></td>
		<td><a href="<{$itm.link}>" target="_blank"><{$itm.name}></a></td>
		<td><div class="dyna_edit" onclick="loadEdit(this, 'friend_link', 'link', '<{$itm.id}>')"><{$itm.link}></div></td>
		<td align="center"><{if !empty($itm.logo)}><a href="javascript:void(0)" onmouseover="showImg('<{$smarty.const.UPLOAD_URL}><{$itm.logo}>')" onmouseout="nd()"><img src="images/picflag.gif" border="0"/></a><{else}><{$lang.none}><{/if}></td>
		<td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'friend_link', 'ordering', '<{$itm.id}>', 1)"><{$itm.ordering}></div></td>		
		<td align="center">
			<{admin_edit href="friendlink/write"|app_url id=$itm.id}>
			<{admin_delete t="friend_link" image="logo" id=$itm.id url="friendlink/listing"|app_url}>
		</td>
	</tr>
	<{/foreach}>
</tbody>
<tfoot>
	<tr>
		<td colspan="8">
			<input type="button" value="<{$lang.batch_delete}>" class="btn" onclick="batchDeleteByCheckbox('friend_link', 'chkflag', '<{app_url url='friendlink/listing'}>', false, 'logo')"/>
		</td>
	</tr>
</tfoot>
</table>

<{else}>
<div class="no_data"><{$lang.no_data}></div>
<{/if}>