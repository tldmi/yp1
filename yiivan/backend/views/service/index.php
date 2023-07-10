<?php Use \yii\helpers\Html; ?>
<h2>Услуги</h2>
<table class="table">
	<tr>
		<th>№ </th> 
		<th>Название </th> 
		<th>Стоимость</th>
		<th>Действия </th> 
	</tr>
	<?php foreach($service as $product){ ?>
	<tr>
		<td> <?= $product->ID_service ?> </td>
		<td> <?= htmlspecialchars($product->name_service) ?> </td>
		<td> <?= htmlspecialchars($product->price_service) ?> </td>
		
		<td> <?= Html::a('<span class="glyphicon glyphicon-edit"></span>Редактировать', ['service/edit', 'ID_service' => $product ->ID_service],['class'=>'btn btn-primary']) ?> 

			<?php
			if ($product->getOrders()->count()==0) {
			 echo Html::a('<span class="glyphicon glyphicon-remove"></span>Удалить', ['service/delete', 'ID_service' => $product ->ID_service],['class'=>'btn btn-danger']);
			 }?>
		</td>
	</tr>
	 <?php } ?>
	 <tr>
	 <td colspan="4" ></td>
	 <td><?= Html::a('<span class="glyphicon glyphicon-plus"></span>Добавить', ['service/add']) ?>
	 </tr>
</table>
