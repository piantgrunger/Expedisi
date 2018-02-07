<?php
use yii\helpers\Html;
use app\helpers\Helper;
$i=1;
$berat=0;
$colly=0;

?>
<h4 align="center" style="font-family: sans-serif;font-size: 15px;"><?=$model->outlet->nama_outlet;?><br>

<?=$model->outlet->alamat_outlet;?><h4>
<p style="font-family: sans-serif;font-size: 12px;" align="right">
  INVOICE
</p>

<p style="font-family: sans-serif;font-size: 12px;">
Kepada Yth : <br>
<?=$model->customer->nama_customer;?> <br>
<?=$model->customer->alamat_customer;?> <br>
<?=$model->customer->kota->nama_kota;?> <br>
</p>

<br>
<p style="font-family: sans-serif;font-size: 12px;">
<table style="width:100%;border: 1px solid black; border-collapse: collapse;">
<tr>

   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">No.</th>
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">No. Resi</th>
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">Tujuan</th>
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">Kota</th>
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">Koli</th>
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">Total</th>
   <th style="border: 1px solid black; border-collapse: collapse;"  align="center">Keterangan</th>
   

</tr>
<tr>
<?php 
        foreach($model->detailInvoice as $detail)
        {
             
           echo ' <tr> ';
      

            echo '<td style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;" align="center">  '.$i. '  </td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;" align="center">  '.$detail->resi->no_resi. '  </td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;" align="center">  '.$detail->resi->nama_consignee. '  </td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;" align="center">  '.$detail->resi->kotaConsignee->nama_kota. '  </td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;" align="right">  '.Yii::$app->formatter->asDecimal($detail->resi->colly_barang,0). '  </td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;" align="right"> Rp ' .Yii::$app->formatter->asDecimal($detail->sub_total,2). '  </td>';
            echo '<td style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;">  '.$detail->keterangan .'</td>' ;
            echo '     </tr>           ' ;    
            $i++;       
        }
     
?>
<tr>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
   <th style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px;">Total</th>
   <th style="border: 1px solid black; border-collapse: collapse;font-family: sans-serif;font-size: 12px; " align="right"> Rp <?=Yii::$app->formatter->asDecimal($model->total,2)?></th>
   <th style="border: 1px solid black; border-collapse: collapse;"></th>
 

</tr>


</table>
</p>
<br>
<br>
<br>
<p style="font-family: sans-serif;font-size: 12px;font-weight: bold;">
Terbilang : <?=ucwords(Helper::terbilang($model->total))?> Rupiah
</p>
<p style="font-family: sans-serif;font-size: 12px;">
 Pembayaran bisa cash atau transfer melalui bank BCA dengan nomor rekening <b>  7410743595 </b> a/n
 Ade Suryanto
</p>
<p style="font-family: sans-serif;font-size: 12px;">
Demikian INVOICE ini kami buat terima kasih atas perhatian dan kerjasamanya
</p>
<p style="font-family: sans-serif;font-size: 12px;">
 Harga diatas belum termasuk diskon 10%
</p>
<br>
<br>
<br>
<br>
<p style="font-family: sans-serif;font-size: 12px;">
  Surabaya <?=Yii::$app->formatter->asDate($model->tgl_invoice,'dd MMMM yyyy')?>
</p>

<br>
<br>
<br>
<br>
<br>
<p style="font-family: sans-serif;font-size: 12px;">
Ade Suryanto
</p>