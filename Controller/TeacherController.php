<?php


class TeacherController {

    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST): void
    {

        $pdo = new TeacherLoader();

        if(!empty($_POST['first_name']) && !empty($_POST['last_name'])){
            if(empty($_POST['id'])){
                $new = new TeacherModel( null, $_POST['first_name'], $_POST['last_name'], $_POST['email']);
                $pdo->insertNewTeacher($new);

                $message= 'New Teacher Added';
            }else{
                $update = new TeacherModel( (int) $_POST['id'], $_POST['first_name'], $_POST['last_name'], $_POST['email']);
                $pdo->updateTeacher($update);

                $message= 'Teacher Updated';

            }

        }
        if(!empty($_POST['delete'])){
            $delete = $pdo->getTeacher((int)$_POST['id']);
            $pdo->deleteTeacher($delete);

            $message= 'Teacher Deleted';
        }

        if (isset($_GET)) {
            switch ($_GET['run'] ?? '') {
                case 'create':
                    require 'View/teacherCreate.php';
                    break;
                case 'detailed':
                    $teacher = $pdo->getTeacher((int)$_GET['id']); //placeholder
                    require 'View/teacherDetail.php';
                    break;
                case 'update':
                    $teacher = $pdo->getTeacher((int)$_GET['id']);
                    require 'View/teacherEdit.php';
                    break;
                default:
                    $teachers = $pdo->getAllTeachers();
                    
                    break;
            }
        }

    }

}

