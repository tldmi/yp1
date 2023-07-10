<?php
Use \yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h2 align = center>Заказ</h2>
<table align = center>
	<tr>
	<td>
<div>
<?php
	$clientArray = array();
	foreach ($clients as $cl) {
		$clientArray[$cl->ID_client] = $cl->last_name_client.' '.$cl->first_name_client.' '.$cl->patronimic_name_client. ', '.$cl->address;
	}
	$form = ActiveForm::begin();
	echo $form->field($order, 'ID_client')->dropDownList($clientArray)->label('Клиент');
	echo $form->field($order, 'ID_service')->dropDownList(ArrayHelper::map($service, 'ID_service', 'name_service'))->label('Услуга');
	echo $form->field($order, 'status_order')->checkbox()->label('Выполнен');
?>
<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
</div>
<?php
	ActiveForm::end();
?>
</div>
</td></tr>
	
</table>
