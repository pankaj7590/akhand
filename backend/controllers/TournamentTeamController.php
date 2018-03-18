<?php

namespace backend\controllers;

use Yii;
use common\models\Tournament;
use common\models\Team;
use common\models\TournamentTeam;
use common\models\search\TournamentTeamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TournamentTeamController implements the CRUD actions for TournamentTeam model.
 */
class TournamentTeamController extends Controller
{
    /**
     * @inheritdoc
     */
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
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TournamentTeam models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new TournamentTeamSearch();
		$searchModel->tournament_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TournamentTeam model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TournamentTeam model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
		$tournamentModel = $this->findTournamentModel($id);
        $model = new TournamentTeam();
		$model->tournament_id = $id;

		$teams = \yii\helpers\ArrayHelper::map(Team::find()->all(), 'id', 'name');
        if ($model->load(Yii::$app->request->post())){
			foreach($model->match_id as $match){
				$tm = new TournamentTeam();
				$tm->tournament_id = $id;
				$tm->team_id = $match;
				if(!$tm->save()){
					Yii::$app->session->setFlash('error', json_encode($tm->errors));
				}
				return $this->redirect(['index', 'id' => $id]);
			}
        }

        return $this->render('create', [
            'model' => $model,
            'teams' => $teams,
        ]);
    }

    /**
     * Updates an existing TournamentTeam model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TournamentTeam model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
		$model = $this->findModel($id);
		$model->delete();

        return $this->redirect(['index', 'id' => $model->tournament_id]);
    }

    /**
     * Finds the TournamentTeam model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TournamentTeam the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TournamentTeam::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Tournament model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Organization the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findTournamentModel($id)
    {
        if (($model = Tournament::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested tournament does not exist.');
    }
}
