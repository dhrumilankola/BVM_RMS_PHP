<?php
include("config.php");
//echo $_SESSION['user_id'];
include("asession.php"); 
// include("../employee/session.php");
//$sql= "SELECT * FROM addstud WHERE sid='$session_id'";
$result=mysqli_query($link,"SELECT * FROM user WHERE aid=".$session_aid)or die('Error In Session');
$row=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BRMS |Principal View Profile</title>
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
            $sqldid=mysqli_query($link,"select * from Department WHERE did='$row[did]'");
        $rowdid=mysqli_fetch_array($sqldid);
          if($row['profile']){
          ?>
        <img src="<?php echo $rowdid['department'];?>/<?php echo $row['uname'];?>/Images/<?php echo $row['profile'];?>" alt="User Avatar" class="img-size-50 img-circle ">
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
      <span class="brand-text font-weight-light" style="font-size: 16px"><b>BRMS &nbsp; Principal</b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block"><?php echo $row['user_type']; ?></a>
        </div>
      </div>

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
            <a href="vsession_chair.php" class="nav-link">
              <i class="nav-icon fa fa-user-secret"></i>
              <p>
              Expert Talk/Session Chair
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
            <a href="vguide.php" class="nav-link">
              <i class="nav-icon fa fa-user-md"></i>
              <p>
              Reviewer / Guide Details
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="vaward.php" class="nav-link">
              <i class="nav-icon fa fa-trophy"></i>
              <p>
              Award Received Details
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="vgrant.php" class="nav-link">
              <i class="nav-icon fa fa-user-secret"></i>
              <p>
              Grant Details
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
            
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
              Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
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
          <!-- <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="indexadmin.php">Home</a></li>
              <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
             
            </ol>
          </div> -->
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="container-fluid">
        <div class="row">
          <form action="editprofile.php?id=<?php echo $session_aid?>" method="post" enctype="multipart/form-data">
            <div class="col-sm-12">
                 <div class="card  card-secondary">
                    <div class="card-header ">
                      <h3 class="card-title">Profile</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                          <i class="fas fa-times"></i></button>
                      </div>
                    </div>
                    <div class="card-body ">
                   
                      <div class="row" style="margin-bottom: 30px; margin-left: 18px;">
                      <i class="nav-icon fa fa-user" style="font-size: 25px;font-style: normal;">
                           ABOUT</i>
                    </div>
                      <div class="row">

                        <div class="col" style="margin-left: 25px;">
                           <div class="row" style="margin-bottom: -10px;margin-left: 25px;" >
                          <div class="row" style="margin-bottom: -10px;" >
                             <div class="form-group" style="color: black">
                              <label> Name     :</label> <?php echo $row['uname']; ?>
                            </div>
                          </div>
                          <div class="row" style="margin-bottom: -10px;margin-left: 30%;">
                             <div class="form-group" style="color: black">
                              <label> Email     :</label> <?php echo $row['email']; ?>
                            </div>
                          </div>
                        </div>
                         <div class="row" style="margin-bottom: -10px;margin-left: 25px;" >
                          <div class="row" style="margin-bottom: -10px;">
                             <div class="form-group" style="color: black">
                              <label> City     :</label> <?php echo $row['city']; ?>
                            </div>
                          </div>
                          <div class="row" style="margin-bottom: -10px;margin-left: 34.5%;">
                             <div class="form-group" style="color: black">
                              <label> Pincode     :</label> <?php echo $row['zip']; ?>
                            </div>
                          </div>
                        </div>
                         <div class="row" style="margin-bottom: -10px;margin-left: 25px;" >
                          <div class="row" style="margin-bottom: -10px;">
                             <div class="form-group" style="color: black">
                              <label> Address     :</label> <?php echo $row['addr']; ?>
                            </div>
                          </div>
                           
                    
                              <div class="row" style="margin-bottom: -10px;margin-left: 33.1%;">

                                 <div class="form-group" style="color: black">
                                  <label> Mobile Number     :</label> <?php echo $row['mno']; ?>
                                </div>
                              </div>
                            </div>
                             <div class="row" style="margin-bottom: -10px;margin-left: 25px;" >
                             <div class="row" style="margin-bottom: -10px;">
                                 <div class="form-group" style="color: black">
                                  <label> Gender     :</label> <?php echo $row['gender']; ?>
                                </div>
                              </div>
                              <div class="row" style="margin-bottom: -10px;margin-left: 33.5%;">
                                 <div class="form-group" style="color: black">
                                  <label> Birthdate    :</label> <?php echo $row['bday']; ?>
                                </div>
                              </div>
                            </div>
                             <div class="row" style="margin-bottom: -10px;margin-left: 25px;" >
                               <div class="row" style="margin-bottom: -10px;">
                             <div class="form-group" style="color: black">
                              <?php  $result1=mysqli_query($link,"Select * from department where did='$row[did]'");
                                     
                                        $row1=mysqli_fetch_array($result1);

                              ?>
                              <label> Department     :</label> <?php echo $row1['department']; ?>
                            </div>
                          </div>
                              <div class="row" style="margin-bottom: -10px;margin-left:22%;">
                                 <div class="form-group" style="color: black">
                                  <label> Designation     :</label> <?php echo $row['desig']; ?>
                                </div>
                              </div>
                            </div>
                             <div class="row" style="margin-bottom: -10px;margin-left: 25px;" >
                            <!--  <div class="row" style="margin-bottom: -10px;">
                                 <div class="form-group" style="color: black">
                                  <label> User Type     :</label> <?php echo $row['user_type']; ?>
                                </div>
                              </div> -->
                              <!-- <div class="row" style="margin-bottom: -10px;margin-left: 34.1%;">
                                 <div class="form-group" style="color: black">
                                  <label> Birthdate    :</label> <?php echo $row['bday']; ?>
                                </div>
                              </div> -->
                            </div>
                          </div>
                        
                      <div class="col-sm-15" style="margin-right: 60px;margin-bottom: 7%">
                        <div class="img thumbnail">
                          
                           <?php 

                           if($row['profile']!="") {
                              echo "<img src = './".$rowdid['department']."/".
$row['uname']."/Images/".$row['profile']."'class='img-responsive' width='150' height='180'>";
                             }else echo" <img src='img/use.jpg' class='img-responsive' width='150' height='180'>"
                           ?>
                        </div>
                      </div>
                    </div>
                    <div class="card  card-secondary">
                     <div class="card-header ">
                      <h3 class="card-title">Academic Details</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                          <i class="fas fa-times"></i></button>
                      </div>
                    </div>
                      <!--  <div class="card-body">
                      <div class="row" style=" margin-left:25px;"> -->
                       <!--  <div class="row" style="margin-bottom: 10px;">
                            <tr style="background-color: blue"> <b><u style="text-transform: uppercase; font-size: 22; ">Academic Details</u></b></tr>
                          </div> -->
                    <form action="aintsubtask.php?itid=<?php echo $itid?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                        <table id="Acc" class="table table-bordered projects" >
                          <!-- style="table-layout: fixed; width: 75%; border-collapse: collapse ;" -->
                      <thead>
                        <tr >
                          <th >Specification</th>
                          <th >Institute / University</th>
                          <th >Year completed</th>
                          <th >Result</th>
                        </tr>
                      </thead><tbody>
                      <?php 
                      
                      $schlspec=$row['schlspec'];

                      if(trim($schlspec) == ''){
                       
                      } 
                      else{
                         echo '<tr><td style="width:30%">'.$row['schlspec'].
                             '</td><td style="width:30%">'.$row['school'].
                            '</td><td style="width:30%">'.$row['yschool'].
                            '</td><td style="width:30%">'.$row['rschool'].
                            '</td></tr>' ;
                      }
                      $hspec=$row['hspec'];

                      if(trim($hspec) == ''){
                       
                      }
                      else{
                         echo '<tr><td style="width:30%">'.$row['hspec'].
                            '</td><td style="width:30%">'.$row['hschool'].
                            '</td><td style="width:30%">'.$row['hschool'].
                            '</td><td style="width:30%">'.$row['hresult'].
                            '</td></tr>' ;
                      }
                      $dspec=$row['dspec'];

                      if(trim($dspec) == ''){
                       
                      }else{
                         echo '<tr><td style="width:30%">'.$row['dspec'].
                            '</td><td style="width:30%">'.$row['sdiploma'].
                            '</td><td style="width:30%">'.$row['ydiploma'].
                            '</td><td style="width:30%">'.$row['rdiploma'].
                            '</td></tr>' ;
                      }
                      $degreespec=$row['degreespec'];

                      if(trim($degreespec) == ''){
                       
                      }
                      else
                      {
                           echo '<tr><td style="width:30%">'.$row['degreespec'].
                            '</td><td style="width:30%">'.$row['degree'].
                            '</td><td style="width:30%">'.$row['ydegree'].
                            '</td><td style="width:30%">'.$row['rdegree'].
                            '</td></tr>' ;
                      }
                      $pgspec=$row['pgspec'];

                      if(trim($pgspec) == ''){
                        
                      }else{
                        echo '<tr><td style="width:30%">'.$row['pgspec'].
                            '</td><td style="width:30%">'.$row['pg'].
                            '</td><td style="width:30%">'.$row['ypg'].
                            '</td><td style="width:30%">'.$row['rpg'].
                            '</td></tr>' ;
                      }
                      $otherspec=$row['otherspec'];
                      if(trim($otherspec) == ''){
                       
                      }else{
                         echo '<tr><td style="width:30%">'.$row['otherspec'].
                            '</td><td style="width:30%">'.$row['sothers'].
                            '</td><td style="width:30%">'.$row['yothers'].
                            '</td><td style="width:30%">'.$row['rothers'].
                            '</td></tr>' ;
                      }
                      ?>
                    </tbody>
                    </table>
                      </div>
                    </form>
                      </div>
                       
                      <!-- </div>
                    </div> -->
                     <div class="card  card-secondary">
                     <div class="card-header ">
                      <h3 class="card-title">Work Expereince</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                          <i class="fas fa-times"></i></button>
                      </div>
                    </div>

                        <!-- <div class="row" style="margin-bottom: 10px;">
                            <tr style="background-color: blue"> <b><u style="text-transform: uppercase; font-size: 22; ">Work Expereince</u></b></tr>
                          </div> -->
                      <form action="aintsubtask.php?itid=<?php echo $itid?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                        <table class="table table-bordered projects" style="table-layout: fixed; width: 100%; border-collapse: collapse ;">
                          <!-- style="table-layout: fixed; width: 75%; border-collapse: collapse ;" -->
                      <thead>
                        <tr >
                          <th >Designation</th>
                          <th >Company</th>
                          <th >Start Date</th>
                          <th >End Date</th>
                          <th >Experience</th>
                        </tr>
                      </thead><tbody>
                     <?php
                        $result1=mysqli_query($link,"select * from addexp where aid='$session_aid'")or die('Error In Session');
                        if($result1)
                        {
                            if(mysqli_num_rows($result1) > 0)
                            {
                                while($row1 = mysqli_fetch_assoc($result1))
                                {
                                   echo '<tr><td >'.$row1['tjob'].
                                                         '</td><td >'.$row1['company'].
                                                        '</td><td >'.$row1['start'].
                                                        '</td><td>'.$row1['endate'].
                                                        '</td><td >'.$row1['totexp'].
                                                        '</td></tr>' ;
                                  }
                             } 
                            else
                            {
                                echo "No records matching your query were found.";
                            }
                        }
                        ?>
                    </tbody>
                    </table>
                      </div>
                      </div>
                       
                      
                    </div>
                  </form>
                    <div class="row">
                       <div class="col-sm-6">
                       <input type="submit" class="btn btn-info" name="editprofile" value="Edit Profile" >
                      
                  </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card    </form>-->
              </div><!-- /.card    </form>-->
            </div>
          </div>
      </div>
    </section>
     
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
