<?php
require_once("./services/dbconnect.php");
session_start();
$query = "SELECT * FROM Types ORDER BY TypesName ASC";
$result = mysqli_query($link, $query);
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('./src/components/head.php')
?>

<body>
    <?php
    include_once('./src/components/header.php')
    ?>

    <main>
        <section class="container">

            <div class="slider">
                <button class="slider__btn slider__btn_prev slider__btn_hidden" id="sliderPrevBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="34" height="34">
                        <path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z" fill="currentColor"></path>
                    </svg>
                </button>

                <div class="slider__track-container">
                    <ul class="slider__track">
                        <li class="slider__slide current-slide">
                            <div class="carousel-item__inner">
                                <h2 class="slide-heading">Ногтевой сервис:</h2>

                                <div class="slide-content">
                                    <img src="./src/assets/img/carousel/slider_icon_nogti.png" alt="">
                                    <ul class="slide-list">
                                        <li class="slide-item">
                                            <p class="slide-item__text">
                                                - Все виды маникюра и педикюра
                                            </p>
                                            <p class="slide-item__text">
                                                - Атравматическая система коррекции проблемных и вросших ногтей
                                            </p>
                                            <p class="slide-item__text">
                                                - Спа процедуры для рук и ног
                                            </p>
                                            <p class="slide-item__text">
                                                - Наращивание ногтей
                                            </p>
                                            <p class="slide-item__text">
                                                - Покрытие гель-лак и модные дизайны
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="slider__slide">
                            <div class="carousel-item__inner">
                                <h2 class="slide-heading">Косметология:</h2>
                                <div class="slide-content">
                                    <img src="./src/assets/img/carousel/slider_icon_kosmetologia.png" alt="">
                                    <ul class="slide-list">
                                        <li class="slide-item">
                                            <p class="slide-item__text">
                                                - Чистка лица и уходы по коже
                                            </p>
                                            <p class="slide-item__text">
                                                - Химический пилинг
                                            </p>
                                            <p class="slide-item__text">
                                                - Эпиляция
                                            </p>
                                            <p class="slide-item__text">
                                                - Бровистика
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="slider__slide">
                            <div class="carousel-item__inner">
                                <h2 class="slide-heading">Парикхмахерские услуги:</h2>
                                <div class="slide-content">
                                    <img src="./src/assets/img/carousel/slider_icon_strijka.png" alt="">
                                    <ul class="slide-list">
                                        <li class="slide-item">
                                            <p class="slide-item__text">
                                                - Стильные укладки любой сложности
                                            </p>
                                            <p class="slide-item__text">
                                                - Услуги Барбера
                                            </p>
                                            <p class="slide-item__text">
                                                - Стрижки мужские и женские любой сложности
                                            </p>
                                            <p class="slide-item__text">
                                                - Кератиновая завивка и Карвинг
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                </div>

                <button class="slider__btn slider__btn_next" id="sliderNextBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="34" height="34">
                        <path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z" fill="currentColor"></path>
                    </svg>
                </button>
            </div>

        </section>
    </main>

    <?php
    include_once('./src/components/footer.php')
    ?>
    <script type="module" src="./src/assets/js/slider.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>

</html>