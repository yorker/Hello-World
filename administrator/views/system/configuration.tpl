<{if $action == 'load_page'}>
<script type="text/javascript">
	$(document).ready(function(){
		pagination('<{$page_url}>');
	});
</script>
<div id="pagination_show"></div>

<!--添加/编辑配置分类 begin-->
<{elseif $action == 'write_cat'}>	
	<form action="<{app_url url='system/configuration?act=write_cat'}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{app_url url='system/configuration?act=cat_list'}>')">
		<div class="adminform">
			<div class="f_title"><{$head_top.title}></div>
			<{text label=$lang.name value=$config_cat.name name="name" required="true"}>
			<{text label=$lang.ordering value=$config_cat.ordering|default:50 name="ordering" datatype="NUMERIC" required="true" size="s"}>
			<{textarea label=$lang.description name="description" id="description" value=$config_cat.description width="580px" height="100px"}>
			<{if $config_cat.id > ''}><input type="hidden" name="id" value="<{$config_cat.id}>"/><{/if}>
			<{submit name="submit" value=$lang.submit}>
		</div>
	</form>

	
<!--配置分类列表 begin-->	
<{elseif $action == 'cat_list'}>
<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="30"><input type="checkbox" onclick="checkAll(this, 'checkname')" title="<{$lang.check_all_none}>"/></th>
		<th><{$lang.name}></th>
		<th><{$lang.description}></th>
		<th width="100"><{$lang.ordering}></th>
		<th width="150"><{$lang.operation}></th>
	</tr>
</thead>
<tbody>
	<{foreach from=$cat_list item="itm" name="fname"}>
	<tr class="row<{$smarty.foreach.fname.iteration%2}>">
		<td align="center"><input type="checkbox" name="cid" value="<{$itm.id}>" class="checkname"/></td>
		<td><{load_page link=$itm.name href=$itm.id|pcat:'system/configuration?act=config_list&cat_id='|app_url}></a></td>
		<td><span class="gray"><{$itm.description}></span></td>
		<td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'sys_config_cat', 'ordering', '<{$itm.id}>', '1', 's')"><{$itm.ordering}></div></td>
		<td align="center">
			<{admin_edit href="system/configuration?act=write_cat"|app_url id=$itm.id}>
			<{admin_delete t="sys_config_cat" id=$itm.id url="system/configuration?act=cat_list"|app_url}>
		</td>
	</tr>
	<{/foreach}>
</tbody>
<tfoot>
	<tr>
		<td colspan="5">
			<input type="button" value="<{$lang.batch_delete}>" class="btn" onclick="batchDeleteByCheckbox('sys_config_cat', 'checkname', '<{app_url url='system/configuration?act=cat_list'}>')"/>
		</td>
	</tr>
</tfoot>
</table>

<!--配置列表 begin-->
<{elseif $action == 'config_list'}>
<table class="adminlist" cellspacing="1">
<thead>
	<tr>
		<th width="30"><input type="checkbox" onclick="checkAll(this, 'checkname')" title="<{$lang.check_all_none}>"/></th>
		<th><{$lang.name}></th>
		<th>Key</th>
		<th>Value</th>		
		<th><{$lang.belong_cat}></th>
		<th width="60"><{$lang.ordering}></th>
		<th width="100"><{$lang.operation}></th>
	</tr>
</thead>
<tbody>
	<{foreach from=$list item="itm" name="fname"}>
	<tr class="row<{$smarty.foreach.fname.iteration%2}>">
		<td align="center"><input type="checkbox" name="cid" value="<{$itm.id}>" class="checkname"/></td>
		<td><div class="dyna_edit" onclick="loadEdit(this, 'sys_config', 'conf_name', '<{$itm.id}>')"><{$itm.conf_name}></div></td>
		<td><{$itm.conf_key}></td>
		<td><{$itm.conf_value|default:'&nbsp;'}></td>		
		<td align="center"><{$itm.cat_name}></td>
		<td  align="center"><div class="dyna_edit" onclick="loadEdit(this, 'sys_config', 'ordering', '<{$itm.id}>', 'int', 's')"><{$itm.ordering}></div></td>
		<td align="center">
			<{if $cat_id > 0}>
				<{admin_edit href=$cat_id|pcat:"system/configuration?act=write_config&cat_id="|app_url id=$itm.id}>
				<{admin_delete t="sys_config" id=$itm.id url=$cat_id|pcat:"system/configuration?act=config_list&cat_id="|app_url}>
			<{else}>
				<{admin_edit href="system/configuration?act=write_config"|app_url id=$itm.id}>
				<{admin_delete t="sys_config" id=$itm.id url="system/configuration?act=config_list"|app_url}>
			<{/if}>
		</td>
	</tr>
	<{/foreach}>
