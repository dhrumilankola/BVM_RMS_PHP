<?php
include("config.php");
//echo $_SESSION['user_id'];
include("asession.php"); 
//$sql= "SELECT * FROM addstud WHERE sid='$session_id'";
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid' and user_type='Faculty'" )or die('Error In Session');
$row=mysqli_fetch_array($result);


// $sql2="SELECT * FROM events WHERE status = 0";
// $result=mysqli_query($link, $sql2);
// $count=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BRMS|Faculty Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="styleshe et" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
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
   <!-- fullCalendar -->
  <link rel="stylesheet" href="../plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="../plugins/fullcalendar-interaction/main.min.css">
  <link rel="stylesheet" href="../plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="../plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="../plugins/fullcalendar-bootstrap/main.min.css">
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
     <li class="nav-item btn-group">
	 <a href="index.php" >
	  <img src="../images/bvm.png" alt="User Avatar" style="width:100%">
	  </image>
	</a>
	 </li>
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
            <a href="index.php" class="nav-link active">
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
                Semi/Symp/Webi Details 
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
            <a href="enqiryvew.php" class="nav-link">
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
            <a href="enqiryvew.php" class="nav-link">
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
            <a href="enqiryvew.php" class="nav-link">
              <i class="nav-icon far fa-building"></i>
              <p>
                Industrial Visit Details
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
                Reserch Projects Details
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
            <a href="#" class="nav-link">
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
                Patents Details
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
            <a class="nav-link">
               
              <i class="nav-icon fa fa-user-secret"></i> 
              <p>
                Grant Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addgrants.php" class="nav-link">
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Faculty Dashboard</h1>
          </div><!-- /.col -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div> -->
        </div>
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
       
        <div class="row">
          <div class="col-lg-4 col-7">
           
            <div class="small-box" style="background-color: #ffa200; color: white">
              <div class="inner">
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from conference where aid='$session_aid'");
                   while ($rconf=mysqli_fetch_array($sql)) {
                        echo $rconf['c'];
                    } 

                ?></h3>

                <p>Total Conference</p>
              </div>
              <div class="icon">
			  <i class="fas fa-sitemap"></i>
              </div>
              <a href="vconference.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #324867; color: white">
              <div class="inner">
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from seminars where aid='$session_aid'");
                   while ($rsem=mysqli_fetch_array($sql)) {
                        echo $rsem['c'];
                    } 

                ?></h3>

                <p>Total Seminars</p>
              </div>
              <div class="icon">
                <i class="fas fa-clone"></i>
              </div>
              <a href="vseminar.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #99004d; color: white">
              <div class="inner">
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from ind_visit where aid='$session_aid'");
                   while ($rconf=mysqli_fetch_array($sql)) {
                        echo $rconf['c'];
                    } 
                ?></h3>

                <p>Total Industrial Visits</p>
              </div>
              <div class="icon">
                <i class="far fa-building"></i>
              </div>
              <a href="vind_visit.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <div class="col-lg-4 col-6">
           
            <div class="small-box" style="background-color: #3b6e78; color: white">
              <div class="inner">
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from book where aid='$session_aid'");
                   while ($rconf=mysqli_fetch_array($sql)) {
                        echo $rconf['c'];
                    } 

                ?></h3>

                <p>Total Books</p>
              </div>  
              <div class="icon">
                <i class="fa fa-book" style="font-size:60px"></i>
                <!-- <i class="ion ion-stats-bars"></i> -->
              </div>
              <a href="vbook.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <div class="col-lg-4 col-6">
           
            <div class="small-box" style="background-color: #4169E1; color: white">
              <div class="inner">
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from papers where aid='$session_aid'");
                   while ($rconf=mysqli_fetch_array($sql)) {
                        echo $rconf['c'];
                    } 

                ?></h3>

                <p>Total Papers</p>
              </div>  
              <div class="icon">

                <i class="fa fa-newspaper" style="font-size:60px;"></i>
                <!-- <i class="ion ion-stats-bars"></i> -->
              </div>
              <a href="vpaper.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
			
          </div>
		  <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #FF6347; color: white">
              <div class="inner">
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from sttp_fdp where aid='$session_aid'");
                   while ($rconf=mysqli_fetch_array($sql)) {
                        echo $rconf['c'];
                    } 
                ?></h3>

                <p>Total STTP | FDP</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-signature"></i>
              </div>
              <a href="vsttp.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
		  <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #CD853F; color: white">
              <div class="inner">
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from workshop where aid='$session_aid'");
                   while ($rconf=mysqli_fetch_array($sql)) {
                        echo $rconf['c'];
                    } 
                ?></h3>

                <p>Total Workshops</p>
              </div>
              <div class="icon">
                <i class="fas fa-won-sign"></i>
              </div>
              <a href="vworkshop.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
		  <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #8FBC8B; color: white">
              <div class="inner">
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from testing where aid='$session_aid'");
                   while ($rconf=mysqli_fetch_array($sql)) {
                        echo $rconf['c'];
                    } 
                ?></h3>

                <p>Total Testing | Consultancy Works</p>
              </div>
              <div class="icon">
                <i class="fas fa-tenge"></i>
              </div>
              <a href="vtesting.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
		  
		  <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #48D1CC; color: white">
              <div class="inner">
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from ind_visit where aid='$session_aid'");
                   while ($rconf=mysqli_fetch_array($sql)) {
                        echo $rconf['c'];
                    } 
                ?></h3>

                <p>Total Patents</p>
              </div>
              <div class="icon">
                <i class="fas fa-table"></i>
              </div>
              <a href="vpatent.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <div class="col-lg-4 col-6">
           
            <div class="small-box" style=" background-color: #A52A2A; color: white">
              <div class="inner"> 
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from reserch_proj where aid='$session_aid'");
                   while ($rconf=mysqli_fetch_array($sql)) {
                        echo $rconf['c'];
                    } 

                ?></h3>

                <p>Total Research  Projects</p>
              </div>  
              <div class="icon">

                <i class="fas fa-laptop" style="font-size:60px"></i>
                <!-- <i class="ion ion-stats-bars"></i> -->
              </div>
              <a href="vreserch_proj.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
    </section>
   
  </div>
  <!-- /.content-wrapper -->
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
