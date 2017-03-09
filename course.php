<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Course {
	public $courseNumber = null;
	public $courseName = null;
	
	public function __construct($courseNumber, $courseName){
		$this->courseNumber = $courseNumber;
		$this->courseName = $courseName;
		
	}
	public function getList(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM course  ORDER BY courseNumber ASC";
	}
};


class Section extends Course {
	public $sectionNumber = null;
	
	public function __construct($sectionNumber){
            $this->sectionNumber = $sectionNumber;
	}
	public function getList($course){

	}
	//** a statement here to check num rows and return “course is not offered this term”
};

