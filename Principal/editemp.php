<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);
if(isset($_POST['editemp'])){
	$aid = $_GET['aid'];
    $uname=$_POST['uname'];
    // echo $fname;
    $mno=$_POST['mno'];
    // echo $mno;

    $gender=$_POST['gender'];
    // echo $gender;

    $email=$_POST['email'];
    // echo $email;
    $city=$_POST['city'];
    // echo $city;
    $bday=$_POST['bday'];
    // echo $bday;
    $addr=$_POST['addr'];
    // echo $addr;
    $zip=$_POST['zip'];
    // echo $zip;
    $user_type=$_POST['user_type'];
    $did=$_POST['did'];
    // echo $department;
    $desig=$_POST['desig'];
    // echo $desig;
    $schlspec=$_POST['schlspec'];
    // echo $schlspec;
    $school=$_POST['school'];
    // echo $school;
    $yschool=$_POST['yschool'];
    // echo $yschool;
    $rschool=$_POST['rschool'];
    // echo $rschool;
    $hspec=$_POST['hspec'];
    // echo $hspec;
    $hschool=$_POST['hschool'];
    // echo $hschool;
    $hyear=$_POST['hyear'];
    // echo $hyear;
    $hresult=$_POST['hresult'];
    // echo $hresult;
    $dspec=$_POST['dspec'];
    // echo $dspec;
    $sdiploma=$_POST['sdiploma'];
    // echo $sdiploma;
    $ydiploma=$_POST['ydiploma'];
    // echo $ydiploma;
    $rdiploma=$_POST['rdiploma'];
    // echo $rdiploma;
    $degreespec=$_POST['degreespec'];
    // echo $degreespec;
    $degree=$_POST['degree'];
    // echo $degree;
    $ydegree=$_POST['ydegree'];
    // echo $ydegree;
    $rdegree=$_POST['rdegree'];
    // echo $rdegree;
    $pgspec=$_POST['pgspec'];
    // echo $pgspec;
    $pg=$_POST['pg'];
    // echo $pg;
    $ypg=$_POST['ypg'];
    // echo $ypg;
    $rpg=$_POST['rpg'];
    // echo $rpg;
    $otherspec=$_POST['otherspec'];
    // echo $otherspec;
    $sothers=$_POST['sothers'];
    // echo $sothers;
    $yothers=$_POST['yothers'];
    // echo $yothers;
    $rothers=$_POST['rothers'];
    // echo $rothers; 
    $pass=$_POST['pass'];
    // echo $pass;
    $cpass=$_POST['pass'];
 

    // $jobtitle = $_POST['title'];
    // // print_r($jobtitle);
    // $company=$_POST['company'];
    // // print_r($company);
    // $st=$_POST['Start'];
    // // print_r($st);
    // $endate=$_POST['end'];
    // // print_r($endate);
    // $exper=$_POST['experience'];
    // print_r($exper);
    echo "<br>"; echo "<br>";
    
  $fileName=$_FILES['profile']['name'];
  $fileType=$_FILES['profile']['type'];
  $fileTmpName=$_FILES['profile']['tmp_name'];  
  $allowed=array('jpg','jpeg','png','pdf');
  $fileExt=explode('.', $fileName);
  $fileActualExt=strtolower(end($fileExt));
  if(in_array($fileActualExt, $allowed)) {
     $profile=uniqid('',true).".".$fileActualExt;
      $targetdir='../images/';
      $dir=$targetdir.$profile ;
      move_uploaded_file($_FILES['profile']['tmp_name'],$dir);

        
    }
    $rfileName=$_FILES['resume']['name'];
  $rfileType=$_FILES['resume']['type'];
  $rfileTmpName=$_FILES['resume']['tmp_name'];  
  $rallowed=array('pdf');
  $rfileExt=explode('.', $rfileName);
  $rfileActualExt=strtolower(end($rfileExt));
  if(in_array($rfileActualExt, $rallowed)) {
     $resume=uniqid('',true).".".$rfileActualExt;
      $rtargetdir='../images/';
      $rdir=$rtargetdir.$resume ;
      move_uploaded_file($_FILES['resume']['tmp_name'],$rdir);

        
    }
    	$sql= "UPDATE user SET uname='$uname',mno='$mno',gender='$gender',email='$email',city='$city',bday='$bday',addr='$addr',zip='$zip',user_type='$user_type',did='$did',desig ='$desig',schlspec='$schlspec',school='$school',yschool='$yschool',rschool='$rschool',hspec='$hspec',hschool='$hschool',hyear='$hyear',hresult='$hresult',dspec='$dspec',sdiploma='$sdiploma',ydiploma='$ydiploma',rdiploma='$rdiploma',degreespec='$degreespec',degree='$degree',ydegree='$ydegree',rdegree='$rdegree',pgspec='$pgspec',pg='$pg',ypg='$ypg',rpg='$rpg',otherspec='$otherspec',sothers='$sothers',yothers='$yothers',rothers='$rothers',profile='$profile',resume='$resume',pass='$pass',cpass='$pass' WHERE aid='$aid'";

    	if(mysqli_query($link, $sql) )
                {
              echo "<script>alert('Edit Staff Successfully');</script>";
                 header('location:vemploy.php');
             }
   }
   else{
 if(isset($_GET["aid"]) ){
  
    $aid = $_GET['aid'];
    // Prepare a select statement
    $sql = "SELECT * FROM user WHERE aid = '$aid'";
     if($result = mysqli_query($link, $sql)){
       
            if(mysqli_num_rows($result) == 1){
                 $row = mysqli_fetch_assoc( $result );
                  
                 $uname=$row['uname'];
            	$mno=$row['mno'] ;
            	$gender=$row['gender'] ;
				$email=	$row['email']; 
				$bday=	$row['bday'];
				$city=$row['city'] ;
				$addr=$row['addr'] ;
				$zip=$row['zip'] ;
				$did= $row['did'];
        $user_type= $row['user_type'];
				$desig=$row['desig'] ;
				$schlspec=$row['schlspec'] ;
				$school=$row['school'] ;
				$yschool=$row['yschool'] ;
				$rschool=$row['rschool'] ;
				$hspec=$row['hspec'] ;
				$hschool=$row['hschool'] ;
				$hyear=$row['hyear'] ;
				$hresult=$row['hresult'] ;
				$dspec=$row['dspec'] ;
				$sdiploma=$row['sdiploma'] ;
				$ydiploma=$row['ydiploma'] ;
				$rdiploma=$row['rdiploma'] ;
				$degreespec=$row['degreespec'] ;
				$degree=$row['degree'] ;
				$ydegree=$row['ydegree'] ;
				$rdegree=$row['rdegree'] ;
				$pgspec=$row['pgspec'] ;
				$pg=$row['pg'] ;
				$ypg=$row['ypg'] ;
				$rpg=$row['rpg'] ;
				$otherspec=$row['otherspec'] ;
				$sothers=$row['sothers'] ;
				$yothers=$row['yothers'] ;
				$rothers=$row['rothers'] ;
				$pass=$row['pass'] ;
				$profile=$row['profile'] ;
				$resume=$row['resume'] ;
				// $mno=$row['mno'] ;
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
  <title>Birla Vishvakarma Mahavidyalaya | Staff</title>
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

     <!--  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" onclick="myFunction()" href="#">
          <i class="far fa-bell"></i>
        
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         
          <div class="dropdown-divider"></div>
           <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="notification-latest"></div>
          <div class="dropdown-divider"></div>
        </div>

      </li>
      
        <li class="nav-item">
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
       <a href="pass.php"> <button class="dropdown-item" type="button">Change Password</button></a>
        <a href="../logout.php"><button class="dropdown-item" type="button" name="logout">Logout</button></a>
       
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
            <a class="nav-link">
              <img class="nav-icon" src="../images/Conference.png" style="width: 25px;" />
              <!-- <i class="nav-icon fas fa-sitemap"></i> -->
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
            <a href="enqiryvew.php" class="nav-link" >
              <img class="nav-icon" src="../images/Conference.png" style="width: 25px;" />
              <!-- <i class="nav-icon far fa-user" ></i> -->
              <p>
                Seminars Details
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
                  <p>Add Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vemploy.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Details</p>
                </a>
              </li>
            </ul>
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
         <!--  <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php">Add User</a></li>
              <li class="breadcrumb-item active">Add Employee</li>
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
          <form action="#" method="post" enctype="multipart/form-data">
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Personal Details</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
               
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="text" class="form-control" placeholder="Enter ..." name="uname" value="<?php echo $uname; ?>">
                    </div>
                  </div>
                  <div class="col-sm-3">
                            <!-- text input -->
                               <div class="form-group">
                                  <label>Mobile Number</label>
                                  <input type="text" class="form-control" placeholder="Enter ..." name="mno" value="<?php echo $mno; ?>">
                               </div>
                  </div>
                  <div class="col-sm-3">
                            <div class="form-group">
                                  <label>Gender</label>
                                  <select class="form-control" name="gender" value="<?php echo $gender; ?>">
                                    <option>Select here </option>
                                    <option value="Male" >Male</option>
                                    <option value="Female" >Female</option>
                                  </select>
                            </div>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-sm-3">
                              <!-- text input -->
                     
                               <div class="form-group">
                                <label for="InputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="<?php echo $email; ?>">
                              </div>
                  </div>
                  <div class="col-sm-3">
                          <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." name="city"value="<?php echo $city; ?>">
                                    
                          </div>
                  </div>
                  <div class="col-sm-3">
                              <!-- text input -->
                              <div class="form-group">
                                <label>DOB</label>
                                <input type="date"  class="form-control" name="bday" required pattern="\Y{4}-\m{2}-\d{2}" value="<?php echo $bday; ?>">
                                <!-- data-date-format="DD MMMM YYYY" -->
                              </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                       <label>User Type</label>
                           <select name="user_type" class="form-control" value="<?php echo $user_type; ?>">
                              <option>Select UserType </option>
                              <option value="Admin" >Admin</option>
                              <option value="Principal" >Principal</option>
                              <option value="HOD" >HOD</option>
                              <option value="Faculty" >Faculty</option>
                            </select>
                          </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                     <div class="form-group">
                                <label for="InputEmail1">Address</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="addr"value="<?php echo $addr; ?>">
                              </div>
                  </div>
                   <div class="col-sm-3">
                          <div class="form-group">
                                        <label>Department</label>
                                        
                                     <?php
                                        $sql = "SELECT department FROM department ";
                                        if($result = mysqli_query($link, $sql))
                                        {
                                      ?>
                                          <select class="form-control" name="did" value="<?php echo $department; ?>">
                                      <?php
                                          while ($row = mysqli_fetch_assoc($result)) {
                                            
                                            $department = $row['department'];
                                            echo '<option value="'.$department.'">'.$department.'</option>';
                                          }
                                          echo "</select>";
                                        }
                                        else
                                          echo "error";
                                          ?> 
                          </div>
                  </div>
                  <div class="col-sm-3">
                              <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text" class="form-control" placeholder="Enter ..." name="zip" value="<?php echo $zip; ?>">
                              </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Designation</label>
                      <input type="text" class="form-control" placeholder="Enter ..." name="desig" value="<?php echo $desig; ?>">
                    
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    
                            <td style="width:50px;"><input type="submit" class="btn btn-info" name="editemp" value="submit"></td>
                  
                  
                    <td style="width:50px;">  <input type="reset" class="btn btn-info" value="Reset">
                            </td>
                  </div>
                </div><!-- /.row -->

            </div>
            <!-- /.card-body -->
          </div>
          <!--/.card  -->
          </div>
          <!--/.col  -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-secondary ">
              <div class="card-header">
                <h3 class="card-title">Academic Details</h3>
              
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-sm-12">
                    <form role="form">
                    <table id="Acc" class="table table-bordered projects" style="table-layout: fixed; width: 100%; border-collapse: collapse ;">
                      <thead>
                        <tr >
                          <th >Academic</th>
                          <th >Specification</th>
                          <th >Institute / University</th>
                          <th >Year completed</th>
                          <th >Result</th>
                        </tr>
                      </thead>
                      <tr>
                          <td style="width:30%">
                            <label>10th</label>
                            </td>
                           <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="schlspec"value="<?php echo $schlspec; ?>">
                          </td>     
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="school"value="<?php echo $school; ?>">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="yschool"value="<?php echo $yschool; ?>">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="rschool"value="<?php echo $rschool; ?>">
                          </td>
                               
                        </tr>
                         <tr>
                          <td style="width:30%">
                            <label>12th</label>
                            </td>
                                <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="hspec"value="<?php echo $hspec; ?>">
                          </td>  
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="hschool"value="<?php echo $hschool; ?>">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="hyear"value="<?php echo $hyear; ?>">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="hresult"value="<?php echo $hresult; ?>">
                          </td>
                               
                        </tr>
                         <tr>
                          <td style="width:30%">
                            <label>Diploma</label>
                            </td>
                              <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="dspec"value="<?php echo $dspec; ?>">
                          </td>    
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="sdiploma"value="<?php echo $sdiploma; ?>">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="ydiploma"value="<?php echo $ydiploma; ?>">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="rdiploma"value="<?php echo $rdiploma; ?>">
                          </td>
                               
                        </tr>
                         <tr>
                          <td style="width:30%">
                            <label>Degree</label>
                            </td>
                               <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="degreespec"value="<?php echo $degreespec; ?>">
                          </td>   
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="degree"value="<?php echo $degree; ?>">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="ydegree"value="<?php echo $ydegree; ?>">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="rdegree"value="<?php echo $rdegree; ?>">
                          </td>
                               
                        </tr>
                         <tr>
                          <td style="width:30%">
                            <label>PG degree</label>
                            </td>
                               <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="pgspec"value="<?php echo $pgspec; ?>">
                          </td>   
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="pg"value="<?php echo $pg; ?>">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="ypg"value="<?php echo $ypg; ?>">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="rpg"value="<?php echo $rpg; ?>">
                          </td>
                               
                        </tr>
                        <tr>
                          <td style="width:30%">
                            
                           <label>Others</label>
                           <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="otherspec"value="<?php echo $otherspec; ?>">
                          </td> 
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="sothers"value="<?php echo $sothers; ?>">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="yothers"value="<?php echo $yothers; ?>">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="rothers"value="<?php echo $rothers; ?>">
                          </td>
                               
                        </tr>

                      </tbody>
                    </table>
                
                  </div>
                </div><!-- /.row -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-secondary ">
              <div class="card-header">
                <h3 class="card-title">Work Experience</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="work" class="table table-bordered projects" style="table-layout: fixed; width: 100%; border-collapse: collapse ;">
                        <thead>
                          <tr >
                            <th >
                              Job Title
                            </th>
                            <th >
                              Name Of Company
                            </th>
                            <th >
                              Start Date
                            </th>
                            <th >
                              End Date
                            </th>
                            <th >
                              Total Experience
                            </th>
                            <th >
                              Add / Delete
                            </th>
                          </tr>
                        </thead>
                        
                        <tbody>
                        	<?php 
                        		 $sql="select * from addexp where aid='$aid'";
                           if($result = mysqli_query($link, $sql)){
       
							            if(mysqli_num_rows($result) == 1){
							                 $rows = mysqli_fetch_assoc( $result );
                                 		$tjob=$rows['tjob'] ;
                                 		$company=$rows['company'] ;
                                 		$start=$rows['start'] ;
                                 		$endate=$rows['endate'] ;
                                 		$totexp=$rows['totexp'] ;


                        ?>
                        <tr>
                          <td style="width:100%">
                            <input type="text" class="form-control" placeholder="Enter...." name="title[]"value="<?php echo $tjob; ?>">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="company[]"value="<?php echo $company; ?>">
                          </td>
                          <td style="width:100%"><input type="date" class="form-control" placeholder="Enter ..." name="Start[]"value="<?php echo $start; ?>">
                          </td>
                          <td style="width:100%">
                            <input type="date" class="form-control" placeholder="Enter ..." name="end[]"value="<?php echo $endate; ?>">
                          </td>
                          <td style="width:30%"><input type="text" class="form-control" placeholder="Enter...." name="experience[]"value="<?php echo $totexp; ?>"></td>
                           <td >
                            <button type="button" class="btn btn-info btn-sm" onclick="addWork()">
                            <i class="fas fa-plus-square"></i></button>
                          </td>
                        </tr>
                       <?php }}?>
                        </tbody>
                      </table>
                 
                  </div>
                  <!-- /.card-body -->
                </div>
              </div><!-- /.row -->
            </div> <!-- /.card -->
          </div><!--/.col  -->
           <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-secondary ">
              <div class="card-header">
                <h3 class="card-title">Add Documents</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-sm-12">
                   
                      <table id="doc" class="table table-bordered projects" style="table-layout: auto;
                      width: 100%;  ">
                      <thead>
                        <tr >
                          <th >Sr No</th>
                          <th >Profile</th>
                          <th >Resume</th>
                          <th>Password</th> 
                         <!-- <th >Add / Delete</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td > 1</td>
                          <td >
                            <input type="file" name="profile" class="btn btn-info btn-block file" multiplevalue="<?php echo $profile; ?>">
                         </td>
                          <td >
                            <input type="file" name="resume" class="btn btn-info btn-block file" multiplevalue="<?php echo $resume; ?>">
                         </td>
                          <td >
                            <input type="text" class="form-control" placeholder="Enter...." name="pass"value="<?php echo $pass; ?>">
                          </td>
                         <!-- <td style="width:50px;"><button type="button" class="btn btn-info btn-sm" onclick="adddoc()">
                            <i class="fas fa-plus-square"></i></button>
                          </td> --> 
                        </tr>
                        
                        </tbody>
                      </table>
                    
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.col -->
            
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
