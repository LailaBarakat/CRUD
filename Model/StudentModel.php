<?php


class StudentModel extends DataBase
{
    public function getStudents(){
        $sql = "SELECT * FROM student";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}