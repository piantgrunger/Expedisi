<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Outlet */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Outlet',
]) . $model->kode_outlet;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Outlet'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_outlet, 'url' => ['view', 'id' => $model->id_outlet]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="outlet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
