<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Gallery;
use common\models\search\GallerySearch;
use yii\web\NotFoundHttpException;

class GalleryController extends Controller
{
	public function actionView($id)
	{
		$model = $this->findModel($id);
		return $this->render('view', [
			'model' => $model,
		]);	
	}
	
	public function findModel($id){
		if($model = Gallery::findOne($id)){
			return $model;
		}
		throw new NotFoundHttpException('Requested galery does not exist.');
	}
}
?>