<?php
// session_start();
include("config.php");
include("asession.php"); 
//$sql= "SELECT * FROM addstud WHERE sid='$session_id'";
$result=mysqli_query($link,"SELECT * FROM user WHERE aid=".$session_aid)or die('Error In Session');
$row=mysqli_fetch_array($result);
if(isset($_POST['addemployee'])){
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
    $doj=$_POST['doj'];
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
    $pass=md5($_POST['pass']);
    // echo $pass;
    $cpass=md5($_POST['pass']);
    // $schedule=$_POST['schedule'];
    $jobtitle = $_POST['title'];
    // print_r($jobtitle);
    $company=$_POST['company'];
    // print_r($company);
    $st=$_POST['Start'];
    // print_r($st);
    $endate=$_POST['end'];
    // print_r($endate);
    $exper=$_POST['experience'];
    // print_r($exper);
    echo "<br>"; echo "<br>";
   // echo "<script>alert('".$did."')</script>";
     $sqldid=mysqli_query($link,"select * from Department WHERE did='$did'");
$rowdid=mysqli_fetch_assoc($sqldid);

  $fileName=$_FILES['profile']['name'];
  $fileType=$_FILES['profile']['type'];
  $fileTmpName=$_FILES['profile']['tmp_name'];  
  $allowed=array('jpg','jpeg','png','pdf');
  $fileExt=explode('.', $fileName);
  $fileActualExt=strtolower(end($fileExt));
  if(in_array($fileActualExt, $allowed)) {
     $profile=uniqid('',true).".".$fileActualExt;

     if($user_type=="Faculty")
  {

                     if(!file_exists("../Faculty/".$rowdid['department'])){
                    mkdir("../Faculty/".$rowdid['department']);
                  }
                   if(!file_exists("../Faculty/".$rowdid['department']."/".$uname)){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname);
                   }
                    if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y'))){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y'));
                    }
                    if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/Images/")){
                        mkdir("../Faculty/".$rowdid['department']."/".$uname."/Images/");
                      }
                      if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar")){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar");
                    }
                    if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar/Photos")){
                       mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar/Photos");
                     }
                     if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar/Documents")){
                        mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar/Documents");
                     }
                      if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Books")){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Books");
                    }
                    if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Books/Photos")){
                       mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Books/Photos");
                     }
                     if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Books/Documents")){
                        mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Books/Documents");
                     }
                    if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Conference")){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Conference");
                    }
                    if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Conference/Photos")){
                       mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Conference/Photos");
                     }
                     if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Conference/Documents")){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Conference/Documents");
                    }
                    if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Papers")){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Papers");
                    }
                    if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Papers/Photos")){
                       mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Papers/Photos");
                     }
                     if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Papers/Documents")){
                        mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Papers/Documents");
                     }
                      if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Projects")){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Projects");
                    }
                    if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Projects/Photos")){
                       mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Projects/Photos");
                     }
                     if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Projects/Documents")){
                        mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Projects/Documents");
                     }
                      if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit")){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit");
                    }
                    if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit/Photos")){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit/Photos");
                    }
                    if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit/Documents")){
                        mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit/Documents");
                      }
                 




if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Patent")){
                       mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Patent");
						
					}
				if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Patent/Photos")){
                       mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Patent/Photos");
						
					}
                    if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Patent/Documents")){
                        mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Patent/Documents");
                      }
                




if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp")){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp");
                    }
if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp/Photos")){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp/Photos");
                    }
                    if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp/Documents")){
                        mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp/Documents");
                      }
                 




if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy")){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy");
                    }
if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy/Photos")){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy/Photos");
                    }
                    if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy/Documents")){
                        mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy/Documents");
                      }
                  





if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop")){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop");
                    }
