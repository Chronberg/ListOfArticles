<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title>Список статей</title>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
		
        <style type="text/css">    
           * { margin-left: 10px; padding: 0; }
           #left { position: absolute; left: 0; top: 0; width: 50%; }
           #right { position: absolute; right: 0; top: 0; width: 50%; } 
		   #rightBelow {position: inherit; top: 350px;}
		   textarea {width: 350px; height: 100px; resize: none;}
        </style>
</head>

<body>
	<?php
		$host = 'localhost';
		$user = 'root';
		$pass = '';

		$link = mysqli_connect($host, $user, $pass)
		or die ('Failed to connect to the database. Error: '
			. mysqli_error($link));
	?>  

	<?php
	$query = "CREATE DATABASE IF NOT EXISTS articlesBD CHARACTER SET utf8 COLLATE utf8_general_ci"
		or die ('Failed to create database. Error: ' . mysqli_error($link));
	mysqli_query($link, $query) or die ("Failed to execute query. Error: " . mysqli_error($link));
	mysqli_set_charset ($link, "utf8");
	
	
	
	mysqli_select_db($link, 'articlesBD')
		or die ('Failed to select database. Error: ' . mysqli_error($link));
	mysqli_set_charset ($link, "utf-8");
	
	$query = "CREATE TABLE IF NOT EXISTS articles ( 
            article_id INT(10) NOT NULL AUTO_INCREMENT,
            articleName VARCHAR(255) NOT NULL,
            articlePreview VARCHAR(255)  NOT NULL,
            PRIMARY KEY(article_id)
            ) ENGINE = InnoDB DEFAULT CHARSET = utf8
			";
	mysqli_query($link, $query) or die ("Failed to execute query. Error: " . mysqli_error($link));
	?>



    <div id="left">
	<h2>Список статей</h2>
		<ul>
		</ul>
    </div>

    <div id="right">
		<h2>Форма добавления статьи</h2>
		<form method="POST" id = "formToSend" action="">
			<p><input type="text" id="articleName" name = "articleName" placeholder="Название статьи" size="45" required></p>
			<p><textarea id= "articlePreview" name = "articlePreview" placeholder="Аннотация к статье" required></textarea></p>
			<p><input type="submit" value="Добавить статью"></p>
		</form>
		<div id="rightBelow">
		<h2>Подробнее</h2>
		</div>
		
		
	</div>
	
	
	
</body>
</html>






