<?php

namespace backend\controllers;

use Yii;
use common\models\Organization;
use common\models\Team;
use common\models\OrganizationSearch;
use common\models\OrganizationTeam;
use common\models\search\OrganizationTeamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * OrganizationTeamController implements the CRUD actions for OrganizationTeam model.
 */
class OrganizationTeamController extends Controller
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
     * Lists all OrganizationTeam models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new OrganizationTeamSearch();
		$searchModel->organization_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrganizationTeam model.
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
     * Creates a new OrganizationTeam model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
		$organizationModel = $this->findOrganizationModel($id);
        $model = new OrganizationTeam();
		$model->organization_id = $id;

		$teams = \yii\helpers\ArrayHelper::map(Team::find()->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post())) {
			foreach($model->team_id as $team){
				$ot = new OrganizationTeam();
				$ot->organization_id = $id;
				$ot->team_id = $team;
				if(!$ot->save()){
					Yii::$app->session->setFlash('error', json_encode($ot->errors));
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
     * Updates an existing OrganizationTeam model.
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
     * Deletes an existing OrganizationTeam model.
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
     * Finds the OrganizationTeam model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrganizationTeam the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrganizationTeam::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Organization model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Organization the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findOrganizationModel($id)
    {
        if (($model = Organization::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested organization does not exist.');
    }
}
