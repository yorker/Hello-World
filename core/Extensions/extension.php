<?php
/**
 * Component base class
 * Create On Feburary 20, 2011
 * Author By Yorker
 */
class Extension {
	protected $db;
	protected $sess;

	public function __construct() {
		$this->db = &MySql::getInstance();
		$this->sess = &new Session();
	}
}