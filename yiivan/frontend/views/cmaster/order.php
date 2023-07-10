<?php
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;

$this->title = 'Список услуг';
?>
<div class="site-index">

    <div class="jumbotron">
		<?php $form = ActiveForm::begin(['options'=>['id'=>'order-form']]); ?>
		<?= $form->field($clients,'last_name_client')->input('text'); ?>
		<?= $form->field($clients,'first_name_client')->input('text'); ?>
		<?= $form->field($clients,'patronimic_name_client')->input('text'); ?>
		<?= $form->field($clients,'mobile_number')->input('text'); ?>
		<?= $form->field($clients,'address')->input('text'); ?>
		<?= Html::submitButton('Отправить',['class'=>'btn btn-success']); ?>
		<?php ActiveForm::end(); ?>		
    </div>

   
</div>
