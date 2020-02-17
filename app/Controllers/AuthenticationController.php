<?php

	namespace app\Controllers;

	use app\Models\Korisnik;

	class AuthenticationController extends Controller {
		private $db;

		public function __construct($db) {
			$this->db = $db;
		}

		function register() {
			if (isset($_POST['send'])) {
				$code = 201;

				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$role = 1;
				$aktivan = 0;
				$confirmPassword = $_POST['confirmPassword'];

				$reFirstName = "/^[A-Z][a-z]{2,20}/";
				$reLastName = "/^[A-Z][a-z]{2,20}/";
				$rePassword = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{3,}$/";
				$greske = [];

				if (!preg_match($reFirstName, $firstName)) {
					$greske[] = "Wrong format of First Name!";
				}
				if (!preg_match($reLastName, $lastName)) {
					$greske[] = "Wrong format of Last Name!";
				}
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$greske[] = "Wrong format of Email!";
				}
				if (!preg_match($rePassword, $password)) {
					$greske[] = "Wrong format of Password!";
				}
				if ($confirmPassword != $password) {
					$greske[] = "Passwords does not match!";
				}

				if (count($greske) > 0) {
					$code = 422;
					$belezenjeGreski = fopen("app/logs/greske.txt", "a+");
					foreach ($greske as $key => $value) {
						fwrite($belezenjeGreski, $value);
						fwrite($belezenjeGreski, "\n");
					}
					fclose($belezenjeGreski);
					echo "Error occurred while trying to register!";
				}

				if (count($greske) == 0) {
					$korisnik = new Korisnik($this->db);
					try {
						$korisnik->insertUser($firstName, $lastName, $email, $password, $aktivan, $role);
					} catch (\PDOException $e) {
						echo "Error occurred while trying to register!";
						$code = 409;
					}
				}
				http_response_code($code);
			}
		}

		function login() {
			if (isset($_POST['send'])) {

				$code = 200;
				$email = $_POST["email"];
				$sifra = $_POST["lozinka"];
				$siframd5 = md5($sifra);
				$greske = [];

				$rePassword = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{3,}$/";

				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					array_push($greske, "Your email is not correct!");
				}

				if (!preg_match($rePassword, $sifra)) {
					array_push($greske, "Your password is not correct!");
				}

				if (count($greske) > 0) {
					$belezenjeGreski = fopen("app/logs/greske.txt", "a+");
					foreach ($greske as $key => $value) {
						fwrite($belezenjeGreski, $value);
						fwrite($belezenjeGreski, "\n");
					}
					fclose($belezenjeGreski);
				}

				if (count($greske) == 0) {
					$korisnik = new Korisnik($this->db);
					try {
						$user = $korisnik->getUser($email, $siframd5);

						if ($user) {
							$_SESSION['korisnik'] = $user;
							$aktivan = 1;
							$id = $user->id;
							$korisnik->updateUser($aktivan, $id);
							http_response_code($code);
						} else {
							echo "There is no user with specified email/password.";
							$code = 404;
						}
					} catch (\PDOExcepiton $e) {
						echo $e->getMessage();
						$code = 404;
					}
				} else {
					echo "Your email or password is not valid.";
					$code = 422;
				}
				http_response_code($code);
			}
		}

		public function logout() {
			$korisnik = new Korisnik($this->db);
			if (isset($_SESSION['korisnik'])) {
				$id = $_SESSION['korisnik']->id;
			}

			if (session_destroy()) {
				$aktivan = 0;

				$korisnik->updateUser($aktivan, $id);
			}
			header("Location: index.php?page=home");
		}
	}