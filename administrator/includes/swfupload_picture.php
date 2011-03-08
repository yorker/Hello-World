<?php
	/* Note: This thumbnail creation script requires the GD PHP Extension.  
		If GD is not installed correctly PHP does not render this page correctly
		and SWFUpload will get "stuck" never calling uploadSuccess or uploadError
	 */
	include_once('include.php');

	ini_set("html_errors", "0");

	/**配置参数 begin**/
	$updir = UPLOAD_PATH;
	$updir = Common::stripTail($updir);
	
	/**配置参数 end**/

	// Check the upload
	if (!isset($_FILES["Filedata"]) || !is_uploaded_file($_FILES["Filedata"]["tmp_name"]) || $_FILES["Filedata"]["error"] != 0) {
		echo "ERROR:invalid upload";
		exit(0);
	}
	
	//创建目录
	$dir = $updir . '/' . date('Ym');
	if(!file_exists($dir)) {
		mkdir($dir, 0777) or exit('Can not create directory, maybe you don\'t have privilege...');
	}
	unset($dir);

	//构建文件名
	$tmp = date('Ym') . '/' . Common::randStr(3) . date('YmdHis');
	$ext = strrchr($_FILES['Filedata']['name'], '.');
	$filename = $tmp . $ext;

	$filename_small = $tmp . '_small' . $ext;

	$upfile = $updir . '/' . $filename;

	if(!move_uploaded_file($_FILES["Filedata"]["tmp_name"], $upfile)) {
		echo 'Error:upload failed';
		exit(0);
	}

	//最后一个参数为false,不使用用等比缩放
	$small_path = Common::resized($upfile, 125, 125, '', '_small', false); 

	$db->insert('picture_gallery', array('image'=>$filename, 'image_small'=>$filename_small)) or exit('Write Record Error: ' . $db->errorMsg());
	
	$last_id = $db->insertId();
	
	//生成的缩略图，提供给前台显示
	echo 'FILEID:' . str_replace(UPLOAD_PATH, UPLOAD_URL, $small_path) . '--' . $last_id;
	
?>