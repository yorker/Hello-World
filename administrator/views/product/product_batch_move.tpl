<script type="text/javascript">
function doMoveSubmit(fobj, reurl) {
	if(empty(fobj.cat_id.value)) {
		alert('<{$lang.not_empty}><{$lang.category}>');
		return false;
	}
	var data = 'cat_id='+fobj.cat_id.value;
	
	var checked = $(".chkflag:checked");
	var len = checked.length;
	if(len == 0) {
		alert('<{$lang.please_choose_the_operation_option}>');
		return false;
	}
	var tmp = '';
	for(var i = 0; i < len; i++) {
		if(tmp) {
			tmp += '_' + checked.eq(i).val();
		} else {
			tmp += checked.eq(i).val();
		}
	}
	data += '&ids=' + tmp;	
	$.ajax({
		type: 'post',
		url: fobj.action,
		data: data,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok') {
				loadPage(reurl,1);
				showMsgByDiv('<{$lang.operation_success}>');
			} else {
				showMsgByDiv(msg);
			}			
		}
	});
	closeAjaxWin();
	return false;
}
</script>
<form action="<{app_url url='product/listProduct?act=batch_move&do=move'}>" method="post" onsubmit="return doMoveSubmit(this, '<{app_url url='product/listProduct'}>')">
	<div class="adminform">
		<div class="f_title"><{$lang.move_to}></div>
		<div class="line clearfix">
			<div class="f1"><{$lang.category}></div>
			<div class="f2">
				<select name="cat_id">
					<{$catopt}>
				</select>
			</div>
		</div>
		<{submit value=$lang.submit}>
	</div>
</form>