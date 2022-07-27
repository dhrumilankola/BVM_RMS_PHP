<?php  
 //load_data.php  
 include("asession.php"); 


$connect = mysqli_connect("localhost", "root", "", "bvm");  
 $output = '';  
 if(isset($_POST["did"]))  
 {  
      if($_POST["did"] != '')  
      {  
           $sql = "SELECT * FROM user WHERE did = '".$_POST["did"]."'";   
      }  
      else  
      {  
           $sql = "SELECT * FROM user";  
      }  
 $result = mysqli_query($connect,$sql);  
      echo "<table id='vemploy'  class='table table-bordered projects'>";
                            echo "<tr>";
                       echo "<thead>";
                              echo "<tr>
                              <th> Id</th>
                              <th> Name</th>
                              <th> Mobile No</th>
                              <th> Email</th>
                               <th> Date of Join</th>
                           
                              <th> Department</th>
                              <th> Designation</th>
                              <th> Action</th>
                           
                            </tr>
                          </thead>
                        <tbody>";
     
      while($row = mysqli_fetch_array($result))  
      {  
        $sqld=mysqli_query($connect,"SELECT * from department where did='$row[did]'");
                              $row1 = mysqli_fetch_array($sqld);
           
                              echo '<tr>';
                          echo "<td>" . $row['aid'] . "</td>";
                              echo "<td>" . $row['uname'] . "</td>";
                              echo "<td>" . $row['mno'] . "</td>";
                              echo "<td>" . $row['email'] . "</td>";
                              echo "<td>" . $row['doj'] . "</td>";
                              echo "<td>" . $row1['department'] . "</td>";
                              echo "<td>" . $row['desig'] . "</td>";
                              
                               echo "<td class='project-actions text-left'>
                                <a class='btn btn-info btn-sm' href='faculty_work.php?aid=".$row['aid']."'><i class='fa fa-eye'></i></a>
                                <a class='btn btn-info btn-sm' href='editemp.php?aid=".$row['aid']."'><i class='fas fa-pencil-alt'></i></a>
                                <a class='btn btn-danger btn-sm' href='deleteemp.php?aid=". $row['aid']."'><i class='fas fa-trash'></i></a>
                              </td> ";
                             
                          // } 
                            echo '</tr>';
                      
      }  
       echo '</tbody>';

                    echo '</table>';  
      // echo $output;  
 }  
 ?>  