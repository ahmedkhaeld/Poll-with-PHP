<?php 

session_start();
$_SESSION['user_id']=1;

$db=new PDO('mysql:dbname=poll;host=localhost', 'root', '');

if (! isset($_SESSION['user_id'])){
    die(" you are not signed in");
}

?>