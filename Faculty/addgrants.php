<?php
include("config.php");
include("asession.php"); 
//$sql= "SELECT * FROM addstud WHERE sid='$session_id'";
$result=mysqli_query($link,"SELECT * FROM user WHERE aid=".$session_aid)or die('Error In Session');
$row=mysqli_fetch_array($result);
if(isset($_POST['addgrant'])){
   $ay=$_POST['ay'];
   $ey=$_POST['ey'];
   $srno=$_POST['srno'];
   $tog=$_POST['tog'];
   $nop=$_POST['nop'];
   $notfa=$_POST['notfa'];
   $dot=$_POST['dot'];
   $dop=$_POST['dop'];
   $yor=$_POST['yor'];
   $fp=$_POST['fp'];
   $dotp=$_POST['dotp'];
	
	
	
     $imageData = array();
 $sqldid=mysqli_query($link,"select * from Department WHERE did='$row[did]'");
$rowdid=mysqli_fetch_array($sqldid);

// if(isset($_FILES['pdfs'])){
//     $errors= array();
//   foreach($_FILES['pdfs']['tmp_name'] as $key => $tmp_name ){
//     $file_name = $key.$_FILES['pdfs']['name'][$key];
//     $file_tmp =$_FILES['pdfs']['tmp_name'][$key];
// //             if($file_size > 2097152){
// //                 $errors[]='File size must be less than 2 MB';
// //             }
//         array_push($imageData, $file_name);
//         $desired_dir=$rowdid['department']."/". $row['uname']."/".date('Y').'/Books/Documents/';
//         if(empty($errors)==true){
//             if(is_dir($desired_dir)==false){
//                 mkdir("$desired_dir", 0700);    // Create directory if it does not exist
//             }
//             if(is_dir("$desired_dir/".$file_name)==false){
//                 move_uploaded_file($file_tmp,$rowdid['department']."/". $row['uname']."/".date('Y').'/Books/Documents/'.$file_name);
//             }else{                  //rename the file if another one exist
//                 $new_dir=$rowdid['department']."/". $row['uname']."/".date('Y').'/Books/Documents/'.$file_name.time();
//                  rename($file_tmp,$new_dir) ;       
//             }
                
//         }else{
//                 print_r($errors);
//         }
//     }
  if(empty($error)){
     $pdfs = implode("|", $imageData);
      $query="INSERT INTO grant_detils (sy ,ey ,sr_no ,Name_of_the_Principal_Investigator_Co_Investigator ,department_of_investigator ,Name_of_the_Funding_agency ,Type1 ,
	  Department_of_Principal_Investigator_Co_Investigator ,Year_of_Award ,Funds_provided,aid ,Duration_of_the_project)VALUES('$ay','$ey','$srno','$nop','$dot','$notfa','$tog','$dop','$yor','$fp','$session_aid','$dotp')";
 if(mysqli_query($link,$query)){
      echo "<script>alert('Book Added Successfully')</script>";
            header('location:vgrants.php');
        }       
  }
}   

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BRMS |Add Grant Details</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="shortcut icon" href="img/bvm_favicon.png?3">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   
    <!-- Left navbar links -->
    <ul class="navbar-nav">
	
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
	
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <!-- Notifications Dropdown Menu -->
     <a href="index.php" >
	  <img src="../images/bvm.png" alt="User Avatar" style="width:100%">
	  </image>
	</a> 
    <li class="nav-item btn-group">

      <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: white; color: black; border: none; padding-top: 0px; ">
         <li class="nav-item ">
          <?php 
          $sqldid=mysqli_query($link,"select * from Department WHERE did='$row[did]'");
        $rowdid=mysqli_fetch_array($sqldid);
          if($row['profile']){
          ?>
        <img src="./<?php echo $rowdid['department'];?>/<?php echo $row['uname'];?>/Images/<?php echo $row['profile']; ?>" alt="User Avatar" class="img-size-50 img-circle ">
        <?php }
        else {
        ?>
         <img src="./img/use.jpg ?>" alt="User Avatar" class="img-size-50 img-circle ">
       <?php }?>
      </li>
        <?php echo $row['uname']; ?>
      </button>
      <div class="dropdown-menu dropdown-menu-right">
       <a href="profile.php"><button class="dropdown-item" type="button">Profile</button></a>
        <a href="pass.php"> <button class="dropdown-item" type="button">Change Password</button></a>
        <a href="../logout.php"><button class="dropdown-item" type="button" name="logout">Logout</button></a>
        
      </div>
    </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
     
    <!-- Brand Logo-->
   <a href="index.php" class="brand-link">
         <img src="../images/BVM Logo-1.png" alt="BVM" class="brand-image img-circle elevation-3" style="opacity: .8">  
      <span class="brand-text font-weight-light" style="font-size: 16px"><b>BRMS &nbsp; FACULTY</b></span>
   	</a>

    <!-- Sidebar -->
    <div class="sidebar">
	<!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block"><?php echo $rowdid['department']; ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="index.php" class="nav-link ">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Home
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="profile.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Profile
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a class="nav-link">
                <img class="nav-icon" src="../images/Conference.png" style="width: 25px;" />
                <!-- <i class="nav-icon far fa fa-file"></i> -->
                <p>
                  Conference Details
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="addconference.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="vconference.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Details</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-clone"></i>
                <!--<img class="nav-icon" src="../images/Conference.png" style="width: 25px;" />-->
                <p>
                  Seminars/Symposium
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="addseminars.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="vseminar.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Details</p>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-signature"></i>

                <p>
                  STTP/FDP Details
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="addsttp.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="vsttp.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Details</p>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a class="nav-link">

                <i class="nav-icon fas fa-won-sign"></i>
                <p>
                  Workshop Details
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="addworkshop.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="vworkshop.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Details</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a class="nav-link">

                <i class="nav-icon fa fa-user-secret"></i>
                <p>
                  Expert Talk/Session Chair
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="addsession_chair.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="vsession_chair.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Details</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book-open"></i>
                <p>
                  Published Book Details
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="addbook.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="vbook.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Details</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-building"></i>
                <p>
                  Industrial Visit
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="addind_visit.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="vind_visit.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Details</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                  Papers
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="addpapers.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="vpaper.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Details</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-laptop"></i>
                <p>
                  Reserch Projects
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="addreserch_proj.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="vreserch_proj.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Details</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="enqiryvew.php" class="nav-link">
                <i class="nav-icon fas fa-tenge"></i>

                <p>
                  Testing / Consultancy Work
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="addtesting.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="vtesting.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Details</p>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>

                <p>
                  Patents
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="addpatent.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="vpatent.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Details</p>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a class="nav-link">

                <i class="nav-icon fa fa-user-md"></i>
                <p>
                  Reviewer / Guide Details
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="addguide.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="vguide.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Details</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item has-treeview">
              <a class="nav-link">

                <i class="nav-icon fa fa-trophy"></i>
                <p>
                  Award Received Details
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="addaward.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="vaward.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Details</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
            <a class="nav-link active">
               
            <i class="nav-icon fa-solid fa-circle-dollar-to-slot"></i> 
              <p>
                Grant Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addgrants.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vgrants.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Details</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item has-treeview">
              <a href="report_faculty.php" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                  Reports
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

            </li>
            <li class="nav-item">
              <a href="pass.php" class="nav-link">
                <i class="fas fa-edit">&nbsp; </i>
                <p>
                  Change Password
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="../logout.php" class="nav-link">
                <i class="fas fa-sign-out-alt">&nbsp; </i>
                <p>
                  Sign Out
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            </li>
            <li class="nav-header"></li>
            <li class="nav-item">
              <a href="#" class="nav-link">

                <p></p>
              </a>
            </li>
          </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
            <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Add Grant Details</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
			  <script type='text/javascript'>

		function frmselect(){				
			
			var not = document.getElementById('not');
			
			
			if(madetype(not, "Please Select No of Author")){
			
									return true;
								
				}
			return false;
			
		}
		function madetype(elem, helperMsg){
			if(elem.value == "Select here"){
				alert(helperMsg);
				elem.focus();
				return false;
			}else{
				return true;
			}
		}
		
		
		</script>
                <form action="#" method="post" enctype="multipart/form-data" onsubmit=" return frmselect()">
                <div class="row">
				<div class="col-sm-2">
                    <!-- text input -->
					<script>
                            function test(){
                                var value = parseInt(document.getElementById('aydt').value, 10);
                                value = isNaN(value) ? 0 : value;
                                value++;
                                document.getElementById('eydt').value = value;
                            }
                        </script>
                    <div class="form-group">
                      <label>Start Academic Year</label>
                      <input type="text" class="form-control" placeholder="2015" name="ay" id="aydt"  tabindex="1" required onblur="test()">
                    </div>
                  </div>
				  <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                      <label>End Academic Year</label>
                      <input type="text" class="form-control" placeholder="2016" name="ey" id="eydt" tabindex="2" required readonly>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Sr. No.</label>
                      <input type="text" class="form-control" tabindex="3" placeholder="Enter Serial number here.." name="srno" required>
                    </div>
                  </div>            
                 <div class="col-sm-4">
                            <div class="form-group">
                                  <label>Type of Grant</label>
                                  <select class="form-control" name="tog" id='tog' tabindex="4" required>
                                    <option>Select here </option>
                                    <option value="Government">Government</option>
                                    <option value="Non-Government">Non-Government</option>									
                                  </select>
                            </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Name of the Principal, Investigator/ Co Investigator</label>
                      <input type="text" class="form-control" tabindex="5" placeholder="Dr.Indrajit N.Patel " name="nop" >
                    </div>					
                </div>
				<div class="col-sm-4">
                    <div class="form-group">
                      <label>Name of the Funding agency </label>
                      <input type="text" class="form-control" tabindex="6" placeholder="Agency name..." name="notfa">
                    </div>					
                </div>
				<div class="col-sm-4">
                            <div class="form-group">
                                  <label>Department Of Investigator</label>
                                  <select class="form-control" name="dot" id='dot' tabindex="4" required>
                                    <option>Select here </option>
                                    <option value="Civil Engineering">Civil Engineering</option>
                                    <option value="Structural Engineering">Structural Engineering</option>			
                                    <option value="Computer Engineering">Computer Engineering</option>
                                    <option value="Electronics Engineering">Electronics Engineering</option>						
                                    <option value="Electrical Engineering">Electrical Engineering</option>
                                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                                    <option value="Production Engineering">Production Engineering</option>
                                    <option value="Electronics & Communication Engineering">Electronics & Communication Engineering</option>
                                    <option value="Information Technology Engineering">Information Technology Engineering</option>
                                    <option value="Mathematics Department">Mathematics Department</option>
                                  </select>
                            </div>
                          </div>
				<div class="col-sm-3">
                    <div class="form-group">
                      <label>Department of Principal Investigator/ Co Investigator</label>
                      <select class="form-control" name="dop" id='dop' tabindex="4" required>
                      <option>Select here </option>
                                    <option value="Civil Engineering">Civil Engineering</option>
                                    <option value="Structural Engineering">Structural Engineering</option>			
                                    <option value="Computer Engineering">Computer Engineering</option>
                                    <option value="Electronics Engineering">Electronics Engineering</option>						
                                    <option value="Electrical Engineering">Electrical Engineering</option>
                                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                                    <option value="Production Engineering">Production Engineering</option>
                                    <option value="Electronics & Communication Engineering">Electronics & Communication Engineering</option>
                                    <option value="Information Technology Engineering">Information Technology Engineering</option>
                                    <option value="Mathematics Department">Mathematics Department</option>
                                  </select>                    </div>					
                </div>
				<div class="col-sm-3">
                    <div class="form-group">
                      <label>Year of Award</label>
                      <input type="number" class="form-control"  tabindex="9" placeholder="2020" name="yor" required >
                    </div>					
                </div>
				<div class="col-sm-3">
                    <div class="form-group">
                      <label>Funds provided</label>
                      <input type="number" class="form-control"  tabindex="10" placeholder="INR in lakhs" name="fp" required >
                    </div>					
                </div>
				<div class="col-sm-3">
                    <div class="form-group">
                      <label>Duration of the project</label>
                      <input type="number" class="form-control" tabindex="11" placeholder="Enter the days" name="dotp" required pattern="[0-9]+">
                    </div>					
                </div>
				
				<script type='text/javascript'>

		function frmnod(){				
			
			var nd = document.getElementById('nd');
			
				if(isNumeric(nd, "Please Enter a valid Year")){
						
									return true;
								}
					
			return false;
			
		}
		function isNumeric(elem, helperMsg){
			var numericExpression = /^[0-9]+$/;
			if(elem.value.match(numericExpression)){
				return true;
			}else{
				alert(helperMsg);
				elem.focus();
				return false;
			}
		}

		</script>
				<!-- <div class="col-sm-3">
                    <div class="form-group">
                      <label>Year of Publication</label>
                      <input type="text" class="form-control"  tabindex="12" placeholder="2019" name="yp"  id='nd' required onchange="frmnod()">
                    </div>					
                </div> -->
				<!-- <div class="col-sm-4">
                    <div class="form-group">
                      <label>Publisher Name</label>
                      <input type="text" class="form-control"  tabindex="13" placeholder="Pearson Education, Inc.," name="pn" required >
                    </div>					
                </div> -->
				<!-- <div class="col-sm-5">
                    <div class="form-group">
                      <label>Publisher Website</label>
                      <input type="text" class="form-control" tabindex="14"  placeholder="https://www.pearson.com/" name="pw" required >
                    </div>					
                </div>
                    -->
                 
              </div>
              
                <div class="row">

                  <div class="col-sm-12">
                              <div class="col-sm-12">
                              <input type="submit" class="btn btn-success"  tabindex="16" name="addgrant" value="Submit">
                           <button type="reset" class="btn btn-danger float-right"  tabindex="17"><i class="glyphicon glyphicon-repeat"></i>Reset</button>       
                  </div>
                  </div>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.card-body -->
          </div>
          <!--/.card  -->
          </div>
          
         
         
            <!-- /.card -->
          </div>
          <!--/.col  -->
          
          
          </form>
          
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section><!-- /.section -->
  </div><!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Design & Developed By &copy; <!-- 2014-2019 --> <a href="#">Prof.Dharmesh Patel</a>.</strong>
    BVM IT Department.
    <div class="float-right d-none d-sm-inline-block">
      <b><?php
