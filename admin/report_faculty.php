<?php

include("config.php");
include("asession.php"); 
//$sql= "SELECT * FROM addstud WHERE sid='$session_id'";
$result=mysqli_query($link,"SELECT * FROM user WHERE aid=".$session_aid)or die('Error In Session');
$row=mysqli_fetch_array($result);
if(isset($_POST['Export'])){
    // if (isset($_POST['user_work'])=='Conference'){
     $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $staff=$_POST['staff'];
    $user_work=$_POST['user_work'];
    
    if($user_work == 'All'){
         if($fromdate=="")
        {
            echo "<script>alert('Select From Date');</script>";
        }
        elseif($todate==""){
            echo "<script>alert('Select TO Date');</script>";
        }
        else{
 $result = mysqli_query($link,
 
 "SELECT b.bookid as id,b.book_title as name,b.a_y 
			as ay,b.e_y as ey,b.typeofwork as typeofwork from book b where 
			aid='$staff' AND a_y ='$fromdate.date(Y)' AND e_y ='$todate.date(Y)'
			UNION ALL 
			
			SELECT con.conid as id ,con.name as name,
			con.a_y as ay,con.e_y as ey,con.typeofwork as typeofwork from conference con where
			aid='$staff' AND a_y ='$fromdate.date(Y)' AND e_y ='$todate.date(Y)'
			
			UNION ALL 
			
			SELECT ind.id as id ,ind.industry_name as name,ind.a_y as ay,
			ind.e_y as ey,ind.typeofwork as typeofwork from ind_visit ind where
			aid='$staff' AND a_y ='$fromdate.date(Y)' AND e_y ='$todate.date(Y)'
			
			UNION ALL 
			SELECT pap.paperid as id ,pap.title as name ,pap.a_y 
			as ay,pap.e_y as ey,pap.typeofwork as typeofwork from papers pap where
			aid='$staff' AND a_y ='$fromdate.date(Y)' AND e_y ='$todate.date(Y)' 
			
			UNION ALL 
			SELECT  res.projectid as id ,res.project_name as name ,res.a_y 
			as ay, res.e_y as ey,res.typeofwork as typeofwork from reserch_proj res where
			aid='$staff' AND a_y ='$fromdate.date(Y)' AND e_y ='$todate.date(Y)'
			
			
			UNION ALL 
			SELECT  pet.pid as id ,pet.name as name ,pet.a_y 
			as ay,pet.e_y as ey,pet.typeofwork as typeofwork from patent pet where
			aid='$staff' AND a_y ='$fromdate.date(Y)' AND e_y ='$todate.date(Y)'
			
			UNION ALL 
			SELECT  tet.tid as id ,tet.project_name as name ,tet.a_y 
			as ay,tet.e_y as ey,tet.typeofwork as typeofwork from testing tet where
			aid='$staff' AND a_y ='$fromdate.date(Y)' AND e_y ='$todate.date(Y)'
			
			
			UNION ALL 
			SELECT sem.semid as id ,sem.name as name,sem.a_y 
			as ay,sem.e_y as ey,sem.typeofwork as typeofwork from seminars sem where
			aid='$staff' AND a_y ='$fromdate.date(Y)' AND e_y ='$todate.date(Y)'
			
			
			UNION ALL 
			SELECT work.workshopid  as id ,work.name as name,work.a_y 
			as ay,work.e_y as ey,work.typeofwork as typeofwork from workshop work where
			aid='$staff' AND a_y ='$fromdate.date(Y)' AND e_y ='$todate.date(Y)'
			
			UNION ALL 
			SELECT sttp.sttpid  as id ,sttp.name as name,sttp.a_y 
			as ay,sttp.e_y as ey,sttp.typeofwork as typeofwork from sttp_fdp sttp where
			aid='$staff' AND a_y ='$fromdate.date(Y)' AND e_y ='$todate.date(Y)'
			
			
			");
  ob_start();
    require "../fpdf181/fpdf.php";
    class PDF extends FPDF
    {
        function Header()
        {
            $this->SetFont("Arial",'B',18);

            $this->Cell(194,40,"Birla Vishvakarma Mahavidyalaya",1,2);
            //  $this->Cell(194,20,"Engineering College, Vallabh Vidyanagar",1,2);
            
            // $this->Cell(194,20,"[An Autonomous Institution]",1,2);
            // $this->Cell(194,20,"Managed by Charutar Vidyamandal",1,2);

            $this->Image("../images/BVM Logo-1.png",160,11,30,30);
            $this->SetFont("Arial",'',12);
            $this->SetTextColor(30,144,255);

            $this->SetFont("Arial",'',12);
             $this->SetTextColor(30,144,255);
           
            $this->SetFillColor(255,255,255);
            $this->SetFont("Arial",'',12);
            $this->Cell(14,10,"Sr No.",1,0,'C',true);
			$this->Cell(40,10,"A_Y",1,0,'C',true);
            $this->Cell(40,10,"Type Of Work",1,0,'C',true);
            $this->Cell(100,10," Name",1,1,'C',true);
            $this->SetFont("Arial",'',10);
        }
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','','8');
            $this->Cell(10,10,'page'.$this->PageNo()."/ {pages}",0,0,'c');
        }
    }
    ini_set('display_errors', 1);
    $pdf=new PDF('P','mm','A4');
    $pdf->AliasNbPages('{pages}');
    $pdf->AddPage('P');
    $pdf->SetFillColor(255,255,255);
    $i=1;
while($row_con=mysqli_fetch_assoc($result))
    {
        $pdf->Cell(14,10,$i,1,0,$row_con['id'],true);
		$pdf->Cell(40,10,$row_con['ay'].'-' .$row_con['ey'],1,0,'C',true);
         $pdf->Cell(40,10,$row_con['typeofwork'],1,0,'C',true);
        $pdf->Cell(100,10, $row_con['name'],1,1,'C',true);
        
        $i++;
    }
    $pdf->Output('demo1.pdf','I');
}
}

elseif($user_work == 'Conference'){
    
        if($fromdate=="")
        {
            echo "<script>alert('Select From Date');</script>";
        }
        elseif($todate==""){
            echo "<script>alert('Select TO Date');</script>";
        }
        else{
    $result=mysqli_query($link,"SELECT * from conference where aid='$staff' AND date BETWEEN '$fromdate' AND '$todate'");

  ob_start();
    require "../fpdf181/fpdf.php";
    class PDF extends FPDF
    {
        function Header()
        {
            $this->SetFont("Arial",'B',18);

            $this->Cell(194,40,"Birla Vishvakarma Mahavidyalaya",1,2);
            //  $this->Cell(194,20,"Engineering College, Vallabh Vidyanagar",1,2);
            
            // $this->Cell(194,20,"[An Autonomous Institution]",1,2);
            // $this->Cell(194,20,"Managed by Charutar Vidyamandal",1,2);

            $this->Image("../images/BVM Logo-1.png",160,11,30,30);
            $this->SetFont("Arial",'',12);
            $this->SetTextColor(30,144,255);

            $this->SetFont("Arial",'',12);
             $this->SetTextColor(30,144,255);
           
            $this->SetFillColor(255,255,255);
            $this->SetFont("Arial",'',12);
            $this->Cell(14,10,"Sr No.",1,0,'C',true);
            $this->Cell(50,10," Name",1,0,'C',true);
            $this->Cell(40,10,"Attend As",1,0,'C',true);
            $this->Cell(40,10,"Type",1,0,'C',true);
            $this->Cell(50,10,"Date",1,1,'C',true);
            $this->SetFont("Arial",'',10);
        }
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','','8');
            $this->Cell(10,10,'page'.$this->PageNo()."/ {pages}",0,0,'c');
        }
    }
    ini_set('display_errors', 1);
    $pdf=new PDF('P','mm','A4');
    $pdf->AliasNbPages('{pages}');
    $pdf->AddPage('P');
    $pdf->SetFillColor(255,255,255);
    $i=1;
while($row_con=mysqli_fetch_assoc($result))
    {
        $pdf->Cell(14,10,$i,1,0,'C',true);
        $pdf->Cell(50,10, $row_con['name'],1,0,'C',true);
        $pdf->Cell(40,10,$row_con['attend_as'],1,0,'C',true);
        $pdf->Cell(40,10,$row_con['type'],1,0,'C',true);
        $pdf->Cell(50,10,$row_con['date'],1,1,'C',true);
        $i++;
    }
    $pdf->Output('demo1.pdf','I');
}
}
// }
/////////////////////////////////////////////////////////////////////////////
// if(isset($_POST['seminar'])){
 // $fromdate=$_POST['fromdate'];
 //    $todate=$_POST['todate'];
 //    $staff=$_POST['staff'];
 // $user_work=$_POST['user_work'];
