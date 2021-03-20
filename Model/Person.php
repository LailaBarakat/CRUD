<?php


class Person
{
    private ?int $id;
    private string $firstName;
    private string $lastName;
    private string $email;

    /**
     * Person constructor.
     * @param int|null $id
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     */
    public function __construct( ?int $id, string $firstName, string $lastName, string $email)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return htmlspecialchars($this->id,ENT_NOQUOTES);
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return htmlspecialchars($this->firstName,ENT_NOQUOTES);
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return  htmlspecialchars($this->lastName, ENT_NOQUOTES);
    }
    /**
     * @return string
     */
    public function getFullName ():string
    {
        return htmlspecialchars($this->getLastName()." ".$this->getFirstName(),ENT_NOQUOTES)  ;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return  htmlspecialchars($this->email,ENT_NOQUOTES);
    }

}