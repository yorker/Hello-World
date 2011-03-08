<?php /* Smarty version 2.6.26, created on 2011-02-03 11:32:37
         compiled from dlist.html */ ?>
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
	<?php if (! empty ( $this->_tpl_vars['downloads'] )): ?>
	<ul>
		<?php $_from = $this->_tpl_vars['downloads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itm']):
?>
			<li class="clearfix">
				<div class="fl">
					<a href="<?php echo $this->_tpl_vars['itm']['caturl']; ?>
"><span>[</span><?php echo $this->_tpl_vars['itm']['cat_name']; ?>
<span>]</span></a>&nbsp;<?php echo $this->_tpl_vars['itm']['name']; ?>
&nbsp;&nbsp;[<?php echo $this->_tpl_vars['itm']['filesize']; ?>
]
				</div>
				<div class="fr">
					<a href="dlist.php?action=download&did=<?php echo $this->_tpl_vars['itm']['id']; ?>
" target="_blank"><?php echo $this->_tpl_vars['lang']['download']; ?>
</a>&nbsp;&nbsp;
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