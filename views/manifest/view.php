<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\Manifest */

$this->title = $model->id_manifest;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Manifest'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manifest-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
             <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_manifest], ['class' => 'btn btn-primary']) ?>
        <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_manifest], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Apakah Anda yakin ingin menghapus item ini??'),
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_outlet',
            'no_manifest',
            'tgl_manifest',
            'tujuan_manifest:ntext',
            'nama_sopir',
            'nomor_polisi',
            'telepon_sopir',
            'pembuat_manifest',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
