<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
include_once("include/db_connection.php");

$thisCustomer_id = $_REQUEST['customer_idField'];

$sql = "SELECT * FROM customers WHERE customer_id = '1'";

$result = MYSQL_QUERY($sql);
$numberOfRows = MYSQL_NUMROWS($result);
if ($numberOfRows==0) {  
?>

Sorry. No records found !!

<?php
}
else if ($numberOfRows>0) {

	$i=0;
	$thisCustomer_id = MYSQL_RESULT($result,$i,"customer_id");
	$thisFname = MYSQL_RESULT($result,$i,"fname");
	$thisMname = MYSQL_RESULT($result,$i,"mname");
	$thisLname = MYSQL_RESULT($result,$i,"lname");
	$thisCompany = MYSQL_RESULT($result,$i,"company");
	$thisTitle = MYSQL_RESULT($result,$i,"title");
	$thisAddress1 = MYSQL_RESULT($result,$i,"address1");
	$thisAddress2 = MYSQL_RESULT($result,$i,"address2");
	$thisAddress3 = MYSQL_RESULT($result,$i,"address3");
	$thisCity = MYSQL_RESULT($result,$i,"city");
	$thisState_province = MYSQL_RESULT($result,$i,"state_province");
	$thisCountry = MYSQL_RESULT($result,$i,"country");
	$thisPostal_code = MYSQL_RESULT($result,$i,"postal_code");
	$thisPhone = MYSQL_RESULT($result,$i,"phone");
	$thisFax = MYSQL_RESULT($result,$i,"fax");

}
?>

<h2>Update Customers</h2>
<form name="customersUpdateForm" method="POST" action="update.php">

<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign="top" height="20">
		<td align="right"> <b> Customer_id :  </b> </td>
		<td> <input type="text" name="thisCustomer_idField" size="20" value="<? echo $thisCustomer_id; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Fname :  </b> </td>
		<td> <input type="text" name="thisFnameField" size="20" value="<? echo $thisFname; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Mname :  </b> </td>
		<td> <input type="text" name="thisMnameField" size="20" value="<? echo $thisMname; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Lname :  </b> </td>
		<td> <input type="text" name="thisLnameField" size="20" value="<? echo $thisLname; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Company :  </b> </td>
		<td> <input type="text" name="thisCompanyField" size="20" value="<? echo $thisCompany; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Title :  </b> </td>
		<td> <input type="text" name="thisTitleField" size="20" value="<? echo $thisTitle; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Address1 :  </b> </td>
		<td> <input type="text" name="thisAddress1Field" size="20" value="<? echo $thisAddress1; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Address2 :  </b> </td>
		<td> <input type="text" name="thisAddress2Field" size="20" value="<? echo $thisAddress2; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Address3 :  </b> </td>
		<td> <input type="text" name="thisAddress3Field" size="20" value="<? echo $thisAddress3; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> City :  </b> </td>
		<td> <input type="text" name="thisCityField" size="20" value="<? echo $thisCity; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> State_province :  </b> </td>
		<td> <input type="text" name="thisState_provinceField" size="20" value="<? echo $thisState_province; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Country :  </b> </td>
		<td> <input type="text" name="thisCountryField" size="20" value="<? echo $thisCountry; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Postal_code :  </b> </td>
		<td> <input type="text" name="thisPostal_codeField" size="20" value="<? echo $thisPostal_code; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Phone :  </b> </td>
		<td> <input type="text" name="thisPhoneField" size="20" value="<? echo $thisPhone; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> Fax :  </b> </td>
		<td> <input type="text" name="thisFaxField" size="20" value="<? echo $thisFax; ?>">  </td> 
	</tr>
</table>

<p>
  <input type="submit" name="submitUpdateCustomersForm" value="Update Customers">
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
