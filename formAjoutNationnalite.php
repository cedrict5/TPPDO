
<?php include('header.php');

?>


<div class="containner mt-5">

<form action="valideAjoutNationnalite.php" method="post">
    <div class="form-group">
        <label for="libelle"> Libellé </label>
        <input type="text" class="form-controle" id="libelle" placeholder="Saisir le libellé" name="libelle">
    </div>

<div class="row">
    <div class="col"> <a href="listeNationnalite.php" class="bt btn-warning"> </div>
<div class="col"><button type="submit" class="btn btn-success"> Ajouter </button></div>
</div>
</form>

</div>

<?php include('footer.php');?>
>