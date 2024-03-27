<?php
include('./dbconnect.php');

$login = trim($_POST['login']);
$pass = trim($_POST['pass']);
$tel = trim($_POST['tel']);
$name = trim($_POST['name']);
$surname = trim($_POST['surname']);

$queryForUser = "SELECT * FROM Users WHERE UserLogin = '$login'";
$resultForUser = mysqli_query($link, $queryForUser);
$userData = mysqli_fetch_array($resultForUser);

if ($userData) {
    echo json_encode([
        'error' => "Пользователь с таким именем уже существует!",
    ]);
    die();
}

$queryToCreate = "INSERT INTO users (`UserLogin`, `UserPassword`, `UserPhone`, `UserName`, `UserSurname`) VALUES ('$login', '$pass', '$tel', '$name', '$surname')";
$resultToCreate = mysqli_query($link, $queryToCreate);

$resultToLogin = mysqli_query($link, $queryForUser);
$dataToLogin = mysqli_fetch_array($resultToLogin);
setcookie("user", $dataToLogin['idUsers'], time() + (3600 * 24 * 3), "/", '.beauty');
echo json_encode([
    'success' => "Вы успешно зарегистрировались!"
]);
return;
