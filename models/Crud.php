<?php

date_default_timezone_set("Africa/Nairobi");

class Crud {
	public $connect;
	private $host = '127.0.0.1';
	private $username = 'thekiharani';
	private $database = 'tks';
	private $password = 'pass12345word!';
	private $mysql_port = 3306;
	private $pgsql_port = 5432;

	// constructor
	public function __construct() {
		$this->dbConnect();
	}

	// db connection
	public function dbConnect() {
		try {
			// $this->connect = new PDO("mysql:host=$this->host; port=$this->mysql_port; dbname=$this->database", $this->username, $this->password); // mysql
			// $this->connect = new PDO("pgsql:host=$this->host; port=$this->pgsql_port; dbname=$this->database", $this->username, $this->password); // pgsql
			$this->connect = new PDO('sqlite:'.dirname(__DIR__, 1).'/storage/main.sqlite3'); // sqlite
			$this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // OBJECT
			$this->connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE); // EMULATION *
		} catch(PDOException $e) {
			echo 'DB Connection failed: '.$e->getMessage();
		}
	}

}