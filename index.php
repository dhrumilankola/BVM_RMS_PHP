<?php
include("config.php");
//echo $_SESSION['user_id'];
include("asession.php"); 
//$sql= "SELECT * FROM addstud WHERE sid='$session_id'";
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid' and user_type='Admin'")or die('Error In Session');
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
  <title>Birla Vishvakarma Mahavidyalaya | Dashboard</title>
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
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" onclick="myFunction()" href="#">
          <i class="far fa-bell"></i>
          <span id="notification-count" class="badge badge-warning navbar-badge">5</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <div class="dropdown-divider"></div>
           <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="notification-latest"></div>
          <div class="dropdown-divider"></div>
        </div>

      </li> -->
        <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
      
    <li class="nav-item btn-group">

      <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: white; color: black; border: none; padding-top: 0px; ">
         <li class="nav-item ">
          <?php 
          if($row['profile']){
          ?>
        <img src="../images/<?php echo $row['profile']; ?>" alt="User Avatar" class="img-size-50 img-circle ">
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
        <a href="./logout.php"><button class="dropdown-item" type="button" name="logout">Logout</button></a>
        <!-- <button class="dropdown-item" type="button" >Something else here</button> -->
      </div>
    </li>


    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
     
    <!-- Brand Logo-->
    <a href="index.php" class="brand-link">
         <img src="../images/BVM Logo-1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">  
      <span class="brand-text font-weight-light" style="font-size: 16px"><b>BVM Engineering College</b></span>
    </a> 

    <!-- Sidebar -->
    <div class="sidebar">
        

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         

          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
                
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a class="nav-link">
              <i class="nav-icon far fa fa-file"></i>
              <p>
                Conference Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addconference.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vconference.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View </p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="enqiryvew.php" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Seminars Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addseminars.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vseminar.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View </p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="enqiryvew.php" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Book Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addbook.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vbook.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View </p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employee
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addemployee.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vemploy.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="enqiryvew.php" class="nav-link">
              <i class="nav-icon far fa fa-file"></i>
              <p>
                Industrial Visit
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addind_visit.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
               <li class="nav-item">
                <a href="vind_visit.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View </p>
                </a>
              </li>              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Papers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addpapers.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vpaper.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Reserch Projects
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addreserch_proj.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vreserch_proj.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="addproject.php" class="nav-link">
              <i class="nav-icon fas fa-chevron-circle-down"></i>
              <p>
              Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!--  <li class="nav-item">
                <a href="report_faculty.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Principal</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="report_HOD.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>HOD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="report_faculty.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff</p>
                </a>
              </li>
              
            </ul>
          </li>
           <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              
              <i class="nav-icon fas fa fa-plane"></i>
              <p>
               Visa
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addvisa.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Visa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="visa_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Visa</p>
                </a>
              </li>
              
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="gallery.php" class="nav-link">
             <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Gallery -->
                <!-- <i class="fas fa-angle-left right"></i> -->
             <!--  </p>
            </a>
         </li> -->

        
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
            <h1 class="m-0 text-dark">Dashboard</h1>
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
          <div class="col-lg-3 col-6">
           
            <div class="small-box" style="background-color: #ffa200; color: white">
              <div class="inner">
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from conference");
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #324867; color: white">
              <div class="inner">
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from seminars");
                   while ($rsem=mysqli_fetch_array($sql)) {
                        echo $rsem['c'];
                    } 

                ?></h3>

                <p>Total Seminars</p>
              </div>
              <div class="icon">
                <i class="fas fa-sitemap"></i>
              </div>
              <a href="vseminar.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #99004d; color: white">
              <div class="inner">
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from user");
                   while ($rconf=mysqli_fetch_array($sql)) {
                        echo $rconf['c'];
                    } 
                ?></h3>

                <p>Total Staff Members</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-friends"></i>
              </div>
              <a href="vemploy.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #3b6e78; color: white">
              <div class="inner">
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from department");
                   while ($rconf=mysqli_fetch_array($sql)) {
                        echo $rconf['c'];
                    } 

                ?></h3>

                <p>Total Departments</p>
              </div>
              <div class="icon">
                <i class="fas fa-graduation-cap"></i>
              </div>
              <a href="vdepartment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>

          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #99004d; color: white">
              <div class="inner">
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from ind_visit");
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
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #3b6e78; color: white">
              <div class="inner">
                <h3><?php $sql=mysqli_query($link,"select count(*) as c from subjects");
                   while ($rconf=mysqli_fetch_array($sql)) {
                        echo $rconf['c'];
                    } 

                ?></h3>

                <p>Total Subjects</p>
              </div>
              <div class="icon">
                <i class="fa fa-book" style="font-size:60px"></i>
                <!-- <i class="ion ion-stats-bars"></i> -->
              </div>
              <a href="vsubject.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        <!-- </div> -->
        <!-- /.row -->

       <!--  <div class="row">
          <div class="col-md-6">
            
          
            <div class="card card-danger">
              <div class="card-header"style="background-color: #357ab6; color: white">
               
                 <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Source Graph
                  </h3>
                
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div> -->
              <!-- /.card-body -->
          <!--   </div>
           
          </div>
          
          <div class="col-md-6">
           

          
            <div class="card card-success">
              <div class="card-header"style="background-color: #357ab6; color: white">
               
                 <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Stage Graph
                 </h3>
                

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div> -->
              <!-- /.card-body -->
           <!--  </div>
           
          </div>
          
        </div>
       
      </div> -->
    </section>
  
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Design & Developed By &copy; <!-- 2014-2019 --> <a href="#">Prof.Dharmesh Patel</a>.</strong>
    BVM IT Department.
    <!-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.1
    </div> -->
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
