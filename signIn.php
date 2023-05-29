<?php
    require_once 'function.php';

    

    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["name"]) && 
        !empty($_POST["surname"]) && !empty($_POST["confirm_password"]))
    {
        $error = array();
        $conn = connect();

        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error[] = "Username non valido!";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $query = "SELECT username FROM users WHERE username = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Username già utilizzato!";
            }
        }
        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 
        if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
            $error[] = "Le password non coincidono!";
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida!";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata!";
            }
        } 

        if (count($error) == 0) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $surname = mysqli_real_escape_string($conn, $_POST['surname']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(username, password, name, surname, email) VALUES('$username', '$password', '$name', '$surname', '$email')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["user_id"] = mysqli_insert_id($conn);
                mysqli_close($conn);
                header("Location: home.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }

        mysqli_close($conn);
    }
    else if (isset($_POST["username"])) {
        $error = array("Riempi tutti i campi");
    }

?>

<html>
  <head>
  	<title>Iscriviti - MotoGP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="signIn.css">
    <script src="signIn.js" defer></script>

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
			      			        <h3 class="mb-4">Registrati</h3>
			      		        </div>
			      	        </div>
							<form name='signin' method='post' enctype="multipart/form-data" autocomplete="off" class="signin-form">
			      		        <div class="form-group mt-3 name">
			      			        <input id="name-field" type="text" name='name' class="form-control" <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?> required>
			      			        <label class="form-control-placeholder" for="name">  Nome</label>
                        
			      		        </div>
                                <div class="form-group mt-3 surname">
			      			        <input id="surname-field" type="text" name="surname" class="form-control" <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?> required>
			      			        <label class="form-control-placeholder" for="surname">  Cognome</label>
			      		        </div>
                                <div class="form-group mt-3 username">
			      			        <input id="username-field" type="text" name="username" class="form-control" <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?> required>
			      			        <label class="form-control-placeholder" for="username">  Username</label>
			      		        </div>
                                <div class="form-group mt-3 email">
			      			        <input id="email-field" type="text" name="email" class="form-control" <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?> required>
			      			        <label class="form-control-placeholder" for="email">  E-mail</label>
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
		            	            <button type="submit" class="form-control btn btn-primary rounded submit px-3"> Registrati</button>
		                        </div>
		                    </form>
		                    <p class="text-center">Sei già un membro? <a data-toggle="tab" href="login.php"> Accedi</a></p>
		                </div>
		            </div>
				</div>
			</div>
		</div>
	</section>
    </main>
</body>
</html>
