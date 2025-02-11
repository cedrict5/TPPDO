
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

      .modal.fade{
  opacity:1;
}
.modal.fade .modal-dialog {
   -webkit-transform: translate(0);
   -moz-transform: translate(0);
   transform: translate(0);
}
    </style>

    
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    
<?php include('header.php');
include('connexionPdo.php');
//lst des nationalités
$libelle="";
$continent="Tous";

//Constuction de la requête
$texteReq="select n.num, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num";
if(!empty($_GET)){
  $libelle=$_GET['libelle'];
  $continentSel=$_GET['continent'];
  if($libelle!="") {$texteReq.= " and n.libelle like '%" .$libelle."%'";}
  if($continentSel!="Tous") {$texteReq.= " and c.num =" .$continentSel;}

}
$texteReq.= " order by n.libelle";
echo var_dump($continent);

$req=$monPdo->prepare($texteReq);
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationnalites= $req->fetchAll();


//lst des continents
$reqContinent=$monPdo->prepare("select * from continent");
$reqContinent->setFetchMode(PDO::FETCH_OBJ);
$reqContinent->execute();
$lesContinents=$reqContinent->fetchAll();


if(!empty($_SESSION['message'])){
  $mesMessages=$_SESSION['message'];
  foreach($mesMessages as $key=>$message){
    //alert-dismissible=petite croix
    echo '<div class="container pt-5">
            <div class="alert alert-'.$key.' alert-dismissible fade show" role="alert">'.$message.'
                  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
          </div>';
  }
  $_SESSION['message']=[];
}
?>



<div class="containner mt-5">

    <div class="row pt-3">
      <div class="col-9"><h2>Liste des nationnalités</h2></div>
        <div class="col-3"><a href="formNationalite.php?action=Ajouter" class="btn btn-success"><i class="fas fa-plus-circle"></i> Créer un nationnalité</a></div>
    </div>

      <form action="" method="get" class="border border-primary rounded p-3 mt-3 nb-3">
          <div class="row">
            <div class="col">
              <input type='text' class='form-control' id='libelle' placeholder='Saisir le libellé' name='libelle' value = "<?php echo $libelle; ?> ">
              </div>
              <div class="col">
                <select name="continent" class="form-control">
                      <?php 
                        echo "<option value='Tous'>Tous les continents</option>";
                        foreach($lesContinents as $continent){
                          $selection=$continent->num == $continentSel ? 'selected' : '';
                          echo "<option value='$continent->num' $selection>$continent->libelle</option>";
                        }
                        ?>
                  </select>
              </div>
            <div class="col">
              <button type="submit" class="btn btn-success btn-block" >Rechercher</button>
            </div>
          </div>
        </form>
      

    <table class="table table-hover table-stripped">
        <thead>
            <tr class="d-flex">
            <th scope="col" class="col-md-3">Numéro</th>
            <th scope="col" class="col-md-3">Libellé</th>
            <th scope="col" class="col-md-3">Continent</th>
            <th scope="col" class="col-md-3">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            foreach($lesNationnalites as $nationalite){
                echo"<tr class='d-flex'>";
                echo"<td class='col-md-3'>$nationalite->num</td>";
                echo"<td class='col-md-3'>$nationalite->libNation</td>";
                echo"<td class='col-md-3'>$nationalite->libContinent</td>";
                echo "<td class='col-md-3'> 
                    <a href='formNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                    <a href='#modalSuppression' data-toggle ='modal' data-message='Voulez-vous supprimer cette nationalité?' data-suppression='supprimerNationalite.php?num=$nationalite->num' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
                </td>";
                echo"</tr>";
//supprimerNationalite.php?num=$nationalite->num
            }

            ?>
        
        </tbody>
</table>
</div>


    


</main>

<?php include('footer.php');?>
