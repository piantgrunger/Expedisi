<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_resi') ?>

    <?= $form->field($model, 'id_outlet') ?>

    <?= $form->field($model, 'no_resi') ?>

    <?= $form->field($model, 'tgl_resi') ?>

    <?= $form->field($model, 'nama_shipper') ?>

    <?php // echo $form->field($model, 'alamat_shipper') ?>

    <?php // echo $form->field($model, 'id_propinsi_shipper') ?>

    <?php // echo $form->field($model, 'id_kota_shipper') ?>

    <?php // echo $form->field($model, 'id_kecamatan_shipper') ?>

    <?php // echo $form->field($model, 'id_kelurahan_shipper') ?>

    <?php // echo $form->field($model, 'nama_consignee') ?>

    <?php // echo $form->field($model, 'alamat_consignee') ?>

    <?php // echo $form->field($model, 'id_propinsi_consignee') ?>

    <?php // echo $form->field($model, 'id_kota_consignee') ?>

    <?php // echo $form->field($model, 'id_kecamatan_consignee') ?>

    <?php // echo $form->field($model, 'id_kelurahan_consignee') ?>

    <?php // echo $form->field($model, 'isi_barang') ?>

    <?php // echo $form->field($model, 'berat_barang') ?>

    <?php // echo $form->field($model, 'volume_barang') ?>

    <?php // echo $form->field($model, 'penerima') ?>

    <?php // echo $form->field($model, 'tgl_diterima') ?>

    <?php // echo $form->field($model, 'charge') ?>

    <?php // echo $form->field($model, 'packing') ?>

    <?php // echo $form->field($model, 'other') ?>

    <?php // echo $form->field($model, 'vat') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
