<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);
if(isset($_POST['updateind_visit'])){
    $id=$_GET["id"];
   $industry_name=$_POST['industry_name'];
    $ind_city=$_POST['ind_city'];
    $ind_state=$_POST['ind_state'];
    $zip=$_POST['zip'];
    $date=$_POST['date'];
      $decr=$_POST['decr'];
    $noofstud=$_POST['noofstud'];
  $sql1="select * from ind_visit where id='$_GET[id]'";
    if($result1 = mysqli_query($link, $sql1)){
       while($row2 = mysqli_fetch_array($result1)){
               $sql2="select * from user where aid='$row2[aid]'";
                    if($result2 = mysqli_query($link, $sql2)){
                       while($row3 = mysqli_fetch_array($result2)){
 $imageData = array();


if(isset($_FILES['photos'])){
    $errors= array();
  foreach($_FILES['photos']['tmp_name'] as $key => $tmp_name ){
    $file_name = $key.$_FILES['photos']['name'][$key];
    $file_tmp =$_FILES['photos']['tmp_name'][$key];
//             if($file_size > 2097152){
//                 $errors[]='File size must be less than 2 MB';
//             }        
        array_push($imageData, $file_name);
         if($row3['user_type'] == "Admin"){  
        $desired_dir='IndustryVisit/'.date('Y');

        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);    // Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,'IndustryVisit/'.date('Y')."/".$file_name);
            }else{                  //rename the file if another one exist
                $new_dir='IndustryVisit/'.date('Y')."/".$file_name.time();
                 rename($file_tmp,$new_dir) ;       
            }
                
        }else{
                print_r($errors);
        }
      }
       elseif($row3['user_type'] == "Faculty"){  
       
 $sqldid=mysqli_query($link,"select * from Department WHERE did IN (select did from user where aid=$row3[aid])");
    $rowdid=mysqli_fetch_array($sqldid);
     $desired_dir="../Faculty/".$rowdid['department']."/".$row3['uname']."/".date('Y')."/IndustryVisit/Photos";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);    // Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"../Faculty/".$rowdid['department']."/".$row3['uname']."/".date('Y')."/IndustryVisit/Photos/".$file_name);
            }else{                  //rename the file if another one exist
                $new_dir="../Faculty/".$rowdid['department']."/".$row3['uname']."/".date('Y')."/IndustryVisit/Photos/".$file_name.time();
                 rename($file_tmp,$new_dir) ;       
            }
                
        }else{
                print_r($errors);
        }
      }

    }
  if(empty($error)){
     $photos = implode("|", $imageData);
     $query= "UPDATE ind_visit SET industry_name='$industry_name',ind_city='$ind_city',ind_state='$ind_state',zip='$zip',date='$date',decr='$decr',photos='$photos',noofstud='$noofstud' WHERE id='$id'";  
        if(mysqli_query($link,$query)){
            header('location:vind_visit.php');
        }       
  }
}
}}}}}
else{
   if(isset($_GET["id"]) ){
    $id = $_GET['id'];
    // Prepare a select statement
    $sql = "SELECT * FROM ind_visit WHERE id = '$id'";
     if($result = mysqli_query($link, $sql)){
       
            if(mysqli_num_rows($result) == 1){
                 $rows = mysqli_fetch_assoc( $result );
                   $industry_name=$rows['industry_name'];
                    $ind_city=$rows['ind_city'];
                  $ind_state=$rows['ind_state'];
                  $zip=$rows['zip'];
                  $date=$rows['date'];
                  $decr=$rows['decr'];
                  $photos=$rows['photos'];
                  $noofstud=$rows['noofstud'];
                  $aid=$rows['aid'];
                } 
                else
                {
                    // URL doesn't contain valid id parameter. Redirect to error page
                    header("location: error.php");
                    exit();
                 }

      }
  }
}       
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Birla Vishvakarma Mahavidyalaya | Industrial Visit</title>
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
<style>
  body :not(#popup ){
      filter: blur("2px");
      -webkit-filter: blur("2px"); 
    }
 
  #popup{
    display: none;
    position:absolute;
    margin:0 auto;
    top: 25%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
    width: 50%;
  filter: blur(0px);  
              
    }
