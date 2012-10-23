<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
include_once("include/db_connection.php");
?>
<?php
	// Retreiving Form Elements from Form
	$thisCustomer_id = addslashes($_REQUEST['thisCustomer_idField']);
	$thisFname = addslashes($_REQUEST['thisFnameField']);
	$thisMname = addslashes($_REQUEST['thisMnameField']);
	$thisLname = addslashes($_REQUEST['thisLnameField']);
	$thisCompany = addslashes($_REQUEST['thisCompanyField']);
	$thisTitle = addslashes($_REQUEST['thisTitleField']);
	$thisAddress1 = addslashes($_REQUEST['thisAddress1Field']);
	$thisAddress2 = addslashes($_REQUEST['thisAddress2Field']);
	$thisAddress3 = addslashes($_REQUEST['thisAddress3Field']);
	$thisCity = addslashes($_REQUEST['thisCityField']);
	$thisState_province = addslashes($_REQUEST['thisState_provinceField']);
	$thisCountry = addslashes($_REQUEST['thisCountryField']);
	$thisPostal_code = addslashes($_REQUEST['thisPostal_codeField']);
	$thisPhone = addslashes($_REQUEST['thisPhoneField']);
	$thisFax = addslashes($_REQUEST['thisFaxField']);

?>
<?
$sql = "UPDATE customers SET customer_id = '$thisCustomer_id' , fname = '$thisFname' , mname = '$thisMname' , lname = '$thisLname' , company = '$thisCompany' , title = '$thisTitle' , address1 = '$thisAddress1' , address2 = '$thisAddress2' , address3 = '$thisAddress3' , city = '$thisCity' , state_province = '$thisState_province' , country = '$thisCountry' , postal_code = '$thisPostal_code' , phone = '$thisPhone' , fax = '$thisFax'
	WHERE customer_id = '$thisCustomer_id'";
$result = MYSQL_QUERY($sql);

?>
Record  has been updated in the database. Here is the updated information :- <br><br>

<table>
<tr height="30">
	<td align="right"><b>Customer_id : </b></td>
	<td><? echo $thisCustomer_id; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>Fname : </b></td>
	<td><? echo $thisFname; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>Mname : </b></td>
	<td><? echo $thisMname; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>Lname : </b></td>
	<td><? echo $thisLname; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>Company : </b></td>
	<td><? echo $thisCompany; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>Title : </b></td>
	<td><? echo $thisTitle; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>Address1 : </b></td>
	<td><? echo $thisAddress1; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>Address2 : </b></td>
	<td><? echo $thisAddress2; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>Address3 : </b></td>
	<td><? echo $thisAddress3; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>City : </b></td>
	<td><? echo $thisCity; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>State_province : </b></td>
	<td><? echo $thisState_province; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>Country : </b></td>
	<td><? echo $thisCountry; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>Postal_code : </b></td>
	<td><? echo $thisPostal_code; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>Phone : </b></td>
	<td><? echo $thisPhone; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>Fax : </b></td>
	<td><? echo $thisFax; ?></td>
</tr>
</table>
<p><br>
  <br>
    <a href="list.php">Go Back to List All Records</a></p>
<p>  
</p>
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
