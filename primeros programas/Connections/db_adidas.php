<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_db_adidas = "localhost";
$database_db_adidas = "db_adidas";
$username_db_adidas = "karen";
$password_db_adidas = "turcott";

/*
$hostname_db_adidas = "uniadidas.db.8100478.hostedresource.com";
$database_db_adidas = "uniadidas";
$username_db_adidas = "uniadidas";
$password_db_adidas = "a4d1d4SUni";
*/

$db_adidas = mysql_pconnect($hostname_db_adidas, $username_db_adidas, $password_db_adidas) or trigger_error(mysql_error(),E_USER_ERROR); 
?>