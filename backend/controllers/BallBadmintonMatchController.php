<?php

namespace backend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use common\components\SportTypes;
use common\models\Team;
use common\models\BallBadmintonMatch;
use common\models\search\BallBadmintonMatchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BallBadmintonMatchController implements the CRUD actions for BallBadmintonMatch model.
 */
class BallBadmintonMatchController extends Controller
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
     * Lists all BallBadmintonMatch models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BallBadmintonMatchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BallBadmintonMatch model.
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
     * Creates a new BallBadmintonMatch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BallBadmintonMatch();

		$typeTeams = ArrayHelper::map(Team::find()->where(['type' => SportTypes::TYPE_BALL_BADMINTON])->all(), 'id', 'name');
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
			'typeTeams' => $typeTeams,
        ]);
    }

    /**
     * Updates an existing BallBadmintonMatch model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

		$matchTeams = [$model->firstTeam->id => $model->firstTeam->name, $model->secondTeam->id => $model->secondTeam->name];
		$typeTeams = [$model->firstTeam->id => $model->firstTeam->name, $model->secondTeam->id => $model->secondTeam->name];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'matchTeams' => $matchTeams,
            'typeTeams' => $typeTeams,
        ]);
    }

    /**
     * Deletes an existing BallBadmintonMatch model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BallBadmintonMatch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BallBadmintonMatch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BallBadmintonMatch::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
