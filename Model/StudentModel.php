<?php
declare(strict_types=1);


class StudentModel extends DataBase
{
    private int $studentID;
    private string $firstname;
    private string $lastname;
    private string $email;
    private int $classID;

    public function __construct($id, $firstname, $lastname, $email, $classID)
    {
        $this->studentID = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->classID = $classID;
    }

    public function getStudentID(): int
    {
        return $this->studentID;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getClassID(): int
    {
        return $this->classID;
    }

}