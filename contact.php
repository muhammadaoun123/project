<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $subject = $_POST['subject'];
     $comment = $_POST['comment'];
}else{
    header('location: practice.php');
}

// connection with my sql
$connectwithphp = new mysqli('localhost','root','','first');

if($connectwithphp->connect_error){
    die('connection failed'.$connectwithphp->connect_error);
} else{
    $mydatastore = $connectwithphp->prepare('insert into ok(name,email,subject,comment)
    values(?,?,?,?)');
    $mydatastore->bind_param('ssss',$name,$email,$subject,$comment);
    $mydatastore->execute();
    echo '<h1 style="align-items: center; display: flex; justify-content:center; font-size: 60px; color:white; height:100vh; background:black; font-family:cursive;" > your form is submitted <br> we will reply you as soon as possible</h1>';
    $mydatastore->close();
    $connectwithphp->close();
  

}
?>




