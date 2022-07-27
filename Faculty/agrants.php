<?php
include("config.php");
include("asession.php"); 
$result=mysqli_query($link,"SELECT * FROM user WHERE aid='$session_aid'")or die('Error In Session');
$row=mysqli_fetch_array($result);
if(isset($_POST['updategrant'])){
    $id=$_GET["id"];
    $ay=$_POST['sy'];
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
	
        $sql1="select * from grant_detils where id='$_GET[id]'";
    if($result1 = mysqli_query($link, $sql1)){
       while($row2 = mysqli_fetch_array($result1)){
               $sql2="select * from user where aid='$row2[aid]'";
                    if($result2 = mysqli_query($link, $sql2)){
                       while($row3 = mysqli_fetch_array($result2)){

    $sqldid=mysqli_query($link,"select * from Department WHERE did IN (select did from user where aid=$row2[aid])");
    $rowdid=mysqli_fetch_array($sqldid);
    
      $sql= "UPDATE grant_detils SET sy='$ay',ey='$ey',sr_no='$srno',G_Type='$tog',
	    Name_of_the_Principal_Investigator_Co_Investigator='$nop',Name_of_the_Funding_agency='$notfa',department_of_investigator='$dot',Department_of_Principal_Investigator_Co_Investigator='$dop',Year_of_Award='$yor',Funds_provided='$fp'
	    ,Duration_of_the_project='$dotp' WHERE id='$id'";
      
        if(mysqli_query($link, $sql) )
        {
          echo "<script>alert('Grant Edit Successfully')</script>";
              header('location:vgrants.php');
        }
          else
          header('location:agrant.php');
}
}
}}}
else{
   if(isset($_GET["id"])){
    $id = $_GET['id'];
    // Prepare a select statement
    $sql = "SELECT * FROM grant_detils WHERE id = '$id'";
     if($result = mysqli_query($link, $sql)){
       
            if(mysqli_num_rows($result) == 1){
                 $rows = mysqli_fetch_assoc( $result );
                 $sy=$rows['sy'];
                 $ey=$rows['ey'];
                 $srno=$rows['sr_no'];
                 $tog=$rows['G_Type'];
                 $nop=$rows['Name_of_the_Principal_Investigator_Co_Investigator'];
                 $notfa=$rows['Name_of_the_Funding_agency'];
                 $dot=$rows['department_of_investigator'];
                 $dop=$rows['Department_of_Principal_Investigator_Co_Investigator'];
                 $yor=$rows['Year_of_Award'];
                 $fp=$rows['Funds_provided'];
                 $dotp=$rows['Duration_of_the_project'];
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
  <title>BRMS |Edit Grant Details</title>
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
            <a href="#" class="nav-link">
               
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
            <a href="#" class="nav-link active">
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
                <a href="vbook.php" class="nav-link active">
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
                <h3 class="card-title">Update Grant Details</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data">
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
                      <input type="text" class="form-control" value="<?php echo $rows['sy'];?>" placeholder="2015" name="sy" id="aydt" tabindex="1" required onblur="test()">
                    </div>
                  </div>
				  <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                      <label>End Academic Year</label>
                      <input type="text" class="form-control" value="<?php echo $rows['ey'];?>" placeholder="2016" name="ey" id="eydt" tabindex="1" required readonly>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Sr. No.</label>
                      <input type="text" class="form-control" value="<?php echo $rows['sr_no'];?>" tabindex="3" placeholder="Enter Serial number here.." name="srno" required>
                    </div>
                  </div>            
                 <div class="col-sm-4">
                            <div class="form-group">
                                  <label>Type of Grant</label>
                                  <select class="form-control" value="<?php echo $rows['G_Type'];?>" name="tog" id='tog' tabindex="4" required>
                                    <option>Select here </option>
                                    <option value="Government" <?php if($rows['G_Type']==='Government') echo 'selected="selected"';?>>Government</option>
                                    <option value="Non-Government" <?php if($rows['G_Type']==='Non-Government') echo 'selected="selected"';?>>Non-Government</option>									
                                  </select>
                            </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Name of the Principal, Investigator/ Co Investigator</label>
                      <input type="text" class="form-control" value="<?php echo $rows['Name_of_the_Principal_Investigator_Co_Investigator'];?>" tabindex="5" placeholder="Dr.Indrajit N.Patel " name="nop" >
                    </div>					
                </div>
				<div class="col-sm-4">
                    <div class="form-group">
                      <label>Name of the Funding agency </label>
                      <input type="text" class="form-control" value="<?php echo $rows['Name_of_the_Funding_agency'];?>" tabindex="6" placeholder="Agency name..." name="notfa">
                    </div>					
                </div>
				<div class="col-sm-4">
                            <div class="form-group">
                                  <label>Department Of Investigator</label>
                                  <select class="form-control"  value="<?php echo $rows['department_of_investigator'];?>" name="dot" id='dot' tabindex="4" required>
                                    <option>Select here </option>
                                    <option value="Civil Engineering" <?php if($rows['department_of_investigator']==='Civil Engineering') echo 'selected="selected"';?>>Civil Engineering</option>
                                    <option value="Structural Engineering" <?php if($rows['department_of_investigator']==='Structural Engineering') echo 'selected="selected"';?>>Structural Engineering</option>			
                                    <option value="Computer Engineering" <?php if($rows['department_of_investigator']==='Computer Engineering') echo 'selected="selected"';?>>Computer Engineering</option>
                                    <option value="Electronics Engineering" <?php if($rows['department_of_investigator']==='Electronics Engineering') echo 'selected="selected"';?>>Electronics Engineering</option>						
                                    <option value="Electrical Engineering" <?php if($rows['department_of_investigator']==='Electrical Engineering') echo 'selected="selected"';?>>Electrical Engineering</option>
                                    <option value="Mechanical Engineering" <?php if($rows['department_of_investigator']==='Mechanical Engineering') echo 'selected="selected"';?>>Mechanical Engineering</option>
                                    <option value="Production Engineering" <?php if($rows['department_of_investigator']==='Production Engineering') echo 'selected="selected"';?>>Production Engineering</option>
                                    <option value="Electronics & Communication Engineering" <?php if($rows['department_of_investigator']==='Electronics & Communication Engineering') echo 'selected="selected"';?>>Electronics & Communication Engineering</option>
                                    <option value="Information Technology Engineering" <?php if($rows['department_of_investigator']==='Information Technology Engineering') echo 'selected="selected"';?>>Information Technology Engineering</option>
                                    <option value="Mathematics Department" <?php if($rows['department_of_investigator']==='Mathematics Department') echo 'selected="selected"';?>>Mathematics Department</option>
                                  </select>
                            </div>
                          </div>
				        <div class="col-sm-3">
                    <div class="form-group">
                      <label>Department of Principal Investigator/ Co Investigator</label>
                      <select class="form-control"  value="<?php echo $rows['Department_of_Principal_Investigator_Co_Investigator'];?>" name="dop" id='dop' tabindex="4" required>
                      <option>Select here </option>
                      <option>Select here </option>
                                    <option value="Civil Engineering" <?php if($rows['department_of_investigator']==='Civil Engineering') echo 'selected="selected"';?>>Civil Engineering</option>
                                    <option value="Structural Engineering" <?php if($rows['department_of_investigator']==='Structural Engineering') echo 'selected="selected"';?>>Structural Engineering</option>			
                                    <option value="Computer Engineering" <?php if($rows['department_of_investigator']==='Computer Engineering') echo 'selected="selected"';?>>Computer Engineering</option>
                                    <option value="Electronics Engineering" <?php if($rows['department_of_investigator']==='Electronics Engineering') echo 'selected="selected"';?>>Electronics Engineering</option>						
                                    <option value="Electrical Engineering" <?php if($rows['department_of_investigator']==='Electrical Engineering') echo 'selected="selected"';?>>Electrical Engineering</option>
                                    <option value="Mechanical Engineering" <?php if($rows['department_of_investigator']==='Mechanical Engineering') echo 'selected="selected"';?>>Mechanical Engineering</option>
                                    <option value="Production Engineering" <?php if($rows['department_of_investigator']==='Production Engineering') echo 'selected="selected"';?>>Production Engineering</option>
                                    <option value="Electronics & Communication Engineering" <?php if($rows['department_of_investigator']==='Electronics & Communication Engineering') echo 'selected="selected"';?>>Electronics & Communication Engineering</option>
                                    <option value="Information Technology Engineering" <?php if($rows['department_of_investigator']==='Information Technology Engineering') echo 'selected="selected"';?>>Information Technology Engineering</option>
                                    <option value="Mathematics Department" <?php if($rows['department_of_investigator']==='Mathematics Department') echo 'selected="selected"';?>>Mathematics Department</option>
                                  </select>                    </div>					
                </div>
				        <div class="col-sm-3">
                    <div class="form-group">
                      <label>Year of Award</label>
                      <input type="number" class="form-control"  value="<?php echo $rows['Year_of_Award'];?>"  tabindex="9" placeholder="2020" name="yor" required >
                    </div>					
                </div>
				        <div class="col-sm-3">
                    <div class="form-group">
                      <label>Funds provided</label>
                      <input type="number" class="form-control"  value="<?php echo $rows['Funds_provided'];?>"  tabindex="10" placeholder="INR in lakhs" name="fp" required >
                    </div>					
                </div>
				        <div class="col-sm-3">
                    <div class="form-group">
                      <label>Duration of the project</label>
                      <input type="number" class="form-control"  value="<?php echo $rows['Duration_of_the_project'];?>" tabindex="11" placeholder="Enter the days" name="dotp" required pattern="[0-9]+">
                    </div>					
                </div>
                <!-- <div class="row">
                  <div class="col-sm-12">
                    <div class="col-sm-12">
                      <input type="submit" class="btn btn-success" name="updatebook" value="Submit">     
                      <button type="reset" class="btn btn-danger float-right"  tabindex="14"><i class="glyphicon glyphicon-repeat"></i>Reset</button>       
				            </div>
                  </div>
                </div> -->
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
                              <input type="submit" class="btn btn-success"  tabindex="16" name="updategrant" value="Submit">
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
