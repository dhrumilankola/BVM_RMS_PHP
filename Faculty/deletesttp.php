<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);

// if(isset($_POST['updatestudfees'])){
    $sttpid=$_GET["sttpid"];


     $sql= "DELETE FROM sttp_fdp WHERE sttpid='$sttpid'";
      
        if(mysqli_query($link, $sql))
        {
            echo "<script>alert('Delete Successfully');</script>";
              header('location:vsttp.php');
        }
          else
            header('location:index.php');


?>