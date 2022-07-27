<?php
	include("config.php");
//echo $_SESSION['user_id'];
include("asession.php"); 
	
	//connection
	

	$sql = "SELECT * FROM book where aid='$session_aid'";
	$query = $link->query($sql);

	if($query->num_rows > 0){
		$delimiter = ',';
		//create a download filename
		$filename = 'book.csv';
							
		$f = fopen('php://memory', 'w');

		$headers = array('Id', 'A_Y', 'Book_Title', 'No_Author', 'First_Author', 'Second_Author', 'Third_Author','Area','Book_Edition',  'ISBN_No', 'Book_Price', 'Year_Publication', 'Publisher_Name');
    	fputcsv($f, $headers, $delimiter);

    	while($row = $query->fetch_array()){
			
	        $lines = array($row['bookid'],$row['a_y'].'-' .$row['e_y'],$row['book_title'],$row['no_at'], $row['fat'], $row['sat'], $row['tat'], $row['area'], $row['book_edi'], $row['isbn'], $row['bp'],  $row['yp'], $row['pn']);
	        fputcsv($f, $lines, $delimiter);
	    }
	    
	    fseek($f, 0);
	    header('Content-Type: text/csv');
	    header('Content-Disposition: attachment; filename="' . $filename . '";');
	    fpassthru($f);
	    exit;
	}
	else{
		$_SESSION['message'] = 'Cannot export. Data empty';
		header('location:index.php');
	}
?>