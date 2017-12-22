<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Resi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resi-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

                  
    
    <?= $form->field($model, 'no_resi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_resi')->widget(DateControl::className()) ?>
   
     
                  <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Data Shipper',
                'content' => $this->render('_form_data_shipper', ['model' => $model, 'form' => $form]),
                'active' => true
            ],
             
            [
                'label' => 'Data Consignee',
                'content' => $this->render('_form_data_consignee', ['model' => $model, 'form' => $form]),
                'active' => false
            ],
                 [
                'label' => 'Data Barang',
                'content' => $this->render('_form_data_barang', ['model' => $model, 'form' => $form]),
                'active' => false
            ],
                  [
                'label' => 'Data Biaya',
                'content' => $this->render('_form_data_biaya', ['model' => $model, 'form' => $form]),
                'active' => false
            ],
       ]]);
 ?>   
            
    



            
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
