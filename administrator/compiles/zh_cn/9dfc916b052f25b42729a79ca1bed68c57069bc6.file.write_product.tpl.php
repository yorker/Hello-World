<?php /* Smarty version Smarty-3.0.7, created on 2011-02-28 08:55:25
         compiled from "D:\www\v30\administrator\views\product/write_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31784d6af27da37187-27491993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9dfc916b052f25b42729a79ca1bed68c57069bc6' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\product/write_product.tpl',
      1 => 1298854518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31784d6af27da37187-27491993',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'D:\www\v30\core\Engine\plugins\modifier.escape.php';
if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_modifier_pcat')) include 'D:\www\v30\administrator\plugins\modifier.pcat.php';
if (!is_callable('smarty_function_upload')) include 'D:\www\v30\administrator\plugins\function.upload.php';
if (!is_callable('smarty_function_select')) include 'D:\www\v30\administrator\plugins\function.select.php';
if (!is_callable('smarty_function_textarea')) include 'D:\www\v30\administrator\plugins\function.textarea.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
?><link href="css/swfupload.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/swfupload.js"></script>
<script type="text/javascript" src="js/handlers.js"></script>
<script type="text/javascript">
var swfu;
function tmp(){
	v = '<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('edit')->value['description'],'javascript');?>
';
	KE.insertHtml('content', v);
}
$(document).ready(function() {
	addEditor('content');
	setTimeout("tmp()", 100);
	
	swfu = new SWFUpload({
		// Backend Settings
		upload_url: "includes/swfupload_product.php",
		post_params: {"PHPSESSID": "<?php echo $_smarty_tpl->getVariable('sessionid')->value;?>
"},

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

function cancelGallery(inputid) {
	if(!confirm(lang_confirm_delete)) {
		return;
	}
	$.ajax({
		type: 'get',
		url: "<?php echo smarty_function_app_url(array('url'=>'product/ajaxDelGalleryItem?gallery_id='),$_smarty_tpl);?>
"+inputid,
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
		$.get("<?php echo smarty_function_app_url(array('url'=>'product/ajaxGetAttributeWrap'),$_smarty_tpl);?>
", {dest_model_id:ownobj.value, product_id:product_id}, function(data){$("#"+wrap_id).html(data)});
	} else {
		$("#"+wrap_id).html("");
	}
}

/*如果存在$edit.mod_id，说明不仅是编辑状态，还有已经存在的其它额外属性，此时需要加载上来*/
<?php if ($_smarty_tpl->getVariable('edit')->value['mod_id']>0){?>
$(document).ready(function(){
	$.get("<?php echo smarty_function_app_url(array('url'=>'product/ajaxGetAttributeWrap'),$_smarty_tpl);?>
", {dest_model_id:'<?php echo $_smarty_tpl->getVariable('edit')->value['mod_id'];?>
', product_id:'<?php echo $_smarty_tpl->getVariable('edit')->value['product_id'];?>
'}, function(data){$("#attr_wrap").html(data)});
});
<?php }?>
</script>


<form action="<?php echo smarty_function_app_url(array('url'=>'product/writeProduct'),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php echo $_smarty_tpl->getVariable('reurl')->value;?>
')">

<div class="tab_list">
	<div class="tabs">
		<label class="tab_current" onclick="tab(this, 'tab_current')"><?php echo $_smarty_tpl->getVariable('lang')->value['basic_info'];?>
</label>
		<label onclick="tab(this, 'tab_current')"><?php echo $_smarty_tpl->getVariable('lang')->value['product_introduce'];?>
</label>
		<label onclick="tab(this, 'tab_current')"><?php echo $_smarty_tpl->getVariable('lang')->value['product_attribute'];?>
</label>
		<label onclick="tab(this, 'tab_current')"><?php echo $_smarty_tpl->getVariable('lang')->value['product_gallery'];?>
</label>
	</div>
	<ul>
		<li style="display:block">
			<div class="adminform">
				<!--产品基本信息-->
				
				<!--产品名称-->
				<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['name'],'name'=>"wrt_product_name",'value'=>$_smarty_tpl->getVariable('edit')->value['product_name'],'required'=>"true",'size'=>"l"),$_smarty_tpl);?>


             <!--商品货号-->
             <?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['product_sn'],'name'=>"wrt_product_sn",'value'=>$_smarty_tpl->getVariable('edit')->value['product_sn'],'note'=>$_smarty_tpl->getVariable('lang')->value['product_sn_tip']),$_smarty_tpl);?>

             
				<!--所属分类-->
				<div class="line clearfix">
					<div class="f1"><?php echo $_smarty_tpl->getVariable('lang')->value['belong_cat'];?>
