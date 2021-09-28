<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Invoice */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Invoice',
]) . $model->id_invoice;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Invoice'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_invoice, 'url' => ['view', 'id' => $model->id_invoice]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="invoice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
