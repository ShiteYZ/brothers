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
			<!--------------------- ADD STATION MODEL ------------------------------->
				<!-- Modal -->
				<div class="modal fade" id="addclaims" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=ClaimCommentSubmit" enctype="multipart/form-data" onsubmit="return process();">
							
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Add Claims and Comment</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>

								<div class="modal-body">

									<div class="row">
									
										<div class="col-md-12 mb-12">
											<div class="form-outline">
												<fieldset><hr />
												<label class="form-label" for="jinaKikao"><i class="fa fa-edit"></i>  Write Down your Claims and Comment</label>
												</fieldset>
												<textarea name="coment" class="form-control form-control-lg"></textarea>
											</div>
										</div>

									</div>
										
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Close</button>
									<button type="submit" name="claimBtn" class="btn btn-primary rounded-pill">Submit your Claim & Comment</button>
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
						<!----------------- Breadcrumb display dash ------------------------------------->
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
								<li class="breadcrumb-item"><a href="#">Tanrail</a></li>
								<li class="breadcrumb-item active" aria-current="page">Complaints, Claims and Comments</li>
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
																						<button class="btn btn-outline-primary rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#addclaims">
																							<i class="fa fa-plus">  Complaints, Claims and Comments</i>
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
																										<th>Claim / Compaints / Comment</th>
																										<th>Date of Report</th>
																										<th>Reported By</th>
																										<th>Answers</th>
																									</tr>
																								</thead>
																										<tbody>
																											<?php
																											$sqlclaim = "select claims.claim_id, claims.claim, claims.date, claims.PManswer, claims.PCanswer, claims.GManswer, supervisors.fname, supervisors.sname
																													FROM claims
																													INNER JOIN supervisors ON claims.submittedBy=supervisors.supervisor_id";
																											$resultclaim=mysqli_query($connect, $sqlclaim);
																											$sNo = 1;
																											?>
																											<?php
																											while($dataclaim=mysqli_fetch_assoc($resultclaim))
																											{
																												$supervisorName = $dataclaim["fname"].' '.$dataclaim["sname"];
																												?>
																												<tr>
																													<td><?php print $sNo; ?></td>
																													<td><?php print $dataclaim["claim"]; ?></td>
																													<td><?php print $dataclaim["date"]; ?></td>
																													<td><?php print $supervisorName; ?></td>
																													<td>
																													<?php
																														if($JobPosition == 'PM' || $JobPosition == 'Admin'){
																													?>
																													<button class="btn btn-success rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#EntryAnswersmodal<?php print $dataclaim["claim_id"]; ?>">
																													<i class="fa fa-edit"></i>
																													</button> 
																													<?php
																														}
																														if($JobPosition == 'PC' || $JobPosition == 'Admin'){
																													?>
																													<button class="btn btn-success rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#PCEntryAnswersmodal<?php print $dataclaim["claim_id"]; ?>">
																													<i class="fa fa-edit"></i>
																													</button> 
																													<?php
																														}
																														if($JobPosition == 'GM' || $JobPosition == 'Admin'){
																													?>
																													<button class="btn btn-success rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#GMEntryAnswersmodal<?php print $dataclaim["claim_id"]; ?>">
																													<i class="fa fa-edit"></i>
																													</button> 
																													<?php
																														}
																													?>
																													<button class="btn btn-info rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#ViewClaimAnswersmodal<?php print $dataclaim["claim_id"]; ?>">
																													<i class="fa fa-eye">  Answers</i>
																													</button>
																													</td>
																												</tr>
																													<!---------------------VIEW ANSWERS MODEL ------------------------------->
																														<!-- Modal -->
																														<div class="modal fade" id="ViewClaimAnswersmodal<?php print $dataclaim["claim_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
																															<div class="modal-dialog modal-lg">
																																<div class="modal-content">
																																
																																<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=LipaMkopo" enctype="multipart/form-data" onsubmit="return process();">
																																	
																																	<div class="modal-header">
																																		<h5 class="modal-title" id="staticBackdropLabel">Answers to Claim <br /><?php print $dataclaim["claim"]; ?> </h5>
																																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																																	</div>

																																		<div class="modal-body">

																																			<div class="row">

																																				<div class="col-md-12 mb-12">
																																					<div class="form-outline">
																																						<fieldset><hr />
																																						<label class="form-label" for="jinaKikao"><i class="fa fa-edit"></i>  Answers From Project Manager</label>
																																						</fieldset>
																																						<textarea name="coment" class="form-control form-control-lg" style="color:#f9b500"><?php print $dataclaim["PManswer"]; ?> </textarea>
																																					</div>
																																				</div>

																																				<div class="col-md-12 mb-12">
																																					<div class="form-outline">
																																						<fieldset><hr />
																																						<label class="form-label" for="jinaKikao"><i class="fa fa-edit"></i>  Answers From Project Coordinator</label>
																																						</fieldset>
																																						<textarea name="coment" class="form-control form-control-lg" style="color:#f9b500"><?php print $dataclaim["PCanswer"]; ?> </textarea>
																																					</div>
																																				</div>

																																				<div class="col-md-12 mb-12">
																																					<div class="form-outline">
																																						<fieldset><hr />
																																						<label class="form-label" for="jinaKikao"><i class="fa fa-edit"></i>  Answers From General Manager</label>
																																						</fieldset>
																																						<textarea name="coment" class="form-control form-control-lg" style="color:#f9b500"> <?php print $dataclaim["GManswer"]; ?> </textarea>
																																					</div>
																																				</div>

																																			</div>
																																				
																																		</div>
																																		<div class="modal-footer">
																																			<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Close</button>
																																		</div>

																																</form>
																																</div>
																															</div>
																														</div>
																														<!-- Modal -->
																													<!--------------------- VIEW ANSWERS  MODEL ------------------------------->
																													<!--------------------- PM ANSWERS ENTRY MODEL ------------------------------->
																														<!-- Modal -->
																														<div class="modal fade" id="EntryAnswersmodal<?php print $dataclaim["claim_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
																															<div class="modal-dialog modal-lg">
																																<div class="modal-content">
																																
																																<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=PMAnswerClaim" enctype="multipart/form-data" onsubmit="return process();">
																																	
																																	<div class="modal-header">
																																		<h5 class="modal-title" id="staticBackdropLabel">Answer the Claim <br /><?php print $dataclaim["claim"]; ?> </h5>
																																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																																	</div>

																																		<div class="modal-body">

																																			<div class="row">

																																				<input class="form-check-input" type="hidden" name="claimID" value="<?php print $dataclaim["claim_id"]; ?>" />
																																				<div class="col-md-12 mb-12">
																																					<div class="form-outline">
																																						<fieldset><hr />
																																						<label class="form-label" for="jinaKikao"><i class="fa fa-edit"></i> Write Down your Answers here</label>
																																						</fieldset>
																																						<textarea name="coment" class="form-control form-control-lg"></textarea>
																																					</div>
																																				</div>

																																			</div>
																																				
																																		</div>
																																		<div class="modal-footer">
																																			<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Close</button>
																																			<button type="submit" name="PMansbtn" class="btn btn-success rounded-pill" data-bs-dismiss="modal">Save</button>
																																		</div>

																																</form>
																																</div>
																															</div>
																														</div>
																														<!-- Modal -->
																													<!---------------------PM ANSWERS ENTRY MODEL ------------------------------->
																													<!--------------------- PC ANSWERS ENTRY MODEL ------------------------------->
																														<!-- Modal -->
																														<div class="modal fade" id="PCEntryAnswersmodal<?php print $dataclaim["claim_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
																															<div class="modal-dialog modal-lg">
																																<div class="modal-content">
																																
																																<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=PCAnswerClaim" enctype="multipart/form-data" onsubmit="return process();">
																																	
																																	<div class="modal-header">
																																		<h5 class="modal-title" id="staticBackdropLabel">Answer the Claim <br /><?php print $dataclaim["claim"]; ?> </h5>
																																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																																	</div>

																																		<div class="modal-body">

																																			<div class="row">

																																				<input class="form-check-input" type="hidden" name="claimID" value="<?php print $dataclaim["claim_id"]; ?>" />
																																				<div class="col-md-12 mb-12">
																																					<div class="form-outline">
																																						<fieldset><hr />
																																						<label class="form-label" for="jinaKikao"><i class="fa fa-edit"></i> Write Down your Answers here</label>
																																						</fieldset>
																																						<textarea name="coment" class="form-control form-control-lg"></textarea>
																																					</div>
																																				</div>

																																			</div>
																																				
																																		</div>
																																		<div class="modal-footer">
																																			<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Close</button>
																																			<button type="submit" name="PCansbtn" class="btn btn-success rounded-pill" data-bs-dismiss="modal">Save</button>
																																		</div>

																																</form>
																																</div>
																															</div>
																														</div>
																														<!-- Modal -->
																													<!---------------------PC ANSWERS ENTRY MODEL ------------------------------->
																													<!--------------------- GM ANSWERS ENTRY MODEL ------------------------------->
																														<!-- Modal -->
																														<div class="modal fade" id="GMEntryAnswersmodal<?php print $dataclaim["claim_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
																															<div class="modal-dialog modal-lg">
																																<div class="modal-content">
																																
																																<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=GMAnswerClaim" enctype="multipart/form-data" onsubmit="return process();">
																																	
																																	<div class="modal-header">
																																		<h5 class="modal-title" id="staticBackdropLabel">Answer the Claim <br /><?php print $dataclaim["claim"]; ?> </h5>
																																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																																	</div>

																																		<div class="modal-body">

																																			<div class="row">

																																				<input class="form-check-input" type="hidden" name="claimID" value="<?php print $dataclaim["claim_id"]; ?>" />
																																				<div class="col-md-12 mb-12">
																																					<div class="form-outline">
																																						<fieldset><hr />
																																						<label class="form-label" for="jinaKikao"><i class="fa fa-edit"></i> Write Down your Answers here</label>
																																						</fieldset>
																																						<textarea name="coment" class="form-control form-control-lg"></textarea>
																																					</div>
																																				</div>

																																			</div>
																																				
																																		</div>
																																		<div class="modal-footer">
																																			<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Close</button>
																																			<button type="submit" name="GMansbtn" class="btn btn-success rounded-pill" data-bs-dismiss="modal">Save</button>
																																		</div>

																																</form>
																																</div>
																															</div>
																														</div>
																														<!-- Modal -->
																													<!---------------------GM ANSWERS ENTRY MODEL ------------------------------->
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
 