<?php

	namespace app\Models;

	class Komentar {
		private $db;

		public function __construct(DB $db) {
			$this->db = $db;
		}

		public function getAllFromKomentar() {
			$query = "SELECT k.id, k.naslov, k.poruka, kor.ime, kor.prezime FROM komentar k INNER JOIN korisnik kor ON k.id_korisnik = kor.id";
			return $this->db->executeQueryAll($query);
		}

		public function insertKomentar($subject, $message, $idKor) {
			$query = "INSERT INTO komentar (naslov, poruka, id_korisnik) 
									values(?, ?, ?) ";
			$this->db->executeNonGet($query, [$subject, $message, $idKor]);
		}

		function deleteComment($id) {
			$query = "DELETE FROM komentar WHERE id = ?";
			$this->db->executeNonGet($query, [$id]);

			header("Location: index.php?page=admin");
		}
	}