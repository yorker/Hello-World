<?php /* Smarty version Smarty-3.0.7, created on 2011-02-28 09:54:04
         compiled from "D:\www\v30\administrator\views\ajax/simple_add_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201744d6b003c754d18-49905839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72ed16ca96c75d6bdaba7bc056e5c4dfdcb092ac' => 
    array (
      0 => 'D:\\www\\v30\\administrator\\views\\ajax/simple_add_item.tpl',
      1 => 1298857850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201744d6b003c754d18-49905839',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_app_url')) include 'D:\www\v30\administrator\plugins\function.app_url.php';
if (!is_callable('smarty_function_text')) include 'D:\www\v30\administrator\plugins\function.text.php';
if (!is_callable('smarty_function_submit')) include 'D:\www\v30\administrator\plugins\function.submit.php';
?><script type="text/javascript">
function ajax_add_item(fobj) {
    if(!checkForm(fobj)) {
        return false;
    }
    var datas = getDatas(fobj);
    
    $.ajax({
        type: 'post',
        url: fobj.action,
        data: datas,
        success: function(msg) {
            msg = $.trim(msg);
            
            if(/ok-/.test(msg)) {
                var arr = msg.split('-');
                var last_id = parseInt(arr[1]);
                
                //重新加载商品品牌在添加商品页中。
                $.ajax({
                    type: 'get',
                    url: 'dispatcher.php?disp=ajax/ajaxGetCurOption&id='+last_id+'&t=<?php echo $_smarty_tpl->getVariable('table')->value;?>
&f=<?php echo $_smarty_tpl->getVariable('field')->value;?>
',
                    success: function(cnt) {
                        $("#<?php echo $_smarty_tpl->getVariable('select_id')->value;?>
").html(cnt);
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
<form action="<?php echo smarty_function_app_url(array('url'=>'ajax/simpleAddItem'),$_smarty_tpl);?>
" method="post" onsubmit="return ajax_add_item(this)">
    <div class="adminform">
        <div class="f_title"><?php echo $_smarty_tpl->getVariable('lang')->value['add'];?>
<?php if ($_smarty_tpl->getVariable('title')->value){?> - <?php echo $_smarty_tpl->getVariable('title')->value;?>
<?php }?></div>
        <?php echo smarty_function_text(array('label'=>$_smarty_tpl->getVariable('lang')->value['name'],'name'=>("wrt_").($_smarty_tpl->getVariable('field')->value),'value'=>'','required'=>"true",'unique'=>$_smarty_tpl->getVariable('table')->value),$_smarty_tpl);?>

        <input type="hidden" name="table" value="<?php echo $_smarty_tpl->getVariable('table')->value;?>
"/>
		<input type="hidden" name="field" value="<?php echo $_smarty_tpl->getVariable('field')->value;?>
"/>
        <?php echo smarty_function_submit(array('value'=>$_smarty_tpl->getVariable('lang')->value['submit']),$_smarty_tpl);?>

    </div>    
</form>