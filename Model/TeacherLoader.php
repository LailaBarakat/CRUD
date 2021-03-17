<?php

require_once 'TeacherModel.php';
require_once 'DataBase.php';

class TeacherLoader{

    private array $teacherArray = [];


    public function getAllTeachers ():array {

        try {
            $DB = new DataBase();
            $conn = $DB->connect();

            $stmt = $conn->prepare("SELECT id, first_name, last_name, email FROM Teacher");
            $stmt->execute();

            // set the resulting array to associative
            $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $teacher=new TeacherModel(intval($row['id']),$row['first_name'],$row['last_name'],$row['email']);
                array_push($this->teacherArray, $teacher);
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;


        return $this->teacherArray;

    }

    public function insertNewTeacher (TeacherModel $teacher):void {

        try {
            $DB = new DataBase();
            $conn = $DB->connect();

            $id=$teacher->getid();
            $first_name=$teacher->getfirst_name();
            $last_name=$teacher->getlast_name();
            $email=$teacher->getemail();

            $sql = "INSERT INTO Student (id, first_name, last_name, email)
                VALUES ('$id', '$first_name', '$last_name', '$email')";
            // use exec() because no results are returned
            $conn->exec($sql);
            //echo "New record created successfully";
        } catch(PDOException $e) {
            //echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }

}