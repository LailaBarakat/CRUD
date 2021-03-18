<?php


class ClassController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = new ClassLoader();

        if(!empty($_POST['name']) && !empty($_POST['location'])){
            if(empty($_POST['id'])){
                $new = new ClassModel(null, $_POST['name'], $_POST['location'],$_POST['teacher'] );
                $pdo->insertNewClass($new);

                $message= 'New Class Added';
            }else{
                $update = new ClassModel( (int) $_POST['id'], $_POST['name'],$_POST['location'], $_POST['teacher']);
                $pdo->updateCLass($update);

                $message= 'Class Updated';

            }

        }
        if(!empty($_POST['delete'])){
            $class = $pdo->getClass( (int) $_POST['id']);
            $pdo->deleteClass($class);

            if(!empty($_GET['run']) && $_GET['run']==='detailed')
            {$_GET['run']='';}

            $message= 'Class Deleted';
        }

        if (isset($_GET)) {
            switch ($_GET['run'] ?? '') {
                case 'create':
                    require 'View/classCreate.php';
                    break;
                case 'detailed':
                    $studPdo = new StudentLoader();
                    $teachPdo = new TeacherLoader();

                    $class = $pdo->getClass((int)$_GET['id']);
                    $students = $studPdo->fetchStudents($class->getclassid());
                    $teacher = $teachPdo->getTeacher($class->getteacherid());

                    require 'View/classDetail.php';
                    break;
                case 'update':
                    $class = $pdo->getClass( (int) $_GET['id']);
                    require 'View/classEdit.php';
                    break;
                default:
                    $classes = $pdo->getAllClasses();
                    require 'View/classOverview.php';
                    break;
            }
        }
    }
}