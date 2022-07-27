<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);

// if(isset($_POST['updatestudfees'])){
    $aid=$_GET["aid"];


     $sql= "DELETE FROM user WHERE aid='$aid'";
      
        if(mysqli_query($link, $sql))
        {
          
              header('location:vemploy.php');
        }
          else
            header('location:index.php');


?>