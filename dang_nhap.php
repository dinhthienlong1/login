<?php


session_start();

setcookie('ngon_ngu', 'tieng-viet', time() + 10);
$thong_bao = "";
if (isset($_SESSION['user'])) {
    header('location: index.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin123') {
            $_SESSION['user'] = [
                'username' => $_POST['username'],
                'password' => $_POST['password']
            ];
            header('location: index.php');
        } else {
            $thong_bao = "tai khoan mat khau khong chinh xacs";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1 {
            color: red;
        }
    </style>
    <style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  size: 10px;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
  
  width: 30%;
 
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>

<body>
    


    <?php
    if (!empty($thong_bao)) {
        echo "<h1>" . $thong_bao . "</h1>";
    }
    ?>
    <form action="dang_nhap.php" method="post">
  <div class="imgcontainer">
    <img src="https://i.pinimg.com/originals/5c/42/68/5c42682a9dc41431e420448ec7a4ed2a.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" class="form-control" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" class="form-control" required>
        
    <input type="submit" value="Dang nhap">
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:grey">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>

</html>
