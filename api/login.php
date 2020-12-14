<?php
include_once "../base.php";

$acc=$_POST['acc'];
$pw=$_POST['pw'];

$check=$Admin->count(['acc'=>$acc,'pw'=>$pw]);

if($check>0){
  $_SESSION['login']=$acc;
  to("../backend.php");
}else{
  to("../index.php?do=login&err=1");
}


?>