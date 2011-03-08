<?php /* Smarty version Smarty-3.0.7, created on 2011-02-27 21:22:08
         compiled from "D:\www\v30\administrator\views\ajax/cachedata.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169084d6a5000e44e67-62703738%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a53b510a753452321daf680605d9e9653bc5e208' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\ajax/cachedata.tpl',
      1 => 1298812920,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169084d6a5000e44e67-62703738',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
?><style type="text/css">
div.cache_wrap {
	padding:6px 0px;
}

div.cache_wrap div.tit {
	text-align:right;
	border-bottom:1px dashed #CCCCCC;
	padding-bottom:4px;
	font-size:13px;
}
div.cache_wrap div.tit a.op_set_save {
	font-weight:bold;
}
div.cache_wrap #cachedata_cnt {
}

div.cache_wrap #cachedata_modify {
	padding:6px 2px;	
}

div.cache_wrap #cachedata_modify textarea {
	border:1px dashed #CCCCCC;
	width:97%;
	height:45px;
	font-size:12px;
}
div.cache_wrap #cachedata_modify div.comment {	
	color:#777777;
}

</style>
<script type="text/javascript">
function showaddcache(obj, cache_modify_id) {
	var targetobj = document.getElementById(cache_modify_id);	
	if(targetobj.style.display == 'none') {
		targetobj.style.display = 'block';
		obj.innerHTML = '[<?php echo $_smarty_tpl->getVariable('lang')->value['save'];?>
]';
		document.getElementById('cachedata').focus();
	} else {
		//保存数据逻辑
		var values = document.getElementById('cachedata').value;		
		$.ajax({
			type: 'post',
			url: '<?php echo smarty_function_app_url(array('url'=>"ajax/saveCacheData"),$_smarty_tpl);?>
',
			data: 'type=<?php echo $_smarty_tpl->getVariable('type')->value;?>
&targetid=<?php echo $_smarty_tpl->getVariable('targetid')->value;?>
&values=' + values,
			success: function(msg) {
				if(/\|/.test(msg)) {
					document.getElementById('cachedata_cnt').innerHTML = msg;
					targetobj.style.display = 'none';
					obj.innerHTML = '[<?php echo $_smarty_tpl->getVariable('lang')->value['set'];?>
]';
				} else {
					alert(msg);
				}				
			}
		});
	}
}
function choose(obj, targetid) {
	document.getElementById(targetid).value = obj.innerHTML;
	closeAjaxWin();
}
</script>
<div class="cache_wrap">
	<div class="tit"><a href="javascript:void(0)" onclick="showaddcache(this, 'cachedata_modify')" class="op_set_save">[<?php echo $_smarty_tpl->getVariable('lang')->value['set'];?>
]</a></div>
	
	<div id="cachedata_cnt"><?php echo $_smarty_tpl->getVariable('data')->value;?>
</div>
	
	<div id="cachedata_modify" style="display:none">
		<textarea id="cachedata" name="cachedata"><?php echo $_smarty_tpl->getVariable('data1')->value;?>
</textarea>
		<div class="comment"><?php echo $_smarty_tpl->getVariable('lang')->value['please_separate_by_comma'];?>
</div>
	</div>
</div>