<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <link rel ="stylesheet" href="assets/css/style.css">
  <title>todostudy</title>
</head>
<body>
<?php
require "db.php";
?>
<div class="first_screen">
  <div class="header__container">
    <div class="header">
      <div class="logo">
        <a href="index.php">
          <img src="assets/img/logo.svg" width="205" height="55" alt="">
        </a>
      </div>
      <div class="main-menu">
        <li><a href="index.php">Главная</a></li>
        <li><a href="register.php">Создать аккаунт</a></li>
        <li><a href="auth.php">Войти</a></li>
      </div>
    </div>
  </div>
  <div class="banner">
    <div class="banner__container">
      <div class="banner__info">
        <h1 class="cd-headline clip is-full-width">
          Организуйте Свое обучение<br>
          <span class="cd-words-wrapper">
              <b class="is-visible">Быстро</b>
              <b>Эффективно</b>
              <b>Бесплатно</b>
          </span>
        </h1>
        <h2>Наиболее востребованный органайзер среди студентов</h2>
        <a href="register.php">
          <button><i class="fa fa-power-off"></i>Начать</button>
        </a>
        <div class="review">
          <div class="stars">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
          </div>
          <p>(основано на <span>1,134</span> отзывах)</p>
        </div>
      </div>
      <div class="banner__gif"></div>
    </div>
  </div>
</div>
<!-- JS library -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/typer-new.js"></script>
</body>
</html>
