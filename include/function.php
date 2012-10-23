<?php
function mysql_prep( $value ) {
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
		if( $new_enough_php ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $magic_quotes_active ) 
				{ $value = stripslashes( $value ); }
				
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$magic_quotes_active ) 
				{ $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}

function redirect_to($location=null){
	 if($location!=null){
	 header("Location:{$location}");
	 exit;
	 }
}
function confirm_query($result_set){ 
 if(!$result_set){                                              //this function wokes as confirm query (is query is ok then its works fine otherwise it show 
		   die("Ddatabase query faild:". mysql_error());        //error message)
		  }
}

function get_all_subjects(){
	      global $connection;
		 $query="SELECT * 
           FROM subjects                                        
		   ORDER BY position ASC";
       $subject_set = mysql_query($query, $connection);   
	    												//get all info from subjects tabel with build a query(ai function ar dara amra subjects table       
	  														 // ar sobdhoroner info like id, menu_name, position, visible pai)
	   confirm_query($subject_set);
		return $subject_set;
}	  

function get_pages_for_subjects($subject_id){
  		global $connection;	
		$query= "SELECT * 
			 	FROM pages                                     
			 	WHERE subjects_id={$subject_id}                 
			 	ORDER BY position ASC";    
				$page_set = mysql_query($query, $connection);
																//get a indivuadule row info from  pages table according to subject id(ai function ar dara amra 																		 																// nirdisto akti row ar info like id, sub_id, menu_name, position, visible pai)
				confirm_query($page_set);
				return $page_set;	
	}
	
	function get_subject_by_id($subject_id) {
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM subjects ";
		$query .= "WHERE id=" . $subject_id ." ";
		$query .= "LIMIT 1";
		$result_set = mysql_query($query, $connection);  //get a indivuadule row info from  subjects table according to subject id(ai function ar dara amra
		confirm_query($result_set);                      // akti nirdisto subject row ar sokol info pata pari
		// REMEMBER:
		// if no rows are returned, fetch_array will return false
		if ($subject = mysql_fetch_array($result_set)) {
			return $subject;
		} else {
			return NULL;
		}
	}
function get_page_by_id($page_id) {
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE id=" . $page_id ." ";
		$query .= "LIMIT 1";
		$result_set = mysql_query($query, $connection); //get a indivuadule row info from  pages table according to page id(ai function ar dara amra
		confirm_query($result_set);						// akti nirdisto page row ar sokol info pata pari
		// REMEMBER:
		// if no rows are returned, fetch_array will return false
		if ($page = mysql_fetch_array($result_set)) {
			return $page;
		} else {
			return NULL;
		}
	}
	
function find_selected_page(){
	 global $sel_subjects;
     global $sel_page;
	 	
	if (isset ($_GET['subj'])){
		$sel_subjects=get_subject_by_id($_GET['subj']); //link ar dara ja id pass kora hoy oi id catch kora get_subjects_by_id()function ar vetor pass kora oi 
		$sel_page=null;                                 // subjects ar id onusara oi row ar sob info dhora hoy abong content a print kora hoy

	}elseif(isset ($_GET['page'])){
		$sel_page=get_page_by_id($_GET['page']);        //link click korla je id pass kora hoy oi id catch kora get_page_by_id()function ar vetor pass kora oi 
		$sel_subjects=null;								//pages ar id onusara oi row ar sob info dhora hoy abong content a print kora hoy	
     
	}else{
		$sel_page=null;
		$sel_subjects=null;

	}
}

function navigation($sel_subjects, $sel_page){ 
	$output  ="";   
	$output .= "<ul class=\"subjects\">";
   $subject_set=get_all_subjects();                             //$sel_subjects, $sel_page used this as argument for selected subject and selected page
          while($subject = mysql_fetch_array($subject_set)){
		   $output .= "<li ";
		   if ($subject["id"]==$sel_subjects["id"]){
 		       $output .= "class=\"selected\"";	
		   }
			$output .= "><a href=\"edit_subjects.php?subj=". urlencode ($subject["id"])."\">{$subject["menu_name"]}</a></li>";
		       
			    $page_set=get_pages_for_subjects($subject["id"]);			
				$output .= "<ul class=\"pages\">";
				while($page = mysql_fetch_array($page_set)){
				$output .= "<li ";
				if ($page["id"]==$sel_page["id"]){
				$output .= "class=\"selected\"";
				}
				$output .= "><a href=\"edit_subjects.php?page=". urlencode ($page["id"])."\">{$page["menu_name"]}</a></li>";
				}
		       $output .= "</ul>";
		   }
 $output .= "</ul>";
 return $output;
}
?>		 