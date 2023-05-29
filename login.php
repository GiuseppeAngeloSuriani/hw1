<?php
    include 'auth.php';
	
    if (checkAuth()) {
        header('Location: home.php');
        exit;
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        $conn = connect();

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $query = "SELECT * FROM users WHERE username = '$username'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        
        if (mysqli_num_rows($res) > 0) {
            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['password'])) {
                $_SESSION["username"] = $entry['username'];
                $_SESSION["user_id"] = $entry['id'];
                header("Location: home.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $error = "Inserisci username e password.";
    }

?>

<html>
  <head>
  	<title>Accedi - MotoGP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="login.css">

	</head>
	<body>
    <main class="login">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(assets/background-signUp.jpg);"></div>
						<div class="login-wrap p-md-5">
			      	        <div class="d-flex">
			      		        <div class="w-100">
			      			        <h3 class="mb-4">Accedi</h3>
			      		        </div>
			      	        </div>
							<form class="signin-form" method="post">
			      		        <div class="form-group mt-3">
			      			        <input type="text" name="username" class="form-control" <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?> required>
			      			        <label class="form-control-placeholder" for="username">Username</label>
			      		        </div>
		                        <div class="form-group">
		                            <input id="password-field" name="password" type="password" class="form-control" <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?> required>
		                            <label class="form-control-placeholder" for="password">Password</label>
		                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		                        </div>
								<?php
									if (isset($error)) {
										echo "<p class='error'>$error</p>";
									}    
								?>
		                        <div class="form-group">
		            	            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Accedi</button>
		                        </div>
		                    </form>
		                    <p class="text-center">Non sei un membro? <a data-toggle="tab" href="signIn.php">Registrati</a></p>
		                </div>
		            </div>
				</div>
			</div>
		</div>
	</section>
    </main>
</body>
</html>
