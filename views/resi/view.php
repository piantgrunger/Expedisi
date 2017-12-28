<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\Resi */

$this->title = $model->no_resi;
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
            [
                'value'=> $model->outlet->nama_outlet,
                'label'=> 'Outlet'
             ],
            'no_resi',
            'tgl_resi:date',
            'nama_shipper',
            'alamat_shipper:ntext',
            [
                'value'=> $model->propinsiShipper->nama_propinsi,
                'label'=> 'Propinsi Shipper'
             ],
             [
                'value'=> $model->kotaShipper->nama_kota,
                'label'=> 'Kota Shipper'
             ],
             [
                'value'=> $model->kecamatanShipper->nama_kecamatan,
                'label'=> 'Kecamatan Shipper'
             ],
             [
                'value'=> $model->kelurahanShipper->nama_kelurahan,
                'label'=> 'Kelurahan Shipper'
             ],
            'nama_consignee',
            'alamat_consignee:ntext',
            [
                'value'=> $model->propinsiConsignee->nama_propinsi,
                'label'=> 'Propinsi Consignee'
             ],
             [
                'value'=> $model->kotaConsignee->nama_kota,
                'label'=> 'Kota Consignee'
             ],
             [
                'value'=> $model->kecamatanConsignee->nama_kecamatan,
                'label'=> 'Kecamatan Consignee'
             ],
             [
                'value'=> $model->kelurahanConsignee->nama_kelurahan,
                'label'=> 'Kelurahan Consignee'
             ],
     
            'isi_barang',
            'berat_barang',
            'colly_barang',
            
            'volume_barang',
            'penerima',
            'tgl_diterima:date',
            'charge',
            'packing',
            'other',
            'vat',
            'total',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
