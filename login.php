<?php include "templates/header.php"; ?>
 
<h2>Student Login</h2>  
<p class="infotext"><?php /*error message here*/ ?></p>
<form name="frmUser" method="post" action="welcome.php?action=login">
    <div class="message"></div>
    <table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
        <tr class="tableheader">
            <td align="center" colspan="2">Enter Login Details</td>
        </tr>
        <tr class="tablerow">
            <td align="right">Student ID</td>
            <td><input type="text" name="studentID" required></td>
        </tr>
        <tr class="tablerow">
            <td align="right">Password</td>
            <td><input type="password" name="password" required></td>
        </tr>
        <tr class="tableheader">
            <td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
    <br />
</form>

<?php include "templates/footer.php"; ?>