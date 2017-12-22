<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax; use kartik\export\ExportMenu;
$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
          //  'id_outlet',
            'no_resi',
            'tgl_resi',
            'nama_shipper',
            'alamat_shipper:ntext',
            // 'id_propinsi_shipper',
            // 'id_kota_shipper',
            // 'id_kecamatan_shipper',
            // 'id_kelurahan_shipper',
             'nama_consignee',
             'alamat_consignee:ntext',
            // 'id_propinsi_consignee',
            // 'id_kota_consignee',
            // 'id_kecamatan_consignee',
            // 'id_kelurahan_consignee',
            // 'isi_barang',
            // 'berat_barang',
            // 'volume_barang',
            // 'penerima',
            // 'tgl_diterima',
            // 'charge',
            // 'packing',
            // 'other',
            // 'vat',
            // 'total',
            // 'created_at',
            // 'updated_at',

         ['class' => 'yii\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update','delete','view'],$this->context->route),    ],    ]; echo ExportMenu::widget(['dataProvider' => $dataProvider,'columns' => $gridColumns]);

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Resi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p> <?php if ((Mimin::checkRoute($this->context->id."/create"))){ ?>        <?=  Html::a('Resi  Baru', ['create'], ['class' => 'btn btn-success']) ?>
    <?php } ?>    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,        'responsive'=>true,
        'hover'=>true,
         'resizableColumns'=>true,    
    ]); ?>
    <?php Pjax::end(); ?>
</div>
