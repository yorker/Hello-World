<style type="text/css">
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
		obj.innerHTML = '[<{$lang.save}>]';
		document.getElementById('cachedata').focus();
	} else {
		//保存数据逻辑
		var values = document.getElementById('cachedata').value;		
		$.ajax({
			type: 'post',
			url: '<{app_url url="ajax/saveCacheData"}>',
			data: 'type=<{$type}>&targetid=<{$targetid}>&values=' + values,
			success: function(msg) {
				if(/\|/.test(msg)) {
					document.getElementById('cachedata_cnt').innerHTML = msg;
					targetobj.style.display = 'none';
					obj.innerHTML = '[<{$lang.set}>]';
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
	<div class="tit"><a href="javascript:void(0)" onclick="showaddcache(this, 'cachedata_modify')" class="op_set_save">[<{$lang.set}>]</a></div>
	
	<div id="cachedata_cnt"><{$data}></div>
	
	<div id="cachedata_modify" style="display:none">
		<textarea id="cachedata" name="cachedata"><{$data1}></textarea>
		<div class="comment"><{$lang.please_separate_by_comma}></div>
	</div>
</div>