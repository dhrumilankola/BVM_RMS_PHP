<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
// if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
//     header("location: vintern.php");
    
// }
if(isset($_SESSION['admin_id']) ){
   $session_aid=$_SESSION['admin_id'];
 
    
}
else
	header("location: login.php");


?>