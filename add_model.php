<?php

include_once("connection.php");


$values=$_POST;
$id=$_POST['id'];
$ref=$_POST['ref'];
//print_r($values);die;
if($ref=='model')
{
 $sql = $obj->addModel($values);
//echo $sql;die;
 if ($sql) {
    echo "1";
} else {
    echo "0";
} 
}
if($ref=="sold")
{
	echo $pql=$obj->sold($id);
}
?>