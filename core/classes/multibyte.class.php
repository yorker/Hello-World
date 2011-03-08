<?php
class Multibyte {
	private $orders = array('ascii', 'gbk', 'utf-8');

	public function __construct() {
		mb_detect_order($this->orders);
	}

	public function setGBK(&$data) {
		if(is_array($data)) {
			foreach($data as &$d) {
				$this->setGBK($d);
			}
		} else {
			if($this->isUTF($data)) {
				$data = mb_convert_encoding($data, 'gbk', 'UTF-8');
			}
		}
	}

	public function setUTF(&$data) {
		if(is_array($data)) {
			foreach($data as &$d) {
				$this->setUTF($d);
			}
		} else {
			if($this->isGBK($data)) {
				$data = mb_convert_encoding($data, 'utf-8', 'gbk');
			}
		}
	}

	public function isUTF($str) {
		return $str === mb_convert_encoding(mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32');
	}

	public function isAscii($str) {
		return $str === mb_convert_encoding(mb_convert_encoding($str, 'UTF-32', 'ascii'), 'ascii', 'UTF-32');
	}

	public function isGBK($str) {
		return $str === mb_convert_encoding(mb_convert_encoding($str, 'UTF-32', 'GBK'), 'GBK', 'UTF-32');
	}

	public function isGB2312($str) {
		return $str === mb_convert_encoding(mb_convert_encoding($str, 'UTF-32', 'GB2312'), 'GB2312', 'UTF-32');
	}

	public function getEncoding($str) {
		return mb_detect_encoding($str);
	}

	public function getOrder() {
		return mb_detect_order();
	}
}