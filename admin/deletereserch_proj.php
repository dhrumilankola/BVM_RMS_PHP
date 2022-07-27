<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);

// if(isset($_POST['updatestudfees'])){
    $projectid=$_GET["projectid"];


     $sql= "DELETE FROM reserch_proj WHERE projectid='$projectid'";
      
        if(mysqli_query($link, $sql))
        {
          
              header('location:vreserch_proj.php');
        }
          else
            header('location:index.php');


?>