<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Match */

$this->title = 'Add Cricket Match';
$this->params['breadcrumbs'][] = ['label' => 'Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
        'model' => $model,
		'typeTeams' => $typeTeams,
    ]) ?>