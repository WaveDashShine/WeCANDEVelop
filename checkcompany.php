<?php

$credentials = include('config.php');

$conn = sqlsrv_connect($credentials["SERVER"], $credentials);

if($conn){
	$employer = $_GET["employer"];

	$query = "SELECT * FROM dbo.Company WHERE Company_Name = '$employer'";
	$result = sqlsrv_query($conn, $query);
	if($result == false){
		echo '{"success":"false"}';
	}
	else {
		$arr = array();
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
			array_push($arr, $row["Company"]);
		}
		if(count($arr) > 0){
			echo '{"success":"true", "federal":"true"}';
		}
		else {
			echo '{"success":"true", "federal":"false"}';
		}
	}
}
else {
	echo '{"success":"false"}';
}
?>

