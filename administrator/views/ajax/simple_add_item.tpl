<script type="text/javascript">
function ajax_add_item(fobj) {
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
                var arr = msg.split('-');
                var last_id = parseInt(arr[1]);
                
                //重新加载商品品牌在添加商品页中。
                $.ajax({
                    type: 'get',
                    url: 'dispatcher.php?disp=ajax/ajaxGetCurOption&id='+last_id+'&t=<{$table}>&f=<{$field}>',
                    success: function(cnt) {
                        $("#<{$select_id}>").html(cnt);
                    }
                });
                closeAjaxWin();
            } else {
                showMsgByDiv(msg, 1);
            }
        }
    });
    return false;
}
</script>
<form action="<{app_url url='ajax/simpleAddItem'}>" method="post" onsubmit="return ajax_add_item(this)">
    <div class="adminform">
        <div class="f_title"><{$lang.add}><{if $title}> - <{$title}><{/if}></div>
        <{text label=$lang.name name="wrt_"|cat:$field value="" required="true" unique=$table}>
        <input type="hidden" name="table" value="<{$table}>"/>
		<input type="hidden" name="field" value="<{$field}>"/>
        <{submit value=$lang.submit}>
    </div>    
</form>