<form action="<{app_url url='friendlink/write'}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{if $edit.id>0}><{app_url url='friendlink/listing'}><{else}><{app_url url='friendlink/write'}><{/if}>')">
<div class="adminform">
	<div class="f_title"><{$head_top.title}></div>

	<{text label=$lang.name name="wrt_name" value=$edit.name required="true"}>
	
	<{text label=$lang.link name="wrt_link" value=$edit.link required="true" size="l"}>
	
	<{upload label=$lang.logo_img name="wrt_logo" value=$edit.logo note=$lang.if_has_logo_img_please_upload}>
	
	<{text label=$lang.ordering name="wrt_ordering" value=$edit.ordering|default:'50' size="s" required="true" datatype="NUMERIC"}>
	<{if $edit.id>0}><input type="hidden" name="wrt_id" value="<{$edit.id}>"/><{/if}>
	<{submit value=$lang.submit name="submit" back_url='friendlink/listing'}>
	
</div>
</form>