<?php
$echeck="select email from user where email=".$_POST['email'];
   $echk=mysqli_query($echeck);
   $ecount=mysqli_num_rows($echk);
  if($ecount!=0)
   {
      echo "Email already exists";
   }
   ?>