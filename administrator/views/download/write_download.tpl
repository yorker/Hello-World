<script type="text/javascript">
$(document).ready(function() {
	$("#create_time").calendar();
});
</script>

<form action="<{app_url url='download/writeDownload'}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{$reurl}>')">
<div class="adminform">
	<div class="f_title"><{$head_top.title}></div>
	<{text label=$lang.name name="wrt_name" value=$edit.name required="true"}>
	<{select label=$lang.category name="wrt_cat_id" value=$cats selected=$edit.cat_id|default:$cat_id|default:'' required="true" id="cat_id"}>
	<{upload_attachment label=$lang.upload_attachment name="wrt_path" value=$edit.path attach_type=$edit.attach_type note=$lang.please_upload_attachment required="true"}>
	<{text label=$lang.ordering name="wrt_ordering" value=$edit.ordering|default:'50' required="true" datatype="NUMERIC" size="s"}>
	
	<{text label=$lang.create_time name="wrt_create_date" value=$edit.create_date|default:$smarty.now|date_format:'%Y-%m-%d' id="create_time"}>
	<{radio label=$lang.published name="wrt_published" value=$published checked=$edit.published|default:'1'}>
	<{textarea label=$lang.description name="wrt_description" value=$edit.description width="500px" height="150px"}>
	
	<{if $edit.id>0}><input type="hidden" name="wrt_id" value="<{$edit.id}>"/><{/if}>
	<{submit name="submit" value=$lang.submit}>
</div>
</form>