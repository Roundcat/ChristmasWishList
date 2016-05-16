<div class="container">
  <header class="row" id="page_header">

      <!-- logo du site -->
      <div class="col-sm-4 col-md-offset-1 col-md-1 col-lg-offset-1 col-lg-1" id="logo">
        <a href="index.php"><img src="img/logo.png" alt="christmaswishlist.com" /></a>
      </div>
      <!-- nom du site -->
      <div class="col-sm-6 col-md-7 col-lg-7" id="site_name">
        <h1>Christmas Wish List</h1>
      </div>
      <!-- message de bienvenue dans l'entête -->
      <div class="col-sm-6 col-md-2 col-lg-2">
        <div id="bonjour">
          Bonjour <?php echo htmlspecialchars ($_SESSION['user']['userfirstname']); ?>
        </div>
        <div id="se_connecter">
          <a href="compte.php"><span class="glyphicon glyphicon-user"></span> Mon compte</a>
        </div>
      </div>

      <!-- lien s'inscrire à partir du header -->
      <div class="col-sm-6 col-md-2 col-lg-2" id="inscrire">
        <a href="deconnect.php"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a>
      </div>

    </header>
  </div>
