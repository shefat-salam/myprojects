<?php require_once("include/connection.php");?>
<?php require_once("include/function.php");?>


<?php
    if (intval($_GET['subj']) == 0) {
      redirect_to("content.php");
    }


    $id = mysql_prep($_GET['subj']);

    if($subject = get_subject_by_id($id)){

    $query = "DELETE  from subjects WHERE id = {$id} LIMIT 1";
    $result = mysql_query($query, $connection);
    if (mysql_affected_rows() == 1){
          redirect_to("content.php");        

    }else{

        echo "<p>deletion faild</p>";
        echo "<p>". mysql_error() ."</p>";
        echo "<a href=\"content.php\"> Return to main page</a>";
    }

}else{

   redirect_to("content.php");      
}

?>
<?php
    include("include/footer.php");
?>
