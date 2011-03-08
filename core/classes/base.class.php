<?php
/*
 * Created on Sep 21, 2009
 * Author by Yorker
 */
class Base {
	static function addslashes(&$array) {
		foreach($array as $key=>&$value) {
			if(!is_array($value)){
				$value = addslashes($value);
			} else {
				self::addslashes($value);
			}
		}
	}

	static function stripslashes(&$array) {
		foreach($array as $key=>&$value) {
			if(!is_array($value)) {
				$value = stripslashes($value);
			} else {
				self::stripslashes($value);
			}
		}
	}

	//计算离当前时刻的时间差
	static function before($time) {
		if(!is_numeric($time)) {
			$time = strtotime($time);
		}
		$bwt = time() - $time;
		$year = 3600*24*365;
		$month = 3600*24*30;
		$week = 3600*24*7;
		$day = 3600*24;
		$hour = 3600;
		$minute = 60;
		$second = 1;
		if(intval($bwt/$year) > 0) {
			return intval($bwt/$year) . '年前';
		} elseif(intval($bwt/$month) > 0) {
			return intval($bwt/$month) . '个月前';
		} elseif(intval($bwt/$week) > 0) {
			return intval($bwt/$week) . '个星期前';
		} elseif(intval($bwt/$day) > 0) {
			return intval($bwt/$day) . '天前';
		} elseif (intval($bwt/$hour) > 0) {
			return intval($bwt/$hour) . '小时前';
		} elseif (intval($bwt/$minute) > 0) {
			return intval($bwt/$minute) . '分钟前';
		} elseif (intval($bwt/$second) > 0) {
			return intval($bwt/$second) . '秒钟前';
		} else {
			return null;
		}
	}

	static function html2text($str) {
		$str = preg_replace('/<br \/>|<br>|<p>|<P>|<BR>/i', "\n", $str);
		$str = preg_replace('/&nbsp;/i', ' ', $str);
		$str = preg_replace('/\r\n|\r|\n/i', "\n", $str);
		$str = preg_replace('/&gt;/i', '>', $str);
		$str = preg_replace('/&lt;/i', '<', $str);
		$str = preg_replace('/&ldquo;|&rdquo;/i', '"', $str);
		$str = preg_replace('/<[\/\!]*?[^<>]*?>/i', '', $str);
		$str = preg_replace('/.*?[{]*?[}]/i', '', $str);
		return $str;
	}

	static function text2html($str) {
		$szRes = "";
		$nIndex = 0;
		$szCon = $str;
		while ($nIndex < strlen($szCon)) {
			switch (ord($szCon[$nIndex])) {
				case 10:
				case 13:
					$szRes .= '<br />';
					break;
				case 32:
					$szRes .= '&nbsp;';
					break;
				default:
					$szRes .= $szCon[$nIndex];
					break;
			}
			$nIndex++;
		}
		return $szRes;
	}

	/**
	 * 截取字符串长度（包括UTF-8和GBK）
	 * param $str String 待截取的字符串
	 * param $len integer 截取长度
	 * param $is_byte 是否按字节来截取
	 */
	static function substr($str, $len, $is_byte = true) {
		if(self::isUTF8($str)) {
			if($len <= 0) {
				return $str;
			}
			if($is_byte) {
				return self::_substr_utf($str, $len);
			} else {
				$j = 0;
				$append = 0; //调整英文字符
				for($i = 0; $i < $len; $i++) {
					$temp_str=substr($str, $j, 1);
					if($temp_str === false) {
						break;
					}
					if(ord($temp_str) >= 224) {
						$j+=3;
					} elseif(ord($temp_str) >= 192) {
						$j+=2;
					} else {
						$j++;
						$append++;
					}
				}
				return self::_substr_utf($str, $j+$append);
			}

		} else {
			if($len <= 0) {
				return $str;
			}
			if($is_byte) {
				return self::_substr_gbk($str, $len);
			} else {
				$j = 0;
				$append = 0;
				for($i = 0; $i < $len; $i++) {
					$temp_str=substr($str, $j, 1);
					if(ord($temp_str) > 129) {
						$j+=2;
					} else {
						$j++;
						$append++;
					}
				}
				return self::_substr_gbk($str, $j+$append);
			}
		}
	}

