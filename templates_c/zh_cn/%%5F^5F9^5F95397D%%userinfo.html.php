<?php /* Smarty version 2.6.26, created on 2011-02-21 20:45:54
         compiled from elements/userinfo.html */ ?>
<?php if (! empty ( $this->_tpl_vars['user'] )): ?><label><span><?php echo $this->_tpl_vars['lang']['welcome_you']; ?>
, <?php echo $this->_tpl_vars['user']['alias']; ?>
</span></label><label>|</label><label><a href="logout.php"><?php echo $this->_tpl_vars['lang']['logout']; ?>
</a></label><?php else: ?><label><span><?php echo $this->_tpl_vars['lang']['welcome_you']; ?>
, <?php echo $this->_tpl_vars['lang']['visiter']; ?>
</span></label><label>|</label><label><a href="tb_login.php?width=400&height=280&KeepThis=true&TB_iframe=true&modal=true" class="thickbox"><?php echo $this->_tpl_vars['lang']['login']; ?>
</a></label><label>|</label><label><a href="tb_register.php?width=400&height=280&KeepThis=true&TB_iframe=true&modal=true" class="thickbox"><?php echo $this->_tpl_vars['lang']['quick_register']; ?>
</a></label><?php endif; ?>