<div class="startpage">
	<div class="module">
		<h2><{$lang.shortcut}></h2>
		<div class="body">
			<ul class="shortcut clearfix">
				<li><{load_page link=$lang.article_manage href="article/listArticle"|app_url}></li>
				<li><{load_page link=$lang.product_management href="product/listProduct"|app_url}></li>
				<li><{load_page link=$lang.c_picture_manage href="picture/listPicture"|app_url}></li>
				<li><{load_page link=$lang.download_management href="download/listDownload"|app_url}></li>
				<li><{load_page href="system/setConfiguration"|app_url link=$lang.sys_config}></li>
			</ul>
		</div>
	</div>
	<div class="blank">&nbsp;</div>
	<div class="blank">&nbsp;</div>
	<div class="module">
		<h2><{$lang.system_check}></h2>
		<div class="body">
			<table class="system_check" cellspacing="0" cellpadding="0" border="0">
				<{foreach from=$sysinfo item="itm"}>
				<tr>
					<td width="45%"><{$itm.key}></td>					
					<td><{$itm.value}></td>
				</tr>
				<{/foreach}>
				<tr>
					<td><a href="javascript:void(0)" onclick="cal_project_size('cal_result')"><{$lang.cal_project_size}></a></td>
					<td id="cal_result">-</td>
				</tr>
			</table>
		</div>
	</div>
</div>