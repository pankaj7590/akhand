<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrganizationTeam */

$this->title = 'Update Team: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['organization/index']];
$this->params['breadcrumbs'][] = ['label' => $model->organization->name, 'url' => ['organization/view', 'id' => $model->organization_id]];
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index', 'id' => $model->organization_id]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="organization-team-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
