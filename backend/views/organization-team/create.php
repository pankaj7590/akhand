<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OrganizationTeam */

$this->title = 'Create Organization Team';
$this->params['breadcrumbs'][] = ['label' => 'Organization Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-team-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
