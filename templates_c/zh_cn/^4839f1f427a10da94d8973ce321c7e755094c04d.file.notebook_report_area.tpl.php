<?php /* Smarty version Smarty-3.0.7, created on 2011-03-02 09:09:25
         compiled from "templates\index/notebook_report_area.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54354d6d98c5bfb609-51795350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4839f1f427a10da94d8973ce321c7e755094c04d' => 
    array (
      0 => 'templates\\index/notebook_report_area.tpl',
      1 => 1299028160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54354d6d98c5bfb609-51795350',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
?><script type="text/javascript">
$(document).ready(function() {	
	addEditor('message', ['emoticons']);
});

</script>
<a name="reply"></a>
<form action="<?php echo smarty_function_app_url(array('url'=>'Index/notebook'),$_smarty_tpl);?>
" method="post" onsubmit="return notebook_submit_report(this)">
	<div class="comm_submit_block">
		<h2><?php echo $_smarty_tpl->getVariable('lang')->value['report_leaveword'];?>
</h2>
		<div class="blank">&nbsp;</div>		
		<div class="line clearfix">
			<div class="key"><?php echo $_smarty_tpl->getVariable('lang')->value['nickname'];?>
</div>
			<div class="cnt">
				<input type="text" name="nickname" value="<?php echo $_SESSION['user']['alias'];?>
" />
				<span id="reply_tip"></span>
			</div>
		</div>
		<div class="line clearfix">
			<div class="key"><?php echo $_smarty_tpl->getVariable('lang')->value['content'];?>
</div>
			<div class="cnt"><textarea name="message" required="true" msg="<?php echo $_smarty_tpl->getVariable('lang')->value['content'];?>
<?php echo $_smarty_tpl->getVariable('lang')->value['is_required'];?>
" id="message" style="width:480px; height:120px;"></textarea></div>
		</div>
		<div class="line clearfix">
			<div class="key"><?php echo $_smarty_tpl->getVariable('lang')->value['captcha'];?>
</div>
			<div class="cnt">
				<input type="text" name="vcode" value="" class="init" size="8" required="true" msg="<?php echo $_smarty_tpl->getVariable('lang')->value['captcha'];?>
<?php echo $_smarty_tpl->getVariable('lang')->value['is_required'];?>
" autocomplete="off" onkeyup="chupper(this)" style="ime-mode:disabled"/>&nbsp;
				<img border="0" src="validate.php?_t=<?php echo time();?>
" id="validate_image" class="pointer" onclick="re_captcha(this)" title="<?php echo $_smarty_tpl->getVariable('lang')->value['change_one_captcha'];?>
"/>
			</div>
		</div>		
		<div class="line clearfix">
			<div class="key">&nbsp;</div>
			<div class="cnt">
				<input type="hidden" name="parent_id" value="" id="parent_id"/>
				<input type="submit" name="submit" value="<?php echo $_smarty_tpl->getVariable('lang')->value['submit'];?>
" class="btn"/>
			</div>
		</div>
	</div>
</form>