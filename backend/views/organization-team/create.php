<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OrganizationTeam */

$this->title = 'Add Team';
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['organization/index']];
$this->params['breadcrumbs'][] = ['label' => $model->organization->name, 'url' => ['organization/view', 'id' => $model->organization_id]];
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index', 'id' => $model->organization_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
        'model' => $model,
        'teams' => $teams,
    ]) ?>