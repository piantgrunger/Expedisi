<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;
$total=0;

/* @var $this yii\web\View */
/* @var $model app\models\Invoice */

$this->title = $model->no_invoice;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Invoice'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
             <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_invoice], ['class' => 'btn btn-primary']) ?>
        <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_invoice], [
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
            'no_invoice',
            'tgl_invoice:date',
            [
                'value'=> $model->customer->nama_customer,
                'label'=> 'Customer'
             ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

<div class="panel panel-primary">
<div class="panel-heading"> Data Resi - Invoice

</div>

<table class="table">
    <thead>
        <tr>
            
            <th>No Resi</th>

            <th >Tujuan</th>
            <th >Kota</th>
            <th>Total</th>
            
            
            
            <th>Keterangan</th>
        </tr>
    </thead>
      <?php 
        foreach($model->detailInvoice as $detail)
        {
           echo " <tbody> ";

            echo "<td>".$detail->resi->no_resi. "</td>";
            echo "<td>".$detail->resi->nama_consignee. "</td>";
           echo "<td>".$detail->resi->kotaConsignee->nama_kota. "</td>";
           echo "<td >".$detail->resi->total. "</td>";
           
           echo "<td>".$detail->keterangan ."</td>" ;
           $total +=$detail->resi->total;
           echo "     </tbody>           " ;           
        }
      ?>  
     
     <tfoot>
        <tr>
            
            <th></th>
            <th></th>
            <th></th>
         
            <th align="right"><?=Yii::$app->formatter->asDecimal($total,2)?></th>
            <th></th>  
            
            
            
            <th></th>
        </tfoot>
    </thead>
 
</table>
</div>
</div>

</div>
