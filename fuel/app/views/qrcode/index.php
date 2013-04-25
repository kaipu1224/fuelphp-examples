<?php echo Asset::js('jquery.qrcode.min.js'); ?>
<script>
  $(function(){
    $('#form_qrText').on('keyup',function(){
      var inputText = $("#form_qrText").val();
      $('#qrcode').text(inputText);
      $('#qrcodeCanvas').html("");
      $('#qrcodeCanvas').qrcode({
        text  : inputText
      });
    });
    /*
    var progress = function(){
      var p = $('#progressValue').attr('data-rate');
      p++;
      if(p > 100){
        p = 0;
      }
      $('#progressValue').css('width', p + "%");
      $('#progressValue').attr('data-rate', p);
      setTimeout(progress, 100);
    };
    setTimeout(progress, 100);
    */
  });

</script>

<div class="row">
  <?php echo Form::input('qrText','',array('class'=>'span4', 'placeholder'=>'Input text')); ?>
</div>
<div class="row">
  <h3>QR code:<span id="qrcode"></span></h3>
  <div id="qrcodeCanvas"></div>
</div>
<!--
<div class="row">
  <div class="progress">
    <div class="bar" style="width:0%" data-rate="0" id="progressValue"></div>
  </div>
</div>
-->