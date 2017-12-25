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
    <?= $form->field($model, 'nama_shipper')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_shipper')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'id_propinsi_shipper')->widget(Select2::classname(), [
    
    'data' => Propinsi::getDataBrowsePropinsi(),
    'options' => ['placeholder' => 'Pilih Propinsi ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Propinsi Shipper'); ?>	 
    <?= $form->field($model, 'id_kota_shipper')->widget(DepDrop::classname(), [
    'type'=>DepDrop::TYPE_SELECT2,
    'data'=> [$model->id_kota_shipper=>is_null($model->kotaShipper)?"":$model->kotaShipper->nama_kota],
    'options'=>[ 'placeholder'=>'Pilih Kota ...'],
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        'depends'=>['resi-id_propinsi_shipper'],
        'url'=>Url::to(['/resi/kota']),
        'placeholder'=>'Pilih Kota ...',
       
        'initialize' =>true,
        ]
    ])->label('Kota Shipper'); ?>	

    <?= $form->field($model, 'id_kecamatan_shipper')->widget(DepDrop::classname(), [
    'type'=>DepDrop::TYPE_SELECT2,
    'data'=> [$model->id_kecamatan_shipper=>is_null($model->kecamatanShipper)?"":$model->kecamatanShipper->nama_kecamatan],
    'options'=>[ 'placeholder'=>'Pilih Kecamatan ...'],
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        'depends'=>['resi-id_kota_shipper'],
        'url'=>Url::to(['/resi/kecamatan']),
        'placeholder'=>'Pilih Kecamatan ...',
        'initialize' =>true,
        ]
    ])->label('Kecamatan Shipper'); ?>	

<?= $form->field($model, 'id_kelurahan_shipper')->widget(DepDrop::classname(), [
    'type'=>DepDrop::TYPE_SELECT2,
    'data'=> [$model->id_kelurahan_shipper=>is_null($model->kelurahanShipper)?"":$model->kelurahanShipper->nama_kelurahan],
    'options'=>[ 'placeholder'=>'Pilih Kelurahan ...'],
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        'depends'=>['resi-id_kecamatan_shipper'],
        'url'=>Url::to(['/resi/kelurahan']),
        'initialize' =>true,
        
        'placeholder'=>'Pilih Kelurahan ...'
        ]
    ])->label('Kelurahan Shipper'); ?>	
 
</div>
          </div>