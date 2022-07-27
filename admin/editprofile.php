<?php


include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);

if(isset($_POST['updatepro'])){

  // $aid=$_GET['aid'];
    $uname=$_POST['uname'];
     // echo "<script>alert('Uname:".$uname."');</script>";
    $mno=$_POST['mno'];
  // echo "<script>alert('mno:".$mno."');</script>";

    $gender=$_POST['gender'];
    // echo "<script>alert('gender:".$gender."');</script>";

    $email=$_POST['email'];
   // echo "<script>alert('email:".$email."');</script>";
    $city=$_POST['city'];
    // echo "<script>alert('city:".$city."');</script>";
    $bday=$_POST['bday'];
    // echo "<script>alert('bday:".$bday."');</script>";
    $addr=$_POST['addr'];
  // echo "<script>alert('addr:".$addr."');</script>";
    $zip=$_POST['zip'];
    // echo "<script>alert('zip:".$zip."');</script>";
    $user_type=$_POST['user_type'];
    $did=$_POST['did'];
   // echo "<script>alert('did:".$did."');</script>";
    $desig=$_POST['desig'];
   // echo "<script>alert('desig:".$desig."');</script>";
    $doj=$_POST['doj'];
    $schlspec=$_POST['schlspec'];
    // echo "<script>alert('schlspec:".$schlspec."');</script>";
    $school=$_POST['school'];

   // echo "<script>alert('school:".$school."');</script>";
    $yschool=$_POST['yschool'];
    // echo "<script>alert('yschool:".$yschool."');</script>";
    $rschool=$_POST['rschool'];
   // echo "<script>alert('rschool:".$rschool."');</script>";
    $hspec=$_POST['hspec'];
    // echo "<script>alert('hspec:".$hspec."');</script>";
    $hschool=$_POST['hschool'];
    // echo "<script>alert('hschool:".$hschool."');</script>";
    $hyear=$_POST['hyear'];
   // echo "<script>alert('hyear:".$hyear."');</script>";
    $hresult=$_POST['hresult'];
    // echo "<script>alert('hresult:".$hresult."');</script>";
    $dspec=$_POST['dspec'];
    // echo "<script>alert('dspec:".$dspec."');</script>";
    $sdiploma=$_POST['sdiploma'];
   // echo "<script>alert('sdiploma:".$sdiploma."');</script>";
    $ydiploma=$_POST['ydiploma'];
   // echo "<script>alert('ydiploma:".$ydiploma."');</script>";
    $rdiploma=$_POST['rdiploma'];
   // echo "<script>alert('rdiploma:".$rdiploma."');</script>";
    $degreespec=$_POST['degreespec'];
    // echo "<script>alert('degreespec:".$degreespec."');</script>";
    $degree=$_POST['degree'];
   // echo "<script>alert('degree:".$degree."');</script>";
    $ydegree=$_POST['ydegree'];
   // echo "<script>alert('ydegree:".$ydegree."');</script>";
    $rdegree=$_POST['rdegree'];
    // echo "<script>alert('rdegree:".$rdegree."');</script>";
    $pgspec=$_POST['pgspec'];
   // echo "<script>alert('pgspec:".$pgspec."');</script>";
    $pg=$_POST['pg'];
   // echo "<script>alert('pg:".$pg."');</script>";
    $ypg=$_POST['ypg'];
   // echo "<script>alert('ypg:".$ypg."');</script>";
    $rpg=$_POST['rpg'];
   // echo "<script>alert('rpg:".$rpg."');</script>";
    $otherspec=$_POST['otherspec'];
    // echo "<script>alert('otherspec:".$otherspec."');</script>";
    $sothers=$_POST['sothers'];
   // echo "<script>alert('sothers:".$sothers."');</script>";
    $yothers=$_POST['yothers'];
  // echo "<script>alert('yothers:".$yothers."');</script>";
    $rothers=$_POST['rothers'];
    // echo "<script>alert('rothers:".$rothers."');</script>";
    // $pass=$_POST['pass'];
    // echo $pass;
    // $cpass=$_POST['pass'];
    // $schedule=$_POST['schedule'];

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
    // echo "<script>alert('profile:".$profile."');</script>";
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
// echo "<script>alert('resume:".$resume."');</script>";
     $sql= mysqli_query($link,"UPDATE user SET uname='$uname',mno='$mno',gender='$gender',email='$email',city='$city',bday='$bday',addr='$addr',zip='$zip',user_type='$user_type',did='$did',desig='$desig',doj='$doj',schlspec='$schlspec',school='$school',yschool='$yschool',rschool='$rschool', hspec='$hspec',hschool='$hschool',hyear='$hyear',hresult='$hresult',dspec='$dspec',sdiploma='$sdiploma',ydiploma='$ydiploma',rdiploma='$rdiploma',degreespec='$degreespec',degree='$degree',ydegree='$ydegree',rdegree='$rdegree',pgspec='$pgspec',pg='$pg',ypg='$ypg',rpg='$rpg',otherspec='$otherspec',sothers='$sothers',yothers='$yothers',rothers='$rothers',profile='$profile',resume='$resume'  WHERE aid='$session_aid'");
       // $sql = "UPDATE signin SET firstname='$fname',lastname='$lname', email='$email',address='$add' WHERE id=$id";
        if($sql)
        {
          // $last_id = mysqli_insert_id($link);
          //            // echo $last_id;
          //             if( !empty($jobtitle) ){
          //               for($k = 0; $k < count($jobtitle); $k++){
          //                   if(!empty($jobtitle[$k])){
                                
          //                       $ji=$jid[$k];
          //                       $title = $jobtitle[$k];
          //                       $comp = $company[$k];
          //                        $start = $st[$k];
          //                        $end = $endate[$k];
          //                        $exp = $exper[$k];


          //                        $sql1="UPDATE addexp SET tjob='$title',company='$comp',start='$start' ,endate='$end',totexp='$exp' sWHERE addexp.jid='$ji' ";
          //                       if(mysqli_query($link, $sql1 ))
          //                       {
                              echo "<script>alert('Edit Profile Successfully');</script>";
                                  header('location:index.php');
                                // }
                                // else
                                //   header('location:profile.php');

              }        
            
             else{
              echo "<script>alert('error');</script>";
               }
}
else{
   if(isset($_GET["aid"]) ){
   
    
    $aid = $_GET['aid'];
    // Prepare a select statement
    $sql = "SELECT * FROM user WHERE aid = $aid";
     if($result = mysqli_query($link, $sql)){
       
            if(mysqli_num_rows($result) == 1){
                 $rows = mysqli_fetch_assoc( $result );

                   $uname=$rows['uname'];
                   $mno=$rows['mno'];
                   $gender=$rows['gender'];
                   $email=$rows['email'];
                    $city=$rows['city'];
                    $bday=$rows['bday'];
                    $addr=$rows['addr'];
                    $zip=$rows['zip'];
                    $did=$rows['did'];
					$doj=$rows['doj'];
                    $desig=$rows['desig'];
                    $schlspec=$rows['schlspec'];
                    $school=$rows['school'];
                    $yschool=$rows['yschool'];
                    $rschool=$rows['rschool'];
                    $hspec=$rows['hspec'];
                    $hschool=$rows['hschool'];
                    $hyear=$rows['hyear'];
                    $hresult=$rows['hresult'];
                    $dspec=$rows['dspec'];
                    $sdiploma=$rows['sdiploma'];
                    $ydiploma=$rows['ydiploma'];
                    $rdiploma=$rows['rdiploma'];
                    $degreespec=$rows['degreespec'];
                    $degree=$rows['degree'];
                    $ydegree=$rows['ydegree'];
                    $rdegree=$rows['rdegree'];
                    $pgspec=$rows['pgspec'];
                    $pg=$rows['pg'];
                    $ypg=$rows['ypg'];
                    $rpg=$rows['rpg'];
                    $otherspec=$rows['otherspec'];
                    $sothers=$rows['sothers'];
                    $yothers=$rows['yothers'];
                    $rothers=$rows['rothers']; 
                    //$pass=$row['pass'];
                    $profile=$rows['profile'];
                    $resume=$rows['resume'];
                 

                    // $jobtitle = $_POST['title'];
                    // print_r($jobtitle);
                    // $company=$_POST['company'];
                    // print_r($company);
                    // $st=$_POST['Start'];
                    // print_r($st);
                    // $endate=$_POST['end'];
                    // print_r($endate);
                    // $exper=$_POST['experience'];
                    // print_r($exper);
                    // echo "<br>"; echo "<br>";
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
  <title>BRMS |Admin Edit Profile</title>
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
            <a href="profile.php" class="nav-link active">
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
            <a href="vsttp.php" class="nav-link">
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
                                    <option value="Male" 
									<?php 
							if($row['gender']=="Male")
							{
								echo "selected";							}
							?>>Male</option>
                                    <option value="Female"
									if($row['gender']=="Female")
							{
								echo "selected";							}
							?> >Female</option>
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
                                <input type="date"  class="form-control" name="bday" value="<?php echo $bday; ?>" required pattern="\Y{4}-\m{2}-\d{2}" >
                                <!-- data-date-format="DD MMMM YYYY" -->
                              </div>
                  </div>
                   <div class="col-sm-3">
                     <div class="form-group">
                       <label>User Type</label>
                           <select name="user_type" class="form-control" >
                              <option>Select UserType </option>
                              <option value="Admin"  
							  <?php 
							if($row['user_type']=="Admin")
							{
								echo "selected";							}
							?>>Admin</option>
                              <option value="Principal"  <?php 
							if($row['user_type']=="Principal")
							{
								echo "selected";							}
							?>>Principal</option>
                              <option value="HOD" 
							  <?php 
							if($row['user_type']=="HOD")
							{
								echo "selected";							}
							?>>HOD</option>
                              <option value="Faculty" 
							  <?php 
							if($row['user_type']=="Faculty")
							{
								echo "selected";							}
							?>>Faculty</option>
                            </select>
                          </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                     <div class="form-group">
                                <label for="InputEmail1">Address</label>
                                <input type="text" class="form-control"  placeholder="Enter..." name="addr" value="<?php echo $row['addr']; ?>">
                              </div>
                             </div>
                   <div class="col-sm-3">
                   <div class="form-group">
                          <label>Department</label>
                          <select class="form-control" name="did">
                           <option>Select Department</option>
						   <option value="Civil Engineering" <?php 
							if($row['did']=="1")
							{
								echo "selected";							}
							?>>Civil Engineering</option>
						   <option value="Structural Engineering" <?php if($row['did']=="2")
							{
								echo "selected";							}
							?>>Structural Engineering</option>
                            <option value="Computer Engineering" <?php if($row['did']=="3")
							{
								echo "selected";							}
							?>>Computer Engineering</option>
							<option value="Electronics Engineering" <?php if($row['did']=="4")
							{
								echo "selected";							}
							?>>Electronics Engineering</option>
                            <option value="Electrical Engineering" <?php if($row['did']=="5")
							{
								echo "selected";							}
							?>>Electrical Engineering</option>
                            <option value="Mechanical Engineering" <?php if($row['did']=="6")
							{
								echo "selected";							}
							?>>Mechanical Engineering</option>
							<option value="Production Engineering" <?php if($row['did']=="7")
							{
								echo "selected";							}
							?>>Production Engineering</option>
							<option value="Electronics & Communication Engineering" <?php if($row['did']=="8")
							{
								echo "selected";							}
							?>>Electronics & Communication Engineering</option>
							<option value="Information Technology Engineering" <?php if($row['did']=="9")
							{
								echo "selected";							}
							?>>Information Technology Engineering</option>
							<option value="Mathematics Department" <?php if($row['did']=="10")
							{
								echo "selected";							}
							?>>Mathematics Department</option>							
							<option value="Others">Others</option>
							</select>
                          </div>
                  </div>
                  <div class="col-sm-3">
                              <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text" class="form-control" placeholder="Enter ..." name="zip" value="<?php echo $zip; ?>">
                              </div>
                  </div>
				  <!---- Edit--->
				  <div class="col-sm-3">
                     <div class="form-group">
                       <label>Designation</label>
                           <select name="desig" class="form-control" >
                              <option>Select Designation </option>
                              <option value="Professor" <?php if($row['desig']=="Professor")
							{
								echo "selected";							}
							?>>Professor</option>
                              <option value="Associate Professor" <?php if($row['desig']=="Associate Professor")
							{
								echo "selected";							}
							?> >Associate Professor</option>
                              <option value="Assistant Professor" <?php if($row['desig']=="Assistant Professor")
							{
								echo "selected";							}
							?>>Assistant Professor</option>
                              <option value="Ad-hoc Faculty" <?php if($row['desig']=="Ad-hoc Faculty")
							{
								echo "selected";							}
							?>>Ad-hoc Faculty</option>
							  <option value="Visiting Faculty" <?php if($row['desig']=="Visiting Faculty")
							{
								echo "selected";							}
							?>>Visiting Faculty</option>
                            <option value="Adjunct Faculty" <?php if($row['desig']=="Adjunct Faculty")
							{
								echo "selected";							}
							?> >Adjunct Faculty</option>
							</select>
                          </div>
                    </div>		  
				  			 
                   <div class="col-sm-3">                        
                      <div class="form-group">
                        <label>Date Of Join</label>
                        <input type="date"  class="form-control" name="doj" value="<?php echo $doj; ?>"required pattern="\Y{4}-\m{2}-\d{2}" >
                      
                      </div>
                  </div>
                </div>
               

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
                            <input type="text" class="form-control" placeholder="Enter...." name="schlspec" value="<?php echo $schlspec; ?>">
                          </td>     
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="school" value="<?php echo $school; ?>">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="yschool" value="<?php echo $yschool; ?>">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="rschool" value="<?php echo $rschool; ?>">
                          </td>
                               
                        </tr>
                         <tr>
                          <td style="width:30%">
                            <label>12th</label>
                            </td>
                                <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="hspec" value="<?php echo $hspec; ?>">
                          </td>  
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="hschool" value="<?php echo $hschool; ?>">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="hyear" value="<?php echo $hyear; ?>">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="hresult" value="<?php echo $hresult; ?>">
                          </td>
                               
                        </tr>
                         <tr>
                          <td style="width:30%">
                            <label>Diploma</label>
                            </td>
                              <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="dspec" value="<?php echo $dspec; ?>">
                          </td>    
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="sdiploma" value="<?php echo $sdiploma; ?>">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="ydiploma" value="<?php echo $ydiploma; ?>">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="rdiploma" value="<?php echo $rdiploma; ?>">
                          </td>
                               
                        </tr>
                         <tr>
                          <td style="width:30%">
                            <label>Degree</label>
                            </td>
                               <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="degreespec" value="<?php echo $degreespec; ?>">
                          </td>   
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="degree" value="<?php echo $degree; ?>">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="ydegree" value="<?php echo $ydegree; ?>">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="rdegree" value="<?php echo $rdegree; ?>">
                          </td>
                               
                        </tr>
                         <tr>
                          <td style="width:30%">
                            <label>Master degree</label>
                            </td>
                               <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="pgspec" value="<?php echo $pgspec; ?>">
                          </td>   
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="pg" value="<?php echo $pg; ?>">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="ypg" value="<?php echo $ypg; ?>">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="rpg" value="<?php echo $rpg; ?>">
                          </td>
                               
                        </tr>
                        <tr>
                          <td style="width:30%">
                            
                           <label>Others</label>
                           <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="otherspec" value="<?php echo $otherspec; ?>">
                          </td> 
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="sothers" value="<?php echo $sothers; ?>">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="yothers" value="<?php echo $yothers; ?>">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="rothers" value="<?php echo $rothers; ?>">
                          </td>
                               
                        </tr><!--
                      </thead>
                      <tbody>
                        <tr>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter ..." name="amno">
                           <?php
                        $sql1 = "SELECT  level FROM level ";
                        if($result = mysqli_query($link, $sql1))
                        {
                      ?>
                          <select class="form-control" name="acdlevel[]">
                      <?php
                          while ($row = mysqli_fetch_assoc($result)) {
                            $level = $row['level'];
                            echo '<option value="'.$level.'">'.$level.'</option>';
                          }
                          echo "</select>";
                        }
                        else
                          echo "error";
                          ?>
                  
                          </td>
                          <td style="width:100%"><input type="text" class="form-control" placeholder="Enter...." name="sub[]">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="uni[]">
                          </td>
                          <td style="width:30%">
                            <?php
                           $currently_selected = date('Y');
                           $earliest_year = 1997;
                           $latest_year = date('Y+2');?>
                          <select class="form-control" name="acdyr[]"> <?php
                           foreach ( range( $latest_year, $earliest_year ) as $i ) {
                            print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                            }
                            print '</select>';
                            ?>
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="result[]">
                          </td>
                         <td style="width:30%">
                            <select class="form-control" name="medium[]">
                                       <option>Select</option>
                                       <option value="Hindi">Hindi</option>
                                       <option value="English">English</option>
                            </select>
                          </td>
                          <td >
                              <button type="button" class="btn btn-info btn-sm" onclick="addAcc()"><i class="fas fa-plus-square"></i></button> 
                            </td>
                        </tr>-->
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
                          if(isset($_GET["aid"]) ){
                            $id = $_GET['aid'];
                              $result1=mysqli_query($link,"select * from addexp where aid='$id'")or die('Error In Session');
                              if($result1)
                              {
                                  if(mysqli_num_rows($result1) > 0)
                                  {
                                      while($row1 = mysqli_fetch_assoc($result1))
                                      {
                                        echo '<tr><td style="width:100%">'.
                                        '<input type="text" class="form-control" placeholder="Enter...." name="jid[]" value="'. $row1['jid'].'">'.
                                        '<input type="text" class="form-control" placeholder="Enter...." name="title[]" value="'. $row1['tjob'].'">'.
                                        '</td><td style="width:30%">'.
                                        '<input type="text" class="form-control" placeholder="Enter...." name="company[]" value="'.$row1['company'].'">'.
                                         '</td><td style="width:100%">'.
                                          '<input type="date" class="form-control" placeholder="Enter ..." name="Start[]" value="'.$row1['start'].'">'.
                                          '</td><td style="width:100%">'.
                                          '<input type="date" class="form-control" placeholder="Enter ..." name="end[]" value="'.$row1['endate'].'">'.
                                          '</td><td style="width:30%">'.
                                          '<input type="text" class="form-control" placeholder="Enter...." name="experience[]" value="'.$row1['totexp'].'">'.
                                          '</td><td ><button type="button" class="btn btn-info btn-sm" onclick="addWork()"><i class="fas fa-plus-square"></i></button>'.
                                          '</td></tr>' ;
                                        }
                                   } 
                                  else
                                  {
                                      echo "No records matching your query were found.";
                                  }
                           }
                         }
                        ?>
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
                          
                         <!-- <th >Add / Delete</th> <th>Password</th>  -->
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td > 1</td>
                          <td >
                            <?php
                            $pro="img/use.jpg";
                             if($profile!="") {
                              echo "<img src = '../images/".$profile."'class='img-responsive' width='150' height='150'><br>";
                            
                              echo"<br>";
                              echo '<input type="file" name="profile" value="../images/'.$profile.'" class="btn btn-info file" multiple >';
                              
                              }else {
                                echo '<img src="img/use.jpg" class="img-responsive" width="150" height="150">';
                                    echo '<br>';
                                   echo '<input type="file" name="profile" class="btn btn-info file" multiple >';
                            } ?>
                         </td>
                          <td >
                            <?php if($resume!="") {
                             echo" <iframe src = '../images/".$resume."'></iframe><br>";
                             echo'<br><input type="file" name="resume" value="'.$resume.'" class="btn btn-info file" multiple>';
                             }else echo'<input type="file" name="resume" class="btn btn-info btn-block file" multiple>';
                           ?>
                            
                         </td>
                          
                         <!-- <td style="width:50px;"><button type="button" class="btn btn-info btn-sm" onclick="adddoc()">
                            <i class="fas fa-plus-square"></i></button>
                          </td> 
                          <td >
                            <input type="text" class="form-control" placeholder="Enter...." name="pass" value="<?php echo $pass; ?>">
                          </td>
                        --> 
                        </tr>
                        
                        </tbody>
                      </table>
                    
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.col -->
            <div class="row">

                  <div class="col-sm-12">
                    <div class="col-sm-12">
                    
                            <td style="width:50px;"><input type="submit" class="btn btn-success" name="updatepro" value="Submit"></td>
                  
                  
                     <button type="reset" class="btn btn-danger float-right"  tabindex="1"><i class="glyphicon glyphicon-repeat"></i>Reset</button>       
                  </div>
                </div>
				</div>
				
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
