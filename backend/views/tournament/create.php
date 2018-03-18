<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Tournament */

$this->title = 'Add Tournament';
$this->params['breadcrumbs'][] = ['label' => 'Tournaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
        'model' => $model,
    ]) ?>