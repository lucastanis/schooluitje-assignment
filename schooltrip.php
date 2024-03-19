<?php

require_once 'student.php';
require_once 'schooltriplist.php';

class Schooltrip {
    private $name;
    private $schooltripLists = [];
    private $countStudent = 0;
    private $countList = 0;
    private $amount = 0;

    public function __construct($name) {
        $this->name = $name;
    }

    public function addSchooltripList() {
        $this->schooltripLists[] = new SchooltripList();
        $this->countList++;
    }
    public function getName() {
        return $this->name;
    }

    public function addStudent(Student $student) {
        if ($this->countStudent % 5 == 0) {
            $this->addSchooltripList();
        }

        $this->schooltripLists[$this->countList - 1]->addStudentToList($student);
        $this->countStudent++;
    }

    public function getSchooltripLists() {
        return $this->schooltripLists;
    }

    public function getTotalAmount() {
        return $this->amount;
    }

    public function collectPayment(Student $student, $amount) {
        $student->pay($amount);
        $this->amount += $amount;
    }
}
?>
