<?php include('includes/navbar.php');
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
			<!-- /panel-heading -->
				<div class="panel-body">
					<div class="panel-body py-4">
						<!----------------- /members display dash ------------------------------------->
									<div class="row justify-content-center align-items-center h-100">
										<div class="col-10">
											<nav aria-label="breadcrumb">
												<ol class="breadcrumb">
													<li class="breadcrumb-item"><a href="#">Dashibodi</a></li>
													<li class="breadcrumb-item"><a href="#">Wanachama</a></li>
													<li class="breadcrumb-item active" aria-current="page">Orodha ya wanachama</li>
												</ol>
											</nav>
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-header bg-primary text-white" style="border-radius: 15px;">
														<i class="fa fa-angle-double-right"></i>	Wanachama
												</div> <!--/panel-->
												<div class="card-body">
																		<!--Search box-->
																		<div class="row">
																			<div class="offset-md-5 col-md-4">
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
																			<div class="col-md-3">
																				<div class="input-group">
																					<a href="index.php?p=register">
																					<button class="btn btn-outline-primary rounded-pill" type="button">
																						<i class="fa fa-plus"></i> Ongeza Mwanachama
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
																				<th>Anuani</th>
																				<th>Mawasiliano</th>
																				<th>Barua Pepe</th>
																				<th>Cheo</th>
																			</thead>
																			
																			<tbody>
																				<?php
																				$sql="select * from members";
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
																						<td><?php print $data["address"]; ?></td>
																						<td><?php print $data["contact"]; ?></td>
																						<td><?php print $data["email"]; ?></td>
																						<td>
																						<?php
																							if($mtiasahihi == 'Katibu' || $mtiasahihi == 'System Administrator' ){
																						?>
																							<form class="form-detail" name="viewform" method="POST" action="index.php?p=editMember" enctype="multipart/form-data" onsubmit="return process();">
																								<div class="input-group">	
																									<input type="hidden" name="userid" value="<?php print $data["user_id"]; ?>" >
																									<span class="input-group-append">
																										<button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="submit">
																											<i class="fa fa-edit"></i> <?php print $data["previlege"]; ?>
																										</button>
																									</span>
																								</div>
																							</form>
																						<?php
																							}else{
																						?>
																								<button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="button">
																									<i class="fa fa-edit"></i> <?php print $data["previlege"]; ?>
																								</button>
																						<?php
																							}
																						?>
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
 