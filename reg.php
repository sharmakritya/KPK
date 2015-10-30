<?php
/**
 * Created by PhpStorm.
 * User: sharmakritya
 * Date: 29-10-2015
 * Time: 15:36
 */
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];
require_once('config.php');
$db_config=new DB_config();
$db=$db_config->connect();
$sql="SELECT * FROM users WHERE email='$email'";
$result=$db->query($sql) or die($db->error);
if($result->num_rows!=0){
    echo "Email ID already registered.";
    die();
}
else{
    $sql="INSERT INTO users
          VALUES ('','$email','$password','$firstName','$lastName')";
    $db->query($sql);
    echo "Successfully registered. Login to continue.";
}