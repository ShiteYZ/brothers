<?php include('includes/navbar.php') ?>

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
										<div class="col-md-12">
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-body">
													<fieldset>
																<legend>REPORTS</legend>
																	<div class="row">
																		<!------------------- DAILY CLEANLINESS REPORT---------------------------->
																			<div class="col-md-4 py-4">
																				<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																					<div class="card-header bg-default" style="border-radius: 15px; background-color: #FFA500">

																						<div class="row">
																								<div class="col-md-8">
																									<i class="fa fa-angle-double-right"></i>	Daily Cleanliness Report
																								</div>
																								<div class="offset-md-2 col-md-2">
																									<div class="input-group">
																										<form class="form-horizontal" action="reports/DailyCleanExcelReport.php" method="post">
																											<button type="submit" name="xlsreport" class="btn btn-primary bg-white rounded-pill" type="button">
																														<i class="fa fa-file-excel-o"></i>
																											</button> 
																										</form> 
																									</div>
																								</div>
																						</div>

																					</div> <!--/panel-->
																					<div class="card-body">
																						<!------RIPOTI BODY------------>
																							<form class="form-horizontal" action="reports/dailCleanliness.php" method="post" id="dailCleanlinessReport">

																								<div class="col-md-12 mb-12 py-2">
																									<div class="input-group">
																										<div class="input-group-append">
																											<span class="input-group-text">Start Date 
																										</div>
																										<input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" autocomplete="off" />
																									</div>
																								</div>

																								<div class="col-md-12 mb-12 py-2">
																									<div class="input-group">
																										<div class="input-group-append">
																											<span class="input-group-text">End Date 
																										</div>
																										<input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" autocomplete="off" />
																									</div>
																								</div>

																									<div class="offset-md-8 col-md-4">
																									<button type="submit" class="btn btn rounded-pill" name="generateReportBtn" id="generateReportBtn" style="background-color: #692d2c;color:white;"> <i class="glyphicon glyphicon-ok-sign"></i> Generate report</button>
																									</div>

																							</form>
																						<!-------RIPOTI BODY----------->
																					</div>
																				</div>
																			</div> 
																		<!---------------------DAILY CLEANLINESS REPORT- ------------------------->	
																		<!------------------- VACUUM REPORT---------------------------->
																		<div class="col-md-4 py-4">
																				<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																					<div class="card-header bg-default" style="border-radius: 15px; background-color: #FFA500">
																						
																						<div class="row">
																								<div class="col-md-8">
																									<i class="fa fa-angle-double-right"></i>	Interior and Vacuum Cleaning Report
																								</div>
																								<div class="offset-md-2 col-md-2">
																									<div class="input-group">
																										<form class="form-horizontal" action="reports/vacuumExcelReport.php" method="post">
																											<button type="submit" name="xlsreport" class="btn btn-primary bg-white rounded-pill" type="button">
																														<i class="fa fa-file-excel-o"></i>
																											</button> 
																										</form> 
																									</div>
																								</div>
																						</div>

																					</div> <!--/panel-->
																					<div class="card-body">
																						<!------RIPOTI BODY------------>
																							<form class="form-horizontal" action="reports/vacuumReporting.php" method="post" id="vacuumReportingForm">

																								<div class="col-md-12 mb-12 py-2">
																									<div class="input-group">
																										<div class="input-group-append">
																											<span class="input-group-text">Start Date 
																										</div>
																										<input type="text" class="form-control" id="startDateM" name="startDateM" placeholder="Start Date" autocomplete="off" />
																									</div>
																								</div>

																								<div class="col-md-12 mb-12 py-2">
																									<div class="input-group">
																										<div class="input-group-append">
																											<span class="input-group-text">End Date 
																										</div>
																										<input type="text" class="form-control" id="endDateM" name="endDateM" placeholder="End Date" autocomplete="off" />
																									</div>
																								</div>

																									<div class="offset-md-8 col-md-4">
																									<button type="submit" class="btn btn rounded-pill" name="generateReportBtn" id="generateReportBtn" style="background-color: #692d2c;color:white;"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
																									</div>

																							</form>
																						<!-------RIPOTI BODY----------->
																					</div>
																				</div>
																			</div> 
																		<!---------------------RIPOTI MICHANGO MFUKO WA MAENDELEO------------------------->	
																		<!------------------- FUMIGATION REPORT--------------------------->
																		<div class="col-md-4 py-4">
																				<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																				<div class="card-header bg-default" style="border-radius: 15px; background-color: #FFA500">
																						<div class="row">
																								<div class="col-md-8">
																									<i class="fa fa-angle-double-right"></i> Fumigation Report
																								</div>
																								<div class="offset-md-2 col-md-2">
																									<div class="input-group">
																										<form class="form-horizontal" action="reports/fumigationExcelReport.php" method="post">
																											<button type="submit" name="xlsreport" class="btn btn-primary bg-white rounded-pill" type="button">
																														<i class="fa fa-file-excel-o"></i>
																											</button> 
																										</form> 
																									</div>
																								</div>
																						</div>

																					</div> <!--/panel-->
																					<div class="card-body">
																						<!------RIPOTI BODY------------>
																							<form class="form-horizontal" action="reports/fumigationReporting.php" method="post" id="fumigationReportingForm">

																								<div class="col-md-12 mb-12 py-2">
																									<div class="input-group">
																										<div class="input-group-append">
																											<span class="input-group-text">Start Date 
																										</div>
																										<input type="text" class="form-control" id="startDateMk" name="startDateMk" placeholder="Start Date" autocomplete="off" />
																									</div>
																								</div>

																								<div class="col-md-12 mb-12 py-2">
																									<div class="input-group">
																										<div class="input-group-append">
																											<span class="input-group-text">End Date 
																										</div>
																										<input type="text" class="form-control" id="endDateMk" name="endDateMk" placeholder="End Date" autocomplete="off" />
																									</div>
																								</div>

																									<div class="offset-md-8 col-md-4">
																									<button type="submit" class="btn btn rounded-pill" name="generateReportBtn" id="generateReportBtn" style="background-color: #692d2c;color:white;"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
																									</div>

																							</form>
																						<!-------RIPOTI BODY----------->
																					</div>
																				</div>
																			</div> 
																		<!---------------------FUMIGATION REPORT------------------------->	
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

<script src="assets/js/report.js"></script>
<?php
    include('includes/scripts.php');
?>
 