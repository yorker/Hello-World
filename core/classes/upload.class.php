<?php
/*
 * @Created on Jul 18, 2009
 * @Author by Yorker
 */

interface baseUpload {
	public function genName();
	public function upload($is_rename=false);
	public function resized($width, $height='', $postfix = '_thumb');
	public function getName();
	public function getPathName();
	public function errorMsg();
    public function getDimension($path);
}

final class Upload implements baseUpload {
	private $uploaddir = null;

	private $name;
	private $type;
	private $tmp_name;
	private $error;
	private $size;

	private $genName;
	private $errorMsg="";
	private $types;
	private $month;

	function __construct($name, $uploaddir, $types="") {
		if(isset($_FILES[$name]) && is_array($_FILES[$name])) {
			$this->name = $_FILES[$name]['name'];
			$this->type = $_FILES[$name]['type'];
			$this->tmp_name = $_FILES[$name]['tmp_name'];
			$this->error = $_FILES[$name]['error'];
			$this->size = $_FILES[$name]['size'];
			$this->genName = $_FILES[$name]['name'];
			$this->uploaddir = $uploaddir;
			$this->month = date('Ym');
			$this->errorMsg = "";
			$this->types = "";
			if(!empty($types)) {
				if(is_array($types)) {
					$this->types = $types;
				} else {
					$this->types[] = $types;
				}
			}
		} else {
			trigger_error("Initialize upload class failure!");
		}
	}

	public function genName() {
		if(is_array($this->name)) {
			$cnt = count($this->name);
			for($i = 0; $i < $cnt; $i++) {
				$this->genName[$i] = $this->_generateName($this->name[$i]);
			}
		} else {
			$this->genName = $this->_generateName($this->name);
		}
	}

	public function upload($is_rename=false) {
		$success = 0;
		$this->_createUpload() or exit('Create the upload directory failed, it\'s probably that you have no privilege!');
		if($is_rename) {
			$this->genName();
		}
		if(isset($this->error)) {
			if(is_array($this->error)) {
				//说明是批量的
				$cnt = count($this->error);
				for($i = 0; $i < $cnt; $i++) {
					if($this->error[$i] === 0 && $this->_verifyType($this->type[$i])) {
						if(move_uploaded_file($this->tmp_name[$i], $this->uploaddir . '/' . $this->genName[$i])) {
							$success++;
						} else {
							$this->errorMsg .= 'System Error: file ' . $this->name[$i] . ' upload failed.<br />';
						}
					} elseif($this->error[$i] != 4) {
						$this->errorMsg .= '你上传的文件 ' . $this->name[$i] . ' 超过了上传的最大限制' . ini_get('upload_max_filesize') . '，或者不支持该种格式的文件。<br />';
					}
				}
			} else {
				if($this->error === 0 && $this->_verifyType($this->type)) {
					if(move_uploaded_file($this->tmp_name, $this->uploaddir . DIRECTORY_SEPARATOR . $this->genName)) {
						$success++;
					} else {
						$this->errorMsg .= 'System Error: file ' . $this->name . ' upload failed.<br />';
					}
				} elseif($this->error != 4) {
					$this->errorMsg .= '你上传的文件 ' . $this->name . ' 超过了上传的最大限制' . ini_get('upload_max_filesize') . '，或者不支持该种格式的文件。<br />';
				}
			}
		}
		return $success;
	}

    public function getDimension($path) {
        $info = getimagesize($path);
        if($info !== false) {
        	return array('width'=>$info[0], 'height'=>$info[1]);
        }
        return false;
    }

	public function getName() {
		return $this->name;
	}

	public function getPathName() {
		if(isset($this->genName)) {
			if(is_array($this->genName)) {
				$gens = array();
				foreach($this->genName as $gen) {
					$gens[] = $this->month .'/' . $gen;
				}
				return $gens;
			} else {
				return $this->month . '/' . $this->genName;
			}
		}
	}

    public function getType() {
    	return $this->type;
    }

	public function errorMsg() {
		return $this->errorMsg;
	}


