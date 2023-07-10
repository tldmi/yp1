<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use app\models\Service;
use app\models\Client;
use app\models\Order;

/**
 * Site controller
 */
class CmasterController extends Controller
{
	public function actionIndex() {
		
		$services = Service::find()->all();
		
		return $this->render('index',compact('services'));
		
	}
	
	public function actionOrder($id = null) {
		
		$clients = new Client();
		$orders = new Order();
		if($clients->load(Yii::$app->request->post())) {
			if($clients->save()) {			
				$orders->ID_client = $clients->ID_client;
				$orders->ID_service = $id;
				$orders->status_order = 0;
				if($orders->save()) {
					Yii::$app->session->setFlash('success','Заявка успешно принята, мы вам позвоним!');					
					return $this->redirect(['cmaster/index']);
				} else {
					Yii::$app->session->setFlash('error','Ошибка');
					
				}
							
			} else {
				Yii::$app->session->setFlash('error','Ошибка записи данных клиента');
				
			}			
		} else {
			$service_id = Service::findOne($id);
			if($service_id == null) {
				throw new \yii\web\NotFoundHttpException('Услуга не найдена :(');
				
			}
			
		}
		return $this->render('order',compact('clients'));

		
		
		
		
		
		}
		

	
	
	
	
	
}
