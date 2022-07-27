<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);

// if(isset($_POST['updatestudfees'])){
    $pid=$_GET["pid"];


     $sql= "DELETE FROM patent WHERE pid='$pid'";
      
        if(mysqli_query($link, $sql))
        {
            echo "<script>alert('Delete Successfully');</script>";
              header('location:vpatent.php');
        }
          else
            header('location:index.php');


?>