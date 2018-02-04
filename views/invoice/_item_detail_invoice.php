<?php
use app\models\Resi;
use kartik\widgets\DepDrop;
use yii\helpers\Url;


?>

<td><?= $form->field($model,"[$key]id_resi")->widget(DepDrop::classname(), [
    'type'=>DepDrop::TYPE_SELECT2,
    'data'=> [$model->id_resi=>is_null($model->resi)?"":$model->resi->no_resi],
    'options'=>[ 'placeholder'=>'Pilih Resi ...'],
    'select2Options'=>['pluginOptions'=>['allowClear'=>true,
    
], 'options' =>[
"onchange" => 'var index  = $(this).attr("id").replace(/[^0-9.]/g, "")        var index  = id.replace(/[^0-9.]/g, ""); 
  alert(index);    
    $.post( "'.Url::to(['invoice/total']).'?id="+$(this).val(), function(data) {
                                            
        data1 = JSON.parse(data)
        
        $( "input#det_invoice-"+index+"-sub_total" ).val(data1.total);
        $( "input#det_invoice-"+index+"-sub_total" ).focus();
      }); }',
]


],
    'pluginOptions'=>[
        'depends'=>['invoice-id_customer'],
        'url'=>Url::to(['/invoice/resi']),
        'placeholder'=>'Pilih Resi ...' ,
        'initialize' =>true,

    ],
    ])->label(false); ?>
       
     </td>
     <td>    <?= $form->field($model, "[$key]sub_total")->label(false); ?>
     
     <td>    <?= $form->field($model, "[$key]keterangan")->label(false); ?>
</td>

<td><a data-action="delete"><span class="glyphicon glyphicon-trash"></span></a></td>