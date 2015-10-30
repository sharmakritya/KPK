<?php
/**
 * Created by PhpStorm.
 * User: sharmakritya
 * Date: 29-10-2015
 * Time: 15:36
 */
session_start();
$email=$_POST['email'];
$password=$_POST['password'];
require_once('config.php');
$db_config=new DB_config();
$db=$db_config->connect();
$sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
$result=$db->query($sql);
if($result->num_rows==0){
    echo "Username and password not valid.";
}
else{
    $row=$result->fetch_assoc();
    $_SESSION['loggedIn']=true;
    $_SESSION['userId']=$row['id'];
    header("Location: manage.php");
    die();
}