if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop/Photos")){
                      mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop/Photos");
                    }
                    if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop/Documents")){
                        mkdir("../Faculty/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop/Documents");
                      }
                  $targetdir="../Faculty/".$rowdid['department']."/".$uname."/Images/";
}
      else if($user_type=="HOD")
      {
                      if(!file_exists("../HOD/".$rowdid['department'])){
                         mkdir("../HOD/".$rowdid['department']);
                      }
                       if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/")){
                         mkdir("../HOD/".$rowdid['department']."/".$uname."/");
                       }   
                  if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y'))){
                   mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y'));
                    }
               if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/Images/")){
                    mkdir("../HOD/".$rowdid['department']."/".$uname."/Images/");
                  }
                   if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar")){
                   mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar");
                 }
                  if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar/Photos")){
                    mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar/Photos");
                  }
                   if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar/Documents")){
                     mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar/Documents");
                   }
                    if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Books")){
                   mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Books");
                 }
                  if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Books/Photos")){
                    mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Books/Photos");
                  }
                   if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Books/Documents")){
                     mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Books/Documents");
                   }
                    if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Conference")){
                   mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Conference");
                 }
                  if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Conference/Photos")){
                    mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Conference/Photos");
                  }
                   if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Conference/Documents")){
                     mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Conference/Documents");
                   
                 }
                  if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Papers")){
                   mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Papers");
                 }
                  if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Papers/Photos")){
                    mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Papers/Photos");
                  }
                   if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Papers/Photos")){
                     mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Papers/Documents");
                   }
                    if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Projects")){
                   mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Projects");
                 }
                  if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Projects/Photos")){
                    mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Projects/Photos");
                  }
                   if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Projects/Documents")){
                     mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Projects/Documents");
                   }
                    if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit")){
                   mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit");
                 }
                  if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit/Photos")){
                     mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit/Photos");
                   }
                    if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit/Documents")){
                 mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit/Documents");
                  }
				  if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Patent")){
                       mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Patent");
						
					}
				if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Patent/Photos")){
                       mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Patent/Photos");
						
					}
                    if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Patent/Documents")){
                        mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Patent/Documents");
                      }
                




if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp")){
                      mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp");
                    }
if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp/Photos")){
                      mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp/Photos");
                    }
                    if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp/Documents")){
                        mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp/Documents");
                      }
                 




if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy")){
                      mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy");
                    }
if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy/Photos")){
                      mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy/Photos");
                    }
                    if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy/Documents")){
                        mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy/Documents");
                      }
                  





if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop")){
                      mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop");
                    }
if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop/Photos")){
                      mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop/Photos");
                    }
                    if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop/Documents")){
                        mkdir("../HOD/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop/Documents");
                      }
				  
				  
				  
              $targetdir="../HOD/".$rowdid['department']."/".$uname."/Images/";
 }
     else if($user_type=="Principal")
{
              if(!file_exists("../Principal/".$rowdid['department'])){
                  mkdir("../Principal/".$rowdid['department']);
                }
                if(!file_exists("../Principal/".$rowdid['department']."/".$uname)){
                  mkdir("../Principal/".$rowdid['department']."/".$uname);
                }
                if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y'))){
                   mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/");
                 }
                if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/Images/")){
                     mkdir("../Principal/".$rowdid['department']."/".$uname."/Images/");
                   }
                if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar/")){
                  mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar/");
                }
                if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar/Photos/")){
                  mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar/Photos/");
                }
                if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar/Documents")){
                   mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Seminar/Documents/");
                 }
                 if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Books/")){
                 mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Books/");
                }
                if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Books/Photos")){
                  mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Books/Photos/");
                }
                if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Books/Documents")){
                   mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Books/Documents");
                 }
                 if(!is_dir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Conference/")){
                 mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Conference/");
                }
                if(!is_dir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Conference/Photos/")){
                  mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Conference/Photos/");
                }
                if(!is_dir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Conference/Documents")){
                   mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Conference/Documents");
                 }
                 if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Papers")){
                 mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Papers");
                }
                if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Papers/Photos")){
                  mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Papers/Photos");
                }
                if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Papers/Documents")){
                   mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Papers/Documents");
                 }
                 if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Projects")){
                 mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Projects");
                }
                if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Projects/Photos")){
                  mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Projects/Photos");
                }
                if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Projects/Documents")){
                   mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Projects/Documents");
                 }
                 if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit")){
                 mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit");
                }
                if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit/Photos")){
                   mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit/Photos");
                 }
                if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit/Documents")){
                mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/IndustryVisit/Documents");
                }
                
				
				
				if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Patent")){
                       mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Patent");
						
					}
				if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Patent/Photos")){
                       mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Patent/Photos");
						
					}
                    if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Patent/Documents")){
                        mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Patent/Documents");
                      }
                