	static function _substr_utf($str, $len) {
		$i = 1;
		$end = 0;
		while($i <= $len) {
			$end = $i;
			$temp_str=substr($str, $i, 1);
			if(ord($temp_str) >= 224) {
				$i+=3;
			} elseif(ord($temp_str) >= 192) {
				$i+=2;
			} else {
				$i++;
			}
		}
		return substr($str, 0, $end);
	}

	static function _substr_gbk($str, $len) {
		$i = 1;
		$end = 0;
		while($i <= $len) {
			$end = $i;
			$temp_str=substr($str, $i, 1);
			if(ord($temp_str) > 129) {
				$i+=2;
			} else {
				$i++;
			}
		}
		return substr($str, 0, $end);
	}

	/**
	 * 计算中文字符串长度
	 */
	 static function strlen($str) {
		if(self::isUTF8($str)) {
			$j = 0;
			$i = 0;
			$len = strlen($str);
			while($i < $len) {
				$temp_str = substr($str, $i, 1);
				if(ord($temp_str) >= 224) {
					$i += 3;
				} elseif(ord($temp_str) >= 192) {
					$i += 2;
				} else {
					$i++;
				}
				$j++;
			}
			return $j;
		} else {
			$j = 0;
			$i = 0;
			$len = strlen($str);
			while($i < $len) {
				$temp_str = substr($str, $i, 1);
				if(ord($temp_str) >= 129) {
					$i += 2;
				} else {
					$i++;
				}
				$j++;
			}
			return $j;
		}

	 }

	 //数据库加密函数
	static function encrypt($data, $salt='IOCio89y') {
		return md5(base64_encode($data.$salt));

	}

	//获得一个请求参数，可以提供默认值，第三个参数默认为GET
	 static function getParameter($name, $default='') {
		if(isset($_REQUEST[$name]) && self::check($_REQUEST[$name])) {
			return $_REQUEST[$name];
		}
		return $default;
	 }

	 //下载文件
	static function download($filename, $rename = '') {
		error_reporting(0);
        if(empty($rename)) {
        	$rename = basename($filename);
        } else {
        	$ext = substr(basename($filename), strrpos(basename($filename), '.'));
            if(!preg_match('/' . $ext . '$/', $rename)) {
            	$rename .= $ext;
            }
        }

		header('Content-Description: File Transfer');
		header('Content-Transfer-Encoding: binary');
		header('Content-Type: application/octet-stream');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Disposition: attachment; filename=' . $rename);
		header('Content-Length: ' . filesize($filename));
		ob_clean();
		flush();
		readfile($filename);
		exit;
	}

	//文件大小单位转化
	static function cvt($bytes) {
		$k = round($bytes / 1024, 2);
		if($k < 1) {
			return $bytes . 'B';
		}
		$m = round($k / 1024, 2);
		if($m < 1) {
			return $k . 'KB';
		}
		return $m . 'MB';
	}

	//判断字符是否为UTF-8
	static function isUTF8($str) {
	   if ($str === mb_convert_encoding(mb_convert_encoding($str, "UTF-32", "UTF-8"), "UTF-8", "UTF-32")) {
			return true;
	   } else {
			return false;
	   }
	}

	/**
	 *数据验证
	 *验证一个数组内的部分数据是否为空
	 *如果验证不通过将会产生错误退出
	 */
	static function checkArray() {
		$args = func_num_args();
		if($args > 1) {
			$arr = func_get_arg(0);

			if(!is_array($arr)) {
				trigger_error('The first parameter you support must be an array.');
			}
			for($i = 1; $i < $args; $i++) {
				if(!isset($arr[func_get_arg($i)]) || (empty($arr[func_get_arg($i)]) && !is_numeric($arr[func_get_arg($i)]))) {
					exit("Parameter Error: '" . func_get_arg($i) . "' is not set.");
				}
			}
		} else {
			trigger_error('The number of arguments you support is incorrect.');
		}
		//print_r(func_get_args());
		//var_dump(func_get_arg(0));
	}

