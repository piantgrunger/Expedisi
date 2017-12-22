<?php
use kartik\widgets\Select2;
use app\models\Propinsi;
use app\models\Kota;
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
    <?= $form->field($model, 'id_kota_shipper')->widget(Select2::classname(), [
    
    'data' => Kota::getDataBrowseKota(),
    'options' => ['placeholder' => 'Pilih Kota ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Kota Shipper'); ?>	

    <?= $form->field($model, 'id_kecamatan_shipper')->widget(Select2::classname(), [
    
    'data' => Kecamatan::getDataBrowseKecamatan(),
    'options' => ['placeholder' => 'Pilih Kecamatan ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Kecamatan Shipper'); ?>	

 
</div>
          </div>