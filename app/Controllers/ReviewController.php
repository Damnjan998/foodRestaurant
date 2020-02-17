<?php

	namespace app\Controllers;

	use app\Models\Komentar;


	class ReviewController extends Controller {
		private $db;

		public function __construct($db) {
			$this->db = $db;
		}

		function getKomentari() {
			$komentari = new Komentar($this->db);
			return $komentari->getAllFromKomentar();
		}

		function insertComment() {
			if (isset($_SESSION['korisnik'])) {
				$idKor = $_SESSION['korisnik']->id;
				if (isset($_POST['send'])) {
					$code = 201;

					$subject = $_POST['subject'];
					$message = $_POST['message'];

					$reSubject = "/^[A-Z][a-z]{2,20}$/";
					$greske = [];

					if (!preg_match($reSubject, $subject)) {
						$greske[] = "Wrong format of Subject";
					}
					if (empty($message)) {
						$greske[] = "Wrong format of Message";
					}

					if (count($greske) == 0) {
						$komentar = new Komentar($this->db);
						try {
							$komentar->insertKomentar($subject, $message, $idKor);
							$adminController = new AdminController($this->db);
							$adminController->insertAction("INSERT_KOMENTAR", $idKor);
						} catch (\PDOException $e) {
							echo $e->getMessage();
							$code = 409;
						}
					} else {
						$code = 422;
					}
					http_response_code($code);
				}
			}
		}
	}