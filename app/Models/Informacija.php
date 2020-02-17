<?php

	namespace app\Models;

	class Informacija {
		private $db;

		public function __construct(DB $db) {
			$this->db = $db;
		}

		public function getAllFromInformation() {
			$query = "SELECT * FROM informacija";
			return $this->db->executeQueryAll($query);
		}
	}