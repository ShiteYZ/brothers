<?php 
require("../includes/connection.php");

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "select dailycleanliness.supervisionRef, dailycleanliness.Station, dailycleanliness.Train_No, SUM(dailycleanliness.WateronArivalP) as WaterArrP, SUM(dailycleanliness.WateronArrivalT) as WaterArrT, SUM(dailycleanliness.WateronDepartureP) as WaterDepP, SUM(dailycleanliness.WateronDepartureT) as WaterDepT, dailycleanliness.approvalPM, dailycleanliness.ApprovalPC, dailycleanliness.Supervisor, dailycleanliness.Date, supervisors.fname, supervisors.sname
			FROM dailycleanliness
			INNER JOIN supervisors ON dailycleanliness.Supervisor=supervisors.supervisor_id WHERE dailycleanliness.dateFilter >= '$start_date' AND dailycleanliness.dateFilter <= '$end_date' GROUP BY dailycleanliness.supervisionRef ORDER BY dailycleanliness.Date ASC";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>No</th>
			<th>Supervision Date</th>
			<th>Supervision Reference</th>
			<th>Station</th>
			<th>Train No</th>
			<th>Water Usage (Litres)</th>
			<th>Supervisor</th>
			<th>PM Approval</th>
			<th>PC Approval</th>
		</tr>

		<tr>';
		$sNo=1;
		$waterTT = 0;
		while ($result = $query->fetch_assoc()) {
			$supervisorName = $result["fname"].' '.$result["sname"];
			$watArr = $result["WaterArrP"] + $result["WaterArrT"];
			$WatDep = $result["WaterDepP"] + $result["WaterDepT"];
			$waterUsage = $WatDep - $watArr;

			if($result["approvalPM"] == 0){
				$appr = 'Not Approved';
			}
			if($result["approvalPM"] == 1){
				$appr = 'Approved';
			}
			if($result["ApprovalPC"] == 0){
				$apprPC = 'Not Approved';
			}
			if($result["ApprovalPC"] == 1){
				$apprPC = 'Approved';
			}
			$table .= '<tr>
				<td>'.$sNo.'</td>
				<td>'.$result["Date"].'</td>
				<td>'.$result["supervisionRef"].'</td>
				<td>'.$result["Station"].'</td>
				<td><mark>'.$result["Train_No"].'</mark></td>
				<td><center>'.$waterUsage.'</center></td>
				<td>'.$supervisorName.'</td>
				<td>
					<button class="btn btn-outline-warning rounded-pill" type="button">
					 '.$appr.'
					</button>
				</td>
				<td>
					<button class="btn btn-outline-warning rounded-pill" type="button">
					 '.$apprPC.'
					</button>
				</td>
			</tr>';	
			$waterTT = $waterTT + $waterUsage ;
			$sNo++;
		}
		$table .= '
		</tr>
		<tr>
			<td colspan="5"><center>Water Usage Total</center></td>
			<td><center>'.$waterTT.'</center></td>
		</tr>
	</table>
	';	
	echo $table;

}

?>