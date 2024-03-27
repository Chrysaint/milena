<?php
    include('./dbconnect.php');
    $specialistId = $_GET['id'];
    $date = $_GET['date'];

    $query = "SELECT EntriesTime FROM Entries WHERE entries.Specialists_services_Specialists_idSpecialists = $specialistId AND entries.EntriesDate = '$date'";
    $result = mysqli_query($link, $query);

    $time = [];
    while ($data = mysqli_fetch_array($result)) {
        array_push($time, $data["EntriesTime"]);
    }
    echo json_encode($time, JSON_UNESCAPED_UNICODE);
    exit;
?>