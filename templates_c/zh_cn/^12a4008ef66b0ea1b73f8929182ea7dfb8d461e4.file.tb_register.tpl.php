<?php /* Smarty version Smarty-3.0.7, created on 2011-03-01 23:35:07
         compiled from "templates\index/tb_register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197124d6d122baea2f0-37981927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12a4008ef66b0ea1b73f8929182ea7dfb8d461e4' => 
    array (
      0 => 'templates\\index/tb_register.tpl',
      1 => 1298993689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197124d6d122baea2f0-37981927',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
?><?php if (!empty($_smarty_tpl->getVariable('error',null,true,false)->value)){?>
<div class="blank">&nbsp;</div>
<div class="tb_error"><?php echo $_smarty_tpl->getVariable('error')->value;?>
</div>
<div class="blank">&nbsp;</div>
<?php }?>

<?php if (!empty($_smarty_tpl->getVariable('register_success',null,true,false)->value)){?>
	<script type="text/javascript">
		$(document).ready(function() {
			parent.location.reload();
			setTimeout("winclose()", 3000);
		});		
	</script>
	<div class="reg_success_info">
		<?php echo $_smarty_tpl->getVariable('lang')->value['register_success'];?>
 <?php echo $_smarty_tpl->getVariable('lang')->value['window_auto_close'];?>
 
		<a href="javascript:void(0)" onclick="winclose()"><span class="green"><?php echo $_smarty_tpl->getVariable('lang')->value['immediate_close'];?>
</span></a>
	</div>
<?php }else{ ?>
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
			alert('<?php echo $_smarty_tpl->getVariable('lang')->value['password_not_identity'];?>
');
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
				url: "<?php echo smarty_function_app_url(array('url'=>'Index/ajaxCheckUsername'),$_smarty_tpl);?>
",
				data: 'action=check_username&username=' + encodeURIComponent(username),
				success: function(msg) {
					msg = $.trim(msg);					
					if(msg == 'ok') {
						$('#username_tip').html('<img src="images/yes.gif" border="0"/>');						
						return true;
					} else {
						$('#username_tip').html('<img src="images/no.gif" border="0"/>');
						alert('<?php echo $_smarty_tpl->getVariable('lang')->value['username_exists'];?>
');
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
<form action="<?php echo smarty_function_app_url(array('url'=>'Index/tbRegister'),$_smarty_tpl);?>
" method="post" onsubmit="return checkRegister(this)">
<table class="tb_formtable">
	<tr>
		<td width="70"><?php echo $_smarty_tpl->getVariable('lang')->value['username'];?>
</td>
		<td>
			<input type="text" name="username" value="<?php echo $_smarty_tpl->getVariable('_post')->value['username'];?>
" class="bold" style="ime-mode:disabled; width:180px;" required="true" msg="<?php echo $_smarty_tpl->getVariable('lang')->value['username'];?>
<?php echo $_smarty_tpl->getVariable('lang')->value['is_required'];?>
" autocomplete="off" onblur="checkUsername(this)" id="username_id"/>
			<span class="red">*</span> <span id="username_tip"></span>
			<div class="notice"><?php echo $_smarty_tpl->getVariable('lang')->value['register_username_tip'];?>
</div>
		</td>
	</tr>
	<tr>
		<td><?php echo $_smarty_tpl->getVariable('lang')->value['password'];?>
</td>
		<td>
			<input type="password" name="password" value="" style="width:180px;" required="true" msg="<?php echo $_smarty_tpl->getVariable('lang')->value['password'];?>
<?php echo $_smarty_tpl->getVariable('lang')->value['is_required'];?>
"/>
			<span class="red">*</span>
		</td>
	</tr>
	<tr>
		<td><?php echo $_smarty_tpl->getVariable('lang')->value['confirm_password'];?>
</td>
		<td>
			<input type="password" name="confirm_password" value="" style="width:180px;" required="true" msg="<?php echo $_smarty_tpl->getVariable('lang')->value['confirm_password'];?>
<?php echo $_smarty_tpl->getVariable('lang')->value['is_required'];?>
"/>
			<span class="red">*</span>
		</td>
	</tr>
	<tr>
		<td><?php echo $_smarty_tpl->getVariable('lang')->value['captcha'];?>
</td>
		<td>
			<input type="text" name="vcode" value="" size="4" style="ime-mode:disabled" onkeyup="chupper(this)" required="true" msg="<?php echo $_smarty_tpl->getVariable('lang')->value['captcha'];?>
<?php echo $_smarty_tpl->getVariable('lang')->value['is_required'];?>
" autocomplete="off"/>
			<span class="red">*</span>
			<img border="0" src="validate.php?_t=<?php echo time();?>
" onclick="re_captcha(this)" title="<?php echo $_smarty_tpl->getVariable('lang')->value['change_one_captcha'];?>
" class="pointer"/>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" name="submit" value="<?php echo $_smarty_tpl->getVariable('lang')->value['submit'];?>
"/>&nbsp; 
			<input type="button" name="cancel" value="<?php echo $_smarty_tpl->getVariable('lang')->value['cancel'];?>
" onclick="winclose()"/>
		</td>
	</tr>
</table>

</form>
<?php }?>