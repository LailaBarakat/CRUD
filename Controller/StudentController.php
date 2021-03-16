<?php


class StudentController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST): void
    {
        //this is just example code, you can remove the line below
        $pdo = new StudentModel();
        $students = $pdo->getStudents();

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view

        $handler ="student";

        if(isset($_GET)){
            switch($_GET['run']??''){
                case 'create':
                    require 'View/create.php';
                    break;
                case 'detailed':
                    require 'View/detailed.php';
                    break;
                case 'edit':
                    require 'View/edit.php';
                    break;
                default:
                    require 'View/general.php';
                    break;
            }
        }
    }
}