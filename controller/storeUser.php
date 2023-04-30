<?php
session_start();
include"../inc/env.php";

//*validation rules


$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone= $_REQUEST['number'];
$password= $_REQUEST['password'];
$confirm_password= $_REQUEST['confirm_password'];
$enc_psk= password_hash($password, PASSWORD_BCRYPT); 

$errors=[];



if (empty($name)) {
    $errors['name_error']="Please Enter Your Name";
}
$query= "SELECT * from users where email='$email'";
$response = mysqli_query($conn,$query);
if(empty($email)){
    $errors['email_error']="Please Enter Your Email";
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email_error']="Please Enter A Valid Email";
}else if($response -> num_rows > 0){

    $errors['email_error']="This Email is already exits";
}
 if (strlen($phone) != 11) {
$errors['number_error']="Please Enter A Valid Phone Number";
}
 if (empty($password)) {
    $errors['password_error']="Please Enter Your Password";
 }else if (strlen($password)<5) {
$errors['password_error']="Your Password Is Tooo Short";
 }

 if (empty($confirm_password)) {
    $errors['confirm_password_error']="Please Enter Your Password Again";
}elseif ($password != $confirm_password) {
    $errors['confirm_password_error']="Did Not Matched";
}
// check for errors

if(count($errors)> 0) {
  //redirect back
$_SESSION['form_errors']= $errors;
$_SESSION['old']=$_REQUEST;
  header("Location: ../register.php");
 
}else{
    
    $query= "INSERT INTO users(name, email, phone, password) VALUES ('$name', '$email', '$phone', '$enc_psk')";

    $response= mysqli_query($conn,$query);
    if($response){

        header("Location: ../login.php");
        $_SESSION['msg']='successfully login';
    }
}
?> 
