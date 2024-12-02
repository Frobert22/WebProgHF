<?php

class ArrayManipulator {
    private $data = [];

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        return isset($this->data[$name]) ? $this->data[$name] : null;
    }

    public function __isset($name) {
        return isset($this->data[$name]);
    }

    public function __unset($name) {
        unset($this->data[$name]);
    }

    public function __toString() {
        return print_r($this->data, true);
    }

    public function __clone() {
        $this->data = array_map(function ($value) {
            return is_object($value) ? clone $value : $value;
        }, $this->data);
    }
}

$manipulator = new ArrayManipulator();
$manipulator->name = "Lek";
$manipulator->age = 11;

echo "Name: " . $manipulator->name . "<br>";
echo "Age: " . $manipulator->age . "<br>";

if (isset($manipulator->name)) {
    echo "This key already exists.<br>";
}

unset($manipulator->name);
if (!isset($manipulator->name)) {
    echo "The name has been removed.<br>";
}

$clone = clone $manipulator;
$clone->age = 22;

echo "Cloned<br>";
echo $clone;
?>
