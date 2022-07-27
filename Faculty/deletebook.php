<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);
    $bookid=$_GET["bookid"];
     $sql= "DELETE FROM book WHERE bookid='$bookid'"; 
        if(mysqli_query($link, $sql))
        {
        	  echo "<script>alert('Delete Successfully');</script>";
              header('location:vbook.php');
        }
          else
            header('location:index.php');
?>