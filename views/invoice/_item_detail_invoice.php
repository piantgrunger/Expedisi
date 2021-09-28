<?php
use app\models\Resi;
use kartik\widgets\DepDrop;
use yii\helpers\Url;




?>

<td><?= $form->field($model,"[$key]id_resi")->widget(DepDrop::classname(), [
    'type'=>DepDrop::TYPE_SELECT2,
    'data'=> [$model->id_resi=>is_null($model->resi)?"":$model->resi->no_resi],
    'options'=>[ 'placeholder'=>'Pilih Resi ...'],
    'select2Options'=>['pluginOptions'=>['allowClear'=>true,]

],
    'pluginOptions'=>[
        'depends'=>['invoice-id_customer'],
        'url'=>Url::to(['/invoice/resi']),
        'placeholder'=>'Pilih Resi ...' ,
        'initialize' =>true,

    ],
    ])->label(false); ?>
       
     </td>
    
     
     <td>    <?= $form->field($model, "[$key]keterangan")->label(false); ?>
</td>

<td><a data-action="delete"><span class="glyphicon glyphicon-trash"></span></a></td>