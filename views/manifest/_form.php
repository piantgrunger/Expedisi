<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use app\models\Outlet;
use app\models\Customer;
use kartik\select2\Select2;
use mdm\widgets\TabularInput;


/* @var $this yii\web\View */
/* @var $model app\models\Manifest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manifest-form">

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
        
        <?= $form->field($model, 'no_manifest')->textInput(['maxlength' => true]) ?>
    
    
        <?= $form->field($model, 'tgl_manifest')->widget(DateControl::className(), [
    'type'=>DateControl::FORMAT_DATE,
    'ajaxConversion'=>false,
    'widgetOptions' => [
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]
]); ?>
        <?= $form->field($model, 'tujuan_manifest')->textarea(['rows' => 4]) ?>
      
        </div>
        <div class="col-sm-6">   
        <?= $form->field($model, 'nama_sopir')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'nomor_polisi')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'telepon_sopir')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'pembuat_manifest')->textInput(['maxlength' => true]) ?>
</div>
</div>
<div class="panel panel-primary">
<div class="panel-heading"> Data Resi - Manifest

</div>
<table class="table">
    <thead>
        <tr>
            
            <th>No Resi</th>
            <th>Keterangan</th>
            <th><a id="btn-add" href="#"><span class="glyphicon glyphicon-plus"></span></a></th>
        </tr>
    </thead>
    <?= 
    TabularInput::widget([
        'id' => 'detail-grid',
        'allModels' => $model->detailManifest,
        'model' => \app\models\Det_Manifest::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_detail_manifest',
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
