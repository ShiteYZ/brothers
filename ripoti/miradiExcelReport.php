<?php 
require("../includes/connection.php");

if(isset($_POST['xlsreport'])) {

	$sql="select * from miradi";
	$query = $connect->query($sql);

	$sql1="select wekezomiradi.wekezo_id, wekezomiradi.mradi_id, wekezomiradi.thamani, wekezomiradi.lengo, miradi.jina
			FROM wekezomiradi
			INNER JOIN miradi ON wekezomiradi.mradi_id=miradi.id ORDER BY wekezomiradi.tarehe ASC";
	$query1 = $connect->query($sql1);

	$table = '
	<h5> MIRADI YA KIKUNDI NA THAMANI YAKE </h5>
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>#</th>
			<th>Jina la Mradi</th>
			<th>Eneo la Mradi</th>
			<th>Thamani ya Mradi</th>
		</tr>

		<tr>';
		$thamani = 0;
		$sNo=1;
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td>'.$sNo.'</td>
				<td>'.$result['jina'].'</td>
				<td>'.$result['eneo'].'</td>
				<td><center>'.$result['thamani'].'</center></td>
			</tr>';	
			$thamani = $thamani + $result['thamani'];
			$sNo++;
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="3"><center>Total Amount</center></td>
			<td><center>'.number_format($thamani).'</center></td>
		</tr>
	</table>';

	$table .= '
	<h5> FEDHA ILIYOWEKEZWA KWENYE MIRADI </h5>
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>#</th>
			<th>Jina la Mradi</th>
			<th>Fedha iliyowekezwa</th>
			<th>Lengo</th>
		</tr>

		<tr>';
		$thamani1 = 0;
		$sNo=1;
		while ($result1 = $query1->fetch_assoc()) {
			$table .= '<tr>
				<td>'.$sNo.'</td>
				<td>'.$result1['jina'].'</td>
				<td><center>'.$result1['thamani'].'</center></td>
				<td>'.$result1['lengo'].'</td>
			</tr>';	
			$thamani1 = $thamani1 + $result1['thamani'];
			$sNo++;
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="2"><center>Jumla Kuu</center></td>
			<td><center>'.number_format($thamani1).'</center></td>
		</tr>
	</table>'
	;	

	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=Miradi.xls');
	echo $table;

}

?>