</div>
					<div class="f2">
						<select name="wrt_cat_id" id="cat_id" onchange="checkSingle(this)" required="true" msg="<?php echo $_smarty_tpl->getVariable('lang')->value['not_empty'];?>
<?php echo $_smarty_tpl->getVariable('lang')->value['belong_cat'];?>
">
							<?php echo $_smarty_tpl->getVariable('catopt')->value;?>

						</select>
                   <span class="red">*</span>&nbsp;
                   <a href="javascript:void(0)" onclick="openAjaxWin('<?php echo smarty_function_app_url(array('url'=>'product/ajaxCatBatchAdd?is_dynamic=1'),$_smarty_tpl);?>
', 550, 330)"><?php echo $_smarty_tpl->getVariable('lang')->value['add'];?>
</a>
					</div>
					<div class="f3"><label class="tip"></label></div>
				</div>
                
             <!--所属品牌-->
             <div class="line clearfix">
                <div class="f1"><?php echo $_smarty_tpl->getVariable('lang')->value['product_brand'];?>
</div>
                <div class="f2">
                    <select name="wrt_brand_id" id="brand_id">
                        <?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('brands')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value){
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['brand']->key;?>
"<?php if ($_smarty_tpl->tpl_vars['brand']->key==$_smarty_tpl->getVariable('edit')->value['brand_id']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['brand']->value;?>
</option>               
                        <?php }} ?>
                    </select>&nbsp;
                    <a href="javascript:void(0)" onclick="openAjaxWin('<?php echo smarty_function_app_url(array('url'=>smarty_modifier_pcat(smarty_modifier_escape($_smarty_tpl->getVariable('lang')->value['product_brand'],'url'),'ajax/simpleAddItem?select_id=brand_id&t=product_brand&f=brand_name&title=')),$_smarty_tpl);?>
', 500, 210)"><?php echo $_smarty_tpl->getVariable('lang')->value['add'];?>
</a>
                </div>
             </div>
             				
				<!--上传图片-->
				<?php echo smarty_function_upload(array('label'=>$_smarty_tpl->getVariable('lang')->value['product_img'],'name'=>"wrt_product_img",'value'=>$_smarty_tpl->getVariable('edit')->value['product_img'],'required'=>"true",'thumb_width'=>$_smarty_tpl->getVariable('thumb_arr')->value[0],'thumb_height'=>$_smarty_tpl->getVariable('thumb_arr')->value[1]),$_smarty_tpl);?>

				
				<!--推荐-->
				<div class="line clearfix">
					<div class="f1"><?php echo $_smarty_tpl->getVariable('lang')->value['recommend'];?>
