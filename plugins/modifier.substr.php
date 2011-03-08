<?php
function smarty_modifier_substr($str, $len, $is_byte=true) {
	if($len <= 0) {
		return $str;
	}
	if ($str === mb_convert_encoding(mb_convert_encoding($str, "UTF-32", "UTF-8"), "UTF-8", "UTF-32")) {
		if($is_byte) {
			return _substr_utf($str, $len);
		} else {
			$j = 0;
			$append = 0;
			for($i = 0; $i < $len; $i++) {
				$temp_str=substr($str, $j, 1);			
				if(ord($temp_str) >= 224) {
					$j+=3;			
				} elseif(ord($temp_str) >= 192) {
					$j+=2;
				} else {
					$j++;
					$append++;
				}
			}
			return _substr_utf($str, $j+$append);
		}

		
	} else {
		if($is_byte) {
			return _substr_gkb($str, $len);
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
			return _substr_gbk($str, 0, $j+$append);
		}
	}
}

function _substr_utf($str, $len) {
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

function _substr_gbk($str, $len) {
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
