<?php
/*
 * Created on Jue 27, 2010
 * Author by Yorker
 */
interface BaseDb {
	static public function &getInstance();
	public function query($sql);
	public function table($table);
	public function insert($table, $kv);
	public function updateById($talbe, $kv, $id);
	public function getAffectedRows();
	public function getNumRows();
	public function count($table, $where='');
	public function loadAssoc($res=null);
	public function loadAssocList($res=null);
	public function loadResult($res=null);
	public function deleteById($table, $id);
	public function insertId();
	public function errorMsg();
	public function freeResult($res=null);

	public function getTableKey($table);
    public function isExist($table, $kv);
	public function getRowById($table, $id);
	public function getFieldById();

	public function autoWrite($datas, $table);

}