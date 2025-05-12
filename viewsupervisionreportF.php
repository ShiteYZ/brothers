<?php 
require_once 'includes/connection.php'; 

require('fpdf/fpdf.php'); 

session_start();
  
// Instantiate and use the FPDF class  
$pdf = new FPDF('P', 'mm', array(210,297)); 
  
//Add a new page 
$pdf->AddPage(); 
$superRef =$_POST['searchDailyClean'];

$sql1 = "select dailycleanliness.supervisionRef, dailycleanliness.Station, dailycleanliness.Train_No, dailycleanliness.approvalPM, dailycleanliness.ApprovalPC, dailycleanliness.Supervisor, dailycleanliness.Date, supervisors.fname, supervisors.sname
	FROM dailycleanliness
	INNER JOIN supervisors ON dailycleanliness.Supervisor=supervisors.supervisor_id WHERE dailycleanliness.supervisionRef = '$superRef'";
	$result1=mysqli_query($connect, $sql1);
	$data1=mysqli_fetch_assoc($result1);

$supervisorName = $data1["fname"].' '.$data1["sname"];
$station =$data1['Station'];
$trainNo =$data1['Train_No'];
$dateR =$data1['Date'];
$reportedby =$supervisorName;
$printedby =$_SESSION['userName'];
$PMApproval =$data1['approvalPM'];
$PCApproval =$data1['ApprovalPC'];

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
$pdf->Cell(190,15,'DAILY CLEANLINESS REPORT',0,1, 'C'); 
$pdf->Cell(110,8,'Supervision Date:'.' '.$dateR,0,0);   
$pdf->Cell(80,8,'Supervision Reference No:'.' '.$superRef,0,1);   
$pdf->Cell(110,8,'STATION OF:'.' '.$station,0,0);  
$pdf->Cell(80,8,'TRAIN NUMBER:'.' '.$trainNo,0,1);  

///////////////////////////////OUPUT CODES//////////////////////////////////

$sql="select * from dailycleanliness WHERE supervisionRef = '$superRef'";
	$result=mysqli_query($connect, $sql);
	$No= 1;
	while($data=mysqli_fetch_assoc($result))
	{
		
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(190,6,$No.'. '.'Coach Number'.': '.$data["Coach_No"],1,1,'C');

		$pdf->SetFont('Arial', '', 8);
		$pdf->Cell(60,6,'Hand Wash provision',1,0,'C');  
		$pdf->Cell(32,6,$data['Hand_Wash'],1,0,'C'); 
		$pdf->Cell(6,6,'',0,0,'C');  
		$pdf->Cell(60,6,'Tissue/ Paper Towel',1,0,'C'); 
		$pdf->Cell(32,6,$data['Tissue'],1,1,'C');

		$pdf->Cell(60,6,'Window Cleaning',1,0,'C');  
		$pdf->Cell(32,6,$data['WindowCleaning'],1,0,'C'); 
		$pdf->Cell(6,6,'',0,0,'C');  
		$pdf->Cell(60,6,'Floor Cleaning',1,0,'C'); 
		$pdf->Cell(32,6,$data['FloorCleaning'],1,1,'C');

		$pdf->Cell(60,6,'Seats Cleaning',1,0,'C');  
		$pdf->Cell(32,6,$data['SeatCleaning'],1,0,'C'); 
		$pdf->Cell(6,6,'',0,0,'C');  
		$pdf->Cell(60,6,'Tables Cleaning',1,0,'C'); 
		$pdf->Cell(32,6,$data['TableCleaning'],1,1,'C');

		$pdf->Cell(60,6,'Detergents Application',1,0,'C');  
		$pdf->Cell(32,6,$data['Detergents'],1,0,'C'); 
		$pdf->Cell(6,6,'',0,0,'C');  
		$pdf->Cell(60,6,'Window Glass Cleaning',1,0,'C'); 
		$pdf->Cell(32,6,$data['GlassCleaning'],1,1,'C');

		$pdf->Cell(60,6,'Door Rubber Cleaning',1,0,'C');  
		$pdf->Cell(32,6,$data['DoorCleaning'],1,0,'C'); 
		$pdf->Cell(6,6,'',0,0,'C');  
		$pdf->Cell(60,6,'Diaphragm Cleaning',1,0,'C'); 
		$pdf->Cell(32,6,$data['Diaphragm'],1,1,'C');

		$pdf->Cell(60,6,'Luggage Carries Cleaned',1,0,'C');  
		$pdf->Cell(32,6,$data['CarrierCleaning'],1,0,'C'); 
		$pdf->Cell(6,6,'',0,0,'C');  
		$pdf->Cell(60,6,'AC Poles Cleaning',1,0,'C'); 
		$pdf->Cell(32,6,$data['ACpoles'],1,1,'C');

		$pdf->Cell(60,6,'Sanitary Bin Provision',1,0,'C');  
		$pdf->Cell(32,6,$data['SanitaryBinProvision'],1,0,'C'); 
		$pdf->Cell(6,6,'',0,0,'C');  
		$pdf->Cell(60,6,'Sanitary Bin Emptied',1,0,'C'); 
		$pdf->Cell(32,6,$data['BinEmpties'],1,1,'C');

		$pdf->Cell(60,6,'Sanitary Bin Cleaned',1,0,'C');  
		$pdf->Cell(32,6,$data['BinCleaned'],1,0,'C'); 
		$pdf->Cell(6,6,'',0,0,'C');  
		$pdf->Cell(60,6,'Plastic Bags Provision',1,0,'C'); 
		$pdf->Cell(32,6,$data['BagsProvision'],1,1,'C');

		$pdf->Cell(60,6,'Exterior Cleaning',1,0,'C');  
		$pdf->Cell(32,6,$data['ExteriorCleaning'],1,0,'C'); 
		$pdf->Cell(6,6,'',0,0,'C');  
		$pdf->Cell(60,6,'Decantation of Coaches',1,0,'C'); 
		$pdf->Cell(32,6,$data['Decantation'],1,1,'C');

		$pdf->Cell(60,6,'Flashing Decanted Tanks',1,0,'C');  
		$pdf->Cell(32,6,$data['FlashingDecanted'],1,0,'C'); 
		$pdf->Cell(6,6,'',0,0,'C');  
		$pdf->Cell(60,6,'Storage Tank Exterior',1,0,'C'); 
		$pdf->Cell(32,6,$data['TankExteriorCleaning'],1,1,'C');

		$pdf->Cell(60,6,'Tank A (P) on Arrival',1,0,'C');  
		$pdf->Cell(32,6,$data['WateronArivalP'],1,0,'C'); 
		$pdf->Cell(6,6,'',0,0,'C');  
		$pdf->Cell(60,6,'Tank B (T) on Arrival',1,0,'C'); 
		$pdf->Cell(32,6,$data['WateronArrivalT'],1,1,'C');

		$pdf->Cell(60,6,'Tank A (P) on Departure',1,0,'C');  
		$pdf->Cell(32,6,$data['WateronDepartureP'],1,0,'C'); 
		$pdf->Cell(6,6,'',0,0,'C');  
		$pdf->Cell(60,6,'Tank B (T) on Departure',1,0,'C'); 
		$pdf->Cell(32,6,$data['WateronDepartureT'],1,1,'C');

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


	