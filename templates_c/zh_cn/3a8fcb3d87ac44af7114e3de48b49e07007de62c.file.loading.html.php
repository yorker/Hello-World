<?php /* Smarty version Smarty-3.0.7, created on 2011-02-22 21:36:27
         compiled from "templates\loading.html" */ ?>
<?php /*%%SmartyHeaderCode:40564d63bbdbd3cc02-73599746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a8fcb3d87ac44af7114e3de48b49e07007de62c' => 
    array (
      0 => 'templates\\loading.html',
      1 => 1298381575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40564d63bbdbd3cc02-73599746',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\www\v40\core\libs\plugins\modifier.date_format.php';
?><?php if ($_smarty_tpl->getVariable('action')->value=='notebook_report_area'){?>
<script type="text/javascript">
$(document).ready(function() {
	KE.init({
		id: 'message',
		cssPath: 'kindeditor/index.css',
		items: ['emoticons', 'faces']
	});
	setTimeout("KE.create('message')", 10);
});

</script>
<a name="reply"></a>
<form action="notebook.php" method="post" onsubmit="return notebook_submit_report(this)">
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
			<div class="cnt"><textarea name="message" class="kindeditor" required="true" msg="<?php echo $_smarty_tpl->getVariable('lang')->value['content'];?>
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

<?php }elseif($_smarty_tpl->getVariable('action')->value=='notebook_load_content'){?>
<?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>
	<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
	<div class="com_block">
		<div class="head"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('itm')->value['create_time'],'%Y/%m/%d %H:%M');?>
  <span id="hh_<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
"><?php echo $_smarty_tpl->getVariable('itm')->value['say'];?>
</span></div>
		<?php if (!empty($_smarty_tpl->getVariable('itm',null,true,false)->value['parent'])){?>
			<div class="blank">&nbsp;</div>
			<div class="reference">
				<div class="tit"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('itm')->value['parent']['create_time'],'%Y/%m/%d %H:%M');?>
  <?php echo $_smarty_tpl->getVariable('itm')->value['parent']['say'];?>
</div>
				<?php echo $_smarty_tpl->getVariable('itm')->value['parent']['message'];?>

			</div>
		<?php }?>
		<div class="message"><?php echo $_smarty_tpl->getVariable('itm')->value['message'];?>
</div>
		<div class="reply"><a href="#reply" onclick="notebook_reply(<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
)"><?php echo $_smarty_tpl->getVariable('lang')->value['reply'];?>
</a></div>
	</div>	
	<?php }} ?>
	<div style="padding:12px 0px; text-align:center"><?php echo $_smarty_tpl->getVariable('pages')->value;?>
</div>
<?php }else{ ?>
	<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div>
<?php }?>

<?php }?>