<?php

@include 'config.php';

// Starting the session for user
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {

   // to take input from form
   $email = $_POST['email'];
   $pass = $_POST['password'];

   $select = " SELECT * FROM user_form WHERE email LIKE '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);


   $result = $conn->query($select);

   if ($result->num_rows > 0) {
     
      // output data of each row
     while($row = $result->fetch_assoc()) {
      
      // Passing data from DB to server
      $_SESSION["userId"] = $row["id"];
      $_SESSION["userName"] = $row["name"];
      $_SESSION["userEmail"] = $row["email"];
      $_SESSION["userPassword"] = $row["password"];


      header('location:user_page.php');
     }
   } 
   
   else 
   {
      $error = '*incorrect email or password!';
   }

   $conn->close();

};

?>

<!DOCTYPE html>
<html lang="en">

<?php
@include 'config.php';
@include '../php/InitHTML/head.php';
?>

<body class="background-img-login">

   <div class="container margin-container">

      <div class="row">
         <div class="col-4"></div>
         <div class="col-4">
            <div class="card">
               <div class="card-body">

                  <h3>login now</h3>

                  <form action="" method="POST">

                     <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">email</span>
                        <input type="email" name="email" class="form-control" placeholder="email" aria-label="email" aria-describedby="basic-addon1">
                     </div>

                     <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">password</span>
                        <input type="password" name="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon2">
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

                     <p>don't have an account? <a href="register_form.php">register now</a></p>
                 
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