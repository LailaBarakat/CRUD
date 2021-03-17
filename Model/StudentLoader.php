<?php

require_once 'StudentModel.php';
require_once 'DataBase.php';

class StudentLoader{

private array $studentArray = [];


    public function getAllStudents ():array {

    try {
        $DB = new DataBase();
        $conn = $DB->connect();

        $stmt = $conn->prepare("SELECT id, first_name, last_name, email, classID FROM Student");
        $stmt->execute();

        // set the resulting array to associative
        $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $row) {
            $student=new StudentModel(intval($row['id']),$row['first_name'],$row['last_name'],$row['email'],intval($row['classID']));
            array_push($this->studentArray, $student);
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;


    return $this->studentArray;

}

    public function insertNewStudent (StudentModel $student):void {

    try {
        $DB = new DataBase();
        $conn = $DB->connect();

        $id=$student->getid();
        $first_name=$student->getfirst_name();
        $last_name=$student->getlast_name();
        $email=$student->getemail();
        $classID=$student->getclassID();

        $sql = "INSERT INTO Student (id, first_name, last_name, email, classID)
                VALUES ('$id', '$first_name', '$last_name', '$email', '$classID')";
        // use exec() because no results are returned
        $conn->exec($sql);
        //echo "New record created successfully";
    } catch(PDOException $e) {
        //echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}

}