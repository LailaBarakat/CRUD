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
                    $teachPdo = new TeacherLoader();
                    $teachers = $teachPdo->getAllTeachers();

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
                    $teachPdo = new TeacherLoader();
                    $teachers = $teachPdo->getAllTeachers();

                    $class = $pdo->getClass( (int) $_GET['id']);
                    require 'View/classEdit.php';
                    break;

                case 'export':
                    $export = new csvLoader();
                    $file = 'classExport.csv';
                    $teachPdo = new TeacherLoader();
                    $list = array (
                        array('Name', 'location', 'TeacherName')
                    );
                    $classes = $pdo->getAllClasses();
                    foreach($classes as $class){
                        $teacher= $teachPdo->getTeacher($class->getteacherid());
                        array_push($list, array($class->getclassname(), $class->getclasslocation(), $teacher->getteachername()));
                    }
                    $export->export($list, $file);
                    //require 'View/studentOverview.php';

                    header('Content-Description: File Transfer');
                    header('Content-Disposition: attachment; filename='.basename($file));
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    header("Content-Type: text/plain");
                    readfile($file);

                    break;

                default:
                    $classes = $pdo->getAllClasses();
                    require 'View/classOverview.php';
                    break;
            }
        }
    }
}