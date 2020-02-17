<?php

	namespace app\Models;

	class Korisnik {
		private $db;

		public function __construct(DB $db) {
			$this->db = $db;
		}

		public function insertUser($firstName, $lastName, $email, $password, $aktivan, $role) {
			$query = "INSERT INTO korisnik (ime, prezime, email, lozinka, datum_registracije, aktivan, id_uloga)
                            values (?,?,?,?,CURRENT_TIMESTAMP,?,?)";
			$this->db->executeNonGet($query, [$firstName, $lastName, $email, md5($password), $aktivan, $role]);
		}

		public function getUser($email, $siframd5) {
			$query = "SELECT * FROM korisnik WHERE email=? AND lozinka=?";
			return $this->db->executeQueryWithParams($query, [$email, $siframd5]);
		}

		public function updateUser($aktivan, $id) {
			$query = "UPDATE korisnik SET aktivan=? WHERE id=?";
			$this->db->executeNonGet($query, [$aktivan, $id]);
		}

		public function getAllUsers() {
			$query = "SELECT * FROM korisnik";
			return $this->db->executeQueryAll($query);
		}

		public function getActiveUsers() {
			$query = "SELECT k.id, k.ime, k.prezime, k.email, u.naziv FROM korisnik k INNER JOIN uloga u ON k.id_uloga = u.id WHERE k.aktivan = 1";
			return $this->db->executeQueryAll($query);
		}

		function deleteUser($id) {
			$query = "DELETE FROM korisnik WHERE id = ?";
			$this->db->executeNonGet($query, [$id]);

			header("Location: index.php?page=admin");
		}
	}