//     if($user_work == 'Seminar'){
//         $result=mysqli_query($link,"SELECT * from seminars where aid='$staff' ");
  
//   ob_start();
//     require "../fpdf181/fpdf.php";
//     class PDF extends FPDF
//     {
//         function Header()
//         {
//             $this->SetFont("Arial",'B',18);

//              $this->Cell(194,40,"Birla Vishvakarma Mahavidyalaya",1,2);
//             $this->Image("../images/BVM Logo-1.png",160,11,30,30);
//             $this->SetFont("Arial",'',12);
//             $this->SetTextColor(30,144,255);

//             $this->SetFont("Arial",'',12);
//     $this->SetTextColor(30,144,255);
           
//             $this->SetFillColor(255,255,255);
//             $this->SetFont("Arial",'',12);
//             $this->Cell(14,10,"Sr No.",1,0,'C',true);
//             $this->Cell(50,10," Name",1,0,'C',true);
//             $this->Cell(40,10,"Attend As",1,0,'C',true);
//             $this->Cell(40,10,"Type",1,0,'C',true);
//             $this->Cell(50,10,"Date",1,1,'C',true);
//             $this->SetFont("Arial",'',10);
//         }
//         function Footer()
//         {
//             $this->SetY(-15);
//             $this->SetFont('Arial','','8');
//             $this->Cell(10,10,'page'.$this->PageNo()."/ {pages}",0,0,'c');
//         }
//     }
//     ini_set('display_errors', 1);
//     $pdf=new PDF('P','mm','A4');
//     $pdf->AliasNbPages('{pages}');
//     $pdf->AddPage('P');
//     $pdf->SetFillColor(255,255,255);
//     $i=1;
// while($row_con=mysqli_fetch_assoc($result))
//     {
//         $pdf->Cell(14,10,$i,1,0,'C',true);
//         $pdf->Cell(50,10, $row_con['name'],1,0,'C',true);
//         $pdf->Cell(40,10,$row_con['attend_as'],1,0,'C',true);
//         $pdf->Cell(40,10,$row_con['type'],1,0,'C',true);
//         $pdf->Cell(50,10,$row_con['date'],1,1,'C',true);
//         $i++;
//     }
//     $pdf->Output('demo3.pdf','I');
//     }
elseif($user_work == 'Seminars'){
    
        if($fromdate=="")
        {
            echo "<script>alert('Select From Date');</script>";
        }
        elseif($todate==""){
            echo "<script>alert('Select TO Date');</script>";
        }
        else{
    $result=mysqli_query($link,"SELECT * from seminars where aid='$staff' AND date BETWEEN '$fromdate' AND '$todate'");
  
  ob_start();
    require "../fpdf181/fpdf.php";
    class PDF extends FPDF
    {
        function Header()
        {
            $this->SetFont("Arial",'B',18);

             $this->Cell(194,40,"Birla Vishvakarma Mahavidyalaya",1,2);
            $this->Image("../images/BVM Logo-1.png",160,11,30,30);
            $this->SetFont("Arial",'',12);
            $this->SetTextColor(30,144,255);

            $this->SetFont("Arial",'',12);
    $this->SetTextColor(30,144,255);
           
            $this->SetFillColor(255,255,255);
            $this->SetFont("Arial",'',12);
            $this->Cell(14,10,"Sr No.",1,0,'C',true);
            $this->Cell(50,10," Name",1,0,'C',true);
            $this->Cell(40,10,"Role",1,0,'C',true);
            $this->Cell(40,10,"Type",1,0,'C',true);
            $this->Cell(50,10,"Date",1,1,'C',true);
            $this->SetFont("Arial",'',10);
        }
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','','8');
            $this->Cell(10,10,'page'.$this->PageNo()."/ {pages}",0,0,'c');
        }
    }
    ini_set('display_errors', 1);
    $pdf=new PDF('P','mm','A4');
    $pdf->AliasNbPages('{pages}');
    $pdf->AddPage('P');
    $pdf->SetFillColor(255,255,255);
    $i=1;
while($row_con=mysqli_fetch_assoc($result))
    {
        $pdf->Cell(14,10,$i,1,0,'C',true);
        $pdf->Cell(50,10, $row_con['name'],1,0,'C',true);
        $pdf->Cell(40,10,$row_con['role'],1,0,'C',true);
        $pdf->Cell(40,10,$row_con['type'],1,0,'C',true);
        $pdf->Cell(50,10,$row_con['date'],1,1,'C',true);
        $i++;
    }
    $pdf->Output('demo3.pdf','I');
//    ob_end_flush();
    
}
}
////////////////////////////////////////////////////////////////////////////////////
// if(isset($_POST['Exportproj'])){
// if (isset($_POST['user_work'])=='Reserch Projects'){

    // $fromdate=$_POST['fromdate'];
    // $todate=$_POST['todate'];
    // $staff=$_POST['staff'];
    // $user_work=$_POST['user_work'];
