<?php /* Smarty version 2.6.26, created on 2011-02-21 20:45:54
         compiled from test.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.html", 'smarty_include_vars' => array('page_title' => 'test')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript" src="kindeditor/kindeditor.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    addEditor('cnt');
    setTimeout("insert();", 0);   
   
});
function insert() {
    var v = '<?php echo $this->_tpl_vars['test']; ?>
';
    KE.insertHtml('cnt', v);
}
</script>

<textarea id="cnt" style="width:100%;height:450px"></textarea>
<input type="button" value="set" onclick="insert()"/>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>