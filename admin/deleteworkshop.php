<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);

// if(isset($_POST['updatestudfees'])){
    $workshopid=$_GET["workshopid"];


     $sql= "DELETE FROM workshop WHERE workshopid='$workshopid'";
      
        if(mysqli_query($link, $sql))
        {
            echo "<script>alert('Delete Successfully');</script>";
              header('location:vworkshop.php');
        }
          else
            header('location:index.php');


?>