	static function check($data, $datatype='') {
		switch($datatype) {
			case 'EMAIL':
				break;
			case 'NUM':
				if(is_numeric($data)) {
					return true;
				}
				break;
			case 'URL':
				break;
			default:
				if(!empty($data) || is_numeric($data)) {
					return true;
				}
		}
		return false;
	}

	/**
	 * 显示一段提示信息，然后重定向到另外一个页面
	 * param $parompt string 提示信息
	 * param $redirectUrl 重定向的URL
	 */
	static function setRedirect($prompt_info, $redirectUrl, $error=false) {
		$document_root = str_replace('\\', '/', self::stripTail($_SERVER['DOCUMENT_ROOT']));
		$thisfile = str_replace('\\', '/', __FILE__);
		$thisurl = str_replace($document_root, 'http://'.$_SERVER['HTTP_HOST'], $thisfile);
		$imgpath = dirname(dirname($thisurl)) . '/images';

		echo '<script type="text/javascript">setTimeout("location.href=\'' . $redirectUrl . '\'", 3000);</script>';
		if($error) {
			$title = '出错啦!';
			$color = ' color:#FF0000';
			$info_color = ' color:#FF0000';
			$icon = 'tip_logo_fail.jpg';
		} else {
			$title = '成功啦！';
			$color = '';
			$info_color = '';
			$icon = 'tip_logo.jpg';
		}
		$output = '
			<div style="text-align:center">
				<div style="width:550px;font-size:12px;margin:0 auto;margin-top:100px;text-align:left;">
					<div style="background:url('.$imgpath.'/tip_top.gif) no-repeat; height:25px;">&nbsp;</div>
					<div style="border-left:1px solid #C00925; background:url('.$imgpath.'/'.$icon.') no-repeat scroll right center; height:150px; width:90%">
						<p style="margin:0px; text-align:left; padding:12px 0px 12px 22px; margin-left:12px; background:url('.$imgpath.'/tip_pointer.gif) no-repeat scroll left center; font-size:14px;font-weight:bold; '.$color.'">'.
							$title
						.'</p>
						<p style="margin:0px; text-align:left; padding:0px 0px 8px 12px; '.$info_color.'">'.$prompt_info.'</p>
						<p style="margin:0px; text-align:left; padding:24px 0px 0px 12px;">浏览器将在三秒后自动跳转，如果没有跳转，请点击<a href="' . $redirectUrl . '">这里</a></p>
					</div>
					<div style="background:url('.$imgpath.'/tip_bottom.gif) no-repeat; height:7px">&nbsp;</div>
				</div>
			</div>';
		echo $output;
		exit(1);
	}

	static function redirect($url) {
        $cur_location = dirname($_SERVER['SCRIPT_NAME']);
		if($cur_location == '/') {
			$cur_location = '';
		}
        $url = $cur_location . '/' . $url;
		header("Location:" . $url);
	}

	/**
	 * 解析JSON数据，支持数组
	 */
	static function parseJson(&$data) {
		if(is_array($data)) {
			foreach($data as &$v) {
				self::parseJson($v);
			}
		} else {
			$tmp = json_decode($data, true);
			if($tmp) {
				$data = $tmp;
			} else {
				$tmp = json_decode(stripslashes($data), true);
				if($tmp) {
					$data = $tmp;
				}
			}
		}
	}

	/*判断验证码是否正确*/
	static function vcode($enc_code, $vcode='') {
		if(!isset($_SESSION)) {
			session_start();
		}
		if($vcode && isset($_SESSION['scode']) && strtoupper($vcode) != strtoupper($_SESSION['scode'])) {
			return false;
		}
		$scode = md5(strtoupper($_SESSION['scode']));
		unset($_SESSION['scode']);
		return ($scode == $enc_code);
	}

