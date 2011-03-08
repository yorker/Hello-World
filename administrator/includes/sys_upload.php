<?php
require_once("include.php");
/*参数设置 */
//路径
$upload_path = UPLOAD_PATH;
$upload_url = UPLOAD_URL;

//缩略图的宽和高
if(isset($_REQUEST['thumb_width']) && is_numeric($_REQUEST['thumb_width']) && isset($_REQUEST['thumb_height']) && is_numeric($_REQUEST['thumb_height'])) {
	$thumb_width = $_REQUEST['thumb_width'];
	$thumb_height = $_REQUEST['thumb_height'];
}


header('Content-Type: text/html; charset=' . CHARSET);
if(!empty($_FILES) && isset($_POST['load'])) {
	$upload = new Upload('img', $upload_path, 'image');
	$success = $upload->upload(true);
	if($success) {
		$pathname = $upload->getPathName();

		if(isset($thumb_width) && is_numeric($thumb_width) && isset($thumb_height) && is_numeric($thumb_height)) {
			$upload->resized($thumb_width, $thumb_height);
			$pname = Common::addPostfix($pathname, '_thumb');
		} else {
			$pname = $pathname;
		}

		$dim = $upload->getDimension($upload_path . $pname);
		if(isset($dim['width']) && $dim['width'] > 250) {
			$width = 'width=250';
		} else {
			$width = '';
		}
		$loadid = $_POST['load'];
		echo '<span style="font-size:12px;">' . sprintf($_LANG['upload_file_success_tip'], $success) . '--<a href="javascript:void(0)" onclick="self.parent.tb_remove();">' . $_LANG['close'] . '</a></span>';
		echo '<script type="text/javascript">self.parent.document.getElementById("' . $loadid . '").value="' . $pathname . '"; if(self.parent.document.getElementById("preview")) {self.parent.document.getElementById("preview").innerHTML="<img src=\"'. $upload_url . $pname.'\" ' . $width . ' style=\"margin-top:4px\"/>"} setTimeout("self.parent.tb_remove()", 3000);</script>';

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
	if(!fobj.img.value) {
		alert('Please choose a file you want to upload.');
		return(false);
	} else {
		fobj.submit.value="<?php echo $_LANG['please_waiting']; ?>";
		fobj.cancel.disabled = true;
		fobj.submit.disabled = true;
		document.getElementById('info_tip').innerHTML = '<img src="../images/loading.gif" border="0" />';
	}
}
</script>
<title><?php echo $_LANG['upload']; ?></title>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" onsubmit="return checkForm(this)">
<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo 1024*1024*intval(ini_get('upload_max_filesize')); ?>"/>
<div style="font-size:12px;"><?php echo $_LANG['upload_image']; ?>: <input type="file" name="img"/></div>
<br />

<?php if(isset($thumb_width) && is_numeric($thumb_width) && isset($thumb_height) && is_numeric($thumb_height)) { ?>

<input type="hidden" name="thumb_width" value="<?php echo $thumb_width; ?>"/>
<input type="hidden" name="thumb_height" value="<?php echo $thumb_height; ?>"/>

<?php } ?>

<input type="hidden" name="load" value="<?php echo $_GET['load']; ?>"/>

<input type="submit" name="submit" value="<?php echo $_LANG['upload']; ?>" />&nbsp;
<input type="button" name="cancel" value="<?php echo $_LANG['cancel']; ?>" onclick="self.parent.tb_remove();"/>

<div style="margin-top:20px; font-size:12px;" id="info_tip"><?php echo sprintf($_LANG['upload_image_maxsize'], ini_get('upload_max_filesize')); ?></div>

</form>

</body>
</html>