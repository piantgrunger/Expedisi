<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<div  class="login-box">
    <div class="login-logo">
                  
            
                    <H3>Sistem Informasi Ekspedisi</H3>
                   <H4> Ardi Mitra Express</H4>
      
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><i class="fa fa-lock green"></i> Login </p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => ('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
    
               <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
    
              <?= $form->field($model, 'verifyCode')->widget(Captcha::className())->label(false) ?>
                       </div>
        
</div>
        <?= Html::submitButton('<i class="fa fa-key"> </i> Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>

  
   
     
        <?php ActiveForm::end(); ?>
       

    </div>
    <!-- /.login-box-body -->

   </div>     
      
           

</div><!-- /.login-box -->

         
