<?php

class Student
{
    private string $name;
    private string $studentNumber;
    private array $grades = [];  // Hozzáadva a grades tömb

    public function __construct(string $name, string $studentNumber)
    {
        $this->name = $name;
        $this->studentNumber = $studentNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getStudentNumber(): string
    {
        return $this->studentNumber;
    }

    public function setStudentNumber(string $studentNumber): void
    {
        $this->studentNumber = $studentNumber;
    }

    public function addGrade(Subject $subject, float $grade): void
    {
        $this->grades[$subject->getCode()] = $grade;
    }

    public function getAvgGrade(): float
    {
        if (count($this->grades) === 0) {
            return 0;
        }

        return array_sum($this->grades) / count($this->grades);
    }

    public function printGrades(): void
    {
        foreach ($this->grades as $subjectCode => $grade) {
            echo $subjectCode . " - " . $grade . "<br>";
        }
    }
}
?>
