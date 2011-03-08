<{if $action == 'write_model'}>
	<form action="<{app_url url='product/model?act=write_model'}>" onsubmit="return ajaxDoSubmit(this, '<{app_url url='product/model?act=list_model'}>')" method="post">
	<div class="adminform">
		<div class="f_title"><{$head_top.title}></div>
		<{text name="wrt_mod_name" required="true" label=$lang.name value=$edit.mod_name attr="autocomplete=off"}>
		<{select name="wrt_available" value=$available selected=$edit.available|default:'1' label=$lang.available}>
		<{if $edit.mod_id>0}><input type="hidden" name="wrt_id" value="<{$edit.mod_id}>"/><{/if}>
		<{submit value=$lang.submit}>
	</div>
	</form>

<{elseif $action == 'list_model'}>
	<div class="comment">
		<span class="blue"><{$lang.importance_tip}></span><{$lang.delete_model_tip}>
	</div>
	<table class="adminlist" cellspacing="1">
	<thead>
		<tr>
			<th width="55"><input type="checkbox" onclick="checkAll(this, 'chkclass')" /></th>
			<th><{$lang.name}></th>
			<th width="100"><{$lang.attr_num}></th>
			<th width="60"><{$lang.available}></th>
			<th width="100"><{$lang.operation}></th>
		</tr>
	</thead>
	<tbody>
		<{foreach from=$list item="itm" name="fname"}>
		<tr class="row<{$smarty.foreach.fname.iteration%2}>">
			<td align="center"><input type="checkbox" name="cids" value="<{$itm.mod_id}>" class="chkclass"/></td>
			<td>
				<div class="clearfix">
					<div class="fl"><a href="<{app_url url='product/model?act=list_attr&mod_id='|cat:$itm.mod_id}>" onclick="loadPage(this.href, 1);return false;"><{$itm.mod_name}></a></div>
					<div class="fr"><a href="<{app_url url='product/model?act=list_attr&mod_id='|cat:$itm.mod_id}>" onclick="loadPage(this.href, 1);return false;">[<{$lang.attr_list}>]</a></div>
				</div>
			</td>
			<td align="center"><{$itm.attr_num}></td>
			<td align="center"><{admin_switcher t="product_model" f="available" value=$itm.available id=$itm.mod_id}></td>
			<td align="center">
				<{admin_edit href="product/model?act=write_model"|app_url id=$itm.mod_id}>
				<{admin_delete t="product_model" id=$itm.mod_id url="product/model?act=list_model"|app_url req_url="product/ajaxDeleteModel"|app_url}>
			</td>
		</tr>
		<{/foreach}>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="5"><input type="button" class="btn" value="<{$lang.batch_delete}>" onclick="batchDeleteByCheckbox('product_model','chkclass', '<{app_url url='product/model?act=list_model'}>', '', '', '<{app_url url='product/ajaxDeleteModel'}>')"/></td>
		</tr>
	</tfoot>
	</table>
	
