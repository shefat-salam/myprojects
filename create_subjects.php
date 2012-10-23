<?php ob_start(); ?>
<?php require_once("include/connection.php");?>
<?php require_once("include/function.php");?>
<?php
$errors=array();
//form validation
$requeired_fields=array('menu_name','position','visible');
foreach($requeired_fields as $fieldname){
	if(!isset($_POST[$fieldname])|| empty($_POST[$fieldname])){
		$errors[]=$fieldname;
		}
	}
$fields_with_lengths=array('menu_name'=>30);
foreach($fields_with_lengths as $fieldname =>$maxlangth){
	if(strlen(trim($_POST[$fieldname])) > $maxlangth){
		$errors[]=$fieldname;
		}
		
	}
if(!empty($errors)){
	redirect_to("new_subject.php");
  }


 ?>
<?php
   $menu_name = mysql_prep($_POST['menu_name']);
   $position = mysql_prep($_POST['position']);
   $visible = mysql_prep($_POST['visible']);
?>
<?php
   $query = "INSERT INTO subjects ( menu_name, position, visible) VALUES('{$menu_name}', '{$position}', '{$visible}' )";
   $result= mysql_query($query, $connection);
   if($result){
	   redirect_to("content.php");
	   
	  }else{
		echo "subject creation faild";
		echo "<p>".mysql_error()."</p>";  
	  }
 ?>


<?php mysql_close($connection); ?>