if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp")){
                      mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp");
                    }
if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp/Photos")){
                      mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp/Photos");
                    }
                    if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp/Documents")){
                        mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Sttp/Documents");
                      }
                 




if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy")){
                      mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy");
                    }
if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy/Photos")){
                      mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy/Photos");
                    }
                    if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy/Documents")){
                        mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Testing_Consultancy/Documents");
                      }
                  





if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop")){
                      mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop");
                    }
if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop/Photos")){
                      mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop/Photos");
                    }
                    if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop/Documents")){
                        mkdir("../Principal/".$rowdid['department']."/".$uname."/".date('Y')."/Workshop/Documents");
                      }
				  
				  
				
				$targetdir="../Principal/".$rowdid['department']."/".$uname."/Images/";
}
      else 
      {
         $targetdir="../Images/";
       }
      $dir=$targetdir.$profile;
      move_uploaded_file($_FILES['profile']['tmp_name'],$dir);  
}
 $sqlemail=mysqli_query($link,"select email from user WHERE email='$email'");
 $rowe=mysqli_fetch_array($sqlemail);
    $rfileName=$_FILES['resume']['name'];
  $rfileType=$_FILES['resume']['type'];
  $rfileTmpName=$_FILES['resume']['tmp_name'];  
  $rallowed=array('pdf');
  $rfileExt=explode('.', $rfileName);
  $rfileActualExt=strtolower(end($rfileExt));
  if(in_array($rfileActualExt, $rallowed)) {
     $resume=uniqid('',true).".".$rfileActualExt;
      if($user_type=="Faculty"){
         if(!file_exists("../Faculty/".$rowdid['department']."/".$uname."/Resume/"))
         {
  mkdir("../Faculty/".$rowdid['department']."/".$uname."/Resume/");
    }
        $rtargetdir="../Faculty/".$rowdid['department']."/".$uname."/Resume/";
    }
      else if($user_type=="HOD"){
        if(!file_exists("../HOD/".$rowdid['department']."/".$uname."/Resume/")){
  mkdir("../HOD/".$rowdid['department']."/".$uname."/Resume/");
}
        $rtargetdir="../HOD/".$rowdid['department']."/".$uname."/Resume/";
  }
     else if($user_type=="Principal")
     {
    if(!file_exists("../Principal/".$rowdid['department']."/".$uname."/Resume/"))                   {
  mkdir("../Principal/".$rowdid['department']."/".$uname."/Resume/"); 
  }                       
        $rtargetdir="../Principal/".$rowdid['department']."/".$uname."/Resume/";                  
      }
      else {
        // echo "no image path";     
      $rtargetdir='../images/';
    }
      $rdir=$rtargetdir.$resume ;
      move_uploaded_file($_FILES['resume']['tmp_name'],$rdir);     
    }
   
			
 $sql= "INSERT INTO user(uname,  mno ,  gender,  email,   city,  bday , addr,  zip, user_type,did,desig,doj,  schlspec,  school,  yschool,   rschool,   hspec,   hschool,   hyear ,  hresult,   dspec,   sdiploma,  ydiploma,  rdiploma,  degreespec,  degree,  ydegree,   rdegree,   pgspec,  pg,  ypg,   rpg,   otherspec,   sothers,   yothers,   rothers,   profile,   resume,  pass,  cpass )
  VALUES ('$uname','$mno','$gender','$email','$city','$bday','$addr','$zip','$user_type','$did','$desig','$doj','$schlspec','$school','$yschool','$rschool','$hschool','$hspec','$hyear' ,'$hresult','$dspec','$sdiploma','$ydiploma','$rdiploma','$degreespec','$degree',
'$ydegree','$rdegree','$pgspec','$pg','$ypg','$rpg','$otherspec','$sothers','$yothers','$rothers','$profile','$resume','$pass','$cpass')";
	
	
	
         if (mysqli_num_rows($sqlemail)>0)
         {
			//echo "sorry,email is exist";
            echo "<script>alert('email is exist')</script>";
			echo "<script>window.history.go(-1)</script>";
			//header("location:addemployee.php");
        }
       
		else{	
  if(mysqli_query($link, $sql) )
    {
		
      $last_id = mysqli_insert_id($link);
                  echo $last_id;
                  if( !empty($jobtitle) ){
                    for($k = 0; $k < count($jobtitle); $k++){
                        if(!empty($jobtitle[$k])){
                            $title = $jobtitle[$k];
                            $comp = $company[$k];
                             $start = $st[$k];
                             $end = $endate[$k];
                             $exp = $exper[$k];

                            $sql1="INSERT INTO addexp(tjob,company, start ,endate ,totexp, aid )VALUES ('$title','$comp','$start','$end','$exp','$last_id')";
                            if(mysqli_query($link, $sql1 ))
                            {
                            // $sql=mysqli_query($link,"select * from Department WHERE did='$did'");
                            // $rowdid=mysqli_fetch_array($sql);
                              
                            echo "<script>alert('Add Staff Successfully')</script>";
                              // header('location:addemployee.php');
                            }
                       }
                    }
                }
              }
		
         
		 else{
                echo("error");
                 }
		//}
    }
}
 
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BRMS |Admin Add Employee </title>
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
            <a href="vsttp.php" class="nav-link ">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                STTP | FDP Details
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
          </li>
		  
		  <li class="nav-item has-treeview">
            <a href="vworkshop.php" class="nav-link ">
              <i class="nav-icon fas fa-won-sign"></i>
              <p>
                Workshop Details
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
          </li>
		  
          <li class="nav-item has-treeview">
            <a href="vbook.php" class="nav-link ">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Published Book Details
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="vind_visit.php" class="nav-link ">
              <i class="nav-icon far fa-building"></i>
              <p>
                Industrial Visit
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
          
          </li>
          <li class="nav-item has-treeview">
            <a href="vpaper.php" class="nav-link ">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Papers
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
          
          </li>
          <li class="nav-item has-treeview">
            <a href="vreserch_proj.php" class="nav-link ">
            <i class="nav-icon fas fa-laptop"></i>
              <p>
                Reserch Projects
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
          </li>
		  
		  <li class="nav-item has-treeview">
            <a href="vtesting.php" class="nav-link ">
              <i class="nav-icon fas fa-tenge"></i>
              <p>
                Testing |Consultancy Work Details
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
          </li>
		  <li class="nav-item has-treeview">
            <a href="vpatent.php" class="nav-link ">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Patent Details
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            
          </li>
		  
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
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
                <a href="report_HOD.php" class="nav-link  ">
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
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employee
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addemployee.php" class="nav-link active">
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
          <form method="post" enctype="multipart/form-data">
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
                      <input type="text" class="form-control" placeholder="Enter ..." name="uname" required>
                    </div>
                  </div>
                  <div class="col-sm-3">
                            <!-- text input -->
                               <div class="form-group">
                                  <label>Mobile Number</label>
                                  <input type="text" class="form-control" placeholder="Enter ..." name="mno" required>
                               </div>
                  </div>
                  <div class="col-sm-3">
                            <div class="form-group">
                                  <label>Gender</label>
                                  <select class="form-control" name="gender">
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
                                <label for="InputEmail1" required>Email address</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                              </div>
                  </div>
                  <div class="col-sm-3">
                          <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." name="city">
                                    
                          </div>
                  </div>
                  <div class="col-sm-3">
                              <!-- text input -->
                              <div class="form-group">
                                <label>DOB</label>
                                <input type="date"  class="form-control" name="bday" required pattern="\Y{4}-\m{2}-\d{2}" >
                                <!-- data-date-format="DD MMMM YYYY" -->
                              </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                       <label>User Type</label>
                           <select name="user_type" class="form-control" required>
                              <option hidden>Select UserType </option>
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
                                <textarea class="form-control" id="exampleInputEmail1" placeholder="Enter Address" name="addr"></textarea>
                               
                              </div>
                  </div>
                   <div class="col-sm-3">
                          <div class="form-group">
                                        <label>Department</label>
                                        
                                     <?php
                                        $sql = "SELECT * FROM department ";
                                        if($result = mysqli_query($link, $sql))
                                        {
                                      ?>
                                          <select class="form-control" name="did">
										  
                                      <?php
                                          while ($row = mysqli_fetch_assoc($result)) {
                                            
                                            $department = $row['department'];
                                             $did = $row['did'];
                                            echo '<option value="'.$did.'">'.$department.'</option>';
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
                                <input type="text" class="form-control" placeholder="Enter ..." name="zip">
                              </div>
                  </div>

                   
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Designation</label>
                    <select class="form-control" name="desig"  tabindex="6" required>
                                    <option>Select here </option>
                                    <option value="Professor ">Professor </option>
                                    <option value="Associate Professor" >Associate Professor</option>
									<option value="Assistant Professor" >Assistant Professor</option>
									<option value="Ad-hoc Faculty" >Ad-hoc Faculty</option>
									<option value="Visiting Faculty" >Visiting Faculty</option>
									<option value="Adjunct Faculty" >Adjunct Faculty</option>
									<option value="Others" >Others</option>
                                  </select>
					
					
					
            
                  </div>
                  </div>
                  <div class="col-sm-3">
                        
                      <div class="form-group">
                        <label>Date Of Join</label>
                        <input type="date"  class="form-control" name="doj" required pattern="\Y{4}-\m{2}-\d{2}" required>
                      
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
                            <input type="text" class="form-control" placeholder="Enter...." name="schlspec">
                          </td>     
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="school">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="yschool">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="rschool">
                          </td>
                               
                        </tr>
                         <tr>
                          <td style="width:30%">
                            <label>12th</label>
                            </td>
                                <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="hspec">
                          </td>  
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="hschool">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="hyear">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="hresult">
                          </td>
                               
                        </tr>
                         <tr>
                          <td style="width:30%">
                            <label>Diploma</label>
                            </td>
                              <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="dspec">
                          </td>    
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="sdiploma">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="ydiploma">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="rdiploma">
                          </td>
                               
                        </tr>
                         <tr>
                          <td style="width:30%">
                            <label>Bachelor Degree</label>
                            </td>
                               <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="degreespec">
                          </td>   
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="degree">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="ydegree">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="rdegree">
                          </td>
                               
                        </tr>
                         <tr>
                          <td style="width:30%">
                            <label>Master Degree</label>
                            </td>
                               <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="pgspec">
                          </td>   
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="pg">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="ypg">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="rpg">
                          </td>
                               
                        </tr>
                        <tr>
                          <td style="width:30%">
                            
                           <label>Ph.d</label>
                           <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="otherspec">
                          </td> 
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="sothers">
                          </td>
                          <td style="width:30%">
                           <input type="text" class="form-control" placeholder="Enter...." name="yothers">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="rothers">
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
                        <tr>
                          <td style="width:100%">
                            <input type="text" class="form-control" placeholder="Enter...." name="title[]">
                          </td>
                          <td style="width:30%">
                            <input type="text" class="form-control" placeholder="Enter...." name="company[]">
                          </td>
                          <td style="width:100%"><input type="date" class="form-control" placeholder="Enter ..." name="Start[]">
                          </td>
                          <td style="width:100%">
                            <input type="date" class="form-control" placeholder="Enter ..." name="end[]">
                          </td>
                          <td style="width:30%"><input type="text" class="form-control" placeholder="Enter...." name="experience[]"></td>
                           <td >
                            <button type="button" class="btn btn-info btn-sm" onclick="addWork()">
                            <i class="fas fa-plus-square"></i></button>
                          </td>
                        </tr>
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
                            <input type="file" name="profile" class="btn btn-info btn-block file">
                         </td>
                          <td >
                            <input type="file" name="resume" class="btn btn-info btn-block file">
                         </td>
                          <td >
                            <input type="text" class="form-control" placeholder="Enter...." name="pass" required>
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
             <div class="row" style=" margin-bottom: 10px">
                  <div class="col-sm-6">
                    
                      <input type="submit" class="btn btn-success" name="addemployee" value="Submit">
                  </div>
				  <div class="col-sm-6">
                  <button type="reset" class="btn btn-danger float-right"  tabindex="14"><i class="glyphicon glyphicon-repeat"></i>Reset</button>       
                     
                           
                  </div>
                </div>
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
   <script type="text/javascript">
// function checkMailStatus(){
    //alert("came");
// var email=$("#email").val();// value in field email
// $.ajax({
    // type:'post',
        // url:'checkMail.php',// put your real file name 
        // data:{email: email},
        // success:function(msg){
        // alert("email is already exist"); // your message will come here.     
        // }
 // });
// }

 </script>
</body>
</html>
