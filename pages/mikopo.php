<?php include('includes/navbar.php');
if(!$_SESSION['id']) {
	header('location: index.php?p=login');	
}else{
	$signatory = $_SESSION["id"];
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
			<!-- /panel-heading -->
				<div class="panel-body">
					<div class="panel-body py-4">
						<!----------------- /members display dash ------------------------------------->
									<div class="row justify-content-center align-items-center h-100">
										<div class="col-12">
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-header text-white" style="border-radius: 15px; background-color:#47B0AF">
														<i class="fa fa-angle-double-right"></i>	Maombi ya Mkopo
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
																					<a href="index.php?p=mikopohai">
																					<button class="btn btn-outline-info rounded-pill" type="button">
																								<i class="fa fa-plus"></i> Mikopo Hai
																							</button> 
																					</a>   
																				</div>
																			</div>

																			<div class="col-md-2">
																				<div class="input-group">
																					<a href="index.php?p=mikopoiliyomalizika">
																					<button class="btn btn-outline-secondary rounded-pill" type="button">
																								<i class="fa fa-check"></i> Mikopo iliyomalizika
																							</button> 
																					</a>   
																				</div>
																			</div>

																			<div class="col-md-2">
																				<div class="input-group">
																					<a href="index.php?p=mashartiMkopo">
																					<button class="btn btn-outline-primary rounded-pill" type="button">
																								<i class="fa fa-plus"></i> Omba Mkopo
																							</button> 
																					</a>   
																				</div>
																			</div>

																		</div>
																	<!-------------------/END OF VIEW CLOSED PATIENT---------------------------->
																<div class="table-responsive">
																<table class="table table-striped">
																			<thead>
																				<th>No</th>
																				<th>Majina</th>
																				<th>Mkopo</th>
																				<th>Rejesho</th>
																				<th>Kibali Mwenyekiti</th>
																				<th>Kibali Katibu</th>
																				<th>Kibali Mhazini</th>
																				<th>Hali ya Mkopo</th>
																			</thead>
																			
																			<tbody>
																				<?php
																				$sql="select * from mkopo where hali_malipo = '0'";
																				$result=mysqli_query($connect, $sql);
																				$sNo = 1;
																				?>
																				<?php
																				while($data=mysqli_fetch_assoc($result))
																				{
																				$today = date("Y-m-d");
																					?>
																					<tr>
																						<td><?php print $sNo; ?></td>
																						<td><a href="index.php?p=register"><?php print $data["jina"]; ?></a></td>
																						<td><?php print $data["kiasi_mkopo"]; ?></td>
																						<td><?php print $data["marejesho"]; ?></td>
																						<td>
																							<?php
																								if($data['sahihi_mwenyekiti'] == 0){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-warning rounded-pill" type="button">
																									<i class="fa fa-plus"></i> Hajathibitisha
																									</button>
																								</span>
																							<?php
																								}
																								elseif($data['sahihi_mwenyekiti'] == 1){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-primary rounded-pill" type="button">
																									<i class="fa fa-check"></i> Amekubali
																									</button>
																								</span>
																							<?php
																								}else{
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-danger rounded-pill" type="button">
																									<i class="fa fa-times"></i> Amekataa
																									</button>
																								</span>
																							<?php
																								}
																							?>
																						</td>
																						<td>
																							<?php
																								if($data['sahihi_katibu'] == 0){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-warning rounded-pill" type="button">
																									<i class="fa fa-plus"></i> Hajathibitisha
																									</button>
																								</span>
																							<?php
																								}
																								elseif($data['sahihi_katibu'] == 1){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-primary rounded-pill" type="button">
																									<i class="fa fa-check"></i> Amekubali
																									</button>
																								</span>
																							<?php
																								}else{
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-danger rounded-pill" type="button">
																									<i class="fa fa-times"></i> Amekataa
																									</button>
																								</span>
																							<?php
																								}
																							?>
																						</td>
																						<td>
																							<?php
																								if($data['sahihi_hazina'] == 0){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-warning rounded-pill" type="button">
																									<i class="fa fa-plus"></i> Hajathibitisha
																									</button>
																								</span>
																							<?php
																								}
																								elseif($data['sahihi_hazina'] == 1){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-primary rounded-pill" type="button">
																									<i class="fa fa-check"></i> Amekubali
																									</button>
																								</span>
																							<?php
																								}else{
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-outline-danger rounded-pill" type="button">
																									<i class="fa fa-times"></i> Amekataa
																									</button>
																								</span>
																							<?php
																								}
																							?>
																						</td>
																						<td>
																							<?php
																								if($data['hali_malipo'] == 0){
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-danger rounded-pill" type="button">
																									 Hajakopeshwa
																									</button>
																								</span>
																							<?php
																								}else{
																							?>
																								<span class="input-group-append">
																									<button class="btn btn-success rounded-pill" type="button">
																									Kakopeshwa
																									</button>
																								</span>
																							<?php
																								}
																							?>
																						</td>
																						<td>
																							<?php
																								if($mtiasahihi == 'Mwenyekiti' || $mtiasahihi == 'Katibu' || $mtiasahihi == 'Mhazini'){
																							?>
																							<button class="btn btn-primary rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#IdhinishaMkopomodal<?php print $data["mkopo_id"]; ?>">
																								Idhinisha
																							</button> 
																							<?php
																								}
																							?>
																						</td>
																						<td>
																							<?php
																								if($data['sahihi_mwenyekiti'] == 1 && $data['sahihi_katibu'] == 1 && $data['sahihi_hazina'] == 1 && $mtiasahihi == 'Mhazini'){
																							?>
																							<button class="btn btn-info rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#LipaMkopomodal<?php print $data["mkopo_id"]; ?>">
																								Kopesha
																							</button> 
																							<?php
																								}
																							?>
																						</td>
																						</tr>
																									<!---------------------IDHINISHA MKOPO MODEL ------------------------------->
																										<!-- Modal -->
																										<div class="modal fade" id="IdhinishaMkopomodal<?php print $data["mkopo_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
																											<div class="modal-dialog">
																												<div class="modal-content">
																												
																												<form class="form-detail" name="kubaliMalipoAdaform" method="POST" action="index.php?p=idhinishaMkopo" enctype="multipart/form-data" onsubmit="return process();">
																													
																													<div class="modal-header">
																														<h5 class="modal-title" id="staticBackdropLabel">Idhinisha au Kataa ombi la Mkopo la ndugu, <br /><?php print $data["jina"]; ?></h5>
																														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																													</div>

																														<div class="modal-body">

																															<div class="row">

																																<div class="col-md-12 mb-12">
																																	<h6 class="mb-2 pb-1">Idhinisha au Kataa ombi la Mkopo: </h6>
																																	<div class="form-check form-check">
																																		<input class="form-check-input" type="radio" name="sahihi" id="idhinisha"
																																		value="1" checked />
																																		<label class="form-check-label" for="Idhinisha">Idhinisha</label>
																																	</div>

																																	<div class="form-check form-check">
																																		<input class="form-check-input" type="radio" name="sahihi" id="kataa"
																																		value="2" style="background-color:red;" />
																																		<label class="form-check-label" for="Kataa">Kataa</label>
																																	</div>
																																</div>
																															
																																<div class="col-md-12 mb-12 py-4">
																																<div class="form-outline">
																																	<input type="hidden" name="mkopoid" id="mkopoid" class="form-control form-control-lg" value="<?php print $data["mkopo_id"]; ?>"/>
																																	<input type="hidden" name="jina" id="jina" class="form-control form-control-lg" value="<?php print $data["jina"]; ?>"/>
																																	<input type="hidden" name="mtiasahihi" id="mtiasahihi" class="form-control form-control-lg" value="<?php print $mtiasahihi; ?>"/>
																																	<textarea class="form-control form-control-lg" name="remark" id="remark" style="background: #fff;height:50px !important;"></textarea>
																																	<label class="form-label" for="remark">Maelezo kama yapo</label>
																																</div>
																																</div>

																															</div>
																																
																														</div>
																														<div class="modal-footer">
																															<button type="submit" name="idhinisha" class="btn btn-primary rounded-pill">Thibitisha</button>
																														</div>

																												</form>
																												</div>
																											</div>
																										</div>
																										<!-- Modal -->
																									<!--------------------- IDHINISHA MKOPO MODEL ------------------------------->
																									<!---------------------LIPA MKOPO MODEL ------------------------------->
																										<!-- Modal -->
																										<div class="modal fade" id="LipaMkopomodal<?php print $data["mkopo_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
																											<div class="modal-dialog">
																												<div class="modal-content">
																												
																												<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=LipaMkopo" enctype="multipart/form-data" onsubmit="return process();">
																													
																													<div class="modal-header">
																														<h5 class="modal-title" id="staticBackdropLabel">Kopesha Mkopo alioomba ndugu, <br /><?php print $data["jina"]; ?> </h5>
																														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																													</div>

																														<div class="modal-body">

																															<div class="row">

																																<div class="col-md-12 mb-12">
																																<div class="form-outline">
																																	<input type="hidden" name="mkopoid" id="mkopoid" class="form-control form-control-lg" value="<?php print $data["mkopo_id"]; ?>"/>
																																	<input type="hidden" name="jina" id="jina" class="form-control form-control-lg" value="<?php print $data["jina"]; ?>"/>
																																	<input type="hidden" name="rejesho" id="rejesho" class="form-control form-control-lg" value="<?php print $data["marejesho"]; ?>"/>
																																	<input type="text" name="mkopo" class="form-control form-control-lg" value="<?php print $data["kiasi_mkopo"]; ?>" readonly/>
																																	<label class="form-label" for="mkopo">Kiasi Mkopo alichoomba</label>
																																</div>
																																</div>

																																<div class="col-md-12 mb-12">
																																<div class="form-outline">
																																	<input type="file" name="lisiti" class="form-control form-control-lg" required/>
																																	<label class="form-label" for="lisiti">Ambatanisha Lisiti ya Malipo</label>
																																</div>
																																</div>
																															
																																<div class="col-md-12 mb-12">
																																<div class="form-outline">
																																	<textarea class="form-control form-control-lg" name="remark" id="remark" style="background: #fff;height:50px !important;"></textarea>
																																	<label class="form-label" for="fedha">Maelezo kama yapo</label>
																																</div>
																																</div>

																															</div>
																																
																														</div>
																														<div class="modal-footer">
																															<button type="submit" name="lipamkopo" class="btn btn-primary rounded-pill">Kopesha</button>
																														</div>

																												</form>
																												</div>
																											</div>
																										</div>
																										<!-- Modal -->
																									<!--------------------- LIPA MKOPO  MODEL ------------------------------->
																				<?php
																						$sNo++;
																					}
																				?>
																			</tbody>
																			
																</table>	
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
<?php
    include('includes/scripts.php');
?>
 