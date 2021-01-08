<?php
include('database.php');

if(isset($_POST['name']) && isset($_POST['description'])){
	/*guardamos los datos en variables*/
	$name = $_POST['name'];
	$description = $_POST['description'];

	/*consultamos la db*/
	$query = "INSERT INTO task(name,description) VALUES ('$name','$description')";

	/*Ejecutamos la consulta*/
	$result = mysqli_query($connection, $query);
	if(!$result){
		die('query failed');
	}
	echo "task save successly";

}



?>