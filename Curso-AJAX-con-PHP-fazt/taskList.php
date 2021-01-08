<?php
include('database.php');
$query = "SELECT * FROM task";

$result = mysqli_query($connection,$query);

if(!$result){
	die("fallo la query".mysqli_error());
}

/*guardamos el resultado en un array*/
$json = array();
while($row = mysqli_fetch_array($result)){
	$json[] = array(
		'id' => $row['id'],
		'name' => $row['name'],
		'description' => $row['description']
	);
}

/*codificaoms*/
$jsonstring = json_encode($json);
echo $jsonstring;


?>