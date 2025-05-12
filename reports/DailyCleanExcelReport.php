<?php 
require("../includes/connection.php");

if(isset($_POST['xlsreport'])) {

	$sql = "select dailycleanliness.supervisionRef, dailycleanliness.Station, dailycleanliness.Train_No, dailycleanliness.approvalPM, dailycleanliness.ApprovalPC, dailycleanliness.Supervisor, dailycleanliness.Date, supervisors.fname, supervisors.sname
			FROM dailycleanliness
			INNER JOIN supervisors ON dailycleanliness.Supervisor=supervisors.supervisor_id GROUP BY dailycleanliness.supervisionRef ORDER BY dailycleanliness.Date ASC";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>No</th>
			<th>Supervision Date</th>
			<th>Supervision Reference</th>
			<th>Station</th>
			<th>Train No</th>
			<th>Supervisor</th>
			<th>PM Approval</th>
			<th>PC Approval</th>
		</tr>

		<tr>';
		$sNo=1;
		while ($result = $query->fetch_assoc()) {
			$supervisorName = $result["fname"].' '.$result["sname"];
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
			$sNo++;
		}
		$table .= '
		</tr>

	</table>
	';	

	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=DialyCleanlinessReport.xls');
	echo $table;

}

?>