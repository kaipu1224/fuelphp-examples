<?php echo Form::open(array('action'=>'/upload/upload', 'enctype'=>'multipart/form-data')) ?>
  <?php echo Form::file('upload_file'); ?>
  <?php echo Form::submit('submit', 'Upload', array('class' => 'btn btn-primary')); ?>
<?php echo Form::close(); ?>

<div class="row-fluid">
  <ul class="thumbnails">
    <?php foreach($images as $img){ ?>
    <li class="span2">
      <?php echo Html::img('public/uploads/'.$img, array());?>
    </li>
    <?php } ?>
  </ul>
</div>