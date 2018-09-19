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
	$query= "SELECT * FROM `articles` ORDER BY `article_id` DESC";
	$result = mysqli_query($link, $query)  or die ("Failed to execute query. Error: " . mysqli_error($link));;
	
	$articlesArray = array();
	
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$articlesArray[]= $row;
	}
	$articlesArray = array_reverse($articlesArray);
	echo json_encode($articlesArray);
	

?>