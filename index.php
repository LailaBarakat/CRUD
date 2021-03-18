<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//include all your model files here
require 'Model/DataBase.php';
require 'Model/ClassLoader.php';
require 'Model/TeacherModel.php';
require 'Model/TeacherLoader.php';
require 'Model/StudentModel.php';
require 'Model/StudentLoader.php';
require 'Model/TeacherLoader.php';


//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/ClassController.php';
require 'Controller/StudentController.php';
require 'Controller/TeacherController.php';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!
$page = $_GET['page']??'';

$controller = new StudentController();

if (isset($_GET['page'])){
    switch ($_GET['page']){
        case 'class':
            $controller = new ClassController();
            break;
        case 'teacher':
            $controller = new TeacherController();
            break;
        case 'student':
            $controller = new StudentController();
            break;

    }
}


$controller->render($_GET, $_POST);
