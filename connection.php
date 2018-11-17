<?php
// this will avoid mysql_connect() deprecation error.
error_reporting( ~E_DEPRECATED & ~E_NOTICE );


define('DBHOST', '127.0.0.1');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'cr11_delia_travelmatic');

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);


if ( !$conn ) {
 die("Connection failed : " . mysqli_error());
}


?>