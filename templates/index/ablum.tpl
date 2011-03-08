<{$top_position}>

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
hs.lang.restoreTitle = '<{$lang.click_to_view_next}>';
 
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
<{if !empty($ablum.gallery)}>
<div id="gallery-area" style="width: 713px; height: 640px; margin: 0 auto; border: 1px solid silver;">
<div class="hidden-container">
	<{foreach from=$ablum.gallery item="itm" name="fname"}>
		<{if $smarty.foreach.fname.first}>
			<a id="thumb1" class='highslide' href='<{$upload_url}><{$itm.image}>'
			onclick="return hs.expand(this, inPageOptions)" title="<{$itm.comment|default:$ablum_title}>"> 
				<img src='<{$upload_url}><{$itm.image_small}>' alt=''/>
			</a>
		<{else}>
			<a class='highslide' href='<{$upload_url}><{$itm.image}>'
			onclick="return hs.expand(this, inPageOptions)" title="<{$itm.comment|default:$ablum_title}>"> 
				<img src='<{$upload_url}><{$itm.image_small}>' alt=''/>
			</a>
		<{/if}>
	<{/foreach}>
</div> 
</div> 
<{else}>
<div class="no_data"><{$lang.no_data}></div>
<{/if}>
