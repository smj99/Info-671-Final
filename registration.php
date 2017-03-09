<?php include "templates/header.php"; ?>
 
<h2>Registration</h2>     

        <style>
            #bigbox{

                width:900px;
                margin:auto;

            }

            .header{
                height: 100px;

            }

            


            

            
            
            #left {
                float: left;
                width: 400px;
                height: 600px;
                overflow: scroll;
            }

            #right {
                width:300px;
                height: 600px;
                float:right;
            }

            #placeToShowText {
                height: 150px;
                width: 350px;
                background-color: #f6f6f6;
                margin-bottom: 20px;

            }

            #registrationInfo {
                height: 200px;
                width: 350px;
                background-color: #a4c5fc;
                margin-bottom: 20px;
            }

        </style>
        
    </head>
    
    
    
    
    <body>
        <?php
        include 'student.php';
//        $servername = "localhost";
//        $username = "root";
//        $pass = "q1834618q";
//        $dbname = "registration";


//        $studentid = $_POST["studentid"];
//        $password = $_POST["password"];


        //Create connection
//        $conn = new mysqli($servername, $username, $pass, $dbname);

        //Check connection
//        if (mysqli_connect_errno()) {
//            echo "Failed to connect to MySQL: " . mysqli_connect_error();
//        }
        //First query is used to check student ID and password
//        $sql = "SELECT * FROM student where studentid = '$studentid' and password = '$password'";
//        $result = $conn->query($sql);
//        $rows = $result->fetch_assoc();

//        if ($rows['studentid'] == $studentid && $rows['password'] == $password) {
//            echo "Login Success!! " . $rows['fname'];
//        }
        ?>
     
        <div id="bigbox">
            <div class="header">
                <h2>Course Registration system</h2>
                <p>Click one of the courses and relative course information would be displayed on your right.</p>
            </div>
            
            <!-- Course List -->
            <div id="left">
                
                <form>
                    <input type="radio"  value=10531 name="courseDisplay" onclick="showTextFunction(this)"> INFO 515 Research in Info Orgs<br>
                    <input type="radio"  value=10595 name="courseDisplay" onclick="showTextFunction(this)"> INFO 515 Research in Info Orgs<br>
                    <input type="radio"  value=12652 name="courseDisplay" onclick="showTextFunction(this)"> INFO 517 Princ of Cybersec<br>
                    <input type="radio"  value=10285 name="courseDisplay" onclick="showTextFunction(this)"> INFO 520 Social Context of Info Prof<br>
                    <input type="radio"  value=10367 name="courseDisplay" onclick="showTextFunction(this)"> INFO 520 Social Context of Info Prof<br>
                    <input type="radio"  value=11411 name="courseDisplay" onclick="showTextFunction(this)"> INFO 521 Information Users and Services<br>
                    
                    <input type="radio"  value=26011 name="courseDisplay" onclick="showTextFunction(this)"> INFO 671 Web Systems and Architecture<br>
                    
                </form> 
            </div>

            <div id="right">
                <div id="placeToShowText">Display course information here</div>
                <div id="registrationInfo">
                    <?php
                        //If login success, display registration information of the user.
                        //If not, stay on the previous login page.
                        if ($rows['studentid'] == $studentid && $rows['password'] == $password) {
                        //Second query is used to display registration information of the user
                        $sql = "SELECT coursename,coursenum,sectionnum FROM registrationrecord where studentid = '$studentid'";
                        $result = mysqli_query($conn, $sql);

                        //Make a table to display information
                        echo "<table border='1'>
                            <tr>
                            <th>Course Name</th>
                            <th>Course Num</th>
                            <th>Section Num</th>
                            </tr>";

                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['coursename'] . "</td>";
                            echo "<td>" . $row['coursenum'] . "</td>";
                            echo "<td>" . $row['sectionnum'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        //Stay on the first page if the user enter wrong student ID or password
                        header("location:LoginInterface.php");
                        echo ("Wrong student ID or password.");
                    }
                    ?>
                </div>
                <form method="post" action="addAndDropCourse.php">
                     <input type="submit" name="add" value="add course" >
                    <input type="submit" name="drop" value="drop course" >
                    <!-- hidden input are used to store information -->
                    <input type="hidden" id="courseName" name="coursename" value="Research in Info Orgs" >
                    <input type="hidden" id="courseNum" name="coursenum" value="515" >
                    <input type="hidden" id="sectionNum" name="sectionnum" value="900" >
                    
                    <!-- Pass studentid from php to html -->
                    <input type="hidden" name="studentid" value="<?php echo $studentid  ?>" >
                    
                    <input type="hidden" name="password" value="<?php echo $password  ?>" >
                </form>
            </div>
            
            
        </div>
        
        
        <script>
           

        var courseContent ={
            10531:["Research in Info Orgs",515,900,201615,10531, "Yonker Valerie",3],
            10595:["Research in Info Orgs",515,901,201615,10595, "Yonker Valerie",3],
            12652:["Princ of Cybersec",517,900,201615,12652, "Whipple David",3],
            10285:["Social Context of Info Prof",520,900,201615,10285,"Marion Linda",3],
            10367:["Social Context of Info Prof",520,901,201615,10367,"Turner Deborah",3],
            11411:["Information Users and Services",521,900,201615,11411,"Marion Linda",3],
            11467:["Info Access & Resources",522,900,201615,11467,"Greenberg Jane",3],
            11382:["Foundations of Info Systems",530,902,201615,11382,"Yonker Valerie",3],
            13850:["Software Development",532,001,201615,13850,"Kinkela Maureen",3],
            12363:["Software Development",532,900,201615,12363,"Kinkela Maureen",3],
            26011:["Web Systems and Architecture",671,001,201625,26011,"Yuan An",3]
        };

        function showTextFunction(whichCourse){
    
            var CRN = whichCourse.getAttribute("value");
            var courseName = courseContent[CRN][0];
            var courseNum = courseContent[CRN][1];
            var section = courseContent[CRN][2];
            var term = courseContent[CRN][3];
            var instructorName = courseContent[CRN][5];
            var credit =courseContent[CRN][6];
            var placeToShowText = document.getElementById("placeToShowText");
           
            document.getElementById("courseName").setAttribute("value", courseName); 
            document.getElementById("courseNum").setAttribute("value", courseNum);   
            document.getElementById("sectionNum").setAttribute("value", section); 
            
            //Test if javascript can change the attribute of coursename, coursenum and sectionnum
            //according to our click
            /*
            var test1 = document.getElementById("courseName").getAttribute("value");
            var test2 = document.getElementById("courseNum").getAttribute("value");
            var test3 = document.getElementById("sectionNum").getAttribute("value");
            */
            placeToShowText.innerHTML = "Course Name: " + courseName + "<br />" +
                                        "Course Number: INFO "+ courseNum + "<br />" +
                                        "Course Section: " + section + "<br />" +
                                        "Course Term: " + term + "<br/>" +
                                        "CRN: " + CRN +"<br />" + 
                                        "Course Instructor: " + instructorName + "<br />" +
                                        "Course Credit: " + credit + "<br />" 
                                        /*+
                                        "<br />" + test1 + "<br />"+ 
                                        test2 + "<br />" + test3 */;

            
        }


        </script>


<?php include "templates/footer.php"; ?>