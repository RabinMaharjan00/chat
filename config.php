<?php
$server = "localhost";
$username = 'root';
$password = '';
$dbname = 'chat';


try {
	$db = new PDO("mysql:dbhost=$server;dbname=$dbname", "$username", "$password");

	
} catch (PDOException $e) {
	echo $e-> getMessage();
}

?>

