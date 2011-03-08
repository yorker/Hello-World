<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="<{$admin_url}>"/>
<!--include CSS file from here-->
<style type="text/css">
	@import url(css/admin.css);
	@import url(../css/thickbox.css);
	@import url(../vendors/highslide/highslide.css);
	@import url(css/common.admin.css);
	@import url(../css/jq.calendar.css);
</style>

<!--include JS file from here-->
<script type="text/javascript" src="../js/config.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/overlib.js"></script>
<script type="text/javascript" src="../js/thickbox.js"></script>
<script type="text/javascript" src="<{$smarty.const.ROOT_URL}>kindeditor/kindeditor.js"></script>
<script type="text/javascript" src="../js/jq.calendar.js"></script>
<script type="text/javascript" src="../js/base.js"></script>
<script type="text/javascript" src="js/common.admin.js"></script>
<script type="text/javascript" src="js/common.js"></script>

<script type="text/javascript" src="js/swfupload.js"></script>
<script type="text/javascript" src="js/handlers.js"></script>

<title><{$lang.back_title}></title>

</head>

<body>
<div id="site">
	<!--header section-->
	<div id="header">
		<div id="header-top">
			<div class="bgr">
				<div class="bgl">
					<div class="usericon clearfix">
						<div class="fl">
							<img src="images/user.gif" border="0" alt=""/>
							<span class="title"><{$lang.back_title}></span>
						</div>
						<div class="fr">
							<div class="line"><{load_page href="system/sysStart"|app_url link=$lang.page_start}><label>|</label><a href="../" target="_blank"><{$lang.view_site}></a><label>|</label><a href="javascript:location.reload()"><{$lang.refresh}></a><label>|</label><{load_page href="system/setConfiguration"|app_url link=$lang.sys_config}><label>|</label><a href="javascript:void(0)" onclick="clearCache(this, '<{app_url url='system/ajaxClearCache'}>');"><{$lang.clear_cache}></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="header-box">

			<!--top menu from here-->
				<{include file="elements/top_menu.html"}>
			<!--top menu end-->


			<div class="sysinfo">
				<span><{$lang.welcome}>: <{if $admin.admin_rank==1}><{$lang.general_admin}><{elseif $admin.admin_rank==2}><{$lang.advance_admin}><{else}><{$lang.super_admin}><{/if}> <i><{$admin.admin_name}></i></span>
				<span><a href="<{app_url url='system/sysLogout'}>"><{$lang.logout}></a></span>
			</div>
			<div class="clr"></div>
		</div>
	</div>	
	<!--content section-->
	<div id="container">
		<table border="0" align="center" id="wrap_table" cellspacing="0" cellpadding="0">
		<tr valign="top">			
			<td width="20%" id="menu_wrap">
				<div class="s_border_top">
					<div><div></div></div>
				</div>

				<div id="area_left">&nbsp;</div>

				<div class="s_border_bottom">
					<div><div></div></div>
				</div>
			</td>
			<td id="show_menu_wrap">
				<img class="toggle_menu" src="images/arrow_left.gif" border="0" onclick="toggle_menu(this)"/>
			</td>
			<td id="frame_main_content">
				<div class="s_border_top">
					<div><div></div></div>
				</div>

				<!--area_right begin-->
				<div id="area_right">&nbsp;</div>
				<!--area_right end-->

				<div class="s_border_bottom">
					<div><div></div></div>
				</div>
			</td>
		</tr>
		</table>
	</div>
	<div class="border-bottom">
		<div><div></div></div>
	</div>

	<!--footer section-->
	<div id="footer">
		<{$copyright}>
	</div>
</div>


</body>
</html>