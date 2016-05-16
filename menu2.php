<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="dropdown">
          <a data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-th-list"></span> Gérer mes listes<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="seemylist.php"><span class="glyphicon glyphicon-eye-open"></span> Voir mes listes</a></li>
            <li><a href="createlist.php"><span class="glyphicon glyphicon-plus-sign"></span> Créer une liste</a></li>
            <li class="divider"></li>
            <li><a href="deletelist.php"><span class="glyphicon glyphicon-trash"></span> Supprimer une liste</a></li>
          </ul></li>
        <li class="dropdown">
          <a data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Mon compte<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="compte.php"><span class="glyphicon glyphicon-info-sign"></span> Mes informations</a></li>
            <li><a href="modifycompte.php"><span class="glyphicon glyphicon-edit"></span> Modifier mon compte</a></li>
            <li class="divider"></li>
            <li><a href="deconnect.php"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
          </ul></li>
        <li><a href="seelistall.php"><span class="glyphicon glyphicon-eye-open"></span> Voir d'autres listes</a></li>
        <li><a href="inviterami.php"><span class="glyphicon glyphicon-heart"></span> Inviter un ami</a></li>
        <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Me contacter</a></li>
      </ul>
      <!-- Formulaire pour la zone de recherche 
     <form method="get" action="search.php" class="navbar-form navbar-right inline-form">
        <div class="form-group">
          <input type="search" id="search" name="keywords" class="input-sm form-control" placeholder="Recherche">
          <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Chercher</button>
        </div>
      </form> -->
    </div>
</nav>
