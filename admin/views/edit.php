<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Editer <small><?= ucfirst(split('.json', basename($file))[0]) ?></small></h1>
  </div>
</div>

<?php if (isset($error) && !empty($error)) foreach ($error as $key => $item): ?>
  <div class="alert alert-danger" role="alert"><strong><?= ucfirst($key) ?> !</strong> <small> <?= $item ?></small></div>
<?php endforeach ?>

<?php if (isset($success) && !empty($success)) foreach ($success as $key => $item): ?>
  <div class="alert alert-success" role="alert"><strong><?= ucfirst($key) ?> !</strong> <small><?= $item ?></small></div>
<?php endforeach ?>

<button type="button" class="btn btn-default" onclick="addItem()">Ajouter</button>

<form action="/admin/edit/<?= split('.json', basename($file))[0] ?>" method="POST">
<?php foreach ($data as $key => $item): ?>
  <span class="item" id="<?= $key ?>">
  <h2>Item <?= $key ?></h2>
  <?php foreach ($item as $params => $value): ?>
    <div class="form-group">
      <label><?= ucfirst($params) ?> <?php if($key == 0) echo '*' ?></label>
      <?php if(is_array($value)): ?>
        <button type="button" class="btn btn-default" onclick="addInput(<?= $key ?>, '<?= $params ?>')">Ajouter</button>
        <?php foreach ($value as $value_key => $val): ?>
          <input
          type="text"
          class="form-control <?= $params ?>"
          name="item[<?= $key ?>][<?= $params ?>][]"
          value="<?= $val ?>"
          placeholder="<?= $params ?>"
          <?php if($key == 0) echo 'required="true"' ?>>
          <br/>
        <?php endforeach ?>
      <?php else : ?>
      <input
      type="text"
      class="form-control"
      name="item[<?= $key ?>][<?= $params ?>]"
      value="<?= $value ?>"
      placeholder="<?= $params ?>"
      <?php if($key == 0) echo 'required="true"' ?>>
    <?php endif; ?>
    </div>
  <?php endforeach ?>
  </span>
<?php endforeach ?>
  <button type="button" class="btn btn-default" onclick="addItem()">Ajouter</button>
  <button type="submit" class="btn btn-default btn-primary">Valider</button>
</form>

<script>
  var id = $('.item').length - 1;

  function addItem(){
    var clone = $('.item:first').clone();
    id ++;
    clone.find('h2').html(clone.find('h2').html().split(" 0")[0]+' '+id);
    clone.find('input').each(function(){
      $(this).val('');
      $(this).removeAttr('required');
      $(this).attr("name",'item['+id+']['+$(this).attr("placeholder")+']');
    });
    clone.find('label').each(function(){
      $(this).html($(this).html().split(" *")[0]);
    });
    clone.appendTo('.item:last');
  }

  function addInput(id, input){
    var clone = $('.'+input+':first').clone();
    clone.val('');
    clone.html(clone.html()+'<br/>');
    clone.removeAttr('required');
    clone.attr("name",'item['+id+']['+input+'][]');
    clone.appendTo('#'+id+'');
  }
</script>
