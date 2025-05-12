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
											<!--------------------------------------DAILY cLEANLINESS PANEL----------------------------------------->	
											<div class="card" style="border-radius: 15px;">
													<div class="card-header text-white" style="border-radius: 15px; background-color: #FFA500">
														<div class="row">
																<div class="col-md-6">
																	<i class="fa fa-angle-double-right"></i>	Daily Cleanliness Submitted Reports
																</div>
														</div>
													</div> <!--/panel-->
														<div class="card-body">
																		<div class="row">
																			<div class="offset-md-8 col-md-4">
																				<form class="form-detail" name="searchDailyform" method="POST" action="viewsupervisionreportF.php" enctype="multipart/form-data" target="_blank">
																					<div class="input-group">
																						<input class="form-control border-end-0 border rounded-pill" type="text" placeholder="Search Supervision Reference" name="searchDailyClean" id="searchDailyClean">
																						<span class="input-group-append">
																							<button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="submit">
																								<i class="fa fa-search"></i>
																							</button>
																						</span>
																					</div>
																				</form>
																				<div class="list-group list-group item-action" id="suggestionsDRef"></div>
																			</div>
																		</div>
															<?php
																$sql = "select dailycleanliness.supervisionRef, dailycleanliness.Station, dailycleanliness.Train_No, dailycleanliness.approvalPM, dailycleanliness.ApprovalPC, dailycleanliness.Supervisor, dailycleanliness.Date, supervisors.fname, supervisors.sname
																			FROM dailycleanliness
																			INNER JOIN supervisors ON dailycleanliness.Supervisor=supervisors.supervisor_id GROUP BY dailycleanliness.supervisionRef ORDER BY dailycleanliness.Date DESC LIMIT 8";
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
															<div class="row">
																<div class="offset-md-8 col-md-4">
																	<form class="form-detail" name="searchVacuumform" method="POST" action="viewInteriorReportF.php" enctype="multipart/form-data" target="_blank">
																		<div class="input-group">
																			<input class="form-control border-end-0 border rounded-pill" type="text" placeholder="Search Supervision Reference" name="searchVacuumClean" id="searchVacuumClean">
																			<span class="input-group-append">
																				<button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="submit">
																					<i class="fa fa-search"></i>
																				</button>
																			</span>
																		</div>
																	</form>
																	<div class="list-group list-group item-action" id="suggestionsVRef"></div>
																</div>
															</div>
															<?php
																$sqlV = "select interiorcleaning.supervisionRef, interiorcleaning.station, interiorcleaning.train_no, interiorcleaning.approvalPM, interiorcleaning.approvalPC, interiorcleaning.Supervisor, interiorcleaning.date, supervisors.fname, supervisors.sname
																			FROM interiorcleaning
																			INNER JOIN supervisors ON interiorcleaning.Supervisor=supervisors.supervisor_id GROUP BY interiorcleaning.supervisionRef ORDER BY interiorcleaning.date DESC LIMIT 4";
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
															<div class="row">
																	<div class="offset-md-8 col-md-4">
																		<form class="form-detail" name="searchFumigationform" method="POST" action="viewFumigationreportF.php" enctype="multipart/form-data" target="_blank">
																			<div class="input-group">
																				<input class="form-control border-end-0 border rounded-pill" type="text" placeholder="Search Supervision Reference" name="searchFumigClean" id="searchFumigClean">
																				<span class="input-group-append">
																					<button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="submit">
																						<i class="fa fa-search"></i>
																					</button>
																				</span>
																			</div>
																		</form>
																		<div class="list-group list-group item-action" id="suggestionsfumRef"></div>
																	</div>
																</div>
															<?php
																$sqlF = "select fumigation.supervisionRef, fumigation.station, fumigation.train_no, fumigation.approvalPM, fumigation.approvalPC, fumigation.Supervisor, fumigation.date, supervisors.fname, supervisors.sname
																			FROM fumigation
																			INNER JOIN supervisors ON fumigation.Supervisor=supervisors.supervisor_id GROUP BY fumigation.supervisionRef ORDER BY fumigation.date DESC LIMIT 4";
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
<script>
$(document).ready(function(){

	//SEARCH DAILYCLEANLINESS
	$('#searchDailyClean').on('input', function(){
        var dailCleanRef = $(this).val();
        if (dailCleanRef.length > 0) {
            $.ajax({
                url: 'reports/search.php',
                method: 'POST',
                data: {dailCleanRef: dailCleanRef},
                success: function(data) {
                    var suggestionsDRef = $('#suggestionsDRef');
					suggestionsDRef.html(data)
                }
            });
        } else {
            $('#suggestionsDRef').html('');
        }
    });

    // Set clicked suggestion to input
    $(document).on('click', '#adailyref', function(){
        $('#searchDailyClean').val($(this).text());
        $('#suggestionsDRef').html('');
    });
	//END SEARCH DAILYCLEANLINESS
	//SEARCH INTERIOR VACUUM
	$('#searchVacuumClean').on('input', function(){
        var vacuumRef = $(this).val();
        if (vacuumRef.length > 0) {
            $.ajax({
                url: 'reports/search.php',
                method: 'POST',
                data: {vacuumRef: vacuumRef},
                success: function(data) {
                    var suggestionsVRef = $('#suggestionsVRef');
					suggestionsVRef.html(data)
                }
            });
        } else {
            $('#suggestionsVRef').html('');
        }
    });

    // Set clicked suggestion to input
    $(document).on('click', '#vacuumref', function(){
        $('#searchVacuumClean').val($(this).text());
        $('#suggestionsVRef').html('');
    });
	//END SEARCH INTERIOR VACUUM
	//SEARCH FUMIGATION
	$('#searchFumigClean').on('input', function(){
        var fumigRef = $(this).val();
        if (fumigRef.length > 0) {
            $.ajax({
                url: 'reports/search.php',
                method: 'POST',
                data: {fumigRef: fumigRef},
                success: function(data) {
                    var suggestionsfumRef = $('#suggestionsfumRef');
					suggestionsfumRef.html(data)
                }
            });
        } else {
            $('#suggestionsfumRef').html('');
        }
    });

    // Set clicked suggestion to input
    $(document).on('click', '#afumref', function(){
        $('#searchFumigClean').val($(this).text());
        $('#suggestionsfumRef').html('');
    });
	//END SEARCH FUMIGATION

});
</script>