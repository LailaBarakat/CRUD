<?php


class StudentController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST): void
    {
        $type = 'student';
        $pdo = new StudentLoader();
        $classpdo = new ClassLoader();
        $teacherpdo = new TeacherLoader();

        if (!empty($_POST['first_name'])) {
            if (empty($_POST['id'])) {

                $student = new Student(null, $_POST['first_name'], $_POST['last_name'], $_POST['email'], (int)$_POST['class']);
                $pdo->insertNewStudent($student);

                $message = 'New Student Added';

            } else {

                $student = new Student((int)$_POST['id'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], (int)$_POST['class']);
                $pdo->updateStudent($student);

                $message = 'Student Updated';

            }

        }
        if (!empty($_POST['delete'])) {

            $student = $pdo->getStudent((int)$_POST['id']);
            $pdo->deleteStudent($student);

            if (!empty($_GET['run']) && $_GET['run'] === 'detailed') {
                unset($_GET['run']);
            }

            $message = 'Student Deleted';
        }

        //Directs which view file to require, and prepares needed variables
        if (isset($_GET)) {
            switch ($_GET['run']??'') {
                case 'create':

                    $group = $classpdo->getAllClasses();

                    require 'View/Create.php';
                    break;

                case 'detailed':

                    $student = $pdo->getStudent((int)$_GET['id']);
                    $classId = $student->getClassId();
                    $class = null;
                    $teacher = null;

                    if (!empty($classId)) {
                        $class = $classpdo->getClass($classId);
                        $teacherId = $class->getteacherid();
                    }

                    if (!empty($teacherId)) {
                        $teacher = $teacherpdo->getTeacher($class->getteacherid());
                    }

                    require 'View/studentDetail.php';
                    break;

                case 'update':

                    $group = $classpdo->getAllClasses();
                    $edit = $pdo->getStudent((int)$_GET['id']);

                    require 'View/Edit.php';
                    break;

                case 'export':

                    $export = new csvLoader();
                    $file = 'studentExport.csv';
                    $list = array(
                        array('firstName', 'lastName', 'email')
                    );
                    $students = $pdo->getAllStudents();
                    foreach ($students as $student) {
                        $list[] = array($student->getFirstName(), $student->getLastName(), $student->getEmail());
                    }
                    $export->export($list, $file);

                    header('Content-Description: File Transfer');
                    header('Content-Disposition: attachment; filename=' . basename($file));
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    header("Content-Type: text/plain");
                    readfile($file);

                    break;

                default:

                    $group = $pdo->getAllStudents();
                    $overviewTag = "Email";
                    require 'View/Overview.php';
            }
        }

    }

}
