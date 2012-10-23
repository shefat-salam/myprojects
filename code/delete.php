<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
include_once("include/db_connection.php");

	// Retreiving Form Elements from Form
	$thisCustomer_id = addslashes($_POST['thisCustomer_idField']);
	

$sql = "DELETE FROM customers WHERE customer_id = '$thisCustomer_id'";
$result = MYSQL_QUERY($sql);

?>
Record  has been deleted from database.<br>
<ul>
  <li>
    <div align="left"><a href="enter_new.php">Enter New customers</a></div>
  </li>
  <li>
    <div align="left"><a href="list.php">List All customers</a></div>
  </li>
  <li>
    <div align="left"><a href="search_form.php">Power Search customers</a></div>
  </li>
</ul>
<p></p>
