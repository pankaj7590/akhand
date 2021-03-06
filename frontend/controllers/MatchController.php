<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\search\MatchSearch;

class MatchController extends Controller
{
	public function actionIndex()
	{
		$searchModel = new MatchSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->render('index',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);		
	}
}
?>