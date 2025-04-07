<?php 
	include('includes/navbar.php'); 
	$date =$_POST['year'];
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
										<div class="col-10">
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-header bg-info text-white" style="border-radius: 15px;">
														<i class="fa fa-angle-double-right"></i> Ada
												</div> <!--/panel-->
												<div class="card-body">
																		<!--Search box-->
																		<div class="row">
																			<div class="offset-md-8 col-md-4">
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
																		</div>
																	<!-------------------ADA PANEL---------------------------->
																<div class="row">
																		<div class="col-md-8 mb-8">
																			<div class="table-responsive">
																				<table class="table table-striped">
																							<thead>
																								<th>No</th>
																								<th>Majina</th>
																								<th>Anuani</th>
																								<th>Ada</th>
																							</thead>
																							
																							<tbody>
																								<?php
																								$sql="select members.user_id, members.fname, members.mname, members.lname, members.address, members.contact, SUM(ada.amount) AS amount
																										FROM members
																										INNER JOIN ada ON members.user_id=ada.user_id where financial_year ='$date' GROUP by members.user_id";
																								$result=mysqli_query($connect, $sql);
																								$sNo = 1;
																								?>
																								<?php
																								while($data=mysqli_fetch_assoc($result))
																								{
																									?>
																									<tr>
																										<td><?php print $sNo; ?></td>
																										<td><a href="#"><?php print $data["fname"]." ".$data["mname"]." ".$data["lname"]; ?></a></td>
																										<td><?php print $data["address"]; ?></td>
																										<td>
																												<form class="form-detail" name="viewform" method="POST" action="index.php?p=prevnotes" enctype="multipart/form-data" onsubmit="return process();">
																													<div class="input-group">	
																														<input type="text" name="patientid" class="form-control border-end-0 border rounded-pill" value="<?php print $data["amount"]; ?>">
																														<span class="input-group-append">
																															<button class="btn btn-outline-warning bg-white border-bottom-0 border rounded-pill ms-n5" type="button">
																																<i class="fa fa-eye"></i>
																															</button>
																														</span>
																													</div>
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
																		<!-------------------ADa MCHANGANUO---------------------------->
																		<div class="col-md-4 mb-4 py-5">
																			<!-------------------Financial Year Panel---------------------------->
																			<div class="card shadow-2-strong card-registration" style="border-radius: 15px; ">
																				<div class="card-body">
																					<div class="dateview" style= "text-align: center; font-weight: bold;">
																						<?php
																							echo "Financial Year"." ".$date;
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
																		</div>
																</div>	

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
 