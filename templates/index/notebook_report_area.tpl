<script type="text/javascript">
$(document).ready(function() {	
	addEditor('message', ['emoticons']);
});

</script>
<a name="reply"></a>
<form action="<{app_url url='Index/notebook'}>" method="post" onsubmit="return notebook_submit_report(this)">
	<div class="comm_submit_block">
		<h2><{$lang.report_leaveword}></h2>
		<div class="blank">&nbsp;</div>		
		<div class="line clearfix">
			<div class="key"><{$lang.nickname}></div>
			<div class="cnt">
				<input type="text" name="nickname" value="<{$smarty.session.user.alias}>" />
				<span id="reply_tip"></span>
			</div>
		</div>
		<div class="line clearfix">
			<div class="key"><{$lang.content}></div>
			<div class="cnt"><textarea name="message" required="true" msg="<{$lang.content}><{$lang.is_required}>" id="message" style="width:480px; height:120px;"></textarea></div>
		</div>
		<div class="line clearfix">
			<div class="key"><{$lang.captcha}></div>
			<div class="cnt">
				<input type="text" name="vcode" value="" class="init" size="8" required="true" msg="<{$lang.captcha}><{$lang.is_required}>" autocomplete="off" onkeyup="chupper(this)" style="ime-mode:disabled"/>&nbsp;
				<img border="0" src="validate.php?_t=<{$smarty.now}>" id="validate_image" class="pointer" onclick="re_captcha(this)" title="<{$lang.change_one_captcha}>"/>
			</div>
		</div>		
		<div class="line clearfix">
			<div class="key">&nbsp;</div>
			<div class="cnt">
				<input type="hidden" name="parent_id" value="" id="parent_id"/>
				<input type="submit" name="submit" value="<{$lang.submit}>" class="btn"/>
			</div>
		</div>
	</div>
</form>