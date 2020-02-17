<?php

	namespace app\Models;

	class About {
		private $db;

		public function __construct(DB $db) {
			$this->db = $db;
		}

		public function getAllFromAbout() {
			$query = "SELECT * FROM about";
			return $this->db->executeQuery($query);
		}

		public function getAllFromKuvar() {
			$query = "SELECT * FROM kuvar";
			return $this->db->executeQueryAll($query);
		}

		public function getAllFromFollowIkonice() {
			$query = "SELECT * FROM follow_ikonice";
			return $this->db->executeQueryAll($query);
		}
	}