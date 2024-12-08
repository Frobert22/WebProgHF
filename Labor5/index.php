<?php
declare(strict_types=1);

require_once "Student.php";
require_once "Subject.php";
require_once "University.php";

$univ = new University();

$webProg = $univ->addSubject('101', 'Web programming');
$database = $univ->addSubject('102', 'Database');
$javaProg = $univ->addSubject('103', 'Java programming');

$webProg->addStudent('Kiss Lajos', '520');
$webProg->addStudent('Nagy Peter', '521');
$database->addStudent('Egy Elek', '522');
$database->addStudent('Ket Ella', '523');

$univ->addStudentOnSubject('103', new Student("Harom Ella", "524"));

$student1 = $webProg->getStudents()[0];
$student2 = $database->getStudents()[1];

$student1->addGrade($webProg, 9.5);
$student1->addGrade($database, 8.0);
$student2->addGrade($database, 7.5);

echo "Kiss Lajos' grades:<br>";
$student1->printGrades();
echo "Ket Ella's grades:<br>";
$student2->printGrades();

echo "Kiss Lajos' average grade: " . $student1->getAvgGrade() . "<br>";
echo "Ket Ella's average grade: " . $student2->getAvgGrade() . "<br>";

echo "Before deletion:<br>";
$univ->print();

if ($webProg->deleteStudent('520')) {
    echo "Kiss Lajos removed from Web programming.<br>";
} else {
    echo "Kiss Lajos not found.<br>";
}

echo "After deletion:<br>";
$univ->print();

try {
    $univ->deleteSubject($database);
    echo "Database course deleted.<br>";
} catch (Exception $e) {
    echo "Error deleting course: " . $e->getMessage() . "<br>";
}


$allStudents = [];
foreach ($univ->getSubjects() as $subject) {
    foreach ($subject->getStudents() as $student) {
        $allStudents[] = $student;
    }
}


function sortStudentsByAverage(array $allStudents): array
{

    usort($allStudents, function($a, $b) {
        return $b->getAvgGrade() - $a->getAvgGrade();
    });
    return $allStudents;
}

$sortedStudents = sortStudentsByAverage($allStudents);
echo "Students sorted by average grade:<br>";
foreach ($sortedStudents as $student) {
    echo $student->getName() . " - " . $student->getAvgGrade() . "<br>";
}

echo "Final state:<br>";
$univ->print();
echo "Total number of students: " . $univ->getNumberOfStudents();
?>
