<?php /* Smarty version 2.6.26, created on 2011-02-20 15:43:19
         compiled from article.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'article.html', 8, false),array('modifier', 'default', 'article.html', 8, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo $this->_tpl_vars['top_position']; ?>


<div class="art_detail_wrap">
	<h2><?php echo $this->_tpl_vars['art']['title']; ?>
</h2>
	<table class="info" cellspacing="0" cellpadding="0">
		<tr>
			<td><?php echo $this->_tpl_vars['lang']['update_time']; ?>
: <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['art']['update_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')))) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['art']['create_time']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['art']['create_time'])))) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</td>
			<td align="center"><?php echo $this->_tpl_vars['lang']['source']; ?>
: <?php echo ((is_array($_tmp=@$this->_tpl_vars['art']['source'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['lang']['unknown']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['lang']['unknown'])); ?>
</td>
			<td align="right"><?php echo $this->_tpl_vars['lang']['author_or_translator']; ?>
: <?php echo $this->_tpl_vars['art']['author']; ?>
</td>
		</tr>
	</table>
	<div class="blank">&nbsp;</div>
	<div class="art_description"><?php echo $this->_tpl_vars['art']['description']; ?>
</div>
	<div class="art_body"><?php echo $this->_tpl_vars['art']['content']; ?>
</div>
	<?php echo $this->_tpl_vars['pages']; ?>

	
	<div class="art_relative clearfix">
		<div class="prev"><?php if ($this->_tpl_vars['prev'] > ''): ?><a href="<?php echo $this->_tpl_vars['prev']['url']; ?>
" title="<?php echo $this->_tpl_vars['prev']['title']; ?>
"><?php echo $this->_tpl_vars['lang']['prev']; ?>
</a><?php endif; ?></div>
		<div class="next"><?php if ($this->_tpl_vars['next'] > ''): ?><a href="<?php echo $this->_tpl_vars['next']['url']; ?>
" title="<?php echo $this->_tpl_vars['next']['title']; ?>
"><?php echo $this->_tpl_vars['lang']['next']; ?>
</a><?php endif; ?></div>
	</div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>