<?php 
// Include the database config file 
include("config.php");
 
if(!empty($_POST["did"])){ 
		echo "vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv".$_POST["did"];
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM user WHERE did ='$_POST[did]' AND user_type='Faculty'"; 
    $result = $link->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Staff</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['aid'].'">'.$row['uname'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Staff not available</option>'; 
    } 
}
else 
	echo "eeeeeeeeeeeeeeeeeeeeeeeeeeeeerror";
?>