
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
include('connexionPdo.php');
$action = $_GET['action'];
$num=$_POST['num']; //recup le formulaire
$libelle=$_POST['libelle']; //recup le formulaire
var_dump($libelle,$num);

if ($action == "Modifier"){
$req=$monPdo->prepare("update nationalite set libelle= :libelle where num = :num");
$req->bindParam(':num', $num);
$req->bindParam(':libelle', $libelle);
$nb=$req->execute();
}else{
  $req=$monPdo->prepare("insert into nationalite(libelle) values(:libelle)");
  $req->bindParam(':libelle', $libelle);
}
$nb=$req->execute();
$message = $action=="Modifier"? "modifiée":"ajoutée";


echo '<div class="container mt-5">';
echo '<div class="row">
    <div class="col mt-5">';
if($nb == 1){
    echo ' <div class="alert alert-success" role="alert">
    La nationalité a bien été $message.
    </div>';
}else{
    echo ' <div class="alert alert-danger" role="alert">
    La nationalité n\'a pas été $message!
    </div> ';
}
?>
    </div>
</div>
<a href="listenationalites.php" class="btn btn-primary"> Revenir à la liste des nationalités</a>
</div>

<?php include "footer.php";
?>
