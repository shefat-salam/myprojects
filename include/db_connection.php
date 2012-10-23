<?php 
  $hostName="localhost";
  $userName="root";
  $password="";
  $dbName="test";
  
  $dblink = mysql_connect($hostName, $userName, $password) or die("Opps!!! Unaable to connect to database");
  mysql_select_db($dbName) or die("Could not select database");
?>