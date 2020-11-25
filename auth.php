<?php
unset($_POST['users']);
unset($_POST['password']);
$auth_prefix_salt = 'ab';
$auth_suffix_salt = 'abc';
$auth_salt01='abcd';
$auth_salt02='abcde';
$auth_salt03='abcdef';
$auth_salt04='abcdefg';
$auth_salt05='abcdefgh';
$auth_salt06='abcdefghi';
$auth_salt07='abcdefghij';
$auth_salt08='abcdefghijk';
$auth_salt09='abcdefghijkl';
$xt=date("Y");
//$db_server ='localhost';
//$db_user ='root';
//$db_pass ='root';
//$db_schema ='edwh';

//$dbc = new mysqli($db_server, $db_user, $db_pass, $db_schema);	
if ($_POST)
{

$db_server ='127.0.0.1';
$db_user ='test';
$db_pass ='password';
$db_schema ='edwh_data'; 

$users = $_POST['users'];
$password = $_POST['password'];

$dbc = new mysqli($db_server, $db_user, $db_pass, $db_schema) or die('Error not connected to DB');
//$dbc = new mysqli($auth_db_user,$auth_db_pass,$auth_db_schema,$auth_db_server) or die('Error not connected to DB');

$query = "SELECT * FROM `auth` WHERE users ='$users' and password = '$password'";
$result = mysqli_query($dbc,$query);

if(mysqli_query($result)==1)
{
 session_start();
 $_SESSION['auth']='true';
 header('location:index.php');
}
else {echo 'password123';}
}

?>