<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\select2\Select2;
use app\models\Outlet;

/* @var $this yii\web\View */
/* @var $model app\modules\administrator\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php 
        echo $form->field($model, 'id_outlet')->widget(Select2::classname(), [
    
    'data' => Outlet::getDataBrowseOutlet(),
    'options' => ['placeholder' => 'Pilih Outlet ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Outlet'); ?>	

	<?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
		'pluginOptions' => [
			'onText' => 'Active',
			'offText' => 'Banned',
		]
	]) ?>

	<?php if (!$model->isNewRecord) { ?>
		<strong> Leave blank if not change password</strong>
		<div class="ui divider"></div>
		<?= $form->field($model, 'new_password') ?>
		<?= $form->field($model, 'repeat_password') ?>
		<?= $form->field($model, 'old_password') ?>
	<?php } ?>
	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
