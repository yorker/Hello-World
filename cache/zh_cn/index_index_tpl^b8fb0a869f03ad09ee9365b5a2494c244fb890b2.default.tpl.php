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
    '80d621af12555aad4a71575737fd6462de587e83' => 
    array (
      0 => 'templates\\index/index.tpl',
      1 => 1298992367,
      2 => 'file',
    ),
    '12415c48b3f71109c895e2ffbdf0e2f4fa2bf3d4' => 
    array (
      0 => 'templates\\elements/userinfo.html',
      1 => 1298993119,
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

<title>首页-傻瓜的梦工场-个人空间-Speed</title>
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
		<script type="text/javascript">
$(document).ready(function() {
	var divid = 'flow_ablum';
	var timer = setInterval("flow_forward('" + divid + "')", 50);
	$("#" + divid).mouseover(function() {
		clearInterval(timer);
	});
	$("#" + divid).mouseout(function() {
		timer = setInterval("flow_forward('" + divid + "')", 50);
	});
});
//DIV滚动
var i = 0;
var left;
function flow_forward(divid) {
	var divobj = $("#"+divid);
	left = divobj.scrollLeft();
	if(left == 1) {
		flow_forward_add_cell(divid, i);
		i++;
	}	
	if(left > 0 && left%90 == 0) {		
		flow_forward_add_cell(divid, i);
		i++;
		flow_forward_delete_cell(divid);
		i--;
	}
	divobj.scrollLeft(left+1);
}

//删除第一个单元格
function flow_forward_delete_cell(divid) {
	var tableObj = document.getElementById(divid).getElementsByTagName("table")[0];
	var rowObj = tableObj.rows[0];
	if(rowObj.cells.length > 0) {
		var cellObj = rowObj.cells[0];
		var dist = $(cellObj).width();
		rowObj.deleteCell(0);
		$("#"+divid).scrollLeft(left-dist);
		left = left-dist;
	}
}

//复制第index个单元格到当列的最后
function flow_forward_add_cell(divid, index) {
	var tableObj = document.getElementById(divid).getElementsByTagName("table")[0];
	var rowObj = tableObj.rows[0];
	var tmpContent = rowObj.cells[index].innerHTML;
	var currentLength = rowObj.cells.length;
	rowObj.insertCell(currentLength);
	rowObj.cells[currentLength].innerHTML = tmpContent;
}
</script>
<div class="wrap_1 clearfix">
	<div class="column_1">
		<div class="i_wrap">			
			<div class="search">
				<form action="Index/search" method="post" onsubmit="return checkf(this)">
				<div class="fl"><input type="text" name="keyword" value="请输入检索条件" class="search_init" id="search_key" onkeyup="show_down_menu(this, 'article', 'title', 'menudown', 'search_key')" onfocus="start_to_search(this)" autocomplete="off"/>&nbsp;&nbsp;</div>
				<div class="fl"><input type="image" src="images/search.gif" /></div>	
				</form>
			</div>
			<div id="menudown" style="display:none"></div>
			<div class="blank">&nbsp;</div>
			<div class="category">
				<ul class="clearfix">
											<li><a href="Index/artcat/37">WEB开发</a></li>
											<li><a href="Index/artcat/34">WEB服务器</a></li>
											<li><a href="Index/artcat/29">译文专区</a></li>
											<li><a href="Index/artcat/27">外文翻译</a></li>
											<li><a href="Index/artcat/26">平面设计</a></li>
											<li><a href="Index/artcat/18">开源天地</a></li>
											<li><a href="Index/artcat/17">MySQL数据库</a></li>
											<li><a href="Index/artcat/16">JS&网页实现</a></li>
											<li><a href="Index/artcat/14">PHP程序设计</a></li>
											<li><a href="Index/artcat/9">Linux系统</a></li>
											<li><a href="Index/artcat/3">经典励志</a></li>
											<li><a href="Index/artcat/20">Windows相关</a></li>
											<li><a href="Index/artcat/13">JAVA程序设计</a></li>
											<li><a href="Index/artcat/32">My Diary</a></li>
												
				</ul>
			</div>
		</div>
	</div>
	<div class="column_2">
		<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><a href="http://php.net/" target="_blank"><img src="images/licon_1.gif"/></a></td>
			<td rowspan="2"><a href="http://cakephp.org" target="_blank"><img src="images/licon_2.gif"/></a></td>
		</tr>
		<tr>
			<td><a href="http://www.ubuntu.com/" target="_blank"><img src="images/licon_3.gif"/></a></td>					
		</tr>
		<tr>
			<td colspan="2"><a href="http://www.joomla.org/" target="_blank"><img src="images/licon_4.gif"/></a></td>					
		</tr>
		<tr>
			<td colspan="2"><a href="http://www.smarty.net/" target="_blank"><img src="images/licon_5.gif"/></a></td>
		</tr>
		</table>
	</div>
	<div class="column_3">
		<div class="module">
			<h2>最新文章 <span>Latest Article</span></h2>
			<div class="body">
				<ul class="list">
											<li><a href="Index/article/221" title="Log: Feburary 27, 2011">Log: Feburary 27, 2011</a></li>	
											<li><a href="Index/article/220" title="Log: Feburary 27, 2011">Log: Feburary 27, 2011</a></li>	
											<li><a href="Index/article/219" title="DooPHP快速开发框架">DooPHP快速开发框架</a></li>	
											<li><a href="Index/article/218" title="Log: Feburary 22, 2011">Log: Feburary 22, 2011</a></li>	
											<li><a href="Index/article/216" title="Log: Feburary 20, 2011">Log: Feburary 20, 2011</a></li>	
											<li><a href="Index/article/214" title="register_globals配置参数的用处">register_globals配置参数的用处</a></li>	
											<li><a href="Index/article/212" title="HTML中&lt;base&gt;标签的妙用">HTML中&lt;base&gt;标签的妙用</a></li>	
											<li><a href="Index/article/211" title="Log: Feburary 16, 2011">Log: Feburary 16, 2011</a></li>	
											<li><a href="Index/article/210" title="Log: Feburary 11, 2011">Log: Feburary 11, 2011</a></li>	
									</ul>
			</div>
		</div>
	</div>
</div>
<div class="blank">&nbsp;</div>
<div class="wrap_2 clearfix">
	<div class="column_left">
		<div class="recommend_article clearfix">
			<h2>推荐文章</h2>
			<h3><a href="Index/artcat/19">所有文章 &gt;&gt;</a></h3>
			<div class="body">
				<ul>
											<li><a href="Index/artcat/33">[Ubuntu服务器]</a>&nbsp;&nbsp;<a href="Index/article/191">Shell脚本备份与计划任务</a></li>
											<li><a href="Index/artcat/14">[PHP程序设计]</a>&nbsp;&nbsp;<a href="Index/article/187">值得推荐的几款PHP开源框架</a></li>
											<li><a href="Index/artcat/14">[PHP程序设计]</a>&nbsp;&nbsp;<a href="Index/article/183">PHP对MVC的质疑</a></li>
											<li><a href="Index/artcat/16">[JS&网页实现]</a>&nbsp;&nbsp;<a href="Index/article/95">IE和FF在JS和CSS的23处不同点</a></li>
											<li><a href="Index/artcat/14">[PHP程序设计]</a>&nbsp;&nbsp;<a href="Index/article/94">优化PHP程序的14条军规</a></li>
											<li><a href="Index/artcat/17">[MySQL数据库]</a>&nbsp;&nbsp;<a href="Index/article/91">[MySQL]IP处理函数inet_aton()和inet_ntoa()</a></li>
											<li><a href="Index/artcat/16">[JS&网页实现]</a>&nbsp;&nbsp;<a href="Index/article/86">优化HTML页面的加载</a></li>
											<li><a href="Index/artcat/14">[PHP程序设计]</a>&nbsp;&nbsp;<a href="Index/article/77">开发中很常用的正则表达式</a></li>
											<li><a href="Index/artcat/14">[PHP程序设计]</a>&nbsp;&nbsp;<a href="Index/article/76">PHP设置SESSION超时</a></li>
											<li><a href="Index/artcat/14">[PHP程序设计]</a>&nbsp;&nbsp;<a href="Index/article/74">PHP递归的删除一个文件夹</a></li>
											<li><a href="Index/artcat/9">[Linux系统]</a>&nbsp;&nbsp;<a href="Index/article/58">Linux(ubuntu) vi 常用命令集</a></li>
									</ul>
			</div>
		</div>
	</div>
	<div class="column_right">
		<div class="module">
			<h2>实用网址 <span>Utility Links</span></h2>
			<div class="body">
				<ul class="list">
											<li style="background:url(images/dot_2.jpg) no-repeat scroll 2px 50%; padding-left:23px"><a href="Index/artcat/24">开源网站</a></li>
											<li style="background:url(images/dot_2.jpg) no-repeat scroll 2px 50%; padding-left:23px"><a href="Index/artcat/22">技术教程</a></li>
											<li style="background:url(images/dot_2.jpg) no-repeat scroll 2px 50%; padding-left:23px"><a href="Index/artcat/23">技术文档</a></li>
											<li style="background:url(images/dot_2.jpg) no-repeat scroll 2px 50%; padding-left:23px"><a href="Index/artcat/25">搜索引擎</a></li>
									</li>
			</div>
		</div>
		<div class="blank">&nbsp;</div>
		<div class="module">
			<h2>下载导航 <span>Download Navigation</span></h2>
			<div class="body">
				<ul class="list">
											<li><a href="Index/dlist/30">技术文档</a></li>
											<li><a href="Index/dlist/31">技术教程</a></li>
											<li><a href="Index/dlist/33">开源组件</a></li>
											<li><a href="Index/dlist/32">常用软件</a></li>
									</ul>
			</div>
		</div>
		<div class="blank">&nbsp;</div>
		<div class="module">
			<h2>友情链接 <span>My Links</span></h2>
			<div class="body">
				<ul class="list">
											<li style="background:url(images/dot_3.gif) no-repeat scroll 2px 50%; padding-left:23px"><a href="http://www.google.com.hk" target="_blank">Google搜索</a></li>
											<li style="background:url(images/dot_3.gif) no-repeat scroll 2px 50%; padding-left:23px"><a href="http://php.net" target="_blank">PHP.NET</a></li>
											<li style="background:url(images/dot_3.gif) no-repeat scroll 2px 50%; padding-left:23px"><a href="http://www.ubuntu.com" target="_blank">Ubuntu官方网站</a></li>
									</ul>
			</div>
		</div>
	</div>
</div>
<div class="blank">&nbsp;</div>
<div class="index_ablum">
	<h2>相册</h2>
	<div class="body">
		<div id="flow_ablum">
			<table cellspacing="0" cellpadding="0" border="0">
				<tr>
											<td><a href="ablum-id-17.html" target="_blank"><img src="http://localhost:8088/v30/upload/201012/22152751qdl.jpg" border="0"/></a></td>
											<td><a href="ablum-id-16.html" target="_blank"><img src="http://localhost:8088/v30/upload/201012/22220458llx.jpg" border="0"/></a></td>
											<td><a href="ablum-id-15.html" target="_blank"><img src="http://localhost:8088/v30/upload/201012/05214947erj.jpg" border="0"/></a></td>
											<td><a href="ablum-id-14.html" target="_blank"><img src="http://localhost:8088/v30/upload/201011/27225052gmy.jpg" border="0"/></a></td>
											<td><a href="ablum-id-13.html" target="_blank"><img src="http://localhost:8088/v30/upload/201011/27181940cvq.jpg" border="0"/></a></td>
											<td><a href="ablum-id-7.html" target="_blank"><img src="http://localhost:8088/v30/upload/201012/17170401mwt.jpg" border="0"/></a></td>
											<td><a href="ablum-id-8.html" target="_blank"><img src="http://localhost:8088/v30/upload/201012/17170432dfn.jpg" border="0"/></a></td>
											<td><a href="ablum-id-9.html" target="_blank"><img src="http://localhost:8088/v30/upload/201011/23092921njv.jpg" border="0"/></a></td>
											<td><a href="ablum-id-10.html" target="_blank"><img src="http://localhost:8088/v30/upload/201011/23092942vvv.jpg" border="0"/></a></td>
											<td><a href="ablum-id-11.html" target="_blank"><img src="http://localhost:8088/v30/upload/201011/23093001ecs.jpg" border="0"/></a></td>
											<td><a href="ablum-id-12.html" target="_blank"><img src="http://localhost:8088/v30/upload/201011/23140845uyb.jpg" border="0"/></a></td>
									</tr>
			</table>
		</div>
	</div>
</div>	</div>
    
    <div id="footer">
		<p>Copyright &copy; 2010 傻瓜的梦工场</p>
		<p>Powered By Yorker, All Rights Reserved &nbsp;&nbsp;冀ICP备09031245号&nbsp;&nbsp;<a href="administrator" target="blank">管理员入口</a></p>		
    </div>
</div>

</body>
</html><?php } ?>