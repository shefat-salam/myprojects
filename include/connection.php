<?php require("constant.php");?>
<?php
    $connection=mysql_connect(DB_SERVER, DB_USER, DB_PASS);
  if(!$connection){
	  die("database connection faild:".mysql_error());
	  }
  $db_select=mysql_select_db("myprojects",$connection);
if(!$db_select){
	  die("database selection faild:".mysql_error());
	  }
  
?>
