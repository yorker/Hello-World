<form action="<{app_url url='common/writeNormalCategory?type='|cat:$type}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{if $edit.cat_id>0}><{app_url url='common/listNormalCategory?type='|cat:$type}><{else}><{app_url url='common/writeNormalCategory?type='|cat:$type}><{/if}>')">
<div class="adminform">
	<div class="f_title"><{$head_top.title}></div>
	<{text label=$lang.name name="wrt_name" value=$edit.name required="true"}>
	<{textarea label=$lang.description name="wrt_description" value=$edit.description width="380px" height="100px"}>
	<{text label=$lang.ordering name="wrt_ordering" value=$edit.ordering|default:'50' required="true" datatype="NUMERIC" size="s"}>
	<{radio label=$lang.published name="wrt_published" value=$published checked=$edit.published|default:'1'}>
	<input type="hidden" name="wrt_type" value="<{$type}>"/>
	<{if $edit.cat_id > 0}><input type="hidden" name="wrt_id" value="<{$edit.cat_id}>"/><{/if}>
	<{submit name="submit" value=$lang.submit}>
</div>
</form>