<?php
  // Initialize sessions
  session_start();

  // Check if the user is already logged in, if yes then redirect him to welcome page
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo "<script>alert( 'Si tiene seción' );</script>";
    echo "<script>window.location.href='inicio.php'</script>";
    //header("location: inicio.php"); 
    //56exit;
  }

  // Include config file
  require_once "config/config.php";

  // Define variables and initialize with empty values
  $username = $password = '';
  $username_err = $password_err = '';

  // Process submitted form data
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if username is empty
    if(empty(trim($_POST['username']))){
      $username_err = 'Porfavor escribe tu usuario.';
    } else{
      $username = trim($_POST['username']);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
      $password_err = 'Porfavor escribe tu password';
    } else{
      $password = trim($_POST['password']);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
      // Prepare a select statement
      $sql = 'SELECT id, username, password FROM users WHERE username = ?';

      if ($stmt = $mysql_db->prepare($sql)) 
      {
        // Set parmater
        $param_username = $username;

        // Bind param to statement
        $stmt->bind_param('s', $param_username);

        // Attempt to execute
        if ($stmt->execute()) {

          // Store result
          $stmt->store_result();

          // Check if username exists. Verify user exists then verify
          if ($stmt->num_rows == 1) {
            // Bind result into variables
            $stmt->bind_result($id, $username, $hashed_password);

            if ($stmt->fetch()) {
              if (password_verify($password, $hashed_password)) {

                // Start a new session
                session_start();

                // Store data in sessions
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;

                // Redirect to user to page
                header('location: inicio.php');
              } else {
                // Display an error for passord mismatch
                $password_err = 'Invalid password';
              }
            }
          } else {
            $username_err = "Username does not exists.";
          }
        } else {
          echo "<script>alert( 'Oops! Algo salio mal porfavor intenta de nuevo' )</script>";
        }
        // Close statement
        $stmt->close();
      }
      else
      {
        if ( isset($_POST['username'] ) ) echo "<script>alert( 'Oops! Algo salio mal con la base de datos' )</script>";
      }

      // Close connection
      $mysql_db->close();
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign in</title>
  <link rel="stylesheet" href="./style.css">
  <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
  <style>
    .wrapper{ 
      width: 500px; 
      padding: 20px; 
    }
    .wrapper h2 {text-align: center}
    .wrapper form .form-group span {color: white;}
  </style>
</head>
<body>
  <main>
    <!-- <section class="container wrapper">
    <center><img src="http://www.digitalself.com.mx/wp-content/uploads/2017/11/Layercode_560.jpg" alt="" width="300" height="300" /></center>
      <h4 class="display-5 pt-3 text-center">Ingrese su Credencial.</h4><br>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group <?php (!empty($username_err))?'has_error':'';?>">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" class="form-control" value="<?php echo $username ?>">
              <span class="help-block"><?php echo $username_err;?></span>
            </div>

            <div class="form-group <?php (!empty($password_err))?'has_error':'';?>">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" value="<?php echo $password ?>">
              <span class="help-block"><?php echo $password_err;?></span>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-block btn-outline-primary" value="Login">
            </div>
              <a class="btn btn-block btn-outline-success" href="registro.php">Registrate</a>
          </form>
    </section> -->
    <br>
    <br>
    <center><img src="http://www.digitalself.com.mx/wp-content/uploads/2017/11/Layercode_560.jpg" alt="" width="150" height="150" /></center>

    <div class="login-box">
      <h2>Login</h2>
      
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group <?php (!empty($username_err))?'has_error':'';?>">
          <div class="user-box">
            <input type="text" name="username" id="username" class="form-control" value="<?php echo $username ?>">
            <span class="help-block" style="color: #FFFFFF"><?php echo $username_err;?></span>
            <label>Usuario</label>
          </div>
        </div>
        <div class="form-group <?php (!empty($password_err))?'has_error':'';?>">
          <div class="user-box">
            <input type="password" name="password" id="password" class="form-control" value="<?php echo $password ?>">
            <span class="help-block" style="color: #FFFFFF"><?php echo $password_err;?></span>
            <label>Password</label>
          </div>
        </div>
            
          <a href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <input type="submit" value="Login">
          </a>
        
      </form>
    </div>
    
  </main>
</body>
</html>