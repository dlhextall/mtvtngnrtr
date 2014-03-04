<?php

namespace library\database;

class DatabaseConnection {

	private static $host = '';
	private static $dbname = '';
	private static $username = '';
	private static $passwd = '';

	private static $instance = null;
	private $connection = null;

	private function __construct() {
		try {
			$this->connection = new \PDO("mysql:host=$host;dbname=$dbname;charset=utf-8", $username, $passwd, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			$this->connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
			$this->connection->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (\PDOException $e) {
			throw $e;
		}
	}

	public static function getInstance() {
		if (self::$instance === null) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function prepare($_query) {
		return $this->connection->prepare($_query);
	}

}

?>