<?php
session_start();
require_once('config.php');
$db_config=new DB_config();
$db=$db_config->connect();

$moduleId=$_POST['moduleId'];
$moduleTitle=$_POST['moduleTitle'];

$sql="SELECT * FROM modules WHERE id='$moduleId'";
$result=$db->query($sql);
$row=$result->fetch_assoc();

$moduleTypeId=$row['moduleTypeId'];
//if($moduleTypeId==1) {
    $storyEdit=$_POST['storyEdit'];
$sql="UPDATE modules
SET title='$moduleTitle'
WHERE id='$moduleId'";
$db->query($sql) or die($db->error);;
$sql="UPDATE moduledata
SET datao='$storyEdit'
WHERE moduleId='$moduleId'";
$db->query($sql) or die($db->error);
echo "Successfully updated.";
//}