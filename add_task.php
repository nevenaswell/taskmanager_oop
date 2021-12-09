<?php

require_once 'task.php'; //get the class

$text = $_POST['task']; //get data from DB
$task = new Task($text);//create new object and pass it the required parameter
$task->add();           //execute the method

header('Location: index.php'); //return to the form

?>