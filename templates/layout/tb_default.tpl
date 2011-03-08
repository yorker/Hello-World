<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<{$smarty.const.ROOT_URL}>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/common.css" rel="stylesheet" type="text/css"/>
<link href="css/tb_style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/base.js"></script>
<script type="text/javascript" src="js/site.js"></script>

<title><{$page_title}></title>
</head>
<body>
<div id="container">
	<div id="header">
		>> <{$page_title}>
	</div>
	<div id="content">
        <{include file=$main_tpl_identified}>
	</div>
	<div id="footer">
	</div>
</div>
</body>
</html>