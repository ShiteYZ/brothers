<?php include('includes/navbar.php'); 
$mkopaji = $_SESSION['userId'];
?>
<h5></h5><hr style="color:#f9b500;" />

<div class="container-fluid">
    <div class="panel panel-default">
			<div class="panel-heading">
				<h5></h5>
			</div>
				<!-- Modal -->
				<div class="modal fade" id="mkopomodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<?php
							$sql="select * from members WHERE user_id = '$mkopaji' ";
							$result=mysqli_query($connect, $sql);
						?>
						<?php
							while($data=mysqli_fetch_assoc($result))
							{
						?>
						<form class="form-detail" name="addstaffform" method="POST" action="index.php?p=maombiMkopo" enctype="multipart/form-data" onsubmit="return process();">
							
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Omba Mkopo</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>

								<div class="modal-body">

									<div class="row">

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="hidden" name="userid" id="userid" class="form-control form-control-lg" value="<?php print $data["user_id"]; ?>"/>
											<input type="text" name="jina" class="form-control form-control-lg" value="<?php print $data["fname"]." ".$data["mname"]." ".$data["lname"]; ?>" readonly />
											<label class="form-label" for="jinaMradi">Jina la Mkopaji</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="text" name="mkopo" id="mkopo" class="form-control form-control-lg" oninput="calc2();"/>
											<label class="form-label" for="mkopo">Kiasi cha Mkopo unachohitaji</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="text" name="riba" id="riba" class="form-control form-control-lg" oninput="calc2();" readonly />
											<label class="form-label" for="riba">Riba 5%</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="text" name="rejesho" id="rejesho" class="form-control form-control-lg" readonly/>
											<label class="form-label" for="rejesho">Jumla ya Mkopo na Riba <mark><b>(Fedha utakayorejesha)</b></mark></label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="date" name="tarehekuchukua" id="tarehekuchukua" class="form-control form-control-lg" oninput="calcdate();" />
											<label class="form-label" for="tarehekuchukua">Tarehe unayohitaji Mkopo</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="text" name="tarehekurudisha" id="tarehekurudisha" class="form-control form-control-lg" readonly/>
											<label class="form-label" for="tarehekurudisha">Tarehe mwisho kurejesha Mkopo</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="text" name="dhumuni" id="dhumuni" class="form-control form-control-lg" />
											<label class="form-label" for="dhumuni">Dhumuni la Mkopo</label>
										</div>
										</div>

										<div class="col-md-12 mb-12">
										<div class="form-outline">
											<input type="text" name="akaunti" class="form-control form-control-lg" value="<?php print $data["akaunti_benki"]; ?>" readonly/>
											<label class="form-label" for="akaunti">Namba ya Akaunti ya Benki</label>
										</div>
										</div>

									</div>
										
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-warning rounded-pill" data-bs-dismiss="modal">funga</button>
									<button type="submit" name="recodimkopo" class="btn btn-primary rounded-pill">Recodi</button>
								</div>

						</form>
						<?php
							}
						?>
						</div>
					</div>
				</div>
				<!-- Modal -->
			<!-- /panel-heading -->
				<div class="panel-body">
					<div class="panel-body py-4">
						<!----------------- /bottom dash ------------------------------------->
						<div class="row justify-content-center align-items-center h-100">
							<div class="col-10">
								<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
									<div class="card-body">
										<!--REGISTER FORM-->
										<div class="row justify-content-center">
										<div class="login-wrap p-4 p-md-5">
											<div class="d-flex">
												<div class="w-100">
													<h3 class="mb-4">Masharti ya Mkopo</h3>
												</div>
											</div>
											<div class="row">

													<!--MASHARTI YA MKOPO-->	  
													<p>Soma kwa Makini Masharti na Taratibu za kuomba Mkopo na kisha thibitisha kukubaliana na Masharti na Taratibu kama zilivyoainishwa hapo chini:</p>
													<dl>
														<dt>Sifa za Mwombaji</dt>
														<dd>1. Awe mwanachama Hai wa Best Brothers </dd>
														<dd>2. Awe Hadaiwi michango ya <abbr title="kiasi kilicholipwa au kutozwa kwa huduma">Ada</abbr>, <abbr title="Michango tunayochangisha">Upatu</abbr> au Mkopo mwingine ndani ya Kikundi </dd>
														<dt>Mkopo na Marejesho</dt>
														<dd>3. Kiwango cha juu cha kuchukua mkopo ni <mark>Tshs. 15,000,000/= (Milioni Kumi na Tano)</mark></dd>
														<dd>4. Mda wa Marejesho ni Kipindi cha Miezi Mitatu kwa Rejesho la Riba ya <mark>5%</mark> (Asilimia 5) ya Mkopo wote</dd>
														<dd>5. Mnufaika wa mkopo atatakiwa kurejesha mkopo katika awamu tatu ambapo kila mwezi atatakiwa kurejesha moja ya tatu ya mkopo wote <mark>(Mkopo na riba gawanya kwa awamu tatu)</mark></dd>
														<dd>6. Mwombaji atakayeshindwa kurejesha mkopo wote ndani ya mwezi mmoja (1) atatozwa faini ya 0.02% kila siku ya jumla ya mkopo mama, riba na ongezeko la kila siku (Compounding Interest) </dd>
														<dd>7. wombaji atapata mkopo wake mara baada ya maombi yake kuwasilishwa na kupitishwa na kamati ya Kuratibu na usimamizi wa mkopo </dd>
														<dd>8. wombaji atapokea mkopo wake kupitia Benki na marejesho ya mkopo yatafanyika kupitia Akaunti ya Benki ya Kikundi <mark>NMB. BEST BROTHERS GROUP - IPAGALA. <b>53010011360</b> </mark></dd>
													</dl>
													<!--------------------------------------MASHARTI KIPIMO----------------------------------------->	
														<div class="card" style="border-radius: 15px;">
																<div class="card-header bg-primary text-white" style="border-radius: 15px;">
																	<div class="row">
																			<?php
																				$sql="select * from members WHERE user_id = '$mkopaji' ";
																				$result=mysqli_query($connect, $sql);
																			
																				while($data=mysqli_fetch_assoc($result))
																				{
																			?>
																			<div class="col-md-12">
																				<i class="fa fa-angle-double-right"></i> Je Ndugu <?php print $data["fname"]." ".$data["lname"]; ?> Umekidhi Vigezo?
																			</div>
																			<?php
																				}
																			?>
																	</div>
																</div> <!--/panel-->
																	<div class="card-body">
																			<table class="table" id="manageOrderTable">
																				<thead>
																					<tr>
																						<th>Sifa</th>
																						<th>Maksi</th>
																					</tr>
																				</thead>
																				<tbody>
																							<tr>
																								<td style="text-align:left;">Je ni Mwanachama Hai wa Best Brothers?</td>
																								<td>Ndio</td>
																							</tr>
																							<tr>
																								<td style="text-align:left;">Je ni amelipa Michango ya Ada na Mfuko wa Maendeleo?</td>
																								<td>Ndio</td>
																							</tr>
																							<tr>
																								<td style="text-align:left;">Je ana mkopo wowote ulio Hai</td>
																								<td>Hapana</td>
																							</tr>
																				</tbody>
																			</table>
																	</div>
																</div>
														<!--------------------------------------MASHARTI KIPIMO----------------------------------------->	

													<div align="right">
														<button class="btn btn-success rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#mkopomodal">
																<i class="fa fa-check-square-o"></i> Kubali Masharti & Omba Mkopo
														</button> 
														<a href="index.php?p=dashboard"><button class="btn btn-danger rounded-pill" data-filter="hdpe">Kataa</button></a>
													</div>
												<!--MASHARTI YA MKOPO-->

											</div>
										</div>
										</div>
										<!--END REGISTER FORM-->
									</div>
								</div>
							</div>
						</div>

         				<!----------------- /bottom dash ------------------------------------->
            		</div>
    			</div>
</div>
<script>
	function calc2() {
	var mkopo = document.getElementById("mkopo").value;
	var mkopo = parseInt(mkopo, 10);
	var riba = 0.05 * mkopo;
	document.getElementById("riba").value = riba;

	var ribajumla = document.getElementById("riba").value;
	var ribajumla = parseInt(ribajumla, 10);

	var rejesho = mkopo + ribajumla;
	document.getElementById("rejesho").value = rejesho;
	};

	function calcdate() {
		var mkopodate = new Date(document.getElementById("tarehekuchukua").value);
		var no_of_months = 3;
		mkopodate.setMonth(mkopodate.getMonth() + no_of_months)
        document.getElementById("tarehekurudisha").value = mkopodate.toLocaleDateString();
	};
</script>