//     if($user_work == 'All'){
//         $result_proj=mysqli_query($link,"SELECT * from reserch_proj where aid='$staff'");
   
//   ob_start();
//     require "../fpdf181/fpdf.php";
//     class PDF extends FPDF
//     {
//         function Header()
//         {
//             $this->SetFont("Arial",'B',18);

//             $this->Cell(194,40,"Birla Vishvakarma Mahavidyalaya",1,2);
//             $this->Image("../images/BVM Logo-1.png",160,11,30,30);
//             $this->SetFont("Arial",'',12);
//             $this->SetTextColor(30,144,255);

//             $this->SetFont("Arial",'',12);
//             $this->SetTextColor(30,144,255);
           
//             $this->SetFillColor(255,255,255);
//             $this->SetFont("Arial",'',12);
//             $this->Cell(14,10,"Sr No.",1,0,'C',true);
//             $this->Cell(50,10," Name",1,0,'C',true);
//             $this->Cell(25,10,"Subject",1,0,'C',true);
//             $this->Cell(20,10,"From Date",1,0,'C',true);
//             $this->Cell(25,10,"To Date",1,0,'C',true);
//              $this->Cell(60,10,"Description",1,1,'C',true);
//             $this->SetFont("Arial",'',10);
//         }
//         function Footer()
//         {
//             $this->SetY(-15);
//             $this->SetFont('Arial','','8');
//             $this->Cell(10,10,'page'.$this->PageNo()."/ {pages}",0,0,'c');
//         }
//     }
//     ini_set('display_errors', 1);
//     $pdf=new PDF('P','mm','A4');
//     $pdf->AliasNbPages('{pages}');
//     $pdf->AddPage('P');
//     $pdf->SetFillColor(255,255,255);
//     $i=1;
// while($row_res=mysqli_fetch_assoc($result_proj))
//     {
//       $subsql=mysqli_query($link,"select * from  subjects where subid=$row_res[subid]");
//           while($row_con1=mysqli_fetch_assoc($subsql)){
//         $pdf->Cell(14,10,$i,1,0,'C',true);
//         $pdf->Cell(50,10, $row_res['name'],1,0,'C',true);
//         $pdf->Cell(25,10,$row_con1['Name'],1,0,'C',true);
//         $pdf->Cell(20,10,$row_res['fromdate'],1,0,'C',true);
//         $pdf->Cell(25,10,$row_res['todate'],1,0,'C',true);
//          $pdf->Cell(60,10,$row_res['decr'],1,1,'C',true);
//         $i++;
//     }}
//     $pdf->Output('demo2.pdf','I');
//     }
  elseif($user_work == 'Reserch Projects'){
    
        if($fromdate=="")
        {
            echo "<script>alert('Select From Date');</script>";
        }
        elseif($todate==""){
            echo "<script>alert('Select TO Date');</script>";
        }
        else{
    $result_proj=mysqli_query($link,"SELECT * from reserch_proj where aid='$staff' AND todate BETWEEN '$fromdate' AND '$todate'");
   
  ob_start();
    require "../fpdf181/fpdf.php";
    class PDF extends FPDF
    {
        function Header()
        {
            $this->SetFont("Arial",'B',18);

            $this->Cell(194,40,"Birla Vishvakarma Mahavidyalaya",1,2);
            $this->Image("../images/BVM Logo-1.png",160,11,30,30);
            $this->SetFont("Arial",'',12);
            $this->SetTextColor(30,144,255);

            $this->SetFont("Arial",'',12);
            $this->SetTextColor(30,144,255);
           
            $this->SetFillColor(255,255,255);
            $this->SetFont("Arial",'',12);
            $this->Cell(14,10,"Sr No.",1,0,'C',true);
            $this->Cell(50,10," Name",1,0,'C',true);
            $this->Cell(25,10,"Subject",1,0,'C',true);
            $this->Cell(20,10,"From Date",1,0,'C',true);
            $this->Cell(25,10,"To Date",1,0,'C',true);
             $this->Cell(60,10,"Description",1,1,'C',true);
            $this->SetFont("Arial",'',10);
        }
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','','8');
            $this->Cell(10,10,'page'.$this->PageNo()."/ {pages}",0,0,'c');
        }
    }
    ini_set('display_errors', 1);
    $pdf=new PDF('P','mm','A4');
    $pdf->AliasNbPages('{pages}');
    $pdf->AddPage('P');
    $pdf->SetFillColor(255,255,255);
    $i=1;
while($row_res=mysqli_fetch_assoc($result_proj))
    {
      $subsql=mysqli_query($link,"select * from  subjects where subid=$row_res[subid]");
          while($row_con1=mysqli_fetch_assoc($subsql)){
        $pdf->Cell(14,10,$i,1,0,'C',true);
        $pdf->Cell(50,10, $row_res['name'],1,0,'C',true);
        $pdf->Cell(25,10,$row_con1['Name'],1,0,'C',true);
        $pdf->Cell(20,10,$row_res['fromdate'],1,0,'C',true);
        $pdf->Cell(25,10,$row_res['todate'],1,0,'C',true);
         $pdf->Cell(60,10,$row_res['decr'],1,1,'C',true);
        $i++;
    }}
    $pdf->Output('demo2.pdf','I');
}
}
// }
// if(isset($_POST['Books'])){
// if (isset($_POST['user_work'])=='Reserch Projects'){

    // $fromdate=$_POST['fromdate'];
    // $todate=$_POST['todate'];
    // $staff=$_POST['staff'];
    // $user_work=$_POST['user_work'];
