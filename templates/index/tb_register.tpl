<{if !empty($error)}>
<div class="blank">&nbsp;</div>
<div class="tb_error"><{$error}></div>
<div class="blank">&nbsp;</div>
<{/if}>

<{if !empty($register_success)}>
	<script type="text/javascript">
		$(document).ready(function() {
			parent.location.reload();
			setTimeout("winclose()", 3000);
		});		
	</script>
	<div class="reg_success_info">
		<{$lang.register_success}> <{$lang.window_auto_close}> 
		<a href="javascript:void(0)" onclick="winclose()"><span class="green"><{$lang.immediate_close}></span></a>
	</div>
<{else}>
<script type="text/javascript">
	$(document).ready(function() {
		$("#username_id").focus();
	});
	function checkRegister(fobj) {
		if(!checkForm(fobj)) {
			return false;
		}
		encrypt(fobj);
		var pwd = fobj.password.value;
		var cpwd = fobj.confirm_password.value;
		if(!empty(pwd) && !empty(cpwd) && pwd != cpwd) {
			alert('<{$lang.password_not_identity}>');
			return false;
		} else {
			return true;
		}
	}
	function checkUsername(obj) {
		if(!empty(obj.value)) {
			var username = $.trim(obj.value);
			$.ajax({
				type: 'post',
				url: "<{app_url url='Index/ajaxCheckUsername'}>",
				data: 'action=check_username&username=' + encodeURIComponent(username),
				success: function(msg) {
					msg = $.trim(msg);					
					if(msg == 'ok') {
						$('#username_tip').html('<img src="images/yes.gif" border="0"/>');						
						return true;
					} else {
						$('#username_tip').html('<img src="images/no.gif" border="0"/>');
						alert('<{$lang.username_exists}>');
						obj.value = '';
						obj.focus();
						return false;
					}
				}
			});
		} else {
			$('#username_tip').html('<img src="images/no.gif" border="0"/>');
		}
	}
</script>
<form action="<{app_url url='Index/tbRegister'}>" method="post" onsubmit="return checkRegister(this)">
<table class="tb_formtable">
	<tr>
		<td width="70"><{$lang.username}></td>
		<td>
			<input type="text" name="username" value="<{$_post.username}>" class="bold" style="ime-mode:disabled; width:180px;" required="true" msg="<{$lang.username}><{$lang.is_required}>" autocomplete="off" onblur="checkUsername(this)" id="username_id"/>
			<span class="red">*</span> <span id="username_tip"></span>
			<div class="notice"><{$lang.register_username_tip}></div>
		</td>
	</tr>
	<tr>
		<td><{$lang.password}></td>
		<td>
			<input type="password" name="password" value="" style="width:180px;" required="true" msg="<{$lang.password}><{$lang.is_required}>"/>
			<span class="red">*</span>
		</td>
	</tr>
	<tr>
		<td><{$lang.confirm_password}></td>
		<td>
			<input type="password" name="confirm_password" value="" style="width:180px;" required="true" msg="<{$lang.confirm_password}><{$lang.is_required}>"/>
			<span class="red">*</span>
		</td>
	</tr>
	<tr>
		<td><{$lang.captcha}></td>
		<td>
			<input type="text" name="vcode" value="" size="4" style="ime-mode:disabled" onkeyup="chupper(this)" required="true" msg="<{$lang.captcha}><{$lang.is_required}>" autocomplete="off"/>
			<span class="red">*</span>
			<img border="0" src="validate.php?_t=<{$smarty.now}>" onclick="re_captcha(this)" title="<{$lang.change_one_captcha}>" class="pointer"/>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" name="submit" value="<{$lang.submit}>"/>&nbsp; 
			<input type="button" name="cancel" value="<{$lang.cancel}>" onclick="winclose()"/>
		</td>
	</tr>
</table>

</form>
<{/if}>