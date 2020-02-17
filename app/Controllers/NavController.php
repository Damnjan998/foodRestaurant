<?php

	namespace app\Controllers;

	use app\Models\Nav;

	class NavController extends Controller {
		private $db;

		public function __construct($db) {
			$this->db = $db;
		}

		function nav() {
			$nav = new Nav($this->db);
			return $nav->getAllFromNav();
		}
	}