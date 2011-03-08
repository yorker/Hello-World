<div class="s_border_top">
	<div><div></div></div>
</div>
<div class="main_title clearfix">
	<div class="fl"><{$lang.back_title}><span> - <{$head_top.title}></span> &nbsp;&nbsp;<a href="<{$here}>" onclick="loadPage(this.href, 1);return(false)" title="<{$lang.refresh}>"><img src="images/refresh.gif" border="0"/></a></div>
	<{if $head_top.href && $head_top.link}><a href="<{$head_top.href}>" onclick="loadPage(this.href, 1);return(false);" class="fr"><{$head_top.link}></a><{/if}>
</div>
<div class="s_border_bottom">
	<div><div></div></div>
</div>
<div class="dist"></div>

<{if !empty($search) || !empty($choose_category)}>
<div class="s_border_top"><div><div>&nbsp;</div></div></div>
<div class="cnt_filter clearfix">
	<{if !empty($search)}>
	<div class="fl">
		<div>
			<label><{$search.label}>&nbsp;</label>
			<input type="text" id="search_key" class="<{if !$search.value}>search_init<{/if}>" name="<{$search.field}>" value="<{$search.value|default:$lang.please_inter_search_content}>" style="padding:2px 0px; width:200px; font-size:13px" onfocus=" if(this.className=='search_init'){this.value='';} this.className='';" <{if $search.table>''}>onkeyup="show_down_menu(this, '<{$search.table}>', '<{$search.field}>', 'menudown', 'search_key', '<{$search.cond_str}>')"<{/if}> autocomplete="off"/>&nbsp;&nbsp;
			<input type="button" name="search" value="<{$lang.search}>" class="btn" onclick="search_key('<{$search.base_url}>', 'search_key', '<{$search.is_page}>')"/>
		</div>
		<div id="menudown" style="display:none"></div>
	</div>
	<{/if}>
	
	<{if !empty($choose_category)}>
	<div class="fr">
		<label><{$lang.choose_category}>&nbsp;</label>
		<select name="<{$choose_category.field}>" onchange="filter_category('<{$choose_category.base_url}>', this, '<{$choose_category.is_page}>')">
			<{foreach from=$choose_category.values item="itm" key="key"}>
				<option value="<{$key}>" <{if $key==$choose_category.selected}>selected<{/if}>><{$itm}></option>
			<{/foreach}>
		</select>
	</div>
	<{/if}>
</div>
<div class="s_border_bottom"><div><div>&nbsp;</div></div></div>
<div class="dist"></div>
<{/if}>


<div class="s_border_top">
	<div><div></div></div>
</div>

<div class="main_content">
    <{include file=$main_tpl_identified}>
</div>

<div class="s_border_bottom">
	<div><div></div></div>
</div>