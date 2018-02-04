<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
$addon = <<< HTML
<span class="input-group-addon">
    <i class="glyphicon glyphicon-calendar"></i>
</span>
HTML;
use kartik\daterange\DateRangePicker;
use yii\widgets\Pjax; use kartik\export\ExportMenu;
$gridColumns=[['class' => 'kartik\grid\SerialColumn'], 
          //  'id_outlet',
            'no_resi',
            [
              'class' => '\kartik\grid\DataColumn',    
              'attribute'=>'tgl_resi',
              'format'=>['date', 'dd-MM-Y'],
              'filterType'=> '\kartik\daterange\DateRangePicker',
              'filterWidgetOptions' =>([
                'model'=>$searchModel,
                'attribute'=>'filter_tgl',
                'convertFormat'=>true,                
                'pluginOptions'=>[                                          
                    'locale' => [
                        'cancelLabel' => 'Clear',
                        'format' => 'Y-m-d',
                ],
                ]])
                
            ],
            'namaCustomer',
            'nama_shipper',
            //'alamat_shipper:ntext',
            'kotaAsal',
            // 'id_propinsi_shipper',
            // 'id_kota_shipper',
            // 'id_kecamatan_shipper',
            // 'id_kelurahan_shipper',
             'nama_consignee',
             'kotaTujuan',
           
             //'alamat_consignee:ntext',
            // 'id_propinsi_consignee',
            // 'id_kota_consignee',
            // 'id_kecamatan_consignee',
            // 'id_kelurahan_consignee',
             //'isi_barang',
             'berat_barang',
             'colly_barang',
             [
                'attribute'=>'status',
                'filter'=>array("Belum Dikirim"=>"Belum Dikirim","Sudah Dikirim"=>"Sudah Dikirim","Sampai"=>"Sampai"),
            ],  
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

         ['class' => 'kartik\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update','delete','view'],$this->context->route),    ],    ];
              

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Resi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resi-index">


    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p> <?php if ((Mimin::checkRoute($this->context->id."/create"))){ ?>        <?=  Html::a('Resi  Baru', ['create'], ['class' => 'btn btn-success']) ?>
    <?php } ?>    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,     
        'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false

        'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'striped'=>false,
        'containerOptions'=>[true],
        'pjax' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'showPageSummary' => true,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY
      
        ],  
         'resizableColumns'=>true,    
    ]); ?>
    <?php Pjax::end(); ?>
</div>