<{elseif $action == 'list_attr'}>
	<div class="op_bar clearfix">
		<div class="fr"><a href="javascript:openAjaxWin('<{app_url url='product/ajaxManageAttributeLabel'}>', 500, 300)"><{$lang.manage_attribute_label}></a></div>
	</div>
	<{if !empty($list)}>		
		<table class="adminlist" cellspacing="1">
		<thead>
			<tr>
				<th width="55"><input type="checkbox" onclick="checkAll(this, 'chkclass')"/></th>
				<th><{$lang.name}></th>
				<th width="70"><{$lang.type}></th>
				<th><{$lang.option_value}></th>
				<th><{$lang.belong_label}></th>
				<th width="55"><{$lang.available}></th>
				<th width="100"><{$lang.operation}></th>
			</tr>
		</thead>
		<tbody>
			<{foreach from=$list item="itm" name="fname"}>
			<tr class="row<{$smarty.foreach.fname.iteration%2}>">
				<td align="center"><input type="checkbox" name="cids" value="<{$itm.attr_id}>" class="chkclass"/></td>
				<td align="center"><{$itm.attr_name}></td>
				<td align="center"><{if $itm.attr_type=='text'}><{$lang.text}><{elseif $itm.attr_type=='radio'}><{$lang.radio}><{else}><{$lang.checkbox}><{/if}></td>
				<td align="center"><{if $itm.attr_type != 'text'}><{$itm.attr_option|default:'--'}><{else}>--<{/if}></td>
				<td align="center"><{$itm.label_name|default:'-'}></td>
				<td align="center"><{admin_switcher t="product_attribute" f="available" id=$itm.attr_id value=$itm.available}></td>
				<td align="center">
					<{admin_edit href=$itm.mod_id|pcat:"product/model?act=write_attr&mod_id="|app_url id=$itm.attr_id}>&nbsp;
					<{admin_delete url=$itm.mod_id|pcat:"product/model?act=list_attr&mod_id="|app_url t="product_attribute" id=$itm.attr_id req_url="product/ajaxDeleteModelAttr"|app_url}>
				</td>
			</tr>
			<{/foreach}>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="7">
					<input value="<{$lang.batch_delete}>" type="button" class="btn" onclick="batchDeleteByCheckbox('-', 'chkclass', '<{app_url url='product/model?act=list_attr&mod_id='|cat:$itm.mod_id}>', 0, '', '<{app_url url='product/ajaxDeleteModelAttr'}>')"/>&nbsp;&nbsp;
					<input type="button" value="<{$lang.product_model}>" class="btn" onclick="loadPage('<{app_url url='product/model?act=list_model'}>');return false;"/>
				</td>
			</tr>
		</tfoot>
		</table>		
	<{else}>
		<div class="no_data"><{$lang.no_data}></div>
	<{/if}>
	
<{elseif $action=='write_attr'}>
	<{if $edit.attr_id>0}>
		<form action="<{app_url url='product/model?act=write_attr&mod_id='|cat:$mod_id}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{app_url url='product/model?act=list_attr&mod_id='|cat:$mod_id}>')">
	<div class="adminform">
	<{else}>
		<form action="<{app_url url='product/model?act=write_attr&mod_id='|cat:$mod_id}>" method="post" onsubmit="return ajaxDoSubmit(this, '<{app_url url='product/model?act=write_attr&mod_id='|cat:$mod_id}>')">
	<div class="adminform">
	<{/if}>
	
		<div class="f_title"><{$head_top.title}></div>
		<{text name="wrt_attr_name" value=$edit.attr_name required="true" label=$lang.name}>
		<{radio name="wrt_attr_type" value=$attr_types label=$lang.type checked=$edit.attr_type|default:'text'}>
		<div class="line clearfix">
			<div class="f1"><{$lang.belong_label}></div>
			<div class="f2">
				<select name="wrt_label_id" id="label_id">
					<option value="0"><{$lang.please_choose}></option>
					<{foreach $labels as $label}>
						<option value="<{$label.label_id}>"<{if $label.label_id==$edit.label_id}> selected<{/if}>><{$label.label_name}></option>
					<{/foreach}>
				</select>&nbsp;
				<a href="javascript:void(0)" onclick="openAjaxWin('<{app_url url=$lang.belong_label|escape:'url'|pcat:'ajax/simpleAddItem?select_id=label_id&t=product_attribute_label&f=label_name&title='}>', 500, 300)"><{$lang.add}></a>
			</div>
		</div>
		<{text name="wrt_attr_option" value=$edit.attr_option label=$lang.option_value size="l" note=$lang.please_separate_by_comma}>
		<{select name="wrt_available" value=$available label=$lang.available selected=$edit.available|default:"1"}>
		<{text label=$lang.comment name="wrt_comment" value=$edit.comment}>
		<input type="hidden" name="wrt_mod_id" value="<{$mod_id}>"/>
		<{if $edit.attr_id>0}><input type="hidden" name="wrt_id" value="<{$edit.attr_id}>"/><{/if}>
		<{submit value=$lang.submit}>
	</div>
	</form>
<{/if}>