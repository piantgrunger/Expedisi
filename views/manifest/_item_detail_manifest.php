<?php
use app\models\Resi;
use kartik\select2\Select2;
use yii\helpers\Url;
?>

<td><?= $form->field($model,"[$key]id_resi")->widget(Select2::classname(),[ 
     'data' => Resi::getDataBrowseResi(),
     'options' => ['placeholder' => 'Pilih Resi...'],
     'pluginOptions' => [
         'allowClear' => true
     ],])->label(false); ?>
       
     </td>
     <td>    <?= $form->field($model, "[$key]keterangan")->label(false); ?>
</td>
<td><a data-action="delete"><span class="glyphicon glyphicon-trash"></span></a></td>