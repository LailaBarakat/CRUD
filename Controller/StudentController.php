<?php


class StudentController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST): void
    {

        $pdo = new StudentLoader();
        $classpdo=new ClassLoader();
        $teacherpdo = new TeacherLoader();

        if(!empty($_POST['first_name']) && !empty($_POST['last_name'])){
            if(empty($_POST['id'])){
                $new = new StudentModel( null, $_POST['first_name'], $_POST['last_name'], $_POST['email'], (int) $_POST['class']);
                $pdo->insertNewStudent($new);

                $message= 'New Student Added';
            }else{
                $update = new StudentModel( (int) $_POST['id'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], (int) $_POST['class']);
                $pdo->updateStudent($update);

                $message= 'Student Updated';

            }

        }
        if(!empty($_POST['delete'])){
            $delete = $pdo->getStudent((int)$_POST['id']);
            $pdo->deleteStudent($delete);

            if(!empty($_GET['run']) && $_GET['run']==='detailed')
            {$_GET['run']='';}
            
            $message= 'Student Deleted';
        }

        if (isset($_GET)) {
            switch ($_GET['run'] ?? '') {
                case 'create':
                    require 'View/studentCreate.php';
                    break;
                case 'detailed':
                    $student = $pdo->getStudent((int)$_GET['id']); //placeholder
                    $class = $classpdo->getClass($student->getclassid());
                    $teacher = $teacherpdo->getTeacher($class->getteacherid());
                    require 'View/studentDetail.php';
                    break;
                case 'update':
                    $student = $pdo->getStudent((int)$_GET['id']);
                    require 'View/studentEdit.php';
                    break;
                default:
                    $students = $pdo->getAllStudents();
                    require 'View/studentOverview.php';
                    break;
            }
        }
        
    }

}
