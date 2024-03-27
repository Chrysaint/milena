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
            <h2 class="page-title">Регистрация</h2>

            <form action="" class="from">
                <div class="form__row">
                    <input id="login" type="text" class="input" placeholder="Ваш логин*">
                    <p class="form__error" id="login-error"></p>
                </div>
                <div class="form__row">
                    <input id="password" type="password" class="input" placeholder="Ваш пароль*">
                    <p class="form__error" id="password-error"></p>
                </div>
                <div class="form__row">
                    <input id="name" type="text" class="input" placeholder="Имя*">
                </div>
                <div class="form__row">
                    <input id="surname" type="text" class="input" placeholder="Фамилия*">
                </div>
                <div class="form__row">
                    <input id="tel" type="tel" class="input" placeholder="Ваш телефон*">
                    <p class="form__error" id="fields-error"></p>
                </div>
                <button type="button" id="registerButton" class="form__button">Зарегистрироваться</button>
                <a href="/login.php" class="form__link">Есть аккаунт?</a>
            </form>


        </section>
    </main>

    <?php
    include_once('./src/components/footer.php')
    ?>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.7.1.js"></script>
    <script type="module" src="./src/assets/js/forms.js"></script>
    <script type="module" src="https://unpkg.com/imask"></script>
    <script type="module" src="./src/assets/js/phoneMask.js"></script>
</body>

</html>