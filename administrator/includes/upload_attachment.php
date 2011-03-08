<?php
require_once("include.php");

/*参数设置 */
//路径
$upload_path = UPLOAD_PATH . 'attachment/';

if(!empty($_FILES) && isset($_POST['load'])) {
	$upload = new Upload('attach', $upload_path, '');
	$success = $upload->upload(true);
	if($success) {
		$pathname = 'attachment/' . $upload->getPathName();
		$filesize = Common::cvtByte(filesize($upload_path.$upload->getPathName()));
		$filetype = $upload->getType();

		$loadid = $_POST['load'];
		echo '<span style="font-size:12px;">' . sprintf($_LANG['upload_attachment_success_tip'], $success) . '--<a href="javascript:void(0)" onclick="self.parent.tb_remove();">' . $_LANG['close'] . '</a></span>';
		echo '<script type="text/javascript">self.parent.document.getElementById("' . $loadid . '").value="' . $pathname . '"; self.parent.document.getElementById("preview").innerHTML="' . $filesize . '"; self.parent.document.getElementById("attach_type").value="' . $filetype . '"; setTimeout("self.parent.tb_remove()", 3000);</script>';

		exit;

	} else {
		echo '<script type="text/javascript">setTimeout("self.parent.tb_remove()", 3000);</script>';
		exit($upload->errorMsg());
	}
} elseif(!isset($_GET['load'])) {
	echo "Parameter Error, missing 'load' parameter or the file you uploaded is too large.";
	echo '<a href="javascript:void(0)" onclick="self.parent.tb_remove()">CLOSE</a>';
	exit(1);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
function checkForm(fobj) {
	if(!fobj.attach.value) {
		alert('Please choose a file you want to upload.');
		return(false);
	} else {
		fobj.submit.value="<?php echo $_LANG['please_waiting']; ?>";
		fobj.cancel.disabled = true;
		fobj.submit.disabled = true;
		document.getElementById('info_tip').innerHTML = '<img src="images/loading.gif" border="0" />';
	}
}
</script>
<title><?php echo $_LANG['upload']; ?></title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" onsubmit="return checkForm(this)">
<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo 1024*1024*intval(ini_get('upload_max_filesize')); ?>"/>
<div style="font-size:12px;"><?php echo $_LANG['upload']; ?>: <input type="file" name="attach"/></div>
<br />
<input type="hidden" name="load" value="<?php echo $_GET['load']; ?>"/>
<input type="submit" name="submit" value="<?php echo $_LANG['upload']; ?>" />&nbsp;
<input type="button" name="cancel" value="<?php echo $_LANG['cancel']; ?>" onclick="self.parent.tb_remove();"/>

<div style="margin-top:20px; font-size:12px;" id="info_tip"><?php echo sprintf($_LANG['upload_attachment_maxsize'], ini_get('upload_max_filesize')); ?></div>

</form>

</body>
</html>