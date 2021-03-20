<?php

use JetBrains\PhpStorm\Pure;

class Teacher extends Person
{
    #[Pure] public function __construct(?int $id, string $firstname, string $lastname, string $email)
    {
        parent::__construct($id, $firstname, $lastname, $email);

    }

}