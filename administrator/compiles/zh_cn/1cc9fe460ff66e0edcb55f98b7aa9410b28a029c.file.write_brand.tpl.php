<?php /* Smarty version Smarty-3.0.7, created on 2011-02-26 23:25:38
         compiled from "D:\www\v30\administrator\views\product/write_brand.tpl" */ ?>
<?php /*%%SmartyHeaderCode:216944d691b727096c6-11795053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cc9fe460ff66e0edcb55f98b7aa9410b28a029c' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\product/write_brand.tpl',
      1 => 1298733933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '216944d691b727096c6-11795053',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_upload')) include 'D:\www\v30\administrator\plugins\function.upload.php';
if (!is_callable('smarty_function_select')) include 'D:\www\v30\administrator\plugins\function.select.php';
if (!is_callable('smarty_function_textarea')) include 'D:\www\v30\administrator\plugins\function.textarea.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
?><form action="<?php echo smarty_function_app_url(array('url'=>'product/writeBrand'),$_smarty_tpl);?>
" method="post" onsubmit="return ajaxDoSubmit(this, '<?php echo $_smarty_tpl->getVariable('reload')->value;?>
')">
    <div class="adminform">
        <div class="f_title"><?php echo $_smarty_tpl->getVariable('head_top')->value['title'];?>
</div>
        <?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['name'],'name'=>"wrt_brand_name",'value'=>$_smarty_tpl->getVariable('edit')->value['brand_name'],'required'=>"true",'unique'=>"product_brand"),$_smarty_tpl);?>

        <?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['website'],'name'=>"wrt_website",'value'=>$_smarty_tpl->getVariable('edit')->value['website']),$_smarty_tpl);?>

        <?php echo smarty_function_upload(array('label'=>"LOGO",'name'=>"wrt_logo",'value'=>$_smarty_tpl->getVariable('edit')->value['logo']),$_smarty_tpl);?>

        <?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['ordering'],'name'=>"wrt_ordering",'value'=>(($tmp = @$_smarty_tpl->getVariable('edit')->value['ordering'])===null||$tmp==='' ? 50 : $tmp),'required'=>"true",'datatype'=>"NUMERIC",'size'=>"s"),$_smarty_tpl);?>

        <?php echo smarty_function_select(array('label'=>$_smarty_tpl->getVariable('lang')->value['available'],'name'=>"wrt_is_available",'value'=>$_smarty_tpl->getVariable('is_available')->value,'selected'=>$_smarty_tpl->getVariable('edit')->value['is_available']),$_smarty_tpl);?>

        <?php echo smarty_function_textarea(array('label'=>$_smarty_tpl->getVariable('lang')->value['description'],'name'=>"wrt_description",'value'=>$_smarty_tpl->getVariable('edit')->value['description'],'width'=>"480px",'height'=>"200px"),$_smarty_tpl);?>

        <?php if (!empty($_smarty_tpl->getVariable('edit',null,true,false)->value['brand_id'])){?>
            <input type="hidden" name="wrt_id" value="<?php echo $_smarty_tpl->getVariable('edit')->value['brand_id'];?>
"/>
        <?php }?>
        <?php echo smarty_function_submit(array('value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

       
    </div>        
</form>