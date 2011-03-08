<?php /* Smarty version 2.6.26, created on 2011-02-20 15:43:22
         compiled from inner.right.html */ ?>
	</div>
	<div class="fr_wrap">
		<div class="fr_inner_wrap">
			<div class="module">
				<h2><?php echo $this->_tpl_vars['lang']['art_category']; ?>
 <span>Categories</span></h2>
				<div class="body">
					<ul class="list">
						<?php $_from = $this->_tpl_vars['user_cats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itm']):
?>
							<li><a href="<?php echo $this->_tpl_vars['itm']['caturl']; ?>
"><?php echo $this->_tpl_vars['itm']['cat_name']; ?>
</a></li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
				</div>
			</div>
			<div class="blank">&nbsp;</div>
			<div class="module">
				<h2><?php echo $this->_tpl_vars['lang']['download_nav']; ?>
 <span>Download Navigation</span></h2>
				<div class="body">
					<ul class="list">
						<?php $_from = $this->_tpl_vars['download_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itm']):
?>
							<li><a href="<?php echo $this->_tpl_vars['itm']['caturl']; ?>
"><?php echo $this->_tpl_vars['itm']['name']; ?>
</a></li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>