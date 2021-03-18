<?php
declare(strict_types=1);

class ClassModel extends DataBase
{
    private int $classID;
    private string $className;
    private string $classLocation;
    private string $teacherID;

    public function __construct($id, $className, $classLocation, $teacherID)
    {
        $this->classID = $id;
        $this->className = $className;
        $this->classLocation = $classLocation;
        $this->teacherID = $teacherID;
    }

    public function getclassid(): int
    {
        return $this->classID;
    }

    public function getclassname(): string
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