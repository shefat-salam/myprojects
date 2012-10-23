<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
include_once("include/db_connection.php");

$initStartLimit = 0;
$limitPerPage = 10;

$startLimit = $_REQUEST['startLimit'];
$numberOfRows = $_REQUEST['rows'];
$sortBy = $_REQUEST['sortBy'];
$sortOrder = $_REQUEST['sortOrder'];

if ($startLimit=="")
{
		$startLimit = $initStartLimit;
}

if ($numberOfRows=="")
{
		$numberOfRows = $limitPerPage;
}

if ($sortOrder=="")
{
		$sortOrder  = "DESC";
}
if ($sortOrder == "DESC") { $newSortOrder = "ASC"; } else  { $newSortOrder = "DESC"; }
$limitQuery = " LIMIT ".$startLimit.",".$numberOfRows;
$nextStartLimit = $startLimit + $limitPerPage;
$previousStartLimit = $startLimit - $limitPerPage;

if ($sortBy!="")
{
		$orderByQuery = " ORDER BY ".$sortBy." ".$sortOrder;
}


$sql = "SELECT * FROM customers".$orderByQuery.$limitQuery;
echo $sql."<br>";

$result = MYSQL_QUERY($sql);
$numberOfRows = MYSQL_NUM_ROWS($result);



