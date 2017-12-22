<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\Resi */

$this->title = $model->id_resi;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Resi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
             <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>        <?= Html::a('Ubah', ['update', 'id' => $model->id_resi], ['class' => 'btn btn-primary']) ?>
        <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>        <?= Html::a('Hapus', ['delete', 'id' => $model->id_resi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda yakin ingin menghapus item ini??',
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_outlet',
            'no_resi',
            'tgl_resi',
            'nama_shipper',
            'alamat_shipper:ntext',
            'id_propinsi_shipper',
            'id_kota_shipper',
            'id_kecamatan_shipper',
            'id_kelurahan_shipper',
            'nama_consignee',
            'alamat_consignee:ntext',
            'id_propinsi_consignee',
            'id_kota_consignee',
            'id_kecamatan_consignee',
            'id_kelurahan_consignee',
            'isi_barang',
            'berat_barang',
            'volume_barang',
            'penerima',
            'tgl_diterima',
            'charge',
            'packing',
            'other',
            'vat',
            'total',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
