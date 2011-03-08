<link href="css/swfupload.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/swfupload.js"></script>
<script type="text/javascript" src="js/handlers.js"></script>

<script type="text/javascript">
var swfu;

$(document).ready(function() {
	swfu = new SWFUpload({
		// Backend Settings
		upload_url: "includes/swfupload_picture.php",
		post_params: {"PHPSESSID": "<{$sessionid}>"},

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
		button_text : '<span class="button"><{$lang.please_choose_image}></span>',
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
	if(!confirm('<{$lang.confirm_delete}>')) {
		return false;
	}
	$.ajax({
		type: 'get',
		url: '<{app_url url="picture/cancelGallery?id="}>' + id,
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

<form action="<{app_url url='picture/writePicture'}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{$reurl}>')">
<div class="tab_list">
	<div class="tabs">
		<label class="tab_current" onclick="tab(this, 'tab_current')"><{$lang.basic_info}></label>
		<label onclick="tab(this, 'tab_current')"><{$lang.picture_collect}></label>
	</div>
	<ul>
	<li style="display:block">
		<div class="adminform">
			<div class="f_title"><{$lang.basic_info}></div>
			<{text label=$lang.title name="wrt_title" value=$edit.title required="true" size="l"}>
			
			<{select label=$lang.category name="wrt_cat_id" value=$cats selected=$edit.cat_id|default:$cat_id|default:'' required="true"}>
			
			<{upload label=$lang.upload name="wrt_cover_img" value=$edit.cover_img required="true" thumb_width="120" thumb_height="90"}>
			
			<div class="line clearfix">
				<div class="f1"><{$lang.source}></div>
				<div class="f2">
					<input type="text" size="28" value="<{$edit.source}>" name="wrt_source" id="id_source">
					<a href="<{app_url url='ajax/cachedata?type=cache_ablum_source&targetid=id_source&height=300&width=350'}>" class="thickbox"><{$lang.choose}></a>
				</div>
			</div>
			
			<div class="line clearfix">
				<div class="f1"><{$lang.author}></div>
				<div class="f2">
					<input type="text" size="28" value="<{$edit.author}>" name="wrt_author" id="id_author">
					<a href="<{app_url url='ajax/cachedata?type=cache_ablum_author&targetid=id_author&height=300&width=350'}>" class="thickbox"><{$lang.choose}></a>
				</div>
			</div>
			
			<{radio label=$lang.published name="wrt_published" value=$published checked=$edit.published|default:'1'}>
			
			<{text label=$lang.ordering name="wrt_ordering" value=$edit.ordering|default:'50' required="true" datatype="NUMERIC" size="s"}>
			
			<{textarea label=$lang.description name="wrt_description" value=$edit.description width="640px" height="120px" id="description"}>
		</div>
	</li>
	<li style="display:none">
		<div class="adminform">
			<div class="f_title"><{$lang.add_c_picture}></div>
			
			<div style="border: solid 1px #777777; background-color: #CCCCCC; width:181px;"><span id="spanButtonPlaceholder"></span></div>
			
			<div id="divFileProgressContainer" style="padding: 8px 0px"></div>
			<div id="thumbnails" class="clearfix">
				<{foreach from=$edit.gallery item="itm"}>
					<table class="item" id="pic_item_<{$itm.id}>" cellspacing="1"><tr valign="top"><td width="140"><div class="img"><img src="<{$smarty.const.UPLOAD_URL}><{$itm.image_small}>" border="0"/></div></td><td><div class="com">Comment: </div><textarea name="gallery_<{$itm.id}>" style="border:1px solid #CCCCCC"><{$itm.comment}></textarea><div class="del"><a href="javascript:void(0)" onclick="cancelGallery('<{$itm.id}>')">[Del]</a></div></td></tr></table>
				<{/foreach}>
			</div>
		</div>
	</li>
	</ul>
	<div class="spe_submit">
		<{if $edit.id > 0}><input type="hidden" name="wrt_id" value="<{$edit.id}>"/><{/if}>
		<input type="submit" name="submit" value="<{$lang.submit}>" class="btn"/>&nbsp;
		<input type="button" name="back" value="<{$lang.back}>" class="btn" onclick="loadPage('<{app_url url='picture/listPicture'}>', 1)"/>
	</div>
</div>
</form>