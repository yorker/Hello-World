<table class="adminlist" cellspacing="1">
    <thead>
        <tr>
            <th width="40"><input type="checkbox" onclick="checkAll(this, 'chkflag')"/></th>
            <th><{$lang.name}></th>            
            <th><{$lang.website}></th>
            <th><{$lang.description}></th>
            <th width="60"><{$lang.ordering}></th>
            <th width="80"><{$lang.operation}></th>
        </tr>
    </thead>
    <tbody>
        <{foreach $list as $itm}>
        <tr class="row<{$itm@iteration%2}>">
            <td align="center"><input type="checkbox" name="id" value="<{$itm.brand_id}>" class="chkflag"/></td>
            <td><{$itm.brand_name}><{if $itm.logo}> <img src="images/picflag.gif" border="0" onmouseover="showImg('<{$smarty.const.UPLOAD_URL}><{$itm.logo}>')" onmouseout="nd();"/><{/if}></td>
            <td><{$itm.website|default:'--'}></td>
            <td><{$itm.description|default:'-'}></td>
            <td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'product_brand', 'ordering', '<{$itm.brand_id}>', 1, 's')"><{$itm.ordering}></div></td>
            <td align="center">
                <{admin_edit href="product/writeBrand"|app_url id=$itm.brand_id}>
                <{admin_delete t="product_brand" id=$itm.brand_id url="product/listBrand" image="logo"}>
            </td>
        </tr>
        <{/foreach}>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6"><input type="button" value="<{$lang.batch_delete}>" class="btn" onclick="batchDeleteByCheckbox('product_brand', 'chkflag', '<{app_url url='product/listBrand'}>', '', 'logo')"/></td>
        </tr>
    </tfoot>
</table>