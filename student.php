<?php

/* 
 * Student Object
 */
class Student {
    public $studentID = null;
    public $firstName = null;
    public $lastName = null;
    public $password = null;
    
    //constructs student object out of associated array
    public function __construct($row=array()){
        if ( isset( $row['studentID'] ) ) $this->studentID = $row['studentID'];
        if ( isset( $row['firstName'] ) ) $this->firstName = $row['firstName'];
        if ( isset( $row['lastName'] ) ) $this->lastName = $row['lastName'];
        if ( isset( $row['password'] ) ) $this->password = $row['password'];
    }
    
    //returns student information given studentID
    public static function getStudent($studentID){
        require( "config.php" );
        //connect to database, credentials defined in config.php
        $conn = new PDO ($servername, $username, $pass);
        $sql = "SELECT * FROM student WHERE studentID = studentID";
        //stores SELECT statement in $st variable
        $st = $conn->prepare( $sql );
        //runs SELECT statement through built-in execute() method
        $st->execute();
        //retrieves record as associated array (see constructor)
        $row = $st->fetch();
        //closes the connection
        $conn = null;
        /* here's where the Student object actually gets created. 
         * if there is a valid result, statement automatically instantiates
         * a student object by invoking __construct() 
         */
        if ($row) return new Student($row);
    }
    
    public function register(){
        
        
    }
}



?>