//     if($user_work == 'All'){
//         $result_proj=mysqli_query($link,"SELECT * from book where aid='$staff' ");
   
//   ob_start();
//     require "../fpdf181/fpdf.php";
//     class PDF extends FPDF
//     {
//         function Header()
//         {
//             $this->SetFont("Arial",'B',18);

//             $this->Cell(194,40,"Birla Vishvakarma Mahavidyalaya",1,2);
//             $this->Image("../images/BVM Logo-1.png",160,11,30,30);
//             $this->SetFont("Arial",'',12);
//             $this->SetTextColor(30,144,255);

//             $this->SetFont("Arial",'',12);
//             $this->SetTextColor(30,144,255);
           
//             $this->SetFillColor(255,255,255);
//             $this->SetFont("Arial",'',12);
//             $this->Cell(14,10,"Sr No.",1,0,'C',true);
//             $this->Cell(50,10," Name",1,0,'C',true);
//             $this->Cell(40,10,"Subject",1,0,'C',true);
//             $this->Cell(40,10,"Total Pages",1,0,'C',true);
//             $this->Cell(50,10,"Document",1,1,'C',true);
//              // $this->Cell(50,10,"Description",1,1,'C',true);
//             $this->SetFont("Arial",'',10);
//         }
//         function Footer()
//         {
//             $this->SetY(-15);
//             $this->SetFont('Arial','','8');
//             $this->Cell(10,10,'page'.$this->PageNo()."/ {pages}",0,0,'c');
//         }
//     }
//     ini_set('display_errors', 1);
//     $pdf=new PDF('P','mm','A4');
//     $pdf->AliasNbPages('{pages}');
//     $pdf->AddPage('P');
//     $pdf->SetFillColor(255,255,255);
//     $i=1;
// while($row_res=mysqli_fetch_assoc($result_proj))
//     {
//       $subsql=mysqli_query($link,"select * from  subjects where subid=$row_res[subid]");
//           while($row_con1=mysqli_fetch_assoc($subsql)){
//         $pdf->Cell(14,10,$i,1,0,'C',true);
//         $pdf->Cell(50,10, $row_res['name'],1,0,'C',true);
//         $pdf->Cell(40,10,$row_con1['Name'],1,0,'C',true);
//         $pdf->Cell(40,10,$row_res['total_pages'],1,0,'C',true);
//         $pdf->Cell(50,10,$row_res['docc'],1,1,'C',true);
//          // $pdf->Image(../Faculty/".$row1['uname']."/Seminar/".date('Y')."/". $row1['photos'] . "',160,11,30,30);
//         $i++;
//     }}
//     $pdf->Output('demo4.pdf','I');
//     }
   elseif($user_work == 'Books'){
    
        if($fromdate=="")
        {
            echo "<script>alert('Select From Date');</script>";
        }
        elseif($todate==""){
            echo "<script>alert('Select TO Date');</script>";
        }
        else{
    $result_proj=mysqli_query($link,"SELECT * from book where aid='$staff' AND created_at BETWEEN '$fromdate' AND '$todate'");
   
  ob_start();
    require "../fpdf181/fpdf.php";
    class PDF extends FPDF
    {
        function Header()
        {
            $this->SetFont("Arial",'B',18);

            $this->Cell(194,40,"Birla Vishvakarma Mahavidyalaya",1,2);
            $this->Image("../images/BVM Logo-1.png",160,11,30,30);
            $this->SetFont("Arial",'',12);
            $this->SetTextColor(30,144,255);

            $this->SetFont("Arial",'',12);
            $this->SetTextColor(30,144,255);
           
            $this->SetFillColor(255,255,255);
            $this->SetFont("Arial",'',12);
            $this->Cell(14,10,"Sr No.",1,0,'C',true);
            $this->Cell(50,10," Name",1,0,'C',true);
            $this->Cell(40,10,"Subject",1,0,'C',true);
            $this->Cell(40,10,"Total Pages",1,0,'C',true);
            $this->Cell(50,10,"Document",1,1,'C',true);
             // $this->Cell(50,10,"Description",1,1,'C',true);
            $this->SetFont("Arial",'',10);
        }
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','','8');
            $this->Cell(10,10,'page'.$this->PageNo()."/ {pages}",0,0,'c');
        }
    }
    ini_set('display_errors', 1);
    $pdf=new PDF('P','mm','A4');
    $pdf->AliasNbPages('{pages}');
    $pdf->AddPage('P');
    $pdf->SetFillColor(255,255,255);
    $i=1;
while($row_res=mysqli_fetch_assoc($result_proj))
    {
      $subsql=mysqli_query($link,"select * from  subjects where subid=$row_res[subid]");
          while($row_con1=mysqli_fetch_assoc($subsql)){
        $pdf->Cell(14,10,$i,1,0,'C',true);
        $pdf->Cell(50,10, $row_res['name'],1,0,'C',true);
        $pdf->Cell(40,10,$row_con1['Name'],1,0,'C',true);
        $pdf->Cell(40,10,$row_res['total_pages'],1,0,'C',true);
        $pdf->Cell(50,10,$row_res['docc'],1,1,'C',true);
         // $pdf->Image(../Faculty/".$row1['uname']."/Seminar/".date('Y')."/". $row1['photos'] . "',160,11,30,30);
        $i++;
    }}
    $pdf->Output('demo4.pdf','I');
}
}

