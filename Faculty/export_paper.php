<?php
	include("config.php");
//echo $_SESSION['user_id'];
include("asession.php"); 
	
	//connection
	

	$sql = "SELECT * FROM papers where aid='$session_aid'";
	$query = $link->query($sql);

	if($query->num_rows > 0){
		$delimiter = ',';
		//create a download filename
		$filename = 'paper.csv';
							
		$f = fopen('php://memory', 'w');

		$headers = array('Id', 'A_Y', 'Paper Title', 'No_Author', 'First_Author', 'Second_Author', 'Third_Author','Fourth_Author','Conference_Journal Name','Paper Type',  'ISBN_No', 'DOI No', 'Volume', 'Month_of_Publication', 'Year_of_Publication', 'Impact Factor');
    	fputcsv($f, $headers, $delimiter);

    	while($row = $query->fetch_array()){
			
	        $lines = array($row['paperid'],$row['a_y'].'-' .$row['e_y'],$row['title'],$row['no_at'], $row['fat'], $row['sat'], $row['tat'], $row['ffat'], $row['cj_name'],  $row['paper_type'],$row['isbn'],  $row['doi'], $row['v_i'], $row['mp'], $row['yp'], $row['impact']);
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