// Return current date from the remote server.
date_default_timezone_set("Asia/Kolkata");
$date = date('d-m-y h:i:s'); echo $date; ?></p></b> 
    </div> 
  </footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- for add row in document-->
 <script>
  
  function addeng() {
  $('#eng tbody').append('<tr><td><input type="date" class="form-control" placeholder="Enter ..." name="day[]" required pattern="\Y{4}-\m{2}-\d{2}" >'+
    '</td><td><select class="form-control" name="tname[]">'+
    '<option>Select</option>'+
    '<option value="IELTS">IELTS</option>'+
    '<option value="TOFEL">TOFEL</option>'+
    '<option value="GRE">GRE</option>'+
    '<option value="GMAT">GMAT</option>'+
    '<option value"SAT>SAT</option>'+
    
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="speak[]">'+ 
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="reading[]">'+ 
    '</td>><td><input type="text" class="form-control" placeholder="Enter...." name="listen[]">'+ 
    '</select>' +  '</td><td><input type="text" class="form-control" placeholder="Enter...." name="writing[]">' +
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name=overall[]>'+ 
    '</td><td> <button type="button" class="btn btn-info btn-sm" onclick="addeng()"><i class="fas fa-plus-square"></i></button>'+ ' '+
    '<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>'+ 
    '</td></tr>');
  rowNo++;
  }
  var rowNo = 2;
  function adddoc() {

  $('#doc tbody').append('<tr><td>' + rowNo + '</td><td><input type="file" name="files[]" class="btn btn-info btn-block file" multiple>' + '</td><td> <button type="button" class="btn btn-info btn-sm" onclick="adddoc()"><i class="fas fa-plus-square"></i></button>'+' '+ '<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>'+ 
    '</td></tr>');
  rowNo++;
  }
  function addWork() {
  $('#work tbody').append('<tr><td><input type="text" class="form-control" placeholder="Enter...." name="title[]">'+'</td><td><input type="text" class="form-control" placeholder="Enter...." name="company[]">' +  '</td><td><input type="date" class="form-control" placeholder="Enter ..." name="Start[]">' + '</td><td><input type="date" class="form-control" placeholder="Enter ..." name="end[]">'+ '</td><td><input type="text" class="form-control" placeholder="Enter...." name="experience[]">'+ '</td><td><button type="button" class="btn btn-info btn-sm" onclick="addWork()"><i class="fas fa-plus-square"></i></button>'+ ' '+'<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>'+ 
    '</td></tr>');
  rowNo++;
  }
  function addAcc() {
  $('#Acc tbody').append('<tr><td><?php
                        $sql1 = "SELECT  level FROM level ";
                        if($result = mysqli_query($link, $sql1))
                        {?>
                          <select class="form-control" name="acdlevel[]"><?php
                          while ($row = mysqli_fetch_assoc($result)) {
                            $level = $row['level'];
                            echo '<option value="'.$level.'">'.$level.'</option>';
                          }
                          echo "</select>";
                        }
                        else
                          echo "error";
                          ?>
                   '+
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="sub[]">'+ 
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="uni[]">'+ 
    '</td><td><?php
                           $currently_selected = date('Y');
                           $earliest_year = 1997;
                           $latest_year = date('Y+2');?>
                          <select class="form-control" name="acdyr[]"> <?php
                           foreach ( range( $latest_year, $earliest_year ) as $i ) {
                            print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                            }
                            print '</select>';
                            ?>'+ 
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="result[]">'+ 
    '</td></td><td><select class="form-control" name="medium[]">'+
                       '<option>Select</option>'+
                       '<option value="Hindi">Hindi</option>'+
                       '<option value="English">English</option>'+
                       '</select>'+ 
    '</td><td><button type="button" class="btn btn-info btn-sm" onclick="addAcc()"><i class="fas fa-plus-square"></i></button>'+' '+
    '<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>'+ 
    '</td></tr>');
  
  }
  function del() {
    $(".delete").click(function() {
    $(this).closest("tr").remove();
    });
  }
  
 </script>
<script type="text/javascript">

  function myFunction() {
    $.ajax({
      url: "view_notification.php",
      type: "POST",
      processData:true,
      success: function(data){
        $("#notification-count").remove();          
        $("#notification-latest").show();$("#notification-latest").html(data);
      },
      error: function(){}           
    });
   }
   
   $(document).ready(function() {
    $('body').click(function(e){
      if ( e.target.id != 'notification-icon'){
        $("#notification-latest").hide();
      }
    });
  });
     
  </script>
</body>
</html>