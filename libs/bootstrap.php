<?php
session_start();
include('class.db.php');
include('func.php');
include('class.date.php');
$database = new db("root", "", "localhost", "clinician", array(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf-8'"));

?>