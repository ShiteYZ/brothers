<?php 
require_once 'includes/connection.php'; 

require('fpdf/fpdf.php'); 

session_start();
  
// Instantiate and use the FPDF class  
$pdf = new FPDF('P', 'mm', array(210,297)); 
  
//Add a new page 
$pdf->AddPage(); 
$superRef =$_POST['searchFumigClean'];
$sql1 = "select fumigation.supervisionRef, fumigation.station, fumigation.train_no, fumigation.approvalPM, fumigation.approvalPC, fumigation.Supervisor, fumigation.date, supervisors.fname, supervisors.sname
		FROM fumigation
		INNER JOIN supervisors ON fumigation.Supervisor=supervisors.supervisor_id WHERE fumigation.supervisionRef = '$superRef'";
	$result1=mysqli_query($connect, $sql1);
	$data1=mysqli_fetch_assoc($result1);

$supervisorName = $data1["fname"].' '.$data1["sname"];
$station =$data1['station'];
$trainNo =$data1['train_no'];
$dateR =$data1['date'];
$reportedby =$supervisorName;
$printedby =$_SESSION['userName'];
$PMApproval =$data1['approvalPM'];
$PCApproval =$data1['approvalPC'];

if($PMApproval == 0){
	$PMApprovalR = 'Not Approved';
}elseif($PMApproval == 1){
	$PMApprovalR = 'Approved';
}else{
	$PMApprovalR = 'Rejected';
}

if($PCApproval == 0){
	$PCApprovalR = 'Not Approved';
}elseif($PCApproval == 1){
	$PCApprovalR = 'Approved';
}else{
	$PCApprovalR = 'Rejected';
}

$pdf->Image('assets/img/tanrailbanner.jpg',0,0,210,20);  
  
// Set the font for the text 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(59,8,'',0,1); 
$pdf->Cell(190,15,'COACHES FUMIGATION REPORT',0,1, 'C'); 
$pdf->Cell(110,8,'Supervision Date:'.' '.$dateR,0,0);   
$pdf->Cell(80,8,'Supervision Reference No:'.' '.$superRef,0,1);   
$pdf->Cell(110,8,'STATION OF:'.' '.$station,0,0);  
$pdf->Cell(80,8,'TRAIN NUMBER:'.' '.$trainNo,0,1);  

///////////////////////////////OUPUT CODES//////////////////////////////////

$sql="select * from fumigation WHERE supervisionRef = '$superRef'";
	$result=mysqli_query($connect, $sql);
	$No= 1;
	while($data=mysqli_fetch_assoc($result))
	{
		
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(190,6,$No.'. '.'Coach Number'.': '.$data["coach_no"],1,1,'C');

		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(150,6,'Coaches Fumigation Status',1,0,'C');  
		$pdf->Cell(40,6,$data['fumigation'],1,1); 

		$pdf->Cell(150,6,'Application of Certified Pesticides',1,0,'C');  
		$pdf->Cell(40,6,$data['pesticides'],1,1); 

		$pdf->Cell(190,6,'',0,1,'C');

		$No++;
	}


		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(190,10,'~~~~~~~~~~~~~~',0,1,'C'); 

		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(17,5,'Reported By:',0,0); 
		$pdf->Cell(45,5,$reportedby,0,0); 

		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(17,5,'PM Approve:',0,0); 
		$pdf->Cell(45,5,$PMApprovalR,0,0); 

		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(17,5,'PC Approval:',0,0); 
		$pdf->Cell(45,5,$PCApprovalR,0,1);
		$pdf->Cell(190,10,'~~~~~~~~Thank you~~~~~~~',0,1,'C'); 

		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(190,5,'Printed By:'.' '. $printedby,0,0,'C'); 


////////////////////////////OUPUT CODES/////////////////////////////////
  

// return the generated output 
$pdf->Output()

?>


	