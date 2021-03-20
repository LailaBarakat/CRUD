<?php


class StudentLoader extends DataBase
{
    private array $studentArray = [];
    private Student $student;

    public function getStudent(int $id): Student
    {
        try {

            $conn = $this->connect();

            $sql = "SELECT id, first_name, last_name, email, classID FROM Student WHERE id = $id";
            $stmt = $conn->query($sql);
            $result = $stmt->fetch();

            $this->student = new Student ((int)$result['id'], $result['first_name'], $result['last_name'], $result['email'], (int)$result['classID']);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return $this->student;
    }

    public function getAllStudents(): array
    {

        try {
            $conn = $this->connect();

            $sql = "SELECT s.id, s.first_name, s.last_name, s.email, s.classID, c.name AS class_name FROM Student s LEFT JOIN Class c ON s.classID = c.id";
            $stmt = $conn->query($sql);
            $students = $stmt->fetchAll();

            foreach ($students as $student) {
                $member = new Student($student['id'], $student['first_name'], $student['last_name'], $student['email'], $student['classID']);
                $this->studentArray[] = $member;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return $this->studentArray;

    }

    public function getStudentsByClass($id): array
    {

        $conn = $this->connect();

        $sql = "SELECT CONCAT_WS(' ',s.first_name,s.last_name) as name, s.id FROM Class c LEFT JOIN Student s ON c.id = s.classID WHERE c.id = '$id'";
        $stmt = $conn->query($sql);
        $results = $stmt->fetchAll();
        return $results;

    }

    public function getStudentsByTeacher($id): array
    {

        $conn = $this->connect();

        $sql = "SELECT CONCAT_WS(' ',s.first_name,s.last_name) as fullname, s.id FROM Student AS s INNER JOIN Class AS c ON s.classID = c.id WHERE c.teacherID = '$id'";
        $stmt = $conn->query($sql);
        $results = $stmt->fetchAll();
        return $results;

    }

    public function insertNewStudent(Student $student): void
    {

        try {
            $conn = $this->connect();

            $id = $conn->lastInsertId();
            $first_name = $student->getFirstName();
            $last_name = $student->getLastName();
            $email = $student->getEmail();
            $classID = $student->getClassId();

            if (!empty($classID)) {
                $sql = "INSERT INTO Student (id, first_name, last_name, email, classID) VALUES ('$id', '$first_name', '$last_name', '$email', '$classID')";
            } else {
                $sql = "INSERT INTO Student (id, first_name, last_name, email) VALUES ('$id', '$first_name', '$last_name', '$email')";
            }

            $conn->exec($sql);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
    }

    public function updateStudent(Student $student): void
    {
        try {
            $conn = $this->connect();

            $id = $student->getId();
            $first_name = $student->getFirstName();
            $last_name = $student->getLastName();
            $email = $student->getEmail();
            $classID = $student->getClassId();


            if (!empty($classID)){
                $sql = "UPDATE Student SET  first_name = '$first_name', last_name = '$last_name', email = '$email', classID = '$classID' WHERE id = '$id'";
            }else{
                $sql = "UPDATE Student SET  first_name = '$first_name', last_name = '$last_name', email = '$email' WHERE id = '$id'";
            }


            $conn->exec($sql);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

    public function deleteStudent(Student $student): void
    {
        try {
            $conn = $this->connect();

            $id = $student->getId();
            $sql = "DELETE FROM Student WHERE id = '$id'";
            $conn->exec($sql);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

}