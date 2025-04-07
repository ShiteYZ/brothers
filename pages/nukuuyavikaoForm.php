<?php include('includes/navbar.php');
date_default_timezone_set("Africa/Nairobi");
$today = date('d-m-Y');
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
													<li class="breadcrumb-item"><a href="#">Nukuu ya Matukio/Vikao</a></li>
												</ol>
											</nav>
											<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
												<div class="card-header bg-default" style="border-radius: 15px;">
														<div class="row">
																<div class="col-md-4">
																	<i class="fa fa-angle-double-right"></i>	Nukuu ya Matukio/Vikao
																</div>
																<div class="offset-md-4 col-md-4">
																	<div class="input-group">
																		<a href="index.php?p=thibitishamalipo">
																			<button class="btn btn rounded-pill text-white" type="button" style="border-radius: 15px; background-color:#47B0AF">
																						<i class="fa fa-ok">Matukio/Vikao Vilivyokwisha Fanyika</i>
																			</button> 
																		</a> 
																	</div>
																</div>
														</div>
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
																		<div class="col-md-4 mb-4">
																			<div class="table-responsive">
																				<table class="table table-striped">
																							<h6>MATUKIO / VIKAO LEO Tar <?php print $today; ?></h6>
																							<tbody>
																								<?php
																								$sql="select * from matukio";
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
																											<form class="form-detail" name="searchform" method="POST" action="index.php?p=nukuuyavikaoForm" enctype="multipart/form-data">
																												<input type="hidden" name="tukioId" class="form-control form-control-lg" value="<?php print $data["id"]; ?>" />
																												<button type="submit" name="tukiobtn" class="form-control btn btn-primary rounded submit px-3" style="text-align:right">
																													<?php print $data["tukio"]; ?> <i class="fa fa-chevron-circle-right"></i>
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
																			$tukioId =$_POST['tukioId'];
																			$sqltukioid="select * from matukio where id = '".$tukioId."'";
																			$resulttukioid=mysqli_query($connect, $sqltukioid);

																			while($datatukioid=mysqli_fetch_assoc($resulttukioid))
																			{
																		?>
																		<div class="col-md-8 mb-8 py-5">
																				<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
																					<div class="card-body">
																							<form class="form-detail" name="addstaffform" method="POST" action="index.php?p=nukuuyavikaoSubmit" enctype="multipart/form-data" onsubmit="return process();">
																									<div class="row">
																										<div class="col-md-12 mb-12">
																										<div class="form-outline">
																											<fieldset>
																											<label class="form-label" for="jinaKikao">Tukio/ Kikao</label>
																											</fieldset>
																											<input type="hidden" name="tukioId" class="form-control form-control-lg" value="<?php print $datatukioid["id"]; ?>"/>
																											<input type="text" name="jinaKikao" class="form-control form-control-lg" value="<?php print $datatukioid["tukio"]; ?>" readonly/>
																										</div>
																										</div>

																										<div class="col-md-12 mb-12">
																										<div class="form-outline">
																											<fieldset><hr />
																											<label class="form-label" for="mahudhurio">Mahudhurio</label>
																											</fieldset>
																											<?php
																												$sqlm="select * from members";
																												$resultm=mysqli_query($connect, $sqlm);
																												while($datam=mysqli_fetch_assoc($resultm))
																												{
																											?>
																											<div class="form-check form-check-inline">
																												<input class="form-check-input" type="checkbox" name="mahudhurio[]" id="mahudhurio"
																												value="<?php print $datam["fname"]." ".$datam["mname"]." ".$datam["lname"]; ?>" />
																												<label class="form-check-label" for="mahudhurio"><?php print $datam["fname"]." ".$datam["mname"]." ".$datam["lname"]; ?></label>
																											</div>
																											<?php
																												}
																											?>
																											
																										</div>
																										</div>

																										<div class="col-md-12 mb-12">
																										<div class="form-outline">
																											<fieldset><hr />
																											<label class="form-label" for="mhutasari">Mhutasari wa Kikao</label>
																											</fieldset>
																											<textarea name="mhutasari" class="form-control form-control-lg"></textarea>
																										</div>
																										</div>

																										<div class="col-md-6 mb-6">
																										<div class="form-outline">
																											<fieldset><hr />
																											<label class="form-label" for="matumizi">Kiasi Taslimu cha Fedha Matumizi ya kikao</label>
																											</fieldset>
																											<input type="number" name="matumizi" class="form-control form-control-lg" required/>
																										</div>
																										</div>

																										<div class="col-md-6 mb-6">
																										<div class="form-outline">
																											<fieldset><hr />
																											<label class="form-label" for="matumizi">Nukuu ya Fedha Matumizi</label>
																											</fieldset>
																											<textarea name="nukuu" class="form-control form-control-lg"></textarea>
																										</div>
																										</div>

																										<div class="col-md-12 mb-12">
																										<div class="form-outline">
																											<fieldset><hr />
																											<label class="form-label" for="ambatanisho">Ambatanisho</label>
																											</fieldset>
																											<input type="file" name="ambatanisho" class="form-control" />
																										</div>
																										</div>

																										
																										<div class="form-group py-4">
																											<button type="submit" name="wasilisha" class="form-control btn btn-primary rounded submit px-3">Wasilisha</button>
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
 