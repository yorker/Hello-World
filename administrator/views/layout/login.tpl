<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" id="minwidth">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="<{$admin_url}>"/>
<!--include CSS file from here-->
<style type="text/css">
	@import url(css/admin.css);
	@import url(css/login.css);
</style>

<!--include JS file from here-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/base.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	document.forms['login'].username.focus();
});
function confirm_remember(obj) {	
	if(obj.checked) {
		return confirm('<{$lang.remember_me_warning}>');
	}
}
function checkThisForm(fobj) {
	if(checkForm(fobj)) {
		if(fobj.vcode) {
			encrypt(fobj);
		}
		return true;
	} else {
		return false;
	}
}
</script>

<title><{$lang.back_login}></title>

</head>

<body>

<div id="site">
		
	<!--content section-->
	<div class="login_wrap">
		
		<div id="login-box">
		<div class="s_border_top"><div><div></div></div></div>
		
		<div id="login">
		<h1><{$lang.back_login}></h1>
		<form action="<{app_url url='system/sysLogin'}>" name="login" method="post" onsubmit="return checkThisForm(this)">
		<table border="0" width="100%" cellspacing="8" class="login">
		<tr valign="top">
			<td width="152">
				<div style="margin:0px 0 8px 0px;color:#000000">
					<{$lang.please_use_available_username_and_passowrd}>
				</div>
				<div class="return_index"><a href="<{$root_url}>index.html"><{$lang.site_index}></a></div>
				<div class="lock"></div>
			</td>
			<td width="290">
				<div class="s_border_top"><div><div></div></div></div>
				<div class="loginform">
					<table width="100%" cellspacing="10">
					<tr>
						<td width="30%" align="right"><{$lang.username}></td>
						<td><input type="text" name="username" required="true" msg="<{$lang.not_empty|cat:$lang.username}>" autocomplete="off" value="<{$username|default:$smarty.cookies.remember_login_admin}>" style="width:132px;ime-mode:disabled"/></td>
					</tr>
					<tr>
						<td align="right"><{$lang.password}></td>
						<td><input type="password" name="password" value="" style="width:132px;ime-mode:disabled" required="true" msg="<{$lang.not_empty|cat:$lang.password}>" /></td>
					</tr>
					<{if $open_back_login_captcha>0}>
					<tr>
						<td align="right"><{$lang.captcha}></td>
						<td>
							<div class="captcha">
								<input type="text" name="vcode" value="" onkeyup="chupper(this)" style="width:60px;ime-mode:disabled" required="true" msg="<{$lang.not_empty|cat:$lang.captcha}>"/>
								<img src="../validate.php" border="0" onclick="re_captcha(this)" title="<{$lang.change_one_captcha}>" class="pointer"/>
							</div>
						</td>
					</tr>
					<{/if}>
					<tr>
						<td align="right"><{$lang.remember_me}></td>
						<td>
							<div class="remember_me">
								<input type="checkbox" name="remember" value="1" onclick="return confirm_remember(this)"/>&nbsp;
								<span class="grey">(<{$lang.remember_me_tip}>)</span>
							</div>
						</td>
					</tr>
					<tr>
						<td align="right">&nbsp;</td>
						<td>							
							<input type="submit" name="submit" value="<{$lang.login}>" class="btn"/>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center; color:#ff0000">
							<{$error}>
						</td>
					</tr>
					</table>
				</div>
				<div class="s_border_bottom"><div><div></div></div></div>
			</td>
			<td>&nbsp;</td>
		</tr>
		</table>
		</form>
		</div>
		
		<div class="s_border_bottom"><div><div></div></div></div>
		</div>
		
	</div>
	
	<!--footer section-->
	<div id="footer">
		<{$copyright}>
	</div>
</div>


</body>
</html>