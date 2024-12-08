<?php
require_once "AbstractUniversity.php";
require_once "Subject.php";

class University extends AbstractUniversity
{
    private function isSubjectExists(string $code, string $name): bool
    {
        if (count($this->subjects) == 0) return false;
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $code && $subject->getName() == $name) {
                return true;
            }
        }
        return false;
    }

    public function addSubject(string $code, string $name): Subject
    {
        if (!$this->isSubjectExists($code, $name)) {
            $subject = new Subject($code, $name);
            $this->subjects[] = $subject;
            return $subject;
        } else {
            throw new Exception("Subject already exists!");
        }
    }

    public function addStudentOnSubject(string $subjectCode, Student $student): void
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                $subject->addStudent($student->getName(), $student->getStudentNumber());
            }
        }
    }

    public function getStudentsForSubject(string $subjectCode): array
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                return $subject->getStudents();
            }
        }
        return [];
    }

    public function getNumberOfStudents(): int
    {
        $total = 0;
        foreach ($this->subjects as $subject) {
            foreach ($subject->getStudents() as $student) {
                $total++;
            }
        }
        return $total;
    }

    public function deleteSubject(Subject $subject): void
    {
        foreach ($this->subjects as $index => $sub) {
            if ($sub->getCode() === $subject->getCode()) {
                unset($this->subjects[$index]);
                $this->subjects = array_values($this->subjects); // Index újrarendezése
                return;
            }
        }
    }

    public function print(): void
    {
        foreach ($this->subjects as $subject) {
            echo '---------------------------------' . "<br>";
            echo $subject . "<br>";
            echo '---------------------------------' . "<br>";

            foreach ($subject->getStudents() as $student) {
                echo $student->getName() . " - " . $student->getStudentNumber();
                echo "<br>";
            }
        }
    }
}
