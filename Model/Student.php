<?php

use JetBrains\PhpStorm\Pure;

class Student extends Person
{
    private ?int $classId;

    /**
     * TeacherModel constructor.
     * @param int|null $id
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @param int|null $classId
     */

   #[Pure] public function __construct(?int $id, string $firstname, string $lastname, string $email, ?int $classId)
    {
        parent::__construct($id, $firstname, $lastname, $email);
        $this->classId = $classId;
    }

    /**
     * @return int|null
     */
    public function getClassId(): ?int
    {
        return $this->classId;
    }

}