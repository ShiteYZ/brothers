
<form class="form-detail" name="searchform" method="POST" action="index.php?p=gofillForm" enctype="multipart/form-data">
    <!-------------------INNER PANEL---------------------------->
    <div class="row">
        <div class="col-md-6 py-4"><!--COL-3-->
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <!--CARD HEADER-->
                    <div class="card-header text-white" style="border-radius: 15px; background-color:#FFA500">
                        <i class="fa fa-angle-double-right"></i> Activity, Train No and Coach No
                    </div>
                    <!--CARD HEADER-->
                    <div class="card-body">
                        <input type="hidden" class="form-control" name="activityId"  value="<?php print $activityId; ?>" />	
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Activity</span>
                            <input type="text" class="form-control" name="activityName" aria-describedby="basic-addon3" value="<?php print $activityName; ?>" readonly />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Train No</span>
                            <input type="text" class="form-control" name="activityName" aria-describedby="basic-addon3" value="<?php print $Train; ?>" readonly />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Coach No</span>
                            <input type="text" class="form-control" name="activityName" aria-describedby="basic-addon3" value="<?php print $Couch; ?>" readonly />
                        </div>
                    </div>
            </div>
        </div><!-- END OF COL-3-->
        <div class="col-md-6 py-4"><!--COL-3-->
        <fieldset>
        <legend>External Cleaning of Coaches Form</legend>
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <!--CARD HEADER-->
                    <div class="card-header bg-default text-orange" style="border-radius: 15px;text-align:center;text-color:#FFA500;">
                        External Cleaning of Coaches
                    </div>
                    <!--CARD HEADER-->
                    <div class="card-body">
                            <!--INPUT FOR SUPERVISION FORM-->
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  External Cleaning of Coaches</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="externalcleaning" id="provided"
                                            value="Cleaned" checked />
                                            <label class="form-check-label" for="Provided">Cleaned</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="externalcleaning" id="notprovided"
                                            value="Not Cleaned" />
                                            <label class="form-check-label" for="Not Provided">Not Cleaned</label>
                                        </div>
                                </div>
                            </div>
                            <!--/INPUT FOR SUPERVISION FORM-->
                    </div>
            </div>
            <!-- COMMENTS -->
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <!--CARD HEADER-->
                    <div class="card-header bg-default text-orange" style="border-radius: 15px;text-align:center;">
                        Write Down Comment if Any
                    </div>
                    <!--CARD HEADER-->
                    <div class="card-body">
                            <!--INPUT COMMENT FOR SUPERVISION FORM-->
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset>
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Comment / Remark</label>
                                    </fieldset>
                                    <textarea name="mhutasari" class="form-control form-control-lg"></textarea>
                                </div>
                            </div>
                            <!--/INPUT COOMENT FOR SUPERVISION FORM-->
                    </div>
            </div>
            <!-- COMMENT -->
            <div class="form-group">
                <button type="submit" name="toSupervisionForm" class="form-control btn btn-warning rounded submit px-3" style="background-color: #00B074;">Submit External Cleaning Report</button>
            </div>
        <fieldset>
        </div><!-- END OF COL-3-->
        </div>
    <!-------------------INNER PANEL---------------------------->
</form>