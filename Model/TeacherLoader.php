<?php

class TeacherLoader extends DataBase {

    private array $teacherArray = [];




    public function getAllTeachers ():array {

        try {

            $sql = "SELECT t.id, t.first_name, t.last_name, t.email FROM Teacher t";
            $conn = $this->connect();
            $stmt = $conn->query($sql);
            $teachers = $stmt->fetchAll();

            foreach ($teachers as $teacher) {
                $member = new Teacher($teacher['id'], $teacher['first_name'], $teacher['last_name'], $teacher['email']);
                $this->teacherArray[] = $member;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
        return $this->teacherArray;
    }

    public function insertNewTeacher (Teacher $teacher):void {

        try {
            $DB = new DataBase();
            $conn = $DB->connect();

//            $id=$teacher->getid();
            $id=$conn->lastInsertId();
            $first_name=$teacher->getFirstName();
            $last_name=$teacher->getLastName();
            $email=$teacher->getEmail();

            $sql = "INSERT INTO Teacher (id, first_name, last_name, email)
                VALUES ('$id', '$first_name', '$last_name', '$email')";
            // use exec() because no results are returned
            $conn->exec($sql);
            //echo "New record created successfully";
        } catch(PDOException $e) {
            //echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }


    public function getTeacher(int $id): Teacher
    {

        try {

            $DB = new DataBase();
            $conn = $DB->connect();

            $stmt = $conn->query("SELECT id, first_name, last_name, email FROM Teacher WHERE id = $id");
            $result = $stmt->fetch();
            $teacher = new Teacher( (int) $result['id'], $result['first_name'], $result['last_name'], $result['email']);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return $teacher;

    }

    public function updateTeacher(Teacher $teacher): void
    {
        try {
            $DB = new DataBase();
            $conn = $DB->connect();

            $id = $teacher->getid();
            $first_name = $teacher->getFirstName();
            $last_name = $teacher->getLastName();
            $email = $teacher->getEmail();
            $sql = "UPDATE Teacher SET  first_name = '$first_name', last_name = '$last_name', email = '$email' WHERE id = '$id'";
            $conn->exec($sql);

        } catch (PDOException $e) {
            //echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function deleteTeacher(Teacher $teacher): void
    {
        try {
            $DB = new DataBase();
            $conn = $DB->connect();

            $id = $teacher->getid();
            $sql = "DELETE FROM Teacher WHERE id = '$id'";
            $conn->exec($sql);

        } catch (PDOException $e) {
            //echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

}