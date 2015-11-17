<?php
$name=$_POST['name'];
$email=$_POST['email'];
$eventId=$_POST['eventId'];
require_once('config.php');
$db_config=new DB_config();
$db=$db_config->connect();
$sql="SELECT * FROM invites WHERE emailId='$email' AND eventId='$eventId'";
$result=$db->query($sql) or die($db->error);
if($result->num_rows!=0){
    echo "Person with the Email Id already invited.";
    die();
}
else{
    $sql="INSERT INTO invites
          VALUES (NULL,'$eventId','$name','$email',NULL)";
    $db->query($sql) or die($db->error);
    echo "Successfully invited <a href='invites.php?eventId=$eventId'>Go Back.</a>";
}
?>