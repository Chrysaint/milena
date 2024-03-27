<?php
    include('./dbconnect.php');
    
    $userId = $_COOKIE['user'];
    $date = $_POST['date'];
    $period = $_POST['period'];
    $subserviceId = $_POST['subserviceId'];
    $specialistId = $_POST['specialistId'];

    $serviceQuery = "SELECT `Services_idServices` FROM subservices WHERE idSubservices = $subserviceId";
    $serviceResult = mysqli_query($link, $serviceQuery);
    $serviceId = mysqli_fetch_array($serviceResult);
    
    $entryQuery = "INSERT INTO Entries (`EntriesDate`, `EntriesTime`, `Users_idUsers`, `Specialists_services_Specialists_idSpecialists`, `Specialists_services_Subservices_idSubservices`, `Specialists_services_Subservices_Services_idServices`) VALUES ('$date', '$period', '$userId', '$specialistId', '$subserviceId', '$serviceId[0]')";
    $entryResult = mysqli_query($link, $entryQuery);
    
    echo json_encode([
        'success' => "Вы успешно записались!"
    ]);
    return;
?>