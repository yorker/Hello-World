<?php
/**
 * 数据库配置信息
 */

class Config {
	//数据库配置
	public $server='localhost';
    public $username='root';
    public $password='84373723';
    public $dbName='site';
	public $prefix='ste_';
    public $encoding='utf8';

	//语言配置
	public $locals = array('zh_cn', 'en_us');
	
	//伪静态配置
	public $backend_rewrite =  1;
	
	//商品货号前缀
	public $sn_prefix = 'DRE';
}

