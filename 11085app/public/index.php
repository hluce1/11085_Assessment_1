<?php
  session_start();
  
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: /registration/login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: /registration/login.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home | Expense Tracker App</title>
    <link rel="stylesheet" type="text/css" href="../public/assets/css/registration.css">
  </head>
  <body>
    <div class="header">
      <h2>Home Page</h2>
    </div>
    <div class="content">
      <!-- notification message -->
      <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
          <h3 class="center">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
          </h3>
        </div>
      <?php endif ?>
    
      <!-- logged in user information -->
      <?php if (isset($_SESSION['username'])) : ?>
        <p class="center">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
       <div class="webkit"><a class="logout" href="index.php?logout='1'" style="color: red;">logout</a></div>
        <br>
        <div class="webkit"><a class="trackbtn" href="../public/create.php">Add an expense</a></div>
      <?php endif ?>

    </div>
  </body>
</html>