	static function debug($data) {
		if(is_array($data)) {
			echo '<pre>';
			print_r($data);
			echo '</pre>';
			exit;
		} else {
			var_dump($data);
		}
		exit;
	}

	/**
	 * 给扩展名的前面添加一个后缀，如ab892.gif=>ab892_thumb.gif
	 */
	static function addPostfix($filename, $postfix) {
		return preg_replace('/\./', $postfix.'.', $filename);
	}

	//除去路径最后的反斜杠
	 static function stripTail($path) {
		$path = trim($path);
		$pattern = '/[\/|\\\]{1,2}$/';
		$path = preg_replace($pattern, '', $path);
		return $path;
	}

	//缩略图片的大小
	static function resized($in_file, $width, $height='', $out_dir='', $postfix = '_thumb', $is_rate=true) {
     	$info = getimagesize($in_file);
		$w = $info[0];
		$h = $info[1];
		$type = $info['mime'];
		$type = explode('/', $type);
		if(!isset($type[0]) || $type[0] != 'image' || !isset($type[1])) {
			trigger_error('The file you provided is invalidate!');
		}

		if(empty($height)) {
			$height = intval($width * ($h/$w));
		}

		$filename = basename($in_file);
        if($out_dir) {
        	$out_dir = self::stripTail($out_dir);
        } else {
        	$out_dir = dirname($in_file);
        }

		if(!file_exists($out_dir)) {
			mkdir($out_dir, 0777, true) or exit('Create directory failed, maybe you have no privilege. Error Code：1209');
		}
		$out_file = $out_dir . '/' . self::addPostfix($filename, $postfix);


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

		//如果指定不用等比例缩放，则还原
		if(!$is_rate) {
			$new_width = $width;
			$new_height = $height;
		}

        $im = imagecreatetruecolor($width, $height);
        if(!$im) {
        	exit('Error: Can not create an image handle...');
        }
        if(!imagefilledrectangle($im, 0, 0, $width-1, $height-1, imagecolorallocate($im, 250,250,250))) {
        	exit('Error: Can not fill rectangle...');
        }

		switch($type[1]) {
			case 'jpeg':
			case 'jpg':
				$im_src = imagecreatefromjpeg($in_file);
				imagecopyresampled($im, $im_src, ($width-$new_width)/2, ($height-$new_height)/2, 0, 0, $new_width, $new_height, $w, $h);
				imagejpeg($im, $out_file);
				break;
			case 'gif':
				$im_src = imagecreatefromgif($in_file);
				imagecopyresampled($im, $im_src, ($width-$new_width)/2, ($height-$new_height)/2, 0, 0, $new_width, $new_height, $w, $h);
				imagegif($im, $out_file);
				break;
			case 'png':
				$im_src = imagecreatefrompng($in_file);
				imagecopyresampled($im, $im_src, ($width-$new_width)/2, ($height-$new_height)/2, 0, 0, $new_width, $new_height, $w, $h);
				imagepng($im, $out_file);
				break;
		  }
          return $out_file;
     }

	 //获取一个请求参数，先查看$_GET， 再查看$_POST, 最后查看$_COOKIE
	 static function getParam($name) {
		 if(isset($_GET[$name]) && (is_numeric($_GET[$name]) || !empty($_GET[$name]))) {
			 return $_GET[$name];
		 } elseif(isset($_POST[$name]) && (is_numeric($_POST[$name]) || !empty($_POST[$name]))) {
			 return $_POST[$name];
		 } elseif(isset($_COOKIE[$name]) && (is_numeric($_COOKIE[$name]) || !empty($_COOKIE[$name]))) {
			 return $_COOKIE[$name];
		 } else {
			 exit('Get parameter failed: missing "' . $name . '" parameter');
		 }
	 }

