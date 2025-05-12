<?php include('includes/navbar.php');

if(!$_SESSION['userId']) {
	header('location: index.php?p=login');	
}else{
	$superV = $_SESSION['userId'];
	$sqlSup="SELECT jobTitle from supervisors WHERE supervisor_id='".$superV."' ";
	   $datasign=mysqli_fetch_Assoc(mysqli_query($connect,$sqlSup));
	   $JobPosition = $datasign["jobTitle"];
	}
?>

<!------------------------------------ Dashboard Start ---------------------------------------------------------->
			<!--------------------- ADD TRAIN MODEL ------------------------------->
				<!-- Modal -->
				<div class="modal fade" id="addtrain" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=AddTrainSubmit" enctype="multipart/form-data" onsubmit="return process();">
							
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Add Train</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>

								<div class="modal-body">

									<div class="row">
									
										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="text" name="train_no" class="form-control form-control-lg" placeholder="eg. E6800-01" />
											<label class="form-label" for="name">Train No</label>
										</div>
										</div>

									</div>
										
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Close</button>
									<button type="submit" name="AddTrainBtn" class="btn btn-primary rounded-pill">Register Train</button>
								</div>

						</form>
						</div>
					</div>
				</div>
				<!-- Modal -->
			<!--------------------- ADD TRAIN MODEL ------------------------------->
			<!--------------------- ADD COACH MODEL ------------------------------->
				<!-- Modal -->
				<div class="modal fade" id="addcoach" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=AddCoachSubmit" enctype="multipart/form-data" onsubmit="return process();">
							
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Add Coach</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>

							<div class="modal-body">

								<div class="row">

									<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="text" name="coach_no" class="form-control form-control-lg" placeholder="eg. BCB-K-2201" />
											<label class="form-label" for="name">Coach No</label>
										</div>
									</div>

								</div>
									
							</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Close</button>
									<button type="submit" name="AddCoachBtn" class="btn btn-primary rounded-pill">Register Coach</button>
								</div>

						</form>
						</div>
					</div>
				</div>
				<!-- Modal -->
			<!--------------------- ADD COACH MODEL ------------------------------->
			<!--------------------- ADD STATION MODEL ------------------------------->
				<!-- Modal -->
				<div class="modal fade" id="addstation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=AddStationSubmit" enctype="multipart/form-data" onsubmit="return process();">
							
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Add Station</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>

								<div class="modal-body">

									<div class="row">
									
										<div class="col-md-12 mb-12">
											<div class="form-outline">
												<input type="text" name="station_name" class="form-control form-control-lg" placeholder="eg. Dar es Salaam" />
												<label class="form-label" for="name">Station Name</label>
											</div>
										</div>

									</div>
										
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Close</button>
									<button type="submit" name="AddStationBtn" class="btn btn-primary rounded-pill">Register Station</button>
								</div>

						</form>
						</div>
					</div>
				</div>
				<!-- Modal -->
			<!--------------------- ADD STATION MODEL ------------------------------->
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
							<div class="col-12">
									<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
										<div class="card-body">
											<div class="dateview" style= "text-align: center">
												<?php
													date_default_timezone_set("Africa/Nairobi");
													$date = date("Y-m-d");
													echo date('l', strtotime($date))." ".date("Y-m-d H:i:sa");
												?>
											</div>
										</div>
									</div>
							</div>
							<div class="INNER row"><!--ROW-->
										<div class="col-md-3 py-4"><!--COL-3-->
														<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																<div class="card-header text-white" style="border-radius: 15px; background-color:#7C4746">
																		<div class="row">
																			<div class="col-md-4">
																				<i class="fa fa-angle-double-right"></i>	Trains
																			</div>
																			<?php
																				if($JobPosition == 'PM' || $JobPosition == 'Admin'){
																			?>
																			<div class="offset-md-6 col-md-2">
																				<div class="input-group">
																						<button class="btn btn rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#addtrain" style="background-color:#FFFFFF">
																							<i class="fa fa-plus"></i>
																						</button> 
																				</div>
																			</div>
																			<?php
																				}
																			?>
																		</div>
																</div>
																<div class="card-body">
																	<table class="table table-striped">
																				<tbody>
																					<?php
																					$sql="select * from train";
																					$result=mysqli_query($connect, $sql);
																					$sNo = 1;
																					?>
																					<?php
																					while($data=mysqli_fetch_assoc($result))
																					{
																						?>
																						<tr>
																							<td><?php print $sNo; ?></td>
																							<td>
																								<form class="form-detail" name="searchform" method="POST" action="#" enctype="multipart/form-data">
																									<input type="hidden" name="userId" class="form-control form-control-lg" value="<?php print $data["train_id"]; ?>" />
																									<button type="submit" name="register" class="btn btn rounded px-3">
																										<?php print $data["train_no"]; ?> <i class="fa fa-train"></i>
																									</button>
																									
																								</form>
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
										</div><!-- END OF COL-3-->

										<div class="col-md-6 py-4"><!--COL-3-->
														<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																<div class="card-header text-white" style="border-radius: 15px; background-color:#7C4746">
																		<div class="row">
																			<div class="col-md-6">
																				<i class="fa fa-angle-double-right"></i>	Coaches
																			</div>
																			<?php
																				if($JobPosition == 'PM' || $JobPosition == 'Admin'){
																			?>
																			<div class="offset-md-4 col-md-2">
																				<div class="input-group">
																						<button class="btn btn rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#addcoach" style="background-color:#FFFFFF">
																							<i class="fa fa-plus"></i>
																						</button> 
																				</div>
																			</div>
																			<?php
																				}
																			?>
																		</div>
																</div>
																<div class="card-body">
																	<table class="table table-striped">
																				<tbody>
																					<?php
																					$sql="select * from coaches";
																					$result=mysqli_query($connect, $sql);
																					$sNo = 1;
																					?>
																					<?php
																					while($data=mysqli_fetch_assoc($result))
																					{
																						?>
																						<tr>
																							<td><?php print $sNo; ?></td>
																							<td>
																								<form class="form-detail" name="searchform" method="POST" action="#" enctype="multipart/form-data">
																									<input type="hidden" name="userId" class="form-control form-control-lg" value="<?php print $data["coach_id"]; ?>" />
																									<button type="submit" name="register" class="btn btn rounded px-3">
																										<?php print $data["coach_no"]; ?> 
																									</button>
																									
																								</form>
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
										</div><!-- END OF COL-3-->

										<div class="col-md-3 py-4"><!--COL-3-->
														<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																<div class="card-header text-white" style="border-radius: 15px; background-color:#7C4746">
																		<div class="row">
																			<div class="col-md-6">
																				<i class="fa fa-angle-double-right"></i>	Stations
																			</div>
																			<?php
																				if($JobPosition == 'PM' || $JobPosition == 'Admin'){
																			?>
																			<div class="offset-md-4 col-md-2">
																				<div class="input-group">
																						<button class="btn btn rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#addstation" style="background-color:#FFFFFF">
																							<i class="fa fa-plus"></i>
																						</button> 
																				</div>
																			</div>
																			<?php
																				}
																			?>
																		</div>
																</div>
																<div class="card-body">
																	<table class="table table-striped">
																				<tbody>
																					<?php
																					$sql="select * from stations";
																					$result=mysqli_query($connect, $sql);
																					$sNo = 1;
																					?>
																					<?php
																					while($data=mysqli_fetch_assoc($result))
																					{
																						?>
																						<tr>
																							<td><?php print $sNo; ?></td>
																							<td>
																								<form class="form-detail" name="searchform" method="POST" action="#" enctype="multipart/form-data">
																									<input type="hidden" name="userId" class="form-control form-control-lg" value="<?php print $data["station_id"]; ?>" />
																									<button type="submit" name="register" class="btn btn rounded px-3">
																										<?php print $data["station_name"]; ?> <i class="fa fa-building"></i>
																									</button>
																									
																								</form>
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
										</div><!-- END OF COL-3-->

							</div><!--END OF INNER ROW-->

						</div><!--END OF ROW-->

    				</div>
				</div>
	</div>
</div>

<?php
    include('includes/scripts.php');
?>
 