<{$top_position}>
<{include file="inner.left.html"}>
<script type="text/javascript" src="<{$smarty.const.ROOT_URL}>kindeditor/kindeditor.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	notebook_load_submit_area();
	pagination("<{app_url url='Index/notebookPage'}>");
});
</script>
<div class="notebook">
	<h2><{$lang.notebook}></h2>
	<div class="blank">&nbsp;</div>
	
	<div id="pagination_show"></div>		
	
	<div class="blank">&nbsp;</div>
	<div class="blank">&nbsp;</div>
	
	<div id="submit_area_id"><img border="0" src="images/loading.gif"/></div>
	
	<div class="blank">&nbsp;</div>
	<div class="blank">&nbsp;</div>
	<{if empty($user.user_id)}>
		<div class="tip_login">
			<{$lang.notebook_please_login}>&nbsp;
			<a href="tb_login.php?width=400&height=280&KeepThis=true&TB_iframe=true&modal=true" class="thickbox"><span style="color:#00EE00"><{$lang.login}></span></a>--<a href="tb_register.php?width=400&height=350&KeepThis=true&TB_iframe=true&modal=true" class="thickbox"><{$lang.quick_register}></a>
		</div>
	<{/if}>
</div>

<{include file="inner.right.html"}>
