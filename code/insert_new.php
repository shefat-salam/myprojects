<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
include_once("include/db_connection.php");
?>
<?php
	// Retreiving Form Elements from Form
	$thisCustomer_id = $_REQUEST['thisCustomer_idField'];
	$thisFname = $_REQUEST['thisFnameField'];
	$thisMname = $_REQUEST['thisMnameField'];
	$thisLname = $_REQUEST['thisLnameField'];
	$thisCompany = $_REQUEST['thisCompanyField'];
	$thisTitle = $_REQUEST['thisTitleField'];
	$thisAddress1 = $_REQUEST['thisAddress1Field'];
	$thisAddress2 = $_REQUEST['thisAddress2Field'];
	$thisAddress3 = $_REQUEST['thisAddress3Field'];
	$thisCity = $_REQUEST['thisCityField'];
	$thisState_province = $_REQUEST['thisState_provinceField'];
	$thisCountry = $_REQUEST['thisCountryField'];
	$thisPostal_code = $_REQUEST['thisPostal_codeField'];
	$thisPhone = $_REQUEST['thisPhoneField'];
	$thisFax = $_REQUEST['thisFaxField'];

$sqlQuery = "INSERT INTO customers (customer_id , fname , mname , lname , company , title , address1 , address2 , address3 , city , state_province , country , postal_code , phone , fax )
	VALUES ('$thisCustomer_id' , '$thisFname' , '$thisMname' , '$thisLname' , '$thisCompany' , '$thisTitle' , '$thisAddress1' , '$thisAddress2' , '$thisAddress3' , '$thisCity' , '$thisState_province' , '$thisCountry' , '$thisPostal_code' , '$thisPhone' , '$thisFax' )";
$result = MYSQL_QUERY($sqlQuery);

?>
A new record has been inserted in the database. Here is the information that has been inserted :- <br><br>


<p>&nbsp;</p>
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
