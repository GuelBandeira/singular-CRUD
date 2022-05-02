<?php

if (($_SERVER['HTTP_HOST']=='servidor')||($_SERVER['HTTP_HOST']=='192.168.1.105')||($_SERVER['HTTP_HOST']=='localhost')) {
	$conn = mysql_connect("localhost","root","");
	$dbname = mysql_select_db("fulltime");		
} else {
	$conn = mysql_connect("mysql.taticaweb.com.br","taticaweb","t4ticadb");
	$dbname = mysql_select_db("fulltimedb");
}

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

?>