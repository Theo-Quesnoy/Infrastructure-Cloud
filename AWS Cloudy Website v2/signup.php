<?php include "../inc/dbinfo.inc"; ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up - Cloudy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>

<?php

  $connection = mysqli_connect('mysql-rds-database.clthni2agtou.eu-west-3.rds.amazonaws.com', 'administrator', 'Database33!');

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  $user_username = htmlentities($_POST['Username']);
  $user_password = htmlentities($_POST['Password']);

  if (strlen($user_username) || strlen($user_password)) {
    CreateUser($connection, $user_username, $user_password);
  }
?>

  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <section class="vh-100" style="background-color: #eee;">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                    <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4">Sign up</p>

                        <div class="form-check d-flex justify-content-center mb-3">
                            <p>Already have an account ?<a href="index.php"> Sign In</a></p>
                        </div>
                      <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
                        <table border="0">
                          <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                              <input type="text" name="Username" maxlength="45" size="30" id="form3Example1c" class="form-control"/>
                              <label class="form-label" for="form3Example1c">Username</label>
                            </div>
                          </div>

                          <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                              <input type="password" name="Password" maxlength="90" size="60" id="form3Example4c" class="form-control"/>
                              <label class="form-label" for="form3Example4c">Password</label>
                            </div>
                          </div>

                          <div class="form-check d-flex justify-content-center mb-5">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                            <label class="form-check-label" for="form2Example3">
                              I agree all statements in <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Terms of service</a>
                            </label>
                          </div>

                          <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                          </div>
                        </table>
                      </form>

                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                      class="img-fluid" alt="Sample image">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
<?php

function CreateUser($connection, $username, $password) {
   $u = mysqli_real_escape_string($connection, $username);
   $p = mysqli_real_escape_string($connection, $password);

   $query = "INSERT INTO USERS (Username, Password) VALUES ('$u', '$p');";

   if(!mysqli_query($connection, $query)) echo("<p>Error adding users data.</p>");
}
?>