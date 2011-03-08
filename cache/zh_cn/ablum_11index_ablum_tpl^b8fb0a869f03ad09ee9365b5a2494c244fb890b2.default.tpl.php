<?php /*%%SmartyHeaderCode:14024d6d9596a21d02-07928543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8fb0a869f03ad09ee9365b5a2494c244fb890b2' => 
    array (
      0 => 'templates\\layout/default.tpl',
      1 => 1299030173,
      2 => 'file',
    ),
    '03db980854cf6352a4851ffe4331e0e79980af69' => 
    array (
      0 => 'templates\\index/ablum.tpl',
      1 => 1298988642,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14024d6d9596a21d02-07928543',
  'cache_lifetime' => '3600',
  'has_nocache_code' => true,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!$no_render) {?><?php if (!is_callable('smarty_insert_userinfo')) include 'D:\www\v30\plugins\insert.userinfo.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://localhost:8088/v30/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="傻瓜的梦工梦(http://www.dev-yorker.cn) ,Yorker的个人空间,IT类技术文章,精彩美文,经典励志,我的相册" name="description" />
<meta content="IT技术,程序设计,PHP,JAVA,C++, Linux,数据库,文档下载,技术网址,个人空间,相册" name="keywords"/>
<meta content="傻瓜的梦工场" name="author"/>
<meta content="Copyright &copy; 2010 傻瓜的梦工场" name="copyright"/>
<meta name="robots" content="index,follow"/>
<link href="css/common.css" rel="stylesheet" type="text/css"/>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="css/thickbox.css" type="text/css" rel="stylesheet"/>
<link href="css/pagination.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/config.js"></script>
<script type="text/javascript" src="js/base.js"></script>
<script type="text/javascript" src="js/site.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>

<title>桂山-相册-傻瓜的梦工场-个人空间-Speed</title>
</head>
<body>
<div id="container">
    <div id="header"><div class="level1"><div class="level2">		
		<div class="head clearfix">
			<div class="fl">&nbsp;</div>
			<div class="fr">
				<div class="cnt">一个人的悲剧不在于他输了，而是他差点就成功了。</div>
				<div class="author">-- 肯尼斯·克里斯汀</div>
			</div>
		</div>
		<div class="menu clearfix">
			<ul class="clearfix">
				<li class="start">&nbsp;</li>
				<li><a href="Index">首页</a></li>
				<li><a href="Index/artcat/19">文章</a></li>	
				<li><a href="Index/ablumlist">相册</a></li>	
				<li><a href="Index/dlist">下载</a></li>
				<li><a href="Index/notebook">留言簿</a></li>
				<li>&nbsp;</li>
			</ul>
			<div class="userinfo clearfix">
				<?php echo smarty_insert_userinfo(array (
),$_smarty_tpl);?>
			</div>
		</div>
    </div></div></div>
    
    <div id="content">
		<div id="nav_position"><ul class="clearfix"><li><a href="index.html">首页</a></li><li>&gt;&gt;</li><li><a href="Index/ablumlist">相册列表</a></li><li>&gt;&gt;</li><li><a href="Index/ablumlist/28">留住记忆</a></li><li>&gt;&gt;</li><li class="last">桂山</li></lu></div>

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
hs.lang.restoreTitle = '点击查看下一张';
 
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
<div id="gallery-area" style="width: 713px; height: 640px; margin: 0 auto; border: 1px solid silver;">
<div class="hidden-container">
						<a id="thumb1" class='highslide' href='http://localhost:8088/v30/upload/201011/YRI20101122221328.jpg'
			onclick="return hs.expand(this, inPageOptions)" title="桂山"> 
				<img src='http://localhost:8088/v30/upload/201011/YRI20101122221328_small.jpg' alt=''/>
			</a>
								<a class='highslide' href='http://localhost:8088/v30/upload/201011/HGZ20101122221339.jpg'
			onclick="return hs.expand(this, inPageOptions)" title="桂山"> 
				<img src='http://localhost:8088/v30/upload/201011/HGZ20101122221339_small.jpg' alt=''/>
			</a>
								<a class='highslide' href='http://localhost:8088/v30/upload/201011/VJJ20101122221346.jpg'
			onclick="return hs.expand(this, inPageOptions)" title="桂山"> 
				<img src='http://localhost:8088/v30/upload/201011/VJJ20101122221346_small.jpg' alt=''/>
			</a>
								<a class='highslide' href='http://localhost:8088/v30/upload/201011/QUL20101122221354.jpg'
			onclick="return hs.expand(this, inPageOptions)" title="桂山"> 
				<img src='http://localhost:8088/v30/upload/201011/QUL20101122221354_small.jpg' alt=''/>
			</a>
								<a class='highslide' href='http://localhost:8088/v30/upload/201011/QOL20101122221404.jpg'
			onclick="return hs.expand(this, inPageOptions)" title="桂山"> 
				<img src='http://localhost:8088/v30/upload/201011/QOL20101122221404_small.jpg' alt=''/>
			</a>
								<a class='highslide' href='http://localhost:8088/v30/upload/201011/BUH20101122221415.jpg'
			onclick="return hs.expand(this, inPageOptions)" title="桂山"> 
				<img src='http://localhost:8088/v30/upload/201011/BUH20101122221415_small.jpg' alt=''/>
			</a>
								<a class='highslide' href='http://localhost:8088/v30/upload/201011/WNP20101122221421.jpg'
			onclick="return hs.expand(this, inPageOptions)" title="桂山"> 
				<img src='http://localhost:8088/v30/upload/201011/WNP20101122221421_small.jpg' alt=''/>
			</a>
								<a class='highslide' href='http://localhost:8088/v30/upload/201011/VCU20101122221429.jpg'
			onclick="return hs.expand(this, inPageOptions)" title="桂山"> 
				<img src='http://localhost:8088/v30/upload/201011/VCU20101122221429_small.jpg' alt=''/>
			</a>
								<a class='highslide' href='http://localhost:8088/v30/upload/201011/ZGD20101122221437.jpg'
			onclick="return hs.expand(this, inPageOptions)" title="桂山"> 
				<img src='http://localhost:8088/v30/upload/201011/ZGD20101122221437_small.jpg' alt=''/>
			</a>
								<a class='highslide' href='http://localhost:8088/v30/upload/201011/PVQ20101122221443.jpg'
			onclick="return hs.expand(this, inPageOptions)" title="桂山"> 
				<img src='http://localhost:8088/v30/upload/201011/PVQ20101122221443_small.jpg' alt=''/>
			</a>
								<a class='highslide' href='http://localhost:8088/v30/upload/201011/CNW20101122221449.jpg'
			onclick="return hs.expand(this, inPageOptions)" title="桂山"> 
				<img src='http://localhost:8088/v30/upload/201011/CNW20101122221449_small.jpg' alt=''/>
			</a>
								<a class='highslide' href='http://localhost:8088/v30/upload/201011/KWT20101122221454.jpg'
			onclick="return hs.expand(this, inPageOptions)" title="桂山"> 
				<img src='http://localhost:8088/v30/upload/201011/KWT20101122221454_small.jpg' alt=''/>
			</a>
								<a class='highslide' href='http://localhost:8088/v30/upload/201011/JSC20101122221458.jpg'
			onclick="return hs.expand(this, inPageOptions)" title="桂山"> 
				<img src='http://localhost:8088/v30/upload/201011/JSC20101122221458_small.jpg' alt=''/>
			</a>
								<a class='highslide' href='http://localhost:8088/v30/upload/201011/YCP20101122221503.jpg'
			onclick="return hs.expand(this, inPageOptions)" title="桂山"> 
				<img src='http://localhost:8088/v30/upload/201011/YCP20101122221503_small.jpg' alt=''/>
			</a>
								<a class='highslide' href='http://localhost:8088/v30/upload/201011/HZJ20101122221507.jpg'
			onclick="return hs.expand(this, inPageOptions)" title="桂山"> 
				<img src='http://localhost:8088/v30/upload/201011/HZJ20101122221507_small.jpg' alt=''/>
			</a>
			</div> 
</div> 
	</div>
    
    <div id="footer">
		<p>Copyright &copy; 2010 傻瓜的梦工场</p>
		<p>Powered By Yorker, All Rights Reserved &nbsp;&nbsp;冀ICP备09031245号&nbsp;&nbsp;<a href="administrator" target="blank">管理员入口</a></p>		
    </div>
</div>

</body>
</html><?php } ?>