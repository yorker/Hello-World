<form action="<{app_url url='system/sysWriteAdmin'}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{if $edit.admin_id>0}><{app_url url='system/sysAdminList'}><{else}><{app_url url='system/sysWriteAdmin'}><{/if}>')">
<div class="adminform">
	<div class="f_title"><{$head_top.title}></div>
	<{if $edit.admin_id>0}>
		<!--管理员用户名-->
		<{label label=$lang.username value=$edit.admin_name}>
	
		<!--修改管理员密码-->
		<{text label=$lang.password type="password" name="wrt_password" value='' id="password"}>
		
		<!--修改管理员确认密码-->
		<{text label=$lang.confirm_password type="password" name="confirm_password" value='' cnf_id="password"}>
	<{else}>
		<!--管理员用户名-->
	<{text label=$lang.username name="wrt_admin_name" value=$edit.admin_name required="true" unique="admin" style="ime-mode:disabled"}>
	
		<!--管理员密码-->
		<{text label=$lang.password type="password" name="wrt_password" value='' id="password" required="true" size="m"}>
		
		<!--管理员确认密码-->
		<{text label=$lang.confirm_password type="password" name="confirm_password" value='' required="true" cnf_id="password"}>
	<{/if}>
	
	
	<!--管理员电子邮箱-->
	<{text label=$lang.email name="wrt_email" value=$edit.email required="true" datatype="EMAIL" style="ime-mode:disabled"}>
	
	<!--管理员类型-->
	<{select label=$lang.type name="wrt_admin_rank" value=$admin_rank selected=$edit.admin_rank}>
	
	<!-- 是否启用 -->
	<{select label=$lang.available name="wrt_is_available" value=$is_available selected=$edit.is_available}>
	
	<{if $edit.admin_id>0}><input type="hidden" value="<{$edit.admin_id}>" name="wrt_id"/><{/if}>
	
	<!--提交-->
	<{submit name="submit" value=$lang.submit back_url='system/sysAdminList'|app_url}>
</div>
</form>