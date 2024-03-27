<?php
include_once('./services/dbconnect.php');
?>

<header class="header">
    <div class="container">
        <div class="header__wrapper">
            <div class="header__logo">
                <h1 class="header__h1">
                    <a href="/" class="header__logo-text">
                        Салон красоты
                        <span class="header__logo-text_bold">Милена</span>
                    </a>
                </h1>
            </div>
            <nav class="header__nav">
                <ul class="header__nav__list">
                    <li class="header__nav__item">
                        <a href="/" class="header__nav__link">
                            Главная
                        </a>
                    </li>
                    <li class="header__nav__item">
                        <a href="/services.php" class="header__nav__link">
                            Услуги
                        </a>
                    </li>
                    <li class="header__nav__item">
                        <a href="/about.php" class="header__nav__link">
                            О нас
                        </a>
                    </li>
                    <li class="header__nav__item">
                        <a href="<?php if ($_COOKIE['user']) {
                                        echo '/profile.php';
                                    } else {
                                        echo '/login.php';
                                    } ?>" class="header__nav__link">
                            Профиль
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="header__links">
                <a href="<?php if ($_COOKIE['user']) {
                                echo '/entry.php';
                            } else {
                                echo '/login.php';
                            } ?>" class="secondary-btn">Онлайн запись</a>
                <div class="header__phone">
                    <p class="header__phone__text">
                        Наш номер: <a href="tel:+74996454265" class="header__phone__text_default">+7 (499) 645-42-65</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>