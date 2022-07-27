<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);
    $tid=$_GET["tid"];
     $sql= "DELETE FROM testing WHERE tid='$tid'"; 
        if(mysqli_query($link, $sql))
        {
        	  echo "<script>alert('Delete Successfully');</script>";
              header('location:vtesting.php');
        }
          else
            header('location:index.php');
?>