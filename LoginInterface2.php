
<html>
    <head>
        <title>User Login</title>
        <style>
            .tableheader {
                background-color: #95BEE6;
                color:white;
                font-weight:bold;
            }
            .tablerow {
                background-color: #A7D6F1;
                color:white;
            }
            .message {
                color: #FF0000;
                font-weight: bold;
                text-align: center;
                width: 100%;
            }
        </style>

    </head>
    <body>

//        <?php
//        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//            ?>   

            <form name="frmUser" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="message"></div>
                <table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
                    <tr class="tableheader">
                        <td align="center" colspan="2">Enter Login Details</td>
                    </tr>
                    <tr class="tablerow">
                        <td align="right">Student ID</td>
                        <td><input type="text" name="studentid" required></td>
                    </tr>
                    <tr class="tablerow">
                        <td align="right">Password</td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                    <tr class="tableheader">
                        <td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
                    </tr>
                </table>
            </form>

    <?php 
    include 'RegistrationInterface.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (is_null("studentid")) {
        echo "Please enter a student ID";
    } elseif (is_null("password")) {
        echo "Please enter a password";
    }

    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "registration";


    $studentid = $_POST["studentid"];
    $password = $_POST["password"];

    //Create connection
    $conn = new mysqli($servername, $username, $pass, $dbname);

    //Check connection
    if ($conn === FALSE) {
        echo "Failed to connect to MySQL: " . mysqli_connect_errno();
    }
    //First query is used to check student ID and password
    $sql = "SELECT * FROM student where studentid = '$studentid' and password = '$password'";
    $result = $conn->query($sql);
    $rows = $result->fetch_assoc();

    if ($rows['studentid'] == $studentid && $rows['password'] == $password) {
        header("location:RegistrationInterface.php");
    } else {
        //Stay on the first page if the user enter wrong student ID or password
        $alert = "<h1> Access Denied </h1><p>Your user ID or password is 
            incorrect, or you are not a registered user on this site. To try 
            logging in again, click <a href='http://localhost/INFO-671-group-3-final-project/LoginInterface2.php'>here</a></p>.";
        echo $alert;
    }
}
?>

    </body></html>