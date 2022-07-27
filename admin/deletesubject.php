
<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);

// if(isset($_POST['updatestudfees'])){
    $subid=$_GET["subid"];


     $sql= "DELETE FROM subjects WHERE subid='$subid'";
      
        if(mysqli_query($link, $sql))
        {
          
              header('location:vsubject.php');
        }
          else
            header('location:index.php');


?>