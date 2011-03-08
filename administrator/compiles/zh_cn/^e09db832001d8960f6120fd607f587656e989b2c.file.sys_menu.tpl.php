<?php /* Smarty version Smarty-3.0.7, created on 2011-03-01 20:55:13
         compiled from "D:\www\v30\administrator\views\system/sys_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22244d6cecb1993360-93748092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e09db832001d8960f6120fd607f587656e989b2c' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\system/sys_menu.tpl',
      1 => 1298620666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22244d6cecb1993360-93748092',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_page')) include 'D:\www\v30\administrator\plugins\function.load_page.php';
?><div class="doc0" style="margin-left:4px;" id="doc0">	
	<div class="doctopic_open" onclick="triggerTopic(this)"><?php echo $_smarty_tpl->getVariable('lang')->value['back_title'];?>
</div>
	<?php  $_smarty_tpl->tpl_vars["val"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('top_menu')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["val"]->key => $_smarty_tpl->tpl_vars["val"]->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']++;
?>
		<?php if ($_smarty_tpl->getVariable('admin')->value['admin_rank']>=$_smarty_tpl->getVariable('val')->value['rank']){?>
			<?php if (empty($_smarty_tpl->getVariable('val',null,true,false)->value['sub'])){?>
				<div class="terminal"><a href="<?php echo $_smarty_tpl->getVariable('val')->value['url'];?>
" onclick="oc(this);loadPage(this.href, 1);return(false)"><?php echo $_smarty_tpl->getVariable('val')->value['name'];?>
</a></div>
			<?php }else{ ?>
				<div class="doc1">
					<div class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['iteration']<4){?>doctitle_open<?php }else{ ?>doctitle_close<?php }?>" onclick="triggerDiv(this)">
						<?php echo $_smarty_tpl->getVariable('val')->value['name'];?>

					</div>
					<div class="items" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['iteration']<4){?>style="display:block"<?php }else{ ?>style="display:none"<?php }?>>
                    <?php  $_smarty_tpl->tpl_vars["sub"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('val')->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["sub"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["sub"]->iteration=0;
if ($_smarty_tpl->tpl_vars["sub"]->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["sub"]->key => $_smarty_tpl->tpl_vars["sub"]->value){
 $_smarty_tpl->tpl_vars["sub"]->iteration++;
 $_smarty_tpl->tpl_vars["sub"]->last = $_smarty_tpl->tpl_vars["sub"]->iteration === $_smarty_tpl->tpl_vars["sub"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["subname"]['last'] = $_smarty_tpl->tpl_vars["sub"]->last;
?>
                        <?php if (empty($_smarty_tpl->getVariable('sub',null,true,false)->value['sub'])&&$_smarty_tpl->getVariable('admin')->value['admin_rank']>=$_smarty_tpl->getVariable('val')->value['rank']){?>
                            <div class="comm item<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['subname']['last']){?>_last<?php }?>"><a href="<?php echo $_smarty_tpl->getVariable('sub')->value['url'];?>
" onclick="oc(this);loadPage(this.href, 1);return(false);"><?php echo $_smarty_tpl->getVariable('sub')->value['name'];?>
</a></div>
                       <?php }elseif(!empty($_smarty_tpl->getVariable('sub',null,true,false)->value['sub'])&&$_smarty_tpl->getVariable('admin')->value['admin_rank']>=$_smarty_tpl->getVariable('val')->value['rank']){?>
                            <div class="doc2">
                                <div class="item<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['subname']['last']){?>_last<?php }?>_add">
                                    <div class="doc2_title" onclick="triggerDivSub(this.parentNode)"><span><?php echo $_smarty_tpl->getVariable('sub')->value['name'];?>
</span></div>
                                    <div class="items_sub" style="display:none">
                                        <?php  $_smarty_tpl->tpl_vars["subsub"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sub')->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["subsub"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["subsub"]->iteration=0;
if ($_smarty_tpl->tpl_vars["subsub"]->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["subsub"]->key => $_smarty_tpl->tpl_vars["subsub"]->value){
 $_smarty_tpl->tpl_vars["subsub"]->iteration++;
 $_smarty_tpl->tpl_vars["subsub"]->last = $_smarty_tpl->tpl_vars["subsub"]->iteration === $_smarty_tpl->tpl_vars["subsub"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["subsubname"]['last'] = $_smarty_tpl->tpl_vars["subsub"]->last;
?>
                                            <div class="comm item<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['subsubname']['last']){?>_last<?php }?>"><a href="<?php echo $_smarty_tpl->getVariable('subsub')->value['url'];?>
" onclick="oc(this);loadPage(this.href, 1);return(false)"><?php echo $_smarty_tpl->getVariable('subsub')->value['name'];?>
</a></div>
                                        <?php }} ?>
                                    </div>
                                </div>
                            </div>
                            
                   
							<?php }?>
						<?php }} ?>
					</div>
				</div>
			<?php }?>
		<?php }?>
	<?php }} ?>
	
	<!--
   <div class="terminal"><?php echo smarty_function_load_page(array('href'=>'','link'=>''),$_smarty_tpl);?>
</div>

    <div class="doc1">
        <div class="doctitle_open" onclick="triggerDiv(this)">
            菜单样式
        </div>
        <div class="items">
            <div class="item"><a href="#" onclick="oc(this);loadPage(this.href, 1);return(false);">菜单样式</a></div>
            <div class="item"><a href="#" onclick="oc(this);loadPage(this.href, 1);return(false);">菜单样式</a></div>
        </div>
    </div>
	 -->
</div>
