<?php /* Smarty version Smarty-3.0.7, created on 2011-02-27 16:52:37
         compiled from "D:\www\v30\administrator\views\product/ajax_add_brand.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102364d6a10d59a2f09-24479600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57563672d2c08fbc8373575b8a129749d39993f8' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\product/ajax_add_brand.tpl',
      1 => 1298735927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102364d6a10d59a2f09-24479600',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
?><script type="text/javascript">
function ajax_add_brand(fobj) {
    if(!checkForm(fobj)) {
        return false;
    }
    var datas = getDatas(fobj);
    
    $.ajax({
        type: 'post',
        url: 'dispatcher.php?disp=product/ajaxAddBrand',
        data: datas,
        success: function(msg) {
            msg = $.trim(msg);
            
            if(/ok-/.test(msg)) {
                var arr = msg.split('-');
                var last_id = parseInt(arr[1]);
                
                //重新加载商品品牌在添加商品页中。
                $.ajax({
                    type: 'get',
                    url: 'dispatcher.php?disp=product/ajaxGetBrands&id='+last_id,
                    success: function(cnt) {
                        $("#brand_id").html(cnt);
                    }
                });
                closeAjaxWin();
            } else {
                showMsgByDiv(msg, 1);
            }
        }
    });
    return false;
}
</script>
<form action="<?php echo smarty_function_app_url(array('url'=>'product/ajaxAddBrand'),$_smarty_tpl);?>
" method="post" onsubmit="return ajax_add_brand(this)">
    <div class="adminform">
        <div class="f_title"><?php echo $_smarty_tpl->getVariable('lang')->value['add_brand'];?>
</div>
        <?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['name'],'name'=>"wrt_brand_name",'value'=>'','required'=>"true",'unique'=>'product_brand'),$_smarty_tpl);?>

        <?php echo smarty_function_submit(array('value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

    </div>    
</form>