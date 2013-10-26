<?php
	/*
		简单数据存储类
		By oott123 http://best33.com
		利用简单的数据文件存储数据，没有数据库的功能，适用于小型数据存储。
		保存的文件格式为PHP，在正常条件下不会被读取。
		将使用序列化保存数据。
	*/
	class SimpleData{
		var $db_dir;
		public function __construct($db_dir){
			//构造函数，创建目录，判断权限
			if(!is_dir($db_dir)){
				mkdir($db_dir);
			}
			if(!is_writable($db_dir)){
				return false;
			}
			$this->db_dir = rtrim($db_dir,'/').'/';	//保证目录右边有个/
			return true;
		}
		public function write($db_name,$data){
			//写入一个文件
			$dbfile = $this->get_db_file($db_name);
			$data = '<?php return unserialize("'.addslashes(serialize($data)).'");';
			file_put_contents($dbfile,$data);
		}
		public function read($db_name){
			$dbfile = $this->get_db_file($db_name);
			if(!is_file($dbfile)){
				return false;
			}
			return include $dbfile;
		}
		private function get_db_file($db_name){
			return $this->db_dir.$db_name.'.php';
		}
	}