<?php
	$host = "localhost";
	$username = "root";
	$password = "usbw";
	$dbName = "amago";

	$conexao = @mysqli_connect($host, $username, $password, $dbName)
	or die("O banco morreu");
?>