<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
include_once("include/db_connection.php");

$thisCustomer_id = $_REQUEST['customer_idField'];

$sql = "SELECT   * FROM customers WHERE customer_id = '".$thisCustomer_id."'";
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

<h2>Confirm Record Deletion</h2><br><br>

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

<h3>If you are sure you want to delete the above record, please press the delete button below.</h3><br><br>
<form name="customersEnterForm" method="POST" action="delete.php">
<input type="hidden" name="thisCustomer_idField" value="<? echo $thisCustomer_id; ?>">
<input type="submit" name="submitConfirmDeleteCustomersForm" value="Delete  from Customers">
<input type="button" name="cancel" value="Go Back" onClick="javascript:history.back();">
</form>

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
