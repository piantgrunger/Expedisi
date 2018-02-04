<?php
use yii\helpers\Html;
$i=1;
$berat=0;
$colly=0;

?>
SURAT JALAN <br>
No : <?=$model->no_manifest;?> <br>
Tanggal : <?=Yii::$app->formatter->asDate($model->tgl_manifest,'dd MMMM yyyy');?> <br>
<br>
<table style="width:100%;border: 1px solid black; border-collapse: collapse;">
<tr>
   <th style="border: 1px solid black; border-collapse: collapse;" align="center">Tujuan</th>
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">No.</th>
   <th colspan ="3" style="border: 1px solid black; border-collapse: collapse;"  align="center">No.Resi / Tujuan</th>
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">Koli</th>
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">Kilo</th>
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">No. SJ</th>
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">Keterangan</th>
   

</tr>
<tr>
<?php 
        foreach($model->detailManifest as $detail)
        {
             
           echo ' <tr> ';
           if ($i==1) {
               echo "<td style=\"border: 1px solid black; border-collapse: collapse;\" rowspan=$model->detailCount> $model->tujuan_manifest</td>";

           }

            echo '<td style="border: 1px solid black; border-collapse: collapse;" align="center">'.$i. '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;" align="center">'.$detail->resi->no_resi. '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;" align="center">'.$detail->resi->kotaConsignee->nama_kota. '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;" align="center">'.$detail->resi->nama_consignee. '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;" align="right">'.Yii::$app->formatter->asDecimal($detail->resi->colly_barang,2). '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;"  align="right">'.Yii::$app->formatter->asDecimal($detail->resi->berat_barang,2). '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;" align="center">'.$detail->resi->no_sj. '</td>';
     
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
   <th style="border: 1px solid black; border-collapse: collapse; " align="right"><?=Yii::$app->formatter->asDecimal($colly,2)?></th>
    <th style="border: 1px solid black; border-collapse: collapse;" align="right"><?=Yii::$app->formatter->asDecimal($berat,2)?></th>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
 

</tr>


</table>
<br>
<br>
<br>
<table style="width:100%">
<tr>
<td align="center">
   Sopir <br>
   <br>
   <br>
   <br>
   <br>
   <br>
  ( <?=$model->nama_sopir;?> )<br>
  Telepon : <?=$model->telepon_sopir?> <br>
  NOPOL : <?=$model->nomor_polisi?> 
   
</td>
<td align="center">
   Yang Menyerahkan <br>
   <?=$model->outlet->nama_outlet?><br>
   <br>
   <br>
   <br>
   <br>
  ( <?=$model->pembuat_manifest;?> )<br>
  <br>
  <br>
  <br>
  
</td>
</tr>
</table>