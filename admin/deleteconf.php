<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);

// if(isset($_POST['updatestudfees'])){
    $conid=$_GET["conid"];


     $sql= "DELETE FROM conference WHERE conid='$conid'";
      
        if(mysqli_query($link, $sql))
        {
          
              header('location:vconference.php');
        }
          else
            header('location:index.php');


?>