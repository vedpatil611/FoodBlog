<?php
  require "conn.php";
  $type=$_POST['type'];
  $id=$_POST['id'];
  if($type=='like'){
      $sql="update recipe set like_count=like_count+1 where id=$id";
  }else{
    $sql="update  recipe set like_count=like_count-1 where id=$id";
}
$res = mysqli_query($conn,$sql);

?>