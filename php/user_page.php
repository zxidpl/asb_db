<?php 
@include 'config.php';

    // copy setiap kali nk buat page baru
    // start session 

    session_start();
    // check if user have login or not
    if(!isset($_SESSION['userName'])){
        header('location:login_form.php');
     }
?>
<!DOCTYPE html>
<html>
 
<?php
@include '../php/InitHTML/head.php';
?>
<body class="background-img-login">
    <p >Hi <?php if(isset($_SESSION["userName"])){echo $_SESSION["userName"];} ;?></p> <!--if userName variable session exists inside server, it will display the variable value-->

    <div class="container margin-user-page-menu">
        <div class="row">
            <div class="col-11 ">
                <body
                    <h1>ANONYMOUS STRIKE</h1>
                    <h1>BACK</h1>  
                </body>
            </div>
            <div class="col-1">
                <button type="button" class="btn btn-primary">
                    <a href="logout.php">
                        Logout
                    </a>    
                </button>
            </div>
        </div>
        <div class="row text-center ">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div class="row ">
                    <div class="col-4">
                        <button type="button" class="btn btn-primary">QUIZ</button>
                    </div>
                    <div class="col-4 ">
                        <button type="button" class="btn btn-primary">NOTES</button>    
                    </div>
                    <div class="col-4">
                        <button id="abc" type="button" class="btn btn-primary"  onClick="action();">SETTING</button>
                        <button id="def" type="button" class="btn btn-primary hide" >LOG OUT</button>
                    </div>
                </div>
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>
    <script>
        var hidden = false;
        function action() {
            hidden = !hidden;
            if(hidden) {
                document.getElementsByClassName('hide').style.display = 'block';
            } else {
                document.getElementById('def').style.display = 'none';
            }
        }
        //         $("button").click(function(){
        //     $("#hide").css('display', 'block');
        // });
    </script>
   <?php 
   @include '../php/InitHTML/footer.php';
   ?>
</body>
</html>