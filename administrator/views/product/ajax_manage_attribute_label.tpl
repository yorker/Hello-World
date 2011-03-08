<style type="text/css">
p.manage_label {
	line-height:25px;
}
p.manage_label label * {
	vertical-align:middle;
}
</style>

<script type="text/javascript">
function delete_label(fobj) {
	if(checkCheckbox(fobj.label_ids)) {
		if(!confirm('<{$lang.confirm_delete}>')) {
			return false;
		}
		var datas = getDatas(fobj);
		$.ajax({
			type: 'post',
			url: fobj.action,
			data: datas,
			success: function(msg){
				msg = $.trim(msg);
				if(msg == 'ok') {
					showMsgByDiv('<{$lang.operation_success}>');
					closeAjaxWin();
				} else {
					showMsgByDiv(msg, 1);
				}
			}
		});
	} else {
		alert('<{$lang.please_choose_the_op_item}>');
	}	
	return false;
}
</script>

<form action="<{app_url url='product/ajaxManageAttributeLabel?do=del'}>" method="post" onsubmit="return delete_label(this)">
	<p class="manage_label">
	<{foreach $list as $itm}>
		<label><input type="checkbox" name="label_ids" value="<{$itm.label_id}>"/><span><{$itm.label_name}></span></label> &nbsp; &nbsp;
	<{/foreach}>
	</p>
	<div class="blank">&nbsp;</div>
	<p><input type="submit" name="" value="<{$lang.delete}>" class="btn"/></p>
</form>
