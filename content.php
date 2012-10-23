<?php require_once("include/connection.php");?>
<?php require_once("include/function.php");?>
<?php find_selected_page();?>

<?php include("include/header.php");?>
<div id="navigation">
      <?php echo navigation( $sel_subjects , $sel_page) ?>
       <br />
   <a href="new_subjects.php">+add a new subjects</a>
</div>
<div id="page">
   <h2> 
    <?php if(!is_null($sel_subjects)){ ?>
    <?php echo $sel_subjects['menu_name']; ?>
     <?php }elseif (!is_null($sel_page)) { ?>
     <?php echo $sel_page['menu_name'];  ?>
	</h2>
    
	<?php echo $sel_page['content']; ?>
    <?php }else{ ?> 
    <h2> select a subjects or a page for edit </h2> 
	<?php } ?>
   
   
</div>
</div>
<?php
    include("include/footer.php");
?>
