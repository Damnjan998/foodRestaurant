<?php

	namespace app\Controllers;

	use app\Models\Informacija;

	class PageController extends Controller {
		private $db;

		public function __construct($db) {
			$this->db = $db;
		}

		public function home() {
			$this->view('home');
		}

		public function about() {
			$this->view('about');
		}

		function registration() {
			$this->view("registration");
		}

		function reviews() {
			$this->view("reviews");
		}

		function logovanje() {
			$this->view("logovanje");
		}

		public function menu() {
			$this->view('menu');
		}

		public function contact() {
			$this->view('contact');
		}

		public function admin() {
			$this->view('admin');
		}

		public function izmena() {
			$this->view('izmena');
		}

		public function getInformation() {
			$informacija = new Informacija($this->db);
			return $informacija->getAllFromInformation();
		}

	}