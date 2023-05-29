<?php 
    require_once 'auth.php';
    require_once 'function.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>

<html>
  <?php 
    $conn = Connect();
    $userid = mysqli_real_escape_string($conn, $userid);
    $query = "SELECT * FROM users WHERE id = $userid";
    $res_1 = mysqli_query($conn, $query);
    $userinfo = mysqli_fetch_assoc($res_1);   
  ?>

  <head>
    <title>Carrello - MotoGP Shop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="cart.css?ts=<?=time()?>&quot">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="cart.js" defer="true"></script>
  </head>
  
  <body>
    <header>
        <nav>
            <div id="socialBar">
                <div class="networks">
                  <a href="https://facebook.com/MotoGP" class="facebook"></a>
                  <a href="https://www.instagram.com/motogp/" class="instagram"></a>
                  <a href="https://www.youtube.com/user/MotoGP" class="youtube"></a>
                  <a href="https://www.twitter.com/MotoGP" class="twitter"></a>
                  <a href="https://www.tiktok.com/@motogp" class="tiktok"></a>
                  <a href="https://www.snapchat.com/add/motogp" class="snapchat"></a>
                  <a href="https://www.twitch.tv/motogp" class="twitch"></a>
                  <a href="https://open.spotify.com/show/3t0SHu3AYrWOZZl72P9Gjs" class="spotify"></a>
                  <a href="https://t.me/motogp" class="telegram"></a>
                </div>
                <div class="boot">
                  <a href="home.php" class="cart">HOME</a>
                  <div class="space"></div>
                  <a href="recensione.php" class="recensione">RECENSIONI</a>
                  <div class="space"></div>
                  <a href="profile.php" class="profilo">PROFILO</a>
                  <div class="space"></div>
                  <a href="logOut.php" class="logout">LOGOUT</a>
                </div>
            </div>
        </nav>
        <div id="background">
          <div class="container">
            <a href="https://www.motogp.com"><div class="logo"></div></a>
          </div>
        </div>
    </header>

    <div id="results" class="contenuto hidden">

    </div>

    <div id="footer">
    Giuseppe Angelo Suriani | Viale Andrea Doria, 6, 95125 Catania CT ITALIA| C.F. SRNGPP01T20C351C | N.Matricola 1000014793 <br>
		  <a class="e-mail" href="https://www.google.com/intl/it/gmail/about/">giuseppeangelo.suriani@gmail.com</a> | 
      <span>+39 348 4677788</span>
		  <br><a target="_blank"> Contattaci</a> |
      <a target="_blank" href="https://www.motogp.com/it/Apps/"> MotoGPApp</a>
      <div class="social-cont">        
		    <ul class="social-list">
          <li><a target="_blank" href="https://www.facebook.com/giuseppe.suriani.52"><img src="assets/facebook-icon.png"  title="facebook" alt="Facebook icon"></a></li>
		      <li><a target="_blank" href="https://www.instagram.com/peppo_suri/"><img src="assets/instagram-icon.png" title="Instagram" alt="Instagram icon"></a></li>
        </ul>
    	  <div class="floatstop"></div>
		  </div>
      <div class="credits">
        <a class="logoUniCT" target="_blank" href="https://www.unict.it/"></a>  
    	</div>
    </div>
  </body>
</html>