<?php

	namespace app\Models;

	class Specials {
		private $db;

		public function __construct(DB $db) {
			$this->db = $db;
		}

		public function getAllSpecials() {
			$query = "SELECT * FROM menu WHERE istaknut = 1";
			return $this->db->executeQueryAll($query);
		}
	}