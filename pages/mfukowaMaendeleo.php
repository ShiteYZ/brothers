<?php 
	include('includes/navbar.php'); 
	date_default_timezone_set("Africa/Nairobi");
	$date = date("Y");

	$mlipaji = $_SESSION['userId'];
	if(!$_SESSION['userId']) {
		header('location: index.php?p=login');	
	}else{
		$signatory = $_SESSION['userId'];
		$sqlsign="SELECT previlege from members WHERE user_id='".$signatory."' ";
		   $datasign=mysqli_fetch_Assoc(mysqli_query($connect,$sqlsign));
		   $mtiasahihi = $datasign["previlege"];
		}
?>

<!------------------------------------ Dashboard Start ---------------------------------------------------------->
<div class="container-fluid">
    <div class="panel panel-default">
			<div class="panel-heading">
				<h5></h5><hr style="color:#f9b500;" />
			</div>
						<!--------------------- REGISTER FAMILY MODEL ------------------------------->
				<!-- Modal -->
				<div class="modal fade" id="wasilishaMalipo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<?php
							$sql="select * from members WHERE user_id = '$mlipaji' ";
							$result=mysqli_query($connect, $sql);
						?>
						<?php
							while($data=mysqli_fetch_assoc($result))
							{
						?>
						<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=lipishaMchangosubmit" enctype="multipart/form-data" onsubmit="return process();">
							
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Karibu Ndugu <?php print $data["fname"]." ".$data["lname"]; ?> <br/> Kuwasilisha Michango Mfuko wa Maendeleo</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>

								<div class="modal-body">

									<div class="row">
									
										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="hidden" name="userid" id="userid" class="form-control form-control-lg" value="<?php print $data["user_id"]; ?>"/>
											<input type="text" name="fedha" class="form-control form-control-lg" required/>
											<label class="form-label" for="fedha">Kiasi Unacholipa</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<select class="form-control" name="month" required>
												<?php
													$month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");

													foreach ($month_names as $month){
														echo '<option value='.$month.'>'.$month.'</option>';
													}

												?>
											</select>
											<label class="form-label" for="DoB">Malipo ya Mwezi gani</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<select class="form-control" name="financialyear" required>
												<?php
													$startyear = date('Y');
													$endyear = $startyear + 2;

													for ($i = $startyear; $i <= $endyear; $i++){
														echo '<option value='.$i.'>'.$i.'</option>';
													}

												?>
											</select>
											<label class="form-label" for="contact">Mwaka wa Fedha</label>
										</div>
										</div>


										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="file" name="lisiti" class="form-control form-control-lg" required/>
											<label class="form-label" for="lisiti">Ambatanisha Lisiti ya Malipo</label>
										</div>
										</div>

									</div>
										
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Futa</button>
									<button type="submit" name="lipisha" class="btn btn-primary rounded-pill">Wasilisha</button>
								</div>

						</form>
						<?php
							}
						?>
						</div>
					</div>
				</div>
				<!-- Modal -->
			<!--------------------- REGISTER FAMILY MODEL ------------------------------->
			<!-- /panel-heading -->
				<div class="panel-body">
					<div class="panel-body py-4">
						<!----------------- /members display dash ------------------------------------->
									<div class="row justify-content-center align-items-center h-100">
										<div class="col-10">
											<nav aria-label="breadcrumb">
												<ol class="breadcrumb">
													<li class="breadcrumb-item"><a href="#">Dashibodi</a></li>
													<li class="breadcrumb-item"><a href="#">Mfuko wa Maendeleo</a></li>
													<li class="breadcrumb-item active" aria-current="page">Michango kwa mfuko wa Maendeleo</li>
												</ol>
											</nav>
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-header text-white" style="border-radius: 15px; background-color:#CC6633">
														<i class="fa fa-angle-double-right"></i> Mfuko wa Maendeleo
												</div> <!--/panel-->
												<div class="card-body">
																		<!--Search box-->
																		<div class="row">
																			<div class="offset-md-2 col-md-4">
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
																			<div class="col-md-2">
																				<div class="input-group">
																					<button class="btn btn-outline-info rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#wasilishaMalipo">
																								<i class="fa fa-cc-paypal">Lipia Mfuko</i>
																					</button> 
																				</div>
																			</div>
																			<?php
																				if($mtiasahihi == 'Mhazini'){
																			?>
																			<div class="col-md-2">
																				<div class="input-group">
																					<a href="index.php?p=lipiamfuko">
																					<button class="btn btn-outline-primary rounded-pill" type="button">
																								<i class="fa fa-cc-paypal">Lipisha</i>
																					</button> 
																					</a>   
																				</div>
																			</div>	
																			<?php
																				}
																			?>
																			<div class="col-md-2">
																				<div class="input-group">
																					<a href="index.php?p=malipoMfukoKataliwa">
																					<button class="btn btn-outline-danger rounded-pill" type="button">
																								<i class="fa fa-close">Yaliyokataliwa</i>
																					</button> 
																					</a>   
																				</div>
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
																								<th>Mchango</th>
																							</thead>
																							
																							<tbody>
																								<?php
																								$sql="select members.user_id, members.fname, members.mname, members.lname, members.address, members.contact, SUM(mfukomaendeleo.amount) AS amount
																										FROM members
																										INNER JOIN mfukomaendeleo ON members.user_id=mfukomaendeleo.user_id where mfukomaendeleo.financial_year ='$date' GROUP by members.user_id";
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
																							echo "Mwaka wa Fedha"." ".$date;
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
 