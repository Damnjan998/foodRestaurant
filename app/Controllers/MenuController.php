<?php

	namespace app\Controllers;

	use app\Models\Menu;

	class MenuController extends Controller {
		private $db;

		public function __construct($db) {
			$this->db = $db;
		}

		function getCountMenu($filterBy) {
			$menu = new Menu($this->db);

			echo json_encode($menu->getNumbers($filterBy));
		}

		function getMenu($sortBy, $filterBy, $strana) {
			$start = 0;
			$brojPoStrani = 6;

			if ($strana > 0) {
				$start = $strana * $brojPoStrani;
			}

			$menu = new Menu($this->db);
			$proizvodi = null;

			switch ($sortBy) {
				case 1 :
					$query = "SELECT * FROM menu WHERE naziv LIKE '%" . $filterBy . "%' ORDER BY naziv ASC LIMIT $start, $brojPoStrani";
					break;
				case 2 :
					$query = "SELECT * FROM menu WHERE naziv LIKE '%" . $filterBy . "%' ORDER BY naziv DESC LIMIT $start, $brojPoStrani";
					break;
				default :
					$query = "SELECT * FROM menu WHERE naziv LIKE '%" . $filterBy . "%' LIMIT $start, $brojPoStrani";
					break;
			}
			$proizvodi = $menu->getMenu($query);
			echo json_encode($proizvodi);
		}

		function getOneProduct($id) {
			$menu = new Menu($this->db);
			return $menu->getProduct($id);
		}

		function updateMenuProduct($id) {
			if (isset($_POST["izmeni"])) {

				$idKor = $_SESSION['korisnik']->id;

				$code = 200;
				$naziv = $_POST["naziv"];
				$opis = $_POST["opis"];
				$istaknut = $_POST["istaknut"];

				$slika = $_FILES["slika"];
				$slikaName = $slika["name"];
				$slikaTmpName = $slika["tmp_name"];
				$slikaSize = $slika["size"];
				$slikaError = $_FILES["slika"]["error"];
				$slikaType = $slika["type"];

				$slikaExp = explode('.', $slikaName);
				$slikaEkstenzija = strtolower(end($slikaExp));

				$dozvoljeno = array(
					'jpg',
					'jpeg',
					'png',
					'pdf'
				);

				$menu = new Menu($this->db);
				if (in_array($slikaEkstenzija, $dozvoljeno)) {
					if ($slikaError === 0) {
						$slikaFolder = "app/assets/images/burger/" . $slikaName;
						move_uploaded_file($slikaTmpName, $slikaFolder);
						try {
							$menu->updateProductWithImage($naziv, $istaknut, $opis, $slikaFolder, $id);
							$adminController = new AdminController($this->db);
							$adminController->insertAction("UPDATE_PRODUCT_WITH_IMAGE", $idKor);
						} catch (\PDOExcepiton $e) {
							echo $e->getMessage();
							$code = 500;
						}
					}
				} else {
					try {
						$menu->updateProductWithoutImage($naziv, $istaknut, $opis, $id);
						$adminController = new AdminController($this->db);
						$adminController->insertAction("UPDATE_PRODUCT_WITHOUT_IMAGE", $idKor);
					} catch (\PDOExcepiton $e) {
						echo $e->getMessage();
						$code = 500;
					}
				}
				http_response_code($code);
				header("Location: index.php?page=admin");
			}
		}
	}