<?php
include 'config.php';
include 'asession.php';

($result = mysqli_query($link, "SELECT * FROM user WHERE aid='$session_aid'"))
  or
  die('Error In Session');
$row = mysqli_fetch_array($result);

if (isset($_POST['add_conf'])) {
  $a_y = $_POST['ay'];
  $e_y = $_POST['ey'];
  $date = $_POST['date'];
  $nod = $_POST['nod'];
  $name = $_POST['name'];
  $desc = $_POST['decr'];
  $type = $_POST['type'];
  $attended = $_POST['as'];
  $role = $_POST['role'];
  $cuname = $_POST['cuname'];
  $dpname = $_POST['dpname'];
  $aid = $session_aid;

  $imageData = [];

  $sqldid = mysqli_query($link, "select * from Department WHERE did='$row[did]'");
  $rowdid = mysqli_fetch_array($sqldid);
  if (isset($_FILES['photos'])) {
    /*$errors = [];
        foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
            $file_name = $key . $_FILES['photos']['name'][$key];
            $file_tmp = $_FILES['photos']['tmp_name'][$key];
            //             if($file_size > 2097152){
            //                 $errors[]='File size must be less than 2 MB';
            //             }

            array_push($imageData, $file_name);

            $desired_dir =
                $rowdid['department'] .
                '/' .
                $row['uname'] .
                '/' .
                date('Y') .
                '/Conference/Photos/';

            if (empty($errors) == true) {
                if (is_dir($desired_dir) == false) {
                    mkdir("$desired_dir", 0700); // Create directory if it does not exist
                }
                if (is_dir("$desired_dir/" . $file_name) == false) {
                    move_uploaded_file($file_tmp,$rowdid['department'].'/'.$row['uname'].'/'.date('Y').'/Conference/Photos/'.$file_name);
                } else {//rename the file if another one exist
                    $new_dir =$rowdid['department'].'/'.$row['uname'].'/'.date('Y').'/Conference/Photos/'.$file_name.time();
                    rename($file_tmp, $new_dir);
                }
            } else {
                print_r($errors);
            }
        }*/
    // if (empty($error)) {
    //echo "Success";
    //print_r($imageData);
    //echo sizeof($imageData);
    //for($i=0;$i<sizeof($imageData);$i++){
    //  echo $imageData[$i];
    //}
    $image = $_FILES['photos'];
    move_uploaded_file($image, $rowdid['department'] . '/' . $row['uname'] . '/' . date('Y') . '/Conference/Photos/' . $image);

    //$imgDt = implode('|', $imageData);
    $query = "
        INSERT INTO expert(start_year,end_year, start_date, total_days,topic_name,
                         descriptoin,mode,role,user,clg_name,
						 dep_name,image,id,aid) VALUES ('$a_y','$e_y', 
						 '$date', '$nod', '$name', '$desc', '$type',
						 '$attended','$role','$cuname','$dpname','$aid','$image')";

    if (mysqli_query($link, $query)) {
      echo "<script> alert('Conference Details Added Successfully')</script>";
      header('location:vconference.php');
    }
    //}
  }
}

