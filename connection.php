<?php
    $servername = "localhost";
	$username = "12itm14";
	$password = "12itm145baa2a21e4dc4";
	$dbname = "12itm14_fifa";

	$connection = new mysqli($servername, $username, $password, $dbname);

    if(!$connection) {
        die("A conexão falhou: ".mysqli_connect_error);
    }
?>
