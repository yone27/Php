<?php
/**
 * Created by PhpStorm.
 * User: ygonzalez
 * Date: 29/3/2019
 * Time: 10:56 AM
 */

include('database.php');
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$query = "SELECT * FROM task WHERE id = $id";

	$result = mysqli_query($connection, $query);
	if(!$result){
		die("query failed");
	}

	/*TRANSFORMANDO DATOS A JSON*/
	$json = array();
	while($row=mysqli_fetch_array($result)){
		$json[] = array(
			'name' => $row['name'],
			'description' => $row['description'],
			'id' => $row['id']
		);
	}

	$jsonstring = json_encode($json[0]);
	echo $jsonstring ;
}