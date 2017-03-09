<?php include "templates/header.php"; ?>
<h2><?php echo "Welcome, ". $_SESSION['currentStudent'] . "!"; ?></h2>
<!--Centers two smaller divs  -->
<div class="maincontainer" align="center">
    <!--link to registration interface-->
    <div class="main" align="left"><a href="./?action=registration"><p>Course Registration</p></a></div>
    <!--link to friend interface -->
    <div class="main" align = "right"><a href="./?action=findfriends"><p>Find friends</p></a></div>
</div>
<br />
<?php 
include "templates/footer.php"; ?>

