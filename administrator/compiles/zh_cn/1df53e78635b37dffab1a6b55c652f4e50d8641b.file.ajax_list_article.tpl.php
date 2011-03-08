<?php /* Smarty version Smarty-3.0.7, created on 2011-02-24 14:05:03
         compiled from "D:\www\v30\administrator\views\article/ajax_list_article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:312094d65f50fbd48e1-10103700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1df53e78635b37dffab1a6b55c652f4e50d8641b' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\article/ajax_list_article.tpl',
      1 => 1298527345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312094d65f50fbd48e1-10103700',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_modifier_app_url')) include 'D:\www\v30\administrator\plugins\modifier.app_url.php';
if (!is_callable('smarty_modifier_escape')) include 'D:\www\v30\core\Engine\plugins\modifier.escape.php';
if (!is_callable('smarty_function_admin_switcher')) include 'D:\www\v30\administrator\plugins\function.admin_switcher.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\www\v30\core\Engine\plugins\modifier.date_format.php';
if (!is_callable('smarty_modifier_pcat')) include 'D:\www\v30\administrator\plugins\modifier.pcat.php';
if (!is_callable('smarty_function_admin_edit')) include 'D:\www\v30\administrator\plugins\function.admin_edit.php';
if (!is_callable('smarty_function_admin_delete')) include 'D:\www\v30\administrator\plugins\function.admin_delete.php';
?><?php if (!empty($_smarty_tpl->getVariable('list',null,true,false)->value)){?>
	<table class="adminlist" cellspacing="1">
	<thead>
		<tr>
			<th width="30"><input type="checkbox" onclick="checkAll(this, 'chkflag')" title="<?php echo $_smarty_tpl->getVariable('lang')->value['check_all_none'];?>
"/></th>
			<th><?php echo $_smarty_tpl->getVariable('lang')->value['title'];?>
</th>
			<th><?php echo $_smarty_tpl->getVariable('lang')->value['belong_cat'];?>
</th>
			<th><?php echo $_smarty_tpl->getVariable('lang')->value['mix_option'];?>
</th>
			<th width="60"><?php echo $_smarty_tpl->getVariable('lang')->value['ordering'];?>
</th>
			<th><?php echo $_smarty_tpl->getVariable('lang')->value['published'];?>
</th>
			<th><?php echo $_smarty_tpl->getVariable('lang')->value['click'];?>
</th>
			<th width="100"><?php echo $_smarty_tpl->getVariable('lang')->value['create_time'];?>
</th>		
			<th width="55"><?php echo $_smarty_tpl->getVariable('lang')->value['operation'];?>
</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["itm"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["itm"]->key => $_smarty_tpl->tpl_vars["itm"]->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["fname"]['iteration']++;
?>
		<tr class="row<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['fname']['iteration']%2;?>
">
			<td align="center"><input type="checkbox" name="cid" value="<?php echo $_smarty_tpl->getVariable('itm')->value['article_id'];?>
" class="chkflag"/></td>
			<td>
				<a href="<?php echo smarty_function_app_url(array('url'=>('article/writeArticle?id=').($_smarty_tpl->getVariable('itm')->value['article_id'])),$_smarty_tpl);?>
" onclick="loadPage(this);return(false);"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('itm')->value['title']);?>
</a>
				<?php if ($_smarty_tpl->getVariable('itm')->value['cover_img']){?>
					&nbsp;<a href="javascript:void(0)" onmouseover="showImg('<?php echo @UPLOAD_URL;?>
<?php echo $_smarty_tpl->getVariable('itm')->value['cover_img'];?>
', 100)" onmouseout="nd()"><img src="images/picflag.gif" border="0" title="<?php echo $_smarty_tpl->getVariable('lang')->value['has_cover_img'];?>
"/></a>
				<?php }?>
				<?php if ($_smarty_tpl->getVariable('itm')->value['link']){?>
					<img src="images/link.gif" border="0" title="<?php echo $_smarty_tpl->getVariable('lang')->value['is_out_link'];?>
"/>
				<?php }?>
			</td>
			<td align="center"><a href="<?php echo smarty_function_app_url(array('url'=>('article/listArticle?cat_id=').($_smarty_tpl->getVariable('itm')->value['cat_id'])),$_smarty_tpl);?>
" onclick="loadPage(this);return(false)"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('itm')->value['cat_name']);?>
</a></td>
			<td align="center"><?php echo (($tmp = @$_smarty_tpl->getVariable('itm')->value['mix_options'])===null||$tmp==='' ? '--' : $tmp);?>
</td>
			<td align="center"><div class="dyna_edit" onclick="loadEdit(this, 'article', 'ordering', '<?php echo $_smarty_tpl->getVariable('itm')->value['article_id'];?>
', '1')"><?php echo $_smarty_tpl->getVariable('itm')->value['ordering'];?>
</div></td>
			<td align="center">
				<?php echo smarty_function_admin_switcher(array('t'=>"article",'f'=>"published",'value'=>$_smarty_tpl->getVariable('itm')->value['published'],'id'=>$_smarty_tpl->getVariable('itm')->value['article_id']),$_smarty_tpl);?>

			</td>
			<td align="center">
				<?php echo $_smarty_tpl->getVariable('itm')->value['click_count'];?>

			</td>
			<td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('itm')->value['create_time'],'%Y-%m-%d');?>
</td>		
			<td align="center">
				<?php if ($_smarty_tpl->getVariable('cat_id')->value>0){?>
					<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('cat_id')->value,"article/writeArticle?cat_id=")),'id'=>$_smarty_tpl->getVariable('itm')->value['article_id']),$_smarty_tpl);?>

					<?php echo smarty_function_admin_delete(array('t'=>"article",'id'=>$_smarty_tpl->getVariable('itm')->value['article_id'],'url'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('cat_id')->value,'article/listArticle?cat_id=')),'image'=>"cover_img"),$_smarty_tpl);?>

				<?php }else{ ?>
					<?php echo smarty_function_admin_edit(array('href'=>smarty_modifier_app_url("article/writeArticle"),'id'=>$_smarty_tpl->getVariable('itm')->value['article_id']),$_smarty_tpl);?>

					<?php echo smarty_function_admin_delete(array('t'=>"-",'id'=>$_smarty_tpl->getVariable('itm')->value['article_id'],'url'=>smarty_modifier_app_url(smarty_modifier_pcat($_smarty_tpl->getVariable('cat_id')->value,'article/listArticle?cat_id=')),'image'=>"cover_img",'req_url'=>smarty_modifier_app_url("article/procDeleteArticle")),$_smarty_tpl);?>

				<?php }?>					
			</td>
		</tr>
		<?php }} ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="10">
				<div class="clearfix">
					<div class="fl">
						<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['batch_delete'];?>
" class="btn" onclick="batchDeleteByCheckbox('-', 'chkflag', '<?php echo smarty_function_app_url(array('url'=>('article/listArticle?cat_id=').($_smarty_tpl->getVariable('cat_id')->value)),$_smarty_tpl);?>
', '', 'cover_img', '<?php echo smarty_function_app_url(array('url'=>'article/procDeleteArticle'),$_smarty_tpl);?>
')"/>
					</div>
					<div class="fr"><?php echo $_smarty_tpl->getVariable('pages')->value;?>
</div>
				</div>
			</td>
		</tr>
	</tfoot>
	</table>
<?php }else{ ?>
	<div class="no_data"><?php echo $_smarty_tpl->getVariable('lang')->value['no_data'];?>
</div>
<?php }?>