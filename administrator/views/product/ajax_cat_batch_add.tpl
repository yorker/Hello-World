<script type="text/javascript">
//ajax提交数据请求

function batch_add_product(fobj, url) {
	 if(!checkForm(fobj)) {
		 return false;
	 }
	 var datas = getDatas(fobj);

	 $.ajax({
		type: 'post',
		url: fobj.action,
		data: datas,
		success: function(msg) {
			msg = $.trim(msg);
			if(/ok-/.test(msg)) {
				showMsgByDiv(lang_op_success);
				if(url) {
					loadPage(url);
				} else {
					//认为是商品添加页发起的请求
					var arr = msg.split('-');
					$.ajax({
						type: 'get',
						url: 'dispatcher.php?disp=product/ajaxGetProductCatStruct&id='+arr[1],
						success: function(cnt) {
							$("#cat_id").html(cnt);
						}
					});
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
<form action="<{app_url url='product/ajaxCatBatchAdd?do=add'}>" method="post" onsubmit="return batch_add_product(this, '<{if !$is_dynamic}><{app_url url='product/listProductCat'}><{/if}>')">
	<div class="adminform">
		<div class="f_title"><{$lang.batch_add_cat}></div>
		
		<{text label=$lang.name name="wrt_cat_name" value="" required="true" size="m" note=$lang.please_use_end_separate}>
		
		<{select label=$lang.parent_cat name="wrt_parent_id" value=$format_product required="true"}>
		
		<{text label=$lang.ordering name="wrt_ordering" value="50" required="true" size="s"}>
		
		<{select label=$lang.published name="wrt_published" value=$alternative required="true"}>
		
		<{radio label=$lang.terminal name="wrt_is_terminal" value=$alternative checked=1}>
		
		<{submit value=$lang.submit}>
	</div>
</form>