
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link rel="stylesheet" href="login_page.css">
</head>

<body>
    <img class="logod" src="./images/logod.png" alt="" >
   
    <div class="wrapper">
        <h2>Student Login </h2>
     
        <form action="login_student.php" method="POST">
            
            <div class="input-box">
                <input type="mail" name="email" placeholder="Email" required>
            </div>
            <div class="input-box">
                <input type="password"  name="password" placeholder="Password" required>
            </div>
            <div class="input-box button ">
                <input type="Submit" name="submit" value="Login">
            </div>
            
        </form> 
        <div class="sign-txt">Are you a New User?  <a href="signin_page.html">Sign in Now</a></div>  
    </div>

    

    
</body>

</html>