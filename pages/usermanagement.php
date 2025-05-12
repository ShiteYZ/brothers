<?php include('includes/navbar.php') ?>

<!------------------------------------ Dashboard Start ---------------------------------------------------------->
			<!--------------------- ADD USER ------------------------------->
				<!-- Modal -->
				<div class="modal fade" id="adduser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<form class="form-detail" name="addUserform" method="POST" action="index.php?p=addNewUserSubmit" enctype="multipart/form-data" onsubmit="return process();">
							
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Add New User</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>

								<div class="modal-body">

									<div class="row">
									
										<div class="col-md-12 mb-12">
										<div class="form-outline">
												<fieldset>
												<label class="form-label" for="fname"><i class="fa fa-angle-double-right"></i> First Name</label>
												</fieldset>
											<input type="text" name="fname" class="form-control form-control-lg" autocomplete="off" />
										</div>
										</div>
										<div class="col-md-12 mb-12">
										<div class="form-outline">
												<fieldset><hr />
												<label class="form-label" for="mname"><i class="fa fa-angle-double-right"></i> Middle Name</label>
												</fieldset>
											<input type="text" name="mname" class="form-control form-control-lg" autocomplete="off" />
										</div>
										</div>
										<div class="col-md-12 mb-12">
										<div class="form-outline">
												<fieldset><hr />
												<label class="form-label" for="sname"><i class="fa fa-angle-double-right"></i> SurName</label>
												</fieldset>
											<input type="text" name="sname" class="form-control form-control-lg" autocomplete="off" />
										</div>
										</div>
										<div class="col-md-12 mb-12">
											<div class="form-outline">
												<fieldset><hr />
												<label class="form-label" for="gender"><i class="fa fa-angle-double-right"></i>  Gender</label>
												</fieldset>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="gender"
														value="Male" checked />
														<label class="form-check-label" for="Provided"> Male</label>
													</div>

													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="gender"
														value="Female" />
														<label class="form-check-label" for="Not Provided"> Female</label>
													</div>
											</div>
										</div>
										<div class="col-md-12 mb-12">
										<div class="form-outline">
												<fieldset><hr />
												<label class="form-label" for="dob"><i class="fa fa-angle-double-right"></i> Date of Birth</label>
												</fieldset>
											<input type="date" name="dob" class="form-control form-control-lg" autocomplete="off" />
										</div>
										</div>
										<div class="col-md-12 mb-12">
										<div class="form-outline">
												<fieldset><hr />
												<label class="form-label" for="email"><i class="fa fa-angle-double-right"></i> Email</label>
												</fieldset>
											<input type="text" name="email" class="form-control form-control-lg" autocomplete="off" />
										</div>
										</div>
										<div class="col-md-12 mb-12">
										<div class="form-outline">
												<fieldset><hr />
												<label class="form-label" for="contact"><i class="fa fa-angle-double-right"></i> Phone Number</label>
												</fieldset>
											<input type="text" name="contact" class="form-control form-control-lg" autocomplete="off" />
										</div>
										</div>
										<div class="col-md-12 mb-12">
										<div class="form-outline">
												<fieldset><hr />
												<label class="form-label" for="station"><i class="fa fa-angle-double-right"></i> Station</label>
												</fieldset>
												<select class="form-control form-control-lg" name="station">
													<option value="" disabled>Station</option>
													<?php
														$sqlST="select * from stations";
														$resultST=mysqli_query($connect, $sqlST);
														while($dataST=mysqli_fetch_assoc($resultST))
														{
													?>
														<option value="<?php print $dataST["station_name"]; ?>"><?php print $dataST["station_name"]; ?></option>
													<?php
														}
													?>
												</select>
										</div>
										</div>
										<div class="col-md-12 mb-12">
										<div class="form-outline">
												<fieldset><hr />
												<label class="form-label" for="jobtitle"><i class="fa fa-angle-double-right"></i> Job Title</label>
												</fieldset>
												<select class="form-control form-control-lg" name="jobtitle">
													<option value="" disabled>Job Title</option>
													<option value="Supervisor">Supervisor</option>
													<option value="PM">Project Manager</option>
													<option value="PC">Project Coordinator</option>
													<option value="GM">General Manager</option>
													<option value="Admin">Admin</option>
												</select>
										</div>
										</div>

									</div>
										
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Close</button>
									<button type="submit" name="userBtn" class="btn btn-primary rounded-pill">Register</button>
								</div>

						</form>
						</div>
					</div>
				</div>
				<!-- Modal -->
			<!--------------------- ADD USER MODEL ------------------------------->
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
								<li class="breadcrumb-item active" aria-current="page">User Management</li>
							</ol>
						</nav>
						<!----------------- Breadcrumb display dash ------------------------------------->
									<div class="row justify-content-center align-items-center h-100">
										<div class="col-12">
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-body">
																		<!--Search box-->
																		<div class="row">
																			<div class="offset-md-10 col-md-2">
																				<div class="input-group">
																						<button class="btn btn-outline-primary rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#adduser">
																							<i class="fa fa-plus">  Add New User</i>
																						</button> 
																				</div>
																			</div>
																		</div>
																	<!-------------------INNER PANEL---------------------------->
																		<div class="col-md-12 py-4"><!--COL-3-->
																			<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																					<div class="card-body">
																						<!---------------TABLE----------------------->
																						<div class="table-responsive">
																							<table class="table table-striped">
																								<thead>
																									<tr>
																										<th>SNo</th>
																										<th>Supervisor</th>
																										<th>Gender</th>
																										<th>Age</th>
																										<th>Email</th>
																										<th>Contact</th>
																										<th>Station</th>
																										<th>Job Title</th>
																									</tr>
																								</thead>
																										<tbody>
																											<?php
																											$sqlclaim="select * from supervisors";
																											$resultclaim=mysqli_query($connect, $sqlclaim);
																											$sNo = 1;
																											?>
																											<?php
																											while($dataclaim=mysqli_fetch_assoc($resultclaim))
																											{
																												$dateOfBirth = $dataclaim["dob"];
																												$today = date("Y-m-d");
																												$diff = date_diff(date_create($dateOfBirth), date_create($today));
																												?>
																												<tr>
																													<td><?php print $sNo; ?></td>
																													<td><?php print $dataclaim["fname"]." ".$dataclaim["lname"]." ".$dataclaim["sname"]; ?></td>
																													<td><?php print $dataclaim["gender"]; ?></td>
																													<td><?php print $diff->format('%y'); ?></td>
																													<td><?php print $dataclaim["email"]; ?></td>
																													<td><?php print $dataclaim["contact"]; ?></td>
																													<td><?php print $dataclaim["station"]; ?></td>
																													<td><?php print $dataclaim["jobTitle"]; ?></td>
																													<td>
																													<button class="btn btn-info rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#editUsermodal<?php print $dataclaim["supervisor_id"]; ?>">
																													<i class="fa fa-edit"></i>
																													</button> 
																													<button class="btn btn-danger rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#deleteUsermodal<?php print $dataclaim["supervisor_id"]; ?>">
																													<i class="fa fa-trash"></i>
																													</button> 
																													</td>
																												</tr>
																													<!---------------------EDIT USER MODEL ------------------------------->
																														<!-- Modal -->
																														<div class="modal fade" id="editUsermodal<?php print $dataclaim["supervisor_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
																														<div class="modal-dialog">
																																<div class="modal-content">
																																
																																<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=editUserSubmit" enctype="multipart/form-data" onsubmit="return process();">
																																	
																																	<div class="modal-header">
																																		<h5 class="modal-title" id="staticBackdropLabel">Edit User<br /><?php print $dataclaim["fname"]." ".$dataclaim["sname"]; ?> </h5>
																																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																																	</div>

																																	<div class="modal-body">

																																			<div class="row">

																																				<div class="col-md-12 mb-12">
																																				<div class="form-outline">
																																						<fieldset>
																																						<label class="form-label" for="fname"><i class="fa fa-angle-double-right"></i> First Name</label>
																																						</fieldset>
																																					<input type="text" name="fname" class="form-control form-control-lg" value="<?php print $dataclaim["fname"]; ?>" autocomplete="off" />
																																					<input type="hidden" name="superID" class="form-control form-control-lg" value="<?php print $dataclaim["supervisor_id"]; ?>" autocomplete="off" />
																																				</div>
																																				</div>
																																				<div class="col-md-12 mb-12">
																																				<div class="form-outline">
																																						<fieldset><hr />
																																						<label class="form-label" for="mname"><i class="fa fa-angle-double-right"></i> Middle Name</label>
																																						</fieldset>
																																					<input type="text" name="mname" class="form-control form-control-lg" value="<?php print $dataclaim["lname"]; ?>" autocomplete="off" />
																																				</div>
																																				</div>
																																				<div class="col-md-12 mb-12">
																																				<div class="form-outline">
																																						<fieldset><hr />
																																						<label class="form-label" for="sname"><i class="fa fa-angle-double-right"></i> SurName</label>
																																						</fieldset>
																																					<input type="text" name="sname" class="form-control form-control-lg" value="<?php print $dataclaim["sname"]; ?>" autocomplete="off" />
																																				</div>
																																				</div>
																																				<div class="col-md-12 mb-12">
																																					<div class="form-outline">
																																						<fieldset><hr />
																																						<label class="form-label" for="gender"><i class="fa fa-angle-double-right"></i>  Gender</label>
																																						</fieldset>
																																							<div class="form-check form-check-inline">
																																								<input class="form-check-input" type="radio" name="gender"
																																								value="Male" checked />
																																								<label class="form-check-label" for="Provided"> Male</label>
																																							</div>

																																							<div class="form-check form-check-inline">
																																								<input class="form-check-input" type="radio" name="gender"
																																								value="Female" />
																																								<label class="form-check-label" for="Not Provided"> Female</label>
																																							</div>
																																					</div>
																																				</div>
																																				<div class="col-md-12 mb-12">
																																				<div class="form-outline">
																																						<fieldset><hr />
																																						<label class="form-label" for="dob"><i class="fa fa-angle-double-right"></i> Date of Birth</label>
																																						</fieldset>
																																					<input type="date" name="dob" class="form-control form-control-lg" value="<?php print $dataclaim["dob"]; ?>" autocomplete="off" />
																																				</div>
																																				</div>
																																				<div class="col-md-12 mb-12">
																																				<div class="form-outline">
																																						<fieldset><hr />
																																						<label class="form-label" for="email"><i class="fa fa-angle-double-right"></i> Email</label>
																																						</fieldset>
																																					<input type="text" name="email" class="form-control form-control-lg" value="<?php print $dataclaim["email"]; ?>" autocomplete="off" />
																																				</div>
																																				</div>
																																				<div class="col-md-12 mb-12">
																																				<div class="form-outline">
																																						<fieldset><hr />
																																						<label class="form-label" for="contact"><i class="fa fa-angle-double-right"></i> Phone Number</label>
																																						</fieldset>
																																					<input type="text" name="contact" class="form-control form-control-lg" value="<?php print $dataclaim["contact"]; ?>" autocomplete="off" />
																																				</div>
																																				</div>
																																				<div class="col-md-12 mb-12">
																																				<div class="form-outline">
																																						<fieldset><hr />
																																						<label class="form-label" for="station"><i class="fa fa-angle-double-right"></i> Station</label>
																																						</fieldset>
																																						<select class="form-control form-control-lg" name="station">
																																							<option value="" disabled>Station</option>
																																							<?php
																																								$sqlST="select * from stations";
																																								$resultST=mysqli_query($connect, $sqlST);
																																								while($dataST=mysqli_fetch_assoc($resultST))
																																								{
																																							?>
																																								<option value="<?php print $dataST["station_name"]; ?>"><?php print $dataST["station_name"]; ?></option>
																																							<?php
																																								}
																																							?>
																																						</select>
																																				</div>
																																				</div>
																																				<div class="col-md-12 mb-12">
																																				<div class="form-outline">
																																						<fieldset><hr />
																																						<label class="form-label" for="jobtitle"><i class="fa fa-angle-double-right"></i> Job Title</label>
																																						</fieldset>
																																						<select class="form-control form-control-lg" name="jobtitle">
																																							<option value="" disabled>Job Title</option>
																																							<option value="Supervisor">Supervisor</option>
																																							<option value="PM">Project Manager</option>
																																							<option value="PC">Project Coordinator</option>
																																							<option value="GM">General Manager</option>
																																							<option value="Admin">Admin</option>
																																						</select>
																																				</div>
																																				</div>

																																			</div>
																																				
																																			</div>
																																			<div class="modal-footer">
																																			<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Close</button>
																																			<button type="submit" name="userEBtn" class="btn btn-info rounded-pill">Edit User</button>
																																			</div>

																																</form>
																																</div>
																															</div>
																														</div>
																														<!-- Modal -->
																													<!--------------------- EDIT USER  MODEL ------------------------------->
																													<!---------------------EDIT USER MODEL ------------------------------->
																														<!-- Modal -->
																														<div class="modal fade" id="deleteUsermodal<?php print $dataclaim["supervisor_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
																														<div class="modal-dialog">
																																<div class="modal-content">
																																
																																<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=deleteUserSubmit" enctype="multipart/form-data" onsubmit="return process();">
																																	
																																	<div class="modal-header">
																																		<h5 class="modal-title" id="staticBackdropLabel" style="color: red;">Sure? you want to Delete User<br /><?php print $dataclaim["fname"]." ".$dataclaim["sname"]; ?> </h5>
																																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																																	</div>

																																	<div class="modal-body">

																																			<div class="row">

																																				<div class="col-md-12 mb-12">
																																				<div class="form-outline">
																																					<input type="hidden" name="superID" class="form-control form-control-lg" value="<?php print $dataclaim["supervisor_id"]; ?>" autocomplete="off" />
																																				</div>
																																				</div>

																																			</div>
																																				
																																			</div>
																																			<div class="modal-footer">
																																			<button type="submit" name="userDBtn" class="btn btn-danger rounded-pill">Delete</button>
																																			</div>

																																</form>
																																</div>
																															</div>
																														</div>
																														<!-- Modal -->
																													<!--------------------- EDIT USER  MODEL ------------------------------->
																											<?php
																													$sNo++;
																												}
																											?>
																										</tbody>
																										
																							</table>
																						</div>
																						<!---------------END OF TABLE---------------->
																					</div>
																			</div>
																		</div><!-- END OF COL-3-->
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
<script>
$(document).ready(function(){
	$("#startDate").datepicker();
});
</script>
<?php
    include('includes/scripts.php');
?>
 