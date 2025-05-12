<?php 
require("../includes/connection.php");

if(isset($_POST['xlsreport'])) {

	$sql = "select interiorcleaning.supervisionRef, interiorcleaning.station, interiorcleaning.train_no, interiorcleaning.approvalPM, interiorcleaning.approvalPC, interiorcleaning.Supervisor, interiorcleaning.date, supervisors.fname, supervisors.sname
	FROM interiorcleaning
	INNER JOIN supervisors ON interiorcleaning.Supervisor=supervisors.supervisor_id GROUP BY interiorcleaning.supervisionRef ORDER BY interiorcleaning.date ASC";
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
			if($result["approvalPC"] == 0){
				$apprPC = 'Not Approved';
			}
			if($result["approvalPC"] == 1){
				$apprPC = 'Approved';
			}
			$table .= '<tr>
				<td>'.$sNo.'</td>
				<td>'.$result["date"].'</td>
				<td>'.$result["supervisionRef"].'</td>
				<td>'.$result["station"].'</td>
				<td><mark>'.$result["train_no"].'</mark></td>
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
	header('Content-Disposition:attachment;filename=InteriorCleanlinessReport.xls');
	echo $table;

}

?>