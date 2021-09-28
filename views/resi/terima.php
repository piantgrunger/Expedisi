<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax; use kartik\export\ExportMenu;
$gridColumns=[['class' => 'kartik\grid\SerialColumn'], 
          //  'id_outlet',
            'no_resi',
            [
                'class' => '\kartik\grid\DataColumn',    
                'attribute'=>'tgl_resi',
                'format'=>['date', 'dd MMM Y'],
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
                   'nama_shipper',
            //'alamat_shipper:ntext',
            'kotaAsal',
            // 'id_propinsi_shipper',
            // 'id_kota_shipper',
            // 'id_kecamatan_shipper',
            // 'id_kelurahan_shipper',
             'nama_consignee',
             'kotaTujuan',
            // 'status',
             //'alamat_consignee:ntext',
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

         ['class' => 'kartik\grid\ActionColumn',
         'template' => '{penerimaan}',
         'buttons' => [
             'penerimaan' => function ($url, $model) {
                 return Html::a('<span class="glyphicon glyphicon-list-alt"></span>', $url, [
                             'title' => Yii::t('app', 'Penerimaan'),
                 ]);
             }
         ],
         'urlCreator' => function ($action, $model, $key, $index) {
             if ($action === 'penerimaan') {
                 $url =['/resi/penerimaan',"id"=>$model->id_resi]; // your own url generation logic
                 return $url;
             }
         } 
        
        ,    ],    ]; 

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penerimaan Resi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,        
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
         'resizableColumns'=>true,    
    ]); ?>
    <?php Pjax::end(); ?>
</div>