    /**
     * 生成缩略图
     */
     final public function resized($width, $height='', $postfix = '_thumb') {
     	if(!is_array($this->genName)) {
			$genName[] = $this->genName;
     	} else {
     		$genName = $this->genName;
     	}
		
        if(isset($genName) && is_array($genName)) {
        	$cnt = count($genName);
            for($i = 0; $i < $cnt; $i++) {
                $filename = $this->uploaddir . '/' . $genName[$i];

                if(file_exists($filename)) {
                    //生成一个新的图片名称
                    $tmpname = substr($genName[$i], 0, strrpos($genName[$i], '.')) . $postfix . strrchr($genName[$i], '.');
                    $tmpname = $this->uploaddir . '/' . $tmpname;
                    $t = substr($genName[$i], strrpos($genName[$i], '.')+1);
                    $t = strtolower($t);

                    //原文件的大小
                    list($w, $h) = getimagesize($filename);
					if(empty($height)) {
						$height = intval(($h/$w) * $width);
					}
					
					$thumb_ratio = $width / $height;
                    $img_ratio = $w / $h;
                    if ($thumb_ratio > $img_ratio) {
                        $new_height = $height;
                        $new_width = $img_ratio * $height;
                    } else {
                        $new_height = $width / $img_ratio;
                        $new_width = $width;
                    }

                    if ($new_height > $height) {
                        $new_height = $height;
                    }
                    if ($new_width > $width) {
                        $new_height = $width;
                    }
					
					/*$new_width = $width;
					$new_height = $height;*/

                    $im = imagecreatetruecolor($width, $height);
                    if (!@imagefilledrectangle($im, 0, 0, $width-1, $height-1, imagecolorallocate($im, 250,250,250))) {
                        // Fill the image black
                        echo "ERROR:Could not fill new image";
                        exit(0);
                    }


                    switch($t) {
                    	case 'jpeg':
                        case 'jpg':
                            $im_src = imagecreatefromjpeg($filename);
                            imagecopyresampled($im, $im_src, ($width-$new_width)/2, ($height-$new_height)/2, 0, 0, $new_width, $new_height, $w, $h);
                            imagejpeg($im, $tmpname);
                            break;
                        case 'gif':
                            $im_src = imagecreatefromgif($filename);
                            imagecopyresampled($im, $im_src, ($width-$new_width)/2, ($height-$new_height)/2, 0, 0, $new_width, $new_height, $w, $h);
                            imagegif($im, $tmpname);
                            break;
                        case 'png':
                            $im_src = imagecreatefrompng($filename);
                            imagecopyresampled($im, $im_src, ($width-$new_width)/2, ($height-$new_height)/2, 0, 0, $new_width, $new_height, $w, $h);
                            imagepng($im, $tmpname);
                            break;
						default:
							exit('Sorry, the type of image is not supported and can not generate thumbnail.');
                    }
                }
            }
        }
     }


     private function _createUpload() {
     	$this->uploaddir = $this->_stripTail($this->uploaddir);
     	$this->uploaddir = $this->uploaddir . DIRECTORY_SEPARATOR . $this->month;
		$this->uploaddir = str_replace('\\', '/', $this->uploaddir);

     	if(!file_exists($this->uploaddir)) {
			return mkdir($this->uploaddir, 0777, true);
     	}
     	return true;
     }


    /**
	 * 除去路径最后的反斜杆或斜杆
	 */
	private function _stripTail($path) {
		$path = trim($path);
		$pattern = '/[\/|\\\]{1,2}$/';
		$path = preg_replace($pattern, '', $path);
		return $path;
	}

	private function _verifyType($type) {
		if(empty($this->types)) {
			return true;
		} else {
			foreach($this->types as $types) {
				if(strpos($type, $types) !== false) {
					return true;
				}
			}
			return false;
		}
	}

	private function _generateName($name) {
		$postfix = substr($name, strrpos($name, '.'));
		return date('dHis') . chr(rand(ord('a'), ord('z'))) . chr(rand(ord('a'), ord('z'))). chr(rand(ord('a'), ord('z'))) . $postfix;
	}

	function __destruct() {
	}
}