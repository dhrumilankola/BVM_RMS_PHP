<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);

// if(isset($_POST['updatestudfees'])){
    $did=$_GET["did"];


     $sql= "DELETE FROM department WHERE did='$did'";
      
        if(mysqli_query($link, $sql))
        {
          
              header('location:vdepartment.php');
        }
          else
            header('location:index.php');


?>