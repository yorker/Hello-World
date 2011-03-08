<form action="<{app_url url='article/writeCategory'}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{if $edit.cat_id>0}><{app_url url='article/listCategory'}><{else}><{app_url url='article/writeCategory'}><{/if}>')">
<div class="adminform">
	<div class="f_title"><{$head_top.title}></div>
	<{text label=$lang.name name="wrt_cat_name" value=$edit.cat_name required="true"}>
	<{select label=$lang.parent_cat name="wrt_parent_id" value=$art_cat selected=$edit.parent_id}>
	<{if $edit.cat_id>0}>
		<{radio label=$lang.terminal name="wrt_is_terminal" value=$is_terminal checked=$edit.is_terminal|default:1  note=$lang.is_only_published_by_terminal attrs="disabled=1"}>
	<{else}>
		<{radio label=$lang.terminal name="wrt_is_terminal" value=$is_terminal checked=$edit.is_terminal|default:1  note=$lang.is_only_published_by_terminal}>
	<{/if}>
	<{text label=$lang.ordering name="wrt_ordering" value=$edit.ordering|default:'50' required="true" datatype="NUMERIC" size="s"}>
	<{textarea label=$lang.description name="wrt_cat_desc" value=$edit.cat_desc width="400px" height="120px"}>
	<{if $edit.cat_id>0}><input type="hidden" name="wrt_id" value="<{$edit.cat_id}>"/><{/if}>
	<{submit name="submit" value=$lang.submit}>
</div>
</form>