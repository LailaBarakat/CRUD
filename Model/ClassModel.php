<?php
declare(strict_types=1);

class ClassModel
{
    private ?int $id;
    private string $className;
    private string $classLocation;
    private string $teacherID;

    public function __construct($id, $className, $classLocation, $teacherID)
    {
        $this->id = $id;
        $this->className = $className;
        $this->classLocation = $classLocation;
        $this->teacherID = $teacherID;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->className;
    }

    public function getclasslocation(): string
    {
        return $this->classLocation;
    }

    public function getteacherid(): string
    {
        return $this->teacherID;
    }

}