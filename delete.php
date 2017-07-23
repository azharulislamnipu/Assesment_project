<?php include'inc/header.php';?>

<?php

if(isset($_GET['id'])){
  
  
  $id = $_GET['id'];
 
  }

echo $id;

$delete_query = "DELETE FROM user WHERE id = $id";

$delete = $db->delete($delete_query);

 if($delete){
      echo "<span class='success'>Data Deleted Successfully</span>";
       header('location: index.php');
    }else{
       echo "<span class='error'>Data Not Delete</span>";
  }




?>