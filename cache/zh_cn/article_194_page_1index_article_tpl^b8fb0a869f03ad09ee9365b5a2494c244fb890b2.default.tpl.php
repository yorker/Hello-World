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
<meta content="OpenSSH介绍
　　本篇介绍Linux（以Ubuntu为例）上一个非常强大的远程控制工具--OpenSSH。在这里，你将会了解到OpenSSH服务的一些配置以及你如何在你的Ubuntu系统中修改它们。" name="description" />
<meta content="远程控制,计算机,SSH,Ubuntu,工具" name="keywords"/>
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

<title>远程控制--OpenSSH-Ubuntu服务器-译文专区-文章-傻瓜的梦工场-个人空间-Speed</title>
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
		<div id="nav_position"><ul class="clearfix"><li><a href="index.html">首页</a></li><li>&gt;&gt;</li><li><a href="Index/artcat/19">文章</a></li><li>&gt;&gt;</li><li><a href="Index/artcat/29">译文专区</a></li><li>&gt;&gt;</li><li><a href="Index/artcat/33">Ubuntu服务器</a></li><li>&gt;&gt;</li><li class="last">远程控制--OpenSSH</li></lu></div>

<div class="art_detail_wrap">
	<h2>远程控制--OpenSSH</h2>
	<table class="info" cellspacing="0" cellpadding="0">
		<tr>
			<td>更新时间: 2011-01-08</td>
			<td align="center">来源: dev-yorker.cn</td>
			<td align="center">浏览: 72</td>
			<td align="center">作者/译: Yorker</td>
		</tr>
	</table>
	<div class="blank">&nbsp;</div>
	<div class="art_description">OpenSSH介绍
　　本篇介绍Linux（以Ubuntu为例）上一个非常强大的远程控制工具--OpenSSH。在这里，你将会了解到OpenSSH服务的一些配置以及你如何在你的Ubuntu系统中修改它们。</div>
	<div class="art_body"><p><strong>OpenSSH介绍</strong></p>
<p>　　本篇介绍Linux（以Ubuntu为例）上一个非常强大的远程控制工具--OpenSSH。在这里，你将会了解到OpenSSH服务的一些配置以及你如何在你的Ubuntu系统中修改它们。</p>
<p>　　OpenSSH是SSH（Secure Shell）协议家族中一个免费可用的版本。它可以远程控制一台计算机以及在不同的计算机之间传输文件。传统的工具也可以完成这些功能（比如像Telnet或者rcp），但是由于它们是以明文的方式传输用户的密码而显得极不安全。OpenSSH提供了一个服务器守护进程和一些客户端工具，使用加密的远程控制和文件传输方式，提高了安全性，有效的取代了原始的工具。</p>
<p>　　OpenSSH服务组件（sshd）会从任何的客户端工具中持续的监听用户连接。当一个连接请求发生时，sshd会根据客户端的工具类型设置一个正确的连接。比如：如果远程计算机要连接ssh客户端应用程序，在通过认证以后，OpenSSH服务器会建立一个远程会话。如果一个远程用户使用scp连接到OpenSSH服务器，OpenSSH服务器的守护进程会在通过认证以后，在服务器和客户端之间初始化一个文件的安全拷贝。OpenSSH支持多种认证方法，包括原始的密码认证、公钥等。</p>
<p><strong>安装</strong></p>
<p>　　安装OpenSSH客户端和服务器应用程序非常的简单。在Ubunut系统中安装OpenSSH客户端应用程序，可以在命令提示符下输入：</p>
<p>　　<span style="color:#d40a00;">sudo apt-get install openssh-client</span></p>
<p>　　安装OpenSSH服务器应用程序，以及相关的支持文件，则可以在命令提示符下输入：</p>
<p>　　<span style="color:#d40a00;">sudo apt-get install openssh-server</span></p>
<p>　　OpenSSH服务器应用程序也可以在Ubuntu服务器版本系统的安装过程中选择安装。</p>
<p><strong>配置</strong></p>
<p>　　你可以通过编辑文件/etc/ssh/sshd_config来配置OpenSSH服务器应用程序--sshd的默认行为。在该文件中有关配置指令的详细信息，你可以通过下面的命令查看相应的手册。</p>
<p>　　man sshd_config</p>
<p>　　在OpenSSH配置文件中有许多的指令来控制会话设置和认证模式。以下配置指令可以通过/etc/ssh/sshd_config配置文件来改变。</p>
<p>　　<strong>注意：</strong><u>在编辑配置文件以前，你应该先备份原始的文件以免由于修改不当引起的不必要麻烦。</u></p>
<p>　　你可以对以下的指令进行修改：</p>
<p>　　-设置OpenSSH的TCP监听端口，可以将以前的22号端口修改为2323号端口<br />
　　<span style="color:#d40a00;">Port 2323</span></p>
<p>　　-让sshd允许基于公钥的登录，简单的添加或者修改以下的行<br />
　　<span style="color:#d40a00;">PubkeyAuthentication yes</span></p>
<p>　　-只允许某一个组登录SSH，简单的添加或修改以下的行<br />
　　<span style="color:#d40a00;">AllowGroups groupname</span></p>
<p>　　-当登录时，让OpenSSH显示/etc/issue.net文件的内容，简单的添加或者修改以下的行<br />
　　<span style="color:#d40a00;">Banner /etc/issue.net</span></p>
<p>　　编辑完成/etc/ssh/sshd_config文件以后，保存文件并且重启sshd服务器，以便让修改的配置生效。在命令提示符下输入以下的命令重启sshd<br />
　　<span style="color:#d40a00;">sudo /etc/init.d/ssh restart</span></p>
<p>　　<strong>注意：</strong>你也可以使用其它的指令来改变服务器的行为以适应你的实际需要。尽管如此，如果你访问一台服务器的唯途径就是SSH，在这种情况下，如果你误修改了SSH的配置文件，你将会发现，当你重启SSH时，你被锁在了服务器外面（SSH重启失败停止服务）。所以，当你远程编辑文件/etc/ssh/sshd_config的时候，一定要格外的小心。</p>
<p></div>
	<div id="pagination"><span class="number"><strong>[1]</strong></span><span class="number"><a href="Index/article/194?page=2">[2]</a></span><span class="next"><a href="Index/article/194?page=2">&nbsp;</a></span><span class="last"><a href="Index/article/194?page=2">&nbsp;</a></span>&nbsp;&nbsp;&nbsp;共2页（1-1/2）</div>
	
	<div class="art_relative clearfix">
		<div class="prev"><a href="Index/article/191" title="Shell脚本备份与计划任务">上一篇</a></div>
		<div class="next"><a href="Index/article/195" title="用户管理--有关root帐户">下一篇</a></div>
	</div>
</div>	</div>
    
    <div id="footer">
		<p>Copyright &copy; 2010 傻瓜的梦工场</p>
		<p>Powered By Yorker, All Rights Reserved &nbsp;&nbsp;冀ICP备09031245号&nbsp;&nbsp;<a href="administrator" target="blank">管理员入口</a></p>		
    </div>
</div>

</body>
</html><?php } ?>