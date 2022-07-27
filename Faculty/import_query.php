<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);
if (isset($_POST['submit'])) 
{

//Import uploaded file to Database
$handle = fopen($_FILES['filename']['tmp_name'], "r");

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	mysqli_query($link,"INSERT INTO conference(a_y,e_y, date, nod,name,
                         decr,type,attend_as,role,cu_name,
						 dp_name,aid,photos,created_at) 
	values('$data[0]', '$data[1]', '$data[2]','$data[3]','$data[4]','$data[5]',
	'$data[6]','$data[7]','$data[8]','$data[9]',
	'$data[10]','$data[11]','$data[12]', NOW())");
	
	}

fclose($handle);

//print "Import done";
echo "<script type='text/javascript'>alert('Successfully Imported a CSV File for Conference!');</script>";
echo "<script>document.location='vconference.php'</script>";
//view upload form
}

?>