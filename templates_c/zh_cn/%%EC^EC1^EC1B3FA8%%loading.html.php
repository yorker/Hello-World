<?php /* Smarty version 2.6.26, created on 2011-02-20 15:43:22
         compiled from loading.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sess', 'loading.html', 21, false),array('modifier', 'date_format', 'loading.html', 50, false),)), $this); ?>
<?php if ($this->_tpl_vars['action'] == 'notebook_report_area'): ?>
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
		<h2><?php echo $this->_tpl_vars['lang']['report_leaveword']; ?>
</h2>
		<div class="blank">&nbsp;</div>		
		<div class="line clearfix">
			<div class="key"><?php echo $this->_tpl_vars['lang']['nickname']; ?>
</div>
			<div class="cnt">
				<input type="text" name="nickname" value="<?php echo smarty_function_sess(array('key' => "user.alias"), $this);?>
" />
				<span id="reply_tip"></span>
			</div>
		</div>
		<div class="line clearfix">
			<div class="key"><?php echo $this->_tpl_vars['lang']['content']; ?>
</div>
			<div class="cnt"><textarea name="message" class="kindeditor" required="true" msg="<?php echo $this->_tpl_vars['lang']['content']; ?>
<?php echo $this->_tpl_vars['lang']['is_required']; ?>
" id="message" style="width:480px; height:120px;"></textarea></div>
		</div>
		<div class="line clearfix">
			<div class="key"><?php echo $this->_tpl_vars['lang']['captcha']; ?>
</div>
			<div class="cnt">
				<input type="text" name="vcode" value="" class="init" size="8" required="true" msg="<?php echo $this->_tpl_vars['lang']['captcha']; ?>
<?php echo $this->_tpl_vars['lang']['is_required']; ?>
" autocomplete="off" onkeyup="chupper(this)" style="ime-mode:disabled"/>&nbsp;
				<img border="0" src="validate.php?_t=<?php echo time(); ?>
" id="validate_image" class="pointer" onclick="re_captcha(this)" title="<?php echo $this->_tpl_vars['lang']['change_one_captcha']; ?>
"/>
			</div>
		</div>		
		<div class="line clearfix">
			<div class="key">&nbsp;</div>
			<div class="cnt">
				<input type="hidden" name="parent_id" value="" id="parent_id"/>
				<input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
" class="btn"/>
			</div>
		</div>
	</div>
</form>

<?php elseif ($this->_tpl_vars['action'] == 'notebook_load_content'): ?>
<?php if (! empty ( $this->_tpl_vars['list'] )): ?>
	<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itm']):
?>
	<div class="com_block">
		<div class="head"><?php echo ((is_array($_tmp=$this->_tpl_vars['itm']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y/%m/%d %H:%M') : smarty_modifier_date_format($_tmp, '%Y/%m/%d %H:%M')); ?>
  <span id="hh_<?php echo $this->_tpl_vars['itm']['id']; ?>
"><?php echo $this->_tpl_vars['itm']['say']; ?>
</span></div>
		<?php if (! empty ( $this->_tpl_vars['itm']['parent'] )): ?>
			<div class="blank">&nbsp;</div>
			<div class="reference">
				<div class="tit"><?php echo ((is_array($_tmp=$this->_tpl_vars['itm']['parent']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y/%m/%d %H:%M') : smarty_modifier_date_format($_tmp, '%Y/%m/%d %H:%M')); ?>
  <?php echo $this->_tpl_vars['itm']['parent']['say']; ?>
</div>
				<?php echo $this->_tpl_vars['itm']['parent']['message']; ?>

			</div>
		<?php endif; ?>
		<div class="message"><?php echo $this->_tpl_vars['itm']['message']; ?>
</div>
		<div class="reply"><a href="#reply" onclick="notebook_reply(<?php echo $this->_tpl_vars['itm']['id']; ?>
)"><?php echo $this->_tpl_vars['lang']['reply']; ?>
</a></div>
	</div>	
	<?php endforeach; endif; unset($_from); ?>
	<div style="padding:12px 0px; text-align:center"><?php echo $this->_tpl_vars['pages']; ?>
</div>
<?php else: ?>
	<div class="no_data"><?php echo $this->_tpl_vars['lang']['no_data']; ?>
</div>
<?php endif; ?>

<?php endif; ?>