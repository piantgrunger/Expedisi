<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Resi */

$this->title = 'Resi  Baru';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Resi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
