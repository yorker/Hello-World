<script type="text/javascript">
var sp_width;
$(document).ready(function() {
	sp_width = $("#show_plchart").width() - 5;
	$("#plchart_img").attr("src", "<{app_url url='system/sysGetFlowStatistics?w='}>"+sp_width);
});
function getChart(date) {
	if(date != null && date != '') {
		$("#plchart_img").attr("src", "<{app_url url='system/sysGetFlowStatistics?w='}>" + sp_width + "&month=" + date + "&_t="+Math.random());
	}
}
</script>
<{if !empty($date_list)}>
	<div class="flow_statistics_op_bar">		
		<select name="month" onchange="getChart(this.value)">
			<option value=""><{$lang.please_choose}></option>
			<{foreach from=$date_list item="itm"}>
				<option value="<{$itm}>"><{$itm}></option>
			<{/foreach}>
		</select>		
	</div>
<{/if}>
<div id="show_plchart"><img id="plchart_img" src="images/loading.gif"/></div>