<?php
use yii\helpers\Html;
$i=1;
$berat=0;
$colly=0;

?>
Kepada Yth <br>
<?=$model->customer->nama_customer;?> <br>
<?=$model->customer->alamat_customer;?> <br>
<?=$model->customer->kota->nama_kota;?> <br>

<br>
<table style="width:100%;border: 1px solid black; border-collapse: collapse;">
<tr>

   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">No.</th>
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">No. Resi</th>
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">Tujuan</th>
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">Kota</th>
   
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">Total</th>
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">Keterangan</th>
   

</tr>
<tr>
<?php 
        foreach($model->detailInvoice as $detail)
        {
             
           echo ' <tr> ';
      

            echo '<td style="border: 1px solid black; border-collapse: collapse;" align="center">'.$i. '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;" align="center">'.$detail->resi->no_resi. '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;" align="center">'.$detail->resi->nama_consignee. '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;" align="center">'.$detail->resi->kotaConsignee->nama_kota. '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;" align="right">'.Yii::$app->formatter->asDecimal($detail->sub_total,2). '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$detail->keterangan .'</td>' ;
            echo '     </tr>           ' ;           
        }
     
?>
<tr>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
   <th style="border: 1px solid black; border-collapse: collapse;">Total</th>
   <th style="border: 1px solid black; border-collapse: collapse; " align="right"><?=Yii::$app->formatter->asDecimal($model->total,2)?></th>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
 

</tr>


</table>
<br>
<br>
<br>