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
      if (isset($_POST['login'])) {
          $username = $_POST['username'];
          $password = $_POST['password'];
          $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
          $query->bindParam("username", $username, PDO::PARAM_STR);
          $query->execute();
          $result = $query->fetch(PDO::FETCH_ASSOC);
          if (!$result) {
              echo '<p class="error">Username password combination is wrong!</p>';
          } else {
              if (password_verify($password, $result['password'])) {
                  $_SESSION['user_id'] = $result['id'];
                  echo '<p class="success">Congratulations, you are logged in!</p>';
              } else {
                  echo '<p class="error">Username password combination is wrong!</p>';
                }
            }
      }
    ?>

    <section>
      <div>
        <div class="form-content">
          <div class="form-left">
            <div class="sub-form-left">
              <div class="top" style="margin-top: -100px;">
                <a href="../index.html" class="top-a1">Pets Club</a>
                <a href="SignUp.php" class="top-a2">Signup</a>
              </div>
              <div class="middle">
                <h2>Member's Login</h4>
              </div>
              <form method="post" action="#" name="signin-form" class="signin-form">
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
                    placeholder="Password"
                    required
                  />
                </div>
                <div class="label-container">
                  <label for="#" class="label-container-text">
                    <input type="checkbox" name="#" id="#" />
                    "Remember me"
                  </label><br />
                  <button type="submit" name="login" value="login" class="submit-btn">LOGIN</button>
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