	/**
	 * 生成一串随机字符
	 * @param $len integer 定义所生成字符的长度
	 * @param $isDigit boolen 是否为数字
	 * @return string
	 */
	static function randStr($len, $isDigit = false) {
		if(is_numeric($len) && $len > 0) {
			$tmp = '';
			if($isDigit) {
				for($i = 0; $i < $len; $i++) {
					$tmp .= chr(rand(ord('0'), ord('9')));
				}
			} else {
				for($i = 0; $i < $len; $i++) {
					$tmp .= chr(rand(ord('A'), ord('Z')));
				}
			}

			return $tmp;
		} else {
			trigger_error('Invalide parameter in function ' . __FUNCTION__ . '()');
		}
	}

	/**
	 * 系统错误
	 */
	static function error($msg='', $code = 1000) {
		$msg = !empty($msg) ? $msg : 'illegal Request';
		die('<h2>Error: ' . $msg . '; Error code: ' . $code . ' </h2>');
	}

    /**
     * 将一个目录的所有非目录文件清空
     */
    static function clearDir($path) {
		if(file_exists($path)) {
			$path = self::stripTail($path) . '/';
			$hd = dir($path);
			if($hd) {
				while(false !== ($entry = $hd->read())) {
					if($entry != '.' && $entry != '..') {
						if(is_dir($path . $entry)) {
							self::clearDir($path . $entry);
						} else {
							unlink($path . $entry) or exit('Delete file failed: ' . $path . $entry);
						}
					}
				}

			}
		}
    }

	/**
	 * 文件大小单位转换
	 */
	 static function cvtByte($byte) {
		 $k = 1024;
		 $m = 1024 * 1024;
		 $g = 1024 * 1024 * 1024;
         if(intval($byte/$g)) {
            return round((float)$byte/$g, 2) . 'GB';
         } elseif(intval($byte/$m)) {
         	return round((float)$byte/$m, 2) . 'MB';
         } elseif(intval($byte/$k)) {
         	return round((float)$byte/$k, 2) . 'KB';
         } else {
         	return $byte . 'B';
         }
	 }

	 //获取文件或目录的大小
	static function getSize($filename) {
		$size = 0;
		$filename = self::stripTail($filename);
		self::_getSize($size, $filename);
		return self::cvtByte($size);
	}
	static function _getSize(&$size, $filename) {
		if(is_file($filename)) {
			$size += filesize($filename);
		} else {
			$filename = self::stripTail($filename);
			$d = dir($filename);
			while(false !== ($entry = $d->read())) {
				if($entry != '.' && $entry != '..') {
					if(is_file($d->path . '/' . $entry)) {
						$size += filesize($d->path . '/' . $entry);
					} elseif(is_dir($d->path . '/' . $entry)) {
						self::_getSize($size, $d->path . '/' . $entry);
					}
				}
			}
			$d->close();
		}
	}

	 static function writeFile($filename, $content) {
		$dirname = dirname($filename);
		self::mkdir($dirname);
		return file_put_contents($filename, $content);
	 }

     static function mkdir($dirname) {
     	if(!file_exists($dirname)) {
     		mkdir($dirname, 0755, true) or exit('Create directory "' . $dirname . '" failed, maybe you have no privilege!');
     	}
     }

	 static function readFile($filename) {
	 	if(is_file($filename)) {
			return file_get_contents($filename);
	 	} else {
	 		return false;
	 	}
	 }

	static function getCurUrl() {
		$uri = $_SERVER['REQUEST_URI'];
		$uri = preg_replace('/[&\?]_t=[\d\.]+/', '', $uri);
		return $uri;
	}
	static function sql_like_quote($str) {
		return strtr($str, array("\\\\" => "\\\\\\\\", '_' => '\_', '%' => '\%', "\'" => "\\\\\'"));
	}

	static function getExecTime() {
		$time = explode(" ", microtime());
		$usec = (double)$time[0];
		$sec = (double)$time[1];
		return $sec + $usec;
	}

	static function unlink($filename) {
		if(file_exists($filename) && is_file($filename)) {
			unlink($filename) or die('You have no privilege to remove the file: ' . $filename);
			return true;
		}
	}
}

