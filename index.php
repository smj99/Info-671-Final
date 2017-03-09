<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
        <?php
            require( "config.php" );
            session_start();
            $_SESSION['currentStudent'] = "";
            $action = isset( $_GET['action'] ) ? $_GET['action'] : "";
            switch ( $action ) {
              case 'login':
                login();
                break;
              case 'registration':
                registrationPage();
                break;
              case 'findfriends':
                friendsPage();
                break;
              default:
                require("login.php");
            }
            
            function login(){
                require( "config.php" );
                include "student.php";
                //assigns inputs from the login interface to variables
                $studentID = $_POST["studentID"];
                $password = $_POST["password"];
                //connect to database, credentials defined in config.php
                $conn = new PDO ($servername, $username, $pass);
                //select all matching records from the student table
                $sql = "SELECT * FROM student where studentID = '$studentID' and password = '$password'";
                //stores SELECT statement in $st variable
                $st = $conn->prepare( $sql );
                //runs SELECT statement through the execute() method
                $st->execute();
                //retrieves record as associated array (see constructor)
                $row = $st->fetch();
                if ($row) {
                //"...let them in"
                    
                    $currentStudent = Student::getStudent('$studentID');
                    include "welcome.php";
                    
                    $_SESSION['currentStudent'] = $currentStudent->lastName;
                    return $currentStudent;

                } else {
                    require("login.php");
                }
            }
            
            function registrationPage() {
                require("registration.php" );
            }
            
            function friendsPage(){
                echo "Whoops! Page under construction";
            }
            
            
        ?>
