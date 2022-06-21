<?php

@include 'config1.php';

if(isset($_POST['submit'])){

   $result=mysqli_query($conn,"SELECT * FROM user_form WHERE email='".$_POST['email']. "' AND pass='".$_POST['pass']."'  ");
   $num=mysqli_num_rows($result);
   if($num>0){
      $row=mysqli_fetch_array($result);
      header("location:Alumni.php");
      exit();
   }
   else{
      $error[] = 'incorrect email or password!';
   }
};
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="loginform.css">

</head>
<body>
   
<div class="form-container">

   <form action="index.php" method="post">
 
   <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="pass" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="REGISTER.php">register now</a></p>
   </form>

</div>

</body>
</html>