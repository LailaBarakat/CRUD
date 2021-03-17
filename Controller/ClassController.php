<?php


class ClassController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $pdo = new ClassLoader();

        if(!empty($_POST['name']) && !empty($_POST['teacherID'])){
            if(empty($_POST['id'])){
                $new = new ClassModel();
                //call method to add new class

                $message= 'New Student Added';
            }else{
                $update = new ClassModel();
                //call method to update class

                $message= 'Class Updated';

            }

        }
        if(!empty($_POST['delete'])){
            //add method to call class
            //call method to delete class

            $message= 'Class Deleted';
        }

        if (isset($_GET)) {
            switch ($_GET['run'] ?? '') {
                case 'create':
                    require 'View/classCreate.php';
                    break;
                case 'detailed':
                    //call a specific class
                    require 'View/classDetail.php';
                    break;
                case 'update':
                    //call a specific class
                    require 'View/classEdit.php';
                    break;
                default:
                    //call all classes
                    require 'View/classOverview.php';
                    break;
            }
        }
    }
}