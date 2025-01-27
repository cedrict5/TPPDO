
<div id="modalSuppression"class="modal fade"role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation de suppression</h5>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer cette nationalité?</p>
      </div>
      <div class="modal-footer">
        <a href="" class="btn btn-primary" id="btnsuppr">Supprimer</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ne pas supprimer</button>
      </div>
    </div>
  </div>
</div>

<footer class="container">
  <p>&copy; Company 2017-2024</p>


</footer>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/f52ca63eb6.js" crossorigin="anonymous"></script>

<script type="text/javascript">
$("a[data-suppression]").click(function(){
  var lien = $(this).attr("data-suppression");//recupere le lien du bouton de poubelle
  var message = $(this).attr("data-message");//recupere le lien du bouton de poubelle
  $("#btnsuppr").attr("href",lien);// on ecrit ce lien sur le btn supprimer de la modale
  $(".modal-body").attr("href",lien);// on ecrit ce lien sur le btn supprimer de la modale
  
});


</script>
  </body>
</html>