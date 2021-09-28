
<?php
use yii\helpers\Html;
$i=1;
$berat=0;
$colly=0;

?>
<p style="font-family: sans-serif;font-size: 12px;">
SURAT JALAN <br>
No : <?=$model->no_manifest;?> <br>
Tanggal : <?=Yii::$app->formatter->asDate($model->tgl_manifest,'dd MMMM yyyy');?> <br>
</p>
<br>
<table style="width:100%;border: 1px solid black; border-collapse: collapse;">
<tr>
   <th style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;" align="center">Tujuan</th>
   <th style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;"  align="center">No.</th>
   <th colspan ="3" style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;"  align="center">No.Resi / Tujuan</th>
   <th style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;"  align="center">Koli</th>
   <th style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;"  align="center">Kilo</th>
   <th style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;"  align="center">No. SJ</th>
   <th style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;"  align="center">Keterangan</th>
   

</tr>
<tr>
<?php 
        foreach($model->detailManifest as $detail)
        {
             
           echo ' <tr> ';
           if ($i==1) {
               echo "<td style=\"border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;\" rowspan=$model->detailCount> $model->tujuan_manifest</td>";

           }

            echo '<td style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;" align="center">'.$i. '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;" align="center">'.$detail->resi->no_resi. '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;" align="center">'.$detail->resi->kotaConsignee->nama_kota. '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;" align="center">'.$detail->resi->nama_consignee. '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;" align="right">'.Yii::$app->formatter->asDecimal($detail->resi->colly_barang,2). '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;"  align="right">'.Yii::$app->formatter->asDecimal($detail->resi->berat_barang,2). '</td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;" align="center">'.$detail->resi->no_sj. '</td>';
     
            echo '<td style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;">'.$detail->keterangan .'</td>' ;
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
   <th style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;">Total</th>
   <th style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px; " align="right"><?=Yii::$app->formatter->asDecimal($colly,2)?></th>
    <th style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;" align="right"><?=Yii::$app->formatter->asDecimal($berat,2)?></th>
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
<p style="font-family: sans-serif;font-size: 12px;">
   Sopir <br>
   <br>
   <br>
   <br>
   <br>
   <br>
  ( <?=$model->nama_sopir;?> )<br>
  Telepon : <?=$model->telepon_sopir?> <br>
  NOPOL : <?=$model->nomor_polisi?> 
  </p>
   
</td>
<td align="center">
<p style="font-family: sans-serif;font-size: 12px;">
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
  </p>
  
</td>
</tr>
</table>