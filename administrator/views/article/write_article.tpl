<script type="text/javascript">
$(document).ready(function() {
	addEditor('content');	
	setTimeout("tmp()", 100);
});
function tmp(){
	var v = '<{$edit.content|escape:'javascript'}>';
	KE.insertHtml('content', v);
}
</script>

<form action="<{app_url url='article/writeArticle'}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{if $cat_id>0}><{app_url url='article/listArticle?cat_id='|cat:$cat_id}><{else}><{app_url url='article/listArticle'}><{/if}>');">
<div class="tab_list">
	<div class="tabs">
		<label class="tab_current" onclick="tab(this, 'tab_current')"><{$lang.basic_info}></label>
		<label onclick="tab(this, 'tab_current')"><{$lang.article_content}></label>
	</div>
	<ul>
		<li style="display:block">		
			<div class="adminform">
				<div class="f_title"><{$lang.basic_info}></div>
				<{text label=$lang.title id="art_title" name="wrt_title" value=$edit.title|default:"" required="true" size="l"}>				
				<div class="line clearfix">
					<div class="f1"><{$lang.belong_cat}></div>
					<div class="f2">
						<select name="wrt_cat_id" onchange="checkSingle(this)" required="true" msg="<{$lang.not_empty}><{$lang.belong_cat}>">
							<{$catopt}>
						</select>
					</div>
					<div class="f3">
						<span class="red">*</span>
						<span class="tip"></span>
					</div>
				</div>
             <{text label=$lang.article_source name="wrt_source" id="cache_source" value=$edit.source cachedata=1}>
				<{text label=$lang.author name="wrt_author" id="cache_author" value=$edit.author cachedata=1}>
				
				<{upload label=$lang.cover_img name="wrt_cover_img" value=$edit.cover_img thumb_width=$thumb.0 thumb_height=$thumb.1}>
				
				<{text label=$lang.out_link name="wrt_link" value=$edit.link note=$lang.out_link_note size="l"}>
				<{select label=$lang.open_type name="wrt_open_type" value=$link_open_type selected=$edit.open_type}>
				<{select label=$lang.published name="wrt_published" value=$published selected=$edit.published}>
				<div class="line clearfix">
					<div class="f1"><{$lang.mix_option}></div>
					<div class="f2">
						<{$lang.set_top}> <input type="checkbox" name="wrt_is_top" value="1" <{if $edit.is_top==1}>checked<{/if}>/> &nbsp;&nbsp;
						<{$lang.set_hot}> <input type="checkbox" name="wrt_is_hot" value="1" <{if $edit.is_hot==1}>checked<{/if}>/> &nbsp;&nbsp;
						<{$lang.set_commend}> <input type="checkbox" name="wrt_is_commended" value="1" <{if $edit.is_commended==1}>checked<{/if}>/>
					</div>
				</div>
				<{text label=$lang.ordering name="wrt_ordering" value=$edit.ordering|default:"50" datatype="NUMERIC" size="s"}>
				<{text label=$lang.keywords name="wrt_keywords" value=$edit.keywords size="l"}>
				<{textarea label=$lang.description name="wrt_description" value=$edit.description width="500px" height="120px"}>
			</div>
		</li>
		<li style="display:none">
			<div class="adminform">
				<div class="f_title"><{$lang.article_content}></div>				
				<textarea id="content" name="wrt_content" style="width:99%; height:500px"></textarea>
				<{gettags label=$lang.tag name="wrt_tags" value=$edit.tags subid="art_title" msgid="content"}>
			</div>
		</li>
	<ul>
	<div class="spe_submit">
		<{if $edit.article_id>0}><input type="hidden" value="<{$edit.article_id}>" name="wrt_id"/><{/if}>
		<input type="submit" name="submit" value="<{$lang.submit}>" class="btn"/>&nbsp;
		<input type="button" name="back" value="<{$lang.back}>" class="btn" onclick="loadPage('<{app_url url='article/listArticle'}>', 1)"/>
	</div>
</div>
</form>