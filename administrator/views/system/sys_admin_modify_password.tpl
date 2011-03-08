<form action="<{app_url url='system/sysAdminModifyPassword'}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{app_url url='system/sysStart'}>')">
<div class="adminform">
	<div class="f_title"><{$lang.modify_password}></div>
	
	<{text type="password" name="old_password" value="" label=$lang.old_password}>
	
	<{text type="password" name="new_password" value="" label=$lang.new_password}>
	
	<{text type="password" name="confirm_password" value="" label=$lang.confirm_password}>
	
	<{submit name="submit" value=$lang.submit}>
</div>
</form>