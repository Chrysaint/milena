<?php
    include('./dbconnect.php');
    $id = $_GET['id'];
    $query = "SELECT idSpecialists, SpecialistName, SpecialistSurname FROM Specialists_services INNER JOIN Specialists ON Specialists_services.Specialists_idSpecialists = Specialists.idSpecialists WHERE Specialists_services.Subservices_idSubservices = $id";
    $result = mysqli_query($link, $query);
    $specialists = [];
    while ($data = mysqli_fetch_array($result)) {
        $specialist = [
            "id" => $data['idSpecialists'],
            "name" => $data["SpecialistName"],
            "surname" => $data["SpecialistSurname"]
        ];
        array_push($specialists, $specialist);
    }
    echo json_encode($specialists, JSON_UNESCAPED_UNICODE);
    exit;
?>