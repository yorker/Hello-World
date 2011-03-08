<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 21:50:05
         compiled from "D:\www\v30\administrator\views\system/sys_notepad.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213094d66620d1401a9-84819998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1889a52565f5af5674484e0f8247c077bb6eaf3' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\system/sys_notepad.tpl',
      1 => 1298555377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213094d66620d1401a9-84819998',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_textarea')) include 'D:\www\v30\administrator\plugins\function.textarea.php';
if (!is_callable('smarty_function_checkbox')) include 'D:\www\v30\administrator\plugins\function.checkbox.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
?><script type="text/javascript">
$(document).ready(function() {
	pagination('<?php echo smarty_function_app_url(array('url'=>'system/sysNotepadPage'),$_smarty_tpl);?>
');
	addEditor('content', ['source', 'fontname', 'fontsize', 'textcolor', 'bold', 'italic', 'underline']);
	setTimeout("KE.create('content')", 10);
});

</script>

<div id="pagination_show"></div>
<a name="nform"></a>
<form action="<?php echo smarty_function_app_url(array('url'=>'system/sysNotepad'),$_smarty_tpl);?>
" method="post" onsubmit="return saveNotepad(this, KE, '<?php echo smarty_function_app_url(array('url'=>'system/sysNotepadPage'),$_smarty_tpl);?>
')" id="nform1">
<div class="adminform">
	<div class="f_title"><?php echo $_smarty_tpl->getVariable('lang')->value['add_edit_notepad'];?>
</div>
	<?php echo smarty_function_text(array('name'=>"title",'value'=>'','style'=>"width:492px",'label'=>$_smarty_tpl->getVariable('lang')->value['title']),$_smarty_tpl);?>

	<?php echo smarty_function_textarea(array('name'=>"content",'id'=>"content",'label'=>$_smarty_tpl->getVariable('lang')->value['content'],'width'=>"500px",'height'=>"150px",'value'=>''),$_smarty_tpl);?>

	<?php echo smarty_function_checkbox(array('name'=>"is_urgency",'value'=>$_smarty_tpl->getVariable('is_urgency')->value,'label'=>$_smarty_tpl->getVariable('lang')->value['status']),$_smarty_tpl);?>

	<input name="id" type="hidden" value=""/>
	<?php echo smarty_function_submit(array('value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

</div>
</form>