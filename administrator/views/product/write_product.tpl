<link href="css/swfupload.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/swfupload.js"></script>
<script type="text/javascript" src="js/handlers.js"></script>
<script type="text/javascript">
var swfu;
function tmp(){
	v = '<{$edit.description|escape:'javascript'}>';
	KE.insertHtml('content', v);
}
$(document).ready(function() {
	addEditor('content');
	setTimeout("tmp()", 100);
	
	swfu = new SWFUpload({
		// Backend Settings
		upload_url: "includes/swfupload_product.php",
		post_params: {"PHPSESSID": "<{$sessionid}>"},

		// File Upload Settings
		file_size_limit : "4 MB",	 //2MB
		file_types : "*.jpg; *.gif; *.png; *.jpeg",
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

function cancelGallery(inputid) {
	if(!confirm(lang_confirm_delete)) {
		return;
	}
	$.ajax({
		type: 'get',
		url: "<{app_url url='product/ajaxDelGalleryItem?gallery_id='}>"+inputid,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok') {
				$("#pic_item_"+inputid).remove();
				alert(lang_op_success);
			} else {
				alert(msg);
			}
		}
	});
}
function getAttributeWrap(ownobj, wrap_id, product_id) {
	if(ownobj.value>0) {
		if(!product_id) {
			product_id = 0;
		}
		$.get("<{app_url url='product/ajaxGetAttributeWrap'}>", {dest_model_id:ownobj.value, product_id:product_id}, function(data){$("#"+wrap_id).html(data)});
	} else {
		$("#"+wrap_id).html("");
	}
}

/*如果存在$edit.mod_id，说明不仅是编辑状态，还有已经存在的其它额外属性，此时需要加载上来*/
<{if $edit.mod_id>0}>
$(document).ready(function(){
	$.get("<{app_url url='product/ajaxGetAttributeWrap'}>", {dest_model_id:'<{$edit.mod_id}>', product_id:'<{$edit.product_id}>'}, function(data){$("#attr_wrap").html(data)});
});
<{/if}>
</script>


<form action="<{app_url url='product/writeProduct'}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{$reurl}>')">

<div class="tab_list">
	<div class="tabs">
		<label class="tab_current" onclick="tab(this, 'tab_current')"><{$lang.basic_info}></label>
		<label onclick="tab(this, 'tab_current')"><{$lang.product_introduce}></label>
		<label onclick="tab(this, 'tab_current')"><{$lang.product_attribute}></label>
		<label onclick="tab(this, 'tab_current')"><{$lang.product_gallery}></label>
	</div>
	<ul>
		<li style="display:block">
			<div class="adminform">
				<!--产品基本信息-->
				
				<!--产品名称-->
				<{text label=$lang.name name="wrt_product_name" value=$edit.product_name required="true" size="l"}>

             <!--商品货号-->
             <{text label=$lang.product_sn name="wrt_product_sn" value=$edit.product_sn note=$lang.product_sn_tip}>
             
				<!--所属分类-->
				<div class="line clearfix">
					<div class="f1"><{$lang.belong_cat}></div>
					<div class="f2">
						<select name="wrt_cat_id" id="cat_id" onchange="checkSingle(this)" required="true" msg="<{$lang.not_empty}><{$lang.belong_cat}>">
							<{$catopt}>
						</select>
                   <span class="red">*</span>&nbsp;
                   <a href="javascript:void(0)" onclick="openAjaxWin('<{app_url url='product/ajaxCatBatchAdd?is_dynamic=1'}>', 550, 330)"><{$lang.add}></a>
					</div>
					<div class="f3"><label class="tip"></label></div>
				</div>
                
             <!--所属品牌-->
             <div class="line clearfix">
                <div class="f1"><{$lang.product_brand}></div>
                <div class="f2">
                    <select name="wrt_brand_id" id="brand_id">
                        <{foreach $brands as $brand}>
                            <option value="<{$brand@key}>"<{if $brand@key==$edit.brand_id}> selected<{/if}>><{$brand}></option>               
                        <{/foreach}>
                    </select>&nbsp;
                    <a href="javascript:void(0)" onclick="openAjaxWin('<{app_url url=$lang.product_brand|escape:'url'|pcat:'ajax/simpleAddItem?select_id=brand_id&t=product_brand&f=brand_name&title='}>', 500, 210)"><{$lang.add}></a>
                </div>
             </div>
             				
				<!--上传图片-->
				<{upload label=$lang.product_img name="wrt_product_img" value=$edit.product_img required="true" thumb_width=$thumb_arr.0 thumb_height=$thumb_arr.1}>
				
				<!--推荐-->
				<div class="line clearfix">
					<div class="f1"><{$lang.recommend}></div>
					<div class="f2" style="width:60%">
						<{$lang.is_new}> <input type="checkbox" name="wrt_is_new" value="1" <{if $edit.is_new>0}>checked<{/if}>/> &nbsp;&nbsp;
						<{$lang.is_hot}> <input type="checkbox" name="wrt_is_hot" value="1" <{if $edit.is_hot>0}>checked<{/if}>/> &nbsp;&nbsp;
						<{$lang.is_best}> <input type="checkbox" name="wrt_is_best" value="1" <{if $edit.is_best>0}>checked<{/if}>/>
					</div>
				</div>
				
				<!--产品数量-->
				<{text label=$lang.product_number name="wrt_product_number" value=$edit.product_number|default:'-1' required="true" datatype="NUMERIC" size="s" note=$lang.no_limit_negative}>
				
				<!--产品重量-->
				<{text label=$lang.product_weight name="wrt_product_weight" value=$edit.product_weight datatype="NUMERIC" size="s" note=$lang.unit_is_kg}>
				
				<!--价格-->
				<{text label=$lang.price|cat:' ('|cat:$cfg_currency_flag|cat:')' name="wrt_price" value=$edit.price datatype="NUMERIC" size="s"}>
				
				<!--排序-->
				<{text label=$lang.ordering name="wrt_ordering" value=$edit.ordering|default:'50' required="true" datatype="NUMERIC" size="s"}>
				
				<!--公开-->
				<{select label=$lang.published name="wrt_published" value=$published selected=$edit.published}>
				
				<!--简单描述-->
				<{textarea label=$lang.product_brief name="wrt_product_brief" value=$edit.product_brief width="400px" height="100px"}>
				
				
				
			</div>
		</li>
		<li style="display:none">
			<div class="adminform">							
				<textarea id="content" name="wrt_description" style="width:99%; height:500px"></textarea>			
				
			</div>
		</li>
		<li style="display:none">			
			<div class="op_bar">
				<strong><{$lang.product_model}></strong>&nbsp;
				<select name="mod_id" onchange="getAttributeWrap(this, 'attr_wrap', '<{$edit.product_id}>')">
					<option value=""><{$lang.please_choose}></option>
					<{foreach from=$models item="itm"}>						
						<option value="<{$itm.mod_id}>"<{if $edit.mod_id==$itm.mod_id}> selected<{/if}>><{$itm.mod_name}></option>
					<{/foreach}>
				</select>&nbsp;&nbsp;
				<span class="comment"><{$lang.modify_product_model_tip}></span>
			</div>
			<div class="blank">&nbsp;</div>
			<div id="attr_wrap"></div>
		</li>
		<li style="display:none">
			<div style="border: solid 1px #777777; background-color: #CCCCCC; width:181px;"><span id="spanButtonPlaceholder"></span></div>
			<div id="divFileProgressContainer" style="padding: 8px 0px"></div>
			<div id="thumbnails" class="clearfix">
				<{foreach from=$edit.gallery item="itm"}>
					<table class="item" id="pic_item_<{$itm.id}>" cellspacing="1"><tr valign="top"><td width="140"><div class="img"><img src="<{$smarty.const.UPLOAD_URL}><{$itm.image_thumb}>" border="0"/></div></td><td><div class="com">Comment: </div><textarea name="gallery_<{$itm.id}>" style="border:1px solid #CCCCCC"><{$itm.comment}></textarea><div class="del"><a href="javascript:void(0)" onclick="cancelGallery('<{$itm.id}>')">[Del]</a></div></td></tr></table>
				<{/foreach}>
			</div>			
			
		</li>
	</ul>
</div>

<div class="adminform">
	<{if $edit.product_id>0}>
		<input type="hidden" name="wrt_id" value="<{$edit.product_id}>"/>
	<{/if}>
	<{submit name="submit" value=$lang.submit back_url='product/listProduct'|app_url}>
</div>

</form>