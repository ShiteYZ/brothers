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
			<!--------------------- CHANGE PASSWORD MODEL ------------------------------->
				<!-- Modal -->
				<div class="modal fade" id="changepassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<?php
							$sql="select * from members WHERE user_id = '$wasifuid' ";
							$result=mysqli_query($connect, $sql);
						?>
						<?php
							while($data=mysqli_fetch_assoc($result))
							{
						?>
						<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=badilipassword" enctype="multipart/form-data" onsubmit="return process();">
							
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Badili Password(NYWILA)</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>

								<div class="modal-body">

									<div class="row">
									
										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="hidden" name="userid" id="userid" class="form-control form-control-lg" value="<?php print $data["user_id"]; ?>"/>
											<input type="text" name="loginname" class="form-control form-control-lg" value="<?php print $data["login_name"]; ?>"readonly/>
											<label class="form-label" for="name">Jina la Mtumiaji</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="password" name="password" class="form-control form-control-lg" />
											<label class="form-label" for="contact">Password Mpya(Nywila)</label>
										</div>
										</div>

									</div>
										
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Close</button>
									<button type="submit" name="badilipasswordSubmit" class="btn btn-primary rounded-pill">Badili Nywila</button>
								</div>

						</form>
						<?php
							}
						?>
						</div>
					</div>
				</div>
				<!-- Modal -->
			<!--------------------- CHANGE PASSWORD MODEL ------------------------------->
			<!--------------------- REGISTER FAMILY MODEL ------------------------------->
				<!-- Modal -->
				<div class="modal fade" id="ongezafamilia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<?php
							$sql="select * from members WHERE user_id = '$wasifuid' ";
							$result=mysqli_query($connect, $sql);
						?>
						<?php
							while($data=mysqli_fetch_assoc($result))
							{
						?>
						<form class="form-detail" name="attachaddendumform" method="POST" action="index.php?p=registerFamily" enctype="multipart/form-data" onsubmit="return process();">
							
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Sajili Familia</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>

								<div class="modal-body">

									<div class="row">
									
										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="hidden" name="userid" id="userid" class="form-control form-control-lg" value="<?php print $data["user_id"]; ?>"/>
											<input type="text" name="name" class="form-control form-control-lg" required/>
											<label class="form-label" for="name">Jina la Mwanafamilia</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="date" name="dob" class="form-control form-control-lg" />
											<label class="form-label" for="DoB">Tarehe ya Kuzaliwa</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="number" name="contact" class="form-control form-control-lg" />
											<label class="form-label" for="contact">Namba ya Simu</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
											<div class="form-outline">
												<select class="form-control form-control-lg" name="relation"  required>
													<option value="" disabled>Uhusiano</option>
													<option value="MKE">MKE</option>
													<option value="MTOTO">MTOTO</option>
													<option value="MZAZI">MZAZI</option>
													<option value="NDUGU">NDUGU</option>
												</select>
												<label class="form-label" for="Ralation">Uhusiano</label>
											</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="file" name="passport" class="form-control form-control-lg" />
											<label class="form-label" for="passport">Pasipoti Picha</label>
										</div>
										</div>

									</div>
										
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">Close</button>
									<button type="submit" name="registerFamilySubmit" class="btn btn-primary rounded-pill">Upload</button>
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
			<?php
				$sql="select * from members WHERE user_id = '$wasifuid' ";
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
										<li class="breadcrumb-item"><a href="#">Taarifa zangu</a></li>
									</ol>
								</nav>
								<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
									<div class="card-header bg-default" style="border-radius: 15px;">
											<div class="row">
													<div class="col-md-4">
														<i class="fa fa-angle-double-right"></i>	Taarifa zangu
													</div>
													<div class="offset-md-5 col-md-3">
														<div class="input-group">
																<button class="btn btn-success rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#changepassword">
																	<i class="fa fa-edit"></i> Badili Password
																</button> 
														</div>
													</div>
											</div>
									</div> <!--/card header-->
									<div class="card-body">
										<!--PREVIEW CONTRACT DETAILS-->
									<table class="table table-striped">
                                    	<tbody>
											<tr><!-----Passport---->
												<td style="width:150px;"></td>
												<td style="text-align:right;"><embed src="passports/<?php print $data["passport"]; ?>" type="image/jpg" width="100px" height="100px"> </embed> </td>
											</tr>
											<tr><td style="width:150px;font-weight:bold;">Majina Kamili:</td><td style="width:600px;"> <?php print $data["fname"]." ".$data["mname"]." ".$data["lname"]; ?></td></tr>
											<tr><td style="width:150px;font-weight:bold;">Jinsia: </td><td><?php print $data["gender"]; ?></td></tr>
											<tr><td style="width:150px;font-weight:bold;">Miaka: </td><td><?php print $data["bday"]; ?></td></tr>
											<tr><td style="width:150px;font-weight:bold;">NIDA: </td><td><?php print $data["nida"]; ?></td></tr>
											<tr><td style="width:150px;font-weight:bold;">Barua Pepe: </td><td><?php print $data["email"]; ?></td></tr>
											<tr><td style="width:150px;font-weight:bold;">Simu: </td><td><?php print $data["contact"]; ?></td></tr>
											<tr><td style="width:150px;font-weight:bold;">Akaunti ya Benki:</td><td><?php print $data["akaunti_benki"]; ?></td></tr>
                                        
                                      	</tbody>
                                  </table> 
			<?php
				}
			?>
											<!--------------------------------------FAMILIA PANEL----------------------------------------->	
											<div class="card" style="border-radius: 15px;">
													<div class="card-header text-white" style="border-radius: 15px; background-color:#47B0AF">
														<div class="row">
																<div class="col-md-4">
																	<i class="fa fa-angle-double-right"></i>	Familia
																</div>
																<div class="offset-md-7 col-md-1">
																	<div class="input-group">
																			<button class="btn btn-success rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#ongezafamilia">
																				<i class="fa fa-plus"></i>
																			</button> 
																	</div>
																</div>
														</div>
													</div> <!--/panel-->
														<div class="card-body">
															<?php
																$sql="select * from family WHERE user_id = '$wasifuid' ";
																$result=mysqli_query($connect, $sql);
																while($data=mysqli_fetch_assoc($result))
																{
															?>
																
																<table class="table" id="manageOrderTable">
																	<thead>
																		<tr>
																			<th>Jina la Mwanafamilia</th>
																			<th>Miaka</th>
																			<th>Simu/ Mawasiliano</th>
																			<th>Uhusiano</th>
																			<th>Pasipoti picha</th>
																		</tr>
																	</thead>
																	<tbody>
																				<tr>
																					<td><?php print $data["names"]; ?></td>
																					<td><?php print $data["dob"]; ?></td>
																					<td><?php print $data["contact"]; ?></td>
																					<td><?php print $data["relation"]; ?></td>
																					<td style="text-align:left;"><img src="passports/<?php print $data["passport"]; ?>" type="image/jpg" width="100px" height="100px"></td>
																				</tr>
																	</tbody>
																</table>
															<?php
																}
															?>
														</div>
													</div>
											<!--------------------------------------FAMILIA PANEL----------------------------------------->		
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