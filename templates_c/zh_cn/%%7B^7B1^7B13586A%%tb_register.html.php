<?php /* Smarty version 2.6.26, created on 2011-02-03 11:35:21
         compiled from tb_register.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "tb_header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
<div class="blank">&nbsp;</div>
<div class="tb_error"><?php echo $this->_tpl_vars['error']; ?>
</div>
<div class="blank">&nbsp;</div>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['register_success'] )): ?>
	<script type="text/javascript">
		$(document).ready(function() {
			parent.location.reload();
			setTimeout("winclose()", 3000);
		});		
	</script>
	<div class="reg_success_info">
		<?php echo $this->_tpl_vars['lang']['register_success']; ?>
 <?php echo $this->_tpl_vars['lang']['window_auto_close']; ?>
 
		<a href="javascript:void(0)" onclick="winclose()"><span class="green"><?php echo $this->_tpl_vars['lang']['immediate_close']; ?>
</span></a>
	</div>
<?php else: ?>
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
			alert('<?php echo $this->_tpl_vars['lang']['password_not_identity']; ?>
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
				url: 'ajax.php',
				data: 'action=check_username&username=' + encodeURIComponent(username),
				success: function(msg) {
					msg = $.trim(msg);					
					if(msg == 'ok') {
						$('#username_tip').html('<img src="images/yes.gif" border="0"/>');						
						return true;
					} else {
						$('#username_tip').html('<img src="images/no.gif" border="0"/>');
						alert('<?php echo $this->_tpl_vars['lang']['username_exists']; ?>
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
<form action="tb_register.php" method="post" onsubmit="return checkRegister(this)">
<table class="tb_formtable">
	<tr>
		<td width="70"><?php echo $this->_tpl_vars['lang']['username']; ?>
</td>
		<td>
			<input type="text" name="username" value="<?php echo $this->_tpl_vars['_post']['username']; ?>
" class="bold" style="ime-mode:disabled; width:180px;" required="true" msg="<?php echo $this->_tpl_vars['lang']['username']; ?>
<?php echo $this->_tpl_vars['lang']['is_required']; ?>
" autocomplete="off" onblur="checkUsername(this)" id="username_id"/>
			<span class="red">*</span> <span id="username_tip"></span>
			<div class="notice"><?php echo $this->_tpl_vars['lang']['register_username_tip']; ?>
</div>
		</td>
	</tr>
	<tr>
		<td><?php echo $this->_tpl_vars['lang']['password']; ?>
</td>
		<td>
			<input type="password" name="password" value="" style="width:180px;" required="true" msg="<?php echo $this->_tpl_vars['lang']['password']; ?>
<?php echo $this->_tpl_vars['lang']['is_required']; ?>
"/>
			<span class="red">*</span>
		</td>
	</tr>
	<tr>
		<td><?php echo $this->_tpl_vars['lang']['confirm_password']; ?>
</td>
		<td>
			<input type="password" name="confirm_password" value="" style="width:180px;" required="true" msg="<?php echo $this->_tpl_vars['lang']['confirm_password']; ?>
<?php echo $this->_tpl_vars['lang']['is_required']; ?>
"/>
			<span class="red">*</span>
		</td>
	</tr>
	<tr>
		<td><?php echo $this->_tpl_vars['lang']['captcha']; ?>
</td>
		<td>
			<input type="text" name="vcode" value="" size="4" style="ime-mode:disabled" onkeyup="chupper(this)" required="true" msg="<?php echo $this->_tpl_vars['lang']['captcha']; ?>
<?php echo $this->_tpl_vars['lang']['is_required']; ?>
" autocomplete="off"/>
			<span class="red">*</span>
			<img border="0" src="validate.php?_t=<?php echo time(); ?>
" onclick="re_captcha(this)" title="<?php echo $this->_tpl_vars['lang']['change_one_captcha']; ?>
" class="pointer"/>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
"/>&nbsp; 
			<input type="button" name="cancel" value="<?php echo $this->_tpl_vars['lang']['cancel']; ?>
" onclick="winclose()"/>
		</td>
	</tr>
</table>

</form>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "tb_footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>