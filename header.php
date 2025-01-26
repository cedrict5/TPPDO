<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
  <a class="navbar-brand" href="index.php">Ma bibliothèque</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">Gestion des genres</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Liste des genre</a>
          <a class="dropdown-item" href="#">Ajouter un genre</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-person"></i>  Gestion des auteurs</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Liste des auteurs</a>
          <a class="dropdown-item" href="#">rechercher un auteur</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-flag"></i>  Gestion des nationnalités</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="listenationalites.php">Liste des nationnalités</a>
          <a class="dropdown-item" href="formAjoutNationalite.php">Ajouter une nationnalité</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>