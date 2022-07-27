<?php
	include("config.php");
//echo $_SESSION['user_id'];
include("asession.php"); 
	
	//connection
	

	$sql = "SELECT * FROM sttp_fdp where aid='$session_aid'";
	$query = $link->query($sql);

	if($query->num_rows > 0){
		$delimiter = ',';
		//create a download filename
		$filename = 'sttp.csv';
							
		$f = fopen('php://memory', 'w');

		$headers = array('Id', 'A_Y', 'Start_Date', 'End_Date', 'Nod', 'Name', 'Type','Mode','Role',  'College_Name`', 'Dept_Name');
    	fputcsv($f, $headers, $delimiter);

    	while($row = $query->fetch_array()){
			
	        $lines = array($row['sttpid'],$row['a_y'].'-' .$row['e_y'],$row['sdate'],$row['edate'], $row['nod'], $row['name'], $row['type'], $row['mode'], $row['role'],  $row['cu_name'], $row['dp_name']);
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