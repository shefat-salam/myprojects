<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
include_once("include/db_connection.php");
?>
<h2>Enter Customers</h2>
<form name="customersEnterForm" method="POST" action="">

<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign="top" height="20">
		<td align="right"> <b> Customer_id :  </b> </td>
		<td> <input type="text" name="thisCustomer_idField" size="20" value="">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Fname :  </b> </td>
		<td> <input type="text" name="thisFnameField" size="20" value="">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Mname :  </b> </td>
		<td> <input type="text" name="thisMnameField" size="20" value="">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Lname :  </b> </td>
		<td> <input type="text" name="thisLnameField" size="20" value="">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Company :  </b> </td>
		<td> <input type="text" name="thisCompanyField" size="20" value="">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Title :  </b> </td>
		<td> <input type="text" name="thisTitleField" size="20" value="">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Address1 :  </b> </td>
		<td> <input type="text" name="thisAddress1Field" size="20" value="">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Address2 :  </b> </td>
		<td> <input type="text" name="thisAddress2Field" size="20" value="">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Address3 :  </b> </td>
		<td> <input type="text" name="thisAddress3Field" size="20" value="">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> City :  </b> </td>
		<td> <input type="text" name="thisCityField" size="20" value="">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> State_province :  </b> </td>
		<td> <input type="text" name="thisState_provinceField" size="20" value="">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Country :  </b> </td>
		<td> <input type="text" name="thisCountryField" size="20" value="">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Postal_code :  </b> </td>
		<td> <input type="text" name="thisPostal_codeField" size="20" value="">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Phone :  </b> </td>
		<td> <input type="text" name="thisPhoneField" size="20" value="">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Fax :  </b> </td>
		<td> <input type="text" name="thisFaxField" size="20" value="">  </td> 
	</tr>
</table>

<p>
  <input type="submit" name="submitEnterCustomersForm" value="Enter Customers">
  <input type="reset" name="resetForm" value="Clear Form">
  </p>
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
</form>
<?php
if(isset($_POST['submitEnterCustomersForm'])){
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

if($result) echo "A new record has been inserted in the database. Here is the information that has been inserted :- <br><br>";
 else echo "nothing";

}
?>