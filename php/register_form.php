<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpass']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
         
      }else{
         $insert = "INSERT INTO user_form(name, email, password) VALUES('$name','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<?php
@include '../php/InitHTML/head.php';
?>
<body class="background-img-login">
   <div class="container margin-container">
      <div class="row">
         <div class="col-4"></div>
         <div class="col-4">
            <div class="card">
               <div class="card-body">
                  <h3>ANONYMOUS STRIKE</h3>
                  <h3>BACK</h3>
                  <form action="" method="POST">
                     <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">name</span>
                        <input id = "name" type="name" name="name" class="form-control" placeholder="name" aria-label="name" aria-describedby="basic-addon1">
                     </div>
                     <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">email</span>
                        <input id = "email" type="email" name="email" class="form-control" placeholder="email" aria-label="email" aria-describedby="basic-addon1">
                     </div>
                     <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">password</span>
                        <input id = "password" type="password" name="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon2">
                     </div>
                     <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">confirm password</span>
                        <input id = "cpass"  type="password" name="confirm password" class="form-control" placeholder="confirm password" aria-label="password" aria-describedby="basic-addon2">
                     </div>
                     <div class="input-group mb-3">
                        <button type="submit" class="btn btn-primary">log in</button>
                     </div>
                     <p class="error-text">
                        <?php
                        if (isset($error)) {
                           echo $error;
                        };
                        ?>
                     </p>
                     <p>already have an account? <a href="login_form.php">register now</a></p>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-4"></div>
      </div>
   </div>
   <?php 
   @include '../php/InitHTML/footer.php';
   ?>
</body>
</html>