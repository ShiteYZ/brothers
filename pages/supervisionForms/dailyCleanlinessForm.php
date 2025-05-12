
<form class="form-detail" name="searchform" method="POST" action="index.php?p=supervisionForm" enctype="multipart/form-data">
    <!-------------------INNER PANEL---------------------------->
    <div class="row">
        <div class="col-md-6 py-4"><!--COL-3-->
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <!--CARD HEADER-->
                    <div class="card-header text-white" style="border-radius: 15px; background-color:#FFA500">
                            <div class="row">
                                <div class="col-md-8">
                                    <i class="fa fa-angle-double-right"></i>	Select Station, And Train No
                                </div>
                                <div class="offset-md-2 col-md-2">
                                    <div class="input-group">
                                        <a href="index.php?p=cleanlinessAndSupervision">
                                            <button class="btn btn rounded-pill" type="button" style="background-color:#FFFFFF">
                                                        <i class="fa fa-reply"></i>
                                            </button> 
                                        </a> 
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!--CARD HEADER-->
                    <div class="card-body">
                        <input type="hidden" class="form-control" name="activityId"  value="<?php print $activityId; ?>" />	
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Activity</span>
                            <input type="text" class="form-control" name="activityName" aria-describedby="basic-addon3" value="<?php print $activityName; ?>" readonly />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Station</span>
                            <input type="text" class="form-control" name="stationName" aria-describedby="basic-addon3" value="<?php print $searchstation; ?>" readonly />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Train No</span>
                            <input type="text" class="form-control" name="trainNo" aria-describedby="basic-addon3" value="<?php print $Train; ?>" readonly />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Supervision Reference No</span>
                            <input type="text" class="form-control" name="superRef" aria-describedby="basic-addon3" value="<?php print $supervisorRef; ?>" readonly />
                        </div>
                    </div>
            </div>
        </div><!-- END OF COL-3-->
        <div class="col-md-6 py-4"><!--COL-3-->
        <fieldset>
        <legend>Cleanliness Supervision Form</legend>
                <!--COACH INPUT WITH auto Search-->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Couch No</span>
                        <input type="text" class="form-control" id="searchchouch" name="searchchouch" aria-describedby="basic-addon3" placeholder="eg BCB-K-2201" autocomplete="off" required>
                    </div>
                    <div class="list-group list-group item-action" id="coachretrieval"></div>
                <!--/COACH INPUT WITH auto Search-->
        <!--CLEANING AND DISINFECTION OF COACH CARD -->
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <!--CARD HEADER-->
                    <div class="card-header bg-default text-orange" style="border-radius: 15px;text-align:center;">
                        Cleaning and Disinfection of Coaches
                    </div>
                    <!--CARD HEADER-->
                    <div class="card-body">
                            <!--INPUT FOR SUPERVISION FORM-->
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset>
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Hand Wash Soap Provision</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="handwash" id="provided"
                                            value="Provided" checked />
                                            <label class="form-check-label" for="Provided">Provided</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="handwash" id="notprovided"
                                            value="Not Provided" />
                                            <label class="form-check-label" for="Not Provided">Not Provided</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Interleave Tissue / Hand Paper Towel Provision</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tissue" id="provided"
                                            value="Provided" checked />
                                            <label class="form-check-label" for="Provided">Provided</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tissue" id="notprovided"
                                            value="Not Provided" />
                                            <label class="form-check-label" for="Not Provided">Not Provided</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Inside Window Cleaning</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="windowcleaning" id="provided"
                                            value="Cleaned" checked />
                                            <label class="form-check-label" for="Provided">Cleaned</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="windowcleaning" id="notprovided"
                                            value="Not Cleaned" />
                                            <label class="form-check-label" for="Not Provided">Not Cleaned</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Floor Cleaning</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="floorcleaning" id="provided"
                                            value="Cleaned" checked />
                                            <label class="form-check-label" for="Provided">Cleaned</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="floorcleaning" id="notprovided"
                                            value="Not Cleaned" />
                                            <label class="form-check-label" for="Not Provided">Not Cleaned</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Seats Cleaning</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="seatcleaning" id="provided"
                                            value="Cleaned" checked />
                                            <label class="form-check-label" for="Provided">Cleaned</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="seatcleaning" id="notprovided"
                                            value="Not Cleaned" />
                                            <label class="form-check-label" for="Not Provided">Not Cleaned</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Tables Cleaning</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tablescleaning" id="provided"
                                            value="Cleaned" checked />
                                            <label class="form-check-label" for="Provided">Cleaned</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tablescleaning" id="notprovided"
                                            value="Not Cleaned" />
                                            <label class="form-check-label" for="Not Provided">Not Cleaned</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Application of Certified Detergents</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="applydetergents" id="provided"
                                            value="Applied" checked />
                                            <label class="form-check-label" for="Provided">Yes</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="applydetergents" id="notprovided"
                                            value="Not Applied" />
                                            <label class="form-check-label" for="Not Provided">No</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Window Glass Cleaning</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="windowglasscleaning" id="provided"
                                            value="Cleaned" checked />
                                            <label class="form-check-label" for="Provided">Cleaned</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="windowglasscleaning" id="notprovided"
                                            value="Not Cleaned" />
                                            <label class="form-check-label" for="Not Provided">Not Cleaned</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Door Rubber Cleaning</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="doorrubbercleaning" id="provided"
                                            value="Cleaned" checked />
                                            <label class="form-check-label" for="Provided">Cleaned</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="doorrubbercleaning" id="notprovided"
                                            value="Not Cleaned" />
                                            <label class="form-check-label" for="Not Provided">Not Cleaned</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Diaphragm Cleaning</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="diaphragmcleaning" id="provided"
                                            value="Cleaned" checked />
                                            <label class="form-check-label" for="Provided">Cleaned</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="diaphragmcleaning" id="notprovided"
                                            value="Not Cleaned" />
                                            <label class="form-check-label" for="Not Provided">Not Cleaned</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Luggage Carrier Cleaned</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="laggagecarrcleaning" id="provided"
                                            value="Cleaned" checked />
                                            <label class="form-check-label" for="Provided">Cleaned</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="laggagecarrcleaning" id="notprovided"
                                            value="Not Cleaned" />
                                            <label class="form-check-label" for="Not Provided">Not Cleaned</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  AC Poles Cleaned</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="acpolescleaning" id="provided"
                                            value="Cleaned" checked />
                                            <label class="form-check-label" for="Provided">Cleaned</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="acpolescleaning" id="notprovided"
                                            value="Not Cleaned" />
                                            <label class="form-check-label" for="Not Provided">Not Cleaned</label>
                                        </div>
                                </div>
                            </div>
                            <!--/INPUT FOR SUPERVISION FORM-->
                    </div>
            </div>
            <!-- END CLEANING AND DISINFECTION OF COACH CARD -->
            <!-- SANITARY BINS MANAGEMENT -->
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <!--CARD HEADER-->
                    <div class="card-header bg-default text-orange" style="border-radius: 15px;text-align:center;">
                        Sanitary Bins and Solid Waste Management
                    </div>
                    <!--CARD HEADER-->
                    <div class="card-body">
                            <!--INPUT FOR SUPERVISION FORM-->
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset>
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Sanitary Bin Provision</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sanitarybin" id="provided"
                                            value="Provided" checked />
                                            <label class="form-check-label" for="Provided">Provided</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sanitarybin" id="notprovided"
                                            value="Not Provided" />
                                            <label class="form-check-label" for="Not Provided">Not Provided</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Sanitary Bin Emptied</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sanitarybinemptied" id="provided"
                                            value="Emptied" checked />
                                            <label class="form-check-label" for="Provided">Emptied</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sanitarybinemptied" id="notprovided"
                                            value="Not Emptied" />
                                            <label class="form-check-label" for="Not Provided">Not Emptied</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Sanitary Bin Cleaned</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sanitarybincleaned" id="provided"
                                            value="Cleaned" checked />
                                            <label class="form-check-label" for="Provided">Cleaned</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sanitarybincleaned" id="notprovided"
                                            value="Not Cleaned" />
                                            <label class="form-check-label" for="Not Provided">Not Cleaned</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Plastic Bags Provision</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="plasticbagsprovision" id="provided"
                                            value="Provided" checked />
                                            <label class="form-check-label" for="Provided">Provided</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="plasticbagsprovision" id="notprovided"
                                            value="Not Provided" />
                                            <label class="form-check-label" for="Not Provided">Not Provided</label>
                                        </div>
                                </div>
                            </div>
                            <!--/INPUT FOR SUPERVISION FORM-->
                    </div>
            </div>
            <!-- END SANITARY BINS MANAGEMENT -->
             <!-----EXTERNAL CLEANING OF COACHES--------------->
             <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <!--CARD HEADER-->
                    <div class="card-header bg-default text-orange" style="border-radius: 15px;text-align:center;">
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
            <!-----EXTERNAL CLEANING OF COACHES--------------->
            <!-- DECANTATION OF COACH -->
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <!--CARD HEADER-->
                    <div class="card-header bg-default text-orange" style="border-radius: 15px;text-align:center;">
                        Decantation of Coaches
                    </div>
                    <!--CARD HEADER-->
                    <div class="card-body">
                            <!--INPUT FOR SUPERVISION FORM-->
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset>
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Decantation of Coaches</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="decantation" id="provided"
                                            value="Decanted" checked />
                                            <label class="form-check-label" for="Provided">Decanted</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="decantation" id="notprovided"
                                            value="Not Decanted" />
                                            <label class="form-check-label" for="Not Provided">Not Decanted</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Flashing of Decanted Tanks</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flashing" id="provided"
                                            value="Flashed" checked />
                                            <label class="form-check-label" for="Provided">Flashed</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flashing" id="notprovided"
                                            value="Not Flashed" />
                                            <label class="form-check-label" for="Not Provided">Not Flashed</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Cleanliness of Storage Tank Exterior</label>
                                    </fieldset>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="cleaningtank" id="provided"
                                            value="Cleaned" checked />
                                            <label class="form-check-label" for="Provided">Cleaned</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="cleaningtank" id="notprovided"
                                            value="Not Cleaned" />
                                            <label class="form-check-label" for="Not Provided">Not Cleaned</label>
                                        </div>
                                </div>
                            </div>
                            <!--/INPUT FOR SUPERVISION FORM-->
                    </div>
            </div>
            <!-- DECANTATION OF COACH -->
            <!-- WATER FILLING OF COACHES -->
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <!--CARD HEADER-->
                    <div class="card-header bg-default text-orange" style="border-radius: 15px;text-align:center;">
                        Water Filling of Coaches
                    </div>
                    <!--CARD HEADER-->
                    <div class="card-body">
                            <!--INPUT FOR SUPERVISION FORM-->
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset>
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Water Level on Arrival</label>
                                    </fieldset>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                        <tbody>
                                                                <tr>
                                                                    <td>Tank A (P)</td>
                                                                    <td>
                                                                        <input type="number" name="WateronArivalP" id="WateronArivalP" class="form-control form-control-lg" required/>
                                                                        <div class="progress">
                                                                            <div class="progress-bar" id="WateronArivalPP" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1000"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tank B (T)</td>
                                                                    <td>
                                                                        <input type="number" name="WateronArivalT" id="WateronArivalT" class="form-control form-control-lg" required/>
                                                                        <div class="progress">
                                                                            <div class="progress-bar" id="WateronArivalTT" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="1000"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                        </tbody>  
                                            </table>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Water Level on Departure</label>
                                    </fieldset>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                        <tbody>
                                                                <tr>
                                                                    <td>Tank A (P)</td>
                                                                    <td>
                                                                        <input type="number" name="WateronDepartureP" id="WateronDepartureP" class="form-control form-control-lg" required/>
                                                                        <div class="progress">
                                                                            <div class="progress-bar" role="progressbar" id="WateronDeparturePP" aria-valuenow="25" aria-valuemin="0" aria-valuemax="1000"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tank B (T)</td>
                                                                    <td>
                                                                        <input type="number" name="WateronDepartureT" id="WateronDepartureT" class="form-control form-control-lg" required/>
                                                                        <div class="progress">
                                                                            <div class="progress-bar" role="progressbar" id="WateronDepartureTT" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                        </tbody>  
                                            </table>
                                        </div>
                                </div>
                            </div>
                            <!--/INPUT FOR SUPERVISION FORM-->
                    </div>
            </div>
            <!-- END WATER FILLING OF COACHES -->
            <!-- COMMENTS -->
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <!--CARD HEADER-->
                    <div class="card-header bg-default text-orange" style="border-radius: 15px;text-align:center;">
                       Attach Photo and Write Down Comment if Any
                    </div>
                    <!--CARD HEADER-->
                    <div class="card-body">
                            <!--INPUT COMMENT FOR SUPERVISION FORM-->
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset>
                                    <label class="form-label" for="image"><i class="fa fa-angle-double-right"></i>  Attach Image</label>
                                    </fieldset>
                                    <input type="file" name="image" class="form-control form-control-lg" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-outline">
                                    <fieldset><hr />
                                    <label class="form-label" for="jinaKikao"><i class="fa fa-angle-double-right"></i>  Comment / Remark</label>
                                    </fieldset>
                                    <textarea name="coment" class="form-control form-control-lg"></textarea>
                                </div>
                            </div>
                            <!--/INPUT COOMENT FOR SUPERVISION FORM-->
                    </div>
            </div>
            <!-- COMMENT -->
            <div class="form-group">
                <button type="submit" name="dailsupervisionbtn" class="form-control btn btn-warning rounded submit px-3" style="background-color: #00B074;">Submit Daily Report</button>
            </div>
        <fieldset>
        </div><!-- END OF COL-3-->
        </div>
    <!-------------------INNER PANEL---------------------------->
