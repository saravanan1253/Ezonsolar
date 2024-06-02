<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form Design</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="box">
        <h1>Register Here</h1>
        <form name="myform2" action="register.php" method="POST">
            <p>Username</p>
            <input type="text" name="uname1" placeholder="Enter Username" required>
            <p>Email</p>
            <input type="email" name="email" placeholder="Enter Email ID" required>
            <p>Password</p>
            <input type="password" name="upswd1" placeholder="Enter Password" required>
            <p>Retype Password</p>
            <input type="password" name="upswd2" placeholder="Re-Enter Password" required>
            <input type="submit" value="Register">
            <br><br>
            <a href="index.php">Existing user? Login!</a>
        </form>
    </div>
</body>
</html>

<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: sans-serif;
    background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../image/man-looking-job-from-home.jpg');
     background-size: cover;
  object-position: center;
  object-fit: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
}
.box{
    background: #f5f5f5;
    color: red;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
}
.user{
    width: 100px;
    height: 100px;
    position: absolute;
    top: -50px;
    background-color: red;
}

h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
    color: black;
}
p{
    color: #f49126;
    margin: 0;
    padding: 0;
    font-weight: bold;
}

input{
    width: 100%;
    margin-bottom: 10px;
}

 input[type="text"], input[type="password"] ,input[type="email"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #673ab7;
    font-size: 16px;
}

input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #2196f3;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;

}
input[type="submit"]:hover
{
    cursor: pointer;
    background: #0097a7;
}

a
{
    text-decoration: none;
    font-size: 16px;
    line-height: 20px;
    color: #069818;
}
a:hover
{
    color: red;
}
</style>
