<script type="text/javascript">
function fold_and_unfold(aobj) {
	var e_fold_all = '<{$lang.fold_all}>';
	var e_unfold_all = '<{$lang.unfold_all}>';
	if(aobj.className == 'flag_fold') {
		fold_all(0);
		aobj.className = '';
		aobj.innerHTML = e_fold_all;
	} else {
		fold_all(1);
		aobj.className = 'flag_fold';
		aobj.innerHTML = e_unfold_all;
	}
}
</script>
<div class="op_bar clearfix">
	<div class="fl">
		<a href="javascript:void(0)" onclick="fold_and_unfold(this)" class="flag_fold"><{$lang.unfold_all}></a>
	</div>
	<div class="fr"><a href="javascript:void(0)" onclick="openAjaxWin('<{app_url url='article/writeBatchCategory'}>', 550, 330)"><{$lang.batch_add_cat}></a></div>
</div>

<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="30"><{$lang.id}></th>
		<th><{$lang.name}></th>
		<th width="100"><{$lang.art_number}></th>
		<th width="100"><{$lang.ordering}></th>
		<th width="150"><{$lang.operation}></th>		
	</tr>	
</thead>
<tbody>
	<{foreach from=$list item="itm" name="lname"}>
	<tr class="<{if $itm.is_terminal==0}>row2<{else}>row<{$smarty.foreach.lname.iteration%2}><{/if}> parent_<{$itm.parent_id}>">
		<td align="center"><{$itm.cat_id}></td>
		<td<{if $itm.is_terminal==0}> class="red"<{/if}>>
			<{load_page link=$itm.cat_name href=$itm.cat_id|pcat:'article/listArticle?cat_id='|app_url}>
			&nbsp;
			<{if $itm.is_terminal==0}><img src="images/jian.gif" title="<{$lang.fold}>/<{$lang.unfold}>" border="0" onclick="cat_switch(this, '<{$itm.plist}>', '<{$itm.cat_id}>')"/><{/if}>
		</td>
		<td align="center"><{$itm.art_num}></td>
		<td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'article_cat', 'ordering', '<{$itm.cat_id}>', 1, 's')"><{$itm.ordering}></div></td>
		<td align="center">
			<{admin_view href=$itm.cat_id|pcat:'article/listArticle?cat_id='|app_url}>
			<{admin_edit href="article/writeCategory"|app_url id=$itm.cat_id}>
			<{if $itm.art_num==0}><{admin_delete t="article_cat" url="article/listCategory"|app_url id=$itm.cat_id}><{/if}>
		</td>
	</tr>
	<{foreachelse}>
	<tr>
		<td colspan="4" align="center"><{$lang.no_data}></td>
	</tr>
	<{/foreach}>
</tbody>
</table>