</form>
<script>
$(document).ready(function(){

	//SEARCH COACHES
	$('#searchchouch').on('input', function(){
        var couch = $(this).val();
        if (couch.length > 0) {
            $.ajax({
                url: 'reports/search.php',
                method: 'POST',
                data: {couches: couch},
                success: function(data) {
                    var coachretrieval = $('#coachretrieval');
					coachretrieval.html(data)
                }
            });
        } else {
            $('#coachretrieval').html('');
        }
    });

    // Set clicked suggestion to input
    $(document).on('click', '#acouch', function(){
        $('#searchchouch').val($(this).text());
        $('#coachretrieval').html('');
    });
	//END SEARCH COACHES

    //PROGRESS BAR
	$('#WateronArivalP').on('input', function(){
        var WaterLevel = $(this).val();
        $('#WateronArivalPP').css('width', WaterLevel+'%').html(WaterLevel += ' Litres');
    });

    $('#WateronArivalT').on('input', function(){
        var WaterLevelT = $(this).val();
        $('#WateronArivalTT').css('width', WaterLevelT+'%').html(WaterLevelT += ' Litres');
    });

    $('#WateronDepartureP').on('input', function(){
        var WaterLevelP = $(this).val();
        $('#WateronDeparturePP').css('width', WaterLevelP+'%').html(WaterLevelP += ' Litres');
    });

    $('#WateronDepartureT').on('input', function(){
        var WaterLevelD = $(this).val();
        $('#WateronDepartureTT').css('width', WaterLevelD+'%').html(WaterLevelD += ' Litres');
    });

	//END PROGRESS BAR
});
</script>
<?php
    include('includes/scripts.php');
?>