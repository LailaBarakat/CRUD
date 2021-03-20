<?php

class ClassLoader extends DataBase
{

    private array $classArray = [];


    public function getAllClasses(): array
    {

        try {
            $conn = $this->connect();

            $sql = "SELECT id, location, name, teacherID FROM Class";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();

            foreach ($results as $row) {
                $class = new ClassModel((int)($row['id']), $row['name'], $row['location'], ($row['teacherID']));
                array_push($this->classArray, $class);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;


        return $this->classArray;

    }

    public function getClass(int $id): ClassModel
    {

        try {

           $conn = $this->connect();

            $stmt = $conn->query("SELECT c.id, c.location, c.name, c.teacherID FROM Class c WHERE c.id = $id");
            $result = $stmt->fetch();
            $class = new ClassModel((int)$result['id'], $result['name'], $result['location'], $result['teacherID']);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();

        }
        $conn = null;
        return $class;

    }

    public function insertNewClass(ClassModel $class): void
    {

        try {

            $conn = $this->connect();

            $id = $conn->lastInsertId();
            $location = $class->getclasslocation();
            $name = $class->getName();
            $teacherID = $class->getteacherid();

            $sql = "INSERT INTO Class (id, location, name, teacherID)
                VALUES ('$id', '$location', '$name', '$teacherID')";

            // use exec() because no results are returned
            $conn->exec($sql);
            //echo "New record created successfully";
        } catch (PDOException $e) {
            //echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }

    public function updateCLass(ClassModel $class): void
    {

        try {
            $conn = $this->connect();

            $id = $class->getId();
            $location = $class->getclasslocation();
            $name = $class->getName();
            $teacherID = $class->getteacherid();

            $sql = "UPDATE Class SET  location = '$location', name = '$name', teacherID = '$teacherID' WHERE id = '$id'";
            $conn->exec($sql);

        } catch (PDOException $e) {
            //echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function deleteClass(ClassModel $class): void
    {
        try {
            $conn = $this ->connect();

            $id = $class->getId();
            $sql = "DELETE FROM Class WHERE id ='$id'";
            $conn->exec($sql);

        } catch (PDOException $e) {
            //echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;


    }

    public function fetchStudents($id): array
    {

        $conn = $this->connect();

        $sql = "SELECT CONCAT_WS(' ',s.first_name,s.last_name) AS name , s.id FROM Class c LEFT JOIN Student s ON c.id = s.classID WHERE c.id = '$id'";
        $stmt = $conn->query($sql);
        $results = $stmt->fetchAll();
        return $results;

    }
}