<div class="doc0" style="margin-left:4px;" id="doc0">	
	<div class="doctopic_open" onclick="triggerTopic(this)"><{$lang.back_title}></div>
    <{*Top Category*}>
	<{foreach from=$top_menu item="val" name="fname"}>
		<{if $admin.admin_rank >= $val.rank}>
			<{if empty($val.sub)}>
				<div class="terminal"><a href="<{$val.url}>" onclick="oc(this);loadPage(this.href, 1);return(false)"><{$val.name}></a></div>
			<{else}>
				<div class="doc1">
					<div class="<{if $smarty.foreach.fname.iteration<4}>doctitle_open<{else}>doctitle_close<{/if}>" onclick="triggerDiv(this)">
						<{$val.name}>
					</div>
					<div class="items" <{if $smarty.foreach.fname.iteration<4}>style="display:block"<{else}>style="display:none"<{/if}>>
                    <{* ----Second Category From here----- *}>
                    <{foreach from=$val.sub item="sub" name="subname"}>
                        <{if empty($sub.sub) && $admin.admin_rank>=$val.rank}>
                            <div class="comm item<{if $smarty.foreach.subname.last}>_last<{/if}>"><a href="<{$sub.url}>" onclick="oc(this);loadPage(this.href, 1);return(false);"><{$sub.name}></a></div>
                       <{elseif !empty($sub.sub)&&$admin.admin_rank>=$val.rank}>
                            <div class="doc2">
                                <div class="item<{if $smarty.foreach.subname.last}>_last<{/if}>_add">
                                    <div class="doc2_title" onclick="triggerDivSub(this.parentNode)"><span><{$sub.name}></span></div>
                                    <div class="items_sub" style="display:none">
                                        <{foreach from=$sub.sub item="subsub" name="subsubname"}>
                                            <div class="comm item<{if $smarty.foreach.subsubname.last}>_last<{/if}>"><a href="<{$subsub.url}>" onclick="oc(this);loadPage(this.href, 1);return(false)"><{$subsub.name}></a></div>
                                        <{/foreach}>
                                    </div>
                                </div>
                            </div>
                            
                   
							<{/if}>
						<{/foreach}>
					</div>
				</div>
			<{/if}>
		<{/if}>
	<{/foreach}>
	
	<!--
   <div class="terminal"><{load_page href='' link=''}></div>

    <div class="doc1">
        <div class="doctitle_open" onclick="triggerDiv(this)">
            菜单样式
        </div>
        <div class="items">
            <div class="item"><a href="#" onclick="oc(this);loadPage(this.href, 1);return(false);">菜单样式</a></div>
            <div class="item"><a href="#" onclick="oc(this);loadPage(this.href, 1);return(false);">菜单样式</a></div>
        </div>
    </div>
	 -->
</div>
