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
if(isset($data['do_login']))
{
    $errors = array();
    $user = R::findOne('users', 'login = ?', array($data['login']));
    if($user){

        if(password_verify($data['password'], $user->password)){
            $_SESSION['logged_user'] = $user;
            header('Location: main.php');
            exit;
        }
        else{
            $errors[] = 'Неверно введен пароль';
        }
    }
    else{
        $errors[] = 'Пользователь с таким логином не найден';
    }
    if (! empty($errors))
    {
        echo '<div style="color: red; text-align: center; margin-top: 30px">'.array_shift($errors).'</div><hr>';
    }
}

?>
<form action="auth.php" method="post">
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
          <i class="fa fa-envelope"></i>
          <input type="text" class="form-control" name="login" placeholder="Логин" value="<?php echo @$data['login']; ?>" required="">
        </div>
      </div>
      <br>
      <div class="form">
        <div class="form__conrainer">
          <i class="fa fa-key"></i>
          <input type="password" class="form-control" name="password" placeholder="Пароль" value="" required="">
        </div>
      </div>
    </div>
    <a href="index.php"><h5>Восстановить пароль</h5></a>
      <button type="submit" name="do_login">войти</button>
    <a href="register.php"><p>Создать аккаунт</p></a>
  </div>
</div>
</form>
<!-- JS library -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/typer-new.js"></script>
</body>
</html>
