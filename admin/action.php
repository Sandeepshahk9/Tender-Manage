<?php 
ini_set('upload_max_filesize', '512M');
include_once('include/config.php');
include_once('include/function.php');
include_once('include/logincheck.php');


/////admin login
if(isset($_POST['admin']))
{
$un = $_POST['username'];
$pw = $_POST['password'];

if($un=='' && $pw=='')
{
$erro="<div class='alert alert-danger'>Please enter Username And Password.</div>";
}
elseif($un=='')
{
$erro="<div class='alert alert-danger'>Please enter Username.</div>";
}
elseif($pw=='')
{
$erro="<div class='alert alert-danger'>Please enter Password.</div>";
}
else
{
checkpass($un,$pw);
}
}
/////// admin logout

if ($_GET['action'] == 'logout') {
    logout();
} 


///////////////chnage password  admin
if (isset($_POST['changepassword'])) {
    if ($_POST['oldpass'] == '' || $_POST['newpass'] == '' || $_POST['conpass'] == '') {
        echo '<script>location.href="change-password.php?msg=1";</script>';
    } elseif (strlen($_POST['oldpass']) < 5 || strlen($_POST['newpass']) < 5 || strlen($_POST['conpass']) < 5) {
        echo '<script>location.href="change-password.php?msg=2";</script>';
    } else {
        if ($_POST['newpass'] == $_POST['conpass']) {
            $sql = mysql_query("select * from admin where password = '".$_POST["oldpass"]."' AND id='" . $_SESSION["uniq_user_id"] . "'");
            $num = mysql_num_rows($sql);
            if ($num > 0) {
                mysql_query("update admin set password = '" .$_POST["newpass"]. "', spassword='" . $_POST["newpass"] . "' where id = '" . $_SESSION["uniq_user_id"] . "'");
                echo '<script>location.href="change-password.php?msg=5";</script>';
            } else {
                echo '<script>location.href="change-password.php?msg=3";</script>';
            }
        } else {
            echo '<script>location.href="change-password.php?msg=4";</script>';
        }
    }
}
/////////////// end change password admin

//////////////////activate all
if (isset($_POST['activall'])) {
    actiall($_POST['colname'], $_POST['tabl'], $_POST['pgname']);
}

//////////////////deactivate all
if (isset($_POST['deactivall'])) {
    deactiall($_POST['colname'], $_POST['tabl'], $_POST['pgname']);
}
//////////////////delete all
if (isset($_POST['deleteall'])) {
    delall($_POST['colname'], $_POST['tabl'], $_POST['pgname'], $_POST['delimju']);
}

///////////////////////////////////////  mail  reply data //////////////////////////

if (isset($_POST['reply'])) {
    reply($_POST['colname'], $_POST['tabl'], $_POST['pgname'],$_POST['msg']);
}







?>