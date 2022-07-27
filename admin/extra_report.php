if($user_work == 'All'){
    if(isset($_POST['Export'])){

     $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $staff=$_POST['staff'];

    $result=mysqli_query($link,"SELECT * from conference where aid='$staff' ");

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
// }
if(isset($_POST['seminar'])){
 $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $staff=$_POST['staff'];

    $result=mysqli_query($link,"SELECT * from seminars where aid='$staff' ");
  
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
    $pdf->Output('demo3.pdf','I');
//    ob_end_flush();
    
}
if(isset($_POST['Exportproj'])){
// if (isset($_POST['user_work'])=='Reserch Projects'){

    $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $staff=$_POST['staff'];

    $result_proj=mysqli_query($link,"SELECT * from reserch_proj where aid='$staff'");
   
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
//    ob_end_flush();
}
// }
if(isset($_POST['Books'])){
// if (isset($_POST['user_work'])=='Reserch Projects'){

    $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $staff=$_POST['staff'];

    $result_proj=mysqli_query($link,"SELECT * from book where aid='$staff' ");
   
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
//    ob_end_flush();
}

if(isset($_POST['Papers'])){
$fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $staff=$_POST['staff'];

    $result=mysqli_query($link,"SELECT * from papers where aid='$staff' ");
    
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
//    ob_end_flush();
}
if(isset($_POST['ind_visit'])){

  $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $staff=$_POST['staff'];

    $result=mysqli_query($link,"SELECT * from ind_visit where aid='$staff' ");
    // if ($row_con = mysqli_fetch_assoc($result)) {
            // $conid = $row_con['conid'];
            // $name = $row_con['name'];
            // $attend_as = $row_con['attend_as'];
            // $type = $row_con['type'];
            // $date = $row_con['date'];
            // $event_place1 = $result['event_place'];
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