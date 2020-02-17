<?php

	namespace app\Models;

	class Evidencija {
		private $db;

		public function __construct(DB $db) {
			$this->db = $db;
		}

		function addAction($akcija, $idKorisnika) {
			$query = "INSERT INTO evidencija(akcija, datum_vreme, id_korisnik) VALUES (?, CURRENT_TIMESTAMP, ?)";
			$this->db->executeNonGet($query, [$akcija, $idKorisnika]);
		}

		public function getAction() {
			$query = "SELECT k.prezime, k.ime, e.akcija, e.datum_vreme FROM evidencija e INNER JOIN korisnik k ON k.id = e.id_korisnik
						ORDER BY datum_vreme DESC LIMIT 15";
			return $this->db->executeQueryAll($query);
		}
	}