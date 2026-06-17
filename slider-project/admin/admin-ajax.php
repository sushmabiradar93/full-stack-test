<?php
if(isset($_POST['action']) && !empty($_POST['action'])){
	require_once '../DB_Connection.php';
	$dbConnectionObj = new DB_Connection();	

	if($_POST['action'] == 'delete_category'){
		$id = (int)$_POST['category_id'];
		$response = $dbConnectionObj->delete(
		    'categories',
		    $id
		);
		
		echo $response;
	}else if($_POST['action'] == 'delete_slide'){
		$id = (int)$_POST['slide_id'];
		$response = $dbConnectionObj->delete(
		    'slides',
		    $id
		);
		echo $response;
	}
}