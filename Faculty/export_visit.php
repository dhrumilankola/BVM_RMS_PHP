<?php
	include("config.php");
//echo $_SESSION['user_id'];
include("asession.php"); 
	
	//connection
	

	$sql = "SELECT * FROM ind_visit where aid='$session_aid'";
	$query = $link->query($sql);

	if($query->num_rows > 0){
		$delimiter = ',';
		//create a download filename
		$filename = 'ind_visit.csv';
							
		$f = fopen('php://memory', 'w');

		$headers = array('Id', 'A_Y','Date','Industry Name', 'Industry City', 'Industry State', 'Sem No', 'Total Students');
    	fputcsv($f, $headers, $delimiter);

    	while($row = $query->fetch_array()){
			
	        $lines = array($row['id'],$row['a_y'].'-' .$row['e_y'],$row['date'],$row['industry_name'],$row['ind_city'], $row['ind_state'], $row['sem'], $row['noofstud']);
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