if ($numberOfRows==0) {  
?>

Sorry. No records found !!

<?
}
else if ($numberOfRows>0) {

	$i=0;
?>


<br>
<?
if ($_REQUEST['startLimit'] != "")
{
?>

<a href="<? echo  $_SERVER['PHP_SELF']; ?>?startLimit=<? echo $previousStartLimit; ?>&limitPerPage=<? echo $limitPerPage; ?>&sortBy=<? echo $sortBy; ?>&sortOrder=<? echo $sortOrder; ?>">Previous <? echo $limitPerPage; ?> Results</a>....
<? } ?>
<?
if ($numberOfRows == $limitPerPage)
{
?>
<a href="<? echo $_SERVER['PHP_SELF']; ?>?startLimit=<? echo $nextStartLimit; ?>&limitPerPage=<? echo $limitPerPage; ?>&sortBy=<? echo $sortBy; ?>&sortOrder=<? echo $sortOrder; ?>">Next <? echo $limitPerPage; ?> Results</a>
<? } ?>

<br><br>
<TABLE CELLSPACING="0" CELLPADDING="3" BORDER="0" WIDTH="100%">
	<TR>
		<TD>
			<a href="<? echo $PHP_SELF; ?>?sortBy=customer_id&sortOrder=<? echo $newSortOrder; ?>&startLimit=<? echo $startLimit; ?>&rows=<? echo $limitPerPage; ?>">
				<B>Customer_id</B>
			</a>
</TD>
		<TD>
			<a href="<? echo $PHP_SELF; ?>?sortBy=fname&sortOrder=<? echo $newSortOrder; ?>&startLimit=<? echo $startLimit; ?>&rows=<? echo $limitPerPage; ?>">
				<B>Fname</B>
			</a>
</TD>
		<TD>
			<a href="<? echo $PHP_SELF; ?>?sortBy=mname&sortOrder=<? echo $newSortOrder; ?>&startLimit=<? echo $startLimit; ?>&rows=<? echo $limitPerPage; ?>">
				<B>Mname</B>
			</a>
</TD>
		<TD>
			<a href="<? echo $PHP_SELF; ?>?sortBy=lname&sortOrder=<? echo $newSortOrder; ?>&startLimit=<? echo $startLimit; ?>&rows=<? echo $limitPerPage; ?>">
				<B>Lname</B>
			</a>
</TD>
		<TD>
			<a href="<? echo $PHP_SELF; ?>?sortBy=company&sortOrder=<? echo $newSortOrder; ?>&startLimit=<? echo $startLimit; ?>&rows=<? echo $limitPerPage; ?>">
				<B>Company</B>
			</a>
</TD>
		<TD>
			<a href="<? echo $PHP_SELF; ?>?sortBy=title&sortOrder=<? echo $newSortOrder; ?>&startLimit=<? echo $startLimit; ?>&rows=<? echo $limitPerPage; ?>">
				<B>Title</B>
			</a>
</TD>
		<TD>
			<a href="<? echo $PHP_SELF; ?>?sortBy=address1&sortOrder=<? echo $newSortOrder; ?>&startLimit=<? echo $startLimit; ?>&rows=<? echo $limitPerPage; ?>">
				<B>Address1</B>
			</a>
</TD>
		<TD>
			<a href="<? echo $PHP_SELF; ?>?sortBy=address2&sortOrder=<? echo $newSortOrder; ?>&startLimit=<? echo $startLimit; ?>&rows=<? echo $limitPerPage; ?>">
				<B>Address2</B>
			</a>
</TD>
		<TD>
			<a href="<? echo $PHP_SELF; ?>?sortBy=address3&sortOrder=<? echo $newSortOrder; ?>&startLimit=<? echo $startLimit; ?>&rows=<? echo $limitPerPage; ?>">
				<B>Address3</B>
			</a>
</TD>
		<TD>
			<a href="<? echo $PHP_SELF; ?>?sortBy=city&sortOrder=<? echo $newSortOrder; ?>&startLimit=<? echo $startLimit; ?>&rows=<? echo $limitPerPage; ?>">
				<B>City</B>
			</a>
</TD>
		<TD>
			<a href="<? echo $PHP_SELF; ?>?sortBy=state_province&sortOrder=<? echo $newSortOrder; ?>&startLimit=<? echo $startLimit; ?>&rows=<? echo $limitPerPage; ?>">
				<B>State_province</B>
			</a>
</TD>
		<TD>
			<a href="<? echo $PHP_SELF; ?>?sortBy=country&sortOrder=<? echo $newSortOrder; ?>&startLimit=<? echo $startLimit; ?>&rows=<? echo $limitPerPage; ?>">
				<B>Country</B>
			</a>
</TD>
		<TD>
			<a href="<? echo $PHP_SELF; ?>?sortBy=postal_code&sortOrder=<? echo $newSortOrder; ?>&startLimit=<? echo $startLimit; ?>&rows=<? echo $limitPerPage; ?>">
				<B>Postal_code</B>
			</a>
</TD>
		<TD>
			<a href="<? echo $PHP_SELF; ?>?sortBy=phone&sortOrder=<? echo $newSortOrder; ?>&startLimit=<? echo $startLimit; ?>&rows=<? echo $limitPerPage; ?>">
				<B>Phone</B>
			</a>
</TD>
		<TD>
			<a href="<? echo $PHP_SELF; ?>?sortBy=fax&sortOrder=<? echo $newSortOrder; ?>&startLimit=<? echo $startLimit; ?>&rows=<? echo $limitPerPage; ?>">
				<B>Fax</B>
			</a>
</TD>
	</TR>
<?
	while ($i<$numberOfRows)
	{

		if (($i%2)==0) { $bgColor = "#FFFFFF"; } else { $bgColor = "#C0C0C0"; }

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

?>
	<TR BGCOLOR="<? echo $bgColor; ?>">
		<TD nowrap><? echo $thisCustomer_id; ?></TD>
		<TD nowrap><? echo $thisFname; ?></TD>
		<TD nowrap><? echo $thisMname; ?></TD>
		<TD nowrap><? echo $thisLname; ?></TD>
		<TD nowrap><? echo $thisCompany; ?></TD>
		<TD nowrap><? echo $thisTitle; ?></TD>
		<TD nowrap><? echo $thisAddress1; ?></TD>
		<TD nowrap><? echo $thisAddress2; ?></TD>
		<TD nowrap><? echo $thisAddress3; ?></TD>
		<TD nowrap><? echo $thisCity; ?></TD>
		<TD nowrap><? echo $thisState_province; ?></TD>
		<TD nowrap><? echo $thisCountry; ?></TD>
		<TD nowrap><? echo $thisPostal_code; ?></TD>
		<TD nowrap><? echo $thisPhone; ?></TD>
		<TD nowrap><? echo $thisFax; ?></TD>
	<TD><a href="edit.php?customer_idField=<? echo $thisCustomer_id; ?>">Edit</a></TD>
	<TD><a href="confirm_delete.php?customer_idField=<? echo $thisCustomer_id; ?>">Delete</a></TD>
	</TR>
<?
		$i++;

	} // end while loop
?>
</TABLE>


<p>&nbsp;</p>
<table width="550" border="0" cellpadding="2" cellspacing="2" bgcolor="#000000">
  <tr>
    <td><table width="550"  border="0" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF">
      <?
	$i = 0;
	while ($i<$numberOfRows)
	{

		if (($i%2)==0) { $bgColor = "#FFFFFF"; } else { $bgColor = "#CCCCCC"; }

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

?>
      <tr>
        <td width="12" bgcolor="<? echo $bgColor ?>">&nbsp;</td>
        <td width="399" bgcolor="<? echo $bgColor ?>"><span style="font-weight: bold; font-size: 15px;"><? echo $thisCustomer_id; ?> -</span> <span style="color: #000099; font-weight: bold;"><? echo $thisFname." ".$thisMname." ".$thisLname; ?> (<? echo $thisTitle; ?>)<br>
              <span style="color: #000099; font-weight: bold;"><? echo $thisCompany; ?></span></span><br>
              <? echo $thisAddress1; ?> <? echo $thisAddress2; ?> <? echo $thisAddress3; ?> <br>
              <? echo $thisCity; ?>, <? echo $thisState_province; ?><br>
              <? echo $thisCountry; ?> <? echo $thisPostal_code; ?><br>
      Phone: <? echo $thisPhone; ?> Fax: <? echo $thisFax; ?><br></td>
        <td width="111" valign="top" bgcolor="<? echo $bgColor ?>"><a href="edit.php?customer_idField=<? echo $thisCustomer_id; ?>"><br>
          Edit</a><br>
            <a href="confirm_delete.php?customer_idField=<? echo $thisCustomer_id; ?>">Delete</a></td>
      </tr>
      <?
		$i++;

	} // end while loop
?>
    </table></td>
  </tr>
</table>
<p>  <?
if ($_REQUEST['startLimit'] != "")
{
?>

  <a href="<? echo  $_SERVER['PHP_SELF']; ?>?startLimit=<? echo $previousStartLimit; ?>&limitPerPage=<? echo $limitPerPage; ?>&sortBy=<? echo $sortBy; ?>&sortOrder=<? echo $sortOrder; ?>">Previous <? echo $limitPerPage; ?> Results</a>....
  <? } ?>
  <?
if ($numberOfRows == $limitPerPage)
{
?>
  <a href="<? echo $_SERVER['PHP_SELF']; ?>?startLimit=<? echo $nextStartLimit; ?>&limitPerPage=<? echo $limitPerPage; ?>&sortBy=<? echo $sortBy; ?>&sortOrder=<? echo $sortOrder; ?>">Next <? echo $limitPerPage; ?> Results</a>
  <? } ?>

  <br>
  <br>
  <?
} // end of if numberOfRows > 0 
 ?>
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
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p></p>
