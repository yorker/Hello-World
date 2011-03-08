<{if !empty($list)}>
	<{foreach from=$list item="itm"}>
	<div class="com_block">
		<div class="head"><{$itm.create_time|date_format:'%Y/%m/%d %H:%M'}>  <span id="hh_<{$itm.id}>"><{$itm.say}></span></div>
		<{if !empty($itm.parent)}>
			<div class="blank">&nbsp;</div>
			<div class="reference">
				<div class="tit"><{$itm.parent.create_time|date_format:'%Y/%m/%d %H:%M'}>  <{$itm.parent.say}></div>
				<{$itm.parent.message}>
			</div>
		<{/if}>
		<div class="message"><{$itm.message}></div>
		<div class="reply"><a href="#reply" onclick="notebook_reply(<{$itm.id}>)"><{$lang.reply}></a></div>
	</div>	
	<{/foreach}>
	<div style="padding:12px 0px; text-align:center"><{$pages}></div>
<{else}>
	<div class="no_data"><{$lang.no_data}></div>
<{/if}>