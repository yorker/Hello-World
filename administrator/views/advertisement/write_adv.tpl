<script type="text/javascript">
$(document).ready(function() {
	$("#start_time").calendar();
	$("#end_time").calendar();
});
</script>
<form action="<{app_url url='advertisement/writeAdv'}>" onsubmit="return ajaxDoSubmit(this, '<{$op_reurl}>')">
<div class="adminform">
	<div class="f_title"><{$head_top.title}></div>
	<{text label=$lang.title name="wrt_title" value=$edit.title required="true" size="l"}>
	
	<{select label=$lang.adv_position name="wrt_pos_id" value=$cats selected=$edit.pos_id required="true"}>
	
	<{upload label=$lang.upload name="wrt_image" value=$edit.image required="true"}>
	
	<{text label=$lang.link name="wrt_link" value=$edit.image|default:'http://' size="l"}>
	
	<{text label=$lang.start_time name="wrt_start_time" value=$edit.start_time id="start_time"}>
	
	<{text label=$lang.end_time name="wrt_end_time" value=$edit.end_time id="end_time"}>
	
	<{select label=$lang.open_type name="wrt_open_type" value=$open_types selected=$edit.open_type|default:'1'}>
	
	<{radio label=$lang.published name="wrt_published" value=$published checked=$edit.published|default:1}>
	
	<{if $edit.id>0}>
		<input type="hidden" name="wrt_id" value="<{$edit.id}>"/>
	<{/if}>
	
	<{submit name="submit" value=$lang.submit back_url='advertisement/list_adv'|app_url}>
</div>
</form>