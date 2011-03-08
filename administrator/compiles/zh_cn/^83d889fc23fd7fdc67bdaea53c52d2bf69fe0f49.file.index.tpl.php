<?php /* Smarty version Smarty-3.0.7, created on 2011-03-02 09:47:47
         compiled from "D:\www\v30\administrator\views\layout/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112084d6da1c37dff97-01524838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83d889fc23fd7fdc67bdaea53c52d2bf69fe0f49' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\layout/index.tpl',
      1 => 1299030456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112084d6da1c37dff97-01524838',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_load_page')) include 'D:\www\v30\administrator\plugins\function.load_page.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
"/>
<!--include CSS file from here-->
<style type="text/css">
	@import url(css/admin.css);
	@import url(../css/thickbox.css);
	@import url(../vendors/highslide/highslide.css);
	@import url(css/common.admin.css);
	@import url(../css/jq.calendar.css);
</style>

<!--include JS file from here-->
<script type="text/javascript" src="../js/config.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/overlib.js"></script>
<script type="text/javascript" src="../js/thickbox.js"></script>
<script type="text/javascript" src="<?php echo @ROOT_URL;?>
kindeditor/kindeditor.js"></script>
<script type="text/javascript" src="../js/jq.calendar.js"></script>
<script type="text/javascript" src="../js/base.js"></script>
<script type="text/javascript" src="js/common.admin.js"></script>
<script type="text/javascript" src="js/common.js"></script>

<script type="text/javascript" src="js/swfupload.js"></script>
<script type="text/javascript" src="js/handlers.js"></script>

<title><?php echo $_smarty_tpl->getVariable('lang')->value['back_title'];?>
</title>

</head>

<body>
<div id="site">
	<!--header section-->
	<div id="header">
		<div id="header-top">
			<div class="bgr">
				<div class="bgl">
					<div class="usericon clearfix">
						<div class="fl">
							<img src="images/user.gif" border="0" alt=""/>
							<span class="title"><?php echo $_smarty_tpl->getVariable('lang')->value['back_title'];?>
</span>
						</div>
						<div class="fr">
							<div class="line"><?php echo smarty_function_load_page(array('href'=>smarty_modifier_app_url("system/sysStart"),'link'=>$_smarty_tpl->getVariable('lang')->value['page_start']),$_smarty_tpl);?>
<label>|</label><a href="../" target="_blank"><?php echo $_smarty_tpl->getVariable('lang')->value['view_site'];?>
</a><label>|</label><a href="javascript:location.reload()"><?php echo $_smarty_tpl->getVariable('lang')->value['refresh'];?>
</a><label>|</label><?php echo smarty_function_load_page(array('href'=>smarty_modifier_app_url("system/setConfiguration"),'link'=>$_smarty_tpl->getVariable('lang')->value['sys_config']),$_smarty_tpl);?>
<label>|</label><a href="javascript:void(0)" onclick="clearCache(this, '<?php echo smarty_function_app_url(array('url'=>'system/ajaxClearCache'),$_smarty_tpl);?>
');"><?php echo $_smarty_tpl->getVariable('lang')->value['clear_cache'];?>
</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="header-box">

			<!--top menu from here-->
				<?php $_template = new Smarty_Internal_Template("elements/top_menu.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
			<!--top menu end-->


			<div class="sysinfo">
				<span><?php echo $_smarty_tpl->getVariable('lang')->value['welcome'];?>
: <?php if ($_smarty_tpl->getVariable('admin')->value['admin_rank']==1){?><?php echo $_smarty_tpl->getVariable('lang')->value['general_admin'];?>
<?php }elseif($_smarty_tpl->getVariable('admin')->value['admin_rank']==2){?><?php echo $_smarty_tpl->getVariable('lang')->value['advance_admin'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('lang')->value['super_admin'];?>
<?php }?> <i><?php echo $_smarty_tpl->getVariable('admin')->value['admin_name'];?>
</i></span>
				<span><a href="<?php echo smarty_function_app_url(array('url'=>'system/sysLogout'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['logout'];?>
</a></span>
			</div>
			<div class="clr"></div>
		</div>
	</div>	
	<!--content section-->
	<div id="container">
		<table border="0" align="center" id="wrap_table" cellspacing="0" cellpadding="0">
		<tr valign="top">			
			<td width="20%" id="menu_wrap">
				<div class="s_border_top">
					<div><div></div></div>
				</div>

				<div id="area_left">&nbsp;</div>

				<div class="s_border_bottom">
					<div><div></div></div>
				</div>
			</td>
			<td id="show_menu_wrap">
				<img class="toggle_menu" src="images/arrow_left.gif" border="0" onclick="toggle_menu(this)"/>
			</td>
			<td id="frame_main_content">
				<div class="s_border_top">
					<div><div></div></div>
				</div>

				<!--area_right begin-->
				<div id="area_right">&nbsp;</div>
				<!--area_right end-->

				<div class="s_border_bottom">
					<div><div></div></div>
				</div>
			</td>
		</tr>
		</table>
	</div>
	<div class="border-bottom">
		<div><div></div></div>
	</div>

	<!--footer section-->
	<div id="footer">
		<?php echo $_smarty_tpl->getVariable('copyright')->value;?>

	</div>
</div>


</body>
</html>