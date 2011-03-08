<script type="text/javascript">
$(document).ready(function() {
	pagination('<{app_url url='system/sysNotepadPage'}>');
	addEditor('content', ['source', 'fontname', 'fontsize', 'textcolor', 'bold', 'italic', 'underline']);
	setTimeout("KE.create('content')", 10);
});

</script>

<div id="pagination_show"></div>
<a name="nform"></a>
<form action="<{app_url url='system/sysNotepad'}>" method="post" onsubmit="return saveNotepad(this, KE, '<{app_url url='system/sysNotepadPage'}>')" id="nform1">
<div class="adminform">
	<div class="f_title"><{$lang.add_edit_notepad}></div>
	<{text name="title" value="" style="width:492px" label=$lang.title}>
	<{textarea name="content" id="content" label=$lang.content width="500px" height="150px" value=""}>
	<{checkbox name="is_urgency" value=$is_urgency label=$lang.status}>
	<input name="id" type="hidden" value=""/>
	<{submit value=$lang.submit}>
</div>
</form>