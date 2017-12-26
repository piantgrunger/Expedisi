<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Resi */

$this->title = 'Pennerimaa Resi: ' . $model->no_resi;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Resi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_resi, 'url' => ['view', 'id' => $model->id_resi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_terima', [
        'model' => $model,
    ]) ?>

</div>
