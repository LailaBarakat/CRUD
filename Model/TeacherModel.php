<?php

class TeacherModel {
    private ?int $ID;
    private string $firstname;
    private string $lastname;
    private string $email;

    /**
     * TeacherModel constructor.
     * @param int $ID
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     */
    public function __construct(?int $ID, string $firstname, string $lastname, string $email)
    {
        $this->ID = $ID;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }

    /**
     * @param int $ID
     */
    public function setid(int $ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @param string $firstname
     */
    public function setfirst_name(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @param string $lastname
     */
    public function setlast_name(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getid(): ?int
    {
        return $this->ID;
    }

    /**
     * @return string
     */
    public function getfirst_name(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getlast_name(): string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    public function getteachername(): string
    {
        return $this->getfirst_name() . ' ' . $this->getlast_name();
    }

}
