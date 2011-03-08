<?php /* Smarty version Smarty-3.0.7, created on 2011-03-02 08:55:51
         compiled from "templates\elements/userinfo.html" */ ?>
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
  'function' => 
  array (
  ),
  'has_nocache_code' => true,
)); /*/%%SmartyHeaderCode%%*/?>
<?php echo '/*%%SmartyNocache:147284d6d9597115262-12170809%%*/<?php if (!is_callable(\'smarty_function_app_url\')) include \'D:\www\v30\administrator\plugins\function.app_url.php\';
?>/*/%%SmartyNocache:147284d6d9597115262-12170809%%*/';?>
<?php echo '/*%%SmartyNocache:147284d6d9597115262-12170809%%*/<?php if (!empty($_smarty_tpl->getVariable(\'user\',null,true,false)->value)){?>/*/%%SmartyNocache:147284d6d9597115262-12170809%%*/';?><label><span><?php echo '/*%%SmartyNocache:147284d6d9597115262-12170809%%*/<?php echo $_smarty_tpl->getVariable(\'lang\')->value[\'welcome_you\'];?>
/*/%%SmartyNocache:147284d6d9597115262-12170809%%*/';?>, <?php echo '/*%%SmartyNocache:147284d6d9597115262-12170809%%*/<?php echo $_smarty_tpl->getVariable(\'user\')->value[\'alias\'];?>
/*/%%SmartyNocache:147284d6d9597115262-12170809%%*/';?></span></label><label>|</label><label><a href="<?php echo '/*%%SmartyNocache:147284d6d9597115262-12170809%%*/<?php echo smarty_function_app_url(array(\'url\'=>\'Index/logout\'),$_smarty_tpl);?>
/*/%%SmartyNocache:147284d6d9597115262-12170809%%*/';?>"><?php echo '/*%%SmartyNocache:147284d6d9597115262-12170809%%*/<?php echo $_smarty_tpl->getVariable(\'lang\')->value[\'logout\'];?>
/*/%%SmartyNocache:147284d6d9597115262-12170809%%*/';?></a></label><?php echo '/*%%SmartyNocache:147284d6d9597115262-12170809%%*/<?php }else{ ?>/*/%%SmartyNocache:147284d6d9597115262-12170809%%*/';?><label><span><?php echo '/*%%SmartyNocache:147284d6d9597115262-12170809%%*/<?php echo $_smarty_tpl->getVariable(\'lang\')->value[\'welcome_you\'];?>
/*/%%SmartyNocache:147284d6d9597115262-12170809%%*/';?>, <?php echo '/*%%SmartyNocache:147284d6d9597115262-12170809%%*/<?php echo $_smarty_tpl->getVariable(\'lang\')->value[\'visiter\'];?>
/*/%%SmartyNocache:147284d6d9597115262-12170809%%*/';?></span></label><label>|</label><label><a href="<?php echo '/*%%SmartyNocache:147284d6d9597115262-12170809%%*/<?php echo smarty_function_app_url(array(\'url\'=>\'Index/tbLogin?width=400&height=280&KeepThis=true&TB_iframe=true&modal=true\'),$_smarty_tpl);?>
/*/%%SmartyNocache:147284d6d9597115262-12170809%%*/';?>" class="thickbox"><?php echo '/*%%SmartyNocache:147284d6d9597115262-12170809%%*/<?php echo $_smarty_tpl->getVariable(\'lang\')->value[\'login\'];?>
/*/%%SmartyNocache:147284d6d9597115262-12170809%%*/';?></a></label><label>|</label><label><a href="<?php echo '/*%%SmartyNocache:147284d6d9597115262-12170809%%*/<?php echo smarty_function_app_url(array(\'url\'=>\'Index/tbRegister?width=400&height=280&KeepThis=true&TB_iframe=true&modal=true\'),$_smarty_tpl);?>
/*/%%SmartyNocache:147284d6d9597115262-12170809%%*/';?>" class="thickbox"><?php echo '/*%%SmartyNocache:147284d6d9597115262-12170809%%*/<?php echo $_smarty_tpl->getVariable(\'lang\')->value[\'quick_register\'];?>
/*/%%SmartyNocache:147284d6d9597115262-12170809%%*/';?></a></label><?php echo '/*%%SmartyNocache:147284d6d9597115262-12170809%%*/<?php }?>/*/%%SmartyNocache:147284d6d9597115262-12170809%%*/';?>