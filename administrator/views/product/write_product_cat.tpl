<form action="<{app_url url='product/writeProductCat'}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{if $edit.cat_id > 0}><{app_url url='product/listProductCat'}><{else}><{app_url url='product/writeProductCat'}><{/if}>')">
<div class="adminform">
	<div class="f_title"><{$head_top.title}></div>

	<{text label=$lang.title name="wrt_cat_name" value=$edit.cat_name required="true"}>
	
	<{select label=$lang.parent_cat name="wrt_parent_id" value=$parents selected=$edit.parent_id required="true"}>
		
	<{text label=$lang.ordering name="wrt_ordering" value=$edit.ordering|default:'50' required="true" datatype="NUMERIC" size="s"}>
	
	<{select label=$lang.published name="wrt_published" value=$alternative selected=$edit.published}>
	
	<{if $edit.cat_id > 0}>
		<{radio label=$lang.terminal name="wrt_is_terminal" value=$alternative attrs="disabled=true" checked=$edit.is_terminal|default:1}>
	<{else}>
		<{radio label=$lang.terminal name="wrt_is_terminal" note=$lang.choose_product_terminal_tip value=$alternative checked=$edit.is_terminal|default:1}>
	<{/if}>
	
	<{textarea label=$lang.description name="wrt_description" value=$edit.description width="500px" height="100px"}>
	<{if $edit.cat_id > 0}>
		<input type="hidden" name="wrt_id" value="<{$edit.cat_id}>"/>
	<{/if}>
	<{submit name="submit" value=$lang.submit back_url='product/listProductCat'|app_url}>
</div>
</form>