include 'include/header.php';
include 'include/sidebar.php';
?>
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <!-- general form elements disabled -->
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Add Expert Talk Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <script type='text/javascript'>
                function frmselect() {

                  var user = document.getElementById('user');
                  var mode = document.getElementById('mode');
                  var role = document.getElementById('role');

                  if (madetype(user, "Please Select Type of User")) {
                    if (madeas(mode, "Please Select Type of Mode ")) {
                      if (maderole(role, "Please Select Type of Role ")) {
                        return true;
                      }
                    }
                  }
                  return false;

                }

                function madetype(elem, helperMsg) {
                  if (elem.value == "Select here") {
                    alert(helperMsg);
                    elem.focus();
                    return false;
                  } else {
                    return true;
                  }
                }

                function madeas(elem, helperMsg) {
                  if (elem.value == "Select here") {
                    alert(helperMsg);
                    elem.focus();
                    return false;
                  } else {
                    return true;
                  }
                }

                function maderole(elem, helperMsg) {
                  if (elem.value == "Select here") {
                    alert(helperMsg);
                    elem.focus();
                    return false;
                  } else {
                    return true;
                  }
                }
              </script>
              <form action="#" method="post" enctype="multipart/form-data" onsubmit=" return frmselect()">
                <div class="row">
                  <div class="col-sm-2">
                    <!-- text input -->
                    <script>
                      function test() {
                        var value = parseInt(document.getElementById('aydt').value, 10);
                        document.getElementById('sdate').min = value + "-06-01";
                        document.getElementById('sdate').value = value + "-06-01";
                        value = isNaN(value) ? 0 : value;
                        value++;
                        document.getElementById('eydt').value = value;
                        document.getElementById('edate').value = value;
                      }

                      function updateEndDate() {
                        let edate = document.getElementById('edate').value;
                        let minDate = new Date();
                        let maxDate = new Date();


                        let sdate = document.getElementById('sdate').value;
                        let formatedStartDate = new Date(sdate);
                        year = formatedStartDate.getFullYear()
                        month = formatedStartDate.getMonth() + 1;
                        day = formatedStartDate.getDate();
                        extraMonth = month + 1;
                        extraYear = year;

                        console.log("month", month)
                        console.log("extraMonth", extraMonth)
                        if (day < 10) {
                          day = "0" + day
                        }
                        if (month < 10) {
                          month = "0" + month
                        }
                        if (extraMonth < 10) {
                          extraMonth = "0" + extraMonth
                        }
                        if (parseInt(extraMonth) > 12) {
                          extraMonth = extraMonth - 12;
                          extraMonth = "0" + extraMonth;
                          extraYear++;
                        }

                        document.getElementById('edate').min = year + "-" + month + "-" + day;
                        document.getElementById('edate').value = year + "-" + month + "-" + day;
                        document.getElementById('edate').max = extraYear + "-" + extraMonth + "-" + day;

                        //console.log(year + "-" + extraMonth + "-" + day)
                        //console.log(document.getElementById('edate').max)
                      }

                      function daysDifference() {
                        var startDate = new Date($('#sdate').val());
                        var endDate = new Date($('#edate').val());
                        if (startDate > endDate) {
                          alert("Your message");
                          return false;
                        }
                        var diffTime = Math.abs(endDate - startDate);
                        var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24) + 1);
                        if (diffDays <= 30) {
                          $('#nd').val(diffDays);
                        } else {
                          alert("Please enter valid date... Days should be less than 30 days...");
                        }
                      }
                    </script>
                    <div class="form-group">
                      <label>Start Academic Year</label>
                      <input type="text" class="form-control" placeholder="2015" name="ay" id="aydt" tabindex="1" required onblur="test()">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                      <label>End Academic Year</label>
                      <input type="text" class="form-control" placeholder="2016" name="ey" id="eydt" tabindex="2" required readonly>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Start Date</label>
                      <input type="date" class="form-control" id="sdate" name="sdate" tabindex="3" required pattern="\Y{4}-\m{2}-\d{2}">
                      <!-- data-date-format="DD MMMM YYYY" -->
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <!-- text input -->
                    <div class="form-group">
                      <label>End Date </label>
                      <input type="date" class="form-control" id="edate" onblur="daysDifference()" name="edate" tabindex="4" required pattern="\Y{4}-\m{2}-\d{2}">
                      <!-- data-date-format="DD MMMM YYYY" -->
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <!-- text input -->
                    <script type='text/javascript'>
                      function frmnod() {

                        var nd = document.getElementById('nd');

                        if (isNumeric(nd, "Please enter a valid Number of Days")) {

                          return true;
                        }

                        return false;

                      }

                      function isNumeric(elem, helperMsg) {
                        var numericExpression = /^[0-9]+$/;
                        if (elem.value.match(numericExpression)) {
                          return true;
                        } else {
                          alert(helperMsg);
                          elem.focus();
                          return false;
                        }
                      }
                    </script>
                    <div class="form-group">
                      <label>Total Days</label>
                      <input type="text" class="form-control" placeholder="10" name="nod" id='nd' tabindex="5" required onchange="frmnod()">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Topic Name</label>
                      <textarea class="form-control" placeholder="Pedagogy & Effective use of ICT in Engineering Education & Academic Governance" name="name" tabindex="6" required></textarea>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" placeholder="Enter ..." name="decr" tabindex="7"></textarea>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Mode</label>
                      <select class="form-control" name="mode" tabindex="8" id='mode' required>
                        <option>Select here </option>
                        <option value="Physical">Physical</option>
                        <option value="Online">Online</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Role</label>
                      <select class="form-control" name="role" tabindex="9" id='role' required>
                        <option>Select here </option>
                        <option value="Convener">Convener</option>
                        <option value="Students">Coordinator</option>
                        <option value="Co-Coordinator">Co-Coordinator</option>
                        <option value="Team Member">Team Member</option>
                        <option value="Participated">Participated</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>User </label>
                      <select class="form-control" name="user" tabindex="10" id='user' required>
                        <option>Select here </option>
                        <option value="Students">Students </option>
                        <option value="Faculties">Faculties</option>
                        <option value="Boths">Both</option>

                      </select>
                    </div>
                  </div>


                  <!-- </div> -->

                  <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                      <label>College Name | University Name</label>
                      <input type="text" class="form-control" tabindex="11" placeholder="Birla Vishvakarma Mahavidyalaya " name="cuname">

                    </div>
                  </div>
                  <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Department Name</label>
                      <input type="text" class="form-control" tabindex="12" placeholder="Information Technology " name="dpname">

                    </div>
                  </div>

                  <!-- <div class="row"> -->

                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Upload Photos</label>
                      <input type="file" name="photos[]" class="btn btn-info btn-block file" tabindex="13" required>

                    </div>
                  </div>
                </div>


                <div class="row">

                  <div class="col-sm-12">
                    <div class="col-sm-12">
                      <input type="submit" class="btn btn-success" name="addworkshop" tabindex="14" value="Submit">
                      <button type="reset" class="btn btn-danger float-right" tabindex="15"><i class="glyphicon glyphicon-repeat"></i>Reset</button>
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
<div>




