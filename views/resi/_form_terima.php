<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use yii\bootstrap\Tabs;
use app\models\Outlet;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Resi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resi-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

  <?php   
        echo "<h4><u> Outlet : ". $model->outlet->nama_outlet ."</u></h4>";
  ?>      
    
    <?= $form->field($model, 'no_resi')->textInput(['maxlength' => true,"readonly"=>true]) ?>

    <?= $form->field($model, 'tgl_resi')->textInput(['maxlength' => true,"readonly"=>true])?>
 
    <?= $form->field($model, 'tgl_diterima')->widget(DateControl::className()) ?>
  
    <?= $form->field($model, 'penerima')->textInput(['maxlength' => true]) ?>
        
    



            
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
