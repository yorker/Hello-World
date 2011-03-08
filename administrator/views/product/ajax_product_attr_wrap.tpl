<div class="adminform">
	<{foreach from=$list item="itm"}>
		<{if $itm.attr_type=='text'}>
			<{text label=$itm.attr_name id="id_attr_"|cat:$itm.attr_id name="attr_"|cat:$itm.attr_id value=$itm.attr_value cachedata="1"}>
		<{elseif $itm.attr_type=='radio'}>
			<{radio label=$itm.attr_name name=$itm.attr_id|pcat:"attr_" value=$itm.attr_option_array checked=$itm.attr_value}>
		<{elseif $itm.attr_type=='checkbox'}>
			<{checkbox label=$itm.attr_name name=$itm.attr_id|pcat:"attr_" value=$itm.attr_option_array checked=$itm.attr_value}>
		<{/if}>
	<{/foreach}>
</div>