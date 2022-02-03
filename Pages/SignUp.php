<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/signup.css" />
    <title>Sign Up</title>
  </head>
  <body>

    <?php
      session_start();
      include('config.php');
      if (isset($_POST['register'])) {
          $username = $_POST['username'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $password_hash = password_hash($password, PASSWORD_BCRYPT);
          $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
          $query->bindParam("email", $email, PDO::PARAM_STR);
          $query->execute();
          if ($query->rowCount() > 0) {
              echo '<p class="error">The email address is already registered!</p>';
            }
          if ($query->rowCount() == 0) {
              $query = $connection->prepare("INSERT INTO users(username,password,email) VALUES (:username,:password_hash,:email)");
              $query->bindParam("username", $username, PDO::PARAM_STR);
              $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
              $query->bindParam("email", $email, PDO::PARAM_STR);
              $result = $query->execute();
              if ($result) {
                  echo '<p class="success">Your registration was successful!</p>';
                } else {
                  echo '<p class="error">Something went wrong!</p>';
                }
            }
        }
    ?>
    <section>
      <div>
        <div class="form-content">
          <div class="form-left">
            <div class="sub-form-left">
              <div class="top">
                <a href="../index.html" class="top-a1">Pets Club</a>
                <a href="Login.php" class="top-a2">Login</a>
              </div>
              <div class="middle">
                <h4>Join Pets Club</h4>
                <p>Create Your Account, It's Free.</p>
              </div>
              <form method="post" action="" name="signup-form class="signin-form">
                <div class="form-input">
                  <label for="#">Your Name</label><br />
                  <input
                    type="text"
                    name="username"
                    placeholder="First and last name"
                    required
                  />
                </div>
                <div class="form-input">
                  <label for="#">Email</label><br />
                  <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    required
                  />
                </div>
                <div class="form-input">
                  <label>Password</label><br />
                  <input
                    type="password"
                    name="password"
                    id="#"
                    placeholder="Password"
                    required
                  />
                </div>
                <div class="form-input">
                  <label>Confirm Password</label><br />
                  <input
                    type="password"
                    name="password"
                    id="#"
                    placeholder="Confirm Password"
                    required
                  />
                </div>
                <div class="label-container">
                  <label for="#" class="label-container-text">
                    <input type="checkbox" name="#" id="#" />
                    "I agree to the"
                    <a href="#">Terms of User</a> </label
                  ><br />
                  <button type="submit" name="register" value="register" class="submit-btn">SIGN UP</button>
                </div>
              </form>
            </div>
          </div>
          <div class="form-right">
            <div class="form-right-content">
              <h5>Pets Club</h5>
              <h3>"We Give Special Care to Your " <b>Loving Pets</b></h3>
              <p>
                It ensures that they are kept up to date on any developments and
                changes made to the structure or visuals. Visual guides also
                allow you to define the information hierarchy of the design.
              </p>
              <a href="../index.html">Back to Homepage</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
