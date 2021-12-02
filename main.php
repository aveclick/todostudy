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
    // initialize errors variable
	$errors = "";

	// connect to database

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "Укажите задачу";
		}else{
            $task = R::dispense('tasks');
            $task->task = $data['task'];
            $task->owner_id = $_SESSION['logged_user']->id;
            R::store($task);
            header('Location: main.php');
            exit;
		}
	}
?>
<div class="main">
  <div class="main-header__container">
    <div class="left">
      <img src="assets/img/burger.svg" width="24" height="24" alt="" id="menubutton">
      <img src="assets/img/house.svg" width="24" height="24" alt="">
        <a href="logout.php">
            <button>Выйти</button>
        </a>
    </div>
    <div class="right">
      <img src="assets/img/plus.svg" width="20" height="20" alt="" id="add3">
      <img src="assets/img/question.svg" width="28" height="28" alt="">
      <img src="assets/img/ring.svg" width="24" height="24" alt="">
      <img src="assets/img/acc.svg" width="30" height="30" alt="">
    </div>
  </div>
  <nav class='sidebar'>
    <div class="sidebar_menu">
      <div class="sidebar_menu__item">
        <img src="assets/img/calendar.svg" width="24" height="24" alt=""><p>Календарь</p>
      </div>
      <div class="sidebar_menu__item active">
        <img src="assets/img/list.svg" width="24" height="24" alt=""><p>Список дел</p>
      </div>
      <br>
      <div class="sidebar_menu__item">
        <img src="assets/img/arrow.svg" width="16" height="16" alt=""><p>Предметы</p>
      </div>
      <div class="sidebar_menu__item">
        <img src="assets/img/arrow.svg" width="16" height="16" alt=""><p>Проекты</p>
      </div>
    </div>
  </nav>
  <div class="content">
    <div class="content__container">
      <div class="line">
        <div class="today">
            <?php
            $locale_time = setlocale (LC_TIME, 'ru_RU.UTF-8', 'Rus');
            function strf_time($format, $timestamp, $locale)
            {
                $date_str = strftime($format, $timestamp);
                if (strpos($locale, '1251') !== false)
                {
                    return iconv('cp1251', 'utf-8', $date_str);
                }
                else
                {
                    return $date_str;
                }
            }
             ?>
          <h2>Сегодня <span><?php echo strf_time("%a, %B %d", time(), $locale_time); ?></span></h2>
        </div>
        <div class="sort">
          <img src="assets/img/sort.svg" width="31" height="24" alt=""><p>Сортировать</p>
        </div>
      </div>
        <div class="todo" id="todo">
            <?php
            $owner_id = $_SESSION['logged_user']->id;
            $tasks = R::find('tasks', 'owner_id = ?', [$owner_id]);
            echo '<div class="tasks-group">';
            foreach ($tasks as $task){
                $_SESSION['task'] = $task->id;
                echo '<div class="one-task">';
                echo '<div class="check-box">';
                echo '<input type="checkbox" name="check" value="1">';
                echo '<p>'.$task->task.'</p>';
                echo '</div>';
                echo '<div class="params">';
                echo '<a href="delete-task.php"><img src="assets/img/trash.svg" width="24" height="24" alt=""></a>';
                echo '<img src="assets/img/edit.svg" width="24" height="24" alt="" style="padding-left: 10px">';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            ?>
        </div>
      <div class="add" id="add">
        <img src="assets/img/plus.svg" width="20" height="20" alt=""><p>Добавить задачу</p>
      </div>
        <div class="add_form" id="add_form">
            <form method="post" action="main.php">
                <textarea name="task" class="task_input"></textarea>
                <div class="buttons">
            <button type="submit" name="submit" id="add_btn" class="add_btn">Добавить задачу</button>
                <div class="button" id="cancel">Отмена</div>
                </div>
            </form>
        </div>
        <div class="hide" id="hide">
      <div class="nothing_to_do">
        <img src="assets/img/do.png" width="200" height="200" alt="">
      </div>
      <h3>Все ваши задачи на сегодня отображаются здесь</h3>
      <div class="content__button1">
          <button id="add2">Добавить задачу</button>
      </div>
      <div class="content__button2">
        <a href="main.php">
          <button>Заведите привычку</button>
        </a>
      </div>
      <div class="how_to_plan">
          <img src="assets/img/question.svg" width="28" height="28" alt=""><a href="main.php"><h4>Как планировать свой день</h4></a>
      </div>
        </div>
    </div>
  </div>
</div>
<!-- JS library -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/typer-new.js"></script>
</body>
</html>
