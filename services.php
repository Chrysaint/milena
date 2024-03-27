<?php
require_once("./services/dbconnect.php");
session_start();
$query = "SELECT * FROM Services ORDER BY idServices ASC";
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
            <h2 class="page-title">Цены на услуги</h2>

            <div class="services__wrapper">
                <?php
                while ($service = mysqli_fetch_array($result)) {
                    echo '
                    <div class="service__card">
                        <div class="service__card__name">
                            <p>'.$service['ServiceName'].'</p>
                        </div>
                        <div class="service__card__img-wrapper">
                            <img class="service__card__img" src="./src/assets/img/services/'.$service['ServiceImg'].'" alt="">
                        </div>
                        <ul class="service__card__subservice-list">
                    ';
                    $subServiceQuery = "SELECT * FROM Subservices WHERE Services_idServices = ".$service['idServices']."";
                    $subServiceResult = mysqli_query($link, $subServiceQuery);
                    while ($subservice = mysqli_fetch_array($subServiceResult)) {
                        echo '
                        <li class="service__card__subservice-item">
                                <p class="card__subservice-item__text">'.$subservice['SubserviceName'].'</p>
                                <p class="card__subservice-item__text_accent">от '.$subservice['SubservicePrice'].' руб.</p>
                        </li>
                        ';
                    }
                    echo '
                    </ul>
                </div>
                    ';
                }
                ?>
            </div>
        </section>
    </main>

    <?php
    include_once('./src/components/footer.php')
    ?>
</body>

</html>