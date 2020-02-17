<?php

	namespace app\Models;

	class Nav {
		private $db;

		public function __construct(DB $db) {
			$this->db = $db;
		}

		public function getAllFromNav() {
			$query = "SELECT * FROM nav";
			return $this->db->executeQueryAll($query);
		}
	}