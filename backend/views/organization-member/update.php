<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrganizationMember */

$this->title = 'Update Organization Member: '.$model->organization->name;
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['organization/index']];
$this->params['breadcrumbs'][] = ['label' => $model->organization->name, 'url' => ['organization/view', 'id' => $model->organization_id]];
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->member->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('_form', [
        'model' => $model,
    ]) ?>