<?php
namespace frontend\controllers;
use yii\web\Controller;

class TeamController extends Controller
{
	public function actionTeam()
	{
		return $this->render('team');
		
	}
}
?>