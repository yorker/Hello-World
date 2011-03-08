<?php /* Smarty version Smarty-3.0.7, created on 2011-02-22 21:24:25
         compiled from "templates\ablum.html" */ ?>
<?php /*%%SmartyHeaderCode:305114d63b909181cb7-43775332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01c639aaa2af19c2532454a8a22aa45fa52fb732' => 
    array (
      0 => 'templates\\ablum.html',
      1 => 1290943006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '305114d63b909181cb7-43775332',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php echo $_smarty_tpl->getVariable('top_position')->value;?>


<script type="text/javascript" src="vendors/highslide/highslide-full.js"></script> 
<link rel="stylesheet" type="text/css" href="vendors/highslide/highslide.css" /> 
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="vendors/highslide/highslide-ie6.css" />
<![endif]-->

<script type="text/javascript"> 
//<![CDATA[
hs.graphicsDir = 'vendors/highslide/graphics/';
hs.transitions = ['expand', 'crossfade'];
hs.restoreCursor = null;
hs.lang.restoreTitle = '<?php echo $_smarty_tpl->getVariable('lang')->value['click_to_view_next'];?>
';
 
// Add the slideshow providing the controlbar and the thumbstrip
hs.addSlideshow({
	//slideshowGroup: 'group1',
	interval: 5000,
	repeat: true,
	useControls: true,
	overlayOptions: {
		position: 'bottom right',
		offsetY: 50
	},
	thumbstrip: {
		position: 'above',
		mode: 'horizontal',
		relativeTo: 'expander'
	}
});
 
// Options for the in-page items
var inPageOptions = {
	//slideshowGroup: 'group1',
	outlineType: null,
	allowSizeReduction: false,
	wrapperClassName: 'in-page controls-in-heading',
	thumbnailId: 'gallery-area',
	useBox: true,
	width: 693,
	height: 520,
	targetX: 'gallery-area 10px',
	targetY: 'gallery-area 10px',
	captionEval: 'this.a.title',
	numberPosition: 'caption'
}
 
// Open the first thumb on page load
hs.addEventListener(window, 'load', function() {
	document.getElementById('thumb1').onclick();
});
 
// Cancel the default action for image click and do next instead
hs.Expander.prototype.onImageClick = function() {
	if (/in-page/.test(this.wrapper.className))	return hs.next();
}
 
// Under no circumstances should the static popup be closed
hs.Expander.prototype.onBeforeClose = function() {
	if (/in-page/.test(this.wrapper.className))	return false;
}
// ... nor dragged
hs.Expander.prototype.onDrag = function() {
	if (/in-page/.test(this.wrapper.className))	return false;
}
 
// Keep the position after window resize
hs.addEventListener(window, 'resize', function() {
	var i, exp;
	hs.getPageSize();
 
	for (i = 0; i < hs.expanders.length; i++) {
		exp = hs.expanders[i];
		if (exp) {
			var x = exp.x,
				y = exp.y;
 
			// get new thumb positions
			exp.tpos = hs.getPosition(exp.el);
			x.calcThumb();
			y.calcThumb();
 
			// calculate new popup position
		 	x.pos = x.tpos - x.cb + x.tb;
			x.scroll = hs.page.scrollLeft;
			x.clientSize = hs.page.width;
			y.pos = y.tpos - y.cb + y.tb;
			y.scroll = hs.page.scrollTop;
			y.clientSize = hs.page.height;
			exp.justify(x, true);
			exp.justify(y, true);
 
			// set new left and top to wrapper and outline
			exp.moveTo(x.pos, y.pos);
		}
	}
});
//]]>
</script> 
 
<style type="text/css"> 
	.highslide-image {
		border: 1px solid black;
	}
	.highslide-controls {
		width: 90px !important;
	}
	.highslide-controls .highslide-close {
		display: none;
	}
	.highslide-caption {
		padding: .5em 0;
	}
</style>

<div class="blank">&nbsp;</div>
<?php if (!empty($_smarty_tpl->getVariable('ablum',null,true,false)->value['gallery'])){?>
<div id="gallery-area" style="width: 713px; height: 640px; margin: 0 auto; border: 1px solid silver;">
<div class="hidden-container">
	<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ablum')->value['gallery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["itm"]->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
 $_smarty_tpl->tpl_vars["itm"]->index++;
 $_smarty_tpl->tpl_vars["itm"]->first = $_smarty_tpl->tpl_vars["itm"]->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['first'] = $_smarty_tpl->tpl_vars["itm"]->first;
?>
		<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['first']){?>
			<a id="thumb1" class='highslide' href='<?php echo $_smarty_tpl->getVariable('upload_url')->value;?>
<?php echo $_smarty_tpl->getVariable('itm')->value['image'];?>
'
			onclick="return hs.expand(this, inPageOptions)" title="<?php echo (($tmp = @$_smarty_tpl->getVariable('itm')->value['comment'])===null||$tmp==='' ? $_smarty_tpl->getVariable('ablum_title')->value : $tmp);?>
"> 
				<img src='<?php echo $_smarty_tpl->getVariable('upload_url')->value;?>
<?php echo $_smarty_tpl->getVariable('itm')->value['image_small'];?>
' alt=''/>
			</a>
		<?php }else{ ?>
			<a class='highslide' href='<?php echo $_smarty_tpl->getVariable('upload_url')->value;?>
<?php echo $_smarty_tpl->getVariable('itm')->value['image'];?>
'
			onclick="return hs.expand(this, inPageOptions)" title="<?php echo (($tmp = @$_smarty_tpl->getVariable('itm')->value['comment'])===null||$tmp==='' ? $_smarty_tpl->getVariable('ablum_title')->value : $tmp);?>
"> 
				<img src='<?php echo $_smarty_tpl->getVariable('upload_url')->value;?>
<?php echo $_smarty_tpl->getVariable('itm')->value['image_small'];?>
' alt=''/>
			</a>
		<?php }?>
	<?php }} ?>
</div> 
</div> 
<?php }else{ ?>
<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div>
<?php }?>
<?php $_template = new Smarty_Internal_Template("footer.inc.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>