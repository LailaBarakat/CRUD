<?php


class StudentController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST): void
    {

        $pdo = new StudentLoader();
        $students = $pdo->getAllStudents();

        require "View/studentOverview.php";

        /*
        $pdo = new StudentLoader();


        //this is for updating && deleting (elseif)
        if (!empty($_POST['firstName']) && !empty($_POST['lastName'])) {
            if (empty($_POST['id'])) {
                //run code to add a new student to the database;
                $pdo->insertNewStudent();
            } else {
                //run code to update existing student;
                //update all required fields;

            }
        } elseif (isset($_POST['delete'])) {
            //run code to delete selected user
        }

        //run code to get array of all the students from Model

        $saveLabel = 'Save Record';

        if (!empty($_GET['id'])) {
            $saveLabel = 'Save Record';

            //run code to fetch info about single student
            $selectedUser = 'student array';

        }
        if (empty($selectedUser['id'])) {
            $selectedUser = [
                'id' => '',
                'firstname' => '',
                'lastname' => '',
                'sports' => []
            ];
        }

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view

        if (isset($_GET)) {
            switch ($_GET['run'] ?? '') {
                case 'create':
                    require 'View/studentCreate.php';
                    break;
                case 'detailed':
                    require 'View/studentDetailed.php';
                    break;
                case 'edit':
                    require 'View/studentEdit.php';
                    break;
                default:
                    require 'View/general.php';
                    break;
            }
        }
        */
    }

}
