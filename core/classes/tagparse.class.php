<?php
/**
 * Create on February 4, 2011
 * Author by Yorker
 */

class TagParse {
	private $innerText;
	private $result = '';

	private $vars = array();
	private $search = array();

	public function __construct($innerText) {
		$this->innerText = $innerText;
		preg_match_all('/\[field:(\w+)\s*\/\]/', $this->innerText, $matches);
		if(count($matches) == 2) {
			$this->search = $matches[0];
			$this->vars = $matches[1];
		}
	}

	public function assign(&$data) {
		if(is_array($this->search) && is_array($this->vars) && count($this->search) == count($this->vars)) {
			$len = count($this->vars);
			$tmp = $this->innerText;
			for($i = 0; $i < $len; $i++) {
				if(isset($data[$this->vars[$i]])) {
					$tmp = str_replace($this->search[$i], $data[$this->vars[$i]], $tmp);
				} else {
					$tmp = str_replace($this->search[$i], '', $tmp);
				}				
			}
			$this->result .= $tmp;
			unset($tmp);
		}
	}

	public function getResult() {
		if($this->result) {
			return $this->result;
		}
		return $this->innerText;
	}

	public function __destruct() {}
}