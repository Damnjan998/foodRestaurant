<?php

	namespace app\Models;

	class DB {
		private $server;
		private $database;
		private $username;
		private $password;

		public $conn;

		public function __construct($server, $database, $username, $password) {
			$this->server = $server;
			$this->database = $database;
			$this->username = $username;
			$this->password = $password;

			$this->connect();
		}

		private function connect() {
			$this->conn = new \PDO("mysql:host={$this->server};dbname={$this->database};charset=utf8", $this->username, $this->password);

			$this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);

			$this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		}

		public function executeQueryAll($query) {
			return $this->conn->query($query)->fetchAll();
		}

		public function executeQuery($query) {
			return $this->conn->query($query)->fetch();
		}

		public function executeQueryWithParams($query, $params) {
			$prepare = $this->conn->prepare($query);
			$prepare->execute($params);
			return $prepare->fetch();
		}

		public function executeQueryWithParamsAll($query, $params) {
			$prepare = $this->conn->prepare($query);
			$prepare->execute($params);
			return $prepare->fetchAll();
		}

		public function executeNonGet($query, $params) {
			$prepared = $this->conn->prepare($query);
			$prepared->execute($params);
		}
	}