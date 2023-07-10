<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2>Выдача</h2>
<?php $form= ActiveForm::begin();?>
<?=$form->field($order, 'ID_client')->listBox(ArrayHelper::map($clients,'ID_client','first_name_client', 'last_name_client', 'patronimic_name_client'))?>
<?=$form->field($order, 'ID_service')->listBox(ArrayHelper::map($service,'ID_service','name_service', 'price_service'))?>
<?=$form->field($order, 'status_order')->checkBox()?>
<button class="btn btn-primary" type="submit">
Сохранить</button>
<?php ActiveForm::end();?>
