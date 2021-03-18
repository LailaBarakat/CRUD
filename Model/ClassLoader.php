<?php

require_once 'ClassModel.php';
require_once 'DataBase.php';

class ClassLoader{

private array $classArray = [];

    public function getAllClasses ():array {

    try {
        $DB = new DataBase();
        $conn = $DB->connect();

        $stmt = $conn->prepare("SELECT id, location, name, teacherID FROM Class");
        $stmt->execute();

        // set the resulting array to associative
        $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $row) {
            $class=new ClassModel( (int)($row['id']),$row['name'],$row['location'],($row['teacherID']));
            array_push($this->classArray, $class);
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;


    return $this->classArray;

}

    public function insertNewClass (ClassModel $class):void {

    try {
        $DB = new DataBase();
        $conn = $DB->connect();

        $id=$conn->lastInsertId();
        $location=$class->getclasslocation();
        $name=$class->getclassname();
        $teacherID=$class->getteacherid();

        $sql = "INSERT INTO Class (id, location, name, teacherID)
                VALUES ('$id', '$location', '$name, $teacherID')";
        // use exec() because no results are returned
        $conn->exec($sql);
        //echo "New record created successfully";
    } catch(PDOException $e) {
        //echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}

}