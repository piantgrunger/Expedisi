<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use yii\bootstrap\Tabs;
use app\models\Outlet;
use app\models\Customer;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Resi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resi-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

  
  <div class="form-group">
  <div class="row">
        <div class="col-sm-8">   

  <?php
  
  if ($model->id_outlet == '')
    {
        echo $form->field($model, 'id_outlet')->widget(Select2::classname(), [
    
    'data' => Outlet::getDataBrowseOutlet(),
    'options' => ['placeholder' => 'Pilih Outlet ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Outlet'); 	 

    } else
    {
        echo "<h4><u> Outlet : ". $model->outlet->nama_outlet ."</u></h4>";
    }  ?>            
    
    <?= $form->field($model, 'no_resi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_sj')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_resi')->widget(DateControl::className()) ?>

<?php
    echo $form->field($model, 'id_customer')->widget(Select2::classname(), [
    
    'data' => Customer::getDataBrowseCustomer(),
    'options' => ['placeholder' => 'Pilih Customer ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Customer'); 	 
    ?>
    </div>
    </div>
    </div>     
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
