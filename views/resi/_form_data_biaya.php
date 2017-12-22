<?php
use kartik\datecontrol\DateControl;
use kartik\widgets\FileInput;
use yii\bootstrap\Html;
?>
      <div class="row">
        <div class="col-sm-8">   
  
    <?= $form->field($model, 'charge')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'packing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total')->textInput(['maxlength' => true]) ?>
        </div>
          </div>