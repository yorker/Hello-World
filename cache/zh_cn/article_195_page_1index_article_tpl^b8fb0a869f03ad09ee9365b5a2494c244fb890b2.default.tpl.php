<?php /*%%SmartyHeaderCode:14024d6d9596a21d02-07928543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8fb0a869f03ad09ee9365b5a2494c244fb890b2' => 
    array (
      0 => 'templates\\layout/default.tpl',
      1 => 1298986696,
      2 => 'file',
    ),
    'c18ccbfb1dbc21d796baf43b40c880bbd2f1858f' => 
    array (
      0 => 'templates\\index/article.tpl',
      1 => 1298986168,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14024d6d9596a21d02-07928543',
  'has_nocache_code' => true,
  'cache_lifetime' => '3600',
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!$no_render) {?><?php if (!is_callable('smarty_insert_userinfo')) include 'D:\www\v30\plugins\insert.userinfo.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://localhost:8088/v30/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="Ubuntu的开发人员作出了一个谨慎的决定，那就是在安装Ubuntu所有版本的系统时，默认情况下禁用管理员root帐户。这并不意味着root帐户已经被删除或不可被访问。它只不过是被赋予了一个特殊的密码，这个密码无法匹配任何一个加密值。因此，使得root帐户无法直接进行登录。" name="description" />
<meta content="管理员,用户,帐户,root,ubuntu" name="keywords"/>
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

<title>用户管理--有关root帐户-Ubuntu服务器-译文专区-文章-傻瓜的梦工场-个人空间-Speed</title>
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
		<div id="nav_position"><ul class="clearfix"><li><a href="index.html">首页</a></li><li>&gt;&gt;</li><li><a href="Index/artcat/19">文章</a></li><li>&gt;&gt;</li><li><a href="Index/artcat/29">译文专区</a></li><li>&gt;&gt;</li><li><a href="Index/artcat/33">Ubuntu服务器</a></li><li>&gt;&gt;</li><li class="last">用户管理--有关root帐户</li></lu></div>

<div class="art_detail_wrap">
	<h2>用户管理--有关root帐户</h2>
	<table class="info" cellspacing="0" cellpadding="0">
		<tr>
			<td>更新时间: 2011-01-09</td>
			<td align="center">来源: dev-yorker.cn</td>
			<td align="center">浏览: 32</td>
			<td align="center">作者/译: Yorker</td>
		</tr>
	</table>
	<div class="blank">&nbsp;</div>
	<div class="art_description">Ubuntu的开发人员作出了一个谨慎的决定，那就是在安装Ubuntu所有版本的系统时，默认情况下禁用管理员root帐户。这并不意味着root帐户已经被删除或不可被访问。它只不过是被赋予了一个特殊的密码，这个密码无法匹配任何一个加密值。因此，使得root帐户无法直接进行登录。</div>
	<div class="art_body"><p>　　Ubuntu的开发人员作出了一个谨慎的决定，那就是在安装Ubuntu所有版本的系统时，默认情况下禁用管理员root帐户。这并不意味着root帐户已经被删除或不可被访问。它只不过是被赋予了一个特殊的密码，这个密码无法匹配任何一个加密值。因此，使得root帐户无法直接进行登录。</p>
<p>　　取而代之的是，用户被鼓励使用一个叫做sudo的工具来完成系统管理员的职责。sudo允许一个授权用户使用它们自己的密码（而不必知道root帐户的密码）临时提升其权限。</p>
<p>　　--如果因为某些原因，你想要启用root帐户，你仅仅需要做的，就是给root帐户一个密码：<br />
　　<span style="color:#d40a00;">sudo passwd</span></p>
<p>　　Sudo将会提示你输入你的密码，然后询问你为root帐户提供一个新密码，其过程如下：<br />
　　[sudo] password for username: (enter your own password)<br />
　　Enter new Unix password: (enter a new password for root)<br />
　　Retype new Unix password: (repeat new password for root)<br />
　　passwd: password updated successfully</p>
<p>　　--如果要禁用root帐户，可以使用以下的passwd命令形式：<br />
　　<span style="color:#d40a00;">sudo passwd -l root</span></p>
<p>　　通过检出sudo的手册页面，你可以阅读更多关于sudo的信息：<br />
　　man sudo</p>
<p>　　默认情况下，Ubuntu安装时的初始化帐户是"admin"组的一个成员，它作为一个授权sudo用户被添加到了/etc/sudoers文件中。如果你想要让其它的帐户通过sudo来获取root同样的操作权限，只需要将它们添加到admin组中即可。</p></div>
	
	
	<div class="art_relative clearfix">
		<div class="prev"><a href="Index/article/194" title="远程控制--OpenSSH">上一篇</a></div>
		<div class="next"><a href="Index/article/196" title="用户管理--添加和删除用户">下一篇</a></div>
	</div>
</div>	</div>
    
    <div id="footer">
		<p>Copyright &copy; 2010 傻瓜的梦工场</p>
		<p>Powered By Yorker, All Rights Reserved &nbsp;&nbsp;冀ICP备09031245号&nbsp;&nbsp;<a href="administrator" target="blank">管理员入口</a></p>		
    </div>
</div>

</body>
</html><?php } ?>