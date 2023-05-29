<?php 
    require_once 'auth.php';
    require_once 'function.php';

    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }

    if (!empty($_POST["password_old"]) && !empty($_POST["password"]) && !empty($_POST["confirm_password"]))
    {
        
        $error = array();
        $conn = connect();
        $userid=$_SESSION['user_id'];

        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 

        $query = "SELECT * FROM users WHERE id = $userid";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $entry = mysqli_fetch_assoc($res);
        if (password_verify($_POST['password_old'], $entry['password'])){
        
        if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
                $error[] = "Le password non coincidono!";
            }
        
        if (password_verify($_POST["password_old"], $entry['password']) &&$_POST["password_old"]===$_POST["password"] ){
            $error[] = "Password già usata";

            }
           
        if (count($error) == 0) {
            $userid=$_SESSION['user_id'];
            $nuovo = mysqli_real_escape_string($conn, $_POST['password']);
           
            $nuovo= password_hash($nuovo, PASSWORD_BCRYPT);

           
            $query = "UPDATE users set password = '$nuovo' where  id=$userid";
             
            if (mysqli_query($conn, $query)) {
                $_SESSION["username"] = $_POST["username"];
                mysqli_close($conn);
                header("Location: home.php");
                exit;
                } else {
                $error[] = "Errore di connessione al Database";
                }
            }
        }
        else {
            $error[] = "La password corrente non corrisponde";
        }

        mysqli_close($conn);
    }
    else if (isset($_POST["password_old"])) {
        $error = array("Riempi tutti i campi");
    }
?>

<html>
  <head>
    <title>Profilo - MotoGP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="profile.css">
    <script src="profile.js" defer></script>
  </head>
  <body>
    <main class="signIn">
      <section class="ftco-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
              <div class="wrap">
                <div class="img" style="background-image: url(assets/background-signUp.jpg);"></div>
                <div class="login-wrap p-md-5">
                  <div class="d-flex">
                    <div class="w-100">
                      <h3 class="mb-4">Profilo</h3>
                    </div>
                  </div>
                  <form>
                  <h4>Nome: <span class="value"></span></h4>
                  <h4>Cognome: <span class="value"></span></h4>
                  <h4>Username: <span class="value"></span></h4>
                  <h4>Email: <span class="value"></span></h4>
                  </form>
                  <form name='change-password' method='post' enctype="multipart/form-data" autocomplete="off" class="change-password-form">
                    <div class="form-group mt-3 password_old">
                      <input id="password_old-field" name="password_old" type="password" class="form-control" <?php if(isset($_POST["password_old"])){echo "value=".$_POST["password_old"];} ?> required>
                      <label class="form-control-placeholder" for="password_old">Password Attuale</label>
                    </div>
                    <div class="form-group mt-3 password">
                      <input id="password-field" name="password" type="password" class="form-control" <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?> required>
                      <label class="form-control-placeholder" for="password">Password</label>
                    </div>
                    <div class="form-group mt-3 confirm_password">
                      <input id="confirm_password-field" name="confirm_password" type="password" class="form-control" <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?> required>
                      <label class="form-control-placeholder" for="confirm_password">Conferma Password</label>
                    </div>
                    <?php if(isset($error)) {
                      foreach($error as $err) {
                        echo "<div class='errorj'><span>".$err."</span></div>";
                      }
                    } ?>
                    <div class="form-group">
                      <button type="submit" class="form-control btn btn-primary rounded submit px-3">CAMBIA PASSWORD</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
</body>
</html>