<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;


/* @var $this yii\web\View */
/* @var $model app\models\Manifest */
$berat=0.00;
$colly=0.00;
$this->title = "Manifest No:". $model->no_manifest;
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
            [
                'value'=> $model->outlet->nama_outlet,
                'label'=> 'Outlet'
             ],
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

<div class="panel panel-primary">
<div class="panel-heading"> Data Resi - Manifest

</div>

<table class="table">
    <thead>
        <tr>
            
            <th>No Resi</th>
            <th>Tujuan</th>
            <th>Berat Barang</th>
            <th>Colly Barang</th>
            
            
            
            <th>Keterangan</th>
        </tr>
    </thead>
     <tbody>
      <?php 
        foreach($model->detailManifest as $detail)
        {
           echo "<td>".$detail->resi->no_resi. "</td>";
           echo "<td>".$detail->resi->kotaConsignee->nama_kota. "</td>";
           echo "<td>".$detail->resi->berat_barang. "</td>";
           echo "<td>".$detail->resi->colly_barang. "</td>";
        
           echo "<td>".$detail->keterangan ."</td>" ;
           $berat +=$detail->resi->berat_barang;
           $colly +=$detail->resi->colly_barang;
           
        }
      ?>  
     
     </tbody>
     <tfoot>
        <tr>
            
            <th></th>
            <th></th>
            <th><?=$berat?></th>
            <th><?=$colly?></th>
            
            
            
            <th></th>
        </tfoot>
    </thead>
 
</table>
</div>
</div>

</div>
