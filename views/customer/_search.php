<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'kode_customer') ?>

    <?= $form->field($model, 'nama_customer') ?>

    <?= $form->field($model, 'alamat_customer') ?>

    <?= $form->field($model, 'id_propinsi') ?>

    <?php // echo $form->field($model, 'id_kota') ?>

    <?php // echo $form->field($model, 'id_kecamatan') ?>

    <?php // echo $form->field($model, 'id_kelurahan') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
