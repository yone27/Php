<?php
include('database.php');

/*Guardamos lo que nos enviaron*/
$search = $_POST['search'];

if(!empty($search)){
	/*setiamos nuestra consulta*/
	$query = "SELECT * FROM task WHERE name LIKE '$search%'";

	/*La ejecutamos*/
	$result = mysqli_query($connection, $query);

	/*Si no se ejecuto la consulta*/
	if(!$result){
		die('Error de consulta '. mysqli_error($connection));
	}

	/*Recorremos el resultado y la convertimos a json*/
	$json = array();
	while($row = mysqli_fetch_array($result)){
		$json[] = array(
			'id' => $row['id'],
			'name' => $row['name'],
			'description' => $row['description']
		);
	}
	$jsonString = json_encode($json);
	echo $jsonString;


}


