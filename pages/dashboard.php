<?php include('includes/navbar.php') ;
date_default_timezone_set("Africa/Nairobi");
$date = date("Y");
?>
<?php
    $sql="select SUM(marejesho) AS marejesho FROM mkopo";
    $sql1="select SUM(amount) AS amount FROM ada";
    $sql2="select SUM(amount) AS amount from mfukomaendeleo";
    $result=mysqli_fetch_assoc(mysqli_query($connect, $sql));
	$mkopotl = $result["marejesho"];
    $result1=mysqli_fetch_assoc(mysqli_query($connect, $sql1));
	$adatl = $result1["amount"];
    $result2=mysqli_fetch_assoc(mysqli_query($connect, $sql2));
	$mfukotl = $result2["amount"];
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
						<!----------------- /bottom dash ------------------------------------->
						<div class="row"><!--ROW-->
							<div class="col-8">
								<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
									<!-- Testimonial Start -->
										 <div class="owl-carousel testimonial-carousel">
										 	<a href="#">
											<div class="testimonial-item bg-light rounded p-4">
												<i class="fa fa-donate fa-2x text-primary mb-3"></i>
												<h5 class="mb-1">Thamani ya Ada</h5>
												<div class="d-flex align-items-center">
													<h1 class="mb-1"><?php print number_format($adatl); ?></h1>
													<div class="ps-3">
														<small>Tshs</small>
													</div>
												</div>
											</div></a>
											<a href="#">
											<div class="testimonial-item bg-light rounded p-4">
												<i class="fa fa-hand-holding-usd fa-2x text-primary mb-3"></i>
												<h5 class="mb-1">Mfuko wa Maendeleo</h5>
												<div class="d-flex align-items-center">
													<h1 class="mb-1"><?php print number_format($mfukotl); ?></h1>
													<div class="ps-3">
														<small>Tshs</small>
													</div>
												</div>
											</div></a>
											<a href="#">
											<div class="testimonial-item bg-light rounded p-4">
												<i class="fa fa-coins fa-2x text-primary mb-3"></i>
												<h5 class="mb-1">Mikopo+Riba</h5>
												<div class="d-flex align-items-center">
													<h1 class="mb-1"><?php print number_format($mkopotl); ?></h1>
													<div class="ps-3">
														<small>Tshs</small>
													</div>
												</div>
											</div></a>
										</div>
									<!-- Testimonial End -->
								</div>
									<div class="INNER row"><!--ROW-->
										<div class="col-6 py-4">
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-body">
													<!------ADA RETRIEVAL SUMMARY------------>

																		<div class="card shadow-2-strong card-registration" style="border-radius: 15px; ">
																				<div class="card-body">
																					<div class="dateview" style= "text-align: center; font-weight: bold;">
																						<?php
																							echo "Ada kwa Mwaka"." ".$date;
																						?>
																						<div class="dropdown">
																							<button class="btn btn-info rounded-pill dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
																								<i class="fa fa-exchange"></i>
																							</button> 
																							<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
																									<?php
																										$startyear = date('Y');
																										$endyear = $startyear - 3;

																										for ($i = $endyear; $i <= $startyear; $i++){
																									?>
																											<form class="form-detail" name="searchform" method="POST" action="index.php?p=AdafinancialYearSelection" enctype="multipart/form-data">
																												<input type="hidden" name="year" class="form-control form-control-lg" value="<?php print $i; ?>" />
																												<button type="submit" name="register" class="form-control btn btn-primary rounded submit px-3">
																													<?php print $i; ?>
																												</button>
																											</form>
																									<?php
																										}
																									?>
																								
																							</ul>
																						</div>
																					</div>
																				</div>
																			</div>
																			<!-------------------End Financial Year Panel---------------------------->
																			<div class="table-responsive">
																				<table class="table table-success table-striped">
																							<tbody>
																								<?php
																								$sqlada="select month, SUM(amount) AS amount FROM ada where financial_year ='$date' GROUP by month ORDER BY `ada_id` ASC";
																								$resultada=mysqli_query($connect, $sqlada);
																								?>
																								<?php
																								while($datada=mysqli_fetch_assoc($resultada))
																								{
																									?>
																									<tr>
																										<td><?php print $datada["month"]; ?></td>
																										<td><?php print $datada["amount"]; ?></td>
																									</tr>
																								<?php
																									}
																								?>
																							</tbody>
																							
																				</table>
																		</div>
										
													<!-------END OF ADA RETRIEVAL------------>
												</div>
											</div>
										</div>

										<div class="col-6 py-4">
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-body">
													
												<!------ADA RETRIEVAL SUMMARY------------>

																	<div class="card shadow-2-strong card-registration" style="border-radius: 15px; ">
																				<div class="card-body">
																					<div class="dateview" style= "text-align: center; font-weight: bold;">
																						<?php
																							echo "Mfuko wa Maendeleo kwa Mwaka"." ".$date;
																						?>
																						<div class="dropdown">
																							<button class="btn btn-info rounded-pill dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
																								<i class="fa fa-exchange"></i>
																							</button> 
																							<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
																									<?php
																										$startyear = date('Y');
																										$endyear = $startyear - 3;

																										for ($i = $endyear; $i <= $startyear; $i++){
																									?>
																											<form class="form-detail" name="searchform" method="POST" action="index.php?p=MfukofinancialYearSelection" enctype="multipart/form-data">
																												<input type="hidden" name="year" class="form-control form-control-lg" value="<?php print $i; ?>" />
																												<button type="submit" name="register" class="form-control btn btn-primary rounded submit px-3">
																													<?php print $i; ?>
																												</button>
																											</form>
																									<?php
																										}
																									?>
																								
																							</ul>
																						</div>
																					</div>
																				</div>
																			</div>
																			<!-------------------End Financial Year Panel---------------------------->
																			<div class="table-responsive">
																				<table class="table table-success table-striped">
																							<tbody>
																								<?php
																								$sqlada="select month, SUM(amount) AS amount FROM mfukomaendeleo where financial_year ='$date' GROUP by month ORDER BY `mchango_id` ASC";
																								$resultada=mysqli_query($connect, $sqlada);
																								?>
																								<?php
																								while($datada=mysqli_fetch_assoc($resultada))
																								{
																									?>
																									<tr>
																										<td><?php print $datada["month"]; ?></td>
																										<td><?php print $datada["amount"]; ?></td>
																									</tr>
																								<?php
																									}
																								?>
																							</tbody>
																							
																				</table>
																		</div>
										
													<!-------END OF ADA RETRIEVAL------------>
													
												</div>
											</div>
										</div>
									</div>
							</div>

         					<!----------------- /bottom dash ------------------------------------->
							<!----------------- MATUKIO NEWS ------------------------------------->
							<div class="col-4">
								<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
									<div class="card-body">
										<div class="dateview" style= "text-align: center">
											<?php
												date_default_timezone_set("Africa/Nairobi");
												$datenav = date("Y-m-d");
												echo date('l', strtotime($datenav))." ".date("Y-m-d H:i:sa");
											?>
										</div>
									</div>
								</div>

								<!-- Modal -->
									<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<form class="form-detail" name="addstaffform" method="POST" action="index.php?p=rekodimatukio" enctype="multipart/form-data" onsubmit="return process();">
												<div class="modal-header">
													<h5 class="modal-title" id="staticBackdropLabel">Recodi Matukio</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
																<div class="row">

																	<div class="col-md-12 mb-12">
																	<div class="form-outline">
																			<select class="form-control" name="mwezi">
																				<?php
																					$month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");

																					foreach ($month_names as $month){
																						echo '<option value='.$month.'>'.$month.'</option>';
																					}

																				?>
																			</select>
																		<label class="form-label" for="lastName">Mwezi wa Malipo</label>
																	</div>
																	</div>

																	<div class="col-md-12 mb-12">
																	<div class="form-outline">
																		<input type="date" name="tarehe" class="form-control form-control-lg" />
																		<label class="form-label" for="tarehe">Tarehe</label>
																	</div>
																	</div>

																	<div class="col-md-12 mb-12">
																	<div class="form-outline">
																		<input type="text" name="tukio" class="form-control form-control-lg" />
																		<label class="form-label" for="tukio">Tukio</label>
																	</div>
																	</div>

																	<div class="col-md-12 mb-12">
																	<div class="form-outline">
																		<input type="text" name="eneo" class="form-control form-control-lg" />
																		<label class="form-label" for="eneo">Eneo</label>
																	</div>
																	</div>

																</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">funga</button>
													<button type="submit" name="rekodi" class="btn btn-primary rounded-pill">Recodi</button>
												</div>
											</form>
										</div>
									</div>
									</div>
								<!-- Modal -->
								 <!-- KALENDA YA MWAKA MODAL -->
								 <div class="modal fade" id="kalendayaMwaka" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="staticBackdropLabel">KALENDA YA MWAKA <?php print $date; ?></h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<table class="table table-striped">
																<thead>
																	<th></th>
																	<th>Mwezi</th>
																	<th>Tarehe</th>
																	<th>Tukio</th>
																	<th>Hali</th>
																</thead>
																<tbody>
																	<?php
																	$sql="select * from matukio where tarehe_tukio like '%$date%' ORDER by id ASC";
																	$result=mysqli_query($connect, $sql);
																	$sNo = 1;
																	?>
																	<?php
																	while($data=mysqli_fetch_assoc($result))
																	{
																		?>
																		<tr>
																			<td>
																				<?php print $sNo; ?>
																			</td>
																			<td>
																				<?php print $data["mwezi"]; ?>
																			</td>
																			<td><?php print $data["tarehe_tukio"]; ?></td>
																			<td><a href="#"><?php print $data["tukio"]; ?></a></td>
																			<td>
																				<?php
																					if($data["status"] == 0){
																				?>
																						<button class="btn btn-outline-info rounded-pill" type="button">
																							Hakijafanyika
																						</button> 
																				<?php
																					}else{
																				?>
																						<button class="btn btn-outline-primary rounded-pill" type="button">
																							Kimefanyika
																						</button> 
																				<?php
																					}
																				?>
																			</td>
																		</tr>
																	<?php
																			$sNo++;
																		}
																	?>
																</tbody>
																
													</table>	
												</div>
										</div>
									</div>
									</div>
								<!-- KALENDA YA MWAKA MODAL -->
								<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
									<div class="card-body">
											<div class="table-responsive">
												<table class="table table-striped">
															<thead>
																<th></th>
																<th>Matukio</th>
																<div class="row">
																	<div class="offset-md-0 col-md-3">
																		<div class="input-group">
																			<button class="btn btn-outline-primary rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
																				<i class="fa fa-plus"></i>
																			</button> 
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="input-group">
																			<a href="index.php?p=nukuuyavikao">
																				<button class="btn btn-outline-primary rounded-pill" type="button">
																					<i class="fa fa-edit"></i>
																				</button> 
																			</a>
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="input-group">
																			<button class="btn btn-outline-info rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#kalendayaMwaka">
																				Kalenda ya Mwaka
																			</button>   
																		</div>
																	</div>
																</div>
															</thead>
															
															<tbody>
																<?php
																$today = date("Y-m-d");
																$sql="select * from matukio WHERE status = 0 ORDER by id ASC";
																$result=mysqli_query($connect, $sql);
																$sNo = 1;
																?>
																<?php
																while($data=mysqli_fetch_assoc($result))
																{
																	?>
																	<tr>
																		<td><img
																			src="assets/img/new2.gif"
																			height="30"
																			alt="Brothers"
																			loading="lazy"/>
																		</td>
																		<td><a href="index.php?p=register"><?php print $data["tukio"]." ( ".$data["tarehe_tukio"]." )"; ?></a></td>
																	</tr>
																<?php
																		$sNo++;
																	}
																?>
															</tbody>
															
												</table>	
												</div>
										
									</div>
								</div>
							</div>
         					<!----------------- /MATUKIO NEWS ------------------------------------->
            			</div><!--END ROW-->
    			</div>
</div>

<?php
    include('includes/scripts.php');
?>
 