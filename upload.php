<?php
 include 'connection.php'; 
 if(isset($_POST['submit'])){
     $name = $_POST['name'];
     $code = $_POST['code'];
     $file = $_FILES['image'];
     $price = $_POST['price'];
     $description = $_POST['description'];
     $status = $_POST['status'];

// print_r($file);
$filename = $file['name'];
$filepath = $file['tmp_name'];
$fileerror = $file['error'];
if($fileerror == 0 ){

    $destfile = 'upload/'.$filename;
    // echo "$destfile";
    move_uploaded_file($filepath,$destfile);

    $insert = "insert into products(name,code,image,price,description,status) values('$name','$code','$destfile','$price','$description','$status')" ;
    $query = mysqli_query($link,$insert);
    if($query){
        echo "insert";
    }else{
        echo "not insert";
    }
}
 }else{
     echo "no button clicked";
 }
 
 
 
 ?>
