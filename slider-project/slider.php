<?php
include_once('DB_Connection.php');
if (!class_exists('Slider')) {
	class Slider{
		private $conn;
		function __construct(){
			$this->conn = new DB_Connection();
		}

		function getCategories(){
			return $this->conn->getAll('categories');
		}
		function getSlides(){
			return $this->conn->getAll('slides', 'category_id', 'ASC');
		}

	}
}