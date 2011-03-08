<?php /* Smarty version Smarty-3.0.7, created on 2011-03-01 22:54:30
         compiled from "templates\tb_login.html" */ ?>
<?php /*%%SmartyHeaderCode:77364d6d08a6044f35-05893080%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b89c8ec6670783702be1f61207b98720f09fa1e7' => 
    array (
      0 => 'templates\\tb_login.html',
      1 => 1293201142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77364d6d08a6044f35-05893080',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("tb_header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php if (!empty($_smarty_tpl->getVariable('error',null,true,false)->value)){?>
<div class="blank">&nbsp;</div>
<div class="tb_error"><?php echo $_smarty_tpl->getVariable('error')->value;?>
</div>
<div class="blank">&nbsp;</div>
<?php }?>

<?php if (!empty($_smarty_tpl->getVariable('login_success',null,true,false)->value)){?>
	<script type="text/javascript">
		$(document).ready(function() {
			parent.location.reload();
			setTimeout("winclose()", 3000);
		});		
	</script>
	<div class="reg_success_info">
		<?php echo $_smarty_tpl->getVariable('lang')->value['login_success'];?>
 <?php echo $_smarty_tpl->getVariable('lang')->value['window_auto_close'];?>
 
		<a href="javascript:void(0)" onclick="winclose()"><span class="green"><?php echo $_smarty_tpl->getVariable('lang')->value['immediate_close'];?>
</span></a>
	</div>
<?php }else{ ?>
<script type="text/javascript">
	$(document).ready(function() {
		$("#username_id").focus();
	});
	function checkThisForm(fobj) {
		if(!checkForm(fobj)) {
			return false;
		}
		encrypt(fobj);
		return true;
	}
</script>
<form action="tb_login.php" method="post" onsubmit="return checkThisForm(this)">
<table class="tb_formtable">
	<tr>
		<td width="70"><?php echo $_smarty_tpl->getVariable('lang')->value['username'];?>
</td>
		<td>
			<input type="text" name="username" value="" class="bold" style="ime-mode:disabled; width:180px;" required="true" msg="<?php echo $_smarty_tpl->getVariable('lang')->value['username'];?>
<?php echo $_smarty_tpl->getVariable('lang')->value['is_required'];?>
" autocomplete="off" id="username_id"/>
			<span class="red">*</span>			
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
<?php $_template = new Smarty_Internal_Template("tb_footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>