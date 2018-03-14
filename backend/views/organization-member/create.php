<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OrganizationMember */

$this->title = 'Add Members';
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['organization/index']];
$this->params['breadcrumbs'][] = ['label' => $model->organization->name, 'url' => ['organization/view', 'id' => $model->organization_id]];
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index', 'id' => $model->organization_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
        'model' => $model,
		'members' => $members,
    ]) ?>