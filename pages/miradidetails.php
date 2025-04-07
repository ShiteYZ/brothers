<?php include('includes/navbar.php'); 
$miradiid = $_POST["miradiid"];
?>
<h5></h5><hr style="color:#f9b500;" />

<div class="container-fluid">
    <div class="panel panel-default">
			<div class="panel-heading">
				<h5></h5>
			</div>
			<!--------------------- UWEKEZAJI MRADI MODEL ------------------------------->
				<!-- Modal -->
				<div class="modal fade" id="uwekezajimradimodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<?php
							$sql="select * from miradi WHERE id = '$miradiid' ";
							$result=mysqli_query($connect, $sql);
						?>
						<?php
							while($data=mysqli_fetch_assoc($result))
							{
						?>
						<form class="form-detail" name="mradiwekezoform" method="POST" action="index.php?p=mradiwekezo" enctype="multipart/form-data" onsubmit="return process();">
							
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Uwekezaji katika Mradi wa <?php print $data["jina"]; ?></h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>

								<div class="modal-body">

									<div class="row">
									
										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="hidden" name="mradiid" id="mradiid" class="form-control form-control-lg" value="<?php print $data["id"]; ?>"/>
											<input type="text" name="thamani" class="form-control form-control-lg" value="<?php print $data["thamani"]; ?>" readonly/>
											<label class="form-label" for="thamani">Thamani nzima ya Mradi</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="number" name="wekezo" class="form-control form-control-lg" required/>
											<label class="form-label" for="name">fedha Iliyowekezwa</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<textarea class="form-control form-control-lg" name="lengo" id="lengo" style="background: #fff;height:50px !important;"></textarea>
											<label class="form-label" for="lengo">Dhumuni / Lengo</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="file" name="lisiti" class="form-control form-control-lg" />
											<label class="form-label" for="lisiti">Lisiti ya Malipo</label>
										</div>
										</div>

									</div>
										
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Futa</button>
									<button type="submit" name="submitwekezo" class="btn btn-primary rounded-pill">Wasilisha</button>
								</div>

						</form>
						<?php
							}
						?>
						</div>
					</div>
				</div>
				<!-- Modal -->
			<!--------------------- UWEKEZAJI MRADI MODEL ------------------------------->
			<!--------------------- NYARAKA MIRADI MODEL ------------------------------->
				<!-- Modal -->
				<div class="modal fade" id="nyarakamradimodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<?php
							$sql="select * from miradi WHERE id = '$miradiid' ";
							$result=mysqli_query($connect, $sql);
						?>
						<?php
							while($data=mysqli_fetch_assoc($result))
							{
						?>
						<form class="form-detail" name="attachnyarakaform" method="POST" action="index.php?p=mradiNyaraka" enctype="multipart/form-data" onsubmit="return process();">
							
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Nyaraka za Mradi wa <?php print $data["jina"]; ?></h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>

								<div class="modal-body">

									<div class="row">

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="hidden" name="mradiid" id="mradiid" class="form-control form-control-lg" value="<?php print $data["id"]; ?>"/>
											<input type="text" name="jinanyaraka" class="form-control form-control-lg" required/>
											<label class="form-label" for="jinanyaraka">Jina la Nyaraka</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="file" name="nyaraka" class="form-control form-control-lg" />
											<label class="form-label" for="nyaraka">Nyaraka</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<textarea class="form-control form-control-lg" name="remark" id="remark" style="background: #fff;height:50px !important;"></textarea>
											<label class="form-label" for="remark">Maelezo</label>
										</div>
										</div>

									</div>
										
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Futa</button>
									<button type="submit" name="nyarakaSubmit" class="btn btn-primary rounded-pill">Wasilisha</button>
								</div>

						</form>
						<?php
							}
						?>
						</div>
					</div>
				</div>
				<!-- Modal -->
			<!--------------------- NYARAKA MRADI MODEL ------------------------------->
			<?php
				$sql="select * from miradi WHERE id = '$miradiid' ";
				$result=mysqli_query($connect, $sql);
				while($data=mysqli_fetch_assoc($result))
				{
			?>
			<!-- /panel-heading -->
				<div class="panel-body">
					<div class="panel-body py-4">
						<!----------------- /personal detail Filter dash ------------------------------------->
						<div class="row justify-content-center align-items-center h-100">
							<div class="col-10">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="#">Dashibodi</a></li>
										<li class="breadcrumb-item"><a href="#">Taarifa za Miradi ya Chama</a></li>
									</ol>
								</nav>
								<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
									<div class="card-body">
										<!--PREVIEW CONTRACT DETAILS-->
									<table class="table table-striped">
                                    	<tbody>
											<tr><td style="width:150px;font-weight:bold;">Jina la Mradi:</td><td style="width:600px;"> <?php print $data["jina"]; ?></td></tr>
											<tr><td style="width:150px;font-weight:bold;">Eneo la Mradi: </td><td><?php print $data["eneo"]; ?></td></tr>
											<tr><td style="width:150px;font-weight:bold;">Thamani ya Mradi: </td><td><?php print $data["thamani"]; ?></td></tr>
                                        
                                      	</tbody>
                                  </table> 
			<?php
				}
			?>
											<!--------------------------------------MAENDELEO YA UWEKEZAJI PANEL----------------------------------------->	
											<div class="card" style="border-radius: 15px;">
													<div class="card-header text-white" style="border-radius: 15px; background-color:#90CFCF">
														<div class="row">
																<div class="col-md-4">
																	<i class="fa fa-angle-double-right"></i>	Maendeleo ya Uwekezaji Mradi
																</div>
																<div class="offset-md-7 col-md-1">
																	<div class="input-group">
																			<button class="btn btn-success rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#uwekezajimradimodal">
																				<i class="fa fa-plus"></i>
																			</button> 
																	</div>
																</div>
														</div>
													</div> <!--/panel-->
														<div class="card-body">
															<?php
																$sql="select * from wekezomiradi WHERE mradi_id = '$miradiid' ";
																$result=mysqli_query($connect, $sql);
																while($data=mysqli_fetch_assoc($result))
																{
															?>
																
																<table class="table" id="manageOrderTable">
																	<thead>
																		<tr>
																			<th>Thamani ya Mradi</th>
																			<th>Fedha iliyowekezwa</th>
																			<th>Lisiti</th>
																			<th>Madhumuni / Lengo</th>
																			<th>Tarehe</th>
																		</tr>
																	</thead>
																	<tbody>
																				<tr>
																					<td><?php print $data["thamani"]; ?></td>
																					<td><?php print $data["wekezo_thamani"]; ?></td>
																					<td>
																						<form class="form-detail" name="viewform" method="POST" action="index.php?p=miradiLisitiPreview" enctype="multipart/form-data" onsubmit="return process();" target="_blank">
																								<div class="input-group">	
																									<input type="hidden" name="miradiid" value="<?php print $data["wekezo_id"]; ?>" >
																									<span class="input-group-append">
																										<button class="btn btn-outline-primary rounded-pill" type="submit" name="AdaLisitiPrev">
																										<i class="fa fa-file-pdf-o"></i>
																										</button>
																									</span>
																								</div>
																						</form>
																					</td>
																					<td><?php print $data["lengo"]; ?></td>
																					<td><?php print $data["tarehe"]; ?></td>
																				</tr>
																	</tbody>
																</table>
															<?php
																}
															?>
														</div>
													</div>
											<!--------------------------------------MAENDELEO YA UWEKEZAJI PANEL----------------------------------------->		
											<!--------------------------------------NYARAKA PANEL----------------------------------------->	
											<div class="card" style="border-radius: 15px;">
													<div class="card-header text-white" style="border-radius: 15px; background-color:#90CFCF">
														<div class="row">
																<div class="col-md-4">
																	<i class="fa fa-angle-double-right"></i>	Nyaraka za Mradi
																</div>
																<div class="offset-md-7 col-md-1">
																	<div class="input-group">
																			<button class="btn btn-success rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#nyarakamradimodal">
																				<i class="fa fa-plus"></i>
																			</button> 
																	</div>
																</div>
														</div>
													</div> <!--/panel-->
														<div class="card-body">
															<?php
																$sql="select * from nyarakamiradi WHERE mradi_id = '$miradiid' ";
																$result=mysqli_query($connect, $sql);
																while($data=mysqli_fetch_assoc($result))
																{
															?>
																
																<table class="table" id="manageOrderTable">
																	<thead>
																		<tr>
																			<th>Jina la Nyaraka</th>
																			<th>Nyaraka</th>
																			<th>Tarehe Iliyotunzwa</th>
																		</tr>
																	</thead>
																	<tbody>
																				<tr>
																					<td><?php print $data["jina_nyaraka"]; ?></td>
																					<td>
																						<form class="form-detail" name="viewform" method="POST" action="index.php?p=miradiNyarakaPreview" enctype="multipart/form-data" onsubmit="return process();" target="_blank">
																								<div class="input-group">	
																									<input type="hidden" name="nyaraka" value="<?php print $data["nyaraka_id"]; ?>" >
																									<span class="input-group-append">
																										<button class="btn btn-outline-primary rounded-pill" type="submit" name="nyarakaPrev">
																										<i class="fa fa-file-pdf-o"></i>
																										</button>
																									</span>
																								</div>
																						</form>
																					</td>
																					<td><?php print $data["tarehe"]; ?></td>
																				</tr>
																	</tbody>
																</table>
															<?php
																}
															?>
														</div>
													</div>
											<!--------------------------------------NYARAKA PANEL----------------------------------------->	
										</div>
										</div>
										<!--MIRADI PROFILE DETAILS-->
									</div>
								</div>
							</div>
						</div>

         				<!----------------- /personal detail Filter dash ------------------------------------->
            		</div>
    			</div>
</div>