<?php
$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
$starthourtime= $_POST['starthourtime'];
$startminutetime=$_POST['startminutetime'];
$endhourtime= $_POST['endthourtime'];
$startminutetime=$_POST['endminutetime'];
fwrite($myfile, $starthourtime);
echo "ok";
?>