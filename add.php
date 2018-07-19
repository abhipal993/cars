<?php

include_once("connection.php");
//echo '<pre>';print_r($_POST);die;
echo $mam = $_POST['man'];
echo $rem = $_POST['remarks'];
$date = time();

//$sql = $obj->Manufacture($mam, $rem, $date);
if ($sql) {
    echo "1";
} else {
    echo "0";
}
?>