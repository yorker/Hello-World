<{if !empty($list)}>
<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="30"><input type="checkbox" onclick="checkAll(this, 'chkflag');" title="check_all_none"/></th>
		<th><{$lang.flash_ads_image}></th>
		<th><{$lang.title}></th>
		<th><{$lang.link}></th>		
		<th><{$lang.operation}></th>
	</tr>
</thead>

<tbody>
	<{foreach from=$list item="itm" name="fname"}>
	<tr class="row<{$smarty.foreach.fname.iteration%2}>">
		<td align="center"><input type="checkbox" name="cid" value="<{$itm.id}>" class="chkflag"/></td>
		<td><a href="javascript:void(0)" onmouseover="showImg('<{$smarty.const.UPLOAD_URL}><{$itm.image}>', 150)" onmouseout="nd()"><{$itm.image}></a></td>
		<td><{$itm.title|default:''}></td>
		<td><{$itm.link}></td>
		<td align="center">
			<{admin_edit href="advertisement/writeFlashAds" id=$itm.id}>
			<{admin_delete t='flash_ads' id=$itm.id url="advertisement/listFlashAds" image="image"}>
		</td>
	</tr>
	<{/foreach}>
</tbody>

<tfoot>
	<tr>
		<td colspan="5">
			<input type="button" value="<{$lang.batch_delete}>" class="btn" onclick="batchDeleteByCheckbox('flash_ads', 'chkflag', '<{app_url url='advertisement/listFlashAds'}>', '', 'image');"/>
		</td>
	</tr>
</tfoot>

</table>
<{else}>
<div class="no_data"><{$lang.no_data}></div>
<{/if}>