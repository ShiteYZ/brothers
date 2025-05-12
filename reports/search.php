<?php 
require("../includes/connection.php");

//FOR STATION
if (isset($_POST['stationQuery'])) {
    $station = $connect->real_escape_string($_POST['stationQuery']);
    
    $sqlSt = "SELECT * FROM stations WHERE station_name LIKE '%$station%' LIMIT 10";
    $resultSt = $connect->query($sqlSt);

    while ($rowSt = $resultSt->fetch_assoc()) {
       echo '<a href="#" class="list-group list-group-item-action border p-2" id="astation">'.$rowSt['station_name'].'</a>';
    }

}
//FOR TRAIN
if (isset($_POST['query'])) {
    $search = $connect->real_escape_string($_POST['query']);
    
    $sql = "SELECT * FROM train WHERE train_no LIKE '%$search%' LIMIT 10";
    $result = $connect->query($sql);

    while ($row = $result->fetch_assoc()) {
       echo '<a href="#" class="list-group list-group-item-action border p-2" id="atrain">'.$row['train_no'].'</a>';
    }

}
//FOR COACHES
if (isset($_POST['couches'])) {
    $couches = $connect->real_escape_string($_POST['couches']);
    
    $sqlcouch = "SELECT * FROM coaches WHERE coach_no LIKE '%$couches%' LIMIT 10";
    $resultcouch = $connect->query($sqlcouch);

    while ($rowcouch = $resultcouch->fetch_assoc()) {
       echo '<a href="#" class="list-group list-group-item-action border p-2" id="acouch">'.$rowcouch['coach_no'].'</a>';
    }

}

//FOR DAILY CLEANLINESS
if (isset($_POST['dailCleanRef'])) {
    $dailCleanRef = $connect->real_escape_string($_POST['dailCleanRef']);
    
    $sqldf = "SELECT * FROM dailycleanliness WHERE supervisionRef LIKE '%$dailCleanRef%' GROUP BY supervisionRef LIMIT 10";
    $resultdf = $connect->query($sqldf);

    while ($rowdf = $resultdf->fetch_assoc()) {
       echo '<a href="#" class="list-group list-group-item-action border p-2" id="adailyref">'.$rowdf['supervisionRef'].'</a>';
    }
}
//FOR INTERIOR VACUUM
if (isset($_POST['vacuumRef'])) {
    $vacuumRef = $connect->real_escape_string($_POST['vacuumRef']);
    
    $sqlvf = "SELECT * FROM interiorcleaning WHERE supervisionRef LIKE '%$vacuumRef%' GROUP BY supervisionRef LIMIT 10";
    $resultvf = $connect->query($sqlvf);

    while ($rowvf = $resultvf->fetch_assoc()) {
       echo '<a href="#" class="list-group list-group-item-action border p-2" id="vacuumref">'.$rowvf['supervisionRef'].'</a>';
    }
}
//FOR FUMIGATION
if (isset($_POST['fumigRef'])) {
    $fumigRef = $connect->real_escape_string($_POST['fumigRef']);
    
    $sqlff = "SELECT * FROM fumigation WHERE supervisionRef LIKE '%$fumigRef%' GROUP BY supervisionRef LIMIT 10";
    $resultff = $connect->query($sqlff);

    while ($rowff = $resultff->fetch_assoc()) {
       echo '<a href="#" class="list-group list-group-item-action border p-2" id="afumref">'.$rowff['supervisionRef'].'</a>';
    }

}

?>