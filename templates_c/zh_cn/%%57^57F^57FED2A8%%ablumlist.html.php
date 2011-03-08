<?php /* Smarty version 2.6.26, created on 2011-02-20 15:43:21
         compiled from ablumlist.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo $this->_tpl_vars['top_position']; ?>

<?php if (! empty ( $this->_tpl_vars['cats'] )): ?>
	<div class="ablum_cat">
		<?php $_from = $this->_tpl_vars['cats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fname'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fname']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['itm']):
        $this->_foreach['fname']['iteration']++;
?>
			<label><a href="<?php echo $this->_tpl_vars['itm']['caturl']; ?>
"<?php if ($this->_tpl_vars['itm']['cat_id'] == $this->_tpl_vars['cat_id']): ?> class="bold"<?php endif; ?>><?php echo $this->_tpl_vars['itm']['name']; ?>
</a></label>
			<?php if (! ($this->_foreach['fname']['iteration'] == $this->_foreach['fname']['total'])): ?>
				<label>|</label>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>		
	</div>
<?php endif; ?>
<div class="ablum_list">
	<?php if (! empty ( $this->_tpl_vars['list'] )): ?>
	<ul class="clearfix">
		<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itm']):
?>
		<li>
			<div class="img"><a href="<?php echo $this->_tpl_vars['itm']['ablumurl']; ?>
"><img src="<?php echo $this->_tpl_vars['upload_url']; ?>
<?php echo $this->_tpl_vars['itm']['cover_img']; ?>
" border="0"/></a></div>
			<div class="item"><center><strong><a href="<?php echo $this->_tpl_vars['itm']['ablumurl']; ?>
"><?php echo $this->_tpl_vars['itm']['title']; ?>
</a>[<?php echo $this->_tpl_vars['itm']['pic_num']; ?>
]</strong></center></div>
			<div class="item"><?php echo $this->_tpl_vars['lang']['category']; ?>
:<a href="<?php echo $this->_tpl_vars['itm']['caturl']; ?>
"><?php echo $this->_tpl_vars['itm']['name']; ?>
</a></div>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>