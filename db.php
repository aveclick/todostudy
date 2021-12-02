<?php

require "libs/rb-mysql.php";

R::setup( 'mysql:host=localhost;dbname=todostudy',
    'root', '' );

session_start();
