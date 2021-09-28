<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ManifestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manifest-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_manifest') ?>

    <?= $form->field($model, 'id_outlet') ?>

    <?= $form->field($model, 'no_manifest') ?>

    <?= $form->field($model, 'tgl_manifest') ?>

    <?= $form->field($model, 'tujuan_manifest') ?>

    <?php // echo $form->field($model, 'nama_sopir') ?>

    <?php // echo $form->field($model, 'nomor_polisi') ?>

    <?php // echo $form->field($model, 'telepon_sopir') ?>

    <?php // echo $form->field($model, 'pembuat_manifest') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
