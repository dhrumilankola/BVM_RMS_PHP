<?php
	include("config.php");
//echo $_SESSION['user_id'];
include("asession.php"); 
	
	//connection
	

	$sql = "SELECT * FROM reserch_proj where aid='$session_aid'";
	$query = $link->query($sql);

	if($query->num_rows > 0){
		$delimiter = ',';
		//create a download filename
		$filename = 'reserch_proj.csv';
							
		$f = fopen('php://memory', 'w');

		$headers = array('Id', 'A_Y', 'Project Name', 'Start Date', 'End Date', 'Role', 'Agency Name','Sanction_Letter_No','Amount');
    	fputcsv($f, $headers, $delimiter);

    	while($row = $query->fetch_array()){
			
	        $lines = array($row['projectid'],$row['a_y'].'-' .$row['e_y'],$row['project_name'],$row['startdate'], $row['enddate'], $row['role'], $row['agency_name'], $row['sanction_letter_no'], $row['amount']);
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