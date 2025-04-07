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
										<div class="col-10">
											<nav aria-label="breadcrumb">
												<ol class="breadcrumb">
													<li class="breadcrumb-item"><a href="#">Dashibodi</a></li>
													<li class="breadcrumb-item"><a href="#">Malipo ya Michango yaliyokataliwa</a></li>
												</ol>
											</nav>
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-header bg-danger text-white" style="border-radius: 15px;">
														<i class="fa fa-angle-double-right"></i>	Malipo ya Michango yaliyokataliwa
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
																	<!-------------------/END OF VIEW CLOSED PATIENT---------------------------->
																<div class="table-responsive">
																<table class="table table-striped">
																			<thead>
																				<th>No</th>
																				<th>Majina</th>
																				<th>Aina ya Malipo</th>
																				<th>Kiasi</th>
																				<th>Malipo ya Mwezi</th>
																				<th>Mwaka wa Fedha</th>
																				<th>Kumb No.</th>
																				<th>Remark.</th>
																				<th>Lisiti</th>
																			</thead>
																			
																			<tbody>
																				<?php
																				$sql="select mfukomaendeleo.mchango_id, mfukomaendeleo.amount, mfukomaendeleo.month, mfukomaendeleo.financial_year, mfukomaendeleo.referencenumber,mfukomaendeleo.remark, members.user_id, members.fname, members.mname, members.lname
																				FROM mfukomaendeleo
																				INNER JOIN members ON mfukomaendeleo.user_id=members.user_id WHERE mfukomaendeleo.approval = 2 ";
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
																							<form class="form-detail" name="viewform" method="POST" action="index.php?p=personalprofile" enctype="multipart/form-data" onsubmit="return process();">
																								<div class="input-group">	
																									<input type="hidden" name="userid" value="<?php print $data["user_id"]; ?>" >
																									<span class="input-group-append">
																										<button class="btn btn" type="submit" style="color: #00B074;">
																										<?php print $data["fname"]." ".$data["mname"]." ".$data["lname"]; ?>
																										</button>
																									</span>
																								</div>
																							</form>
																						</td>
																						<td>MFUKO WA MAENDELEO</td>
																						<td><?php print $data["amount"]; ?></td>
																						<td><?php print $data["month"]; ?></td>
																						<td><?php print $data["financial_year"]; ?></td>
																						<td><?php print $data["referencenumber"]; ?></td>
																						<td style="color:rgb(244, 32, 4);"><?php print $data["remark"]; ?></td>
																						<td>
																							<form class="form-detail" name="viewform" method="POST" action="index.php?p=mfukoLisitiPreview" enctype="multipart/form-data" onsubmit="return process();" target="_blank">
																									<div class="input-group">	
																										<input type="hidden" name="mchangoid" value="<?php print $data["mchango_id"]; ?>" >
																										<span class="input-group-append">
																											<button class="btn btn-outline-primary rounded-pill" type="submit" name="AdaLisitiPrev">
																											<i class="fa fa-file-pdf-o"></i>
																											</button>
																										</span>
																									</div>
																							</form>
																						</td>
																						<td>
																							<button class="btn btn-warning rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#marekebishoMalipoAdamodal<?php print $data["mchango_id"]; ?>">
																								Marekebisho
																							</button> 
																						</td>
																						
																						</tr>
																												<!---------------------KUBALI MALIPO MODEL ------------------------------->
																													<!-- Modal -->
																													<div class="modal fade" id="marekebishoMalipoAdamodal<?php print $data["mchango_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
																														<div class="modal-dialog">
																															<div class="modal-content">
																															
																															<form class="form-detail" name="rekebishaMalipoAdaform" method="POST" action="index.php?p=rekebishaMalipoMfuko" enctype="multipart/form-data" onsubmit="return process();">
																																
																																<div class="modal-header">
																																	<h5 class="modal-title" id="staticBackdropLabel">Sahihisha Makosa ya Awali</h5>
																																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																																</div>

																																	<div class="modal-body">

																																		<div class="row">
																																		
																																		<div class="col-md-12 mb-12">
																																			<div class="form-outline">
																																				<input type="hidden" name="mchangoid" id="mchangoid" class="form-control form-control-lg" value="<?php print $data["mchango_id"]; ?>"/>
																																				<input type="text" name="fedha" class="form-control form-control-lg" value="<?php print $data["amount"]; ?>" required/>
																																				<label class="form-label" for="fedha">Kiasi Unacholipa</label>
																																			</div>
																																			</div>

																																			<div class="col-md-12 mb-12">
																																			<div class="form-outline">
																																				<select class="form-control" name="month" required>
																																				<option value='<?php print $data["month"]; ?>'><?php print $data["month"]; ?></option>';
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
																																		<button type="submit" name="rekebishaMchango" class="btn btn-primary rounded-pill">Wasilisha</button>
																																	</div>

																															</form>
																															</div>
																														</div>
																													</div>
																													<!-- Modal -->
																												<!--------------------- KUBALI MALIPO MODEL ------------------------------->

																				<?php
																						$sNo++;
																					}
																				?>
																			</tbody>
																			
																</table>	
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
 