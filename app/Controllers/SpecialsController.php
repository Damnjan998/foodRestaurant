<?php

	namespace app\Controllers;

	use app\Models\Specials;


	class SpecialsController extends Controller {
		private $db;

		public function __construct($db) {
			$this->db = $db;
		}

		function specials() {
			$specials = new Specials($this->db);
			return $specials->getAllSpecials();
		}
	}