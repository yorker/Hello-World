<form action="<{app_url url='product/writeBrand'}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{$reload}>')">
    <div class="adminform">
        <div class="f_title"><{$head_top.title}></div>
        <{text label=$lang.name name="wrt_brand_name" value=$edit.brand_name required="true" unique="product_brand"}>
        <{text label=$lang.website name="wrt_website" value=$edit.website}>
        <{upload label="LOGO" name="wrt_logo" value=$edit.logo}>
        <{text label=$lang.ordering name="wrt_ordering" value=$edit.ordering|default:50 required="true" datatype="NUMERIC" size="s"}>
        <{select label=$lang.available name="wrt_is_available" value=$is_available selected=$edit.is_available}>
        <{textarea label=$lang.description name="wrt_description" value=$edit.description width="480px" height="200px"}>
        <{if !empty($edit.brand_id)}>
            <input type="hidden" name="wrt_id" value="<{$edit.brand_id}>"/>
        <{/if}>
        <{submit value=$lang.submit}>
       
    </div>        
</form>