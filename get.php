<?php
include('libs/bootstrap.php');
$userInfo = pauth();
$q=$_GET["q"];
$getrows = $database->getRows("SELECT * FROM `doctor` WHERE specialty_id =?", array($q));
?>
<select class="input" name="menu" style="width: 200px;">
<?php
foreach ($getrows as $row) {
?>
<option value="<?=$row['id']?>">
<?=$row['name']?>
</option>
<?php
}
?>
</select>
