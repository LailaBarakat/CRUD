<?php


class StudentModel extends DataBase
{
    private int $studentID;
    private string $firstname;
    private string $lastname;
    private string $email;

    public function __construct($id, $firstname, $lastname, $email)
    {
        $this->studentID = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;

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

}