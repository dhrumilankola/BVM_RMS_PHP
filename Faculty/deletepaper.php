<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);
    $paperid=$_GET["paperid"];
     $sql= "DELETE FROM papers WHERE paperid='$paperid'"; 
        if(mysqli_query($link, $sql))
        {
        	  echo "<script>alert('Delete Successfully');</script>";
              header('location:vpaper.php');
        }
          else
            header('location:index.php');
?>