<?php

class Person {
	private $fname;
	private $lname;
	
	public function __construct($fn, $ln) {
			$this->fname = $fn;
			$this->lname = $ln;
	}
	
	public function getName() {
		return $this->fname . " " . $this->lname;
	}
}


class Student extends Person {
	private $rin;

	public function __construct($fn, $ln, $r) {
	// call the parent constructor
	parent::__construct($fn, $ln);
	$this->rin = $r;
	}
}

$student = new Student('FirstName','LastName','000000');

// var_dump($student);
echo $student->getName();

?>
