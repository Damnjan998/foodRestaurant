<?php

	namespace app\Models;

	class Menu {
		private $db;

		public function __construct(DB $db) {
			$this->db = $db;
		}

		public function getMenu($query) {
			return $this->db->executeQueryAll($query);
		}

		public function getNumbers($filterBy) {
			$query = "SELECT COUNT(*) AS brojProizvoda FROM menu WHERE naziv LIKE '%" . $filterBy . "%'";
			return $this->db->executeQuery($query);
		}

		public function getAllFromMenu() {
			$query = "SELECT * FROM menu";
			return $this->db->executeQueryAll($query);
		}

		public function deleteProduct($id) {
			$query = "DELETE FROM menu WHERE id = ?";
			$this->db->executeNonGet($query, [$id]);

			header("Location: index.php?page=admin");
		}

		public function insertNewProduct($naziv, $istaknut, $opis, $slikaFolder) {
			$query = "INSERT INTO menu(naziv, istaknut, opis, slika, alt)
								values(?, ?, ?, ?, 'AltSlike')";
			$this->db->executeNonGet($query, [$naziv, $istaknut, $opis, $slikaFolder]);

			header("Location: index.php?page=admin");
		}

		function getProduct($id) {
			$query = "SELECT * FROM menu WHERE id = ?";
			return $this->db->executeQueryWithParams($query, [$id]);
		}

		function updateProductWithImage($naziv, $istaknut, $opis, $slikaFolder, $id) {
			$query = "UPDATE menu SET naziv = ?, istaknut = ?, opis = ?, slika = ? WHERE id = ?";
			$this->db->executeNonGet($query, [$naziv, $istaknut, $opis, $slikaFolder, $id]);
			header("Location: index.php?page=admin");
		}

		function updateProductWithoutImage($naziv, $istaknut, $opis, $id) {
			$query = "UPDATE menu SET naziv = ?, istaknut = ?, opis = ? WHERE id = ?";
			$this->db->executeNonGet($query, [$naziv, $istaknut, $opis, $id]);
			header("Location: index.php?page=admin");
		}
	}