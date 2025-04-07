<?php 
require("../includes/connection.php");

if(isset($_POST['xlsreport'])) {

	$sql="select * from nukuuyavikao ORDER BY tarehe ASC";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>#</th>
			<th>Gharama Matumizi</th>
			<th>Lengo</th>
			<th>Tukio/ Kikao</th>
			<th>Tarehe</th>
		</tr>

		<tr>';
		$matumizi = 0;
		$sNo=1;
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td>'.$sNo.'</td>
				<td><center>'.$result['matumizi'].'</center></td>
				<td>'.$result['nukuuMatumizi'].'</td>
				<td>'.$result['tukio'].'</td>
				<td><center>'.$result['tarehe'].'</center></td>
			</tr>';	
			$matumizi = $matumizi + $result['matumizi'];
			$sNo++;
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="1"><center>Jumla Kuu</center></td>
			<td><center>'.number_format($matumizi).'</center></td>
		</tr>
	</table>
	';	

	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=Matumizi.xls');
	echo $table;

}

?>