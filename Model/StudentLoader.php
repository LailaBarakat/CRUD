<?php

require_once 'StudentModel.php';

class StudentLoader{

private array $studentArray = [];

    private string $servername = "localhost";
    private string $username = "root";
    private string $password = "root";
    private string $dbname = "";


    public function getAllStudents (){

    try {
        $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT id, first_name, last_name, email, classID FROM Student");
        $stmt->execute();

        // set the resulting array to associative
        $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $row) {
            $student=new StudentModel($row['id'],$row['first_name'],$row['lst_name'],$row['email'],$row['classID']);
            array_push($this->studentArray, $student);
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;


    return $this->studentArray;

}

    public function insertNewStudent (StudentModel $student){

    try {
        $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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