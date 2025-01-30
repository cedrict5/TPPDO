<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Jumbotron Template · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/jumbotron/">

    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.css">



    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    
<?php include('header.php');
$action=$_GET['action']; //soit Ajouter ou Modifier
include('connexionPdo.php');
if ($action == "Modifier"){
  $num=$_GET['num']; //recup le parametre numdans la listenationalite.php
  $req=$monPdo->prepare("select * from nationalite where num= :num");
  $req->setFetchMode(PDO::FETCH_OBJ);
  $req->bindParam(':num', $num);
  $req->execute();
  $laNationalite= $req->fetch();
  

}
//liste des continents
$reqContinent=$monPdo->prepare("select * from continent");
$reqContinent->setFetchMode(PDO::FETCH_OBJ);
$reqContinent->execute();
$lesContinents=$reqContinent->fetchAll();
?>


<div class="container mt-5">
<h2 class='pt-3 text-center'><?php echo $action ?></h2>
    <form action="valideFormNationalite.php?action=<?php echo $action ?>" method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded">
        <div class="form-group">
            <label for='libelle'> Libellé </label>
            <input type='text' class='form-control' id='libelle' placeholder='Saisir le libellé' name='libelle' value = "<?php if ($action == "Modifier") {echo $laNationalite->libelle;}?>">
        </div>
        <div class="form-group">
            <label for='continent'> Libellé </label>
            <select name="continent">
              <?php 
              foreach($lesContinents as $continent){
                echo "<option value='$continent->num'>$continent->libelle</option>";
              }
              ?>
              <option value=""></option>
            </select>
        </div>
        <input type='hidden' id='num' name='num' value="<?php if ($action == "Modifier") {echo $laNationalite->num;} ?>">
        <div type='row'>
            <div class='col'><a href='listeNationalites.php' class='btn btn-warning btn-block'>Revenir à la liste</a></div>
            <div class='col'><button type='submit' class='btn btn-success btn-block'> <?php echo $action ?></button></div>
        </div>
    </form>
</div> 

<?php include('footer.php');?>
