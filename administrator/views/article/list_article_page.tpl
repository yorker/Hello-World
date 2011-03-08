<{if !empty($list)}>
	<table class="adminlist" cellspacing="1">
	<thead>
		<tr>
			<th width="30"><input type="checkbox" onclick="checkAll(this, 'chkflag')" title="<{$lang.check_all_none}>"/></th>
			<th><{$lang.title}></th>
			<th><{$lang.belong_cat}></th>
			<th><{$lang.mix_option}></th>
			<th width="60"><{$lang.ordering}></th>
			<th><{$lang.published}></th>
			<th><{$lang.click}></th>
			<th width="100"><{$lang.create_time}></th>		
			<th width="55"><{$lang.operation}></th>
		</tr>
	</thead>
	<tbody>
		<{foreach from=$list item="itm" name="fname"}>
		<tr class="row<{$smarty.foreach.fname.iteration%2}>">
			<td align="center"><input type="checkbox" name="cid" value="<{$itm.article_id}>" class="chkflag"/></td>
			<td>
				<a href="<{app_url url='article/writeArticle?id='|cat:$itm.article_id}>" onclick="loadPage(this);return(false);"><{$itm.title|escape}></a>
				<{if $itm.cover_img}>
					&nbsp;<a href="javascript:void(0)" onmouseover="showImg('<{$smarty.const.UPLOAD_URL}><{$itm.cover_img}>', 100)" onmouseout="nd()"><img src="images/picflag.gif" border="0" title="<{$lang.has_cover_img}>"/></a>
				<{/if}>
				<{if $itm.link}>
					<img src="images/link.gif" border="0" title="<{$lang.is_out_link}>"/>
				<{/if}>
			</td>
			<td align="center"><a href="<{app_url url='article/listArticle?cat_id='|cat:$itm.cat_id}>" onclick="loadPage(this);return(false)"><{$itm.cat_name|escape}></a></td>
			<td align="center"><{$itm.mix_options|default:'--'}></td>
			<td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'article', 'ordering', '<{$itm.article_id}>', '1')"><{$itm.ordering}></div></td>
			<td align="center">
				<{admin_switcher t="article" f="published" value=$itm.published id=$itm.article_id}>
			</td>
			<td align="center">
				<{$itm.click_count}>
			</td>
			<td align="center"><{$itm.create_time|date_format:'%Y-%m-%d'}></td>		
			<td align="center">
				<{if $cat_id>0}>
					<{admin_edit href=$cat_id|pcat:"article/writeArticle?cat_id="|app_url id=$itm.article_id}>
					<{admin_delete t="article" id=$itm.article_id url=$cat_id|pcat:'article/listArticle?cat_id='|app_url image="cover_img"}>
				<{else}>
					<{admin_edit href="article/writeArticle"|app_url id=$itm.article_id}>
					<{admin_delete t="-" id=$itm.article_id url=$cat_id|pcat:'article/listArticle?cat_id='|app_url image="cover_img" req_url="article/procDeleteArticle"|app_url}>
				<{/if}>					
			</td>
		</tr>
		<{/foreach}>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="10">
				<div class="clearfix">
					<div class="fl">
						<input type="button" value="<{$lang.batch_delete}>" class="btn" onclick="batchDeleteByCheckbox('-', 'chkflag', '<{app_url url='article/listArticle?cat_id='|cat:$cat_id}>', '', 'cover_img', '<{app_url url='article/procDeleteArticle'}>')"/>
					</div>
					<div class="fr"><{$pages}></div>
				</div>
			</td>
		</tr>
	</tfoot>
	</table>
<{else}>
	<div class="no_data"><{$lang.no_data}></div>
<{/if}>