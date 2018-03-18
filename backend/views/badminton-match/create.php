<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BadmintonMatch */

$this->title = 'Add Match';
$this->params['breadcrumbs'][] = ['label' => 'Badminton Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
        'model' => $model,
            'typeTeams' => $typeTeams,
    ]) ?>