<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
include_once("include/db_connection.php");

function highlightSearchTerms($fullText, $searchTerm, $bgcolor="#FFFF99")
{
	if (empty($searchTerm))
	{
		return $fullText;
	}
	else
	{
		$start_tag = "<span style=\"background-color: $bgcolor\">";
		$end_tag = "</span>";
		$highlighted_results = $start_tag . $searchTerm . $end_tag;
		return eregi_replace($searchTerm, $highlighted_results, $fullText);
	}
}

?>
<?php
$thisKeyword = $_REQUEST['keyword'];
?>
<?

$newSortOrder = $_REQUEST['sortBy'];
if ($newSortOrder == "") $newSortOrder = "customer_id";

$sqlQuery = "SELECT *  FROM customers WHERE customer_id like '%$thisKeyword%'  OR fname like '%$thisKeyword%'  
		OR mname like '%$thisKeyword%'  OR lname like '%$thisKeyword%'  OR company like '%$thisKeyword%'  
		OR title like '%$thisKeyword%'  OR address1 like '%$thisKeyword%'  OR address2 like '%$thisKeyword%'
	  	OR address3 like '%$thisKeyword%'  OR city like '%$thisKeyword%'  OR state_province like '%$thisKeyword%'
		OR country like '%$thisKeyword%'  OR postal_code like '%$thisKeyword%'  OR phone like '%$thisKeyword%'
		OR fax like '%$thisKeyword%'";
		// ORDER BY $newSortOrder ";
		
		echo $sqlQuery;
		
$result = MYSQL_QUERY($sqlQuery);
$numberOfRows = MYSQL_NUM_ROWS($result);

?>
<?
if ($numberOfRows==0) {  
?>

 Sorry. No records found !!

<?
}
else if ($numberOfRows>0) {

	$i=0;
?>
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
$highlightColor = "#FFFF99"; 

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
	$thisCustomer_id = highlightSearchTerms($thisCustomer_id, $thisKeyword, $highlightColor); 
	$thisFname = highlightSearchTerms($thisFname, $thisKeyword, $highlightColor); 
	$thisMname = highlightSearchTerms($thisMname, $thisKeyword, $highlightColor); 
	$thisLname = highlightSearchTerms($thisLname, $thisKeyword, $highlightColor); 
	$thisCompany = highlightSearchTerms($thisCompany, $thisKeyword, $highlightColor); 
	$thisTitle = highlightSearchTerms($thisTitle, $thisKeyword, $highlightColor); 
	$thisAddress1 = highlightSearchTerms($thisAddress1, $thisKeyword, $highlightColor); 
	$thisAddress2 = highlightSearchTerms($thisAddress2, $thisKeyword, $highlightColor); 
	$thisAddress3 = highlightSearchTerms($thisAddress3, $thisKeyword, $highlightColor); 
	$thisCity = highlightSearchTerms($thisCity, $thisKeyword, $highlightColor); 
	$thisState_province = highlightSearchTerms($thisState_province, $thisKeyword, $highlightColor); 
	$thisCountry = highlightSearchTerms($thisCountry, $thisKeyword, $highlightColor); 
	$thisPostal_code = highlightSearchTerms($thisPostal_code, $thisKeyword, $highlightColor); 
	$thisPhone = highlightSearchTerms($thisPhone, $thisKeyword, $highlightColor); 
	$thisFax = highlightSearchTerms($thisFax, $thisKeyword, $highlightColor); 

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
	<TD nowrap><a href="edit.php?customer_idField=<? echo $thisCustomer_id; ?>">Edit</a></TD>
	<TD nowrap><a href="confirm_delete.php?customer_idField=<? echo $thisCustomer_id; ?>">Delete</a></TD>
	</TR>
<?
		$i++;

	} // end while loop
?>
</TABLE>
<?
} // end of if numberOfRows > 0 
 ?>
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
