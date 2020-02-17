<?php


	namespace app\Controllers;


	use app\Models\Evidencija;
	use app\Models\Komentar;
	use app\Models\Korisnik;
	use app\Models\Menu;

	class AdminController extends Controller {
		private $db;

		public function __construct($db) {
			$this->db = $db;
		}

		function products() {
			$menu = new Menu($this->db);
			return $menu->getAllFromMenu();
		}

		function user() {
			$korisnik = new Korisnik($this->db);
			return $korisnik->getAllUsers();
		}

		function activeUsers() {
			$korisnik = new Korisnik($this->db);
			return $korisnik->getActiveUsers();
		}

		function izbrsiKorisnika($id) {
			$korisnik = new Korisnik($this->db);
			$korisnik->deleteUser($id);
			if (isset($_SESSION['korisnik'])) {
				$idKor = $_SESSION['korisnik']->id;
				$this->insertAction("DELETE_USER", $idKor);
			}
		}

		function izbrisiProizvod($id) {
			$menu = new Menu($this->db);
			$menu->deleteProduct($id);
			if (isset($_SESSION['korisnik'])) {
				$idKor = $_SESSION['korisnik']->id;
				$this->insertAction("DELETE_PROIZVOD", $idKor);
			}
		}

		function comments() {
			$komentar = new Komentar($this->db);
			return $komentar->getAllFromKomentar();
		}

		function izbrisiKomentar($id) {
			$komentar = new Komentar($this->db);
			$komentar->deleteComment($id);
			if (isset($_SESSION['korisnik'])) {
				$idKor = $_SESSION['korisnik']->id;
				$this->insertAction("DELETE_KOMENTAR", $idKor);
			}
		}

		function insertProduct() {
			if (isset($_SESSION["korisnik"]) && $_SESSION["korisnik"]->id_uloga == 2) {
				if (isset($_POST["unesi"])) {

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

					if (in_array($slikaEkstenzija, $dozvoljeno)) {
						if ($slikaError === 0) {
							$slikaFolder = "app/assets/images/burger/" . $slikaName;
							move_uploaded_file($slikaTmpName, $slikaFolder);
							$menu = new Menu($this->db);
							try {
								$menu->insertNewProduct($naziv, $istaknut, $opis, $slikaFolder);
								$adminController = new AdminController($this->db);
								$adminController->insertAction("INSERT_PRODUCT", $idKor);
								http_response_code($code);
							} catch (\PDOExcepiton $e) {
								echo $e->getMessage();
								$code = 500;
							}
						}
					}
					http_response_code($code);
				}
			} else {
				header("Location: index.php?page=admin");
			}
		}

		function getAllFromRecord() {
			$evidencija = new Evidencija($this->db);
			return $evidencija->getAction();
		}

		public function insertAction($akcija, $idKorisnika) {
			$evidencija = new Evidencija($this->db);
			$evidencija->addAction($akcija, $idKorisnika);
		}
	}