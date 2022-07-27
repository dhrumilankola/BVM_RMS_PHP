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
             <a class="nav-link active">
                
               <i class="nav-icon fa fa-user-secret"></i> 
               <p>
                 Expert Talk/Session Chair
                 <i class="fas fa-angle-left right"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="addsession_chair.php" class="nav-link active">
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