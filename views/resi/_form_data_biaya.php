<?php
use kartik\datecontrol\DateControl;
use kartik\widgets\FileInput;
use yii\bootstrap\Html;


$js = <<<JS
    $("#resi-charge").on("keyup", function (e) {
    var total = parseFloat($(this).val())+parseFloat($("#resi-packing").val())
    +parseFloat($("#resi-other").val())+parseFloat($("#resi-vat").val())
    $("#resi-total").val(total)}
    
    
    );
    
    $("#resi-packcing").on("keyup", function (e) {
    var total = parseFloat($(this).val())+parseFloat($("#resi-charge").val())
    +parseFloat($("#resi-other").val())+parseFloat($("#resi-vat").val())
    $("#resi-total").val(total)}
    
    
    );

    $("#resi-other").on("keyup", function (e) {
    var total = parseFloat($(this).val())+parseFloat($("#resi-packing").val())
    +parseFloat($("#resi-charge").val())+parseFloat($("#resi-vat").val())
    $("#resi-total").val(total)}
    
    
    );

    $("#resi-vat").on("keyup", function (e) {
    var total = parseFloat($(this).val())+parseFloat($("#resi-packing").val())
    +parseFloat($("#resi-other").val())+parseFloat($("#resi-charge").val())
    $("#resi-total").val(total)}
    
    
    );
    
    
    

    
    
    

JS;
$this->registerJs($js);

?>
      <div class="row">
        <div class="col-sm-8">   
  
    <?= $form->field($model, 'charge')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'packing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total')->textInput(['maxlength' => true,'readonly'=>true]) ?>
        </div>
          </div>