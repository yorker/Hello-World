<?php /* Smarty version 2.6.26, created on 2011-02-20 15:43:17
         compiled from artcat.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'artcat.html', 15, false),)), $this); ?>
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

<div class="cat_article">
	<h2><?php echo $this->_tpl_vars['cat_name']; ?>
</h2>
	<?php if (! empty ( $this->_tpl_vars['articles'] )): ?>
		<ul>
			<?php $_from = $this->_tpl_vars['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itm']):
?>
				<li class="clearfix">
					<div class="fl">
						<a href="<?php echo $this->_tpl_vars['itm']['caturl']; ?>
"><span>[</span><?php echo $this->_tpl_vars['itm']['cat_name']; ?>
<span>]</span></a>&nbsp;<a href="<?php echo $this->_tpl_vars['itm']['arturl']; ?>
" title="<?php echo $this->_tpl_vars['itm']['title']; ?>
"<?php if ($this->_tpl_vars['itm']['open_type'] == 1): ?> target="_blank"<?php endif; ?>><?php echo $this->_tpl_vars['itm']['title']; ?>
</a>
					</div>
					<div class="fr">
						<?php echo ((is_array($_tmp=$this->_tpl_vars['itm']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>

					</div>
				</li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
		<?php echo $this->_tpl_vars['pages']; ?>

	<?php else: ?>
		<div class="no_data"><?php echo $this->_tpl_vars['lang']['no_data']; ?>
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