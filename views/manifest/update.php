<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Manifest */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Manifest',
]) . $model->id_manifest;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Manifest'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_manifest, 'url' => ['view', 'id' => $model->id_manifest]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="manifest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
