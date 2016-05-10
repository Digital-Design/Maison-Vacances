<link href="css/ihover.min.css" rel="stylesheet">
<link href="css/fileinput.min.css" rel="stylesheet">

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Média</h1>
  </div>
</div>

<?php if (isset($error) && !empty($error)) foreach ($error as $key => $item): ?>
  <div class="alert alert-danger" role="alert"><strong><?= ucfirst($key) ?> !</strong> <small> <?= $item ?></small></div>
<?php endforeach ?>

<?php if (isset($success) && !empty($success)) foreach ($success as $key => $item): ?>
  <div class="alert alert-success" role="alert"><strong><?= ucfirst($key) ?> !</strong> <small><?= $item ?></small></div>
<?php endforeach ?>

<form action="media" method="POST" enctype="multipart/form-data">
  <label class="control-label">Uploader un fichier</label>
  <input id="input-file" type="file" class="file" name="file">
  <br/>
  <button type="submit" class="btn btn-default btn-primary">Valider</button>
</form>

<br/><br/>
<div class="row">
<?php foreach ($files as $file) : ?>
    <div class="col-sm-4">
      <div class="ih-item square effect3 bottom_to_top" style="background-color: #bdc3c7;"><a>
          <div class="img"><img src="<?= $file ?>" alt="<?= $file ?>"></div>
          <div class="info">
            <h3><?= basename($file) ?></h3>
            <p>Taille : <?= formatSizeUnits(filesize($file)) ?>
              <button type="submit" class="btn btn-danger btn-modal" value="<?= basename($file) ?>" data-toggle="modal" data-target="#deleteModal">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
              </button></p>
          </div></a></div>
    </div>
<?php endforeach; ?>
</div>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title modal-file"></h4>
      </div>
      <div class="modal-body">
        Voulez vous supprimer <span class="modal-file"></span> ?
        <br/>
        <img class="modal-file-img" src="" width="300">
      </div>
      <div class="modal-footer">
        <form action="media" method="POST">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          <input type="hidden" class="modal-file-input" required="required" value="" name="file">
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="js/fileinput.min.js"></script>
<script src="js/fileinput_locale_fr.js"></script>
<script>
$("#input-file").fileinput({
    language: "fr"
});

$(".btn-modal").click(function() {
  $(".modal-file").html($(this).val());
  $(".modal-file-input").val($(this).val());
  $(".modal-file-img").attr("src", "../img/"+$(this).val());
});
</script>
