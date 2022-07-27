<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);
    $id=$_GET["id"];
     $sql= "DELETE FROM ind_visit WHERE id='$id'"; 
        if(mysqli_query($link, $sql))
        {
              header('location:vind_visit.php');
        }
          else
            header('location:index.php');
?>