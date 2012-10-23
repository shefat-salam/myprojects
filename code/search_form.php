<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
include_once("include/db_connection.php");
?>
<h2>Power Search Customers</h2>
The power search will search every field in the  Customers table, for a match to your keyword. The power searches entire strings or parts of your string. <br><br>
<form name="customersPowerSearchForm" method="POST" action="search.php">
<table cellspacing="2" cellpadding="2" border="0" width="500">
<tr>
<td align=right><font color=red><b>Keyword :</b></font>   </td>
<td><input type="text" name="keyword" value=""></td>
</tr>
<tr>
<td>&nbsp;     </td>
<td>The power search will search every field in the </td>
</tr>
</table>
<input type="submit" name="submitpowerSearchCustomersForm" value="Power search  Customers">
<input type="reset" name="resetForm" value="Clear Form">
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
