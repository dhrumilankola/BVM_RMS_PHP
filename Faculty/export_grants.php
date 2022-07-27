<?php
	include("config.php");
//echo $_SESSION['user_id'];
include("asession.php"); 
	
	//connection
	

	$sql = "SELECT * FROM grant_detils where aid='$session_aid'";
	$query = $link->query($sql);

	if($query->num_rows > 0){
		$delimiter = ',';
		//create a download filename
		$filename = 'Grants.csv';
							
		$f = fopen('php://memory', 'w');

		$headers = array('ID','sy - ey' ,'sr_no' ,'Name_of_the_Principal_Investigator_Co_Investigator' ,'department_of_investigator' ,'Name_of_the_Funding_agency' ,'Type1' ,
        'Department_of_Principal_Investigator_Co_Investigator' ,'Year_of_Award' ,'Funds_provided','aid' ,'Duration_of_the_project');
    	fputcsv($f, $headers, $delimiter);

    	while($row = $query->fetch_array()){
			
	        $lines = array($row['id'],$row['sy'].'-' .$row['ey'],$row['sr_no'],$row['Name_of_the_Principal_Investigator_Co_Investigator'], $row['department_of_investigator'], $row['Name_of_the_Funding_agency'], $row['Type1'], $row['Department_of_Principal_Investigator_Co_Investigator'], $row['Year_of_Award'], $row['Funds_provided'], $row['aid'],  $row['Duration_of_the_project']);
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