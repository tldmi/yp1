<?php Use \yii\helpers\Html; ?>
<h2>Заказы</h2>
<table class="table">
	<tr>
		<th>№ </th> 
		<th>Название услуги </th> 
		<th>Имя </th> 
		<th>Фамилия </th>
		<th>Отчество </th>
		<th>Цена </th>
		<th>Выполнен </th>
		<th>Действия </th>
	</tr>

	<?php foreach($orders as $order){ 
		if ($order->status_order == 0) {
			$status = 'Не выполнен';
		} else {
			$status = 'Выполнен';
		}
	?>
	<tr>
		<td> <?= $order->ID_order ?> </td>
		<td> <?= htmlspecialchars($order->getIDservice()->one()->name_service) ?> </td>
		<td> <?php echo htmlspecialchars($order->getIDClient()->one()->first_name_client) ?> </td>
		<td> <?php echo htmlspecialchars($order->getIDClient()->one()->last_name_client) ?> </td>
		<td> <?php echo htmlspecialchars($order->getIDClient()->one()->patronimic_name_client) ?> </td>
		<td> <?= htmlspecialchars($order->getIDservice()->one()->price_service) ?> </td>
		<td> <?= htmlspecialchars($status)?> </td>
		
		<td> 
			 <?= Html::a('<span class="glyphicon glyphicon-edit"></span>Редактировать', ['order/edit', 'ID_order' => $order ->ID_order],['class'=>'btn btn-primary']) ?>
			 <?= Html::a('<span class="glyphicon glyphicon-remove"></span>Удалить', ['order/delete', 'ID_order' => $order ->ID_order],['class'=>'btn btn-small btn-danger'],['type'=>'button'])?>
		</td>
	</tr>
	 <?php } ?>
	
</table>

