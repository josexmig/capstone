<?php

    include "conn.php";
    session_start();

    if(isset($_POST['reg_btn'])){


      $name=$_POST['name'];
      $email=$_POST['email'];
      $contact=$_POST['contact'];
      $password=$_POST['pass'];
      

      $insertusers=mysqli_query($conn, "INSERT INTO user
      VALUES('0','$name','$email','$contact','$password')");
      
       if($insertusers==true){
        ?>
        <script>
          alert("Your Registration was Successful");
          window.location.href="index.php";
          </script>
          <?php
      }else {
        ?>
        <script>
          alert("Error Registration \n Try Again");
          window.location.href="dashboard_user.php";
          </script>
          <?php
      }
    }

    //admin  login

    if(isset($_POST['login_btn'])){

        $email=$_POST['email'];
  
        $pass=$_POST['pass'];
  
        $check=mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND pass='$pass'");
  
       $num=mysqli_num_rows($check);
  
       if($num >=1 ){
           $_SESSION['email']=$email;
           ?>
           <script>
            alert("Account Accepted Welcome Users");
            window.location.href="admin/dashboard_user.php";
          </script>
          <?php
  
       }else{
        ?>
           <script>
            alert("Account Not Found Try Again");
            window.location.href="index.php";
          </script>
          <?php
  
         
       }
  
      }
      
      if(isset($_POST['admin_log'])){

        $email=$_POST['email'];
  
        $pass=$_POST['pass'];
  
        $check=mysqli_query($conn, "SELECT * FROM adminz WHERE email='$email' AND pass='$pass'");
  
       $num=mysqli_num_rows($check);
  
       if($num >=1 ){
           $_SESSION['email']=$email;
           ?>
           <script>
            alert("Account Accepted Welcome Admin");
            window.location.href="admin/dashboard.php";
          </script>
          <?php
  
       }else{
        ?>
           <script>
            alert("Account Not Found Try Again");
            window.location.href="index.php";
          </script>
          <?php
  
         
       }
  
      }
      if (isset($_POST['login_student'])) {
         $student_email = $_POST['email'];
         $student_pass = $_POST['pass'];

         $student_login = mysqli_query ($conn,"SELECT * FROM user WHERE email = '$student_email' AND pass = '$student_pass'");
         $student_num = mysqli_num_rows($student_login);

         if($student_num >= 1){
          $_SESSION['email'] = $student_email;

          ?>
          <script>
            alert("login successful");
            window.location.href="students/dashboard.php";
          </script>
          <?php
         }else{   
          ?>
          <script>
            alert("wrong email or password");
            window.location.href="index.php";
          </script>
          <?php
      }
      }
?>
      
         
         