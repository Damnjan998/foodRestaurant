<?php
	session_start();

	require_once "app/config/autoload.php";
	require_once "app/config/database.php";

	use App\Models\DB;
	use App\Controllers\PageController;
	use app\Controllers\AuthenticationController;
	use app\Controllers\NavController;
	use app\Controllers\AboutController;
	use app\Controllers\SpecialsController;
	use app\Controllers\MenuController;
	use app\Controllers\ReviewController;
	use app\Controllers\AdminController;

	$db = new DB(SERVER, DATABASE, USERNAME, PASSWORD);

	$pageController = new PageController($db);
	$authController = new AuthenticationController($db);
	$navController = new NavController($db);
	$aboutController = new AboutController($db);
	$specialsController = new SpecialsController($db);
	$menuController = new MenuController($db);
	$reviewController = new ReviewController($db);
	$adminController = new AdminController($db);


	if (isset($_GET['page'])) {
		$strana = $_GET['page'];
		switch ($strana) {
			case "about":
				$pageController->about();
				break;

			case "menu":
				$pageController->menu();
				break;

			case "sort":
				if (isset($_GET['sortiraj'])) {
					$sortBy = $_GET['sortiraj'];
				} else {
					$sortBy = 0;
				}
				if (isset($_GET['pretraga'])) {
					$filterBy = $_GET['pretraga'];
				} else {
					$filterBy = "";
				}
				if (isset($_GET['strana'])) {
					$strana = $_GET['strana'];
				} else {
					$strana = 0;
				}

				$menuController->getMenu($sortBy, $filterBy, $strana);
				break;

			case "paginacija":
				if (isset($_GET['pretraga'])) {
					$filterBy = $_GET['pretraga'];
				} else {
					$filterBy = "";
				}
				$menuController->getCountMenu($filterBy);
				break;

			case "reviews":
				$pageController->reviews();
				break;

			case "comment":
				$reviewController->insertComment();
				break;

			case "logovanje":
				$pageController->logovanje();
				break;

			case "login":
				$authController->login();
				break;

			case "registration":
				$pageController->registration();
				break;

			case "register":
				$authController->register();
				break;

			case "logout":
				$authController->logout();
				break;

			case "contact":
				$pageController->contact();
				break;

			case "admin":
				$pageController->admin();
				break;

			case "izbrisi":
				if (!isset($_SESSION['korisnik']) || (isset($_SESSION["korisnik"]) and $_SESSION["korisnik"]->id_uloga == 1)) {
					header("location: index.php?page=home");
					break;
				}
				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					if ($_SESSION['korisnik']->id == $id) {
						echo json_encode("You can't delete yourself!");
						break;
					}
				}
				$adminController->izbrsiKorisnika($id);
				break;

			case "izbrisiProizvod":
				if (!isset($_SESSION['korisnik']) || (isset($_SESSION["korisnik"]) and $_SESSION["korisnik"]->id_uloga == 1)) {
					header("location: index.php?page=home");
					break;
				}
				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$adminController->izbrisiProizvod($id);
				}
				break;

			case "izbrisiKomentar":
				if (!isset($_SESSION['korisnik']) || (isset($_SESSION["korisnik"]) and $_SESSION["korisnik"]->id_uloga == 1)) {
					header("location: index.php?page=home");
					break;
				}
				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$adminController->izbrisiKomentar($id);
				}
				break;

			case "insertProduct":
				if (!isset($_SESSION['korisnik']) || (isset($_SESSION["korisnik"]) and $_SESSION["korisnik"]->id_uloga == 1)) {
					header("location: index.php?page=home");
					break;
				}
				$adminController->insertProduct();
				header("Location: index.php?page=admin");
				break;

			case "izmena":
				if (!isset($_SESSION['korisnik']) || (isset($_SESSION["korisnik"]) and $_SESSION["korisnik"]->id_uloga == 1)) {
					header("location: index.php?page=home");
					break;
				}
				$pageController->izmena();
				break;

			case "izmenaProizvoda":
				if (!isset($_SESSION['korisnik']) || (isset($_SESSION["korisnik"]) and $_SESSION["korisnik"]->id_uloga == 1)) {
					header("location: index.php?page=home");
					break;
				}
				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$menuController->updateMenuProduct($id);
				}
				break;

			case "home":
			default:
				$pageController->home();
				break;
		}
	} else {
		$pageController->home();
	}
?>