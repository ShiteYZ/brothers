<?php include('includes/navbar.php');
if(!$_SESSION['id']) {
	header('location: index.php?p=login');	
}else{
	$user = $_SESSION["id"];
	}
?>

<!------------------------------------ Dashboard Start ---------------------------------------------------------->
<div class="container-fluid">
    <div class="panel panel-default">
			<div class="panel-heading">
				<h5></h5><hr style="color:#f9b500;" />
			</div>
			<!-- /panel-heading -->
				<div class="panel-body">
					<div class="panel-body py-4">
						<!----------------- /members display dash ------------------------------------->
									<div class="row justify-content-center align-items-center h-100">
										<div class="col-12">
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-header bg-primary text-white" style="border-radius: 15px;">
														<i class="fa fa-angle-double-right"></i>	Mikopo Iliyomalizika/ Marejesho yametimia
												</div> <!--/panel-->
												<div class="card-body">
																		<!--Search box-->
																		<div class="row">
																			<div class="offset-md-2 col-md-4">
																				<form class="form-detail" name="searchform" method="POST" action="index.php?p=openptsearch" enctype="multipart/form-data">
																					<div class="input-group">
																						<input class="form-control border-end-0 border rounded-pill" type="search" value="search" id="example-search-input">
																						<span class="input-group-append">
																							<button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="button">
																								<i class="fa fa-search"></i>
																							</button>
																						</span>
																					</div>
																				</form>
																			</div>

																			<div class="col-md-2">
																				<div class="input-group">
																					<a href="index.php?p=mikopohai">
																					<button class="btn btn-outline-info rounded-pill" type="button">
																								<i class="fa fa-plus"></i> Mikopo Hai
																							</button> 
																					</a>   
																				</div>
																			</div>

																			<div class="col-md-2">
																				<div class="input-group">
																					<a href="index.php?p=mikopoiliyomalizika">
																					<button class="btn btn-outline-secondary rounded-pill" type="button">
																								<i class="fa fa-check"></i> Mikopo iliyomalizika
																							</button> 
																					</a>   
																				</div>
																			</div>

																			<div class="col-md-2">
																				<div class="input-group">
																					<a href="index.php?p=mashartiMkopo">
																					<button class="btn btn-outline-primary rounded-pill" type="button">
																								<i class="fa fa-plus"></i> Omba Mkopo
																							</button> 
																					</a>   
																				</div>
																			</div>

																		</div>
																	<!-------------------/END OF VIEW CLOSED PATIENT---------------------------->
																<div class="table-responsive">
																<table class="table table-striped">
																			<thead>
																				<th>No</th>
																				<th>Majina</th>
																				<th>Mkopo + Riba</th>
																				<th>Marejesho</th>
																				<th>Mkopo baki</th>
																				<th>Tarehe mwisho wa Marejesho</th>
																			</thead>
																			
																			<tbody>
																				<?php
																				$sql="select marejesho.rejesho_id, marejesho.mkopo_id, marejesho.jina, marejesho.mkopojumla, SUM(marejesho.rejesho) as rejesho, mkopo.tarehe_kurudisha, mkopo.hali_malipo
																				FROM marejesho
																				INNER JOIN mkopo ON marejesho.mkopo_id=mkopo.mkopo_id WHERE mkopo.hali_malipo = 2 GROUP by marejesho.mkopo_id";
																				$result=mysqli_query($connect, $sql);
																				$sNo = 1;
																				?>
																				<?php
																				while($data=mysqli_fetch_assoc($result))
																				{
																				$mkopobaki = $data["mkopojumla"] - $data["rejesho"];
																					?>
																					<tr>
																						<td><?php print $sNo; ?></td>
																						<td><a href="index.php?p=register"><?php print $data["jina"]; ?></a></td>
																						<td><?php print $data["mkopojumla"]; ?></td>
																						<td><?php print $data["rejesho"]; ?></td>
																						<td><?php print $mkopobaki; ?></td>
																						<td><?php print $data["tarehe_kurudisha"]; ?></td>
																						</tr>

																				<?php
																						$sNo++;
																					}
																				?>
																			</tbody>
																			
																</table>	
																</div>			
													</fieldset>

												</div>
											</div>
										</div>
									</div>
         				<!----------------- /members display dash ------------------------------------->
            		</div>
    			</div>
		</div>
</div>
<?php
    include('includes/scripts.php');
?>
 