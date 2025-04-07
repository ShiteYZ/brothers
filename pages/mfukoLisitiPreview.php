<?php

$mchangoid=$_POST["mchangoid"];

?>
<h5></h5><hr style="color:#f9b500;" />

<div class="container-fluid">
    <div class="panel panel-default">
			<div class="panel-heading">
				<h5></h5>
			</div>
			<!-- /panel-heading -->
				<div class="panel-body">
					<div class="panel-body py-4">
						<!----------------- /bottom dash ------------------------------------->
						<div class="row justify-content-center align-items-center h-100">
							<div class="col-10">
								<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
									<div class="card-body">
												<!--LISITI PRIVIEW-->
												<?php
												$sql="select * from mfukomaendeleo where mchango_id = $mchangoid";
												$result=mysqli_query($connect, $sql);

												while($data=mysqli_fetch_assoc($result))
												{
												?>
													<div style="width: 100%; height: 100%">
														<object data="lisitipdf/<?php print $data["lisiti"]; ?>" type="application/pdf" style="width: 100%; min-height: 100vh"> </object>
													</div>
												<?php
													}
												?>
									</div>
								</div>
							</div>
						</div>

         				<!----------------- /bottom dash ------------------------------------->
            		</div>
    			</div>
</div>