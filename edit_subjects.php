<?php require_once("include/connection.php");?>
<?php require_once("include/function.php");?>

<?php
      if (intval($_GET['subj']) == 0){
        redirect_to("content.php");
      }

      if (isset($_POST['submit'])){

        $errors= array();
        //form validation

        $requeired_fields=array('menu_name','position','visible');
        foreach($requeired_fields as $fieldname){
          if(!isset($_POST[$fieldname])|| empty($_POST[$fieldname]) && $_POST[$fieldname] != 0 ){
            $errors[]=$fieldname;
            }
          }
        $fields_with_lengths=array('menu_name'=>30);
        foreach($fields_with_lengths as $fieldname =>$maxlangth){
          if(strlen(trim($_POST[$fieldname])) > $maxlangth){
            $errors[]=$fieldname;
            }
            
          }
         if (empty($errors)){  
          $id = mysql_prep($_GET['subj']);
          $menu_name = mysql_prep($_POST['menu_name']);
          $position = mysql_prep($_POST['position']);
          $visible = mysql_prep($_POST['visible']);

          $query = "UPDATE subjects SET 
              menu_name = '{$menu_name}', 
              position = {$position}, 
              visible = {$visible} 
            WHERE id = {$id}";
          $result= mysql_query($query, $connection);

                    if(mysql_affected_rows() == 1){
                        //success
                      $message = " The subjects was susseccfully updated.";
                    }else{
                        //error
                      $message = " The subjects update faild.";
                      $message .= "<br>". mysql_error();
                    }

        }else{

          //error occurred
           $message = "error occurred".count($erros);
        }
}
?>

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

    <h2>Edit subjects : <?php echo $sel_subjects["menu_name"]; ?></h2>
    <?php 
        if (!empty($message)){

          echo "<p class=\"message\">" . $message ."</p>";
        }
    ?>
    <?php
        if (!empty($errors)){
          echo "<p class=\"error\">";
          echo "please review the following field: <br/>";
          foreach ($errors as $error) {
            echo "_". $error ."<br/>";
          }
          echo "</p>"; 


        }

    ?>
    <form action="edit_subjects.php?subj=<?php echo urlencode($sel_subjects['id']); ?>" name="" method="post">
      <p>Subject name: <input type="text" value="<?php echo $sel_subjects["menu_name"]; ?>" name="menu_name" id="" /></p>
       <p>Position: <select name="position">
                <?php 
                
                $subject_set = get_all_subjects();
                $subject_count = mysql_num_rows($subject_set); 
                for($count=1; $count <= $subject_count+1; $count++){
                echo "<option value=\"{$count}\"";
                if($sel_subjects ['position'] == $count){
                echo "selected";  
                }
                echo ">{$count}</option>";						 
                }
                ?>

       </select></p>
        <p>Visible: <input type="radio" name="visible" value="0" <?php if($sel_subjects["visible"]== 0){echo "checked";} ?> />No
		           &nbsp;<input type="radio" name="visible" value="1" <?php if($sel_subjects["visible"]== 1){echo "checked";} ?>  />yes	        
        </p>
        <input type="submit" name="submit"  value="Edit Subjects"/>&nbsp;&nbsp;<a href="delete_subjects.php?subj=<?php echo urlencode($sel_subjects['id']); ?>" onclick="return confirm('Are you sure?');">Delet Subjects</a>
    
    </form>
    <a href="content.php">Cancle</a> 
</div>
</div>
<?php
    include("include/footer.php");
?>
