<?php /* Smarty version Smarty-3.0.7, created on 2011-03-01 20:55:05
         compiled from "D:\www\v30\administrator\views\layout/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92034d6ceca9132fe2-36828554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e618364515fb4da05c8d8cefe056292ed7e7943' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\layout/login.tpl',
      1 => 1298127729,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92034d6ceca9132fe2-36828554',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" id="minwidth">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
"/>
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
		return confirm('<?php echo $_smarty_tpl->getVariable('lang')->value['remember_me_warning'];?>
');
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

<title><?php echo $_smarty_tpl->getVariable('lang')->value['back_login'];?>
</title>

</head>

<body>

<div id="site">
		
	<!--content section-->
	<div class="login_wrap">
		
		<div id="login-box">
		<div class="s_border_top"><div><div></div></div></div>
		
		<div id="login">
		<h1><?php echo $_smarty_tpl->getVariable('lang')->value['back_login'];?>
</h1>
		<form action="<?php echo smarty_function_app_url(array('url'=>'system/sysLogin'),$_smarty_tpl);?>
" name="login" method="post" onsubmit="return checkThisForm(this)">
		<table border="0" width="100%" cellspacing="8" class="login">
		<tr valign="top">
			<td width="152">
				<div style="margin:0px 0 8px 0px;color:#000000">
					<?php echo $_smarty_tpl->getVariable('lang')->value['please_use_available_username_and_passowrd'];?>

				</div>
				<div class="return_index"><a href="<?php echo $_smarty_tpl->getVariable('root_url')->value;?>
index.html"><?php echo $_smarty_tpl->getVariable('lang')->value['site_index'];?>
</a></div>
				<div class="lock"></div>
			</td>
			<td width="290">
				<div class="s_border_top"><div><div></div></div></div>
				<div class="loginform">
					<table width="100%" cellspacing="10">
					<tr>
						<td width="30%" align="right"><?php echo $_smarty_tpl->getVariable('lang')->value['username'];?>
</td>
						<td><input type="text" name="username" required="true" msg="<?php echo ($_smarty_tpl->getVariable('lang')->value['not_empty']).($_smarty_tpl->getVariable('lang')->value['username']);?>
" autocomplete="off" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('username')->value)===null||$tmp==='' ? $_COOKIE['remember_login_admin'] : $tmp);?>
" style="width:132px;ime-mode:disabled"/></td>
					</tr>
					<tr>
						<td align="right"><?php echo $_smarty_tpl->getVariable('lang')->value['password'];?>
</td>
						<td><input type="password" name="password" value="" style="width:132px;ime-mode:disabled" required="true" msg="<?php echo ($_smarty_tpl->getVariable('lang')->value['not_empty']).($_smarty_tpl->getVariable('lang')->value['password']);?>
" /></td>
					</tr>
					<?php if ($_smarty_tpl->getVariable('open_back_login_captcha')->value>0){?>
					<tr>
						<td align="right"><?php echo $_smarty_tpl->getVariable('lang')->value['captcha'];?>
</td>
						<td>
							<div class="captcha">
								<input type="text" name="vcode" value="" onkeyup="chupper(this)" style="width:60px;ime-mode:disabled" required="true" msg="<?php echo ($_smarty_tpl->getVariable('lang')->value['not_empty']).($_smarty_tpl->getVariable('lang')->value['captcha']);?>
"/>
								<img src="../validate.php" border="0" onclick="re_captcha(this)" title="<?php echo $_smarty_tpl->getVariable('lang')->value['change_one_captcha'];?>
" class="pointer"/>
							</div>
						</td>
					</tr>
					<?php }?>
					<tr>
						<td align="right"><?php echo $_smarty_tpl->getVariable('lang')->value['remember_me'];?>
</td>
						<td>
							<div class="remember_me">
								<input type="checkbox" name="remember" value="1" onclick="return confirm_remember(this)"/>&nbsp;
								<span class="grey">(<?php echo $_smarty_tpl->getVariable('lang')->value['remember_me_tip'];?>
)</span>
							</div>
						</td>
					</tr>
					<tr>
						<td align="right">&nbsp;</td>
						<td>							
							<input type="submit" name="submit" value="<?php echo $_smarty_tpl->getVariable('lang')->value['login'];?>
" class="btn"/>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center; color:#ff0000">
							<?php echo $_smarty_tpl->getVariable('error')->value;?>

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
		<?php echo $_smarty_tpl->getVariable('copyright')->value;?>

	</div>
</div>


</body>
</html>