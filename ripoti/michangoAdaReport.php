<?php 
require("../includes/connection.php");

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql="select members.user_id, members.fname, members.mname, members.lname, ada.amount, ada.month, ada.financial_year, ada.referencenumber, ada.date
		FROM ada
		INNER JOIN members ON ada.user_id=members.user_id WHERE ada.date >= '$start_date' AND ada.date <= '$end_date' AND ada.approval = '1' ORDER BY ada.date ASC";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>#</th>
			<th>Jina la Mwanachama</th>
			<th>Kiasi alicholipa</th>
			<th>Malipo ya Mwezi</th>
			<th>Mwaka wa Fedha</th>
			<th>Kumbukumbu No</th>
			<th>Tarehe</th>
		</tr>

		<tr>';
		$totalAmount = 0;
		$sNo=1;
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td>'.$sNo.'</td>
				<td>'.$result['fname']." ".$result['mname']." ".$result['lname'].'</td>
				<td><center>'.$result['amount'].'</center></td>
				<td><center>'.$result['month'].'</center></td>
				<td><center>'.$result['financial_year'].'</center></td>
				<td><center>'.$result['referencenumber'].'</center></td>
				<td><center>'.$result['date'].'</center></td>
			</tr>';	
			$totalAmount = $totalAmount + $result['amount'];
			$sNo++;
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="2"><center>Jumla Kuu</center></td>
			<td><center>'.$totalAmount.'</center></td>
		</tr>
	</table>
	';	
	echo $table;

}

?>