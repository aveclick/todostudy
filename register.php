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
<?php
$data = $_POST;
if(isset($data['do_signup'])){
    // регистрация
    $errors = array();

    if(R::count('users', "login = ?", array($data['login'])) > 0){
        $errors[] = "Пользователь с таким логином уже существует!";
    }
    if(R::count('users', "email = ?", array($data['email'])) > 0){
        $errors[] = "Пользователь с таким Email уже существует!";
    }

    if (empty($errors))
    {
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        R::store($user);
        $_SESSION['logged_user'] = $user;
        header('Location: main.php');
        exit;
    }
    else{
        echo '<div style="color: red; text-align: center; margin-top: 30px">'.array_shift($errors).'</div><hr>';
    }
}
?>
<form action="register.php" method="post">
<div class="register">
  <div class="register__container">
    <div class="logo">
      <a href="index.php">
        <img src="assets/img/logo.svg" width="205" height="55" alt="">
      </a>
    </div>
    <div class="forms">
      <div class="form">
        <div class="form__conrainer">
          <i class="fa fa-user"></i>
          <input type="text" class="form-control" name="login" id="name" placeholder="Логин" value="<?php echo @$data['login']; ?>" required="">
        </div>
      </div>
      <br>
      <div class="form">
        <div class="form__conrainer">
          <i class="fa fa-envelope"></i>
          <input type="email" name="email" id="email" placeholder="Эл. почта" value="<?php echo @$data['email']; ?>" required="">
        </div>
      </div>
      <br>
      <div class="form">
        <div class="form__conrainer">
          <i class="fa fa-key"></i>
          <input type="password" name="password" id="pass" value="<?php echo @$data['password']; ?>"  class="form-control" placeholder="Пароль" required="">
        </div>
      </div>
    </div>
      <div id = "error" style="color: red"></div>
      <button type="submit" name="do_signup">создать аккаунт</button>
    <a href="auth.php"><p>Войти</p></a>
  </div>
</div>
</form>
<!-- JS library -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/typer-new.js"></script>
</body>
</html>
