<?php 
require("../includes/connection.php");

if($_POST) {

	$startDate = $_POST['startDateMk'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDateMk'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql="select marejesho.rejesho_id, marejesho.mkopo_id, marejesho.jina, marejesho.mkopojumla, SUM(marejesho.rejesho) as rejesho, mkopo.kiasi_mkopo, mkopo.tarehe_kurudisha, mkopo.hali_malipo
			FROM marejesho
			INNER JOIN mkopo ON marejesho.mkopo_id=mkopo.mkopo_id WHERE mkopo.tarehe >= '$start_date' AND mkopo.tarehe <= '$end_date' AND mkopo.hali_malipo = 1 OR mkopo.hali_malipo = 2 GROUP by marejesho.mkopo_id ORDER BY mkopo.tarehe ASC";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>#</th>
			<th>Jina la Mwanachama</th>
			<th>Kiasi alichokopa</th>
			<th>Mkopo + Riba</th>
			<th>Kiasi alichorejesha</th>
			<th>Mkopo baki</th>
			<th>Tarehe Mwisho wa Rejesho</th>
		</tr>

		<tr>';
		$kiasimkopo = 0;
		$mkopojumla = 0;
		$kiasirejesho = 0;
		$kiasibaki = 0;
		$sNo=1;
		while ($result = $query->fetch_assoc()) {
			$mkopobaki = $result["mkopojumla"] - $result["rejesho"];
			$table .= '<tr>
				<td>'.$sNo.'</td>
				<td>'.$result['jina'].'</td>
				<td><center>'.$result['kiasi_mkopo'].'</center></td>
				<td><center>'.$result['mkopojumla'].'</center></td>
				<td><center>'.$result['rejesho'].'</center></td>
				<td><center>'.$mkopobaki.'</center></td>
				<td><center>'.$result['tarehe_kurudisha'].'</center></td>
			</tr>';	
			$kiasimkopo = $kiasimkopo + $result['kiasi_mkopo'];
			$mkopojumla = $mkopojumla + $result['mkopojumla'];
			$kiasirejesho = $kiasirejesho + $result['rejesho'];
			$kiasibaki = $kiasibaki + $mkopobaki;
			$sNo++;
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="2"><center>Jumla Kuu</center></td>
			<td><center>'.number_format($kiasimkopo).'</center></td>
			<td><center>'.number_format($mkopojumla).'</center></td>
			<td><center>'.number_format($kiasirejesho).'</center></td>
			<td><center>'.number_format($kiasibaki).'</center></td>
		</tr>
	</table>
	';	

	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=Mikopo.xls');
	echo $table;

}

?>