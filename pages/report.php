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
										<div class="col-12">
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-body">
													<fieldset>
																<legend>RIPOTI ZETU</legend>
																	<div class="row">
																		<!------------------- RIPOTI MICHANGO YA ADA---------------------------->
																			<div class="col-4 py-4">
																				<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																					<div class="card-header bg-default" style="border-radius: 15px; background-color:#90CFCF">

																						<div class="row">
																								<div class="col-md-8">
																									<i class="fa fa-angle-double-right"></i>	Ripoti Michango ya Ada
																								</div>
																								<div class="offset-md-2 col-md-2">
																									<div class="input-group">
																										<form class="form-horizontal" action="ripoti/michangoAdaExcelReport.php" method="post">
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
																							<form class="form-horizontal" action="ripoti/michangoAdaReport.php" method="post" id="michangoAdaReport">

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
																									<button type="submit" class="btn btn-primary rounded-pill" name="generateReportBtn" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Vuta Ripoti</button>
																									</div>

																							</form>
																						<!-------RIPOTI BODY----------->
																					</div>
																				</div>
																			</div> 
																		<!---------------------RIPOTI MICHANGO YA ADA ------------------------->	
																		<!------------------- RIPOTI MICHANGO MFUKO WA MAENDELEO---------------------------->
																		<div class="col-4 py-4">
																				<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																					<div class="card-header bg-default" style="border-radius: 15px; background-color:#90CFCF">
																						
																						<div class="row">
																								<div class="col-md-8">
																									<i class="fa fa-angle-double-right"></i>	Ripoti Michango ya Mfuko wa Maendeleo
																								</div>
																								<div class="offset-md-2 col-md-2">
																									<div class="input-group">
																										<form class="form-horizontal" action="ripoti/michangoMfukoExcelReport.php" method="post">
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
																							<form class="form-horizontal" action="ripoti/michangoMfukoReport.php" method="post" id="michangoMfukoReportForm">

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
																									<button type="submit" class="btn btn-primary rounded-pill" name="generateReportBtn" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Vuta Ripoti</button>
																									</div>

																							</form>
																						<!-------RIPOTI BODY----------->
																					</div>
																				</div>
																			</div> 
																		<!---------------------RIPOTI MICHANGO MFUKO WA MAENDELEO------------------------->	
																		<!------------------- RIPOTI MIKOPO--------------------------->
																		<div class="col-4 py-4">
																				<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																				<div class="card-header bg-default" style="border-radius: 15px; background-color:#90CFCF">
																						<div class="row">
																								<div class="col-md-8">
																									<i class="fa fa-angle-double-right"></i>	Ripoti Mikopo
																								</div>
																								<div class="offset-md-2 col-md-2">
																									<div class="input-group">
																										<form class="form-horizontal" action="ripoti/mikopoExcelReport.php" method="post">
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
																							<form class="form-horizontal" action="ripoti/mikopoReport.php" method="post" id="mikopoReportForm">

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
																									<button type="submit" class="btn btn-primary rounded-pill" name="generateReportBtn" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Vuta Ripoti</button>
																									</div>

																							</form>
																						<!-------RIPOTI BODY----------->
																					</div>
																				</div>
																			</div> 
																		<!---------------------RIPOTI MIKOPO------------------------->	
																		<!------------------- RIPOTI MIRADI--------------------------->
																		<div class="col-4 py-4">
																				<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																				<div class="card-header bg-default" style="border-radius: 15px; background-color:#90CFCF">
																						<div class="row">
																								<div class="col-md-8">
																									<i class="fa fa-angle-double-right"></i>	Ripoti Miradi
																								</div>
																								<div class="offset-md-2 col-md-2">
																									<div class="input-group">
																										<form class="form-horizontal" action="ripoti/miradiExcelReport.php" method="post">
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
																							<form class="form-horizontal" action="ripoti/miradiReport.php" method="post" id="miradiReportForm">

																								<div class="col-md-12 mb-12 py-2">
																									<div class="input-group">
																										<div class="input-group-append">
																											<span class="input-group-text">Start Date 
																										</div>
																										<input type="text" class="form-control" id="startDateMiradi" name="startDateMiradi" placeholder="Start Date" autocomplete="off" />
																									</div>
																								</div>

																								<div class="col-md-12 mb-12 py-2">
																									<div class="input-group">
																										<div class="input-group-append">
																											<span class="input-group-text">End Date 
																										</div>
																										<input type="text" class="form-control" id="endDateMiradi" name="endDateMiradi" placeholder="End Date" autocomplete="off" />
																									</div>
																								</div>

																									<div class="offset-md-8 col-md-4">
																									<button type="submit" class="btn btn-primary rounded-pill" name="generateReportBtn" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Vuta Ripoti</button>
																									</div>

																							</form>
																						<!-------RIPOTI BODY----------->
																					</div>
																				</div>
																			</div> 
																		<!---------------------RIPOTI MIRADI------------------------->	
																		<!------------------- RIPOTI MATUMIZI--------------------------->
																		<div class="col-4 py-4">
																				<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																				<div class="card-header bg-default" style="border-radius: 15px; background-color:#90CFCF">
																						<div class="row">
																								<div class="col-md-8">
																									<i class="fa fa-angle-double-right"></i>	Ripoti Matumizi
																								</div>
																								<div class="offset-md-2 col-md-2">
																									<div class="input-group">
																										<form class="form-horizontal" action="ripoti/matumiziExcelReport.php" method="post">
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
																							<form class="form-horizontal" action="ripoti/matumiziReport.php" method="post" id="matumiziReportForm">

																								<div class="col-md-12 mb-12 py-2">
																									<div class="input-group">
																										<div class="input-group-append">
																											<span class="input-group-text">Start Date 
																										</div>
																										<input type="text" class="form-control" id="startDateMatumizi" name="startDateMatumizi" placeholder="Start Date" autocomplete="off" />
																									</div>
																								</div>

																								<div class="col-md-12 mb-12 py-2">
																									<div class="input-group">
																										<div class="input-group-append">
																											<span class="input-group-text">End Date 
																										</div>
																										<input type="text" class="form-control" id="endDateMatumizi" name="endDateMatumizi" placeholder="End Date" autocomplete="off" />
																									</div>
																								</div>

																									<div class="offset-md-8 col-md-4">
																									<button type="submit" class="btn btn-primary rounded-pill" name="generateReportBtn" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Vuta Ripoti</button>
																									</div>

																							</form>
																						<!-------RIPOTI BODY----------->
																					</div>
																				</div>
																			</div> 
																		<!---------------------RIPOTI MATUMIZI------------------------->	
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
 