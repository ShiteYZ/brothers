<?php 
	include('includes/navbar.php'); 
	date_default_timezone_set("Africa/Nairobi");
	$date = date("Y");

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
											<nav aria-label="breadcrumb">
												<ol class="breadcrumb">
													<li class="breadcrumb-item"><a href="#">Dashibodi</a></li>
													<li class="breadcrumb-item"><a href="#">Viongozi</a></li>
													<li class="breadcrumb-item active" aria-current="page">Viongozi wa Chama</li>
												</ol>
											</nav>
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-header text-white" style="border-radius: 15px; background-color:#47B0AF">
														<i class="fa fa-angle-double-right"></i> Viongozi wa Chama
												</div> <!--/panel-->
												<div class="card-body">
																<div class="row">
																		<div class="col-md-8 mb-8">
																			<div class="table-responsive">
																				<table class="table table-striped">
																							<thead>
																								<th>No</th>
																								<th>Majina</th>
																								<th>Cheo</th>
																							</thead>
																							
																							<tbody>
																								<?php
																								$sql="select members.user_id, members.fname, members.mname, members.lname, members.previlege, vyeo.cheo, vyeo.user_id
																										FROM members
																										INNER JOIN vyeo ON members.user_id=vyeo.user_id";
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
																										<td><?php print $data["cheo"]; ?></td>
																										<td>
																												<form class="form-detail" name="viewform" method="POST" action="index.php?p=prevnotes" enctype="multipart/form-data" onsubmit="return process();">
																													<div class="input-group">	
																														<input type="text" name="patientid" class="form-control border-end-0 border rounded-pill" value="<?php print $data["amount"]; ?>">
																														<span class="input-group-append">
																															<button type="submit" name="cheobtn" class="btn btn-primary rounded-pill">Kabidhi Ofisi</button>
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
																		<!-------------------CHEO---------------------------->
																		<div class="col-md-4 mb-4 py-5">
																			<!-------------------SAJILI CHEO---------------------------->
																			<div class="card shadow-2-strong card-registration" style="border-radius: 15px; ">
																				<div class="card-body">
																						<form class="form-detail" name="cheoform" method="POST" action="index.php?p=cheosubmit" enctype="multipart/form-data" onsubmit="return process();">
																							<div class="row">
																								<div class="col-md-12 mb-12">
																									<div class="form-outline">
																										<input type="text" name="cheo" class="form-control form-control-lg" required/>
																										<label class="form-label" for="cheo">JINA LA CHEO</label>
																									</div>
																								</div>
																							</div>
																							<button type="submit" name="cheobtn" class="btn btn-primary rounded-pill">Wasilisha</button>
																						</form>
																						<!-------------TABLE TO VIEW VYEO------------------>
																						<div class="table-responsive">
																							<table class="table table-striped">
																										<thead>
																											<th>No</th>
																											<th>Cheo</th>
																										</thead>
																										
																										<tbody>
																											<?php
																											$sqlcheo="select * from vyeo";
																											$resultcheo=mysqli_query($connect, $sqlcheo);
																											$sNo = 1;
																											?>
																											<?php
																											while($datacheo=mysqli_fetch_assoc($resultcheo))
																											{
																												?>
																												<tr>
																													<td><?php print $sNo; ?></td>
																													<td><?php print $datacheo["cheo"]; ?></td>
																													</tr>
																											<?php
																													$sNo++;
																												}
																											?>
																										</tbody>
																										
																							</table>
																						</div>
																						<!-------------TABLE TO VIEW VYE------------------->
																				</div>
																			</div>
																			<!-------------------SAJILI CHEO---------------------------->
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
 