</div>
<?php include 'include/footer.php'; ?>


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
    $('#eng tbody').append('<tr><td><input type="date" class="form-control" placeholder="Enter ..." name="day[]" required pattern="\Y{4}-\m{2}-\d{2}" >' +
      '</td><td><select class="form-control" name="tname[]">' +
      '<option>Select</option>' +
      '<option value="IELTS">IELTS</option>' +
      '<option value="TOFEL">TOFEL</option>' +
      '<option value="GRE">GRE</option>' +
      '<option value="GMAT">GMAT</option>' +
      '<option value"SAT>SAT</option>' +

      '</td><td><input type="text" class="form-control" placeholder="Enter...." name="speak[]">' +
      '</td><td><input type="text" class="form-control" placeholder="Enter...." name="reading[]">' +
      '</td>><td><input type="text" class="form-control" placeholder="Enter...." name="listen[]">' +
      '</select>' + '</td><td><input type="text" class="form-control" placeholder="Enter...." name="writing[]">' +
      '</td><td><input type="text" class="form-control" placeholder="Enter...." name=overall[]>' +
      '</td><td> <button type="button" class="btn btn-info btn-sm" onclick="addeng()"><i class="fas fa-plus-square"></i></button>' + ' ' +
      '<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>' +
      '</td></tr>');
    rowNo++;
  }
  var rowNo = 2;

  function adddoc() {

    $('#doc tbody').append('<tr><td>' + rowNo + '</td><td><input type="file" name="files[]" class="btn btn-info btn-block file" multiple>' + '</td><td> <button type="button" class="btn btn-info btn-sm" onclick="adddoc()"><i class="fas fa-plus-square"></i></button>' + ' ' + '<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>' +
      '</td></tr>');
    rowNo++;
  }

  function addWork() {
    $('#work tbody').append('<tr><td><input type="text" class="form-control" placeholder="Enter...." name="title[]">' + '</td><td><input type="text" class="form-control" placeholder="Enter...." name="company[]">' + '</td><td><input type="date" class="form-control" placeholder="Enter ..." name="Start[]">' + '</td><td><input type="date" class="form-control" placeholder="Enter ..." name="end[]">' + '</td><td><input type="text" class="form-control" placeholder="Enter...." name="experience[]">' + '</td><td><button type="button" class="btn btn-info btn-sm" onclick="addWork()"><i class="fas fa-plus-square"></i></button>' + ' ' + '<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>' +
      '</td></tr>');
    rowNo++;
  }

  function addAcc() {
    $('#Acc tbody').append('<tr><td><?php
                                    $sql1 = "SELECT  level FROM level ";
                                    if ($result = mysqli_query($link, $sql1)) { ?> <
      select class = "form-control"
      name = "acdlevel[]" > <?php
                                      while ($row = mysqli_fetch_assoc($result)) {
                                        $level = $row['level'];
                                        echo '<option value="' . $level . '">' . $level . '</option>';
                                      }
                                      echo "</select>";
                                    } else
                                      echo "error";
                            ?> '+
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="sub[]">' +
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="uni[]">' +
    '</td><td><?php
              $currently_selected = date('Y');
              $earliest_year = 1997;
              $latest_year = date('Y+2'); ?> <
    select class = "form-control"
    name = "acdyr[]" > <?php
                        foreach (range($latest_year, $earliest_year) as $i) {
                          print '<option value="' . $i . '"' . ($i === $currently_selected ? ' selected="selected"' : '') . '>' . $i . '</option>';
                        }
                        print '</select>';
                        ?> '+ 
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="result[]">' +
    '</td></td><td><select class="form-control" name="medium[]">' +
    '<option>Select</option>' +
    '<option value="Hindi">Hindi</option>' +
    '<option value="English">English</option>' +
    '</select>' +
    '</td><td><button type="button" class="btn btn-info btn-sm" onclick="addAcc()"><i class="fas fa-plus-square"></i></button>' + ' ' +
    '<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>' +
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
      processData: true,
      success: function(data) {
        $("#notification-count").remove();
        $("#notification-latest").show();
        $("#notification-latest").html(data);
      },
      error: function() {}
    });
  }

  $(document).ready(function() {
    $('body').click(function(e) {
      if (e.target.id != 'notification-icon') {
        $("#notification-latest").hide();
      }
    });
  });
</script>
</body>

</html>