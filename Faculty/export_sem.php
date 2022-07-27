<?php
	include("config.php");
//echo $_SESSION['user_id'];
include("asession.php"); 
	
	//connection
	

	$sql = "SELECT * FROM seminars where aid='$session_aid'";
	$query = $link->query($sql);

	if($query->num_rows > 0){
		$delimiter = ',';
		//create a download filename
		$filename = 'sem.csv';
							
		$f = fopen('php://memory', 'w');

		$headers = array('Id', 'A_Y', 'Date', 'Hours', 'Name', 'Type','Role', 'Audience', 'College_Name`', 'Dept_Name');
    	fputcsv($f, $headers, $delimiter);

    	while($row = $query->fetch_array()){
			$timestamp = strtotime($row['date']);
			$new_date = date("d-m-Y",$timestamp );
	        $lines = array($row['semid'],$row['a_y'].'-' .$row['e_y'],$new_date, $row['total_hours'], $row['name'], $row['type'], $row['role'], $row['audience'], $row['cu_name'], $row['dp_name']);
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