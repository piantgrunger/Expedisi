<?php
use kartik\datecontrol\DateControl;
use kartik\widgets\FileInput;
use yii\bootstrap\Html;
?>
      <div class="row">
        <div class="col-sm-8">   
           
        


    <?= $form->field($model, 'isi_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'berat_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'volume_barang')->textInput(['maxlength' => true]) ?>

</div>
          </div>