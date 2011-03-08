<div class="op_bar">
	<input type="button" value="<{$lang.backend_log}>" class="btn" onclick="pagination('<{app_url url='system/sysViewLogPage?show=backend'}>')"/>&nbsp;
	<input type="button" value="<{$lang.frontend_log}>" class="btn" onclick="pagination('<{app_url url='system/sysViewLogPage?show=frontend'}>')"/>&nbsp;
	<input type="button" value="<{$lang.ip_log}>" class="btn" onclick="pagination('<{app_url url='system/sysViewIpLogPage'}>')"/>&nbsp;	
</div>

<div id="pagination_show"></div>