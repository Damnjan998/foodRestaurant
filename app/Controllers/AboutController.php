<?php

	namespace app\Controllers;

	use app\Models\About;

	class AboutController extends Controller {
		private $db;

		public function __construct($db) {
			$this->db = $db;
		}

		function about() {
			$about = new About($this->db);
			return $about->getAllFromAbout();
		}

		function chefs() {
			$chefs = new About($this->db);
			return $chefs->getAllFromKuvar();
		}

		function followIkonice() {
			$followIkonice = new About($this->db);
			return $followIkonice->getAllFromFollowIkonice();
		}
	}