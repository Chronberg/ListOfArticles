<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$link = mysqli_connect($host, $user, $pass)
		or die ('Failed to connect to the database. Error: '
		. mysqli_error($link));
		
	mysqli_select_db($link, 'articlesBD')
		or die ('Failed to select database. Error: ' . mysqli_error($link));
	mysqli_set_charset ($link, "utf8");
	
	
	$articleName = $_POST['articleName'];
    $articlePreview = $_POST['articlePreview'];
    $query= "INSERT INTO articles(`articleName`, `articlePreview`) VALUES ('$articleName', '$articlePreview')";
    mysqli_query($link, $query)  or die ("Failed to execute query. Error: " . mysqli_error($link));
	

?>