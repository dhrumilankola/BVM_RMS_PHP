<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);

if(isset($_POST['updatesttp'])){

    $sttpid=$_GET["sttpid"];
    $ay=$_POST['ay'];
	$ey=$_POST['ey'];
   $sdate=$_POST['sdate'];
   $edate=$_POST['edate'];
   $nod=$_POST['nod'];
   $name=$_POST['name'];
   $decr=$_POST['decr'];
   $type=$_POST['type'];
   $mode=$_POST['mode'];
   $role=$_POST['role'];
   $cuname=$_POST['cuname'];
   $dpname=$_POST['dpname'];
   
   $imageData = array();
     $sql1="select * from sttp_fdp where sttpid='$_GET[sttpid]'";
    if($result1 = mysqli_query($link, $sql1)){
       while($row2 = mysqli_fetch_array($result1)){
               $sql2="select * from user where aid='$row2[aid]'";
                    if($result2 = mysqli_query($link, $sql2)){
                       while($row3 = mysqli_fetch_array($result2)){
    
  
$sqldid=mysqli_query($link,"select * from Department WHERE did='$row[did]'");
$rowdid=mysqli_fetch_array($sqldid);


if(isset($_FILES['photos'])){
    $errors= array();
  foreach($_FILES['photos']['tmp_name'] as $key => $tmp_name ){
    $file_name = $key.$_FILES['photos']['name'][$key];
    $file_tmp =$_FILES['photos']['tmp_name'][$key];
//             if($file_size > 2097152){
//                 $errors[]='File size must be less than 2 MB';
//             }

        
        array_push($imageData, $file_name);

       
 
       //$desired_dir="../Faculty/".$row['department']."/".$row['uname']."/".date('Y').'/Conference/Photos/';
 
 $desired_dir= $rowdid['department']."/". $row['uname']."/".date('Y').'/Sttp/Photos';       

	   if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);    // Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,$rowdid['department']."/". $row['uname']."/".date('Y').'/Sttp/Photos/'.$file_name);
            }else{                  //rename the file if another one exist
                $new_dir=$rowdid['department']."/". $row['uname']."/".date('Y').'/Sttp/Photos/'.$file_name.time();
                 rename($file_tmp,$new_dir) ;       
            }
                
        }else{
                print_r($errors);
        }
    }
  if(empty($error)){
    //echo "Success";
    //print_r($imageData);
    //echo sizeof($imageData);
    //for($i=0;$i<sizeof($imageData);$i++){
    //  echo $imageData[$i];      
    //}
    $imgDt = implode("|", $imageData);

	
     $query= "UPDATE sttp_fdp SET a_y='$ay',e_y='$ey',sdate='$sdate',edate='$edate',nod='$nod',name='$name'
	 ,decr='$decr',type='$type',mode='$mode', role='$role',cu_name='$cuname',dp_name='$dpname',photos='$imgDt' WHERE sttpid='$sttpid'";
      
      if(mysqli_query($link,$query)){
        echo "<script>alert('STTP | FDP  Details Edit Successfully')</script>";
            header('location:vsttp.php');
        }       
  }
}
}}}}}
else{
   if(isset($_GET["sttpid"]) ){
   
    
    $sttpid = $_GET['sttpid'];
    // Prepare a select statement
    $sql = "SELECT * FROM sttp_fdp WHERE sttpid = '$sttpid'";
     if($result = mysqli_query($link, $sql)){
       
            if(mysqli_num_rows($result) == 1){
                 $rows = mysqli_fetch_assoc( $result );
				 
   
   $ay=$rows['a_y'];
   $ey=$rows['e_y'];
   $sdate=$rows['sdate'];
   $edate=$rows['edate'];
   $nod=$rows['nod'];
   $name=$rows['name'];
   $decr=$rows['decr'];
   $type=$rows['type'];
   $mode=$rows['mode'];
   $role=$rows['role'];
   $cuname=$rows['cu_name'];
   $dpname=$rows['dp_name'];			 
		$aid=$rows['aid'];			 
	$photos=$rows['photos'];		 
	
                
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
  <title>BRMS |Admin View STTP | FDP</title>
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
 <link rel="shortcut icon" href="../img/bvm_favicon.png?3">


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
	  <a href="index.php" >
	  <img src="../images/bvm.png" alt="User Avatar" style="width:100%">
	  </image>
	</a> 
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
         <img src="../images/BVM Logo-1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">  
      <span class="brand-text font-weight-light" style="font-size: 16px"><b>BRMS &nbsp; Admin</b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php 
            $sqldid=mysqli_query($link,"select * from Department WHERE did='$row[did]'");
        $rowdid=mysqli_fetch_array($sqldid);
         
          ?>
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
            <a href="vconference.php" class="nav-link ">
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
                
              <i class="nav-icon fas fa-clone"></i> 
              <p>
                Seminars/Symposium Details
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
        
          </li>
		  
		  
		  <li class="nav-item has-treeview">
            <a href="vsttp.php" class="nav-link active">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                STTP | FDP Details
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
          </li>
		  
		  <li class="nav-item has-treeview">
            <a href="vworkshop.php" class="nav-link">
              <i class="nav-icon fas fa-won-sign"></i>
              <p>
                Workshop Details
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
            <a href="vtesting.php" class="nav-link">
              <i class="nav-icon fas fa-tenge"></i>
              <p>
                Testing |Consultancy Work Details
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
          </li>
		  <li class="nav-item has-treeview">
            <a href="vpatent.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Patent Details
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
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
        <li class="nav-item">
            <a href="#" class="nav-link">
              
              <p></p>
            </a>
          </li> 
        <li class="nav-item">
            <a href="#" class="nav-link">
              
              <p></p>
            </a>
          </li> 
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
                <h3 class="card-title">Update STTP | FDP Details</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
              <form action="#" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
					<script>
                            function test(){
                                var value = parseInt(document.getElementById('aydt').value, 10);
                                value = isNaN(value) ? 0 : value;
                                value++;
                                document.getElementById('eydt').value = value;
                            }
                        </script>
                      <label>Start Academic Year</label>
                      <input type="text" class="form-control"  id="aydt" value="<?php echo $rows['a_y'] ?>"placeholder="2015" name="ay"  tabindex="1" required onchange="test()">
                    </div>
                  </div>
				  <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                      <label>End Academic Year</label>
                      <input type="text" class="form-control" value="<?php echo $rows['e_y'] ?>"placeholder="2015" name="ey"  id="eydt" tabindex="1" required readonly>
                    </div>
                  </div>
				  <div class="col-sm-3">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Start Date</label>
                                <input type="date"  class="form-control" value="<?php echo $rows['sdate'] ?>"name="sdate"  tabindex="2" required pattern="\Y{4}-\m{2}-\d{2}">
                                <!-- data-date-format="DD MMMM YYYY" -->
                              </div>
                  </div>
				  <div class="col-sm-3">
                              <!-- text input -->
                              <div class="form-group">
                                <label>End Date </label>
                                <input type="date"  class="form-control" value="<?php echo $rows['edate'] ?>"name="edate"  tabindex="2" required pattern="\Y{4}-\m{2}-\d{2}">
                                <!-- data-date-format="DD MMMM YYYY" -->
                              </div>
                  </div>
				  <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Total Days</label>
                      <input type="text" class="form-control" placeholder="10" value="<?php echo $rows['nod'] ?>"name="nod"  tabindex="3" required>
                    </div>
                  </div>
				   <div class="col-sm-5">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Topic Name</label>
                      <textarea  class="form-control" placeholder="Pedagogy & Effective use of ICT in Engineering Education & Academic Governance" name="name"  tabindex="4" required><?php echo $rows['name'] ?></textarea>
                    </div>
                  </div>
				  <div class="col-sm-5">
                    <div class="form-group">
                      <label>Description</label>
                     <textarea class="form-control" placeholder="Enter ..."name="decr" tabindex="5" ><?php echo $rows['decr'] ?></textarea>
                    </div>
                </div>
				<div class="col-sm-3">
                            <div class="form-group">
                                  <label>Type </label>
                                  <select class="form-control" name="type"  tabindex="6" required>
                                    <option>Select here </option>
                                    <option value="STTP" <?php 
							if($rows['type']=="STTP")
							{
								echo "selected";							}
							?>>STTP </option>
                                    <option value="FDP" <?php 
							if($rows['type']=="FDP")
							{
								echo "selected";							}
							?>>FDP</option>
									
                                  </select>
                            </div>
                  </div>
				  <div class="col-sm-3">
                            <div class="form-group">
                                  <label>Mode</label>
                                  <select class="form-control" name="mode" tabindex="7" required>
                                    <option>Select here </option>
                                    <option value="Organized" <?php 
							if($rows['mode']=="Organized")
							{
								echo "selected";							}
							?>>Organized</option>
                                    <option value="Participated" <?php 
							if($rows['mode']=="Participated")
							{
								echo "selected";							}
							?>>Participated</option>
									</select>
                            </div>
                  </div>                  
				  <div class="col-sm-3">
                            <div class="form-group">
                                  <label>Role</label>
                                  <select class="form-control" name="role" tabindex="8" required>
                                    <option>Select here </option>
									<option value="Convener" <?php 
							if($rows['role']=="Convener")
							{
								echo "selected";							}
							?>>Convener</option>
                                    <option value="Coordinator" <?php 
							if($rows['role']=="Coordinator")
							{
								echo "selected";							}
							?>>Coordinator</option>
                                    <option value="Co-Coordinator"  <?php 
							if($rows['role']=="Co-Coordinator")
							{
								echo "selected";							}
							?>>Co-Coordinator</option>
									<option value="Member" <?php 
							if($rows['role']=="Member")
							{
								echo "selected";							}
							?>>Member</option>
									<option value="Participated" <?php 
							if($rows['role']=="Participated")
							{
								echo "selected";							}
							?>>Participated</option>
                                  </select>
                            </div>
                  </div>
                <!-- </div> -->
               
                <div class="col-sm-4">
                              <!-- text input -->
                              <div class="form-group">
                                <label>College Name | University Name</label>
                                <input type="text" class="form-control"   value="<?php echo $rows['cu_name'] ?>"tabindex="9" placeholder="Birla Vishvakarma Mahavidyalaya " name="cuname">
                                
                              </div>
                  </div>
                  <div class="col-sm-4">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Department Name</label>
                                <input type="text" class="form-control" value="<?php echo $rows['dp_name'] ?>"  tabindex="10" placeholder="Information Technology " name="dpname">
                               
                              </div>
                  </div>
               
                <!-- <div class="row"> -->    
                
                   <div class="col-sm-3">
                <div class="form-group">
                  <label>Upload Photos</label>
                   <input type="file" name="photos[]" class="btn btn-info btn-block file"  tabindex="11" multiple>
                 
				 </div>
               </div>
              </div>


             
                <div class="row">

                  <div class="col-sm-12">
                              <div class="col-sm-12">
                              <input type="submit" class="btn btn-success" name="updatesttp" value="Submit">
                           <button type="reset" class="btn btn-danger float-right"  tabindex="14"><i class="glyphicon glyphicon-repeat"></i>Reset</button>       
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
