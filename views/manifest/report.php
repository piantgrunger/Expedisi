<?php
use yii\helpers\Html;
$i=1;
$berat=0;
$colly=0;

?>
SURAT JALAN <br>
No : <?=$model->no_manifest;?> <br>
Tanggal : <?=Yii::$app->formatter->asDate($model->tgl_manifest,'dd/MM/yyyy');?> <br>
<table style="width:100%;border: 1px solid black; border-collapse: collapse;">
<tr>
   <th style="border: 1px solid black; border-collapse: collapse;">Tujuan</th>
   <th style="border: 1px solid black; border-collapse: collapse;">No.</th>
   <th style="border: 1px solid black; border-collapse: collapse;">No.Resi</th>
   <th style="border: 1px solid black; border-collapse: collapse;">Nama</th>
   <th style="border: 1px solid black; border-collapse: collapse;">Kota</th>
   <th style="border: 1px solid black; border-collapse: collapse;">Kilo</th>
   <th style="border: 1px solid black; border-collapse: collapse;">Colly</th>
   <th style="border: 1px solid black; border-collapse: collapse;">Keterangan</th>
   

</tr>
<tr>
<?php 
        foreach($model->detailManifest as $detail)
        {
             
           echo ' <tr> ';
           if ($i==1) {
               echo "<td style=\"border: 1px solid black; border-collapse: collapse;\" rowspan=$model->detailCount> $model->tujuan_manifest</td>";

           }

           echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$i. '</td>';
     
            echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$detail->resi->no_resi. '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$detail->resi->nama_consignee. '</td>';
            
           echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$detail->resi->kotaConsignee->nama_kota. '</td>';
           echo '<td style="border: 1px solid black; border-collapse: collapse;"  align="right">'.Yii::$app->formatter->asDecimal($detail->resi->berat_barang,2). '</td>';
           echo '<td style="border: 1px solid black; border-collapse: collapse;" align="right">'.Yii::$app->formatter->asDecimal($detail->resi->colly_barang,2). '</td>';
        
           echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$detail->keterangan .'</td>' ;
           $berat +=$detail->resi->berat_barang;
           $colly +=$detail->resi->colly_barang;
           $i++;
           echo '     </tr>           ' ;           
        }
     
?>
<tr>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
   <th style="border: 1px solid black; border-collapse: collapse;">Total</th>
   <th style="border: 1px solid black; border-collapse: collapse;" align="right"><?=Yii::$app->formatter->asDecimal($berat,2)?></th>
   <th style="border: 1px solid black; border-collapse: collapse; " align="right"><?=Yii::$app->formatter->asDecimal($colly,2)?></th>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
   

</tr>


</table>