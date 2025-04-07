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
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-body">

													<fieldset>
																<legend>Lipisha Ada</legend>
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
																		<div class="col-md-4 mb-4">
																			<div class="table-responsive">
																				<table class="table table-striped">
																							<h5>Mwanachama</h5>
																							<tbody>
																								<?php
																								$sql="select * from members";
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
																											<form class="form-detail" name="searchform" method="POST" action="index.php?p=lipishaada" enctype="multipart/form-data">
																												<input type="hidden" name="userId" class="form-control form-control-lg" value="<?php print $data["user_id"]; ?>" />
																												<button type="submit" name="register" class="form-control btn btn-primary rounded submit px-3">
																													<?php print $data["fname"]." ".$data["mname"]." ".$data["lname"]; ?> <i class="fa fa-chevron-circle-right"></i>
																												</button>
																												
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
																		<?php
																			$userId =$_POST['userId'];
																			$sqluserid="select * from members where user_id = '".$userId."'";
																			$resultuserid=mysqli_query($connect, $sqluserid);

																			while($datauserid=mysqli_fetch_assoc($resultuserid))
																			{
																		?>
																		<div class="col-md-8 mb-8 py-5">
																				<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																					<div class="card-body">
																							<form class="form-detail" name="addstaffform" method="POST" action="index.php?p=lipishaadasubmit" enctype="multipart/form-data" onsubmit="return process();">
																									<div class="row">
																										<div class="col-md-8 mb-8">
																										<div class="form-outline">
																											<input type="hidden" name="userid" class="form-control form-control-lg" value="<?php print $datauserid["user_id"]; ?>" />
																											<input type="hidden" name="approval" class="form-control form-control-lg" value="1" />
																											<input type="text" name="Names" class="form-control form-control-lg" value="<?php print $datauserid["fname"]." ".$datauserid["mname"]." ".$datauserid["lname"]; ?>" />
																											<label class="form-label" for="Names">Majina Kamili</label>
																										</div>
																										</div>

																										<div class="col-md-4 mb-4">
																										<div class="form-outline">
																											<input type="number" name="fedha" class="form-control form-control-lg" required/>
																											<label class="form-label" for="fedha">Kiasi cha Fedha Anacholipa</label>
																										</div>
																										</div>

																										<div class="col-md-4 mb-4">
																										<div class="form-outline">
																											<select class="form-control" name="financialyear">
																												<?php
																													$startyear = date('Y');
																													$endyear = $startyear + 3;

																													for ($i = $startyear; $i <= $endyear; $i++){
																														echo '<option value='.$i.'>'.$i.'</option>';
																													}

																												?>
																											</select>
																											<label class="form-label" for="middleName">Mwaka wa Fedha</label>
																										</div>
																										</div>

																										<div class="col-md-4 mb-4">
																										<div class="form-outline">
																												<select class="form-control" name="month">
																													<?php
																														$month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");

																														foreach ($month_names as $month){
																															echo '<option value='.$month.'>'.$month.'</option>';
																														}

																													?>
																												</select>
																											<label class="form-label" for="lastName">Mwezi wa Malipo</label>
																										</div>
																										</div>

																										<div class="col-md-4 mb-4">
																										<div class="form-outline">
																											<input type="file" name="lisiti" class="form-control" required/>
																											<label class="form-label" for="lisiti">Lisiti ya Malipo</label>
																										</div>
																										</div>

																										<div class="form-group">
																											<button type="submit" name="lipisha" class="form-control btn btn-warning rounded submit px-3">Lipisha</button>
																										</div>
																									</div>
																							</form>
																					</div>
																				</div>
																		</div>
																		<?php
																			}
																		?>
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
 