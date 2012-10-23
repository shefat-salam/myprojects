<?php require_once("include/connection.php");?>
<?php require_once("include/function.php");?>
<?php 
    find_selected_page();
?>

<?php include("include/header.php");?>
<div id="navigation">
      <?php echo navigation( $sel_subjects , $sel_page) ?>
   <br />
   <a href="new_subjects.php">+add a new subjects</a>
</div>
<div id="page">
    <h2>Add subjects</h2>
    <form action="create_subjects.php" name="" method="post">
      <p>Subject name: <input type="text" value="" name="menu_name" id="" /></p>
       <p>Positon: <select name="position">
                     <?php 
					     $subject_set = get_all_subjects();
						 $subject_count = mysql_num_rows($subject_set); 
					     for($count=1; $count <= $subject_count+1; $count++){
							 echo "<option value=\"{$count}\">{$count}</option>";						 
						}
					 ?>

       </select></p>
        <p>Visible: <input type="radio" name="visible" value="0" />No
		           &nbsp;<input type="radio" name="visible" value="1" />yes	        
        </p>
        <input type="submit" name=""  value="Add Subjects"/>
    
    </form>
    <a href="content.php">Cancle</a>
</div>
</div>
<?php
    include("include/footer.php");
?>
