<link href="./css/ihover.min.css" rel="stylesheet">
<link href="./css/fileinput.min.css" rel="stylesheet">

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Média</h1>
  </div>
</div>

<label class="control-label">Uploader un fichier</label>
<input id="input-file" type="file" class="file">

<br/><br/>
<div class="row">
<?php foreach ($files as $file) : ?>
    <div class="col-sm-4">
      <div class="ih-item square effect3 bottom_to_top"><a href="<?= $file ?>">
          <div class="img"><img src="<?= $file ?>" alt="<?= $file ?>"></div>
          <div class="info">
            <h3><?= basename($file) ?></h3>
            <p>Taille : <?= formatSizeUnits(filesize($file)) ?>
              <button type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
              </button></p>
          </div></a></div>
    </div>
<?php endforeach; ?>
</div>

<script src="./js/fileinput.min.js"></script>
<script src="./js/fileinput_locale_fr.js"></script>
<script>
$("#input-file").fileinput({
    language: "fr"
});
</script>
