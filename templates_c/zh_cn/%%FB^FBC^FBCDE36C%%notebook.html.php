<?php /* Smarty version 2.6.26, created on 2011-02-20 15:43:22
         compiled from notebook.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo $this->_tpl_vars['top_position']; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inner.left.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="kindeditor/kindeditor.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	notebook_load_submit_area();
	pagination('loading.php?action=notebook_load_content');
});
</script>
<div class="notebook">
	<h2><?php echo $this->_tpl_vars['lang']['notebook']; ?>
</h2>
	<div class="blank">&nbsp;</div>
	
	<div id="pagination_show"></div>		
	
	<div class="blank">&nbsp;</div>
	<div class="blank">&nbsp;</div>
	
	<div id="submit_area_id"><img border="0" src="images/loading.gif"/></div>
	
	<div class="blank">&nbsp;</div>
	<div class="blank">&nbsp;</div>
	<?php if (empty ( $this->_tpl_vars['user']['user_id'] )): ?>
		<div class="tip_login">
			<?php echo $this->_tpl_vars['lang']['notebook_please_login']; ?>
&nbsp;
			<a href="tb_login.php?width=400&height=280&KeepThis=true&TB_iframe=true&modal=true" class="thickbox"><span style="color:#00EE00"><?php echo $this->_tpl_vars['lang']['login']; ?>
</span></a>--<a href="tb_register.php?width=400&height=350&KeepThis=true&TB_iframe=true&modal=true" class="thickbox"><?php echo $this->_tpl_vars['lang']['quick_register']; ?>
</a>
		</div>
	<?php endif; ?>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inner.right.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>