// if(isset($_POST['Papers'])){
// $fromdate=$_POST['fromdate'];
//     $todate=$_POST['todate'];
//     $staff=$_POST['staff'];
// $user_work=$_POST['user_work'];
//     if($user_work == 'All'){
//          $result=mysqli_query($link,"SELECT * from papers where aid='$staff' ");
    
//   ob_start();
//     require "../fpdf181/fpdf.php";
//     class PDF extends FPDF
//     {
//         function Header()
//         {
//             $this->SetFont("Arial",'B',18);

//             $this->Cell(194,40,"Birla Vishvakarma Mahavidyalaya",1,2);
// $this->Image("../images/BVM Logo-1.png",160,11,30,30);
//             $this->SetFont("Arial",'',12);
//             $this->SetTextColor(30,144,255);

//             $this->SetFont("Arial",'',12);
//     $this->SetTextColor(30,144,255);
           
//             $this->SetFillColor(255,255,255);
//             $this->SetFont("Arial",'',12);
//             $this->Cell(14,10,"Sr No.",1,0,'C',true);
//             $this->Cell(50,10," Description",1,0,'C',true);
//             $this->Cell(40,10,"PDF",1,0,'C',true);
//             // $this->Cell(40,10,"Type",1,0,'C',true);
//             $this->Cell(50,10,"Date",1,1,'C',true);
//             $this->SetFont("Arial",'',10);
//         }
//         function Footer()
//         {
//             $this->SetY(-15);
//             $this->SetFont('Arial','','8');
//             $this->Cell(10,10,'page'.$this->PageNo()."/ {pages}",0,0,'c');
//         }
//     }
//     ini_set('display_errors', 1);
//     $pdf=new PDF('P','mm','A4');
//     $pdf->AliasNbPages('{pages}');
//     $pdf->AddPage('P');
//     $pdf->SetFillColor(255,255,255);
//     $i=1;
// while($row_con=mysqli_fetch_assoc($result))
//     {
//         $pdf->Cell(14,10,$i,1,0,'C',true);
//         $pdf->Cell(50,10, $row_con['decr'],1,0,'C',true);
//         $pdf->Cell(40,10,$row_con['pdf'],1,0,'C',true);
//         // $pdf->Cell(40,10,$row_con['type'],1,0,'C',true);
//         $pdf->Cell(50,10,$row_con['date'],1,1,'C',true);
//         $i++;
//     }
//     $pdf->Output('demo5.pdf','I');
//     }
   elseif($user_work == 'Papers'){
    
        if($fromdate=="")
        {
            echo "<script>alert('Select From Date');</script>";
        }
        elseif($todate==""){
            echo "<script>alert('Select TO Date');</script>";
        }
        else{
    $result=mysqli_query($link,"SELECT * from papers where aid='$staff' AND date BETWEEN '$fromdate' AND '$todate'");
    
  ob_start();
    require "../fpdf181/fpdf.php";
    class PDF extends FPDF
    {
        function Header()
        {
            $this->SetFont("Arial",'B',18);

            $this->Cell(194,40,"Birla Vishvakarma Mahavidyalaya",1,2);
$this->Image("../images/BVM Logo-1.png",160,11,30,30);
            $this->SetFont("Arial",'',12);
            $this->SetTextColor(30,144,255);

            $this->SetFont("Arial",'',12);
    $this->SetTextColor(30,144,255);
           
            $this->SetFillColor(255,255,255);
            $this->SetFont("Arial",'',12);
            $this->Cell(14,10,"Sr No.",1,0,'C',true);
            $this->Cell(50,10," Description",1,0,'C',true);
            $this->Cell(40,10,"PDF",1,0,'C',true);
            // $this->Cell(40,10,"Type",1,0,'C',true);
            $this->Cell(50,10,"Date",1,1,'C',true);
            $this->SetFont("Arial",'',10);
        }
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','','8');
            $this->Cell(10,10,'page'.$this->PageNo()."/ {pages}",0,0,'c');
        }
    }
    ini_set('display_errors', 1);
    $pdf=new PDF('P','mm','A4');
    $pdf->AliasNbPages('{pages}');
    $pdf->AddPage('P');
    $pdf->SetFillColor(255,255,255);
    $i=1;
while($row_con=mysqli_fetch_assoc($result))
    {
        $pdf->Cell(14,10,$i,1,0,'C',true);
        $pdf->Cell(50,10, $row_con['decr'],1,0,'C',true);
        $pdf->Cell(40,10,$row_con['pdf'],1,0,'C',true);
        // $pdf->Cell(40,10,$row_con['type'],1,0,'C',true);
        $pdf->Cell(50,10,$row_con['date'],1,1,'C',true);
        $i++;
    }
    $pdf->Output('demo5.pdf','I');
}
}
// if(isset($_POST['ind_visit'])){

  // $fromdate=$_POST['fromdate'];
  //   $todate=$_POST['todate'];
  //   $staff=$_POST['staff'];
  //   $user_work=$_POST['user_work'];