</style>

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
    <!--   <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" onclick="myFunction()" href="#">
          <i class="far fa-bell"></i>
        
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         
          <div class="dropdown-divider"></div>
           <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="notification-latest"></div>
          <div class="dropdown-divider"></div>
        </div>

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
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Conference</li>
            </ol>
          </div>
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
                <h3 class="card-title">Industrial Visit Details</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Industry Name</label>
                      <input type="text" class="form-control" placeholder="Enter ..." name="industry_name" value="<?php echo $industry_name?>">
                    </div>
                  </div>
                    <div class="col-sm-4">
                            
                      <div class="form-group">
                        <label>Discription</label>
                        <input type="text"  class="form-control" placeholder="Enter ..."name="decr" required  value="<?php echo $decr?>">
                       
                      </div>
                  </div>
                 <div class="col-sm-3">
                          <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="ind_city" value="<?php echo $ind_city?>">
                                    
                          </div>
                  </div>
                   <div class="col-sm-3">
                          <div class="form-group">
                          <label>State</label>
                          <input type="text" class="form-control" placeholder="Enter ..." name="ind_state" value="<?php echo $ind_state?>">
                                    
                          </div>
                  </div>
                   <div class="col-sm-2">
                          <div class="form-group">
                          <label>Pincode</label>
                          <input type="text" class="form-control" placeholder="Enter ..." name="zip" value="<?php echo $zip?>">
                                    
                          </div>
                  </div>
               
                  <div class="col-sm-3">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Date of Visit</label>
                                <input type="date"  class="form-control" name="date" required pattern="\Y{4}-\m{2}-\d{2}" value="<?php echo $date?>">
                                <!-- data-date-format="DD MMMM YYYY" -->
                              </div>
                  </div>
                  <div class="col-sm-3">
                          <div class="form-group">
                            <label>Number of Students</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="noofstud" value="<?php echo $noofstud?>">
                                    
                          </div>
                  </div>
                 
                   <div class="col-sm-3">
                <div class="form-group">
                  <label>Upload Photos</label>
                   <input type="file" name="photos[]" class="btn btn-info btn-block file" multiple value="<?php echo $photos?>">
                 </div>
               </div>
              </div>

             
                <div class="row">

                  <div class="col-sm-12">
                              <div class="col-sm-12">
                              <input type="submit" class="btn btn-info" name="updateind_visit" value="submit">
                           
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
  $(window).load(function () {
      
    //select the POPUP FRAME and show it
    $("#popup").hide().fadeIn(1000);

    //close the POPUP if the button with id="close" is clicked
    $("#close").on("click", function (e) {
        e.preventDefault();
        $("#popup").fadeOut(1000);
    });


});
</script>

<!-- for add row in document-->
 <script>
 
  var rowNo = 2;
  /*function adddoc() {

  $('#doc tbody').append('<tr><td>' + rowNo + '</td><td><input type="file" name="files[]" class="btn btn-info btn-block file" multiple>' + '</td><td> <button type="button" class="btn btn-info btn-sm" onclick="adddoc()"><i class="fas fa-plus-square"></i></button>'+' '+ '<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>'+ 
    '</td></tr>');
  rowNo++;
  }*/
  function addWork() {
  $('#work tbody').append('<tr><td><input type="text" class="form-control" placeholder="Enter...." name="title[]">'+'</td><td><input type="text" class="form-control" placeholder="Enter...." name="company[]">' +  '</td><td><input type="date" class="form-control" placeholder="Enter ..." name="Start[]">' + '</td><td><input type="date" class="form-control" placeholder="Enter ..." name="end[]">'+ '</td><td><input type="text" class="form-control" placeholder="Enter...." name="experience[]">'+ '</td><td><button type="button" class="btn btn-info btn-sm" onclick="addWork()"><i class="fas fa-plus-square"></i></button>'+ ' '+'<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>'+ 
    '</td></tr>');
  rowNo++;
  }
  
  function del() {
    $(".delete").click(function() {
    $(this).closest("tr").remove();
    });
  }
  
 </script>
</body>
</html>
