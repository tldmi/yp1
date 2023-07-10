<?php

/* @var $this yii\web\View */

$this->title = 'Список услуг';
?>
<div class="site-index">

    <div class="jumbotron">

	<?php if(Yii::$app->session->hasFlash('succsess')) {?>
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php echo Yii::$app->session->getFlash('success');?>
		</div>		
	<?php } ?>
		
		<table class="tbl_serv">
		<caption>Оказываемые услуги</caption>
			<?php foreach($services as $v) { ?>
				<tr>
					<td><?=$v->name_service;?></td>
					<td><?=$v->price_service;?></td>
					<td><a href="/?r=cmaster/order&id=<?=$v->ID_service;?>">Заказать</a></td>
				</tr>
			<?php } ?>
		</table>
		
    </div>

   
</div>