//     if($user_work == 'All'){
//         $result=mysqli_query($link,"SELECT * from ind_visit where aid='$staff' ");
    
//   ob_start();
//     require "../fpdf181/fpdf.php";
//     class PDF extends FPDF
//     {
//         function Header()
//         {
//             $this->SetFont("Arial",'B',18);

//              $this->Cell(194,40,"Birla Vishvakarma Mahavidyalaya",1,2);
// $this->Image("../images/BVM Logo-1.png",160,11,30,30);
//             $this->SetFont("Arial",'',12);
//             $this->SetTextColor(30,144,255);

//             $this->SetFont("Arial",'',12);
//     $this->SetTextColor(30,144,255);
           
//             $this->SetFillColor(255,255,255);
//             $this->SetFont("Arial",'',12);
//             $this->Cell(14,10,"Sr No.",1,0,'C',true);
//             $this->Cell(50,10," Name",1,0,'C',true);
//             $this->Cell(20,10,"City",1,0,'C',true);
//             $this->Cell(20,10,"State",1,0,'C',true);
//             $this->Cell(20,10,"Zip",1,0,'C',true);
//              $this->Cell(20,10,"Students",1,1,'C',true);
//             $this->SetFont("Arial",'',10);
//         }
//         function Footer()
//         {
//             $this->SetY(-15);
//             $this->SetFont('Arial','','8');
//             $this->Cell(10,10,'page'.$this->PageNo()."/ {pages}",0,0,'c');
//         }
//     }
//     ini_set('display_errors', 1);
//     $pdf=new PDF('P','mm','A4');
//     $pdf->AliasNbPages('{pages}');
//     $pdf->AddPage('P');
//     $pdf->SetFillColor(255,255,255);
//     $i=1;
// while($row_con=mysqli_fetch_assoc($result))
//     {
//         $pdf->Cell(14,10,$i,1,0,'C',true);
//         $pdf->Cell(50,10, $row_con['industry_name'],1,0,'C',true);
//         $pdf->Cell(20,10,$row_con['ind_city'],1,0,'C',true);
//         $pdf->Cell(20,10,$row_con['ind_state'],1,0,'C',true);
//         $pdf->Cell(20,10,$row_con['zip'],1,0,'C',true);
//          $pdf->Cell(20,10,$row_con['noofstud'],1,1,'C',true);
//         $i++;
//     }
//     $pdf->Output('demo6.pdf','I');
  
