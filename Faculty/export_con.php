<?php
	include("config.php");
//echo $_SESSION['user_id'];
include("asession.php"); 
	
	//connection
	

	$sql = "SELECT * FROM conference where aid='$session_aid'";
	$query = $link->query($sql);

	if($query->num_rows > 0){
		$delimiter = ',';
		//create a download filename
		$filename = 'conf.csv';
							
		$f = fopen('php://memory', 'w');

		$headers = array('Id', 'A_Y', 'Date', 'Nod', 'Name', 'Type', 'Attend As', 'Role', 'C_U_Name');
    	fputcsv($f, $headers, $delimiter);

    	while($row = $query->fetch_array()){
			$timestamp = strtotime($row['date']);
			$new_date = date("d-m-Y",$timestamp );
	        $lines = array($row['conid'],$row['a_y'].'-' .$row['e_y'],$new_date, $row['nod'], $row['name'], $row['type'], $row['attend_as'], $row['role'], $row['cu_name']);
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