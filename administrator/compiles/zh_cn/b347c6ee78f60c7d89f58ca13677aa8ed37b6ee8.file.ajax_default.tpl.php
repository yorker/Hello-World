<?php /* Smarty version Smarty-3.0.7, created on 2011-02-26 13:35:58
         compiled from "D:\www\v30\administrator\views\layout/ajax_default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:167824d68913e2c4cf9-20463414%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b347c6ee78f60c7d89f58ca13677aa8ed37b6ee8' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\layout/ajax_default.tpl',
      1 => 1298090323,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167824d68913e2c4cf9-20463414',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="s_border_top">
	<div><div></div></div>
</div>
<div class="main_title clearfix">
	<div class="fl"><?php echo $_smarty_tpl->getVariable('lang')->value['back_title'];?>
<span> - <?php echo $_smarty_tpl->getVariable('head_top')->value['title'];?>
</span> &nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('here')->value;?>
" onclick="loadPage(this.href, 1);return(false)" title="<?php echo $_smarty_tpl->getVariable('lang')->value['refresh'];?>
"><img src="images/refresh.gif" border="0"/></a></div>
	<?php if ($_smarty_tpl->getVariable('head_top')->value['href']&&$_smarty_tpl->getVariable('head_top')->value['link']){?><a href="<?php echo $_smarty_tpl->getVariable('head_top')->value['href'];?>
" onclick="loadPage(this.href, 1);return(false);" class="fr"><?php echo $_smarty_tpl->getVariable('head_top')->value['link'];?>
</a><?php }?>
</div>
<div class="s_border_bottom">
	<div><div></div></div>
</div>
<div class="dist"></div>

<?php if (!empty($_smarty_tpl->getVariable('search',null,true,false)->value)||!empty($_smarty_tpl->getVariable('choose_category',null,true,false)->value)){?>
<div class="s_border_top"><div><div>&nbsp;</div></div></div>
<div class="cnt_filter clearfix">
	<?php if (!empty($_smarty_tpl->getVariable('search',null,true,false)->value)){?>
	<div class="fl">
		<div>
			<label><?php echo $_smarty_tpl->getVariable('search')->value['label'];?>
&nbsp;</label>
			<input type="text" id="search_key" class="<?php if (!$_smarty_tpl->getVariable('search')->value['value']){?>search_init<?php }?>" name="<?php echo $_smarty_tpl->getVariable('search')->value['field'];?>
" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('search')->value['value'])===null||$tmp==='' ? $_smarty_tpl->getVariable('lang')->value['please_inter_search_content'] : $tmp);?>
" style="padding:2px 0px; width:200px; font-size:13px" onfocus=" if(this.className=='search_init'){this.value='';} this.className='';" <?php if ($_smarty_tpl->getVariable('search')->value['table']>''){?>onkeyup="show_down_menu(this, '<?php echo $_smarty_tpl->getVariable('search')->value['table'];?>
', '<?php echo $_smarty_tpl->getVariable('search')->value['field'];?>
', 'menudown', 'search_key', '<?php echo $_smarty_tpl->getVariable('search')->value['cond_str'];?>
')"<?php }?> autocomplete="off"/>&nbsp;&nbsp;
			<input type="button" name="search" value="<?php echo $_smarty_tpl->getVariable('lang')->value['search'];?>
" class="btn" onclick="search_key('<?php echo $_smarty_tpl->getVariable('search')->value['base_url'];?>
', 'search_key', '<?php echo $_smarty_tpl->getVariable('search')->value['is_page'];?>
')"/>
		</div>
		<div id="menudown" style="display:none"></div>
	</div>
	<?php }?>
	
	<?php if (!empty($_smarty_tpl->getVariable('choose_category',null,true,false)->value)){?>
	<div class="fr">
		<label><?php echo $_smarty_tpl->getVariable('lang')->value['choose_category'];?>
&nbsp;</label>
		<select name="<?php echo $_smarty_tpl->getVariable('choose_category')->value['field'];?>
" onchange="filter_category('<?php echo $_smarty_tpl->getVariable('choose_category')->value['base_url'];?>
', this, '<?php echo $_smarty_tpl->getVariable('choose_category')->value['is_page'];?>
')">
			<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('choose_category')->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["itm"]->key;
?>
				<option value="<?php echo $_smarty_tpl->getVariable('key')->value;?>
" <?php if ($_smarty_tpl->getVariable('key')->value==$_smarty_tpl->getVariable('choose_category')->value['selected']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('itm')->value;?>
</option>
			<?php }} ?>
		</select>
	</div>
	<?php }?>
</div>
<div class="s_border_bottom"><div><div>&nbsp;</div></div></div>
<div class="dist"></div>
<?php }?>


<div class="s_border_top">
	<div><div></div></div>
</div>

<div class="main_content">
    <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('main_tpl_identified')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
</div>

<div class="s_border_bottom">
	<div><div></div></div>
</div>