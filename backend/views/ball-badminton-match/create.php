<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BallBadmintonMatch */

$this->title = 'Add Match';
$this->params['breadcrumbs'][] = ['label' => 'Ball Badminton Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
        'model' => $model,
            'typeTeams' => $typeTeams,
    ]) ?>