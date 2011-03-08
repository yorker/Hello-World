<?php /*%%SmartyHeaderCode:147284d6d9597115262-12170809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12415c48b3f71109c895e2ffbdf0e2f4fa2bf3d4' => 
    array (
      0 => 'templates\\elements/userinfo.html',
      1 => 1298993119,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147284d6d9597115262-12170809',
  'has_nocache_code' => true,
  'cache_lifetime' => '3600',
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!$no_render) {?><?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
?><?php if (!empty($_smarty_tpl->getVariable('user',null,true,false)->value)){?><label><span><?php echo $_smarty_tpl->getVariable('lang')->value['welcome_you'];?>
, <?php echo $_smarty_tpl->getVariable('user')->value['alias'];?>
</span></label><label>|</label><label><a href="<?php echo smarty_function_app_url(array('url'=>'Index/logout'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['logout'];?>
</a></label><?php }else{ ?><label><span><?php echo $_smarty_tpl->getVariable('lang')->value['welcome_you'];?>
, <?php echo $_smarty_tpl->getVariable('lang')->value['visiter'];?>
</span></label><label>|</label><label><a href="<?php echo smarty_function_app_url(array('url'=>'Index/tbLogin?width=400&height=280&KeepThis=true&TB_iframe=true&modal=true'),$_smarty_tpl);?>
" class="thickbox"><?php echo $_smarty_tpl->getVariable('lang')->value['login'];?>
</a></label><label>|</label><label><a href="<?php echo smarty_function_app_url(array('url'=>'Index/tbRegister?width=400&height=280&KeepThis=true&TB_iframe=true&modal=true'),$_smarty_tpl);?>
" class="thickbox"><?php echo $_smarty_tpl->getVariable('lang')->value['quick_register'];?>
</a></label><?php }?><?php } ?>