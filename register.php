<?php include "includes/db.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Registracija</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
  <?php include "includes/navigation.php"; ?>
  <?php
    if (isset($_POST['submit'])) {

      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];

      if (!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($phone) && !empty($password)) {

        $firstname = mysqli_real_escape_string($connection, $firstname);
        $lastname = mysqli_real_escape_string($connection, $lastname);
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));

        $query = "INSERT INTO subscriber(firstname, lastname, username, password, email, phoneNumber) 
                  VALUES('$firstname','$lastname','$username','$password','$email','$phone')";

        $register_subscriber = mysqli_query($connection, $query);

        if (!$register_subscriber) {
          die("FAILD " . mysqli_error($connection));
        }

        if ($register_subscriber) {
          $message = "Uspešna registracija.";
        }
      }
    } else {
      $message = "";
    }
  ?>

  <div class="container" style="margin-top: 20px;">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Forma za registraciju</div>
      <div class="card-body">
        <form action="register.php" role="form" method="post" id="login-form">
          <h6 class="text-center"><?php echo $message; ?></h6>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="firstname">Ime</label>
                <input class="form-control" name="firstname" type="text" aria-describedby="nameHelp" placeholder="Unesite ime..." required>
              </div>
              <div class="col-md-6">
                <label for="lastname">Prezime</label>
                <input class="form-control" name="lastname" type="text" aria-describedby="nameHelp" placeholder="Unesite prezime..." required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="email">E-mail adresa</label>
                <input class="form-control" name="email" type="email" aria-describedby="emailHelp" placeholder="Unesite e-mail adresu..." required>
              </div>
              <div class="col-md-6">
                <label for="phone">Broj telefona</label>
                <input type="tel" class="form-control" name="phone" placeholder="Unesite broj telefona...">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">    
              <div class="col-md-6">
                <label for="username">Korisničko ime</label>
                <input class="form-control" name="username" type="text" aria-describedby="nameHelp" placeholder="Unesite korisničko ime..." required>
              </div>
              <div class="col-md-6">
                <label for="password">Lozinka</label>
                <input type="password" class="form-control" name="password" placeholder="Unesite lozinku..." required>
              </div>
            </div>
          </div>

          <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
        </form>
      </div>
    </div>
  </div>
</body>

</html>