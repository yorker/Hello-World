<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 14:07:06
         compiled from "D:\www\v30\administrator\views\picture/write_picture.tpl" */ ?>
<?php /*%%SmartyHeaderCode:301084d65f58ad15288-42888035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbdb060b21cccecef9f4c780422019321a95f3fe' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\picture/write_picture.tpl',
      1 => 1298527345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '301084d65f58ad15288-42888035',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_select')) include 'D:\www\v30\administrator\plugins\function.select.php';
if (!is_callable('smarty_function_upload')) include 'D:\www\v30\administrator\plugins\function.upload.php';
if (!is_callable('smarty_function_radio')) include 'D:\www\v30\administrator\plugins\function.radio.php';
if (!is_callable('smarty_function_textarea')) include 'D:\www\v30\administrator\plugins\function.textarea.php';
?><link href="css/swfupload.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/swfupload.js"></script>
<script type="text/javascript" src="js/handlers.js"></script>

<script type="text/javascript">
var swfu;

$(document).ready(function() {
	swfu = new SWFUpload({
		// Backend Settings
		upload_url: "includes/swfupload_picture.php",
		post_params: {"PHPSESSID": "<?php echo $_smarty_tpl->getVariable('sessionid')->value;?>
"},

		// File Upload Settings
		file_size_limit : "4 MB",	 //2MB
		file_types : "*.jpg; *.gif; *.png; *.gpeg",
		file_types_description : "JPEG/GIF/PNG image",
		file_upload_limit : "0",

		// Event Handler Settings - these functions as defined in Handlers.js
		// The handlers are not part of SWFUpload but are part of my website and control how
		// my website reacts to the SWFUpload events.
		file_queue_error_handler : fileQueueError,
		file_dialog_complete_handler : fileDialogComplete,
		upload_progress_handler : uploadProgress,
		upload_error_handler : uploadError,
		upload_success_handler : uploadSuccess,
		upload_complete_handler : uploadComplete,

		// Button Settings
		button_image_url : "images/SmallSpyGlassWithTransperancy_17x18.png",
		button_placeholder_id : "spanButtonPlaceholder",
		button_width: 180,
		button_height: 18,
		button_text : '<span class="button"><?php echo $_smarty_tpl->getVariable('lang')->value['please_choose_image'];?>
</span>',
		button_text_style : '.button {font-size: 12pt; }',
		button_text_top_padding: 0,
		button_text_left_padding: 18,
		button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
		button_cursor: SWFUpload.CURSOR.HAND,
		
		// Flash Settings
		flash_url : "includes/swfupload.swf",

		custom_settings : {
			upload_target : "divFileProgressContainer"
		},
		
		// Debug Settings
		debug: false
	});
});

function cancelGallery(id) {
	if(!confirm('<?php echo $_smarty_tpl->getVariable('lang')->value['confirm_delete'];?>
')) {
		return false;
	}
	$.ajax({
		type: 'get',
		url: '<?php echo smarty_function_app_url(array('url'=>"picture/cancelGallery?id="),$_smarty_tpl);?>
' + id,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok') {
				$("#pic_item_"+id).remove();
				alert(lang_op_success);
			} else {
				alert(msg);
			}
		}
	});
}

</script>

<form action="<?php echo smarty_function_app_url(array('url'=>'picture/writePicture'),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php echo $_smarty_tpl->getVariable('reurl')->value;?>
')">
<div class="tab_list">
	<div class="tabs">
		<label class="tab_current" onclick="tab(this, 'tab_current')"><?php echo $_smarty_tpl->getVariable('lang')->value['basic_info'];?>
</label>
		<label onclick="tab(this, 'tab_current')"><?php echo $_smarty_tpl->getVariable('lang')->value['picture_collect'];?>
</label>
	</div>
	<ul>
	<li style="display:block">
		<div class="adminform">
			<div class="f_title"><?php echo $_smarty_tpl->getVariable('lang')->value['basic_info'];?>
</div>
			<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['title'],'name'=>"wrt_title",'value'=>$_smarty_tpl->getVariable('edit')->value['title'],'required'=>"true",'size'=>"l"),$_smarty_tpl);?>

			
			<?php echo smarty_function_select(array('label'=>$_smarty_tpl->getVariable('lang')->value['category'],'name'=>"wrt_cat_id",'value'=>$_smarty_tpl->getVariable('cats')->value,'selected'=>(($tmp = @(($tmp = @$_smarty_tpl->getVariable('edit')->value['cat_id'])===null||$tmp==='' ? $_smarty_tpl->getVariable('cat_id')->value : $tmp))===null||$tmp==='' ? '' : $tmp),'required'=>"true"),$_smarty_tpl);?>

			
			<?php echo smarty_function_upload(array('label'=>$_smarty_tpl->getVariable('lang')->value['upload'],'name'=>"wrt_cover_img",'value'=>$_smarty_tpl->getVariable('edit')->value['cover_img'],'required'=>"true",'thumb_width'=>"120",'thumb_height'=>"90"),$_smarty_tpl);?>

			
			<div class="line clearfix">
				<div class="f1"><?php echo $_smarty_tpl->getVariable('lang')->value['source'];?>
</div>
				<div class="f2">
					<input type="text" size="28" value="<?php echo $_smarty_tpl->getVariable('edit')->value['source'];?>
" name="wrt_source" id="id_source">
					<a href="<?php echo smarty_function_app_url(array('url'=>'ajax/cachedata?type=cache_ablum_source&targetid=id_source&height=300&width=350'),$_smarty_tpl);?>
" class="thickbox"><?php echo $_smarty_tpl->getVariable('lang')->value['choose'];?>
</a>
				</div>
			</div>
			
			<div class="line clearfix">
				<div class="f1"><?php echo $_smarty_tpl->getVariable('lang')->value['author'];?>
</div>
				<div class="f2">
					<input type="text" size="28" value="<?php echo $_smarty_tpl->getVariable('edit')->value['author'];?>
" name="wrt_author" id="id_author">
					<a href="<?php echo smarty_function_app_url(array('url'=>'ajax/cachedata?type=cache_ablum_author&targetid=id_author&height=300&width=350'),$_smarty_tpl);?>
" class="thickbox"><?php echo $_smarty_tpl->getVariable('lang')->value['choose'];?>
</a>
				</div>
			</div>
			
			<?php echo smarty_function_radio(array('label'=>$_smarty_tpl->getVariable('lang')->value['published'],'name'=>"wrt_published",'value'=>$_smarty_tpl->getVariable('published')->value,'checked'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['published'])===null||$tmp==='' ? '1' : $tmp)),$_smarty_tpl);?>

			
			<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['ordering'],'name'=>"wrt_ordering",'value'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['ordering'])===null||$tmp==='' ? '50' : $tmp),'required'=>"true",'datatype'=>"NUMERIC",'size'=>"s"),$_smarty_tpl);?>

			
			<?php echo smarty_function_textarea(array('label'=>$_smarty_tpl->getVariable('lang')->value['description'],'name'=>"wrt_description",'value'=>$_smarty_tpl->getVariable('edit')->value['description'],'width'=>"640px",'height'=>"120px",'id'=>"description"),$_smarty_tpl);?>

		</div>
	</li>
	<li style="display:none">
		<div class="adminform">
			<div class="f_title"><?php echo $_smarty_tpl->getVariable('lang')->value['add_c_picture'];?>
</div>
			
			<div style="border: solid 1px #777777; background-color: #CCCCCC; width:181px;"><span id="spanButtonPlaceholder"></span></div>
			
			<div id="divFileProgressContainer" style="padding: 8px 0px"></div>
			<div id="thumbnails" class="clearfix">
				<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('edit')->value['gallery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>
					<table class="item" id="pic_item_<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
" cellspacing="1"><tr valign="top"><td width="140"><div class="img"><img src="<?php echo @UPLOAD_URL;?>
<?php echo $_smarty_tpl->getVariable('itm')->value['image_small'];?>
" border="0"/></div></td><td><div class="com">Comment: </div><textarea name="gallery_<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
" style="border:1px solid #CCCCCC"><?php echo $_smarty_tpl->getVariable('itm')->value['comment'];?>
</textarea><div class="del"><a href="javascript:void(0)" onclick="cancelGallery('<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
')">[Del]</a></div></td></tr></table>
				<?php }} ?>
			</div>
		</div>
	</li>
	</ul>
	<div class="spe_submit">
		<?php if ($_smarty_tpl->getVariable('edit')->value['id']>0){?><input type="hidden" name="wrt_id" value="<?php echo $_smarty_tpl->getVariable('edit')->value['id'];?>
"/><?php }?>
		<input type="submit" name="submit" value="<?php echo $_smarty_tpl->getVariable('lang')->value['submit'];?>
" class="btn"/>&nbsp;
		<input type="button" name="back" value="<?php echo $_smarty_tpl->getVariable('lang')->value['back'];?>
" class="btn" onclick="loadPage('<?php echo smarty_function_app_url(array('url'=>'picture/listPicture'),$_smarty_tpl);?>
', 1)"/>
	</div>
</div>
</form>