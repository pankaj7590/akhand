<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use common\models\Team;
use common\components\SportTypes;
use common\models\search\TeamSearch;

class TeamController extends Controller
{
	public function actionTeam()
	{
		return $this->render('team');
		
	}
	
	public function actionIndex()
	{
		//badminton models
		$badmintonSearchModel = new TeamSearch();
		$badmintonSearchModel->type = SportTypes::TYPE_BADMINTON;
		$badmintonDataProvider = $badmintonSearchModel->search(Yii::$app->request->queryParams);
		
		//ball badminton models
		$ballBadmintonSearchModel = new TeamSearch();
		$ballBadmintonSearchModel->type = SportTypes::TYPE_BALL_BADMINTON;
		$ballBadmintonDataProvider = $ballBadmintonSearchModel->search(Yii::$app->request->queryParams);
		
		//badminton models
		$cricketSearchModel = new TeamSearch();
		$cricketSearchModel->type = SportTypes::TYPE_CRICKET;
		$cricketDataProvider = $cricketSearchModel->search(Yii::$app->request->queryParams);
		
		
		return $this->render('index', [
			'teams' => [
				'Badminton' => $badmintonDataProvider,
				'Ball Badminton' => $ballBadmintonDataProvider,
				'Cricket' => $cricketDataProvider,
			],
		]);		
	}
	
	public function actionView($id)
	{
		$model = $this->findModel($id);
		return $this->render('view', [
			'model' => $model,
		]);
	}
	
	public function findModel($id){
		$model = Team::findOne($id);
		if(!$model){
			throw new NotFoundHttpException('Team not found.');
		}
		return $model;
	}
}
?>