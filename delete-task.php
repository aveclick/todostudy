<?php
require "db.php";
?>
<?php
$task_id = $_SESSION['task'];
$item = R::findOne('tasks', ' id = ? ', [ $task_id ]);
R::trash($item);
header('Location: main.php')
?>

