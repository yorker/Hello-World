<div class="tab_list">	
	<div class="tabs">
		<{foreach from=$categories item="category" name="cname"}>
			<label class="<{if $smarty.foreach.cname.iteration == $num}>tab_current<{/if}>" onclick="tab(this, 'tab_current')"><{$category.name}></label>
		<{/foreach}>		
	</div>	
	<ul>
		<{foreach from=$categories item="category" name="cname"}>
			<li style="display:<{if $smarty.foreach.cname.iteration  == $num}>block<{else}>none<{/if}>">
				<form action="<{app_url url='system/setConfiguration'}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{app_url url='system/setConfiguration?num='|cat:$smarty.foreach.cname.iteration}>')">
					<div class="adminform">
					<div class="f_title"><{$category.name}></div>
					<{foreach from=$category.sub item="itm"}>
						<{if $itm.type == 'bool'}>
							<{radio label=$itm.conf_name name=$itm.conf_key|cat:'_cflag' value=$itm.value checked=$itm.conf_value note=$itm.description}>
						<{elseif $itm.type == 'digit'}>
							<{text label=$itm.conf_name name=$itm.conf_key|cat:'_cflag' value=$itm.conf_value size="S" note=$itm.description}>
						<{else}>
							<{text label=$itm.conf_name name=$itm.conf_key|cat:'_cflag' value=$itm.conf_value size="M" note=$itm.description}>
						<{/if}>
					<{/foreach}>					
					<{submit value=$lang.submit}>
					</div>
				</form>
			</li>
		<{/foreach}>		
	</ul>
	<div class="sys_conf_update_cache_file"><input type="button" class="btn" value="<{$lang.update_cache_file}>" onclick="update_sys_config_cache_file(this, '<{app_url url='system/ajaxUpdateCacheFile'}>')"/></div>
</div>