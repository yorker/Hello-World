<script type="text/javascript">
//ajax
function batch_add_product(fobj, url) {
	 if(!checkForm(fobj)) {
		 return false;
	 }
	 datas = getDatas(fobj);

	 $.ajax({
		type: 'post',
		url: fobj.action,
		data: datas,
		success: function(msg) {
			msg = $.trim(msg);
			if(msg == 'ok') {
				showMsgByDiv(lang_op_success);
				if(url) {
					loadPage(url);
				}
				closeAjaxWin();
			} else {				
				showMsgByDiv(msg, 1);				
			}
		}
	 });
	 return false;
}
</script>
<form action="<{app_url url='article/writeBatchCategory?do=add'}>" method="post" onsubmit="return batch_add_product(this, '<{app_url url='article/listCategory'}>')">
	<div class="adminform">
		<div class="f_title"><{$lang.batch_add_cat}></div>
		
		<{text label=$lang.name name="wrt_cat_name" value="" required="true" size="m" note=$lang.please_use_end_separate}>
		
		<{select label=$lang.parent_cat name="wrt_parent_id" value=$format_article required="true"}>
		
		<{text label=$lang.ordering name="wrt_ordering" value="50" required="true" size="s"}>
		
		<{radio label=$lang.terminal name="wrt_is_terminal" value=$alternative checked=1}>
		
		<{submit value=$lang.submit}>
	</div>
</form>