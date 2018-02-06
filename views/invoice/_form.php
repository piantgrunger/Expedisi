<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use app\models\Outlet;
use app\models\Customer;
use kartik\select2\Select2;
use mdm\widgets\TabularInput;

/* @var $this yii\web\View */
/* @var $model app\models\Invoice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoice-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

        <div class="row">
        <div class="col-sm-6">   
  
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
     
    <?= $form->field($model, 'no_invoice')->textInput(['maxlength' => true]) ?>

  </div>
  <div class="col-sm-6">   
  
    <?= $form->field($model, 'tgl_invoice')->widget(DateControl::className(), [
    'type'=>DateControl::FORMAT_DATE,
    'ajaxConversion'=>false,
    'widgetOptions' => [
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]
]); ?> 

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
<div class="panel panel-primary">
<div class="panel-heading"> Data Resi - Invoice

</div>
<table class="table">
    <thead>
        <tr>
            
            <th>No Resi</th>
            <th>Sub Total</th>
            <th>Keterangan</th>
            <th><a id="btn-add" href="#"><span class="glyphicon glyphicon-plus"></span></a></th>
        </tr>
    </thead>
    <?= 
    TabularInput::widget([
        'id' => 'detail-grid',
        'allModels' => $model->detailInvoice,
        'model' => \app\models\Det_Invoice::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_detail_invoice',
        'clientOptions' => [
            'btnAddSelector' => '#btn-add',
        ]
    ]);
?>

</table>

</div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
