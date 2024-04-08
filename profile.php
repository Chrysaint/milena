<?php
include("./services/dbconnect.php");
session_start();
$userId = $_COOKIE['user'];
if(!$userId) {
    header("location: ./login.php");
}
$query = "SELECT * FROM Users WHERE idUsers = '$userId'";
$result = mysqli_query($link, $query);
$userInfo = mysqli_fetch_array($result);
$entriesQuery = "SELECT * FROM `entries` INNER JOIN services ON Entries.Specialists_services_Subservices_Services_idServices = services.idServices INNER JOIN subservices ON entries.Specialists_services_Subservices_idSubservices = subservices.idSubservices INNER JOIN specialists ON entries.Specialists_services_Specialists_idSpecialists = specialists.idSpecialists WHERE Users_idUsers = $userId";
$entriesResult = mysqli_query($link, $entriesQuery);
?>
<!DOCTYPE html>
<html lang="en">

<?php
    include("./src/components/head.php");
?>

<body>
    <?php
        include_once('./src/components/header.php')
    ?>

    <main>

        <section class="container profile-section">
            <h2 class="page-title">Профиль</h2>
            <div class="profile__wrapper">
                <div class="profile__data">
                    <h3 class="page-subtitle">Ваши данные:</h3>
                    <div class="profile__data__row">
                        <p class="profile__data__text">Имя: </p>
                        <p class="profile__data__text"><?php echo $userInfo['UserName']?></p>
                    </div>
                    <div class="profile__data__row">
                        <p class="profile__data__text">Фамилия: </p>
                        <p class="profile__data__text"><?php echo $userInfo['UserSurname']?></p>
                    </div>
                    <div class="profile__data__row">
                        <p class="profile__data__text">Телефон: </p>
                        <p class="profile__data__text"><?php echo $userInfo['UserPhone']?></p>
                    </div>
                    <a href="./services/logout.php" class="form__button">Выйти из аккаунта</a>
                </div>
                <ul class="profile__entries">
                    <?php
                        while($data = mysqli_fetch_array($entriesResult)) {
                            echo '
                                <li class="profile__entries__item">
                                    <p class="profile__entries__item-header">Запись №'.$data['idEntries'].'</p>
                                    <div class="profile__entries__item__row">
                                        <p class="profile__entries__item__row-text"><span class="profile__entries__item__row-text_bold">Дата и время записи:</span></p>
                                        <p class="profile__entries__item__row-text">'.$data['EntriesDate'].' '.$data['EntriesTime'].'</p>
                                    </div>
                                    <div class="profile__entries__item__row">
                                        <p class="profile__entries__item__row-text"><span class="profile__entries__item__row-text_bold">Услуга:</span></p>
                                        <p class="profile__entries__item__row-text">'.$data['ServiceName'].': '.$data['SubserviceName'].'</p>
                                    </div>
                                    <div class="profile__entries__item__row">
                                        <p class="profile__entries__item__row-text"><span class="profile__entries__item__row-text_bold">Специалист:</span></p>
                                        <p class="profile__entries__item__row-text">'.$data['SpecialistName'].' '.$data['SpecialistSurname'].'</p>
                                    </div>
                                    <div class="profile__entries__item__row">
                                        <p class="profile__entries__item__row-text"><span class="profile__entries__item__row-text_bold">Цена:</span></p>
                                        <p class="profile__entries__item__row-text">'.$data['SubservicePrice'].' руб.</p>
                                    </div>
                                </li>
                            ';
                        }
                    ?>
                </ul>
            </div>
        </section>

    </main>

    <?php
    include_once('./src/components/footer.php')
    ?>
</body>

</html>