<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\search\BadmintonMatchSearch;

class BallBadmintonMatchController extends Controller
{
	public function actionIndex()
	{
		$searchModel = new BadmintonMatchSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->render('index',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);		
	}
}
?>