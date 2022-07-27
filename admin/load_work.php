<?php  
 //load_data.php  
 include("asession.php"); 


$connect = mysqli_connect("localhost", "root", "", "bvm");  
 $output = '';  
 if(isset($_POST["user_work"]))  
 {  
    $sdate=$_POST['sdate'];
    $tdate=$_POST['tdate'];

if($_POST["user_work"] == 'All')  
      {  
        $sql_work = "SELECT b.bookid as id,b.name as name,
					  b.a_y as ay,b.e_y as ey,b.typeofwork as typeofwork,b.docc 
					  as documents from book b where aid='$_POST[aid]' 
					  
					  UNION ALL 
					  SELECT con.conid as id ,con.name as name,con.a_y as ay,con.e_y as ey,
					  
					  con.typeofwork as typeofwork,con.photos as documents 
					  
					  from conference con where aid='$_POST[aid]' 
					  
					  UNION ALL 
					  SELECT ind.id as id ,ind.industry_name as name,				  
					  ind.a_y as ay,ind.e_y as ey,ind.typeofwork as typeofwork,
					  ind.photos as documents from ind_visit ind 
					  where aid='$_POST[aid]'

					  UNION ALL 
					  
					  SELECT pap.paperid as id ,pap.decr as name ,pap.a_y 
			as ay,pap.e_y as ey, pap.typeofwork as typeofwork,pap.pdf as documents from papers
					  pap where aid='$_POST[aid]' 
					  
					  UNION ALL 
					  
					  SELECT  res.projectid as id ,res.name as name ,
					  res.a_y as ay, res.e_y as ey,res.typeofwork as typeofwork,res.upload as documents

					  from reserch_proj res where aid='$_POST[aid]'

					  UNION ALL 
					  SELECT sem.semid as id ,sem.name as name,sem.a_y 
						as ay,sem.e_y as ey,sem.typeofwork as typeofwork,
						sem.photos as documents 					  
					  from seminars sem where aid='$_POST[aid]'
					  
					  UNION ALL 
			SELECT  pet.pid as id ,pet.name as name ,pet.a_y 
			as ay,pet.e_y as ey,pet.typeofwork as typeofwork, pet.docc as documents  from patent pet where
			aid='$_POST[aid]'
			
			UNION ALL 
			SELECT  tet.tid as id ,tet.project_name as name ,tet.a_y 
			as ay,tet.e_y as ey,tet.typeofwork as typeofwork , tet.upload as documents from testing tet where
			aid='$_POST[aid]' 
					  
					  UNION ALL 
			SELECT work.workshopid  as id ,work.name as name,work.a_y 
			as ay,work.e_y as ey,work.typeofwork as typeofwork,work.photos as documents   from workshop work where
			aid='$_POST[aid]'
			
			UNION ALL 
			SELECT sttp.sttpid  as id ,sttp.name as name,sttp.a_y 
			as ay,sttp.e_y as ey,sttp.typeofwork as typeofwork, sttp.photos as documents from sttp_fdp sttp where
			aid='$_POST[aid]'"; 

			 if($res_work = mysqli_query($connect, $sql_work)){           
      echo "<table id='vemploy'  class='table table-bordered projects'>";
                            echo "<tr>";
                        echo "<thead>
                              <tr>
							  <th> ID</th>
                              <th> A_Y</th>
                              <th> Type of Work</th>
                              <th>Title</th>
                              <th> Documents</th>
                             <th> Action</th>
                           
                            </tr>
                          </thead>
                        <tbody>";
     
      while($rowwork = mysqli_fetch_array($res_work))  
      {  
        // $sqld=mysqli_query($connect,"SELECT * from department where did='$row[did]'");
        //                       $row1 = mysqli_fetch_array($sqld);
           
                              echo "<tr>";
							  echo "<td>". $rowwork['id']."</td>";
                              echo "<td>" .$rowwork['ay'].'-' .$rowwork['ey'] . "</td>";
                              echo "<td>". $rowwork['typeofwork']."</td>";
                              echo "<td>" . $rowwork['name'] . "</td>";
                               
                             echo "<td>". count(explode("|",$rowwork['documents'])). "</td>";

                               if($rowwork['typeofwork']=="Books")
                                {
                               echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_book.php?bookid=".$rowwork['id']."'><i class='fa fa-eye'></i></a></td>
                                ";
                              }
                              elseif($rowwork['typeofwork']=="Conference"){
                                    echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_conf.php?conid=".$rowwork['id']."'><i class='fa fa-eye'></i></a></td>
                                ";
                              } 
                              elseif($rowwork['typeofwork']=="Industrial Visit"){
                                    echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_ind.php?id=".$rowwork['id']."'><i class='fa fa-eye'></i></a></td>
                                ";
                              }
                               elseif($rowwork['typeofwork']=="Paper"){
                                    echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_paper.php?paperid=".$rowwork['id']."'><i class='fa fa-eye'></i></a></td>
                                ";
                              }
                               elseif($rowwork['typeofwork']=="Research Project"){
                                    echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_res.php?projectid=".$rowwork['id']."'><i class='fa fa-eye'></i></a></td>
                                ";
                              }
                               elseif($rowwork['typeofwork']=="Seminar"){
                                    echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_seminar.php?semid=".$rowwork['id']."'><i class='fa fa-eye'></i></a></td>
                                ";
                              }
							  elseif($rowwork['typeofwork']=="Workshop"){
                                    echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_workshop.php?workshopid=".$rowwork['id']."'><i class='fa fa-eye'></i></a></td>
                                ";
                              }
							  elseif($rowwork['typeofwork']=="STTP_FDP"){
                                    echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_sttp.php?sttpid=".$rowwork['id']."'><i class='fa fa-eye'></i></a></td>
                                ";
                              }
							  elseif($rowwork['typeofwork']=="Testing Consulting"){
                                    echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_testing.php?tid=".$rowwork['id']."'><i class='fa fa-eye'></i></a></td>
                                ";
                              }
							  elseif($rowwork['typeofwork']=="Patent"){
                                    echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_patent.php?pid=".$rowwork['id']."'><i class='fa fa-eye'></i></a></td>
                                ";
                              }
                              else
                              {
                                    echo "no work ";
                              }

                             
                          // } 
                            echo '</tr>';
                      
      } }
    // }}}}} 
       echo '</tbody>';

                    echo '</table>';  
          
      }


      elseif($sdate== ""){

          echo "<script>alert('select from date');</script>";
      }
      elseif($tdate == ""){
         echo "<script>alert('select to date');</script>";
      }
    
      else
      {
      if($_POST["user_work"] == 'Seminars')  
      {  
           $sql = "SELECT * FROM seminars WHERE aid = '$_POST[aid]' AND date BETWEEN '$sdate' AND '$tdate' ";  
           $result = mysqli_query($connect,$sql);  
      echo "<table id='vemploy'  class='table table-bordered projects'>";
                            echo "<tr>";
                        echo "<thead>
                              <tr>
                              <th> ID</th>
                              <th> Type of Work</th>
                               <th> Title</th>
                              <th> Date</th>
                               <th> Photos</th>
                              <th> Action</th>
                            </tr>
                          </thead>
                        <tbody>";
     
      while($row = mysqli_fetch_array($result))  
      {  
        // $sqld=mysqli_query($connect,"SELECT * from department where did='$row[did]'");
        //                       $row1 = mysqli_fetch_array($sqld);
           
                              echo "<tr>";
                              echo "<td>" . $row['semid'] . "</td>";
                              echo "<td>" . $row['typeofwork'] . "</td>";
                              echo "<td>" . $row['name'] . "</td>";
                               echo "<td>" . $row['date'] . "</td>";
                              echo "<td>".count(explode("|",$row['photos']))."</td>";
                               echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_seminar.php?semid=".$row['semid']."'><i class='fa fa-eye'></i></a></td>";
                             
                          // } 
                            echo '</tr>';
                      
      }  
       echo '</tbody>';
        // echo "<tfoot>";
                echo "<tr>";
                
                  echo "<td></td>";
                   echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                  echo "<td><label>TOTAL</label>";
                  $counsem=mysqli_query($connect,"SELECT count(*) as c FROM seminars where aid='$_POST[aid]'AND date BETWEEN '$sdate' AND '$tdate' ");
                               while($rows=mysqli_fetch_assoc($counsem))
                                      {
                                         echo "<input type='text' class='form-control' name='total' id='total' style='width:80px' value='".$rows['c']."' readonly></td>";
                                            // echo $rows['c'];
                                      }     
                   
                     echo "</tr>";
                      // echo "</tfoot>";
                    echo '</table>';  
      // echo $output;   
      }  
      elseif($_POST["user_work"] == 'Conference')  
      {  
           $sql = "SELECT * FROM conference WHERE aid = '$_POST[aid]' AND date BETWEEN '$sdate' AND '$tdate'";  
           $result = mysqli_query($connect,$sql);  
      echo "<table id='vemploy'  class='table table-bordered projects'>";
                            echo "<tr>";
                        echo "<thead>
                              <tr>
                              <th> ID</th>
                              <th> Type of Work</th>
                              <th> Title</th>
                              <th> Date</th>
                               <th> Photos</th>
                           <th> Action</th>
                            </tr>
                          </thead>
                        <tbody>";
     
      while($row = mysqli_fetch_array($result))  
      {  
        // $sqld=mysqli_query($connect,"SELECT * from department where did='$row[did]'");
        //                       $row1 = mysqli_fetch_array($sqld);
           
                              echo "<tr>";
                              echo "<td>" . $row['conid'] . "</td>";
                               echo "<td>" . $row['typeofwork'] . "</td>";
                              echo "<td>" . $row['name'] . "</td>";
                               echo "<td>" . $row['date'] . "</td>";
                               echo "<td>" . count(explode("|",$row['photos'])). "</td>";
                               echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_conf.php?conid=".$row['conid']."'><i class='fa fa-eye'></i></a></td>
                                ";
                             
                              //  echo "<td class='project-actions text-left'>
                              //   <a class='btn btn-info btn-sm' href='faculty_work.php?aid=".$row['aid']."'><i class='fa fa-eye'></i></a>
                              //   <a class='btn btn-info btn-sm' href='editemp.php?aid=".$row['aid']."'><i class='fas fa-pencil-alt'></i></a>
                              //   <a class='btn btn-danger btn-sm' href='deleteemp.php?aid=". $row['aid']."'><i class='fas fa-trash'></i></a>
                              // </td> ";
                             
                          // } 
                            echo '</tr>';
                      
      }  
       echo '</tbody>';
        echo "<tr>";
                
                  echo "<td></td>";
                   echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                      echo "<td></td>";
                  echo "<td> <label>TOTAL</label>";
                  $counsem=mysqli_query($connect,"SELECT count(*) as c FROM conference where aid='$_POST[aid]'AND date BETWEEN '$sdate' AND '$tdate' ");
                               while($rows=mysqli_fetch_assoc($counsem))
                                      {
                                         echo "<input type='text' class='form-control' name='total' id='total' style='width:80px' value='".$rows['c']."' readonly></td>";
                                            // echo $rows['c'];
                                      }     
                   
                     echo "</tr>";
                    echo '</table>';  
      // echo $output;   
      }  
      elseif($_POST["user_work"] == 'Books')  
      {  
           $sql = "SELECT * FROM book WHERE aid = '$_POST[aid]' AND created_at BETWEEN '$sdate' AND '$tdate'";  
           $result = mysqli_query($connect,$sql);  
      echo "<table id='vemploy'  class='table table-bordered projects'>";
                            echo "<tr>";
                        echo "<thead>
                              <tr>
                              <th> ID</th>
                              <th> Type of Work</th>
                              <th> Date</th>
                              
                             
                            
                            <th> Action</th>
                           
                            </tr>
                          </thead>
                        <tbody>";
     
      while($row = mysqli_fetch_array($result))  
      {  
        // $sqld=mysqli_query($connect,"SELECT * from department where did='$row[did]'");
        //                       $row1 = mysqli_fetch_array($sqld);
           
                              echo "<tr>";
                              echo "<td>" . $row['bookid'] . "</td>";
                              echo "<td>" . $row['name'] . "</td>";
                               echo "<td>" . $row['created_at'] . "</td>";
                              
                              
                             echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_book.php?bookid=".$row['bookid']."'><i class='fa fa-eye'></i></a></td>
                                ";
                             
                          // } 
                            echo '</tr>';
                      
      }  
       echo '</tbody>';
        echo "<tr>";
                
                  echo "<td></td>";
                   echo "<td></td>";
                    echo "<td></td>";
                  echo "<td> <label>TOTAL</label>";
                  $counsem=mysqli_query($connect,"SELECT count(*) as c FROM book where aid='$_POST[aid]'AND created_at BETWEEN '$sdate' AND '$tdate'");
                               while($rows=mysqli_fetch_assoc($counsem))
                                      {
                                         echo "<input type='text' class='form-control' name='total' id='total' style='width:80px' value='".$rows['c']."' readonly></td>";
                                            // echo $rows['c'];
                                      }     
                   
                     echo "</tr>";
                    echo '</table>';  
      // echo $output;   
      }  
      elseif($_POST["user_work"] == 'Industrial Visit')  
      {  
           $sql = "SELECT * FROM ind_visit WHERE aid = '$_POST[aid]' AND date BETWEEN '$sdate' AND '$tdate'";  
           $result = mysqli_query($connect,$sql);  
      echo "<table id='vemploy'  class='table table-bordered projects'>";
                            echo "<tr>";
                        echo "<thead>
                              <tr>
                              <th> ID</th>
                              <th> Type of Work</th>
                              <th> Date</th>
                              <th> No. Of Student</th>
                               <th> Documents</th>
                            <th> Action</th>
                           
                            </tr>
                          </thead>
                        <tbody>";
     
      while($row = mysqli_fetch_array($result))  
      {  
        // $sqld=mysqli_query($connect,"SELECT * from department where did='$row[did]'");
        //                       $row1 = mysqli_fetch_array($sqld);
           
                              echo "<tr>";
                              echo "<td>" . $row['id'] . "</td>";
                              echo "<td>" . $row['industry_name'] . "</td>";
                               echo "<td>" . $row['date'] . "</td>";
                              echo "<td>" . $row['noofstud'] . "</td>";
                              echo "<td>" .count(explode("|",$row['photos'])) . "</td>";
                             echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_ind.php?id=".$row['id']."'><i class='fa fa-eye'></i></a></td>
                                ";
                             
                          // } 
                            echo '</tr>';
                      
      }  
       echo '</tbody>';

            echo "<tr>";
                
                  echo "<td></td>";
                   echo "<td></td>";
                    echo "<td></td>";
                     echo "<td></td>";
                    echo "<td></td>";
                  echo "<td> <label>TOTAL</label>";
                  $counsem=mysqli_query($connect,"SELECT count(*) as c FROM ind_visit where aid='$_POST[aid]' AND date BETWEEN '$sdate' AND '$tdate'");
                               while($rows=mysqli_fetch_assoc($counsem))
                                      {
                                         echo "<input type='text' class='form-control' name='total' id='total' style='width:80px' value='".$rows['c']."' readonly></td>";
                                            // echo $rows['c'];
                                      }     
                   
                     echo "</tr>";
                    echo '</table>';  
      // echo $output;   
      }  
      elseif($_POST["user_work"] == 'Papers')  
      {  
           $sql = "SELECT * FROM papers WHERE aid = '$_POST[aid]' AND date BETWEEN '$sdate' AND '$tdate'";   
           $result = mysqli_query($connect,$sql);  
      echo "<table id='vemploy'  class='table table-bordered projects'>";
                            echo "<tr>";
                        echo "<thead>
                              <tr>
                              <th> ID</th>
                              <th> Type of Work</th>
                              <th> Date</th>
                              
                             
                            
                             <th> Action</th>
                           
                            </tr>
                          </thead>
                        <tbody>";
     
      while($row = mysqli_fetch_array($result))  
      {  
        // $sqld=mysqli_query($connect,"SELECT * from department where did='$row[did]'");
        //                       $row1 = mysqli_fetch_array($sqld);
           
                              echo "<tr>";
                              echo "<td>" . $row['paperid'] . "</td>";
                              echo "<td>" . $row['decr'] . "</td>";
                               echo "<td>" . $row['date'] . "</td>";
                              
                              
                             echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_paper.php?paperid=".$row['paperid']."'><i class='fa fa-eye'></i></a></td>
                                ";
                             
                          // } 
                            echo '</tr>';
                      
      }  
       echo '</tbody>';
              echo "<tr>";
                
                  echo "<td></td>";
                   echo "<td></td>";
                    echo "<td></td>";
                  echo "<td><label>TOTAL</label>";
                  $counsem=mysqli_query($connect,"SELECT count(*) as c FROM papers where aid='$_POST[aid]' AND date BETWEEN '$sdate' AND '$tdate'");
                               while($rows=mysqli_fetch_assoc($counsem))
                                      {
                                         echo "<input type='text' class='form-control' name='total' id='total' style='width:80px' value='".$rows['c']."' readonly></td>";
                                            // echo $rows['c'];
                                      }     
                   
                     echo "</tr>";
                    echo '</table>';  
      // echo $output;  
      }  
      elseif($_POST["user_work"] == 'Reserch Projects')  
      {  
           $sql = "SELECT * FROM reserch_proj WHERE aid = '$_POST[aid]' AND enddate BETWEEN '$sdate' AND '$tdate'";
           $result = mysqli_query($connect,$sql);  
      echo "<table id='vemploy'  class='table table-bordered projects'>";
                            echo "<tr>";
                        echo "<thead>
                              <tr>
                              <th> ID</th>
                              <th> Type of Work</th>
                              <th> Date</th>
                             <th> Action</th>
                           
                            </tr>
                          </thead>
                        <tbody>";
     
      while($row = mysqli_fetch_array($result))  
      {  
        // $sqld=mysqli_query($connect,"SELECT * from department where did='$row[did]'");
        //                       $row1 = mysqli_fetch_array($sqld);
           
                              echo "<tr>";
                              echo "<td>" . $row['projectid'] . "</td>";
                              echo "<td>" . $row['project_name'] . "</td>";
                               echo "<td>" . $row['enddate'] . "</td>";
                             echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_res.php?projectid=".$row['projectid']."'><i class='fa fa-eye'></i></a></td>
                                ";
                             
                          // } 
                            echo '</tr>';
                      
      }  
       echo '</tbody>';
             echo "<tr>";
                
                  echo "<td></td>";
                   echo "<td></td>";
                    echo "<td></td>";
                  echo "<td> <label>TOTAL</label>";
                  $counsem=mysqli_query($connect,"SELECT count(*) as c FROM reserch_proj where aid='$_POST[aid]' AND enddate BETWEEN '$sdate' AND '$tdate'");
                               while($rows=mysqli_fetch_assoc($counsem))
                                      {
                                         echo "<input type='text' class='form-control' name='total' id='total' style='width:80px' value='".$rows['c']."' readonly></td>";
                                            // echo $rows['c'];
                                      }     
                   
                     echo "</tr>";
                    echo '</table>';  
      // echo $output;     
      }
         





elseif($_POST["user_work"] == 'Workshop')  
      {  
           $sql = "SELECT * FROM workshop WHERE aid = '$_POST[aid]' AND edate BETWEEN '$sdate' AND '$tdate'";
           $result = mysqli_query($connect,$sql);  
      echo "<table id='vemploy'  class='table table-bordered projects'>";
                            echo "<tr>";
                        echo "<thead>
                              <tr>
                              <th> ID</th>
                              <th> Type of Work</th>
                              <th> Date</th>
                             <th> Action</th>
                           
                            </tr>
                          </thead>
                        <tbody>";
     
      while($row = mysqli_fetch_array($result))  
      {  
        // $sqld=mysqli_query($connect,"SELECT * from department where did='$row[did]'");
        //                       $row1 = mysqli_fetch_array($sqld);
           
                              echo "<tr>";
                              echo "<td>" . $row['workshopid'] . "</td>";
                              echo "<td>" . $row['name'] . "</td>";
                               echo "<td>" . $row['edate'] . "</td>";
                             echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_workshop.php?workshopid=".$row['workshopid']."'><i class='fa fa-eye'></i></a></td>
                                ";
                             
                          // } 
                            echo '</tr>';
                      
      }  
       echo '</tbody>';
             echo "<tr>";
                
                  echo "<td></td>";
                   echo "<td></td>";
                    echo "<td></td>";
                  echo "<td> <label>TOTAL</label>";
                  $counwork=mysqli_query($connect,"SELECT count(*) as c FROM workshop where aid='$_POST[aid]' AND edate BETWEEN '$sdate' AND '$tdate'");
                               while($rows=mysqli_fetch_assoc($counwork))
                                      {
                                         echo "<input type='text' class='form-control' name='total' id='total' style='width:80px' value='".$rows['c']."' readonly></td>";
                                            // echo $rows['c'];
                                      }     
                   
                     echo "</tr>";
                    echo '</table>';  
      // echo $output;     
      }
       
elseif($_POST["user_work"] == 'STTP_FDP')  
      {  
           $sql = "SELECT * FROM sttp_fdp WHERE aid = '$_POST[aid]' AND edate BETWEEN '$sdate' AND '$tdate'";
           $result = mysqli_query($connect,$sql);  
      echo "<table id='vemploy'  class='table table-bordered projects'>";
                            echo "<tr>";
                        echo "<thead>
                              <tr>
                              <th> ID</th>
                              <th> Type of Work</th>
                              <th> Date</th>
                             <th> Action</th>
                           
                            </tr>
                          </thead>
                        <tbody>";
     
      while($row = mysqli_fetch_array($result))  
      {  
        // $sqld=mysqli_query($connect,"SELECT * from department where did='$row[did]'");
        //                       $row1 = mysqli_fetch_array($sqld);
           
                              echo "<tr>";
                              echo "<td>" . $row['sttpid'] . "</td>";
                              echo "<td>" . $row['name'] . "</td>";
                               echo "<td>" . $row['edate'] . "</td>";
                             echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_sttp.php?sttpid=".$row['sttpid']."'><i class='fa fa-eye'></i></a></td>
                                ";
                             
                          // } 
                            echo '</tr>';
                      
      }  
       echo '</tbody>';
             echo "<tr>";
                
                  echo "<td></td>";
                   echo "<td></td>";
                    echo "<td></td>";
                  echo "<td> <label>TOTAL</label>";
                  $counsttp=mysqli_query($connect,"SELECT count(*) as c FROM sttp_fdp where aid='$_POST[aid]' AND edate BETWEEN '$sdate' AND '$tdate'");
                               while($rows=mysqli_fetch_assoc($counsttp))
                                      {
                                         echo "<input type='text' class='form-control' name='total' id='total' style='width:80px' value='".$rows['c']."' readonly></td>";
                                            // echo $rows['c'];
                                      }     
                   
                     echo "</tr>";
                    echo '</table>';  
      // echo $output;     
      }

elseif($_POST["user_work"] == 'Testing Consultancy')  
      {  
           $sql = "SELECT * FROM testing WHERE aid = '$_POST[aid]' AND enddate BETWEEN '$sdate' AND '$tdate'";
           $result = mysqli_query($connect,$sql);  
      echo "<table id='vemploy'  class='table table-bordered projects'>";
                            echo "<tr>";
                        echo "<thead>
                              <tr>
                              <th> ID</th>
							  <th> Project Type</th>
                              <th> Type of Work</th>
                              <th> Date</th>
                             <th> Action</th>
                           
                            </tr>
                          </thead>
                        <tbody>";
     
      while($row = mysqli_fetch_array($result))  
      {  
        // $sqld=mysqli_query($connect,"SELECT * from department where did='$row[did]'");
        //                       $row1 = mysqli_fetch_array($sqld);
           
                              echo "<tr>";
                              echo "<td>" . $row['tid'] . "</td>";
							  echo "<td>" . $row['work_type'] . "</td>";
                              echo "<td>" . $row['project_name'] . "</td>";
                               echo "<td>" . $row['endate'] . "</td>";
                             echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_testing.php?tid=".$row['tid']."'><i class='fa fa-eye'></i></a></td>
                                ";
                             
                          // } 
                            echo '</tr>';
                      
      }  
       echo '</tbody>';
             echo "<tr>";
                
                  echo "<td></td>";
                   echo "<td></td>";
                    echo "<td></td>";
                  echo "<td> <label>TOTAL</label>";
                  $counwork=mysqli_query($connect,"SELECT count(*) as c FROM testing where aid='$_POST[aid]' AND enddate BETWEEN '$sdate' AND '$tdate'");
                               while($rows=mysqli_fetch_assoc($counwork))
                                      {
                                         echo "<input type='text' class='form-control' name='total' id='total' style='width:80px' value='".$rows['c']."' readonly></td>";
                                            // echo $rows['c'];
                                      }     
                   
                     echo "</tr>";
                    echo '</table>';  
      // echo $output;     
      }


elseif($_POST["user_work"] == 'Patent')  
      {  
           $sql = "SELECT * FROM patent WHERE aid = '$_POST[aid]' AND date BETWEEN '$sdate' AND '$tdate'";
           $result = mysqli_query($connect,$sql);  
      echo "<table id='vemploy'  class='table table-bordered projects'>";
                            echo "<tr>";
                        echo "<thead>
                              <tr>
                              <th> ID</th>
                              <th> Type of Work</th>
                              <th> Date</th>
                             <th> Action</th>
                           
                            </tr>
                          </thead>
                        <tbody>";
     
      while($row = mysqli_fetch_array($result))  
      {  
        // $sqld=mysqli_query($connect,"SELECT * from department where did='$row[did]'");
        //                       $row1 = mysqli_fetch_array($sqld);
           
                              echo "<tr>";
                              echo "<td>" . $row['pid'] . "</td>";
                              echo "<td>" . $row['name'] . "</td>";
                               echo "<td>" . $row['date'] . "</td>";
                             echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='fac_patent.php?pid=".$row['pid']."'><i class='fa fa-eye'></i></a></td>
                                ";
                             
                          // } 
                            echo '</tr>';
                      
      }  
       echo '</tbody>';
             echo "<tr>";
                
                  echo "<td></td>";
                   echo "<td></td>";
                    echo "<td></td>";
                  echo "<td> <label>TOTAL</label>";
                  $counpet=mysqli_query($connect,"SELECT count(*) as c FROM patent where aid='$_POST[aid]' AND date BETWEEN '$sdate' AND '$tdate'");
                               while($rows=mysqli_fetch_assoc($counpet))
                                      {
                                         echo "<input type='text' class='form-control' name='total' id='total' style='width:80px' value='".$rows['c']."' readonly></td>";
                                            // echo $rows['c'];
                                      }     
                   
                     echo "</tr>";
                    echo '</table>';  
      // echo $output;     
      }









    else  
      {  
        echo "error";
           // $sql = "SELECT * FROM user";  
      }  
 }
 }  
 ?>  