</tbody>
<tfoot>
	<tr>
		<td colspan="8">
			<input type="button" value="<{$lang.batch_delete}>" class="btn" onclick="batchDeleteByCheckbox('sys_config', 'checkname', '<{app_url url='system/configuration?act=config_list'}>')"/>
		</td>
	</tr>
</tfoot>
</table>

<!--添加/编辑配置项 begin-->
<{elseif $action == 'write_config'}>
	<form action="<{app_url url='system/configuration?act=write_config'}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{$reurl|app_url}>')">
		<div class="adminform">
			<div class="f_title"><{$head_top.title}></div>
			<{select label=$lang.belong_cat name="cat_id" value=$cats required="true" selected=$edited.cat_id|default:$cat_id}>
			
			<{text label=$lang.name value=$edited.conf_name name="conf_name" required="true"}>
			
			<{text label="Key" value=$edited.conf_key unique="config" name="conf_key" required="true"}>
			
			<{text label="Value" value=$edited.conf_value name="conf_value"}>
			
			<{radio label=$lang.type value=$type name="type" checked=$edited.type|default:"bool" required="true"}>
			
			<{text label=$lang.unit value=$edited.unit name="unit" size="s"}>			
			
			<{text label=$lang.ordering value=$edited.ordering|default:50 name="ordering" datatype="NUMERIC" required="true" size="s"}>
			<{textarea label=$lang.description name="description" id="description" value=$edited.description width="580px" height="100px"}>
			<{if $edited.id > ''}><input type="hidden" name="id" value="<{$edited.id}>"/><{/if}>
			<{submit name="submit" value=$lang.submit}>
		</div>
	</form>

<{elseif $action == 'international'}>
	<{if !empty($files)}>
	<table class="adminlist" cellspacing="1">
		<thead>
			<tr>
				<th><{$lang.file}></th>
				<th width="100"><{$lang.operation}></th>
			</tr>
		</thead>
		<tbody>
			<{foreach from=$files item="itm"}>
			<tr class="row0">
				<td><{$itm}></td>
				<td align="center"><a href="<{app_url url='system/configuration?act=international&type=en_us&file='|cat:$itm}>" onclick="loadPage(this, 1);return(false)">en_us</a></td>
			</tr>
			<{/foreach}>
		</tbody>
	</table>
	<{elseif !empty($slang)}>
		<form action="<{app_url url='system/handleInternational'}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{app_url url="system/configuration?act=international"}>')">
		<div class="adminform">
			<div class="f_title"><{$lang.international}>&nbsp;&nbsp;&nbsp;&nbsp;(TO <span class="red"><{$type}>/<{$file}></span>)</div>
			<{foreach from=$slang item="val" key="k"}>
			<div class="international">
				<div class="k"><{$k}></div>				
				<div class="v">
				<textarea name="<{$k}>" required="true" msg="<{$k}><{$lang.data_require}>" onfocus="international_focus(this, 'international')"><{$val}></textarea>
				</div>
			</div>
			<{/foreach}>
			<div class="inter_submit">
				<input type="hidden" name="type" value="<{$type}>"/>
				<input type="hidden" name="file" value="<{$file}>"/>
				<input type="submit" name="" value="<{$lang.submit}>" class="btn"/>
			</div>
			
		</div>
		</form>
	<{/if}>
<{/if}>