</div>
					<div class="f2" style="width:60%">
						<?php echo $_smarty_tpl->getVariable('lang')->value['is_new'];?>
 <input type="checkbox" name="wrt_is_new" value="1" <?php if ($_smarty_tpl->getVariable('edit')->value['is_new']>0){?>checked<?php }?>/> &nbsp;&nbsp;
						<?php echo $_smarty_tpl->getVariable('lang')->value['is_hot'];?>
 <input type="checkbox" name="wrt_is_hot" value="1" <?php if ($_smarty_tpl->getVariable('edit')->value['is_hot']>0){?>checked<?php }?>/> &nbsp;&nbsp;
						<?php echo $_smarty_tpl->getVariable('lang')->value['is_best'];?>
 <input type="checkbox" name="wrt_is_best" value="1" <?php if ($_smarty_tpl->getVariable('edit')->value['is_best']>0){?>checked<?php }?>/>
					</div>
				</div>
				
				<!--产品数量-->
				<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['product_number'],'name'=>"wrt_product_number",'value'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['product_number'])===null||$tmp==='' ? '-1' : $tmp),'required'=>"true",'datatype'=>"NUMERIC",'size'=>"s",'note'=>$_smarty_tpl->getVariable('lang')->value['no_limit_negative']),$_smarty_tpl);?>

				
				<!--产品重量-->
				<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['product_weight'],'name'=>"wrt_product_weight",'value'=>$_smarty_tpl->getVariable('edit')->value['product_weight'],'datatype'=>"NUMERIC",'size'=>"s",'note'=>$_smarty_tpl->getVariable('lang')->value['unit_is_kg']),$_smarty_tpl);?>

				
				<!--价格-->
				<?php echo smarty_function_text(array('label'=>((($_smarty_tpl->getVariable('lang')->value['price']).(' (')).($_smarty_tpl->getVariable('cfg_currency_flag')->value)).(')'),'name'=>"wrt_price",'value'=>$_smarty_tpl->getVariable('edit')->value['price'],'datatype'=>"NUMERIC",'size'=>"s"),$_smarty_tpl);?>

				
				<!--排序-->
				<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['ordering'],'name'=>"wrt_ordering",'value'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['ordering'])===null||$tmp==='' ? '50' : $tmp),'required'=>"true",'datatype'=>"NUMERIC",'size'=>"s"),$_smarty_tpl);?>

				
				<!--公开-->
				<?php echo smarty_function_select(array('label'=>$_smarty_tpl->getVariable('lang')->value['published'],'name'=>"wrt_published",'value'=>$_smarty_tpl->getVariable('published')->value,'selected'=>$_smarty_tpl->getVariable('edit')->value['published']),$_smarty_tpl);?>

				
				<!--简单描述-->
				<?php echo smarty_function_textarea(array('label'=>$_smarty_tpl->getVariable('lang')->value['product_brief'],'name'=>"wrt_product_brief",'value'=>$_smarty_tpl->getVariable('edit')->value['product_brief'],'width'=>"400px",'height'=>"100px"),$_smarty_tpl);?>

				
				
				
			</div>
		</li>
		<li style="display:none">
			<div class="adminform">							
				<textarea id="content" name="wrt_description" style="width:99%; height:500px"></textarea>			
				
			</div>
		</li>
		<li style="display:none">			
			<div class="op_bar">
				<strong><?php echo $_smarty_tpl->getVariable('lang')->value['product_model'];?>
</strong>&nbsp;
				<select name="mod_id" onchange="getAttributeWrap(this, 'attr_wrap', '<?php echo $_smarty_tpl->getVariable('edit')->value['product_id'];?>
')">
					<option value=""><?php echo $_smarty_tpl->getVariable('lang')->value['please_choose'];?>
</option>
					<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('models')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
?>						
						<option value="<?php echo $_smarty_tpl->getVariable('itm')->value['mod_id'];?>
"<?php if ($_smarty_tpl->getVariable('edit')->value['mod_id']==$_smarty_tpl->getVariable('itm')->value['mod_id']){?> selected<?php }?>><?php echo $_smarty_tpl->getVariable('itm')->value['mod_name'];?>
</option>
					<?php }} ?>
				</select>&nbsp;&nbsp;
				<span class="comment"><?php echo $_smarty_tpl->getVariable('lang')->value['modify_product_model_tip'];?>
</span>
			</div>
			<div class="blank">&nbsp;</div>
			<div id="attr_wrap"></div>
		</li>
		<li style="display:none">
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
<?php echo $_smarty_tpl->getVariable('itm')->value['image_thumb'];?>
" border="0"/></div></td><td><div class="com">Comment: </div><textarea name="gallery_<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
" style="border:1px solid #CCCCCC"><?php echo $_smarty_tpl->getVariable('itm')->value['comment'];?>
</textarea><div class="del"><a href="javascript:void(0)" onclick="cancelGallery('<?php echo $_smarty_tpl->getVariable('itm')->value['id'];?>
')">[Del]</a></div></td></tr></table>
				<?php }} ?>
			</div>			
			
		</li>
	</ul>
</div>

<div class="adminform">
	<?php if ($_smarty_tpl->getVariable('edit')->value['product_id']>0){?>
		<input type="hidden" name="wrt_id" value="<?php echo $_smarty_tpl->getVariable('edit')->value['product_id'];?>
"/>
	<?php }?>
	<?php echo smarty_function_submit(array('name'=>"submit",'value'=>$_smarty_tpl->getVariable('lang')->value['submit'],'back_url'=>smarty_modifier_app_url('product/listProduct')),$_smarty_tpl);?>

</div>

</form>