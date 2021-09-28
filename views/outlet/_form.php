<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use app\models\Propinsi;
use yii\helpers\Url;
use app\models\Kecamatan;
use app\models\Kelurahan;

/* @var $this yii\web\View */
/* @var $model app\models\Outlet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="outlet-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'kode_outlet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_outlet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_outlet')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'id_propinsi')->widget(Select2::classname(), [
    
    'data' => Propinsi::getDataBrowsePropinsi(),
    'options' => ['placeholder' => 'Pilih Propinsi ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Propinsi '); ?>	 
    <?= $form->field($model, 'id_kota')->widget(DepDrop::classname(), [
    'type'=>DepDrop::TYPE_SELECT2,
    'data'=> [$model->id_kota=>is_null($model->kota)?"":$model->kota->nama_kota],
    'options'=>[ 'placeholder'=>'Pilih Kota ...'],
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        'depends'=>['outlet-id_propinsi'],
        'url'=>Url::to(['/resi/kota']),
        'placeholder'=>'Pilih Kota ...' ,
        'initialize' =>true,

        ]
    ])->label('Kota '); ?>	

    <?= $form->field($model, 'id_kecamatan')->widget(DepDrop::classname(), [
    'type'=>DepDrop::TYPE_SELECT2,
    'data'=> [$model->id_kecamatan=>is_null($model->kecamatan)?"":$model->kecamatan->nama_kecamatan],
    'options'=>[ 'placeholder'=>'Pilih Kecamatan ...'],
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        'depends'=>['outlet-id_kota'],
        'url'=>Url::to(['/resi/kecamatan']),
        'placeholder'=>'Pilih Kecamatan ...',
        'initialize' =>true,
        
        ]
    ])->label('Kecamatan '); ?>	

<?= $form->field($model, 'id_kelurahan')->widget(DepDrop::classname(), [
    'type'=>DepDrop::TYPE_SELECT2,
    'data'=> [$model->id_kelurahan=>is_null($model->kelurahan)?"":$model->kelurahan->nama_kelurahan],
    'options'=>[ 'placeholder'=>'Pilih Kelurahan ...'],
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        'depends'=>['outlet-id_kecamatan'],
        'url'=>Url::to(['/resi/kelurahan']),
        
        'placeholder'=>'Pilih Kelurahan ...',
        'initialize' =>true,
        ]
    ])->label('Kelurahan '); ?>	

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
