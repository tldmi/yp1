<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2>Добавление услуги</h2>
<?php $form= ActiveForm::begin();?>
<?=$form->field($service, 'name_service')?>
<?=$form->field($service, 'price_service')?>

<button class="btn btn-primary" type="submit">
Сохранить</button>
<?php ActiveForm::end();?>
