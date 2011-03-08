<?php /* Smarty version Smarty-3.0.7, created on 2011-03-02 08:55:56
         compiled from "templates\index/article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79694d6d959c36ff80-75922323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c18ccbfb1dbc21d796baf43b40c880bbd2f1858f' => 
    array (
      0 => 'templates\\index/article.tpl',
      1 => 1298986168,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79694d6d959c36ff80-75922323',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\www\v30\core\Engine\plugins\modifier.date_format.php';
?><?php echo $_smarty_tpl->getVariable('top_position')->value;?>


<div class="art_detail_wrap">
	<h2><?php echo $_smarty_tpl->getVariable('art')->value['title'];?>
</h2>
	<table class="info" cellspacing="0" cellpadding="0">
		<tr>
			<td><?php echo $_smarty_tpl->getVariable('lang')->value['update_time'];?>
: <?php echo smarty_modifier_date_format((($tmp = @smarty_modifier_date_format($_smarty_tpl->getVariable('art')->value['update_time'],'%Y-%m-%d'))===null||$tmp==='' ? $_smarty_tpl->getVariable('art')->value['create_time'] : $tmp),'%Y-%m-%d');?>
</td>
			<td align="center"><?php echo $_smarty_tpl->getVariable('lang')->value['source'];?>
: <?php echo (($tmp = @$_smarty_tpl->getVariable('art')->value['source'])===null||$tmp==='' ? $_smarty_tpl->getVariable('lang')->value['unknown'] : $tmp);?>
</td>
			<td align="center"><?php echo $_smarty_tpl->getVariable('lang')->value['click_count'];?>
: <?php echo $_smarty_tpl->getVariable('art')->value['click_count'];?>
</td>
			<td align="center"><?php echo $_smarty_tpl->getVariable('lang')->value['author_or_translator'];?>
: <?php echo $_smarty_tpl->getVariable('art')->value['author'];?>
</td>
		</tr>
	</table>
	<div class="blank">&nbsp;</div>
	<div class="art_description"><?php echo $_smarty_tpl->getVariable('art')->value['description'];?>
</div>
	<div class="art_body"><?php echo $_smarty_tpl->getVariable('art')->value['content'];?>
</div>
	<?php echo $_smarty_tpl->getVariable('pages')->value;?>

	
	<div class="art_relative clearfix">
		<div class="prev"><?php if ($_smarty_tpl->getVariable('prev')->value>''){?><a href="<?php echo $_smarty_tpl->getVariable('prev')->value['url'];?>
" title="<?php echo $_smarty_tpl->getVariable('prev')->value['title'];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['prev'];?>
</a><?php }?></div>
		<div class="next"><?php if ($_smarty_tpl->getVariable('next')->value>''){?><a href="<?php echo $_smarty_tpl->getVariable('next')->value['url'];?>
" title="<?php echo $_smarty_tpl->getVariable('next')->value['title'];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['next'];?>
</a><?php }?></div>
	</div>
</div>