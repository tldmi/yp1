<?php
namespace backend\controllers;

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

/**
 * Site controller
 */
class ServiceController extends Controller
{ 
	public function behaviors()
	    {
	        return [
	            'access' => [
	                'class' => AccessControl::className(),
	                'rules' => [
	                    [
	                        'allow' => true,
	                        'roles' => ['@'],
	                    ],
	                ],
	            ]
	        ];
	    }


	
	public function actionIndex ()
	{
		$service=Service::find()
		->orderBy(['name_service' => SORT_ASC])
		->all ();
		return $this->render('index', ['service' => $service]);
	}
	

	public function actionEdit($ID_service) {
		$service=Service::findOne($ID_service);
		if (!$service) {
			throw new \yii\web\NotFoundHttpException('Услуга не найдена');
		}
	
		if (isset($_POST['Service'])) {
			$service->attributes=$_POST['Service'];
			if ($service->save()) {
				return $this->redirect(['service/index']);
			}
		}
		return $this->render('add', ['service'=>$service]);
	}
	
	public function actionDelete($ID_service){
		$service=Service::findOne($ID_service);
		if (!$service) {
			return 'Услуга не найдена';
		}
		$service->delete();
		return $this->redirect(['service/index']);
	}
	
	public function actionAdd() {
		$service=new Service;
		
		if (isset($_POST['Service'])){
			$service->attributes=$_POST['Service'];
			if ($service->save()) {
				return $this->redirect(['service/index']);
			}
			
		}
		return $this->render('add', ['service'=>$service]);
		
	}
}

