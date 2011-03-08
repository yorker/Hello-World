<?php /* Smarty version Smarty-3.0.7, created on 2011-02-27 20:55:12
         compiled from "D:\www\v30\administrator\views\article/write_article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:63884d6a49b008b840-20041267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df469fc5c5e12f837795de37b32a7f05495a0cdc' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\article/write_article.tpl',
      1 => 1298811307,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63884d6a49b008b840-20041267',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'D:\www\v30\core\Engine\plugins\modifier.escape.php';
if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_upload')) include 'D:\www\v30\administrator\plugins\function.upload.php';
if (!is_callable('smarty_function_select')) include 'D:\www\v30\administrator\plugins\function.select.php';
if (!is_callable('smarty_function_textarea')) include 'D:\www\v30\administrator\plugins\function.textarea.php';
if (!is_callable('smarty_function_gettags')) include 'D:\www\v30\administrator\plugins\function.gettags.php';
?><script type="text/javascript">
$(document).ready(function() {
	addEditor('content');	
	setTimeout("tmp()", 100);
});
function tmp(){
	var v = '<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('edit')->value['content'],'javascript');?>
';
	KE.insertHtml('content', v);
}
</script>

<form action="<?php echo smarty_function_app_url(array('url'=>'article/writeArticle'),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php if ($_smarty_tpl->getVariable('cat_id')->value>0){?><?php echo smarty_function_app_url(array('url'=>('article/listArticle?cat_id=').($_smarty_tpl->getVariable('cat_id')->value)),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_app_url(array('url'=>'article/listArticle'),$_smarty_tpl);?>
<?php }?>');">
<div class="tab_list">
	<div class="tabs">
		<label class="tab_current" onclick="tab(this, 'tab_current')"><?php echo $_smarty_tpl->getVariable('lang')->value['basic_info'];?>
</label>
		<label onclick="tab(this, 'tab_current')"><?php echo $_smarty_tpl->getVariable('lang')->value['article_content'];?>
</label>
	</div>
	<ul>
		<li style="display:block">		
			<div class="adminform">
				<div class="f_title"><?php echo $_smarty_tpl->getVariable('lang')->value['basic_info'];?>
</div>
				<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['title'],'id'=>"art_title",'name'=>"wrt_title",'value'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['title'])===null||$tmp==='' ? '' : $tmp),'required'=>"true",'size'=>"l"),$_smarty_tpl);?>
				
				<div class="line clearfix">
					<div class="f1"><?php echo $_smarty_tpl->getVariable('lang')->value['belong_cat'];?>
</div>
					<div class="f2">
						<select name="wrt_cat_id" onchange="checkSingle(this)" required="true" msg="<?php echo $_smarty_tpl->getVariable('lang')->value['not_empty'];?>
<?php echo $_smarty_tpl->getVariable('lang')->value['belong_cat'];?>
">
							<?php echo $_smarty_tpl->getVariable('catopt')->value;?>

						</select>
					</div>
					<div class="f3">
						<span class="red">*</span>
						<span class="tip"></span>
					</div>
				</div>
             <?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['article_source'],'name'=>"wrt_source",'id'=>"cache_source",'value'=>$_smarty_tpl->getVariable('edit')->value['source'],'cachedata'=>1),$_smarty_tpl);?>

				<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['author'],'name'=>"wrt_author",'id'=>"cache_author",'value'=>$_smarty_tpl->getVariable('edit')->value['author'],'cachedata'=>1),$_smarty_tpl);?>

				
				<?php echo smarty_function_upload(array('label'=>$_smarty_tpl->getVariable('lang')->value['cover_img'],'name'=>"wrt_cover_img",'value'=>$_smarty_tpl->getVariable('edit')->value['cover_img'],'thumb_width'=>$_smarty_tpl->getVariable('thumb')->value[0],'thumb_height'=>$_smarty_tpl->getVariable('thumb')->value[1]),$_smarty_tpl);?>

				
				<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['out_link'],'name'=>"wrt_link",'value'=>$_smarty_tpl->getVariable('edit')->value['link'],'note'=>$_smarty_tpl->getVariable('lang')->value['out_link_note'],'size'=>"l"),$_smarty_tpl);?>

				<?php echo smarty_function_select(array('label'=>$_smarty_tpl->getVariable('lang')->value['open_type'],'name'=>"wrt_open_type",'value'=>$_smarty_tpl->getVariable('link_open_type')->value,'selected'=>$_smarty_tpl->getVariable('edit')->value['open_type']),$_smarty_tpl);?>

				<?php echo smarty_function_select(array('label'=>$_smarty_tpl->getVariable('lang')->value['published'],'name'=>"wrt_published",'value'=>$_smarty_tpl->getVariable('published')->value,'selected'=>$_smarty_tpl->getVariable('edit')->value['published']),$_smarty_tpl);?>

				<div class="line clearfix">
					<div class="f1"><?php echo $_smarty_tpl->getVariable('lang')->value['mix_option'];?>
</div>
					<div class="f2">
						<?php echo $_smarty_tpl->getVariable('lang')->value['set_top'];?>
 <input type="checkbox" name="wrt_is_top" value="1" <?php if ($_smarty_tpl->getVariable('edit')->value['is_top']==1){?>checked<?php }?>/> &nbsp;&nbsp;
						<?php echo $_smarty_tpl->getVariable('lang')->value['set_hot'];?>
 <input type="checkbox" name="wrt_is_hot" value="1" <?php if ($_smarty_tpl->getVariable('edit')->value['is_hot']==1){?>checked<?php }?>/> &nbsp;&nbsp;
						<?php echo $_smarty_tpl->getVariable('lang')->value['set_commend'];?>
 <input type="checkbox" name="wrt_is_commended" value="1" <?php if ($_smarty_tpl->getVariable('edit')->value['is_commended']==1){?>checked<?php }?>/>
					</div>
				</div>
				<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['ordering'],'name'=>"wrt_ordering",'value'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['ordering'])===null||$tmp==='' ? "50" : $tmp),'datatype'=>"NUMERIC",'size'=>"s"),$_smarty_tpl);?>

				<?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['keywords'],'name'=>"wrt_keywords",'value'=>$_smarty_tpl->getVariable('edit')->value['keywords'],'size'=>"l"),$_smarty_tpl);?>

				<?php echo smarty_function_textarea(array('label'=>$_smarty_tpl->getVariable('lang')->value['description'],'name'=>"wrt_description",'value'=>$_smarty_tpl->getVariable('edit')->value['description'],'width'=>"500px",'height'=>"120px"),$_smarty_tpl);?>

			</div>
		</li>
		<li style="display:none">
			<div class="adminform">
				<div class="f_title"><?php echo $_smarty_tpl->getVariable('lang')->value['article_content'];?>
</div>				
				<textarea id="content" name="wrt_content" style="width:99%; height:500px"></textarea>
				<?php echo smarty_function_gettags(array('label'=>$_smarty_tpl->getVariable('lang')->value['tag'],'name'=>"wrt_tags",'value'=>$_smarty_tpl->getVariable('edit')->value['tags'],'subid'=>"art_title",'msgid'=>"content"),$_smarty_tpl);?>

			</div>
		</li>
	<ul>
	<div class="spe_submit">
		<?php if ($_smarty_tpl->getVariable('edit')->value['article_id']>0){?><input type="hidden" value="<?php echo $_smarty_tpl->getVariable('edit')->value['article_id'];?>
" name="wrt_id"/><?php }?>
		<input type="submit" name="submit" value="<?php echo $_smarty_tpl->getVariable('lang')->value['submit'];?>
" class="btn"/>&nbsp;
		<input type="button" name="back" value="<?php echo $_smarty_tpl->getVariable('lang')->value['back'];?>
" class="btn" onclick="loadPage('<?php echo smarty_function_app_url(array('url'=>'article/listArticle'),$_smarty_tpl);?>
', 1)"/>
	</div>
</div>
</form>