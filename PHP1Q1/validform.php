<html>
<head>
  <title>Registration Form</title>
</head>
<body bgcolor="beige">
  
  <form  method="post"  style="max-width: 600px; margin: 0 auto; padding: 20px; box-shadow: 0 0 15px rgba(0,0,0,0.1); background-color: #f5f5f5; border-radius: 8px; ">
  
    <h2 style="color:brown;">Registration Form</h2>


    <label for="Name">Name:</label>
    <input type="text" name="Name" id="Name"><br><br>

    <label for="mail">Email:</label>
    <input type="text" name="mail" id="mail"><br><br>

    <label for="mob">Mob No:</label>
    <input type="text" name="mob" id="mob" maxlength="10"><br><br>

    <label for="user">Username:</label>
    <input type="text" name="user" id="user"><br><br>

    <label for="passcode">Password:</label>
    <input type="password" name="passcode" id="passcode" maxlength="8"><br><br>

  
    <input type="submit" style="background-color:#77DD77;"  >
    <input type="reset" style="background-color:#FFFAA0;" >
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
 $name=$_POST['Name'];
 $mail=$_POST['mail'];
 $mob=$_POST['mob'];
 $user=$_POST['user'];
 $passcode=$_POST['passcode'];
 
    $errors = [];

    if (empty($name)) {
        $errors[] = "Please enter your name.";
    }
    if (empty($mail)) {
        $errors[] = "Please enter your email.";
    }elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }
    if (empty($mob)) {
        $errors[] = "Please enter your mobile number.";
    }elseif (!preg_match('/^[0-9]{10}$/', $mob)) {
        $errors[] = "Please enter a valid 10-digit mobile number.";
    }
    
    if (empty($user)) {
        $errors[] = "Please enter a username.";
    }
    if (empty($passcode)) {
        $errors[] = "Please enter a password.";
    }elseif (strlen($passcode) < 6) { 
        $errors[] = "Password should be at least 6 characters long.";
    }
        
   if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    } else {
        echo "<p style='color:green;'>Form submitted successfully!</p>";
    }
        
    
 }
 ?>
  </form>

  
</body>
</html>
