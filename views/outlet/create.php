<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Outlet */

$this->title = Yii::t('app', 'Outlet  Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Outlet'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outlet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