//     }
    elseif($user_work == 'Industrial Visit'){
    
        if($fromdate=="")
        {
            echo "<script>alert('Select From Date');</script>";
        }
        elseif($todate==""){
            echo "<script>alert('Select TO Date');</script>";
        }
        else{

    $result=mysqli_query($link,"SELECT * from ind_visit where aid='$staff' AND date BETWEEN '$fromdate' AND '$todate'");
    
  ob_start();
    require "../fpdf181/fpdf.php";
    class PDF extends FPDF
    {
        function Header()
        {
            $this->SetFont("Arial",'B',18);

             $this->Cell(194,40,"Birla Vishvakarma Mahavidyalaya",1,2);
$this->Image("../images/BVM Logo-1.png",160,11,30,30);
            $this->SetFont("Arial",'',12);
            $this->SetTextColor(30,144,255);

            $this->SetFont("Arial",'',12);
    $this->SetTextColor(30,144,255);
           
            $this->SetFillColor(255,255,255);
            $this->SetFont("Arial",'',12);
            $this->Cell(14,10,"Sr No.",1,0,'C',true);
            $this->Cell(50,10," Name",1,0,'C',true);
            $this->Cell(20,10,"City",1,0,'C',true);
            $this->Cell(20,10,"State",1,0,'C',true);
            $this->Cell(20,10,"Zip",1,0,'C',true);
             $this->Cell(20,10,"Students",1,1,'C',true);
            $this->SetFont("Arial",'',10);
        }
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','','8');
            $this->Cell(10,10,'page'.$this->PageNo()."/ {pages}",0,0,'c');
        }
    }
    ini_set('display_errors', 1);
    $pdf=new PDF('P','mm','A4');
    $pdf->AliasNbPages('{pages}');
    $pdf->AddPage('P');
    $pdf->SetFillColor(255,255,255);
    $i=1;
while($row_con=mysqli_fetch_assoc($result))
    {
        $pdf->Cell(14,10,$i,1,0,'C',true);
        $pdf->Cell(50,10, $row_con['industry_name'],1,0,'C',true);
        $pdf->Cell(20,10,$row_con['ind_city'],1,0,'C',true);
        $pdf->Cell(20,10,$row_con['ind_state'],1,0,'C',true);
        $pdf->Cell(20,10,$row_con['zip'],1,0,'C',true);
         $pdf->Cell(20,10,$row_con['noofstud'],1,1,'C',true);
        $i++;
    }
    $pdf->Output('demo6.pdf','I');
  }
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BRMS |Admin View Faculty Reports </title>
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
            <a href="#" class="nav-link active">
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
                <a href="report_faculty.php" class="nav-link active">
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
              <li class="breadcrumb-item active">Add Papers</li>
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
          
            <div class="col-md-10" style=" margin-left: 140px">
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Staff Reports</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data">
                <div class="row">
                 
                    <div class="col-sm-3">
                    <div class="form-group">
                      <label>From Date</label>
                      <input type="date" class="form-control" placeholder="Enter ..." name="fromdate" >
                    </div>
                </div>
                 <div class="col-sm-3">
                    <div class="form-group">
                      <label>To Date</label>
                      <input type="date" class="form-control" placeholder="Enter ..." name="todate" >
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
                                          <select class="form-control" name="did" id="did">
										  
                                      <?php
                                          while ($rowd = mysqli_fetch_assoc($result)) {
                                            
                                            $department = $rowd['department'];
                                             $did = $rowd['did'];
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
                              <label> Staff</label>
                            <?php
                             /*  $sql = "SELECT * FROM user where user_type='Faculty' AND DID='$row[did]'";
                              if($result = mysqli_query($link, $sql))
                              { */
                            ?>
                                <select class="form-control" name="staff" id="staff">
                            <?php
                               /*  while ($row = mysqli_fetch_assoc($result)) {
                                  $uname = $row['uname'];
                                    $aid=$row['aid'];
                                  echo '<option value="'.$aid.'">'.$uname.'</option>';
                                }
                                echo "</select>";
                              }
                              else
                                echo "error"; */
                                ?>
								 <option value="">Select Department first</option>
								</select>
                          </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                       <label>Select Work</label>
                           <select name="user_work" class="form-control" >
                              <!-- <option>Select </option> -->
							  <option value="All">All</option>
                              <option value="Seminars">Seminars</option>
                               <option value="Conference">Conference</option>
							   <option value="Workshop">Workshop</option>
							   <option value="STTP_FDP">STTP FDP</option>
                              <option value="Books">Books</option>
                              <option value="Industrial Visit">Industrial Visit</option>
                              <option value="Papers">Papers</option>
                              <option value="Reserch Projects">Reserch Projects</option>
							  <option value="Patent">Patent</option>
							  <option value="Testing Consultancy">Testing Consultancy</option>
                            </select>
                          </div>
                    </div>
               
              </div>
              
                <div class="row">

                  <div class="col-sm-1.2">
                    <div class="col-sm-12">
                    <input type="submit" class="btn btn-info" name="Export" value="Export">
                           
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
<script src="dist/js/demo.js"></script>
<!-- for add row in document-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#did').on('change', function(){
        var did = $(this).val();
        if(did){
			//alert(did);
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'did='+did,
                success:function(html){
                    $('#staff').html(html);
                    // $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#staff').html('<option value="">Select Department first</option>');
            // $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>
 <script>
  
  function addeng() {
  $('#eng tbody').append('<tr><td><input type="date" class="form-control" placeholder="Enter ..." name="day[]" required pattern="\Y{4}-\m{2}-\d{2}" >'+
    '</td><td><select class="form-control" name="tname[]">'+
    '<option>Select</option>'+
    '<option value="IELTS">IELTS</option>'+
    '<option value="TOFEL">TOFEL</option>'+
    '<option value="GRE">GRE</option>'+
    '<option value="GMAT">GMAT</option>'+
    '<option value"SAT>SAT</option>'+
    
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="speak[]">'+ 
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="reading[]">'+ 
    '</td>><td><input type="text" class="form-control" placeholder="Enter...." name="listen[]">'+ 
    '</select>' +  '</td><td><input type="text" class="form-control" placeholder="Enter...." name="writing[]">' +
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name=overall[]>'+ 
    '</td><td> <button type="button" class="btn btn-info btn-sm" onclick="addeng()"><i class="fas fa-plus-square"></i></button>'+ ' '+
    '<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>'+ 
    '</td></tr>');
  rowNo++;
  }
  var rowNo = 2;
  function adddoc() {

  $('#doc tbody').append('<tr><td>' + rowNo + '</td><td><input type="file" name="files[]" class="btn btn-info btn-block file" multiple>' + '</td><td> <button type="button" class="btn btn-info btn-sm" onclick="adddoc()"><i class="fas fa-plus-square"></i></button>'+' '+ '<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>'+ 
    '</td></tr>');
  rowNo++;
  }
  function addWork() {
  $('#work tbody').append('<tr><td><input type="text" class="form-control" placeholder="Enter...." name="title[]">'+'</td><td><input type="text" class="form-control" placeholder="Enter...." name="company[]">' +  '</td><td><input type="date" class="form-control" placeholder="Enter ..." name="Start[]">' + '</td><td><input type="date" class="form-control" placeholder="Enter ..." name="end[]">'+ '</td><td><input type="text" class="form-control" placeholder="Enter...." name="experience[]">'+ '</td><td><button type="button" class="btn btn-info btn-sm" onclick="addWork()"><i class="fas fa-plus-square"></i></button>'+ ' '+'<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>'+ 
    '</td></tr>');
  rowNo++;
  }
  function addAcc() {
  $('#Acc tbody').append('<tr><td><?php
                        $sql1 = "SELECT  level FROM level ";
                        if($result = mysqli_query($link, $sql1))
                        {?>
                          <select class="form-control" name="acdlevel[]"><?php
                          while ($row = mysqli_fetch_assoc($result)) {
                            $level = $row['level'];
                            echo '<option value="'.$level.'">'.$level.'</option>';
                          }
                          echo "</select>";
                        }
                        else
                          echo "error";
                          ?>
                   '+
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="sub[]">'+ 
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="uni[]">'+ 
    '</td><td><?php
                           $currently_selected = date('Y');
                           $earliest_year = 1997;
                           $latest_year = date('Y+2');?>
                          <select class="form-control" name="acdyr[]"> <?php
                           foreach ( range( $latest_year, $earliest_year ) as $i ) {
                            print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                            }
                            print '</select>';
                            ?>'+ 
    '</td><td><input type="text" class="form-control" placeholder="Enter...." name="result[]">'+ 
    '</td></td><td><select class="form-control" name="medium[]">'+
                       '<option>Select</option>'+
                       '<option value="Hindi">Hindi</option>'+
                       '<option value="English">English</option>'+
                       '</select>'+ 
    '</td><td><button type="button" class="btn btn-info btn-sm" onclick="addAcc()"><i class="fas fa-plus-square"></i></button>'+' '+
    '<button type="button" class=" delete btn btn-danger btn-sm" onclick="del()"><i class="fas fa-trash"></i></button>'+ 
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
