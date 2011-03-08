<form action="<{app_url url='advertisement/writeFlashAds'}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{if $edit.id>''}><{app_url url='advertisement/listFlashAds'}><{else}><{app_url url='advertisement/writeFlashAds'}><{/if}>')">

<div class="adminform">
	<div class="f_title"><{$head_top.title}></div>
	<!--标题-->
	<{text label=$lang.title name="wrt_title" size="l" value=$edit.title}>
	
	<!--上传图片-->
	<{upload label=$lang.flash_ads_image name="wrt_image" required="true" thumb_width=$flash_size.0 thumb_height=$flash_size.1 value=$edit.image note=$flash_size_note|pcat:"Width(px)*Height(px) : "}>
	
	<!--链接-->
	<{text label=$lang.link name="wrt_link" required="true" size="l" value=$edit.link}>	
	
	<!--排序-->
	<{text label=$lang.ordering name="wrt_ordering" size="s" required="true" value=$edit.ordering|default:50 datatype="NUMERIC"}>
	
	<{if $edit.id>''}>
		<input type="hidden" name="wrt_id" value="<{$edit.id}>"/>
	<{/if}>
	<{submit name="submit" value=$lang.submit back_url='advertisement/listFlashAds'}>
	
</div>

</form>