<?php
require_once("./services/dbconnect.php");
session_start();
if(!$_COOKIE['user']){
    header("location: ./login.php");
}
$servicesQuery = "SELECT idServices, ServiceName FROM Services ORDER BY ServiceName ASC";
$servicesResult = mysqli_query($link, $servicesQuery);
$servicesData = mysqli_fetch_array($servicesResult);
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('./src/components/entryHead.php')
?>

<body>
    <?php
    include_once('./src/components/header.php')
    ?>

    <main>
        <section class="container">

            <h2 class="page-title">Онлайн запись</h2>

            <form class="entry__wrapper subservice__form">
                <h3 class="entry__form__title">Выберите услугу</h3>

                <ul class="entry__list">
                    <?php
                    while ($service = mysqli_fetch_array($servicesResult)) {
                        echo '
                            <li class="entry__item">
                                <div data-dropped="false" class="entry__item__header">
                                    <p class="entry__item__heading">'.$service['ServiceName'].'</p>
                                    <button class="entry__item__button">
                                        <svg width="18" height="9" viewBox="0 0 18 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.9201 0.949997L10.4001 7.47C9.63008 8.24 8.37008 8.24 7.60008 7.47L1.08008 0.949997" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                                <div data-dropped="false" class="entry__item__footer-wrapper">
                                    <ul class="entry__item__footer-list">
                        ';
                        $serviceId = $service['idServices'];
                        $subservicesQuery = "SELECT idSubservices, SubserviceName, SubservicePrice FROM Subservices WHERE Services_idServices = '$serviceId'";
                        $subservicesResult = mysqli_query($link, $subservicesQuery);
                        while ($subservice = mysqli_fetch_array($subservicesResult)) {
                            echo '
                                <li class="entry__item__footer-item">
                                    <label for="subservice-'.$subservice['idSubservices'].'" class="entry__item__footer-item__name">
                                        <input type="radio" value="'.$subservice['idSubservices'].'" name="subservice" id="subservice-'.$subservice['idSubservices'].'">
                                        '.$subservice['SubserviceName'].' от '.$subservice['SubservicePrice'].' руб.
                                    </label>
                                </li>
                            ';
                        }
                        echo '
                        </ul>
                    </div>
                </li>
                        ';
                    }
                    ?>
                </ul>

                <button type="button" id="entry-service-btn" class="entry__form__btn secondary-btn">Перейти к выбору специалиста</button>
            </form>

            <form action="" class="entry__wrapper specialist__form">
                <h3 class="entry__form__title">Выберите специалиста</h3>

                <ul class="specialist__list">

                </ul>
                <div class="entry__form__btns">
                    <button type="button" id="entry-specialist-btn-prev" class="entry__form__btn secondary-btn">Назад</button>
                    <button type="button" id="entry-specialist-btn-next" class="entry__form__btn secondary-btn">Выбрать дату</button>
                </div>
            </form>

            <form class="entry__wrapper period__form" action="">
                <h3 class="entry__form__title">Выберите дату и время</h3>

                <div class="period__form__date">
                    <p class="period__form__date__text">
                        Дата: 
                    </p>
                    <input type="date" class="period__form__datepicker">
                </div>

                <ul class="period__form__time-list">
                
                </ul>
                <div class="entry__form__btns">
                    <button type="button" id="entry-date-btn-prev" class="entry__form__btn secondary-btn">Назад</button>
                    <button type="button" id="entry-date-btn-next" class="entry__form__btn secondary-btn">Записаться</button>
                </div>
            </form>

        </section>
    </main>

    <?php
    include_once('./src/components/footer.php')
    ?>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.7.1.js"></script>
    <script type="module" src="./src/assets/js/dropDown.js"></script>
    <script type="module" src="./src/assets/js/entry.js"></script>
</body>

</html>