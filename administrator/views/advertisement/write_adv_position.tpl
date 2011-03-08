<form action="<{app_url url='advertisement/writeAdvPosition'}>" onsubmit="return ajaxDoSubmit(this, '<{if $edit.pos_id>0}><{app_url url='advertisement/listAdvPosition'}><{else}><{app_url url='advertisement/writeAdvPosition'}><{/if}>')">
<div class="adminform">
	<div class="f_title"><{$head_top.title}></div>
	<{text name="wrt_pos_name" value=$edit.pos_name required="true" label=$lang.name}>
	<{text name="wrt_img_width" value=$edit.img_width required="true" datatype="NUMERIC" label=$lang.width size="s" note=$lang.unit|cat:'(px)'}>
	<{text name="wrt_img_height" value=$edit.img_height required="true" datatype="NUMERIC" label=$lang.height size="s" note=$lang.unit|cat:'(px)'}>
	<{textarea name="wrt_description" value=$edit.description label=$lang.description height="100px" width="400px"}>
	<{if $edit.pos_id>0}>
		<input type="hidden" name="wrt_id" value="<{$edit.pos_id}>"/>
	<{/if}>
	<{submit name="submit" value=$lang.submit back_url='advertisement/listAdvPosition'|app_url}>
</div>
</form>