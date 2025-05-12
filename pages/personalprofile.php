<?php include('includes/navbar.php');
if(!$_SESSION['userId']) {
	header('location: index.php?p=login');	
}else{
	$wasifuid = $_SESSION['userId'];
	}
?>
<h5></h5><hr style="color:#f9b500;" />

<div class="container-fluid">
    <div class="panel panel-default">
			<div class="panel-heading">
				<h5></h5>
			</div>
			<!--------------------- CHANGE PASSWORD MODEL ------------------------------->
				<!-- Modal -->
				<div class="modal fade" id="changepassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<?php
							$sql="select * from supervisors WHERE supervisor_id = '$wasifuid' ";
							$result=mysqli_query($connect, $sql);
						?>
						<?php
							while($data=mysqli_fetch_assoc($result))
							{
						?>
						<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=badilipassword" enctype="multipart/form-data" onsubmit="return process();">
							
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Badili Password(NYWILA)</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>

								<div class="modal-body">

									<div class="row">
									
										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="hidden" name="userid" id="userid" class="form-control form-control-lg" value="<?php print $data["supervisor_id"]; ?>"/>
											<input type="text" name="loginname" class="form-control form-control-lg" value="<?php print $data["username"]; ?>"readonly/>
											<label class="form-label" for="name">Jina la Mtumiaji</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="password" name="password" class="form-control form-control-lg" />
											<label class="form-label" for="contact">Password Mpya(Nywila)</label>
										</div>
										</div>

									</div>
										
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Close</button>
									<button type="submit" name="badilipasswordSubmit" class="btn btn-primary rounded-pill">Badili Nywila</button>
								</div>

						</form>
						<?php
							}
						?>
						</div>
					</div>
				</div>
				<!-- Modal -->
			<!--------------------- CHANGE PASSWORD MODEL ------------------------------->
			<?php
				$sql="select * from supervisors WHERE supervisor_id = '$wasifuid' ";
				$result=mysqli_query($connect, $sql);
				while($data=mysqli_fetch_assoc($result))
				{
					$dateOfBirth = $data["dob"];
					$today = date("Y-m-d");
					$diff = date_diff(date_create($dateOfBirth), date_create($today));
					?>
			<!-- /panel-heading -->
				<div class="panel-body">
					<div class="panel-body py-4">
						<!----------------- /personal detail Filter dash ------------------------------------->
						<div class="row justify-content-center align-items-center h-100">
							<div class="col-10">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
										<li class="breadcrumb-item"><a href="#">Tanrail</a></li>
										<li class="breadcrumb-item active" aria-current="page">Personal Details</li>
									</ol>
								</nav>
								<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
									<div class="card-header bg-default" style="border-radius: 15px;">
											<div class="row">
													<div class="col-md-4">
														<i class="fa fa-angle-double-right"></i>	Personal Details
													</div>
													<div class="offset-md-5 col-md-3">
														<div class="input-group">
																<button class="btn btn-success rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#changepassword">
																	<i class="fa fa-edit"></i> Change Password
																</button> 
														</div>
													</div>
											</div>
									</div> <!--/card header-->
									<div class="card-body">
										<!--PREVIEW CONTRACT DETAILS-->
									<table class="table table-striped">
                                    	<tbody>
											<tr><td style="width:150px;font-weight:bold;">Majina Kamili:</td><td style="width:600px;"> <?php print $data["fname"]." ".$data["lname"]." ".$data["sname"]; ?></td></tr>
											<tr><td style="width:150px;font-weight:bold;">Jinsia: </td><td><?php print $data["gender"]; ?></td></tr>
											<tr><td style="width:150px;font-weight:bold;">Miaka: </td><td><?php print $diff->format('%y'); ?></td></tr>
											<tr><td style="width:150px;font-weight:bold;">Barua Pepe: </td><td><?php print $data["email"]; ?></td></tr>
											<tr><td style="width:150px;font-weight:bold;">Simu: </td><td><?php print $data["contact"]; ?></td></tr>
											<tr><td style="width:150px;font-weight:bold;">Station:</td><td><?php print $data["station"]; ?></td></tr>
                                        
                                      	</tbody>
                                  </table> 
			<?php
				}
			?>
											<!--------------------------------------DAILY cLEANLINESS PANEL----------------------------------------->	
											<div class="card" style="border-radius: 15px;">
													<div class="card-header text-white" style="border-radius: 15px; background-color: #FFA500">
														<div class="row">
																<div class="col-md-6">
																	<i class="fa fa-angle-double-right"></i>	My Daily Cleanliness Submitted Reports
																</div>
														</div>
													</div> <!--/panel-->
														<div class="card-body">
															<?php
																$sql = "select dailycleanliness.supervisionRef, dailycleanliness.Station, dailycleanliness.Train_No, dailycleanliness.approvalPM, dailycleanliness.ApprovalPC, dailycleanliness.Supervisor, dailycleanliness.Date, supervisors.fname, supervisors.sname
																			FROM dailycleanliness
																			INNER JOIN supervisors ON dailycleanliness.Supervisor=supervisors.supervisor_id WHERE dailycleanliness.Supervisor = '$wasifuid' GROUP BY dailycleanliness.supervisionRef";
																$result=mysqli_query($connect, $sql);
																while($data=mysqli_fetch_assoc($result))
																{
																	$supervisorName = $data["fname"].' '.$data["sname"];
															?>
																<div class="table-responsive">
																<table class="table" id="manageOrderTable">
																	<thead>
																		<tr>
																			<th>Supervision Date</th>
																			<th>Supervision Reference</th>
																			<th>Station</th>
																			<th>Train No</th>
																			<th>View</th>
																			<th>PM Approval</th>
																			<th>PC Approval</th>
																		</tr>
																	</thead>
																	<tbody>
																				<tr>
																					<td><?php print $data["Date"]; ?></td>
																					<td><?php print $data["supervisionRef"]; ?></td>
																					<td><?php print $data["Station"]; ?></td>
																					<td><mark><?php print $data["Train_No"]; ?></mark></td>
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
																							<button type="submit" name="viewbtn" class="btn btn-info">
																								<i class="fa fa-eye"></i>
																							</button>
																						</form>
																					</td>
																					<td>
																							<?php
																								if($data['approvalPM'] == 0){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-warning rounded-pill" type="button">
																									<i class="fa fa-plus"></i> Not Approved
																									</button>
																								</span>
																							<?php
																								}
																								elseif($data['approvalPM'] == 1){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-primary rounded-pill" type="button">
																									<i class="fa fa-check"></i> Approved
																									</button>
																								</span>
																							<?php
																								}else{
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-danger rounded-pill" type="button">
																									<i class="fa fa-times"></i> Rejected
																									</button>
																								</span>
																							<?php
																								}
																							?>
																					</td>
																					<td>
																							<?php
																								if($data['ApprovalPC'] == 0){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-warning rounded-pill" type="button">
																									<i class="fa fa-plus"></i> Not Approved
																									</button>
																								</span>
																							<?php
																								}
																								elseif($data['ApprovalPC'] == 1){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-primary rounded-pill" type="button">
																									<i class="fa fa-check"></i> Approved
																									</button>
																								</span>
																							<?php
																								}else{
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-danger rounded-pill" type="button">
																									<i class="fa fa-times"></i> Rejected
																									</button>
																								</span>
																							<?php
																								}
																							?>
																					</td>
																				</tr>
																	</tbody>
																</table>
																</div>
															<?php
																}
															?>
														</div> <!-----Card body--------------->
													</div>
											<!--------------------------------------DAILY CLEANLINESS PANEL----------------------------------------->		
											<!--------------------------------------INTERIOR LEANLINESS PANEL----------------------------------------->	
											<div class="card" style="border-radius: 15px;">
													<div class="card-header text-white" style="border-radius: 15px; background-color: #FFA500">
														<div class="row">
																<div class="col-md-6">
																	<i class="fa fa-angle-double-right"></i>	Interior and Vacuum Cleanliness Submitted Reports
																</div>
														</div>
													</div> <!--/panel-->
														<div class="card-body">
															<?php
																$sqlV = "select interiorcleaning.supervisionRef, interiorcleaning.station, interiorcleaning.train_no, interiorcleaning.approvalPM, interiorcleaning.approvalPC, interiorcleaning.Supervisor, interiorcleaning.date, supervisors.fname, supervisors.sname
																			FROM interiorcleaning
																			INNER JOIN supervisors ON interiorcleaning.Supervisor=supervisors.supervisor_id WHERE interiorcleaning.Supervisor = '$wasifuid' GROUP BY interiorcleaning.supervisionRef";
																$resultV=mysqli_query($connect, $sqlV);
																while($dataV=mysqli_fetch_assoc($resultV))
																{
																	$supervisorName = $dataV["fname"].' '.$dataV["sname"];
															?>
																<div class="table-responsive">
																<table class="table" id="manageOrderTable">
																	<thead>
																		<tr>
																			<th>Supervision Date</th>
																			<th>Supervision Reference</th>
																			<th>Station</th>
																			<th>Train No</th>
																			<th>View</th>
																			<th>PM Approval</th>
																			<th>PC Approval</th>
																		</tr>
																	</thead>
																	<tbody>
																				<tr>
																					<td><?php print $dataV["date"]; ?></td>
																					<td><?php print $dataV["supervisionRef"]; ?></td>
																					<td><?php print $dataV["station"]; ?></td>
																					<td><mark><?php print $dataV["train_no"]; ?></mark></td>
																					<td>
																						<form class="form-detail" name="superviewform" method="POST" action="viewInteriorReport.php" enctype="multipart/form-data" target="_blank" >
																							<input type="hidden" name="superRef" class="form-control form-control-lg" value="<?php print $dataV["supervisionRef"]; ?>" />
																							<input type="hidden" name="stationN" class="form-control form-control-lg" value="<?php print $dataV["station"]; ?>" />
																							<input type="hidden" name="trainN" class="form-control form-control-lg" value="<?php print $dataV["train_no"]; ?>" />
																							<input type="hidden" name="supervisorR" class="form-control form-control-lg" value="<?php print $dataV["Supervisor"]; ?>" />
																							<input type="hidden" name="PMApproval" class="form-control form-control-lg" value="<?php print $dataV["approvalPM"]; ?>" />
																							<input type="hidden" name="PCApproval" class="form-control form-control-lg" value="<?php print $dataV["approvalPC"]; ?>" />
																							<input type="hidden" name="dateR" class="form-control form-control-lg" value="<?php print $dataV["date"]; ?>" />
																							<input type="hidden" name="SuperName" class="form-control form-control-lg" value="<?php print $supervisorName; ?>" />
																							<button type="submit" name="viewbtn" class="btn btn-info">
																								<i class="fa fa-eye"></i>
																							</button>
																						</form>
																					</td>
																					<td>
																							<?php
																								if($dataV['approvalPM'] == 0){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-warning rounded-pill" type="button">
																									<i class="fa fa-plus"></i> Not Approved
																									</button>
																								</span>
																							<?php
																								}
																								elseif($dataV['approvalPM'] == 1){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-primary rounded-pill" type="button">
																									<i class="fa fa-check"></i> Approved
																									</button>
																								</span>
																							<?php
																								}else{
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-danger rounded-pill" type="button">
																									<i class="fa fa-times"></i> Rejected
																									</button>
																								</span>
																							<?php
																								}
																							?>
																					</td>
																					<td>
																							<?php
																								if($dataV['approvalPC'] == 0){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-warning rounded-pill" type="button">
																									<i class="fa fa-plus"></i> Not Approved
																									</button>
																								</span>
																							<?php
																								}
																								elseif($dataV['approvalPC'] == 1){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-primary rounded-pill" type="button">
																									<i class="fa fa-check"></i> Approved
																									</button>
																								</span>
																							<?php
																								}else{
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-danger rounded-pill" type="button">
																									<i class="fa fa-times"></i> Rejected
																									</button>
																								</span>
																							<?php
																								}
																							?>
																					</td>
																				</tr>
																	</tbody>
																</table>
																</div>
															<?php
																}
															?>
														</div> <!-----Card body--------------->
													</div>
											<!--------------------------------------INTERIOR CLEANLINESS PANEL----------------------------------------->
											<!--------------------------------------FUMIGATION PANEL----------------------------------------->	
											<div class="card" style="border-radius: 15px;">
													<div class="card-header text-white" style="border-radius: 15px; background-color: #FFA500">
														<div class="row">
																<div class="col-md-6">
																	<i class="fa fa-angle-double-right"></i>	Fumigation Submitted Reports
																</div>
														</div>
													</div> <!--/panel-->
														<div class="card-body">
															<?php
																$sqlF = "select fumigation.supervisionRef, fumigation.station, fumigation.train_no, fumigation.approvalPM, fumigation.approvalPC, fumigation.Supervisor, fumigation.date, supervisors.fname, supervisors.sname
																			FROM fumigation
																			INNER JOIN supervisors ON fumigation.Supervisor=supervisors.supervisor_id WHERE fumigation.Supervisor = '$wasifuid' GROUP BY fumigation.supervisionRef";
																$resultF=mysqli_query($connect, $sqlF);
																while($dataF=mysqli_fetch_assoc($resultF))
																{
																	$supervisorName = $dataF["fname"].' '.$dataF["sname"];
															?>
																<div class="table-responsive">
																<table class="table" id="manageOrderTable">
																	<thead>
																		<tr>
																			<th>Supervision Date</th>
																			<th>Supervision Reference</th>
																			<th>Station</th>
																			<th>Train No</th>
																			<th>View</th>
																			<th>PM Approval</th>
																			<th>PC Approval</th>
																		</tr>
																	</thead>
																	<tbody>
																				<tr>
																					<td><?php print $dataF["date"]; ?></td>
																					<td><?php print $dataF["supervisionRef"]; ?></td>
																					<td><?php print $dataF["station"]; ?></td>
																					<td><mark><?php print $dataF["train_no"]; ?></mark></td>
																					<td>
																						<form class="form-detail" name="superviewform" method="POST" action="viewFumigationReport.php" enctype="multipart/form-data" target="_blank" >
																							<input type="hidden" name="superRef" class="form-control form-control-lg" value="<?php print $dataF["supervisionRef"]; ?>" />
																							<input type="hidden" name="stationN" class="form-control form-control-lg" value="<?php print $dataF["station"]; ?>" />
																							<input type="hidden" name="trainN" class="form-control form-control-lg" value="<?php print $dataF["train_no"]; ?>" />
																							<input type="hidden" name="supervisorR" class="form-control form-control-lg" value="<?php print $dataF["Supervisor"]; ?>" />
																							<input type="hidden" name="PMApproval" class="form-control form-control-lg" value="<?php print $dataF["approvalPM"]; ?>" />
																							<input type="hidden" name="PCApproval" class="form-control form-control-lg" value="<?php print $dataF["approvalPC"]; ?>" />
																							<input type="hidden" name="dateR" class="form-control form-control-lg" value="<?php print $dataF["date"]; ?>" />
																							<input type="hidden" name="SuperName" class="form-control form-control-lg" value="<?php print $supervisorName; ?>" />
																							<button type="submit" name="viewbtn" class="btn btn-info">
																								<i class="fa fa-eye"></i>
																							</button>
																						</form>
																					</td>
																					<td>
																							<?php
																								if($dataF['approvalPM'] == 0){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-warning rounded-pill" type="button">
																									<i class="fa fa-plus"></i> Not Approved
																									</button>
																								</span>
																							<?php
																								}
																								elseif($dataF['approvalPM'] == 1){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-primary rounded-pill" type="button">
																									<i class="fa fa-check"></i> Approved
																									</button>
																								</span>
																							<?php
																								}else{
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-danger rounded-pill" type="button">
																									<i class="fa fa-times"></i> Rejected
																									</button>
																								</span>
																							<?php
																								}
																							?>
																					</td>
																					<td>
																							<?php
																								if($dataF['approvalPC'] == 0){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-warning rounded-pill" type="button">
																									<i class="fa fa-plus"></i> Not Approved
																									</button>
																								</span>
																							<?php
																								}
																								elseif($dataF['approvalPC'] == 1){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-primary rounded-pill" type="button">
																									<i class="fa fa-check"></i> Approved
																									</button>
																								</span>
																							<?php
																								}else{
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-danger rounded-pill" type="button">
																									<i class="fa fa-times"></i> Rejected
																									</button>
																								</span>
																							<?php
																								}
																							?>
																					</td>
																				</tr>
																	</tbody>
																</table>
																</div>
															<?php
																}
															?>
														</div> <!-----Card body--------------->
													</div>
											<!--------------------------------------FUMIGATION PANEL----------------------------------------->
										</div>
										</div>
										<!--PERSONAL PROFILE DETAILS-->
									</div>
								</div>
							</div>
						</div>

         				<!----------------- /personal detail Filter dash ------------------------------------->
            		</div>
    			</div>
</div>