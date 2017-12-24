<?php
use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use app\models\Propinsi;
use yii\helpers\Url;
use app\models\Kecamatan;
use app\models\Kelurahan;
?>
      <div class="row">
        <div class="col-sm-8">   
    <?= $form->field($model, 'nama_consignee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_consignee')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_propinsi_consignee')->widget(Select2::classname(), [
    
    'data' => Propinsi::getDataBrowsePropinsi(),
    'options' => ['placeholder' => 'Pilih Propinsi ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Propinsi Consignee'); ?>	 
    <?= $form->field($model, 'id_kota_consignee')->widget(DepDrop::classname(), [
    'type'=>DepDrop::TYPE_SELECT2,
    'data'=> [0=>''],
    'options'=>[ 'placeholder'=>'Pilih Kota ...'],
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        'depends'=>['resi-id_propinsi_consignee'],
        'url'=>Url::to(['/resi/kota']),
        'placeholder'=>'Pilih Kota ...'
        ]
    ])->label('Kota Consignee'); ?>	

    <?= $form->field($model, 'id_kecamatan_consignee')->widget(DepDrop::classname(), [
    'type'=>DepDrop::TYPE_SELECT2,
    'data'=> [0=>''],
    'options'=>[ 'placeholder'=>'Pilih Kecamatan ...'],
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        'depends'=>['resi-id_kota_consignee'],
        'url'=>Url::to(['/resi/kecamatan']),
        'placeholder'=>'Pilih Kecamatan ...'
        ]
    ])->label('Kecamatan Consignee'); ?>	

<?= $form->field($model, 'id_kelurahan_consignee')->widget(DepDrop::classname(), [
    'type'=>DepDrop::TYPE_SELECT2,
    'data'=> [0=>''],
    'options'=>[ 'placeholder'=>'Pilih Kelurahan ...'],
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        'depends'=>['resi-id_kecamatan_consignee'],
        'url'=>Url::to(['/resi/kelurahan']),
        
        'placeholder'=>'Pilih Kelurahan ...'
        ]
    ])->label('Kelurahan Consignee'); ?>	
 
</div>
          </div>