<{if !empty($list)}>
<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="35"><{$lang.id}></th>
		<th><{$lang.title}></th>
		<th><{$lang.adv_position}></th>		
		<th width="90"><{$lang.start_time}></th>
		<th width="90"><{$lang.end_time}></th>
		<th width="75"><{$lang.operation}></th>
	</tr>
</thead>
<tbody>
	<{foreach from=$list item="itm" name="fname"}>
	<tr class="row<{$smarty.foreach.fname.iteraction%2}>">
		<td align="center"><{$itm.id}></td>
		<td><a href="javascript:void(0)" onmouseover="showImg('<{$smarty.const.UPLOAD_URL}><{$itm.image}>', '222')" onmouseout="nd()"><{$itm.title}></a></td>
		<td align="center"><{$itm.position}></td>
		<td align="center"><{$itm.start_time|default:-1}></td>
		<td align="center"><{$itm.end_time|default:-1}></td>
		<td align="center">
			<{if $pos_id>''}>
				<{admin_edit id=$itm.id href=$pos_id|pcat:"advertisement/writeAdv?pos_id="|app_url}>
			<{else}>
				<{admin_edit id=$itm.id href="advertisement/writeAdv"|app_url}>
			<{/if}>
			<{admin_delete id=$itm.id t="ads" href="advertisement/listAdv"|app_url image="image"}>
		</td>
	</tr>
	<{/foreach}>
</tbody>
</table>
<{else}>
	<div class="no_data"><{$lang.no_data}></div>
<{/if}>