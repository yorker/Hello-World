<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<{$smarty.const.ROOT_URL}>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="<{$seo_description|default:$lang.site_description}>" name="description" />
<meta content="<{$seo_keywords|default:$lang.site_keyword}>" name="keywords"/>
<meta content="<{$lang.site_name}>" name="author"/>
<meta content="<{$lang.copyright}>" name="copyright"/>
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

<title><{$page_title}><{$lang.page_title_postfix}></title>
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
				<li><a href="<{$nav_index_link}>"><{$lang.index}></a></li>
				<li><a href="<{$nav_art_link}>"><{$lang.article}></a></li>	
				<li><a href="<{$nav_ablumlist_link}>"><{$lang.ablum}></a></li>	
				<li><a href="<{$nav_download_link}>"><{$lang.download}></a></li>
				<li><a href="<{$nav_notebook_link}>"><{$lang.leaveword}></a></li>
				<li>&nbsp;</li>
			</ul>
			<div class="userinfo clearfix">
				<{insert name="userinfo"}>
			</div>
		</div>
    </div></div></div>
    
    <div id="content">
		<{include file=$main_tpl_identified}>
	</div>
    
    <div id="footer">
		<p><{$lang.copyright}></p>
		<p><{$lang.foot_desc}>&nbsp;&nbsp;冀ICP备09031245号&nbsp;&nbsp;<a href="administrator" target="blank"><{$lang.manager_entrance}></a></p>		
    </div>
</div>

</body>
</html>