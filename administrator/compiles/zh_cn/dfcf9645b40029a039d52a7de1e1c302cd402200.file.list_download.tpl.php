<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 14:04:56
         compiled from "D:\www\v30\administrator\views\download/list_download.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32514d65f508c80a66-33982231%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfcf9645b40029a039d52a7de1e1c302cd402200' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\download/list_download.tpl',
      1 => 1298097274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32514d65f508c80a66-33982231',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
$(document).ready(function() {
	pagination('<?php echo $_smarty_tpl->getVariable('url')->value;?>
');
});
</script>

<div id="pagination_show"></div>