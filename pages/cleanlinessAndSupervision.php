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
<div class="container-fluid">
    <div class="panel panel-default">
			<div class="panel-heading">
				<h5></h5><hr style="color:#f9b500;" />
			</div>
			<!-- /panel-heading -->
				<div class="panel-body">
					<div class="panel-body py-4">
						<!----------------- Breadcrumb display dash ------------------------------------->
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
								<li class="breadcrumb-item"><a href="#">Tanrail</a></li>
								<li class="breadcrumb-item active" aria-current="page">Cleanliness Supervision</li>
							</ol>
						</nav>
						<!----------------- Breadcrumb display dash ------------------------------------->
									<div class="row justify-content-center align-items-center h-100">
										<div class="col-md-12">
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-body">
																		<!--Search box-->
																		<div class="row">
																			<div class="offset-md-10 col-md-2">
																				<a href="index.php?p=submitedReport">
																				<div class="input-group">
																						<button class="btn btn-outline-primary rounded-pill" type="button">
																							<i class="fa fa-plus"> Submitted Forms</i>
																						</button> 
																				</div>
																				</a>
																			</div>
																		</div>
																	<!-------------------INNER PANEL---------------------------->
																	<div class="row">
																		<div class="col-md-6 py-4"><!--COL-3-->
																			<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																					<!--CARD HEADER-->
																					<div class="card-header text-white" style="border-radius: 15px; background-color:#FFA500">
																						<i class="fa fa-angle-double-right"></i>	Select Main Activity
																					</div>
																					<!--CARD HEADER-->
																					<div class="card-body">
																						<div class="table-responsive">
																							<table class="table table-striped">
																										<h5>Main Activity</h5>
																										<tbody>
																											<?php
																											$sql="select * from mainactivities";
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
																														<form class="form-detail" name="activityform" method="POST" action="index.php?p=selectTrain" enctype="multipart/form-data">
																															<input type="hidden" name="activityid" class="form-control form-control-lg" value="<?php print $data["activity_id"]; ?>" />
																															<input type="hidden" name="activityname" class="form-control form-control-lg" value="<?php print $data["activity_name"]; ?>" />
																															<button type="submit" name="activitybtn" class="btn btn">
																																<?php print $data["activity_name"]; ?> <i class="fa fa-chevron-circle-right"></i>
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
																			</div>
																		</div><!-- END OF COL-3-->
																		<div class="col-md-6 py-4"><!--COL-3-->
																			<?php
																				if($JobPosition == 'PM' || $JobPosition == 'Admin'){
																			?>
																			<!------------------------------------------------------------ PROJECT MANAGER ------------------------------------------------------------------------------------------------------------>
																			<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																					<!--CARD HEADER-->
																					<div class="card-header text-white" style="border-radius: 15px; background-color:#FFA500">
																						<i class="fa fa-user"></i>	PROJECT MANAGER
																					</div>
																					<!--CARD HEADER-->
																					<div class="card-body">
																						<!------------------------------------------------------------ DAILY cLEANLINESS SUBMITTED REPORTS ------------------------------------------------------------------------------------------------------------>
																						<div class="table-responsive">
																							<table class="table table-striped">
																										<h5>Daily Cleanliness Submitted Reports</h5>
																										<thead>
																											<tr>
																												<th>Supervision Reference</th>
																												<th>Supervision Date</th>
																												<th>Station</th>
																												<th>Train No</th>
																											</tr>
																										</thead>
																										<tbody>
																												<?php
																												$today = date("Y-m-d");
																												$sql = "select dailycleanliness.supervisionRef, dailycleanliness.Station, dailycleanliness.Train_No, dailycleanliness.approvalPM, dailycleanliness.ApprovalPC, dailycleanliness.Supervisor, dailycleanliness.Date, supervisors.fname, supervisors.sname
																												FROM dailycleanliness
																												INNER JOIN supervisors ON dailycleanliness.Supervisor=supervisors.supervisor_id WHERE dailycleanliness.approvalPM = '0' GROUP BY dailycleanliness.supervisionRef";
																												$result=mysqli_query($connect, $sql);
																												$sNo = 1;
																												?>
																												<?php
																												while($data=mysqli_fetch_assoc($result))
																												{
																													$supervisorName = $data["fname"].' '.$data["sname"];
																													?>
																													<tr>
																														<td>
																															<form class="form-detail" name="superviewform" method="POST" action="viewsupervisionreport.php" enctype="multipart/form-data" target="_blank" >
																																<input type="hidden" name="superRef" class="form-control form-control-lg" value="<?php print $data["supervisionRef"]; ?>" />
																																<input type="hidden" name="stationN" class="form-control form-control-lg" value="<?php print $data["Station"]; ?>" />
																																<input type="hidden" name="trainN" class="form-control form-control-lg" value="<?php print $data["Train_No"]; ?>" />
																																<input type="hidden" name="supervisorR" class="form-control form-control-lg" value="<?php print $data["Supervisor"]; ?>" />
																																<input type="hidden" name="PMApproval" class="form-control form-control-lg" value="<?php print $data["approvalPM"]; ?>" />
																																<input type="hidden" name="PCApproval" class="form-control form-control-lg" value="<?php print $data["ApprovalPC"]; ?>" />
																																<input type="hidden" name="dateR" class="form-control form-control-lg" value="<?php print $data["Date"]; ?>" />
																																<input type="hidden" name="SuperName" class="form-control form-control-lg" value="<?php print $supervisorName; ?>" />
																																<button type="submit" name="viewbtn" class="btn btn">
																																  <img src="assets/img/new2.gif" height="30" alt="tanrail" loading="lazy"/> <?php print $data["supervisionRef"]; ?> <i class="fa fa-eye" style="color: #692d2c;"></i>
																																</button>
																															</form>
																														</td>
																														<td><?php print $data["Date"]; ?></td>
																														<td><?php print $data["Station"]; ?></td>
																														<td><mark>
																															<button class="btn btn rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#PMapproval<?php print $data["supervisionRef"]; ?>">
																																<?php print $data["Train_No"]; ?> <i class="fa fa-check" style="color: green;"></i>
																															</button></mark>
																														</td>
																													</tr>
																													<!---------------------PM APPROVAL ------------------------------->
																													<!-- Modal -->
																													<div class="modal fade" id="PMapproval<?php print $data["supervisionRef"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
																														<div class="modal-dialog">
																															<div class="modal-content">
																															
																															<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=DailyApprovePMSubmit" enctype="multipart/form-data" onsubmit="return process();">
																																
																																<div class="modal-header">
																																	<h5 class="modal-title" id="staticBackdropLabel" style="color: #692d2c;">Approve Report <?php print $data["supervisionRef"]; ?><br /> of <?php print $supervisorName; ?></h5>
																																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																																</div>

																																	<div class="modal-body">

																																		<div class="row">
																																		
																																			<div class="col-md-12 mb-12">
																																			<div class="form-outline">
																																				<input type="hidden" name="supervisionRef" id="supervisionRef" class="form-control form-control-lg" value="<?php print $data["supervisionRef"]; ?>"/>
																																			</div>
																																			</div>

																																		</div>
																																			
																																	</div>
																																	<div class="modal-footer">
																																		<button type="submit" name="PMApproval" class="btn btn-success rounded-pill" >Approve</button>
																																	</div>

																															</form>
																															</div>
																														</div>
																													</div>
																													<!-- Modal -->
																												<!--------------------- PM APPROVAL ------------------------------->
																												<?php
																													}
																												?>
																										</tbody>
																										
																							</table>
																						</div>
																						<!------------------------------------------------------------ DAILY cLEANLINESS SUBMITTED REPORTS ------------------------------------------------------------------------------------------------------------>
																						<!------------------------------------------------------------INTERIOR AND VACUUM CLEANING SUBMITTED REPORTS ------------------------------------------------------------------------------------------------------------>
																						<div class="table-responsive">
																							<table class="table table-striped">
																										<h5>Interior and Vacuum Cleaning Submitted Reports</h5>
																										<thead>
																											<tr>
																												<th>Supervision Reference</th>
																												<th>Supervision Date</th>
																												<th>Station</th>
																												<th>Train No</th>
																											</tr>
																										</thead>
																										<tbody>
																												<?php
																												$sqlV = "select interiorcleaning.supervisionRef, interiorcleaning.station, interiorcleaning.train_no, interiorcleaning.approvalPM, interiorcleaning.approvalPC, interiorcleaning.Supervisor, interiorcleaning.date, supervisors.fname, supervisors.sname
																												FROM interiorcleaning
																												INNER JOIN supervisors ON interiorcleaning.Supervisor=supervisors.supervisor_id WHERE interiorcleaning.approvalPM = '0' GROUP BY interiorcleaning.supervisionRef";
																												$resultV=mysqli_query($connect, $sqlV);
																												$sNo = 1;
																												?>
																												<?php
																												while($dataV=mysqli_fetch_assoc($resultV))
																												{
																													$supervisorNameV = $dataV["fname"].' '.$dataV["sname"];
																													?>
																													<tr>
																														<td>
																															<form class="form-detail" name="superviewform" method="POST" action="viewInteriorReport.php" enctype="multipart/form-data" target="_blank" >
																																<input type="hidden" name="superRef" class="form-control form-control-lg" value="<?php print $dataV["supervisionRef"]; ?>" />
																																<input type="hidden" name="stationN" class="form-control form-control-lg" value="<?php print $dataV["station"]; ?>" />
																																<input type="hidden" name="trainN" class="form-control form-control-lg" value="<?php print $dataV["train_no"]; ?>" />
																																<input type="hidden" name="supervisorR" class="form-control form-control-lg" value="<?php print $dataV["Supervisor"]; ?>" />
																																<input type="hidden" name="PMApproval" class="form-control form-control-lg" value="<?php print $dataV["approvalPM"]; ?>" />
																																<input type="hidden" name="PCApproval" class="form-control form-control-lg" value="<?php print $dataV["approvalPC"]; ?>" />
																																<input type="hidden" name="dateR" class="form-control form-control-lg" value="<?php print $dataV["date"]; ?>" />
																																<input type="hidden" name="SuperName" class="form-control form-control-lg" value="<?php print $supervisorNameV; ?>" />
																																<button type="submit" name="viewbtn" class="btn btn">
																																  <img src="assets/img/new2.gif" height="30" alt="tanrail" loading="lazy"/> <?php print $dataV["supervisionRef"]; ?> <i class="fa fa-eye" style="color: #692d2c;"></i>
																																</button>
																															</form>
																														</td>
																														<td><?php print $dataV["date"]; ?></td>
																														<td><?php print $dataV["station"]; ?></td>
																														<td><mark>
																															<button class="btn btn rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#PMapprovalV<?php print $dataV["supervisionRef"]; ?>">
																																<?php print $dataV["train_no"]; ?> <i class="fa fa-check" style="color: green;"></i>
																															</button></mark>
																														</td>
																													</tr>
																													<!---------------------PM APPROVAL ------------------------------->
																													<!-- Modal -->
																													<div class="modal fade" id="PMapprovalV<?php print $dataV["supervisionRef"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
																														<div class="modal-dialog">
																															<div class="modal-content">
																															
																															<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=VacuumApprovePMSubmit" enctype="multipart/form-data" onsubmit="return process();">
																																
																																<div class="modal-header">
																																	<h5 class="modal-title" id="staticBackdropLabel" style="color: #692d2c;">Approve Report <?php print $dataV["supervisionRef"]; ?><br /> of <?php print $supervisorNameV; ?></h5>
																																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																																</div>

																																	<div class="modal-body">

																																		<div class="row">
																																		
																																			<div class="col-md-12 mb-12">
																																			<div class="form-outline">
																																				<input type="hidden" name="supervisionRef" id="supervisionRef" class="form-control form-control-lg" value="<?php print $dataV["supervisionRef"]; ?>"/>
																																			</div>
																																			</div>

																																		</div>
																																			
																																	</div>
																																	<div class="modal-footer">
																																		<button type="submit" name="PMApprovalV" class="btn btn-success rounded-pill" >Approve</button>
																																	</div>

																															</form>
																															</div>
																														</div>
																													</div>
																													<!-- Modal -->
																												<!--------------------- PM APPROVAL ------------------------------->
																												<?php
																													}
																												?>
																										</tbody>
																										
																							</table>
																						</div>
																						<!------------------------------------------------------------ INTERIOR AND VACUUM CLEANING SUBMITTED REPORTS ------------------------------------------------------------------------------------------------------------>
																						<!-------------------------------------------------------------FUMIGATION SUBMITTED REPORTS ------------------------------------------------------------------------------------------------------------>
																						<div class="table-responsive">
																							<table class="table table-striped">
																										<h5>Fumigation Submitted Reports</h5>
																										<thead>
																											<tr>
																												<th>Supervision Reference</th>
																												<th>Supervision Date</th>
																												<th>Station</th>
																												<th>Train No</th>
																											</tr>
																										</thead>
																										<tbody>
																												<?php
																												$sqlF = "select fumigation.supervisionRef, fumigation.station, fumigation.train_no, fumigation.approvalPM, fumigation.approvalPC, fumigation.Supervisor, fumigation.date, supervisors.fname, supervisors.sname
																												FROM fumigation
																												INNER JOIN supervisors ON fumigation.Supervisor=supervisors.supervisor_id WHERE fumigation.approvalPM = '0' GROUP BY fumigation.supervisionRef";
																												$resultF=mysqli_query($connect, $sqlF);
																												?>
																												<?php
																												while($dataF=mysqli_fetch_assoc($resultF))
																												{
																													$supervisorNameF = $dataF["fname"].' '.$dataF["sname"];
																													?>
																													<tr>
																														<td>
																															<form class="form-detail" name="superviewform" method="POST" action="viewFumigationReport.php" enctype="multipart/form-data" target="_blank" >
																																<input type="hidden" name="superRef" class="form-control form-control-lg" value="<?php print $dataF["supervisionRef"]; ?>" />
																																<input type="hidden" name="stationN" class="form-control form-control-lg" value="<?php print $dataF["station"]; ?>" />
																																<input type="hidden" name="trainN" class="form-control form-control-lg" value="<?php print $dataF["train_no"]; ?>" />
																																<input type="hidden" name="supervisorR" class="form-control form-control-lg" value="<?php print $dataF["Supervisor"]; ?>" />
																																<input type="hidden" name="PMApproval" class="form-control form-control-lg" value="<?php print $dataF["approvalPM"]; ?>" />
																																<input type="hidden" name="PCApproval" class="form-control form-control-lg" value="<?php print $dataF["approvalPC"]; ?>" />
																																<input type="hidden" name="dateR" class="form-control form-control-lg" value="<?php print $dataF["date"]; ?>" />
																																<input type="hidden" name="SuperName" class="form-control form-control-lg" value="<?php print $supervisorNameF; ?>" />
																																<button type="submit" name="viewbtn" class="btn btn">
																																  <img src="assets/img/new2.gif" height="30" alt="tanrail" loading="lazy"/> <?php print $dataF["supervisionRef"]; ?> <i class="fa fa-eye" style="color: #692d2c;"></i>
																																</button>
																															</form>
																														</td>
																														<td><?php print $dataF["date"]; ?></td>
																														<td><?php print $dataF["station"]; ?></td>
																														<td><mark>
																															<button class="btn btn rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#PMapprovalF<?php print $dataF["supervisionRef"]; ?>">
																																<?php print $dataF["train_no"]; ?> <i class="fa fa-check" style="color: green;"></i>
																															</button></mark>
																														</td>
																													</tr>
																													<!---------------------PM APPROVAL ------------------------------->
																													<!-- Modal -->
																													<div class="modal fade" id="PMapprovalF<?php print $dataF["supervisionRef"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
																														<div class="modal-dialog">
																															<div class="modal-content">
																															
																															<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=FumigationApprovePMSubmit" enctype="multipart/form-data" onsubmit="return process();">
																																
																																<div class="modal-header">
																																	<h5 class="modal-title" id="staticBackdropLabel" style="color: #692d2c;">Approve Report <?php print $dataF["supervisionRef"]; ?><br /> of <?php print $supervisorNameF; ?></h5>
																																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																																</div>

																																	<div class="modal-body">

																																		<div class="row">
																																		
																																			<div class="col-md-12 mb-12">
																																			<div class="form-outline">
																																				<input type="hidden" name="supervisionRef" id="supervisionRef" class="form-control form-control-lg" value="<?php print $dataF["supervisionRef"]; ?>"/>
																																			</div>
																																			</div>

																																		</div>
																																			
																																	</div>
																																	<div class="modal-footer">
																																		<button type="submit" name="PMApprovalF" class="btn btn-success rounded-pill" >Approve</button>
																																	</div>

																															</form>
																															</div>
																														</div>
																													</div>
																													<!-- Modal -->
																												<!--------------------- PM APPROVAL ------------------------------->
																												<?php
																													}
																												?>
																										</tbody>
																										
																							</table>
																						</div>
																						<!------------------------------------------------------------FUMIGATION SUBMITTED REPORTS  ------------------------------------------------------------------------------------------------------------>
																					</div>
																			</div>
																			<!------------------------------------------------------------ PROJECT MANAGER ------------------------------------------------------------------------------------------------------------>
																			<?php
																				}
																				if($JobPosition == 'PC' || $JobPosition == 'Admin'){
																			?>
																			<!------------------------------------------------------------ PROJECT COORDINATOR ------------------------------------------------------------------------------------------------------------>
																			<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																					<!--CARD HEADER-->
																					<div class="card-header text-white" style="border-radius: 15px; background-color:#FFA500">
																						<i class="fa fa-user"></i>	PROJECT COORDINATOR
																					</div>
																					<!--CARD HEADER-->
																					<div class="card-body">
																						<!------------------------------------------------------------ DAILY cLEANLINESS SUBMITTED REPORTS ------------------------------------------------------------------------------------------------------------>
																						<div class="table-responsive">
																							<table class="table table-striped">
																										<h5>Daily Cleanliness Submitted Reports</h5>
																										<thead>
																											<tr>
																												<th>Supervision Reference</th>
																												<th>Supervision Date</th>
																												<th>Station</th>
																												<th>Train No</th>
																											</tr>
																										</thead>
																										<tbody>
																												<?php
																												$today = date("Y-m-d");
																												$sql = "select dailycleanliness.supervisionRef, dailycleanliness.Station, dailycleanliness.Train_No, dailycleanliness.approvalPM, dailycleanliness.ApprovalPC, dailycleanliness.Supervisor, dailycleanliness.Date, supervisors.fname, supervisors.sname
																												FROM dailycleanliness
																												INNER JOIN supervisors ON dailycleanliness.Supervisor=supervisors.supervisor_id WHERE dailycleanliness.approvalPM = '1' AND dailycleanliness.ApprovalPC = '0' GROUP BY dailycleanliness.supervisionRef";
																												$result=mysqli_query($connect, $sql);
																												$sNo = 1;
																												?>
																												<?php
																												while($data=mysqli_fetch_assoc($result))
																												{
																													$supervisorName = $data["fname"].' '.$data["sname"];
																													?>
																													<tr>
																														<td>
																															<form class="form-detail" name="superviewform" method="POST" action="viewsupervisionreport.php" enctype="multipart/form-data" target="_blank" >
																																<input type="hidden" name="superRef" class="form-control form-control-lg" value="<?php print $data["supervisionRef"]; ?>" />
																																<input type="hidden" name="stationN" class="form-control form-control-lg" value="<?php print $data["Station"]; ?>" />
																																<input type="hidden" name="trainN" class="form-control form-control-lg" value="<?php print $data["Train_No"]; ?>" />
																																<input type="hidden" name="supervisorR" class="form-control form-control-lg" value="<?php print $data["Supervisor"]; ?>" />
																																<input type="hidden" name="PMApproval" class="form-control form-control-lg" value="<?php print $data["approvalPM"]; ?>" />
																																<input type="hidden" name="PCApproval" class="form-control form-control-lg" value="<?php print $data["ApprovalPC"]; ?>" />
																																<input type="hidden" name="dateR" class="form-control form-control-lg" value="<?php print $data["Date"]; ?>" />
																																<input type="hidden" name="SuperName" class="form-control form-control-lg" value="<?php print $supervisorName; ?>" />
																																<button type="submit" name="viewbtn" class="btn btn">
																																  <img src="assets/img/new2.gif" height="30" alt="tanrail" loading="lazy"/> <?php print $data["supervisionRef"]; ?> <i class="fa fa-eye" style="color: #692d2c;"></i>
																																</button>
																															</form>
																														</td>
																														<td><?php print $data["Date"]; ?></td>
																														<td><?php print $data["Station"]; ?></td>
																														<td><mark>
																															<button class="btn btn rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#PCapproval<?php print $data["supervisionRef"]; ?>">
																																<?php print $data["Train_No"]; ?> <i class="fa fa-check" style="color: green;"></i>
																															</button></mark>
																														</td>
																													</tr>
																													<!---------------------PM APPROVAL ------------------------------->
																													<!-- Modal -->
																													<div class="modal fade" id="PCapproval<?php print $data["supervisionRef"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
																														<div class="modal-dialog">
																															<div class="modal-content">
																															
																															<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=DailyApprovePCSubmit" enctype="multipart/form-data" onsubmit="return process();">
																																
																																<div class="modal-header">
																																	<h5 class="modal-title" id="staticBackdropLabel" style="color: #692d2c;">Approve Report <?php print $data["supervisionRef"]; ?><br /> of <?php print $supervisorName; ?></h5>
																																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																																</div>

																																	<div class="modal-body">

																																		<div class="row">
																																		
																																			<div class="col-md-12 mb-12">
																																			<div class="form-outline">
																																				<input type="hidden" name="supervisionRef" id="supervisionRef" class="form-control form-control-lg" value="<?php print $data["supervisionRef"]; ?>"/>
																																			</div>
																																			</div>

																																		</div>
																																			
																																	</div>
																																	<div class="modal-footer">
																																		<button type="submit" name="PCApproval" class="btn btn-success rounded-pill" >Approve</button>
																																	</div>

																															</form>
																															</div>
																														</div>
																													</div>
																													<!-- Modal -->
																												<!--------------------- PM APPROVAL ------------------------------->
																												<?php
																													}
																												?>
																										</tbody>
																										
																							</table>
																						</div>
																						<!------------------------------------------------------------ DAILY cLEANLINESS SUBMITTED REPORTS ------------------------------------------------------------------------------------------------------------>
																						<!------------------------------------------------------------INTERIOR AND VACUUM CLEANING SUBMITTED REPORTS ------------------------------------------------------------------------------------------------------------>
																						<div class="table-responsive">
																							<table class="table table-striped">
																										<h5>Interior and Vacuum Cleaning Submitted Reports</h5>
																										<thead>
																											<tr>
																												<th>Supervision Reference</th>
																												<th>Supervision Date</th>
																												<th>Station</th>
																												<th>Train No</th>
																											</tr>
																										</thead>
																										<tbody>
																												<?php
																												$sqlV = "select interiorcleaning.supervisionRef, interiorcleaning.station, interiorcleaning.train_no, interiorcleaning.approvalPM, interiorcleaning.approvalPC, interiorcleaning.Supervisor, interiorcleaning.date, supervisors.fname, supervisors.sname
																												FROM interiorcleaning
																												INNER JOIN supervisors ON interiorcleaning.Supervisor=supervisors.supervisor_id WHERE interiorcleaning.approvalPM = '1' AND interiorcleaning.approvalPC = '0' GROUP BY interiorcleaning.supervisionRef";
																												$resultV=mysqli_query($connect, $sqlV);
																												$sNo = 1;
																												?>
																												<?php
																												while($dataV=mysqli_fetch_assoc($resultV))
																												{
																													$supervisorNameV = $dataV["fname"].' '.$dataV["sname"];
																													?>
																													<tr>
																														<td>
																															<form class="form-detail" name="superviewform" method="POST" action="viewInteriorReport.php" enctype="multipart/form-data" target="_blank" >
																																<input type="hidden" name="superRef" class="form-control form-control-lg" value="<?php print $dataV["supervisionRef"]; ?>" />
																																<input type="hidden" name="stationN" class="form-control form-control-lg" value="<?php print $dataV["station"]; ?>" />
																																<input type="hidden" name="trainN" class="form-control form-control-lg" value="<?php print $dataV["train_no"]; ?>" />
																																<input type="hidden" name="supervisorR" class="form-control form-control-lg" value="<?php print $dataV["Supervisor"]; ?>" />
																																<input type="hidden" name="PMApproval" class="form-control form-control-lg" value="<?php print $dataV["approvalPM"]; ?>" />
																																<input type="hidden" name="PCApproval" class="form-control form-control-lg" value="<?php print $dataV["approvalPC"]; ?>" />
																																<input type="hidden" name="dateR" class="form-control form-control-lg" value="<?php print $dataV["date"]; ?>" />
																																<input type="hidden" name="SuperName" class="form-control form-control-lg" value="<?php print $supervisorNameV; ?>" />
																																<button type="submit" name="viewbtn" class="btn btn">
																																  <img src="assets/img/new2.gif" height="30" alt="tanrail" loading="lazy"/> <?php print $dataV["supervisionRef"]; ?> <i class="fa fa-eye" style="color: #692d2c;"></i>
																																</button>
																															</form>
																														</td>
																														<td><?php print $dataV["date"]; ?></td>
																														<td><?php print $dataV["station"]; ?></td>
																														<td><mark>
																															<button class="btn btn rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#PCapprovalV<?php print $dataV["supervisionRef"]; ?>">
																																<?php print $dataV["train_no"]; ?> <i class="fa fa-check" style="color: green;"></i>
																															</button></mark>
																														</td>
																													</tr>
																													<!---------------------PM APPROVAL ------------------------------->
																													<!-- Modal -->
																													<div class="modal fade" id="PCapprovalV<?php print $dataV["supervisionRef"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
																														<div class="modal-dialog">
																															<div class="modal-content">
																															
																															<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=VacuumApprovePCSubmit" enctype="multipart/form-data" onsubmit="return process();">
																																
																																<div class="modal-header">
																																	<h5 class="modal-title" id="staticBackdropLabel" style="color: #692d2c;">Approve Report <?php print $dataV["supervisionRef"]; ?><br /> of <?php print $supervisorNameV; ?></h5>
																																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																																</div>

																																	<div class="modal-body">

																																		<div class="row">
																																		
																																			<div class="col-md-12 mb-12">
																																			<div class="form-outline">
																																				<input type="hidden" name="supervisionRef" id="supervisionRef" class="form-control form-control-lg" value="<?php print $dataV["supervisionRef"]; ?>"/>
																																			</div>
																																			</div>

																																		</div>
																																			
																																	</div>
																																	<div class="modal-footer">
																																		<button type="submit" name="PCApprovalV" class="btn btn-success rounded-pill" >Approve</button>
																																	</div>

																															</form>
																															</div>
																														</div>
																													</div>
																													<!-- Modal -->
																												<!--------------------- PM APPROVAL ------------------------------->
																												<?php
																													}
																												?>
																										</tbody>
																										
																							</table>
																						</div>
																						<!------------------------------------------------------------ INTERIOR AND VACUUM CLEANING SUBMITTED REPORTS ------------------------------------------------------------------------------------------------------------>
																						<!-------------------------------------------------------------FUMIGATION SUBMITTED REPORTS ------------------------------------------------------------------------------------------------------------>
																						<div class="table-responsive">
																							<table class="table table-striped">
																										<h5>Fumigation Submitted Reports</h5>
																										<thead>
																											<tr>
																												<th>Supervision Reference</th>
																												<th>Supervision Date</th>
																												<th>Station</th>
																												<th>Train No</th>
																											</tr>
																										</thead>
																										<tbody>
																												<?php
																												$sqlF = "select fumigation.supervisionRef, fumigation.station, fumigation.train_no, fumigation.approvalPM, fumigation.approvalPC, fumigation.Supervisor, fumigation.date, supervisors.fname, supervisors.sname
																												FROM fumigation
																												INNER JOIN supervisors ON fumigation.Supervisor=supervisors.supervisor_id WHERE fumigation.approvalPM = '1' AND fumigation.approvalPC = '0' GROUP BY fumigation.supervisionRef";
																												$resultF=mysqli_query($connect, $sqlF);
																												?>
																												<?php
																												while($dataF=mysqli_fetch_assoc($resultF))
																												{
																													$supervisorNameF = $dataF["fname"].' '.$dataF["sname"];
																													?>
																													<tr>
																														<td>
																															<form class="form-detail" name="superviewform" method="POST" action="viewFumigationReport.php" enctype="multipart/form-data" target="_blank" >
																																<input type="hidden" name="superRef" class="form-control form-control-lg" value="<?php print $dataF["supervisionRef"]; ?>" />
																																<input type="hidden" name="stationN" class="form-control form-control-lg" value="<?php print $dataF["station"]; ?>" />
																																<input type="hidden" name="trainN" class="form-control form-control-lg" value="<?php print $dataF["train_no"]; ?>" />
																																<input type="hidden" name="supervisorR" class="form-control form-control-lg" value="<?php print $dataF["Supervisor"]; ?>" />
																																<input type="hidden" name="PMApproval" class="form-control form-control-lg" value="<?php print $dataF["approvalPM"]; ?>" />
																																<input type="hidden" name="PCApproval" class="form-control form-control-lg" value="<?php print $dataF["approvalPC"]; ?>" />
																																<input type="hidden" name="dateR" class="form-control form-control-lg" value="<?php print $dataF["date"]; ?>" />
																																<input type="hidden" name="SuperName" class="form-control form-control-lg" value="<?php print $supervisorNameF; ?>" />
																																<button type="submit" name="viewbtn" class="btn btn">
																																  <img src="assets/img/new2.gif" height="30" alt="tanrail" loading="lazy"/> <?php print $dataF["supervisionRef"]; ?> <i class="fa fa-eye" style="color: #692d2c;"></i>
																																</button>
																															</form>
																														</td>
																														<td><?php print $dataF["date"]; ?></td>
																														<td><?php print $dataF["station"]; ?></td>
																														<td><mark>
																															<button class="btn btn rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#PCapprovalF<?php print $dataF["supervisionRef"]; ?>">
																																<?php print $dataF["train_no"]; ?> <i class="fa fa-check" style="color: green;"></i>
																															</button></mark>
																														</td>
																													</tr>
																													<!---------------------PM APPROVAL ------------------------------->
																													<!-- Modal -->
																													<div class="modal fade" id="PCapprovalF<?php print $dataF["supervisionRef"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
																														<div class="modal-dialog">
																															<div class="modal-content">
																															
																															<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=FumigationApprovePCSubmit" enctype="multipart/form-data" onsubmit="return process();">
																																
																																<div class="modal-header">
																																	<h5 class="modal-title" id="staticBackdropLabel" style="color: #692d2c;">Approve Report <?php print $dataF["supervisionRef"]; ?><br /> of <?php print $supervisorNameF; ?></h5>
																																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																																</div>

																																	<div class="modal-body">

																																		<div class="row">
																																		
																																			<div class="col-md-12 mb-12">
																																			<div class="form-outline">
																																				<input type="hidden" name="supervisionRef" id="supervisionRef" class="form-control form-control-lg" value="<?php print $dataF["supervisionRef"]; ?>"/>
																																			</div>
																																			</div>

																																		</div>
																																			
																																	</div>
																																	<div class="modal-footer">
																																		<button type="submit" name="PCApprovalF" class="btn btn-success rounded-pill" >Approve</button>
																																	</div>

																															</form>
																															</div>
																														</div>
																													</div>
																													<!-- Modal -->
																												<!--------------------- PM APPROVAL ------------------------------->
																												<?php
																													}
																												?>
																										</tbody>
																										
																							</table>
																						</div>
																						<!------------------------------------------------------------FUMIGATION SUBMITTED REPORTS  ------------------------------------------------------------------------------------------------------------>
																					</div>
																			</div>
																			<!------------------------------------------------------------ PROJECT COORDINATOR ------------------------------------------------------------------------------------------------------------>
																			<?php
																				}
																			?>
																		</div><!-- END OF COL-3-->
																		</div>
																	<!-------------------INNER PANEL---------------------------->
																
																		
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
 