  <?php
include("config.php");
include("asession.php"); 
//$sql= "SELECT * FROM addstud WHERE sid='$session_id'";
$result=mysqli_query($link,"SELECT * FROM user WHERE aid=".$session_aid)or die('Error In Session');
$row=mysqli_fetch_array($result);
if(isset($_POST['Export'])){
      header('location:faculty_conf.php?aid='. $_GET['aid']);
  }
  elseif(isset($_POST['seminar']))
  {
     header('location:faculty_sem.php?aid='. $_GET['aid']);
  }
  elseif(isset($_POST['Books']))
  {
     header('location:faculty_book.php?aid='. $_GET['aid']);
  }
  elseif(isset($_POST['ind_visit']))
  {
     header('location:faculty_visit.php?aid='. $_GET['aid']);
  }
  elseif(isset($_POST['Papers']))
  {
     header('location:faculty_paper.php?aid='. $_GET['aid']);
  }
  elseif(isset($_POST['Exportproj']))
  {
     header('location:faculty_proj.php?aid='. $_GET['aid']);
  }
  else 
    echo "error in navigation";


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE/=edge">
  <title>Birla Vishvakarma Mahavidyalaya | Staff Report</title>
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
        <!-- <button class="dropdown-item" type="button" >Something else here</button> -->
      </div>
    </li>
      <li class="nav-item ">
        <?php 
         if (isset($_SESSION['name'])) { 
        ?>
          <a href="#"><?php echo $_SESSION['name']; ?></a>
          <!-- <a href="index3.html" class="nav-link">Alexander Pierce</a> -->
        <?php 
        } 
        ?>
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
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
                
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="vconference.php" class="nav-link">
                <img class="nav-icon" src="../images/Conference.png" style="width: 25px;" />
              <!-- <i class="nav-icon far fa fa-file"></i> -->
              <p>
                Conference Details
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
          
          </li>
           <li class="nav-item has-treeview">
            <a href="vseminar.php" class="nav-link">
  
    <img class="nav-icon" src="../images/Conference.png" style="width: 25px;" />            <!-- <i class="nav-icon far fa-user"></i> -->
              <p>
                Seminars Details
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
           
          </li>
          <li class="nav-item has-treeview">
            <a href="vbook.php" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Published Book Details
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
           
          </li>
          <li class="nav-item has-treeview">
            <a href="vind_visit.php" class="nav-link">
              <i class="nav-icon far fa-building"></i>
              <p>
                Industrial Visit
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
          
          </li>
          <li class="nav-item has-treeview">
            <a href="vpaper.php" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Papers
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
          
          </li>
          <li class="nav-item has-treeview">
            <a href="vreserch_proj.php" class="nav-link">
              <i class="nav-icon fas fa-laptop"></i>
              <p>
                Reserch Projects
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="vemploy.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employee
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addemployee.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vemploy.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Details</p>
                </a>
              </li>
            </ul> -->
          </li>
          <li class="nav-item has-treeview">
            <a href="addproject.php" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
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
                  <p>HOD Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="report_faculty.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff Report</p>
                </a>
              </li>
              
            </ul>
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
          <!-- <div class="col-sm-6">
            <h1>Update</h1>
          </div> -->
          <!-- <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Papers</li>
            </ol>
          </div> -->
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
          
            <div class="col-md-12" >
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">
                  <?php   $sql1="select * from user where aid='$_GET[aid]'";
                                        if($result1 = mysqli_query($link, $sql1)){
                                           $row2 = mysqli_fetch_array($result1);
                                           echo $row2['uname'];} ?>
                                             
                </h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    
                <!-- <div class="row">
                 
                    <div class="col-sm-4">
                    <div class="form-group">
                      <label>From Date</label>
                      <input type="date" class="form-control" placeholder="Enter ..." name="fromdate" >
                    </div>
                </div>
                 <div class="col-sm-4">
                    <div class="form-group">
                      <label>To Date</label>
                      <input type="date" class="form-control" placeholder="Enter ..." name="todate" >
                    </div>
                </div> -->
                <!--  <div class="col-sm-4">
                          <div class="form-group">
                              <label> Staff</label>
                            <?php
                              $sql = "SELECT * FROM user where user_type='Faculty'";
                              if($result = mysqli_query($link, $sql))
                              {
                            ?>
                                <select class="form-control" name="staff">
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                  $uname = $row['uname'];
                                    $aid=$row['aid'];
                                  echo '<option value="'.$aid.'">'.$uname.'</option>';
                                }
                                echo "</select>";
                              }
                              else
                                echo "error";
                                ?>
                          </div>
                  </div> -->
                  <!-- <div class="col-sm-3">
                     <div class="form-group">
                       <label>Select</label>
                           <select name="user_work" class="form-control" >
                              <option>Select </option>
                              <option value="All" >All</option>
                              <option value="Seminars" >Seminars</option>
                              <option value="Books" >Books</option>
                              <option value="Industrial Visit" >Industrial Visit</option>
                              <option value="Papers" >Papers</option>
                              <option value="Reserch Projects" >Reserch Projects</option>
                            </select>
                          </div>
                    </div> -->
              <!-- </div> -->
              <div class="row" style="margin-bottom:10px ">
                                 <div class="col-sm-1.2">
                                      <div class="col-sm-12">
                                      <input type="submit" class="btn btn-info" name="Export" value="Conference">
                                             
                                    </div>
                                    </div>
                                     <div class="col-sm-1.2">
                                        <div class="col-sm-12">
                                        <input type="submit" class="btn btn-info" name="seminar" value="Seminars">
                                             
                                    </div>
                                    </div>
                                    <div class="col-sm-1.2">
                                        <div class="col-sm-12">
                                        <input type="submit" class="btn btn-info" name="Books" value="Books">
                                             
                                    </div>
                                    </div>
                                    <div class="col-sm-1.2">
                      <div class="col-sm-12">
                      <input type="submit" class="btn btn-info" name="ind_visit" value="Industrial Visit">
                           
                  </div>
                  </div>
                  <div class="col-sm-1.2">
                      <div class="col-sm-12">
                      <input type="submit" class="btn btn-info" name="Papers" value="Papers">
                           
                  </div>
                  </div>
                   <div class="col-sm-1.2">
                      <div class="col-sm-12">
                      <input type="submit" class="btn btn-info" name="Exportproj" value="Research Project">
                           
                  </div>
                  </div> 
                                  </div>
                      <table id="vemploy"  class="table table-bordered projects">
                        <thead>
                              <tr>
                               <th> ID</th>  
                              <th>Date</th>                 
                              <th>Description</th>
                              <th>PDF</th>
                            
                              <!-- <th> Action</th> -->
                           
                            </tr>
                          </thead>
                        <tbody>
                        <?php
                      // $sql_sem = "SELECT * FROM seminars where aid='$_GET[aid]'";
                      // if($res_sem = mysqli_query($link, $sql_sem)){
                      // if(mysqli_num_rows($res_sem) > 0){ 
                      //     while($rowsem = mysqli_fetch_array($res_sem)){

                                 // $sql_con = "SELECT * FROM conference where aid='$_GET[aid]'";
                                 //    if($res_con = mysqli_query($link, $sql_con)){
                                 //         if(mysqli_num_rows($res_con) > 0){ 
                                 //      while($rowcon = mysqli_fetch_array($res_con)){

                                    //     $sql_book = "SELECT * FROM book where aid='$_GET[aid]'";
                                    // if($res_book = mysqli_query($link, $sql_book)){
                                    //    if(mysqli_num_rows($res_book) > 0){ 
                                    //   while($rowbook = mysqli_fetch_array($res_book)){
                                    //     $sql_proj = "SELECT * FROM reserch_proj where aid='$_GET[aid]'";
                                    // if($res_proj = mysqli_query($link, $sql_proj)){
                                    //    if(mysqli_num_rows($res_proj) > 0){ 
                                    //   while($rowproj = mysqli_fetch_array($res_proj)){
                                    //      $sql_ind = "SELECT * FROM ind_visit where aid='$_GET[aid]'";
                                    // if($res_ind = mysqli_query($link, $sql_ind)){
                                    //    if(mysqli_num_rows($res_ind) > 0){ 
                                    //   while($rowind = mysqli_fetch_array($res_ind)){
                                         $sql_paper = "SELECT * FROM papers where aid='$_GET[aid]'";
                                    if($res_paper = mysqli_query($link, $sql_paper)){
                                       if(mysqli_num_rows($res_paper) > 0){ 
                                      while($rowpaper = mysqli_fetch_array($res_paper)){
                            ?>
                            <tr>
                              <?php
                             $sql1="select * from user where aid='$rowpaper[aid]'";
                                        if($result1 = mysqli_query($link, $sql1)){
                                           while($row2 = mysqli_fetch_array($result1)){
                              echo "<td>" . $rowpaper['paperid'] . "</td>";
                            echo "<td style=width:10px>" . $rowpaper['date'] . "</td>";
                             echo "<td>" . $rowpaper['decr'] . "</td>";
                              echo "<td style=width:15%><iframe src='../Faculty/".$row2['uname']."/Papers/".date('Y')."/". $rowpaper['pdf'] . "' style=width:100%></iframe></td>";
                              
                              ?>

                              <!-- <td class="project-actions text-left" > -->
                                  
                                <!-- <a class="btn btn-info btn-sm" href="faculty_work.php?aid=<?php echo $row['aid']?>"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-info btn-sm" href="editemp.php?aid=<?php echo $row['aid']?>"><i class="fas fa-pencil-alt"></i></a>
                                <a class="btn btn-danger btn-sm" href="deleteemp.php?aid=<?php echo $row['aid']?>"><i class="fas fa-trash"></i></a> -->
                              <!-- </td> -->
                              </tr>
                              <?php
                            
                          }}}}}
                        // }}}}}}}}}}}}}}} 
                        ?>
                            
                        </tbody>
                        <!-- <tr>
                               
                                <td>
                                  <?php $counsem=mysqli_query($link,"SELECT count(*) as c FROM seminars where aid='$_GET[aid]'");
                               while($rows=mysqli_fetch_assoc($counsem))
                                      {
                                            echo $rows['c'];
                                      }     
                                  
                                ?></td> -->
                                <!-- <td>
                                  <?php $councon=mysqli_query($link,"SELECT count(*) as c FROM conference where aid='$_GET[aid]'");
                               while($rows=mysqli_fetch_assoc($councon))
                                      {
                                            echo $rows['c'];
                                      }     
                                  // echo count($rows['*']);
                                ?>
                                </td>
                                <td>
                                   <?php $counbook=mysqli_query($link,"SELECT count(*) as c FROM book where aid='$_GET[aid]'");
                               while($rows=mysqli_fetch_assoc($counbook))
                                      {
                                            echo $rows['c'];
                                      }     
                                  // echo count($rows['*']);
                                ?>
                                </td>
                                <td>
                                  <?php $counproj=mysqli_query($link,"SELECT count(*) as c FROM reserch_proj where aid='$_GET[aid]'");
                               while($rows=mysqli_fetch_assoc($counproj))
                                      {
                                            echo $rows['c'];
                                      }     
                                  // echo count($rows['*']);
                                ?></td>
                                <td>
                                  <?php $counind=mysqli_query($link,"SELECT count(*) as c FROM ind_visit where aid='$_GET[aid]'");
                               while($rows=mysqli_fetch_assoc($counind))
                                      {
                                            echo $rows['c'];
                                      }     
                                  // echo count($rows['*']);
                                ?>
                                </td>
                                <td>
                                   <?php $counpap=mysqli_query($link,"SELECT count(*) as c FROM papers where aid='$_GET[aid]'");
                               while($rows=mysqli_fetch_assoc($counpap))
                                      {
                                            echo $rows['c'];
                                      }     
                                  // echo count($rows['*']);
                                ?>
                                </td>
                                 <td>
                                  Total
                                </td> -->
                              <!-- </tr> -->
                    </table>
                  
               <!--  <div class="row">

                  <div class="col-sm-1.2">
                    <div class="col-sm-12">
                    <input type="submit" class="btn btn-info" name="Export" value="Conference">
                           
                  </div>
                  </div>
                   <div class="col-sm-1.2">
                      <div class="col-sm-12">
                      <input type="submit" class="btn btn-info" name="seminar" value="Seminars">
                           
                  </div>
                  </div>
                  <div class="col-sm-1.2">
                      <div class="col-sm-12">
                      <input type="submit" class="btn btn-info" name="Books" value="Books">
                           
                  </div>
                  </div>
                  <div class="col-sm-1.2">
                      <div class="col-sm-12">
                      <input type="submit" class="btn btn-info" name="ind_visit" value="Industrial Visit">
                           
                  </div>
                  </div>
                  <div class="col-sm-1.2">
                      <div class="col-sm-12">
                      <input type="submit" class="btn btn-info" name="Papers" value="Papers">
                           
                  </div>
                  </div>
                   <div class="col-sm-1.2">
                      <div class="col-sm-12">
                      <input type="submit" class="btn btn-info" name="Exportproj" value="Research Project">
                           
                  </div>
                  </div> -->
                 <!--  <div class="col-sm-1.2">
                      <div class="col-sm-12">
                      <input type="submit" class="btn btn-info" name="all" value="All">
                           
                  </div>
                  </div> -->
                <!-- </div> -->
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
